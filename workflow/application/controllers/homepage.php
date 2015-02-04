<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Homepage extends CI_Controller {
	function __construct() {
		
		parent::__construct();
		if(empty($this->session->userdata('user_id')))
		{
			redirect('welcome','refresh');
		}
	}
	
	
	function index()
	{
		$user_id=$this->session->userdata('user_id');
		$result=$this->homepage_model->user_info($user_id);
		$data['sidebar']=$this->load->view('home/sidebar',$result,TRUE);
		$user_info['user']=$this->homepage_model->all_user_info();
		//print_r($user_info);
		$data['content']=$this->load->view('home/create_application',$user_info,TRUE);
		$this->load->view('home/home',$data);
	}
	
	//View User profile
	
	function view_profile()
	{
		$user_id=$this->session->userdata('user_id');
		$result=$this->homepage_model->user_info($user_id);
		$data['content']=$this->load->view('home/view_profile',$result,TRUE);
		$this->load->view('home/home',$data);
	}
	
	//Update user information
	
	function update_user()
	{
		$sdata=array();
		$user_id=$this->session->userdata('user_id');
		$result=$this->homepage_model->update_user_info($user_id);
		if($result)
		{
			$sdata['success_msg']="Profile update successfully";
			$this->session->set_userdata($sdata);
		}
		
		redirect('homepage/view_profile');
	}
	
	//Upload user profile picture
	
	public function do_upload()
    {
       	$config['upload_path'] = './images/profile_pic/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '100';
		$config['max_width']  = '400';
		$config['max_height']  = '600';
		$config['overwrite']  = 'true';

		//$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if ( ! $this->upload->do_upload())
		{
			$sdata=array();
			$sdata['msg'] = $this->upload->display_errors();
			$this->session->set_userdata($sdata);
			redirect('homepage/view_profile');
		}
		else
		{
			$image_path=$this->upload->data();
			$data['user_pic']=$image_path['file_name'];
			$data['user_id']=$this->session->userdata('user_id');
			$this->homepage_model->update_profile_pic($data);
			$sdata['msg']="Profile picture upload successfully...";
			$this->session->set_userdata($sdata);
			redirect('homepage/view_profile');
		}
    }
    
    //Change user password view page
    
    function change_password()
    {
    	
    	$data['content']=$this->load->view('home/change_password','',TRUE);
		$this->load->view('home/home',$data);
	}
	
	//Change user password
	
	function password_change()
    {
    	$data['cur_pass']=$this->input->post('cur_pass');
    	$data['new_pass1']=$this->input->post('newpass1');
		$data['user_id']=$this->session->userdata('user_id');
	   $result= $this->homepage_model->update_password($data);
		if($result)
		{
			$sdata['msg']="Password chnage successfully...";
			$this->session->set_userdata($sdata);
			redirect('homepage/change_password');
		}
	}
	
	//Log out 
	
	function logout()
	{
		$this->session->unset_userdata('user_name');
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('user_type');
		$this->session->unset_userdata('user_department');
		redirect('welcome');
	}
	
	//Save application 
	
	public function save_application()
	{
		$user_id=$this->session->userdata('user_id');
		$target=$this->input->post('through');
		$result= $this->homepage_model->save_application($user_id);
		if($result)
		{
			$sdata['msg']="Application submission successfully...";
			$this->session->set_userdata($sdata);
			redirect('Homepage');
		}
	}
	
	//Manage application
	
	function manage_application()
	{
		
		$user_id=$this->session->userdata('user_id');
		$result=$this->homepage_model->user_info($user_id);
		$data['sidebar']=$this->load->view('home/sidebar',$result,TRUE);
		$app_info['app']=$this->homepage_model->user_all_application($user_id);
		$data['content']=$this->load->view('home/manage_application',$app_info,TRUE);
		$this->load->view('home/home',$data);
	}
	
	//View application
	
	function view_application()
	{
		$user_id=$this->session->userdata('user_id');
		$app_id = $this->uri->segment(3);
		$result=$this->homepage_model->user_info($user_id);
		$data['sidebar']=$this->load->view('home/sidebar',$result,TRUE);
		$app_info['app']=$this->homepage_model->get_application($app_id);
		$app_info['comment']=$this->homepage_model->get_comment($app_id);
		$data['content']=$this->load->view('home/view_application',$app_info,TRUE);
		$this->load->view('home/home',$data);
	}
	
	//View inbox application
	
	function inbox()
	{
		$user_id=$this->session->userdata('user_id');
		$result=$this->homepage_model->user_info($user_id);
		$data['sidebar']=$this->load->view('home/sidebar',$result,TRUE);
		$app_info=$this->homepage_model->get_inbox_application($user_id);
		$i=0;
		
		foreach($app_info as $value)
		{
			$app_id=$value->app_id;
			//echo($app_id);
			$all_app['app'][]=$this->homepage_model->check_application_status($app_id);
			//print_r($all_app);
		}
		//print_r($all_app);		
		$data['content']=$this->load->view('home/manage_application',$all_app,TRUE);
		$this->load->view('home/home',$data);
	}
	
	//Update application status
	
	function accept_application()
	{
		$data['user_id']=$this->session->userdata('user_id');
		$data['app_id'] = $this->uri->segment(3);
		$data['pointer'] =1;
		date_default_timezone_set('Asia/Dhaka');
    	$data['date_status'] = date('Y-m-d H:i:s');
		$result=$this->homepage_model->application_status_update($data);
		
		if($result)
		{
			$sdata['success_msg']="Application Accepted!";
			$this->session->set_userdata($sdata);
			redirect("Homepage/view_application/".$data['app_id']);
			
		}
	}
	
	function reject_application()
	{
		$data['user_id']=$this->session->userdata('user_id');
		$data['app_id'] = $this->uri->segment(3);
		$data['pointer'] =2;
		date_default_timezone_set('Asia/Dhaka');
    	$data['date_status'] = date('Y-m-d H:i:s');
		$result=$this->homepage_model->application_status_update($data);
		
		if($result)
		{
			$sdata['reject_msg']="Application Rejected!";
			$this->session->set_userdata($sdata);
			redirect("Homepage/view_application/".$data['app_id']);
			
		}
	}
	
	//Comment 
	
	function do_comment()
	{
		$data['user_name']=$this->session->userdata('user_name');
		if($this->session->userdata('user_type')==2)
			{
				$data['designation'] ="Vice Chancellor";
			}elseif($this->session->userdata('user_type')==3)
			{
				$data['designation'] = "Register";
			}elseif($this->session->userdata('user_type')==4)
			{
				$data['designation'] ="Dean";
			}elseif($this->session->userdata('user_type')==5)
			{
				$data['designation'] = "Head of the ".$this->session->userdata('user_department')." Department";
			}
		$data['app_id']=$this->input->post('app_id');
		$data['comment']=$this->input->post('comment');
		$result=$this->homepage_model->save_comment($data);
		
		if($result)
		{
			redirect('homepage/view_application/'.$data['app_id']);
		}
	}
	
	
	
	
	
	
	
	
	
}

?>