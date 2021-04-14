<?php 

class Chart_model extends CI_Model
{
    public function store($data)
	{
        $this->db->insert('chart', $data);
        return $this->db->insert_id();
    }


    public function show_all($user_id)
	{
        $this->db->select('products.id as id_product, chart.id as id_chart, products.id as id_products, departments.name as name_department, products.name, products.model, products.color, products.quantity, products.price, SUM(chart.quantity) as quantity, products.discount_status, products.discount, products.last_price');
        $this->db->from('chart');
        $this->db->join('products', 'products.id = chart.fk_product_id');
        $this->db->join('departments', 'departments.id = products.fk_department_id');
        $this->db->where('fk_user_id', $user_id);
        $this->db->group_by("chart.fk_product_id");
        return $this->db->get()->result();
    }


    public function check_if_exists($product_id, $user_id)
	{
        $this->db->where('fk_product_id', $product_id);
        $this->db->where('fk_user_id', $user_id);
        return $this->db->get('chart')->num_rows();
	}


    public function update($product_id, $user_id, $quantity)
	{
        $this->db->set('quantity', $quantity);
        $this->db->where('fk_product_id', $product_id);
        $this->db->where('fk_user_id', $user_id);
        $this->db->update('chart');

		return $this->db->affected_rows();
	}


    public function destroy($id, $user_id)
	{
		return $this->db->delete('chart', array('id' => $id, 'fk_user_id' => $user_id));
	}


    public function destroy_all($user_id)
	{
		return $this->db->delete('chart', array('fk_user_id' => $user_id));
	}


    public function sum_total($user_id)
	{
        $this->db->select('round(SUM(products.price * chart.quantity), 2) AS total_amount', FALSE);
        $this->db->from('chart');
        $this->db->join('products', 'products.id = chart.fk_product_id');
        $this->db->where('fk_user_id', $user_id);
        return $this->db->get()->result();
	}
}
