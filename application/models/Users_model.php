<?php 

class Users_model extends CI_Model
{
    public function store($data)
	{
        $this->db->insert('users', $data);
        return $this->db->insert_id();
    }


    public function show($id)
	{
        $this->db->select('users.name, users.email, users.status, roles.name as role_name');
        $this->db->from('users');
        $this->db->join('roles', 'roles.id = users.fk_role_id');
        $this->db->where('users.id', $id);
        return $this->db->get()->row();
    }


    public function show_all()
	{
        $this->db->select('*');
        return $this->db->get('users')->result();
    }


    public function validate($email, $password)
	{

        $this->db->where('email', $email);
        $this->db->where('status', 1);
        $row = $this->db->get('users')->row();

        if($row)
        {
            if(password_verify($password, $row->password))
            {

                $sessionArray = array(  'id'=>$row->id,                    
                                        'name'=>$row->name,
                                        'fk_role_id'=>$row->fk_role_id,
                                        'isLoggedIn' => TRUE
                );

                $this->session->set_userdata($sessionArray);
            }
            else
            {
                return 'Wrong Password.';
            }
        }
        else
        {
            return 'Wrong Email Address.';
        }
    }


    public function update($id, $name, $email, $password, $status)
	{
        if ($name != NULL)
        {
            $this->db->set('name', $name);
        }
        if ($email != NULL)
        {
            $this->db->set('email', $email);
        }
        if ($password != NULL)
        {
            $this->db->set('password', $password);
        }
        $this->db->set('status', $status);
        $this->db->where('id', $id);
        $this->db->update('users');

		return $this->db->affected_rows();
	}


    public function destroy($id)
	{
		return $this->db->delete('users', array('id' => $id));
	}


    public function check_if_exist($id)
	{
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('id', $id);
        return $this->db->get()->row();
	}
}
