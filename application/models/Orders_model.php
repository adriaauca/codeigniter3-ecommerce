<?php 

class Orders_model extends CI_Model
{
    public function store($data)
	{
        $this->db->insert('orders', $data);
        return $this->db->insert_id();
    }


    public function check_if_user_has_buyed_the_product($product_id, $user_id)
	{
        $this->db->select('products.name as name');
        $this->db->from('orders');
        $this->db->join('products', 'products.id = orders.fk_product_id');
		$this->db->where('orders.fk_product_id', $product_id);
        $this->db->where('orders.fk_user_id', $user_id);
        return $this->db->get()->row();
	}


    public function check_if_user_has_commented_the_product($product_id, $user_id)
	{
        $this->db->select('stars, review');
        $this->db->from('comments');
		$this->db->where('fk_product_id', $product_id);
        $this->db->where('fk_user_id', $user_id);

        $result = $this->db->get()->row();

        if (!empty($result))
        {
            return $result;
        }
        else
        {
            return FALSE;
        }
	}
}
