<?php

class Shop_model extends CI_Model {

    protected $tbl = 'shop';
    protected $add_rules = [
        'required'  => [['name'], ['sponsor_id']],
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
        $result = $this->db->get_where($this->tbl, array('name' => $data['name']));
        if($result->num_rows() > 0) {
            return array('success' => false, 'message' => 'Shop Name already exists.', 'field' => 'name');
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
    public function update($shop_id, array $update) {
        $this->db->trans_start();
        $this->db->where('shop_id', $shop_id);
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