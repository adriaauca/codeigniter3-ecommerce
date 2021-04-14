<?php 

class Comments_model extends CI_Model
{
    public function store($data)
	{
        $this->db->insert('comments', $data);
        return $this->db->insert_id();
    }


    public function show($product_id)
	{
        $this->db->select('users.name as user_name, comments.review as review, comments.stars as stars, comments.date as date');
        $this->db->from('comments');
        $this->db->join('users', 'users.id = comments.fk_user_id');
		$this->db->where('fk_product_id', $product_id);
        return $this->db->get()->result();
	}


    public function update($product_id, $user_id, $stars, $review)
	{
        $this->db->set('stars', $stars);
        $this->db->set('review', $review);
        $this->db->where('fk_product_id', $product_id);
        $this->db->where('fk_user_id', $user_id);
        $this->db->update('comments');

		return $this->db->affected_rows();
	}


    public function destroy($product_id, $user_id)
	{
		return $this->db->delete('comments', array('fk_product_id' => $product_id, 'fk_user_id' => $user_id));
	}
}
