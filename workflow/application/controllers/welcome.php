<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->view('login');
	}
	
	public function check_login()
	{
		$data['email']=$this->input->post('email',TRUE);
		$data['password']=$this->input->post('password',TRUE);
		$result=$this->welcome_model->login_check($data);
		//echo '<pre>'.print_r($result).'</pre>';
		$sdata=array();
		if($result)
		{
			$sdata['user_id']=$result->user_id;
			$sdata['user_name']=$result->user_name;
			$sdata['user_type']=$result->user_type;
			if(!empty($result->user_department))
			{
				$sdata['user_department']=$result->user_department;
			}
			$this->session->set_userdata($sdata);
			redirect('homepage');
		}else
		{
			redirect('welcome');
		}
		
		
		
		
	}
}

