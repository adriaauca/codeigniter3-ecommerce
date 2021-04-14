<?php 

class Checkout_model extends CI_Model
{
    public function store($data)
	{
        $this->db->insert('checkout', $data);
        return $this->db->insert_id();
    }
}
