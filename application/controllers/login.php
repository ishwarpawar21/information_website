<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->website_name="Product Website ";
	}
	
	public function d_login()
	{
		if(isset($_POST['btn_login']))
		{
			$this->form_validation->set_rules('username' , 'Username','required|xss_clean|valid_email');
			$this->form_validation->set_rules('password' , 'Password','required|xss_clean');
			if($this->form_validation->run())
			{
				$result=$this->db->query("select * FROM  tbl_admin WHERE username = '".$_POST['username']."' and password='".md5($_POST['password'])."'")->row();
				
				if($result)
				{
					$this->session->set_userdata('Ausername',$result->username);
					$this->session->set_userdata('Af_name',$result->f_name);
					$this->session->set_userdata('Al_name',$result->l_name);
					$this->session->set_userdata('Apassword',$_POST['password']);
					$this->session->set_userdata('is_logged_in','1');
					redirect(base_url().'dashboard/');
				}
				else
				{
					$this->session->set_userdata('error_msg',"Invalid Username and Password");
					redirect(base_url().'login/d_login/');
				}
				
			}
			
		}
		$data['page_header']="Admin Login | " . $this->website_name;
		$data['Website_name']=$this->website_name;
		$data['page']='login';
		$this->load->view('dashboard/login',$data);
	
	}
	
	
	
}
?>