<?php

class Welcome_Model extends CI_Model
{
	
	public function login_check($data)
	{
		     
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('user_email',$data['email']);
        $this->db->where('user_password',$data['password']);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
        
    }
		
		
	
	
}

?>