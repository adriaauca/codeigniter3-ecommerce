<?php 

class Products_model extends CI_Model
{
    public function get_products()
	{
        $this->db->select('name, image, price, last_price, discount, discount_status, status');
        $this->db->where('status', 1);
        return $this->db->get('products')->result();
    }


    public function show($name)
	{
		$this->db->where('name', $name);
        // $this->db->where('status', 1);
        return $this->db->get('products')->row();
	}


    public function store($data)
	{
        $this->db->insert('products', $data);
        return $this->db->insert_id();
    }


    public function show_all()
	{
        $this->db->select('id, name, model, color, price, last_price, discount, discount_status, status, fk_department_id');
        return $this->db->get('products')->result();
    }
}
