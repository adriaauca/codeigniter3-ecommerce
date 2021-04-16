<?php 

class Departments_model extends CI_Model
{
    public function store($data)
	{
        $this->db->insert('departments', $data);
        return $this->db->insert_id();
    }


    public function show_all()
	{
        $this->db->select('*');
        return $this->db->get('departments')->result();
    }


    public function update($id, $name, $status)
	{
        if ($name != NULL)
        {
            $this->db->set('name', $name);
        }
        $this->db->set('status', $status);
        $this->db->where('id', $id);
        $this->db->update('departments');

		return $this->db->affected_rows();
	}


    public function destroy($id)
	{
		return $this->db->delete('departments', array('id' => $id));
	}


    public function check_if_exist($id)
	{
        $this->db->select('*');
        $this->db->from('departments');
        $this->db->where('id', $id);
        return $this->db->get()->row();
	}
}
