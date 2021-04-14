<?php 

class Products_model extends CI_Model
{
    public function get_products()
	{
        $this->db->select('name, image, price, last_price, discount, discount_status, status');
        $this->db->where('status', 1);
        return $this->db->get('products')->result();
    }


    public function get_product($product_id)
	{
        $this->db->select('departments.name as name_department, products.name, products.model, products.color, products.price, products.discount_status, products.discount, products.last_price');
        $this->db->from('products');
        $this->db->join('departments', 'departments.id = products.fk_department_id');
        $this->db->where('products.id', $product_id);
        return $this->db->get()->row();
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


    public function update_quantity($product_id, $quantity)
	{
        $this->db->set('quantity', 'quantity-'.$quantity.'', false);
        $this->db->where('id', $product_id);
        $this->db->update('products');

		return TRUE;
	}
}
