<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site extends  CI_Controller{
	function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->library('cart');
		$this->load->model('common_model');
		$this->website_name="Information Website ";
		if(!$this->session->userdata('language'))
		{
			$this->session->set_userdata('language','en');	}
			
	}
	
	public function index()
	{
		$lang='';
		if(isset($_GET['ln']))
		{
			$this->session->set_userdata('language',$_GET['ln']);
		}
	     $this->lang->load('content', $lang=='' ?  $this->session->userdata('language') : $lang);
		
       
        
        $data['btn_sub']= $this->lang->line('btn_sub');
        $data['btn_send']= $this->lang->line('btn_send');
        $data['contact']= $this->lang->line('contact');
        $data['our_add']= $this->lang->line('our_add');
        $data['connect_us']= $this->lang->line('connect_us');
        $data['connect_us_t']= $this->lang->line('connect_us_t');
        $data['home']= $this->lang->line('home');
        $data['newsletter']= $this->lang->line('newsletter');
    
        $data['newsletter_sub']= $this->lang->line('newsletter_sub');
        $data['c_email_p']= $this->lang->line('c_email_p');
   	
		 
		$this->newsletter();		
		$data['page_header']="Home | " . $this->website_name;
		$data['Website_name']=$this->website_name;
		$data['page']='home';
		$this->load->view('template',$data);
	}
	
 
	public function site_pages()
	{ 
	$lang='';
		if(isset($_GET['ln']))
		{
			$this->session->set_userdata('language',$_GET['ln']);
		}
	     $this->lang->load('content', $lang=='' ?  $this->session->userdata('language') : $lang);
		
       
        
        $data['btn_sub']= $this->lang->line('btn_sub');
        $data['btn_send']= $this->lang->line('btn_send');
        $data['contact']= $this->lang->line('contact');
        $data['our_add']= $this->lang->line('our_add');
        $data['connect_us']= $this->lang->line('connect_us');
        $data['connect_us_t']= $this->lang->line('connect_us_t');
        $data['home']= $this->lang->line('home');
        $data['newsletter']= $this->lang->line('newsletter');
        $data['newsletter_sub']= $this->lang->line('newsletter_sub');
        $data['c_email_p']= $this->lang->line('c_email_p');
   
		if(isset($_GET['pg_id']))
		{
			$this->newsletter();
			$pageid=base64_decode(base64_decode(base64_decode($_GET['pg_id'])));
			
			$result=$this->db->query("select * from  tbl_website_pages where id='".$pageid."'")->row();
			if($result)
			{
				
				$data['page_header']=$result->page_title." | " . $this->website_name;
				$data['Website_name']=$this->website_name;
				
				$this->load->view('site-header',$data);
				$this->load->view('pages',$result);
				$contact=$this->db->query("select * from  tbl_contact_details WHERE id='1'")->row();
				$this->load->view('site-footer',$contact);
				
			}
		}else
		{
			redirect(base_url().'site/');
		}
		
		
	}
	
	
	
	public function newsletter()
	{
		$lang='';
		if(isset($_GET['ln']))
		{
			$this->session->set_userdata('language',$_GET['ln']);
		}
	     $this->lang->load('content', $lang=='' ?  $this->session->userdata('language') : $lang);
	     
		 $data['btn_sub']= $this->lang->line('btn_sub');
        $data['btn_send']= $this->lang->line('btn_send');
        $data['contact']= $this->lang->line('contact');
        $data['our_add']= $this->lang->line('our_add');
        $data['connect_us']= $this->lang->line('connect_us');
        $data['connect_us_t']= $this->lang->line('connect_us_t');
        $data['home']= $this->lang->line('home');
        $data['newsletter']= $this->lang->line('newsletter');
        $data['newsletter_sub']= $this->lang->line('newsletter_sub');
        $data['c_email_p']= $this->lang->line('c_email_p');
   
		
		if(isset($_POST['btn_newsletter']))
		{
			$this->form_validation->set_rules('newsletter_user','Email Id','required|xss_clean|valid_email');
			if($this->form_validation->run())
			{
				 
				$q=$this->db->query("select * from tbl_newsletter where email_id='".$_POST['newsletter_user']."'")->row();
				if($q)
				{
				  $this->session->set_userdata('nl_error_msg','<span style="color:red">You are already subscribed.</span>');
				  redirect(current_url().'?'.$_SERVER['QUERY_STRING']);
				}
				else
				{
					$data_array=array('email_id'=>$_POST['newsletter_user']);
					$res=$this->common_model->insert_records('tbl_newsletter',$data_array);
					if($res)
					{
						$this->session->set_userdata('nl_succ_msg','1');
						$this->session->set_userdata('nl_error_msg','<span style="color:green">Thank You for subscribing to us, You will receive news and offer shortly.</span>');
					}
					else
					{
						 $this->session->set_userdata('nl_error_msg','<span style="color:red">Error occurred, Try again.</span>');
					}
					redirect(current_url().'?'.$_SERVER['QUERY_STRING']);
				}
			}
		}
	}
	public function contact()
	{
		$lang='';
		if(isset($_GET['ln']))
		{
			$this->session->set_userdata('language',$_GET['ln']);
		}
	     $this->lang->load('content', $lang=='' ?  $this->session->userdata('language') : $lang);
		 $data['btn_sub']= $this->lang->line('btn_sub');
        $data['btn_send']= $this->lang->line('btn_send');
        $data['contact']= $this->lang->line('contact');
        $data['our_add']= $this->lang->line('our_add');
        $data['connect_us']= $this->lang->line('connect_us');
        $data['connect_us_t']= $this->lang->line('connect_us_t');
        $data['home']= $this->lang->line('home');
        $data['newsletter']= $this->lang->line('newsletter');
        $data['newsletter_sub']= $this->lang->line('newsletter_sub');
        $data['c_email_p']= $this->lang->line('c_email_p');
        $data['c_name_p']= $this->lang->line('c_name_p');
        $data['c_message_p']= $this->lang->line('c_message_p');
   
		if(isset($_POST['btn_enq']))
		{
			$this->form_validation->set_rules('name','Name','required|xss_clean');
			$this->form_validation->set_rules('email','Email','required|xss_clean|valid_email');
			if($this->form_validation->run())
			{
				$data_array=array('name'=>$_POST['name'],'email'=>$_POST['email'],'message'=>$_POST['message']);
				$res=$this->common_model->insert_records('tbl_enquery',$data_array);
				if($res)
				{
					$this->session->set_userdata('cont_error_msg','<span style="color:green;font-size:18px;">Thank You for submiting Your Request...</span>');
				}
				else
				{
					$this->session->set_userdata('cont_error_msg','<span style="color:red;">Error occurred, Try again...</span>');
				}	
				redirect(base_url().'site/contact');
			}
			
			
		}
			    $data['page_header']="Contact Us| " . $this->website_name;
				$data['Website_name']=$this->website_name;
				
				$this->load->view('site-header',$data);
				$this->load->view('contact');
				
	}
	
	
	public function blogs()
	{
		$lang='';
		if(isset($_GET['ln']))
		{
			$this->session->set_userdata('language',$_GET['ln']);
		}
	     $this->lang->load('content', $lang=='' ?  $this->session->userdata('language') : $lang);
	     
		 $data['btn_sub']= $this->lang->line('btn_sub');
        $data['btn_send']= $this->lang->line('btn_send');
        $data['contact']= $this->lang->line('contact');
        $data['our_add']= $this->lang->line('our_add');
        $data['connect_us']= $this->lang->line('connect_us');
        $data['connect_us_t']= $this->lang->line('connect_us_t');
        $data['home']= $this->lang->line('home');
        $data['newsletter']= $this->lang->line('newsletter');
        $data['newsletter_sub']= $this->lang->line('newsletter_sub');
        $data['c_email_p']= $this->lang->line('c_email_p');
   
				$this->newsletter();
		
				if(isset($_GET['myblog']))
				{
					if(isset($_POST['btn_post_comment']))
					{
						$this->form_validation->set_rules('users_name', 'Person name','required|xss_clean');
						$this->form_validation->set_rules('email' ,'Person email','required|xss_clean');
						$this->form_validation->set_rules('comments', 'Comments','required|xss_clean');
						if($this->form_validation->run())
						{
							$data_field=array(
								'users_name'=>$_POST['users_name'],
								'email'=>$_POST['email'],
								'comments'=>$_POST['comments'],
								'blog_id'=>base64_decode(base64_decode(base64_decode($_POST['blog_id'])))
							);
							
							$ins=$this->common_model->insert_records('tbl_blog_comments',$data_field);
							if($ins)
							{
								$this->session->set_userdata('comment_msg','<span class="comment_suc">You Comments has been sent to admin for verification</span>');
							}
							else
							{
								$this->session->set_userdata('comment_msg','<span class="comment_err">Error occurred, try again</span>');	
							}
							redirect(base_url().'site/blogs?myblog='.$_POST['blog_id']);							
						}
						
					}
					
					$data['page_header']="My Blogs | " . $this->website_name;
					$data['Website_name']=$this->website_name;
					$this->load->view('site-header',$data);
					$this->load->view('single');
					$contact=$this->db->query("select * from  tbl_contact_details WHERE id='1'")->row();
					$this->load->view('site-footer',$contact);
					
				}
				else
				{
					
					$data['page_header']="My Blogs | " . $this->website_name;
					$data['Website_name']=$this->website_name;
					$this->load->view('site-header',$data);
					$this->load->view('blogs');
					$contact=$this->db->query("select * from  tbl_contact_details WHERE id='1'")->row();
					$this->load->view('site-footer',$contact);
				}
				
	}
	
	
	
	public function news()
	{
		$lang='';
		if(isset($_GET['ln']))
		{
			$this->session->set_userdata('language',$_GET['ln']);
		}
	     $this->lang->load('content', $lang=='' ?  $this->session->userdata('language') : $lang);
		 $data['btn_sub']= $this->lang->line('btn_sub');
        $data['btn_send']= $this->lang->line('btn_send');
        $data['contact']= $this->lang->line('contact');
        $data['our_add']= $this->lang->line('our_add');
        $data['connect_us']= $this->lang->line('connect_us');
        $data['connect_us_t']= $this->lang->line('connect_us_t');
        $data['home']= $this->lang->line('home');
        $data['newsletter']= $this->lang->line('newsletter');
        $data['newsletter_sub']= $this->lang->line('newsletter_sub');
        $data['c_email_p']= $this->lang->line('c_email_p');
		$this->newsletter();
	
		$data['page_header']="News | " . $this->website_name;
		$data['Website_name']=$this->website_name;
		$this->load->view('site-header',$data);
		$this->load->view('news');
		$contact=$this->db->query("select * from  tbl_contact_details WHERE id='1'")->row();
		$this->load->view('site-footer',$contact);
	}
	
	public function schedule()
	{
		$lang='';
		if(isset($_GET['ln']))
		{
			$this->session->set_userdata('language',$_GET['ln']);
		}
	     $this->lang->load('content', $lang=='' ?  $this->session->userdata('language') : $lang);
		 $data['btn_sub']= $this->lang->line('btn_sub');
        $data['btn_send']= $this->lang->line('btn_send');
        $data['contact']= $this->lang->line('contact');
        $data['our_add']= $this->lang->line('our_add');
        $data['connect_us']= $this->lang->line('connect_us');
        $data['connect_us_t']= $this->lang->line('connect_us_t');
        $data['home']= $this->lang->line('home');
        $data['newsletter']= $this->lang->line('newsletter');
        $data['newsletter_sub']= $this->lang->line('newsletter_sub');
        $data['c_email_p']= $this->lang->line('c_email_p');
   
		$this->newsletter();
	
	
		if(isset($_POST['btn_book_now']))
		{
			$this->form_validation->set_rules('appointment_date','Appointment Date','required|xss_clean');
			$this->form_validation->set_rules('appointment_time','Appointment Time','required|xss_clean');
			$this->form_validation->set_rules('person_name','Person Name','required|xss_clean');
			$this->form_validation->set_rules('person_email','Person Email','required|xss_clean');
			if($this->form_validation->run())
			{
				$data_fields=array(
					'appointment_date'=>$_POST['appointment_date'],
					'appointment_time'=>$_POST['appointment_time'],
					'person_name'=>$_POST['person_name'],
					'person_email'=>$_POST['person_email'],
					'person_phone'=>$_POST['person_phone']
				);
				
				$ins=$this->common_model->insert_records('tbl_booking_appointment',$data_fields);
				if($ins)
				{
					$this->session->set_userdata('comment_msg','<span class="comment_suc">We have received your reservation request, You will receive confirmation email shortly.</span>');
				}
				else
				{
					$this->session->set_userdata('comment_msg','<span class="comment_err">Error occurred, try again</span>');	
				}
			}
		}
		$data['page_header']="Appointment Schedule | " . $this->website_name;
		$data['Website_name']=$this->website_name;
		$this->load->view('site-header',$data);
		$this->load->view('schedule');
		$contact=$this->db->query("select * from  tbl_contact_details WHERE id='1'")->row();
		$this->load->view('site-footer',$contact);
	}
	
	public function calender_display()
	{
		$lang='';
		if(isset($_GET['ln']))
		{
			$this->session->set_userdata('language',$_GET['ln']);
		}
	     $this->lang->load('content', $lang=='' ?  $this->session->userdata('language') : $lang);
		 $data['btn_sub']= $this->lang->line('btn_sub');
        $data['btn_send']= $this->lang->line('btn_send');
        $data['contact']= $this->lang->line('contact');
        $data['our_add']= $this->lang->line('our_add');
        $data['connect_us']= $this->lang->line('connect_us');
        $data['connect_us_t']= $this->lang->line('connect_us_t');
        $data['home']= $this->lang->line('home');
        $data['newsletter']= $this->lang->line('newsletter');
        $data['newsletter_sub']= $this->lang->line('newsletter_sub');
        $data['c_email_p']= $this->lang->line('c_email_p');
        
   
		$this->load->view('dashboard/calender');
	}
	
	public function events()
	{
		$lang='';
		if(isset($_GET['ln']))
		{
			$this->session->set_userdata('language',$_GET['ln']);
		}
	     $this->lang->load('content', $lang=='' ?  $this->session->userdata('language') : $lang);
		 $data['btn_sub']= $this->lang->line('btn_sub');
        $data['btn_send']= $this->lang->line('btn_send');
        $data['contact']= $this->lang->line('contact');
        $data['our_add']= $this->lang->line('our_add');
        $data['connect_us']= $this->lang->line('connect_us');
        $data['connect_us_t']= $this->lang->line('connect_us_t');
        $data['home']= $this->lang->line('home');
        $data['newsletter']= $this->lang->line('newsletter');
        $data['newsletter_sub']= $this->lang->line('newsletter_sub');
        $data['c_email_p']= $this->lang->line('c_email_p');
   
		$this->newsletter();
	
		$data['page_header']="Events | " . $this->website_name;
		$data['Website_name']=$this->website_name;
		$this->load->view('site-header',$data);
		$this->load->view('event');
		$contact=$this->db->query("select * from  tbl_contact_details WHERE id='1'")->row();
		$this->load->view('site-footer',$contact);
	}
	public function get_appointment_time()
	{
		$lang='';
		if(isset($_GET['ln']))
		{
			$this->session->set_userdata('language',$_GET['ln']);
		}
	     $this->lang->load('content', $lang=='' ?  $this->session->userdata('language') : $lang);
		 $data['btn_sub']= $this->lang->line('btn_sub');
        $data['btn_send']= $this->lang->line('btn_send');
        $data['contact']= $this->lang->line('contact');
        $data['our_add']= $this->lang->line('our_add');
        $data['connect_us']= $this->lang->line('connect_us');
        $data['connect_us_t']= $this->lang->line('connect_us_t');
        $data['home']= $this->lang->line('home');
        $data['newsletter']= $this->lang->line('newsletter');
        $data['newsletter_sub']= $this->lang->line('newsletter_sub');
        $data['c_email_p']= $this->lang->line('c_email_p');
   
		$ins=$this->db->query("select * from  tbl_schedule WHERE start_date='".$_GET['svalue']."' and is_available='1' ");
		if($ins->result()>0)
		{
			foreach($ins->result() as $rows)
			{
				echo '<option value="'.$rows->start_time.'-'.$rows->end_time.'">'.$rows->start_time.'-'.$rows->end_time.'</option>';
			}
		}
		else
		{
			echo "<option value>No Appointment on this day</option>";
		}
		
	}
	
	public function confirm_booking()
	{
		$lang='';
		if(isset($_GET['ln']))
		{
			$this->session->set_userdata('language',$_GET['ln']);
		}
	     $this->lang->load('content', $lang=='' ?  $this->session->userdata('language') : $lang);
		 $data['btn_sub']= $this->lang->line('btn_sub');
        $data['btn_send']= $this->lang->line('btn_send');
        $data['contact']= $this->lang->line('contact');
        $data['our_add']= $this->lang->line('our_add');
        $data['connect_us']= $this->lang->line('connect_us');
        $data['connect_us_t']= $this->lang->line('connect_us_t');
        $data['home']= $this->lang->line('home');
        $data['newsletter']= $this->lang->line('newsletter');
        $data['newsletter_sub']= $this->lang->line('newsletter_sub');
        $data['c_email_p']= $this->lang->line('c_email_p');
   
			$data['page_header']="Appointment Confirmation | " . $this->website_name;
			$data['Website_name']=$this->website_name;
			$this->load->view('site-header',$data);
			$this->load->view('confirm-booking');
			$contact=$this->db->query("select * from  tbl_contact_details WHERE id='1'")->row();
			$this->load->view('site-footer',$contact);
	}
	 
}
?>