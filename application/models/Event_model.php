<?php

class Event_model extends CI_Model {

    protected $tbl = 'event';
    protected $level_tbl = 'level';
    protected $event_sponsors_tbl = 'event_sponsors';
    protected $event_sponsors_guests_tbl = 'event_sponsors_guests';
    protected $guest_tbl = 'guest';
    protected $user_tbl = 'user';

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
        $where['client_id'] = CLIENT_ID;
        $result = $this->db->get_where($this->tbl, $where);
        return $result->row();
    }

    public function get_list($where = array()) {
        $where['client_id'] = CLIENT_ID;
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
        $result = $this->db->get_where($this->tbl, array('name' => $data['name']));
        if($result->num_rows() > 0) {
            return array('success' => false, 'message' => 'Event Name already exists.', 'field' => 'name');
        }

        $data['client_id'] = CLIENT_ID;
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
    public function update($event_id, array $update) {
        $this->db->trans_start();
        $this->db->where('event_id', $event_id);
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

    /*
     * Event Sponsors
     */
    public function get_event_sponsors($user_id) {
        $this->db->select('event.event_id, event.name, event.short_description, event.info_link, event.image1, event.status, event_sponsors.es_id');
        $this->db->from($this->tbl);
        $this->db->join($this->event_sponsors_tbl,
            "event_sponsors.event_id = event.event_id AND event_sponsors.sponsor_id = $user_id AND event_sponsors.status = 'active'", 'left');
        $this->db->join($this->level_tbl, 'level.level_id = event_sponsors.level_id', 'left');
        $this->db->where('event.status !=', 'draft');
        $result = $this->db->get();
        return $result->result();
    }

    public function add_event_sponsors($es) {
        $this->db->trans_start();
        if($this->db->insert($this->event_sponsors_tbl, $es)) {
            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
            } else {
                $this->db->trans_commit();
                return array('success' => true);
            }
        }
        return array('success' => false);
    }

    /*
     * Event Sponsors Guests
     */
    public function get_event_sponsors_guests($event_id, $sponsor_id) {
        $this->db->join($this->guest_tbl, 'guest.user_id = event_sponsors_guests.guest_id', 'left');
        $this->db->join($this->user_tbl, 'user.user_id = guest.user_id', 'left');
        $this->db->from($this->event_sponsors_guests_tbl);
        $this->db->where(array('event_sponsors_guests.event_id' => $event_id,'event_sponsors_guests.sponsor_id' => $sponsor_id));
        $this->db->order_by('event_sponsors_guests.date_created', 'DESC');
        $list = $this->db->get();
        return $list->result();
    }


} 