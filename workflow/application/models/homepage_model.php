<?php
class Homepage_Model extends CI_Model 
{
	
	function user_info($user_id)
	{
		$query = $this->db->get_where('user', array('user_id' => $user_id));
		return $result=$query->row();
	}
	
	function update_user_info($user_id)
	{
		$data=array();
		$data['user_name']=$this->input->post('name');
		$data['user_email']=$this->input->post('email');
		$data['user_department']=$this->input->post('dept');
		$data['user_gender']=$this->input->post('gender');
		$data['user_phone']=$this->input->post('phone');
		$data['date_of_birth']=$this->input->post('dob');
		$data['user_address']=$this->input->post('address');
		$this->db->where('user_id', $user_id);
		$result=$this->db->update('user',$data);
		return $result;
	}
	
	
	function update_profile_pic($data)
	{
		$this->db->where('user_id', $data['user_id']);
		$this->db->set('user_pic',$data['user_pic']);
		$this->db->update('user'); 
		
		

	}
	
	public function update_password($data)
	{
		$this->db->where('user_id', $data['user_id']);
		$this->db->where('user_password', $data['cur_pass']);
		$this->db->set('user_password',$data['new_pass1']);
		$result=$this->db->update('user'); 
		return $result;
	}
	
	function save_application($user_id)
	{
		$data['user_id']=$user_id;
		$data['app_id']= "A".random_string('numeric',4);
		$data['app_to']=$this->input->post('app_to');
		$data['subject']=$this->input->post('subject');
		$data['body']=$this->input->post('body');
		$result=$this->db->insert('application', $data);
		
		$target=$this->input->post('through');
		$tdata['app_id']=$data['app_id'];
		$num=count($target);
		for($i=0;$i<$num;$i++)
		{
			if(!empty($target[$i]))
			{
				$tdata['through_user']=$target[$i];
				$this->db->insert('througher', $tdata);
			}
		}
		
		return $result;

	}
	
	function user_all_application($user_id)
	{
		$this->db->select('*');
		$this->db->from('application');
		$this->db->where('user_id',$user_id);
		$this->db->order_by('id','desc');
		$query=$this->db->get();
		return $result=$query->result();
	}
	
	function all_user_info()
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('user_type > 1');
		$this->db->where('user_type <7 ');
		$query_result=$this->db->get();
        $result=$query_result->result_array();
        return $result;
	}
	
	function get_application($app_id)
	{
		$this->db->select('*');
		$this->db->from('application');
		$this->db->where('application.app_id',$app_id);
		$this->db->join('user','application.user_id=user.user_id');
		$this->db->join('througher','application.app_id=througher.app_id');
		$query_result=$this->db->get();
        $result=$query_result->result_array();
        
        $user_id=$result[0]['app_to'];
        $this->db->select('user_department,user_type');
        $this->db->from('user');
        $this->db->where('user_id',$user_id);
        $qurey=$this->db->get();
        
        $to_user_info=$qurey->row();
        
        $result[0]['user_type_to']=$to_user_info->user_type;
        $result[0]['user_department_to']=$to_user_info->user_department;
        
        $num=count($result);
        for($i=0;$i<$num;$i++)
		{
			$through_user_id=$result[$i]['through_user'];
        	$this->db->select('user_department,user_type');
        	$this->db->from('user');
        	$this->db->where('user_id',$through_user_id);
        	$qurey=$this->db->get();
        
        	$through_user_info=$qurey->row();
        	$result[$i]['through_user']=$through_user_info->user_type;
        	$result[$i]['user_department_through']=$through_user_info->user_department;
		}
       
        
        return $result;
	}
	
	 function get_inbox_application($user_id)
	 {
		$this->db->select('*');
		$this->db->from('application');
		$this->db->where('app_to',$user_id);
		$this->db->order_by('date','dsce');
		$query=$this->db->get();
		$result=$query->result();
		
		
		$this->db->select('*');
		$this->db->from('application');
		$this->db->join('througher','application.app_id=througher.app_id');
		$this->db->where('througher.through_user',$user_id);
		$this->db->order_by('application.date','desc');
		$query2=$this->db->get();
		$result2=$query2->result();
		
		foreach($result2 as $value)
		{
			$value->app_status=$value->through_status;
		}
		
		if(count($result)>0)
		{
			return $result; 
		}
		if(count($result2)>0)
		{
			
			return $result2; 
		}
		
	 }	
	
	function application_status_update($data)
	{
		
			$this->db->where('app_to', $data['user_id']);
			$this->db->where('app_id', $data['app_id']);
			$this->db->set('app_status',$data['pointer']);
			$this->db->set('date_status',$data['date_status']);
			$result=$this->db->update('application');
			
			$this->db->where('through_user', $data['user_id']);
			$this->db->where('app_id', $data['app_id']);
			$this->db->set('through_status',$data['pointer']);
			$this->db->set('date_status',$data['date_status']);
			$result=$this->db->update('througher');
			
			return $result; 
			
			
		
	}
	
	function save_comment($data)
	{
		$result=$this->db->insert('comment', $data);
		return $result;
	}
	
	function get_comment($app_id)
	{
		$this->db->select('*');
		$this->db->from('comment');
		$this->db->where('app_id',$app_id);
		
		$query_result=$this->db->get();
        $result=$query_result->result_array();
        return $result;
	}
	
	function check_application_status($app_id)
	{
		$this->db->select('*');
		$this->db->from('througher');
		$this->db->where('app_id',$app_id);
		
		
		$query_result=$this->db->get();
        $result=$query_result->result();
        $count=0;
        $num=count($result);
        foreach($result as $value)
        {
			if($value->through_status==1)
			{
				$count++;
			}
		}
		if($count==$num)
		{
			$this->db->select('*');
			$this->db->from('application');
			$this->db->where('app_id',$app_id);
			$query_result=$this->db->get();
        	$result2=$query_result->result();
        	return $result2;
		}
        
        
	}
	
	
	
	
	
	
	
	
	
	
	
	
}

?>