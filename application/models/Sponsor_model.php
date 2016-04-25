<?php

class Sponsor_model extends CI_Model {

    protected $sponsor_tbl = 'sponsor';
    protected $sponsor_secret_tbl = 'sponsor_secret';
    protected $add_rules = [
        'required'  => [['name'], ['email'], ['company_name']],
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
            $sponsor_result = $this->db->get($this->sponsor_tbl, array('email' => $auth['email']));
            if($sponsor_result->num_rows() > 0) {
                $sponsor = $sponsor_result->row();
                $sponsor_secret_result = $this->db->get($this->sponsor_secret_tbl, array('sponsor_id' => $sponsor->sponsor_id));
                $sponsor_secret = $sponsor_secret_result->row();
                if (hash_equals($sponsor_secret->password, crypt($auth['password'], $sponsor_secret->password))) {
                    $result = array('success' => true);
                    $_SESSION['sponsor'] = $sponsor;
                }
            }
        }
        return $result;
    }

    /*
     * GET
     */
    public function get($where) {
        $result = $this->db->get_where($this->sponsor_tbl, $where);
        return $result->row();
    }

    public function get_all($where) {
        $result = $this->db->get_where($this->sponsor_tbl, $where);
        return $result->result();
    }

    public function get_sponsor_secret($sponsor_id) {
        $result = $this->db->get_where($this->sponsor_secret_tbl, array('sponsor_id' => $sponsor_id));
        return $result->row();
    }

    /*
     * ADD
     */
    public function add(array $sponsor) {

        /* Validate using the rules */
        $v = new Valitron\Validator($sponsor);
        $v->rules($this->add_rules);
        if(!$v->validate()) {
            return array('success' => false, 'message' => "Please validate your inputs.", 'errors' => $v->errors());
        }

        /* Check if unique identifier already exists */
        $result = $this->db->get_where($this->sponsor_tbl, array('email' => $sponsor['email']));
        if($result->num_rows() > 0) {
            return array('success' => false, 'message' => 'Email already exists.', 'field' => 'email');
        }

        /* Add salt and crypt the password */
        $this->load->library('general_functions');
        $salt = $this->general_functions->generate_random_str(20);
        $password = crypt($sponsor['password'], $salt);

        /* Remove password keys in user info, it will be stored in user secret table */
        unset($sponsor['password']);
        unset($sponsor['confirm_password']);

        /* Insert user info */
        $this->db->trans_start();
        if($this->db->insert($this->sponsor_tbl, $sponsor)) {

            $sponsor_secret = array(
                'password' => $password,
                'sponsor_id' => $this->db->insert_id(),
                'email_confirmation' => $this->general_functions->generate_random_str(100)
            );

            /* Insert user secret */
            if($this->db->insert($this->sponsor_secret_tbl, $sponsor_secret)) {
                if ($this->db->trans_status() === FALSE) {
                    $this->db->trans_rollback();
                } else {
                    $this->db->trans_commit();
                    /* TO DO : Send Email Confirmation */
                    return array('success' => true);
                }
            }
        }
        return array('success' => false, 'message' => 'Something went wrong.');
    }

    /*
     * UPDATE
     */
    public function update($sponsor_id, array $update) {
        $this->db->trans_start();
        $this->db->where('sponsor_id', $sponsor_id);
        if($this->db->update($this->sponsor_tbl, $update)) {
            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
            } else {
                $this->db->trans_commit();
                $sponsor = $this->get(array('sponsor_id' => $sponsor_id));
                $this->session->set_userdata('sponsor', $sponsor);
                return array('success' => true);
            }
        }
        return array('success' => false, 'message' => 'Something went wrong.');
    }


} 