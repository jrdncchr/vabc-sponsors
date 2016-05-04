<?php

class User_model extends CI_Model {

    protected $tbl = 'user';
    protected $secret_tbl = 'user_secret';
    protected $social_links_tbl = 'social_link';
    protected $sponsor_tbl = 'sponsor';

    protected $sponsor_add_rules = [
        'required'  => [],
        'email'     => [],
        'equals'    => [],
        'lengthMin' => [],
        'lengthMax' => []
    ];

    function __construct() {
        $this->load->database();
    }

    /*
     * LOGIN
     */

    public function login(array $auth) {
        $result = array('success' => false,  'message' => 'Incorrect Email or Password.');
        if(isset($auth['email']) && isset($auth['password'])) {
            $user_result = $this->db->get($this->tbl, array('email' => $auth['email']));
            if($user_result->num_rows() > 0) {
                $user = $user_result->row();
                $user_secret_result = $this->db->get($this->secret_tbl, array('user_id' => $user->user_id));
                $user_secret = $user_secret_result->row();
                if (hash_equals($user_secret->password, crypt($auth['password'], $user_secret->password))) {
                    $sponsor = $this->db->get($this->sponsor_tbl, array('user_id', $user->user_id));
                    $user->details = $sponsor->row();
                    $social_link = $this->db->get($this->social_links_tbl, array('user_id', $user->user_id));
                    $user->social_links = $social_link->row();
                    $result = array('success' => true);
                    $_SESSION['user'] = $user;
                    $this->session->set_userdata('user', $user);
                }
            }
        }
        return $result;
    }

    /*
     * GET
     */
    public function get($where) {
        $result = $this->db->get_where($this->tbl, $where);
        return $result->row();
    }

    public function get_all($where) {
        $result = $this->db->get_where($this->tbl, $where);
        return $result->result();
    }

    public function get_sponsor_secret($user_id) {
        $result = $this->db->get_where($this->secret_tbl, array('user_id' => $user_id));
        return $result->row();
    }

    /*
     * ADD
     */
    public function add_sponsor(array $sponsor) {

        /* Validate using the rules */
        $v = new Valitron\Validator($sponsor);
        $v->rules($this->sponsor_add_rules);
        if(!$v->validate()) {
            return array('success' => false, 'message' => "Please validate your inputs.", 'errors' => $v->errors());
        }

        /* Check if unique identifier already exists */
        $result = $this->db->get_where($this->tbl, array('email' => $sponsor['authentication']['email'], 'status' => 'active', 'type' => 'sponsor'));
        if($result->num_rows() > 0) {
            return array('success' => false, 'message' => 'Email already exists.', 'field' => 'email');
        }

        /* Add salt and crypt the password */
        $this->load->library('general_functions');
        $salt = $this->general_functions->generate_random_str(20);
        $password = crypt($sponsor['authentication']['password'], $salt);

        $user = $sponsor['authentication'];
        $user['type'] = "sponsor";
        unset($user['password']);

        $user_id = null;

        /* Insert user info */
        $this->db->trans_start();
        if($this->db->insert($this->tbl, $user)) {

            $user_id = $this->db->insert_id();
            $user_secret = array(
                'password' => $password,
                'user_id' => $user_id,
                'email_confirmation' => $this->general_functions->generate_random_str(50)
            );
            /* Insert user secret */
            if($this->db->insert($this->secret_tbl, $user_secret)) {

                $user_sponsor = $sponsor['sponsor_details'];
                $user_sponsor['user_id'] = $user_id;
                /* Insert user sponsor */
                if($this->db->insert($this->sponsor_tbl, $user_sponsor)) {

                    $user_social_link = $sponsor['social_links'];
                    $user_social_link['user_id'] = $user_id;
                    /* Insert user social links */
                    if($this->db->insert($this->social_links_tbl, $user_social_link)) {

                        if ($this->db->trans_status() === FALSE) {
                            $this->db->trans_rollback();
                        } else {
                            $this->db->trans_commit();
                            $CI =& get_instance();
                            $CI->load->model('email_model');
                            $this->email_model->send_email_confirmation_code($user['email'], $user_secret['email_confirmation']);
                            return array('success' => true, 'user_id' => $user_id);
                        }
                    }
                }
            }
        }
        return array('success' => false, 'message' => 'Something went wrong.');
    }

    /*
     * UPDATE
     */
    public function update_sponsor(array $sponsor) {
        $this->db->trans_start();

        /* Update user */
        $this->db->where('user_id', $sponsor['user_id']);
        if($this->db->update($this->tbl,
            array('email' => $sponsor['authentication']['email']))) {

            /* Add salt and crypt the password */
            $this->load->library('general_functions');
            $salt = $this->general_functions->generate_random_str(20);
            $password = crypt($sponsor['authentication']['password'], $salt);

            /* Update user secret */
            $this->db->where('user_id', $sponsor['user_id']);
            if($this->db->update($this->secret_tbl, array('password' => $password))) {

                /* Update user sponsor */
                $this->db->where('user_id', $sponsor['user_id']);
                if($this->db->update($this->sponsor_tbl, $sponsor['sponsor_details'])) {

                    /* Update user social links */
                    $this->db->where('user_id', $sponsor['user_id']);
                    if($this->db->update($this->social_links_tbl, $sponsor['social_links'])) {

                        if ($this->db->trans_status() === FALSE) {
                            $this->db->trans_rollback();
                        } else {
                            $this->db->trans_commit();
                            return array('success' => true);
                        }
                    }
                }
            }
        }

        return array('success' => false, 'message' => 'Something went wrong.');
    }

    public function confirm_email($user_id, $confirmation_code) {
        $user_secret_result = $this->db->get_where($this->secret_tbl, array('user_id' => $user_id));
        $user_secret = $user_secret_result->row();
        if($user_secret->email_confirmation == $confirmation_code) {
            $this->db->where('user_id', $user_id);
            if($this->db->update($this->tbl, array('status' => 'active'))) {
                return array('success' => true);
            }
        }
        return array('success' => false);
    }


} 