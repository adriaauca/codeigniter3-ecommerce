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
}
