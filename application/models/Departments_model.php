<?php 

class Departments_model extends CI_Model
{
    public function get_departments()
	{
        $this->db->select('id, name');
        return $this->db->get('departments')->result();
    }
}
