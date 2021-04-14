<?php 

class Credit_cards_model extends CI_Model
{
    public function store($data)
	{
        $this->db->insert('credit_cards', $data);
        return $this->db->insert_id();
    }
}
