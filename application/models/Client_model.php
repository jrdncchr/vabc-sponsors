<?php

class Client_model extends CI_Model {

    protected $tbl = 'client';
    protected $add_rules = [
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
     * GET
     */
    public function get($where) {
        $result = $this->db->get_where($this->tbl, $where);
        return $result->row();
    }

    public function get_list($where) {
        $result = $this->db->get_where($this->tbl, $where);
        return $result->result();
    }

    /*
     * ADD
     */
    public function add(array $data) {

        /* Validate using the rules */
        $v = new Valitron\Validator($data);
        $v->rules($this->add_rules);
        if(!$v->validate()) {
            return array('success' => false, 'message' => "Please validate your inputs.", 'errors' => $v->errors());
        }

        /* Check if unique identifier already exists */
        $result = $this->db->get_where($this->tbl, array('client_code' => $data['client_code']));
        if($result->num_rows() > 0) {
            return array('success' => false, 'message' => 'Already exists.');
        }

        /* Insert data */
        $this->db->trans_start();
        if($this->db->insert($this->tbl, $data)) {
            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
            } else {
                $this->db->trans_commit();
                return array('success' => true);
            }
        }
        return array('success' => false, 'message' => 'Something went wrong.');
    }

    /*
     * UPDATE
     */
    public function update($id, array $update) {
        $this->db->trans_start();
        $this->db->where('client_id', $id);
        if($this->db->update($this->tbl, $update)) {
            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
            } else {
                $this->db->trans_commit();
                return array('success' => true);
            }
        }
        return array('success' => false, 'message' => 'Something went wrong.');
    }


} 