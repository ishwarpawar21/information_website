<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct() 
	
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->model('common_model');
		$this->check_login();
		$this->load->library('upload');
		$this->website_name="Information Website ";
		if(!$this->session->userdata('language'))
		{
			$this->session->set_userdata('language','en');	
		}

	}
	
	public function index()
	{
		$this->wd();
	}
	
	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url().'login/d_login');
	}
	public function check_login()
	{
		if($this->session->userdata('is_logged_in')!='1')
		{
			$this->session->set_userdata('error_msg',"Please Enter your username and password.");
			redirect(base_url().'login/d_login');
		}
	}
	
	public function calender_display()
	{
		$this->load->view('dashboard/calender');
	}
	public function wd()
	{
		$lang='';
		if(isset($_GET['ln']))
		{
			$this->session->set_userdata('language',$_GET['ln']);
		}
	     $this->lang->load('content', $lang=='' ?  $this->session->userdata('language') : $lang);
		
       
        
        $data['dashboard']= $this->lang->line('dashboard');
        $data['web_setting']= $this->lang->line('web_setting');
        $data['web_slider']= $this->lang->line('web_slider');
        $data['home_page_setting']= $this->lang->line('home_page_setting');
        $data['blog']= $this->lang->line('blog');
        $data['news']= $this->lang->line('news');
        $data['event']= $this->lang->line('event');
        $data['appointment']= $this->lang->line('appointment');
        $data['reservation']= $this->lang->line('reservation');
        $data['web_pages']= $this->lang->line('web_pages');
        $data['video']= $this->lang->line('video');
        
        $data['newsletter']= $this->lang->line('newsletter');
        $data['sub_user']= $this->lang->line('sub_user');
        $data['web_enq']= $this->lang->line('web_enq');
        $data['contact_details']= $this->lang->line('contact_details');        
        $data['designed_by']= $this->lang->line('designed_by');        


		$data['page_header']="Dashboard | " . $this->website_name;
		$data['Website_name']=$this->website_name;
		$data['page']='content';
		$this->load->view('dashboard/template',$data);
	}
	
	function account_details()
	{
		$lang='';
		if(isset($_GET['ln']))
		{
			$this->session->set_userdata('language',$_GET['ln']);
		}
	     $this->lang->load('content', $lang=='' ?  $this->session->userdata('language') : $lang);
		
       
        
        $data['dashboard']= $this->lang->line('dashboard');
        $data['web_setting']= $this->lang->line('web_setting');
        $data['web_slider']= $this->lang->line('web_slider');
        $data['home_page_setting']= $this->lang->line('home_page_setting');
        $data['blog']= $this->lang->line('blog');
        $data['news']= $this->lang->line('news');
        $data['event']= $this->lang->line('event');
        $data['appointment']= $this->lang->line('appointment');
        $data['reservation']= $this->lang->line('reservation');
        $data['web_pages']= $this->lang->line('web_pages');
        $data['video']= $this->lang->line('video');
        
        $data['newsletter_design']= $this->lang->line('newsletter_design');
        $data['newsletter']= $this->lang->line('newsletter');
        $data['sub_user']= $this->lang->line('sub_user');
        $data['web_enq']= $this->lang->line('web_enq');
        $data['contact_details']= $this->lang->line('contact_details');        
        $data['designed_by']= $this->lang->line('designed_by');        



		if(isset($_POST['btn_update_account']))
		{
			$this->form_validation->set_rules('f_name','First Name','required|xss_clean');
			$this->form_validation->set_rules('l_name','Last Name','required|xss_clean');
			$this->form_validation->set_rules('address','Address','required|xss_clean');
			$this->form_validation->set_rules('phno','Phone No','required|xss_clean');
			
			
			if($this->form_validation->run())
			{
				$data_array=array(
					'f_name'=>$_POST['f_name'],
					'l_name'=>$_POST['l_name'],
					'address'=>$_POST['address'],
					'phno'=>$_POST['phno'],
					'profile_pic'=>'account_pic.jpg',
				);
				
					
				$config=array('upload_path' => 'assets/dashboard/uploads/', 'allowed_types' => 'jpg', 'file_name'=>'account_pic.jpg', 'overwrite'=> True,);
				$this->upload->initialize($config); // Important
				$this->upload->do_upload("profile_pic");
				$datas=($this->upload->data());
				//echo "<br/>";
				
				if($datas['file_size'] >0 )
				{
					$config["source_image"] = 'assets/dashboard/uploads/account_pic.jpg';
					$config['new_image'] = 'assets/dashboard/uploads/account_pic.jpg';
					$config["width"] = 100;
					$config["height"] = 100;

					$this->load->library('image_lib', $config);
					$this->image_lib->fit();
				}
				
				
				
			$result=$this->common_model->update_records('tbl_admin',$data_array,'username',$this->session->userdata('Ausername'));
				if($result)
				{ 
				  $this->session->set_userdata('error_msg','Account details Updated...');
				  $this->session->set_userdata('error_cls','success');
				 }
				else
				{ 
				  $this->session->set_userdata('error_msg','Error Occurred, Try again...');
				  $this->session->set_userdata('error_cls','danger'); 
				}
				
				redirect(base_url().'dashboard/account_details/');
			}
			
		}
		$data['page_header']="Account Details | " . $this->website_name;
		$data['Website_name']=$this->website_name;
		$data['page']='admin-account';
		$this->load->view('dashboard/template',$data);
	}
	
	public function account_settings()
	{
		$lang='';
		if(isset($_GET['ln']))
		{
			$this->session->set_userdata('language',$_GET['ln']);
		}
	     $this->lang->load('content', $lang=='' ?  $this->session->userdata('language') : $lang);
		
       
        
        $data['dashboard']= $this->lang->line('dashboard');
        $data['web_setting']= $this->lang->line('web_setting');
        $data['web_slider']= $this->lang->line('web_slider');
        $data['home_page_setting']= $this->lang->line('home_page_setting');
        $data['blog']= $this->lang->line('blog');
        $data['news']= $this->lang->line('news');
        $data['event']= $this->lang->line('event');
        $data['appointment']= $this->lang->line('appointment');
        $data['reservation']= $this->lang->line('reservation');
        $data['web_pages']= $this->lang->line('web_pages');
        $data['video']= $this->lang->line('video');      
       $data['newsletter_design']= $this->lang->line('newsletter_design');
        $data['newsletter']= $this->lang->line('newsletter');
        $data['sub_user']= $this->lang->line('sub_user');
        $data['web_enq']= $this->lang->line('web_enq');
        $data['contact_details']= $this->lang->line('contact_details');        
        $data['designed_by']= $this->lang->line('designed_by');        



		if(isset($_POST['btn_password']))
		{
			$this->form_validation->set_rules('password','Old Password','required|xss_clean|trim');
			$this->form_validation->set_rules('Npassword','New Password','min_length[4]|max_length[10]|required|xss_clean|trim');
			$this->form_validation->set_rules('Cpassword','Confirm Password','matches[Npassword]|required|xss_clean|trim');
			if($this->form_validation->run())
			{
				if(($_POST['password'])!=$this->session->userdata('Apassword'))
				{
					$this->session->set_userdata('error_msg','Please enter correct previous password');
					$this->session->set_userdata('error_cls','danger');
				}
				else
				{
					$data_field=array(
						'password'=>md5($_POST['Npassword']),
					);
					$result=$this->common_model->update_records('tbl_admin',$data_field,'username',$this->session->userdata('Ausername'));
					if($result)
					{
						$this->session->set_userdata('Apassword',$_POST['Npassword']);
						$this->session->set_userdata('admin_logged_in','1');
					
						$this->session->set_userdata('error_msg','Account Password Updated Sucessfully..');
						$this->session->set_userdata('error_cls','success');
					}
					else
					{
						$this->session->set_userdata('error_msg','Error occurred, Try again...');
						$this->session->set_userdata('error_cls','danger');
					}
				}
					redirect(base_url().'dashboard/account_settings');
			}
			
		}
		$data['page_header']="Account Settings | " . $this->website_name;
		$data['Website_name']=$this->website_name;
		$data['page']='admin-settings';
		$this->load->view('dashboard/template',$data);
	}
	
	
	public function website_pages()
	{
		$lang='';
		if(isset($_GET['ln']))
		{
			$this->session->set_userdata('language',$_GET['ln']);
		}
	     $this->lang->load('content', $lang=='' ?  $this->session->userdata('language') : $lang);
		
       
        
        $data['dashboard']= $this->lang->line('dashboard');
        $data['web_setting']= $this->lang->line('web_setting');
        $data['web_slider']= $this->lang->line('web_slider');
        $data['home_page_setting']= $this->lang->line('home_page_setting');
        $data['blog']= $this->lang->line('blog');
        $data['news']= $this->lang->line('news');
        $data['event']= $this->lang->line('event');
        $data['appointment']= $this->lang->line('appointment');
        $data['reservation']= $this->lang->line('reservation');
        $data['web_pages']= $this->lang->line('web_pages');
        $data['video']= $this->lang->line('video');
        
        $data['newsletter_design']= $this->lang->line('newsletter_design');
        $data['newsletter']= $this->lang->line('newsletter');
        $data['sub_user']= $this->lang->line('sub_user');
        $data['web_enq']= $this->lang->line('web_enq');
        $data['contact_details']= $this->lang->line('contact_details');        
        $data['designed_by']= $this->lang->line('designed_by');        
        
        $data['mng_web_pages']= $this->lang->line('mng_web_pages');
        $data['create_page']= $this->lang->line('create_page');    
        
        $data['status_p']= $this->lang->line('status_p');   
        $data['status_u']= $this->lang->line('status_u');
        $data['edit']= $this->lang->line('edit');
        $data['update']= $this->lang->line('update');
        $data['delete']= $this->lang->line('delete');        
        $data['btn_add']= $this->lang->line('btn_add');
        $data['tbl_action']= $this->lang->line('tbl_action');
        $data['tbl_menu_name']= $this->lang->line('tbl_menu_name');
        $data['tbl_postion']= $this->lang->line('tbl_postion');
        $data['tbl_sr_no']= $this->lang->line('tbl_sr_no');
        $data['tbl_action']= $this->lang->line('tbl_action');
        $data['tbl_status']= $this->lang->line('tbl_status');
        
        $data['page_menu_name']= $this->lang->line('page_menu_name');
        $data['page_menu_name_p']= $this->lang->line('page_menu_name_p');
        $data['page_title']= $this->lang->line('page_title');
        $data['page_title_p']= $this->lang->line('page_title_p');
        $data['page_pos']= $this->lang->line('page_pos');
        $data['page_pos_p']= $this->lang->line('page_pos_p');
        $data['page_content']= $this->lang->line('page_content');
        $data['page_content_p']= $this->lang->line('page_content_p');
        
        $data['header']= $this->lang->line('header');
        $data['footer']= $this->lang->line('footer');
        $data['create']= $this->lang->line('create');
        
        
        
		$data['page_header']="Account Settings | " . $this->website_name;
		$data['Website_name']=$this->website_name;
			
		if(isset($_GET['pg']))
		{
			if(isset($_POST['btn_create_page']))
			{
				$this->form_validation->set_rules('menu_name','Menu Name','required|xss_clean');
				$this->form_validation->set_rules('page_title','Page Title','required|xss_clean');
				$this->form_validation->set_rules('page_position','Page Position','required|xss_clean');
				$this->form_validation->set_rules('page_content','Page Content','required|xss_clean');
				
				if($this->form_validation->run())
				{
					
					$max_id=$this->common_model->search_maxid('tbl_website_pages');
					$data_field=array(
						'id'=>$max_id,
						'menu_name'=>$_POST['menu_name'],
						'page_title'=>$_POST['page_title'],
						'page_position'=>$_POST['page_position'],
						'page_content'=>$_POST['page_content']
					);
					$q=$this->common_model->insert_records('tbl_website_pages',$data_field);
					if($q)
					{
					  	$this->session->set_userdata('error_msg',$this->lang->line('page_add_succ'));
						$this->session->set_userdata('error_cls','success');
						redirect(base_url().'dashboard/website_pages/');
					}
					else
					{
						$this->session->set_userdata('error_msg',$this->lang->line('page_add_err'));
						$this->session->set_userdata('error_cls','danger');
						redirect(base_url().'dashboard/website_pages?pg='.base64_encode('website-pages-create'));
					}
				}
				
				
			}
			else
			if(isset($_POST['btn_edit_page']))
			{
				$this->form_validation->set_rules('menu_name','Menu Name','required|xss_clean');
				$this->form_validation->set_rules('page_title','Page Title','required|xss_clean');
				$this->form_validation->set_rules('page_position','Page Position','required|xss_clean');
				$this->form_validation->set_rules('page_content','Page Content','required|xss_clean');
				
				if($this->form_validation->run())
				{
					$data_field=array(						
						'menu_name'=>$_POST['menu_name'],
						'page_title'=>$_POST['page_title'],
						'page_position'=>$_POST['page_position'],
						'page_content'=>$_POST['page_content']
					);
					$q=$this->common_model->update_records('tbl_website_pages',$data_field,'id',base64_decode($_POST['id']));
					if($q)
					{
						$this->session->set_userdata('error_msg',$this->lang->line('page_up_succ'));
						$this->session->set_userdata('error_cls','success');
						redirect(base_url().'dashboard/website_pages/');
					}
					else
					{
						$this->session->set_userdata('error_msg',$this->lang->line('page_up_un'));
						$this->session->set_userdata('error_cls','danger');
						redirect(base_url().'dashboard/website_pages?pg='.base64_encode('website-pages-create'));
					}
				}
			}
			else
			
			
			$data['page']=base64_decode($_GET['pg']);
			$this->load->view('dashboard/template',$data);
		}
		
		 if(isset($_GET['ch']))
			{
					if($_GET['ch']=='down')
				{
				$stat=$this->common_model->updateStatus('tbl_website_pages',base64_decode($_GET['id']),'0');
				if($stat)
				{
					$this->session->set_userdata('error_msg',$this->lang->line('page_p'));
					$this->session->set_userdata('error_cls','success');
				}
				else
				{
					$this->session->set_userdata('error_msg',$this->lang->line('page_err'));
					$this->session->set_userdata('error_cls','danger');
				}
				redirect(base_url().'dashboard/website_pages');
			}
			else
			if($_GET['ch']=='up')
			{
				$stat=$this->common_model->updateStatus('tbl_website_pages',base64_decode($_GET['id']),'1');
				if($stat)
				{
					$this->session->set_userdata('error_msg',$this->lang->line('page_u'));
					$this->session->set_userdata('error_cls','success');
				}
				else
				{
					$this->session->set_userdata('error_msg',$this->lang->line('page_err'));
					$this->session->set_userdata('error_cls','danger');
				}
				redirect(base_url().'dashboard/website_pages');
			}
			
			else
			if($_GET['ch']=='del')
			{
		
				$q=$this->common_model->deleteRecords('tbl_website_pages',base64_decode($_GET['id']));
				if($q)
					{
						$this->session->set_userdata('error_msg',$this->lang->line('page_d_succ'));
						$this->session->set_userdata('error_cls','success');
					}
					else
					{
						$this->session->set_userdata('error_msg',$this->lang->line('page_d_un'));
						$this->session->set_userdata('error_cls','danger');
					}
				redirect(base_url().'dashboard/website_pages/');
			}
				redirect(base_url().'dashboard/website_pages/');
		 }
		else
		{
			$data['page']='website-pages-manage';
			$this->load->view('dashboard/template',$data);
		}
	}
	
	public function contact_details()
	{
		$lang='';
		if(isset($_GET['ln']))
		{
			$this->session->set_userdata('language',$_GET['ln']);
		}
	     $this->lang->load('content', $lang=='' ?  $this->session->userdata('language') : $lang);
		
       
        
        $data['dashboard']= $this->lang->line('dashboard');
        $data['web_setting']= $this->lang->line('web_setting');
        $data['web_slider']= $this->lang->line('web_slider');
        $data['home_page_setting']= $this->lang->line('home_page_setting');
        $data['blog']= $this->lang->line('blog');
        $data['news']= $this->lang->line('news');
        $data['event']= $this->lang->line('event');
        $data['appointment']= $this->lang->line('appointment');
        $data['reservation']= $this->lang->line('reservation');
        $data['web_pages']= $this->lang->line('web_pages');
        $data['video']= $this->lang->line('video');
       
       $data['newsletter_design']= $this->lang->line('newsletter_design');
        $data['newsletter']= $this->lang->line('newsletter');
        $data['sub_user']= $this->lang->line('sub_user');
        $data['web_enq']= $this->lang->line('web_enq');
        $data['contact_details']= $this->lang->line('contact_details');        
        $data['designed_by']= $this->lang->line('designed_by');        

                
        $data['contact_edit_t']= $this->lang->line('contact_edit_t');          
        $data['c_email']= $this->lang->line('c_email');          
        $data['c_phone']= $this->lang->line('c_phone');          
        $data['c_fax_no']= $this->lang->line('c_fax_no');          
        $data['c_address']= $this->lang->line('c_address');  
         
        $data['c_email_p']= $this->lang->line('c_email_p');          
        $data['c_phone_p']= $this->lang->line('c_phone_p');          
        $data['c_fax_no_p']= $this->lang->line('c_fax_no_p');          
        $data['c_address_p']= $this->lang->line('c_address_p');  

        $data['update']= $this->lang->line('update');  
        $data['back']= $this->lang->line('back');  

		if(isset($_POST['btn_update_contact']))
		{
			$this->form_validation->set_rules('email_id','Email Id','required|xss_clean');
			$this->form_validation->set_rules('phone_no','Phone No','required|xss_clean');
			$this->form_validation->set_rules('address','Address','required|xss_clean');
			if($this->form_validation->run())
			{
				$data_field=array(
					'email_id'=>$_POST['email_id'],
					'phone_no'=>$_POST['phone_no'],
					'fax_no'=>$_POST['fax_no'],
					'address'=>$_POST['address']			
				);
				$result=$this->common_model->update_records('tbl_contact_details',$data_field,'id','1');
				if($result)
					{
						$this->session->set_userdata('error_msg',$this->lang->line('c_add_succ'));
						$this->session->set_userdata('error_cls','success');
					}
					else
					{
						$this->session->set_userdata('error_msg',$this->lang->line('c_add_un')
						);
						$this->session->set_userdata('error_cls','danger');
					}
					redirect(base_url().'dashboard/contact_details/');
			}
			
		}
		$data['page_header']="Contact Details | " . $this->website_name;
		$data['Website_name']=$this->website_name;
		$data['page']='contact-details';
		$this->load->view('dashboard/template',$data);
		
	}
	
	public function website_settings()
	{
		$lang='';
		if(isset($_GET['ln']))
		{
			$this->session->set_userdata('language',$_GET['ln']);
		}
	     $this->lang->load('content', $lang=='' ?  $this->session->userdata('language') : $lang);
		
       
        
        $data['dashboard']= $this->lang->line('dashboard');
        $data['web_setting']= $this->lang->line('web_setting');
        $data['web_slider']= $this->lang->line('web_slider');
        $data['home_page_setting']= $this->lang->line('home_page_setting');
        $data['blog']= $this->lang->line('blog');
        $data['news']= $this->lang->line('news');
        $data['event']= $this->lang->line('event');
        $data['appointment']= $this->lang->line('appointment');
        $data['reservation']= $this->lang->line('reservation');
        $data['web_pages']= $this->lang->line('web_pages');
        $data['video']= $this->lang->line('video');
       $data['newsletter_design']= $this->lang->line('newsletter_design'); 
        $data['newsletter']= $this->lang->line('newsletter');
        $data['sub_user']= $this->lang->line('sub_user');
        $data['web_enq']= $this->lang->line('web_enq');
        $data['contact_details']= $this->lang->line('contact_details');        
        $data['designed_by']= $this->lang->line('designed_by');   
        
        $data['web_logo_title']= $this->lang->line('web_logo_title');        
        $data['choose_logo']= $this->lang->line('choose_logo');        
 		$data['uploaded_logo']= $this->lang->line('uploaded_logo');        
 		$data['current_pos']= $this->lang->line('current_pos');        
 		$data['logo_postion']= $this->lang->line('logo_postion');        
 		$data['postion_left']= $this->lang->line('postion_left');        
 		$data['postion_right']= $this->lang->line('postion_right');  
 		      
 		$data['web_details_title']= $this->lang->line('web_details_title');        
 		$data['web_d_title']= $this->lang->line('web_d_title');        
 		$data['web_title']= $this->lang->line('web_title');   
 	    $data['web_title_p']= $this->lang->line('web_title_p');      
 		$data['meta_key']= $this->lang->line('meta_key');    
 		$data['meta_key_p']= $this->lang->line('meta_key_p');        
 		$data['web_discription']= $this->lang->line('web_discription');
 		$data['web_discription_p']= $this->lang->line('web_discription_p');
 		        
 		$data['web_soicial_title']= $this->lang->line('web_soicial_title');  
 		$data['facebook']= $this->lang->line('facebook');      
 		$data['twitter']= $this->lang->line('twitter'); 
 		$data['google']= $this->lang->line('google');        
 		$data['youetube']= $this->lang->line('youetube');
 		$data['linkedin']= $this->lang->line('linkedin'); 
 		$data['facebook_p']= $this->lang->line('facebook_p');      
 		$data['twitter_p']= $this->lang->line('twitter_p'); 
 		$data['google_p']= $this->lang->line('google_p');        
 		$data['youetube_p']= $this->lang->line('youetube_p');
 		$data['linkedin_p']= $this->lang->line('linkedin_p');
 		 		
 		$data['btn_set']= $this->lang->line('btn_set'); 
 		$data['btn_update']= $this->lang->line('btn_update');        
 		$data['btn_upload']= $this->lang->line('btn_upload');       
       
        $data['web_email_title']= $this->lang->line('web_email_title');        
 		$data['contact_enq']= $this->lang->line('contact_enq');
 	    $data['contact_enq_p']= $this->lang->line('contact_enq_p');
 		$data['contact_new']= $this->lang->line('contact_new'); 
 		$data['contact_new_p']= $this->lang->line('contact_new_p'); 
 		              
 		$data['contact_support']= $this->lang->line('contact_support');
 		$data['contact_support_p']= $this->lang->line('contact_support_p');



		if(isset($_POST['btn_update_logo']))
		{				
				$config=array('upload_path' => 'assets/dashboard/uploads/', 'allowed_types' => 'png', 'file_name'=>'logo.png', 'overwrite'=> True,);
				$this->upload->initialize($config); // Important
				$this->upload->do_upload("website_logo");
				$datas=($this->upload->data());
				//echo "<br/>";
				
				if($datas['file_size'] >0 )
				{
					$config["source_image"] = 'assets/dashboard/uploads/logo.png';
					$config['new_image'] = 'assets/dashboard/uploads/logo.png';
					$config["width"] = 200;
					$config["height"] = 50;

					$this->load->library('image_lib', $config);
					$this->image_lib->fit();
					
					$data_field=array('logo'=>$datas['file_name']);
					
					$this->common_model->update_records('tbl_website_settings',$data_field,'id','1');
					$this->session->set_userdata('error_msg',$this->lang->line('logo_succ'));
					$this->session->set_userdata('error_cls','success');
					
				}
				else
				{
					$this->session->set_userdata('error_msg',$this->lang->line('logo_un'));
					$this->session->set_userdata('error_cls','danger');
				}
				redirect(base_url().'dashboard/website_settings/');
		}else
		if(isset($_POST['btn_update_details']))
		{
			$this->form_validation->set_rules('website_title','Website Title','required|xss_clean');
			$this->form_validation->set_rules('keywords','Meta Keywords','required|xss_clean');
			$this->form_validation->set_rules('description','Website Description','required|xss_clean');
		
			
			if($this->form_validation->run())
			{
				$data_field=array('website_title'=>$_POST['website_title'],'keywords'=>$_POST['keywords'],'description'=>$_POST['description']);
					
					$q=$this->common_model->update_records('tbl_website_settings',$data_field,'id','1');
					if($q)
					{
						$this->session->set_userdata('error_msg',$this->lang->line('web_succ'));
						$this->session->set_userdata('error_cls','success');
					}
					else
					{
						$this->session->set_userdata('error_msg',$this->lang->line('web_un'));
						$this->session->set_userdata('error_cls','danger');
					}
					redirect(base_url().'dashboard/website_settings/');
					
			}
			
		}
		else
		if(isset($_POST['btn_update_logo_position']))
		{
			$this->form_validation->set_rules('logo_position','Logo Position','required');
			
			if($this->form_validation->run())
			{
				$data_field=array('logo_position'=>$_POST['logo_position']);
					
					$q=$this->common_model->update_records('tbl_website_settings',$data_field,'id','1');
					if($q)
					{
						$this->session->set_userdata('error_msg',$this->lang->line('logo_pos_succ'));
						$this->session->set_userdata('error_cls','success');
					}
					else
					{
						$this->session->set_userdata('error_msg',$this->lang->line('logo_pos_un'));
						$this->session->set_userdata('error_cls','danger');
					}
					redirect(base_url().'dashboard/website_settings/');
			}
		}else
		if(isset($_POST['btn_update_social_link']))
		{ 
				$data_field=array(
					'facebook'=>$_POST['facebook'],
					'twitter'=>$_POST['twitter'],
					'google_plus'=>$_POST['google_plus'],
					'youtube'=>$_POST['youtube'],
					'linkedin'=>$_POST['linkedin']
				);
					
					$q=$this->common_model->update_records('tbl_website_settings',$data_field,'id','1');
					if($q)
					{
						$this->session->set_userdata('error_msg',$this->lang->line('social_succ'));
						$this->session->set_userdata('error_cls','success');
					}
					else
					{
						$this->session->set_userdata('error_msg',$this->lang->line('social_un'));
						$this->session->set_userdata('error_cls','danger');
					}
						redirect(base_url().'dashboard/website_settings/');
					
		}
		else
		if(isset($_POST['btn_update_api']))
		{
			 
				$data_field=array('payment_api'=>$_POST['payment_api']);
					
					$q=$this->common_model->update_records('tbl_website_settings',$data_field,'id','1');
					if($q)
					{
						$this->session->set_userdata('error_msg','Apyment Api Key Sucessfully..');
						$this->session->set_userdata('error_cls','success');
					}
					else
					{
						$this->session->set_userdata('error_msg','Error Occurred Try again...');
						$this->session->set_userdata('error_cls','danger');
					}
						redirect(base_url().'dashboard/website_settings/');
					
		
		}
		else
		if(isset($_POST['btn_update_emails']))
		{
			$data_field=array('for_contact_page'=>$_POST['for_contact_page'],'for_newsletter_page'=>$_POST['for_newsletter_page'],'for_support'=>$_POST['for_support']);
					
					$q=$this->common_model->update_records('tbl_website_settings',$data_field,'id','1');
					if($q)
					{
						$this->session->set_userdata('error_msg','Website Emaild Ids Are Updated Sucessfully..');
						$this->session->set_userdata('error_cls','success');
					}
					else
					{
						$this->session->set_userdata('error_msg','Error Occurred Try again...');
						$this->session->set_userdata('error_cls','danger');
					}
					redirect(base_url().'dashboard/website_settings/');
		
		}
		$data['page_header']="Website Settings | " . $this->website_name;
		$data['Website_name']=$this->website_name;
	 	$data['page']='website-settings';
		$this->load->view('dashboard/template',$data);
	}
	
	public function website_slider()
	{		
	 $lang='';
		if(isset($_GET['ln']))
		{
			$this->session->set_userdata('language',$_GET['ln']);
		}
	     $this->lang->load('content', $lang=='' ?  $this->session->userdata('language') : $lang);
		
       
        
        $data['dashboard']= $this->lang->line('dashboard');
        $data['web_setting']= $this->lang->line('web_setting');
        $data['web_slider']= $this->lang->line('web_slider');
        $data['home_page_setting']= $this->lang->line('home_page_setting');
        $data['blog']= $this->lang->line('blog');
        $data['news']= $this->lang->line('news');
        $data['event']= $this->lang->line('event');
        $data['appointment']= $this->lang->line('appointment');
        $data['reservation']= $this->lang->line('reservation');
        $data['web_pages']= $this->lang->line('web_pages');
        $data['video']= $this->lang->line('video');
        $data['newsletter_design']= $this->lang->line('newsletter_design');
        
        $data['newsletter']= $this->lang->line('newsletter');
        $data['sub_user']= $this->lang->line('sub_user');
        $data['web_enq']= $this->lang->line('web_enq');
        $data['contact_details']= $this->lang->line('contact_details');        
        $data['designed_by']= $this->lang->line('designed_by');      
        
        $data['web_s_title']= $this->lang->line('web_s_title');
        $data['web_s_heading']= $this->lang->line('web_s_heading');
        $data['web_s_heading_p']= $this->lang->line('web_s_heading_p');
        $data['web_s_discription']= $this->lang->line('web_s_discription');  
        $data['web_s_discription_p']= $this->lang->line('web_s_discription_p');        
        $data['web_s_title2']= $this->lang->line('web_s_title2');   
        
        $data['tbl_sr_no']= $this->lang->line('tbl_sr_no');
        $data['tbl_heading']= $this->lang->line('tbl_heading');
        $data['tbl_discription']= $this->lang->line('tbl_discription');
        $data['tbl_status']= $this->lang->line('tbl_status');  
              
        $data['status_p']= $this->lang->line('status_p');   
        $data['status_u']= $this->lang->line('status_u');
        $data['edit']= $this->lang->line('edit');
        $data['update']= $this->lang->line('update');
        $data['delete']= $this->lang->line('delete');        
        $data['btn_add']= $this->lang->line('btn_add');
        $data['tbl_action']= $this->lang->line('tbl_action');

		$data['page_header']="Website Slider | " . $this->website_name;
		$data['Website_name']=$this->website_name;
		 	
		if(isset($_GET['ch']))
		{
			if($_GET['ch']=='down')
			{
				$stat=$this->common_model->updateStatus('tbl_website_slider',base64_decode($_GET['id']),'0');
				if($stat)
				{
					$this->session->set_userdata('error_msg',$this->lang->line('web_s_p'));
					$this->session->set_userdata('error_cls','success');
				}
				else
				{
					$this->session->set_userdata('error_msg',$this->lang->line('web_s_error'));
					$this->session->set_userdata('error_cls','danger');
				}
				redirect(base_url().'dashboard/website_slider');
			}
			else
			if($_GET['ch']=='up')
			{
				$stat=$this->common_model->updateStatus('tbl_website_slider',base64_decode($_GET['id']),'1');
				if($stat)
				{
					$this->session->set_userdata('error_msg',$this->lang->line('web_s_u'));
					$this->session->set_userdata('error_cls','success');
				}
				else
				{
					$this->session->set_userdata('error_msg',$this->lang->line('web_s_error'));
					$this->session->set_userdata('error_cls','danger');
				}
				redirect(base_url().'dashboard/website_slider');
			}
			else
			{
				$q=$this->common_model->deleteRecords('tbl_website_slider',base64_decode($_GET['id']));
				if($q)
					{
						$this->session->set_userdata('error_msg',$this->lang->line('web_s_del_succ'));
						$this->session->set_userdata('error_cls','success');
					}
					else
					{
						$this->session->set_userdata('error_msg',$this->lang->line('web_s_del_un'));
						$this->session->set_userdata('error_cls','danger');
					}
				redirect(base_url().'dashboard/website_slider/');
			}
			}else
			if(isset($_POST['btn_add_slider']))
			{ 
				$this->form_validation->set_rules('headings','Page Title','required|xss_clean');
				$this->form_validation->set_rules('descriptions','Page Position','required|xss_clean');
				
				if($this->form_validation->run())
				{					
					$max_id=$this->common_model->search_maxid('tbl_website_slider');
					$data_field=array(
						'id'=>$max_id,
						'headings'=>$_POST['headings'],
						'descriptions'=>$_POST['descriptions']
					);
					
					$q=$this->common_model->insert_records('tbl_website_slider',$data_field);
					if($q)
					{
					  	$this->session->set_userdata('error_msg',$this->lang->line('web_s_add_succ'));
						$this->session->set_userdata('error_cls','success');
						redirect(base_url().'dashboard/website_slider/');
					}
					else
					{
						$this->session->set_userdata('error_msg',$this->lang->line('web_add_un'));
						$this->session->set_userdata('error_cls','danger');
						redirect(base_url().'dashboard/website_slider');
					}
				}
			}
			 
			  
			
			$data['page']='website-slider-manage';
			$this->load->view('dashboard/template',$data);
   }
   
   public function webside_slider_update()
   {
   	$lang='';
		if(isset($_GET['ln']))
		{
			$this->session->set_userdata('language',$_GET['ln']);
		}
	     $this->lang->load('content', $lang=='' ?  $this->session->userdata('language') : $lang);
		
       
        
        $data['dashboard']= $this->lang->line('dashboard');
        $data['web_setting']= $this->lang->line('web_setting');
        $data['web_slider']= $this->lang->line('web_slider');
        $data['home_page_setting']= $this->lang->line('home_page_setting');
        $data['blog']= $this->lang->line('blog');
        $data['news']= $this->lang->line('news');
        $data['event']= $this->lang->line('event');
        $data['appointment']= $this->lang->line('appointment');
        $data['reservation']= $this->lang->line('reservation');
        $data['web_pages']= $this->lang->line('web_pages');
        $data['video']= $this->lang->line('video');
        $data['newsletter_design']= $this->lang->line('newsletter_design');
        
        
        $data['newsletter']= $this->lang->line('newsletter');
        $data['sub_user']= $this->lang->line('sub_user');
        $data['web_enq']= $this->lang->line('web_enq');
        $data['contact_details']= $this->lang->line('contact_details');        
        $data['designed_by']= $this->lang->line('designed_by');        
        
        $data['web_s_title']= $this->lang->line('web_s_title');  
        $data['web_s_heading']= $this->lang->line('web_s_heading'); 
        $data['update']= $this->lang->line('update'); 
        
        $data['web_s_heading_p']= $this->lang->line('web_s_heading_p');  
        $data['web_s_discription']= $this->lang->line('web_s_discription');  
        $data['web_s_discription_p']= $this->lang->line('web_s_discription_p');  
     
        $data['update']= $this->lang->line('update');  
     
        
        
        
        
   			$data['page_header']="Website Slider | " . $this->website_name;
			$data['Website_name']=$this->website_name;
			
			if(isset($_POST['btn_edit_slide']))
			{
				$this->form_validation->set_rules('headings','Page Title','required|xss_clean');
				$this->form_validation->set_rules('descriptions','Page Position','required|xss_clean');
				
				if($this->form_validation->run())
				{
					$data_field=array(						
						'headings'=>$_POST['headings'],
						'descriptions'=>$_POST['descriptions']
					);
					$q=$this->common_model->update_records('tbl_website_slider',$data_field,'id',base64_decode($_POST['id']));
					if($q)
					{
						$this->session->set_userdata('error_msg','Webpage Updated Sucessfully..');
						$this->session->set_userdata('error_cls','success');
						redirect(base_url().'dashboard/website_slider/');
					}
					else
					{
						$this->session->set_userdata('error_msg','Error occurred, Try again...');
						$this->session->set_userdata('error_cls','danger');
						redirect(base_url().'dashboard/website_pages?id='.base64_encode('website-pages-create'));
					}
				}
			}
			
   			$data['page']='website-slider-edit';
			$this->load->view('dashboard/template',$data);
   }
   
   public function home_page()
   {
   	$lang='';
		if(isset($_GET['ln']))
		{
			$this->session->set_userdata('language',$_GET['ln']);
		}
	     $this->lang->load('content', $lang=='' ?  $this->session->userdata('language') : $lang);
		
       
        
        $data['dashboard']= $this->lang->line('dashboard');
        $data['web_setting']= $this->lang->line('web_setting');
        $data['web_slider']= $this->lang->line('web_slider');
        $data['home_page_setting']= $this->lang->line('home_page_setting');
        $data['blog']= $this->lang->line('blog');
        $data['news']= $this->lang->line('news');
        $data['event']= $this->lang->line('event');
        $data['appointment']= $this->lang->line('appointment');
        $data['reservation']= $this->lang->line('reservation');
        $data['web_pages']= $this->lang->line('web_pages');
        $data['video']= $this->lang->line('video');
        $data['newsletter_design']= $this->lang->line('newsletter_design');
        $data['newsletter']= $this->lang->line('newsletter');
        $data['sub_user']= $this->lang->line('sub_user');
        $data['web_enq']= $this->lang->line('web_enq');
        $data['contact_details']= $this->lang->line('contact_details');        
        $data['designed_by']= $this->lang->line('designed_by');   
        
        $data['web_banner_t']= $this->lang->line('web_banner_t');   
        $data['banner_choose']= $this->lang->line('banner_choose');   
        $data['banner_uploaded']= $this->lang->line('banner_uploaded');
        $data['banner_current_pos']= $this->lang->line('banner_current_pos');
        $data['banner_pos']= $this->lang->line('banner_pos');
        
        $data['add_web_upper_info_t']= $this->lang->line('add_web_upper_info_t');
        $data['ib_select_image']= $this->lang->line('ib_select_image');
        $data['ib_img_meta_key']= $this->lang->line('ib_img_meta_key');
        $data['ib_heading']= $this->lang->line('ib_heading');
        $data['ib_discrption']= $this->lang->line('ib_discrption');
        
        $data['ib_img_meta_key_p']= $this->lang->line('ib_img_meta_key_p');
        $data['ib_heading_p']= $this->lang->line('ib_heading_p');
        $data['ib_discrption_p']= $this->lang->line('ib_discrption_p');
        
        $data['bg_title']= $this->lang->line('bg_title');
        $data['m_clolor_title']= $this->lang->line('m_clolor_title');
        $data['select_bg_color']= $this->lang->line('select_bg_color');
        $data['bg_title2']= $this->lang->line('bg_title2');
        $data['select_h_color']= $this->lang->line('select_h_color');
        
        $data['mng_upper_infobox_t']= $this->lang->line('mng_upper_infobox_t');
        $data['m_clolor_title']= $this->lang->line('m_clolor_title');
        $data['select_bg_color']= $this->lang->line('select_bg_color');
        $data['bg_title2']= $this->lang->line('bg_title2');
        $data['select_h_color']= $this->lang->line('select_h_color');
        
         $data['wb_lowerinfo_t']= $this->lang->line('wb_lowerinfo_t');
        $data['lbx_t']= $this->lang->line('lbx_t');
        $data['lbx_t_p']= $this->lang->line('lbx_t_p');
        $data['lbx_bg_color']= $this->lang->line('lbx_bg_color');
        $data['add_lowerinfo_t']= $this->lang->line('add_lowerinfo_t');
         $data['lbx_heading']= $this->lang->line('lbx_heading');
        $data['lbx_heading_p']= $this->lang->line('lbx_heading_p');
        $data['lbx_dis']= $this->lang->line('lbx_dis');
        $data['lbx_dis_p']= $this->lang->line('lbx_dis_p');
        
        $data['wb_bottom_cnt']= $this->lang->line('wb_bottom_cnt');
         $data['bt_cnt_heading']= $this->lang->line('bt_cnt_heading');
        $data['bt_cnt_heading_p']= $this->lang->line('bt_cnt_heading_p');
        $data['bt_cnt_dis']= $this->lang->line('bt_cnt_dis');
        $data['bt_cnt_dis_p']= $this->lang->line('bt_cnt_dis_p');
        
        $data['tbl_sr_no']= $this->lang->line('tbl_sr_no');
        $data['tbl_heading']= $this->lang->line('tbl_heading');
        $data['tbl_discription']= $this->lang->line('tbl_discription');
        $data['tbl_status']= $this->lang->line('tbl_status');
        $data['tbl_img']= $this->lang->line('tbl_img');
        $data['tbl_meta_key']= $this->lang->line('tbl_meta_key');
        $data['tbl_action']= $this->lang->line('tbl_action');
        
        $data['status_p']= $this->lang->line('status_p');
        $data['status_u']= $this->lang->line('status_u');
        $data['mng_lbx_t']= $this->lang->line('mng_lbx_t');
        
        $data['edit']= $this->lang->line('edit');
        $data['update']= $this->lang->line('update');
        $data['delete']= $this->lang->line('delete');
        
        $data['btn_set']= $this->lang->line('btn_set');
        $data['btn_add']= $this->lang->line('btn_add');
        $data['btn_upload']= $this->lang->line('btn_upload');
        $data['postion_left']= $this->lang->line('postion_left');
        $data['postion_right']= $this->lang->line('postion_right');
        $data['postion_top']= $this->lang->line('postion_top');
        $data['postion_bottom']= $this->lang->line('postion_bottom');
 
        
     


   			$data['page_header']="Website Home Page Settings | " . $this->website_name;
			$data['Website_name']=$this->website_name;
			$data['page']='home-page-manage';
			
			if(isset($_GET['pg']))
			{
				$data['page']=base64_decode($_GET['pg']);
			}
			else
			if(isset($_GET['ch']))
			{
				if($_GET['ch']=='del_lowwer')
					{
						
						$result=$this->common_model->deleteRecords('tbl_lower_infobox',base64_decode($_GET['id']));
						if($result)
								{
									$this->session->set_userdata('error_msg',$this->lang->line('l_info_d_succ'));
									$this->session->set_userdata('error_cls','success');
								}
								else
								{
									$this->session->set_userdata('error_msg',$this->lang->line('l_info_d_un'));
									$this->session->set_userdata('error_cls','danger');
								}
								redirect(base_url().'dashboard/home_page/');
					
					}
					else
				if($_GET['ch']=='del_upper')
					{
						$result=$this->common_model->deleteRecords('tbl_info_box',base64_decode($_GET['id']));
						if($result)
								{
									$this->session->set_userdata('error_msg',$this->lang->line('up_info_d_succ'));
									$this->session->set_userdata('error_cls','success');
								}
								else
								{
									$this->session->set_userdata('error_msg',$this->lang->line('up_info_un'));
									$this->session->set_userdata('error_cls','danger');
								}
								redirect(base_url().'dashboard/home_page/');
					}
					else
					if($_GET['ch']=='down')
					{
						$stat=$this->common_model->updateStatus('tbl_lower_infobox',base64_decode($_GET['id']),'0');
						if($stat)
						{
							$this->session->set_userdata('error_msg',$this->lang->line('l_info_p'));
							$this->session->set_userdata('error_cls','success');
						}
						else
						{
							$this->session->set_userdata('error_msg',$this->lang->line('l_info_err'));
							$this->session->set_userdata('error_cls','danger');
						}
						redirect(base_url().'dashboard/home_page');
					}
					else
					if($_GET['ch']=='up')
					{
						$stat=$this->common_model->updateStatus('tbl_lower_infobox',base64_decode($_GET['id']),'1');
						if($stat)
						{
							$this->session->set_userdata('error_msg',$this->lang->line('l_info_u'));
							$this->session->set_userdata('error_cls','success');
						}
						else
						{
							$this->session->set_userdata('error_msg',$this->lang->line('l_info_err'));
							$this->session->set_userdata('error_cls','danger');
						}
						redirect(base_url().'dashboard/home_page');
					}
					else
					if($_GET['ch']=='down1')
					{
						$stat=$this->common_model->updateStatus('tbl_info_box',base64_decode($_GET['id']),'0');
						if($stat)
						{
							$this->session->set_userdata('error_msg',$this->lang->line('up_info_p'));
							$this->session->set_userdata('error_cls','success');
						}
						else
						{
							$this->session->set_userdata('error_msg',$this->lang->line('up_info_err'));
							$this->session->set_userdata('error_cls','danger');
						}
						redirect(base_url().'dashboard/home_page');
					}
					else
					if($_GET['ch']=='up1')
					{
						$stat=$this->common_model->updateStatus('tbl_info_box',base64_decode($_GET['id']),'1');
						if($stat)
						{
							$this->session->set_userdata('error_msg',$this->lang->line('up_info_u'));
							$this->session->set_userdata('error_cls','success');
						}
						else
						{
							$this->session->set_userdata('error_msg',$this->lang->line('up_info_err'));
							$this->session->set_userdata('error_cls','danger');
						}
						redirect(base_url().'dashboard/home_page');
					}
			 }
			if(isset($_POST['btn_update_banner']))
			{						
				$config=array('upload_path' => 'assets/dashboard/uploads/', 'allowed_types' => 'jpg', 'file_name'=>'banner.jpg', 'overwrite'=> True,);
				$this->upload->initialize($config); // Important
				$this->upload->do_upload("website_banner");
				$datas=($this->upload->data());
				//echo "<br/>";
				
				if($datas['file_size'] >0 )
				{
					$this->session->set_userdata('error_msg',$this->lang->line('banner_up_succ'));
					$this->session->set_userdata('error_cls','success');
					
				}
				else
				{
					$this->session->set_userdata('error_msg',$this->lang->line('banner_up_un'));
					$this->session->set_userdata('error_cls','danger');
				}
				redirect(base_url().'dashboard/home_page/');
		
			}
			else
		if(isset($_POST['btn_update_banner_position']))
		{
			$this->form_validation->set_rules('banner_position','Banner Position','required');
			
			if($this->form_validation->run())
			{
				$data_field=array('banner_position'=>$_POST['banner_position']);
					
					$q=$this->common_model->update_records('tbl_home_page_settings',$data_field,'id','1');
					if($q)
					{
						$this->session->set_userdata('error_msg',$this->lang->line('banner_pos_succ'));
						$this->session->set_userdata('error_cls','success');
					}
					else
					{
						$this->session->set_userdata('error_msg',$this->lang->line('banner_pos_un'));
						$this->session->set_userdata('error_cls','danger');
					}
					redirect(base_url().'dashboard/home_page/');
			}
		
		}
		else
		if(isset($_POST['btn_add_infobox']))
		{ 	
			$this->form_validation->set_rules('headings','Heading','required|xss_clean');
			$this->form_validation->set_rules('short_description','Short Description','required|xss_clean');
			
			if($this->form_validation->run())
			{
				$config=array('upload_path' => 'assets/dashboard/uploads/info_box', 'allowed_types' => 'jpg', 'overwrite'=> True,);
				$this->upload->initialize($config); // Important
				$this->upload->do_upload("info_image");
				$datas=($this->upload->data());
				//echo "<br/>";
				
				if($datas['file_size'] >0 )
				{
					$config["source_image"] = 'assets/dashboard/uploads/info_box/'.$datas['file_name'];
					$config['new_image'] = 'assets/dashboard/uploads/info_box/'.$datas['file_name'];
					$config["width"] = 320;
					$config["height"] = 320;

					$this->load->library('image_lib', $config);
					$this->image_lib->fit();
			  
						$data_field=array(
							'image_name'=>$datas['file_name'],
							'headings'=>$_POST['headings'],
							'meta_keywords'=>$_POST['meta_keywords'],
							'short_description'=>$_POST['short_description']
							);
						$this->common_model->insert_records('tbl_info_box',$data_field);
					 
						
						$this->session->set_userdata('error_msg',$this->lang->line('up_info_add_succ'));
						$this->session->set_userdata('error_cls','success');
						
					}
					else
					{
						$this->session->set_userdata('error_msg',$this->lang->line('up_info_add_un'));
						$this->session->set_userdata('error_cls','danger');
						
					}
					redirect(base_url().'dashboard/home_page/');
		
			}
		}
		
		else
		if(isset($_POST['btn_update_infobox']))
		{		
			$this->form_validation->set_rules('headings','Heading','required|xss_clean');
			$this->form_validation->set_rules('short_description','Short Description','required|xss_clean');
			
			if($this->form_validation->run())
			{
				$config=array('upload_path' => 'assets/dashboard/uploads/info_box', 'allowed_types' => 'jpg', 'overwrite'=> True,);
				$this->upload->initialize($config); // Important
				$this->upload->do_upload("info_image");
				$datas=($this->upload->data());
				//echo "<br/>";
				
				if($datas['file_size'] >0 )
				{
					$config["source_image"] = 'assets/dashboard/uploads/info_box/'.$datas['file_name'];
					$config['new_image'] = 'assets/dashboard/uploads/info_box/'.$datas['file_name'];
					$config["width"] = 320;
					$config["height"] = 320;

					$this->load->library('image_lib', $config);
					$this->image_lib->fit();
			  
						$data_field=array(
							'image_name'=>$datas['file_name'],
							'headings'=>$_POST['headings'],
							'meta_keywords'=>$_POST['meta_keywords'],
							'short_description'=>$_POST['short_description']
							);
						$this->common_model->update_records('tbl_info_box',$data_field,'id',base64_decode($_POST['id']));
						
						$this->session->set_userdata('error_msg',$this->lang->line('up_info_up_succ'));
						$this->session->set_userdata('error_cls','success');
					}
					else
					{
						$this->session->set_userdata('error_msg',$this->lang->line('up_info_up_un'));
						$this->session->set_userdata('error_cls','danger');
					}
					redirect(base_url().'dashboard/home_page/');
			}
		}
		else
		if(isset($_POST['btn_update_lower_infobox']))
		{		
			$this->form_validation->set_rules('headings','Heading','required|xss_clean');
			$this->form_validation->set_rules('short_description','Short Description','required|xss_clean');
			
			if($this->form_validation->run())
			{
				 
						$data_field=array(
						 	'headings'=>$_POST['headings'],
							'short_descriptions'=>$_POST['short_description']
							);
						$ins=$this->common_model->update_records('tbl_lower_infobox',$data_field,'id',base64_decode($_POST['id']));
					if($ins)	
					{
						$this->session->set_userdata('error_msg',$this->lang->line('l_info_up_succ'));
						$this->session->set_userdata('error_cls','success');
					}
					else
					{
						$this->session->set_userdata('error_msg',$this->lang->line('l_info_up_un'));
						$this->session->set_userdata('error_cls','danger');
					}
					redirect(base_url().'dashboard/home_page/');
			}
			
		}
		else
		if(isset($_POST['btn_update_lower_tile']))
		{
			$this->form_validation->set_rules('lower_title','Lower Infobox Title','required|xss_clean');
			$this->form_validation->set_rules('lowerinfo_background_color','Lower Infobox Color','required|xss_clean');
			if($this->form_validation->run())
			{
				$data_field=array( 'lower_title'=>$_POST['lower_title'], 'lowerinfo_background_color'=>$_POST['lowerinfo_background_color'] );
				$stat=$this->common_model->update_records('tbl_home_page_settings',$data_field,'id','1');
				if($stat)
				{
					$this->session->set_userdata('error_msg',$this->lang->line('l_info_t_succ'));
					$this->session->set_userdata('error_cls','success');	
				}
				else
				{
					$this->session->set_userdata('error_msg',$this->lang->line('l_info_t_un'));
					$this->session->set_userdata('error_cls','danger');
					
				}
				
			redirect(base_url().'dashboard/home_page/');
			}
		}
		else
		if(isset($_POST['btn_add_lower_infobox']))
		{
			$this->form_validation->set_rules('headings','Lower Infobox headings','required|xss_clean');
			$this->form_validation->set_rules('short_description','Lower Short Descriptions ','required|xss_clean');
			if($this->form_validation->run())
			{
				$data_field=array( 'headings'=>$_POST['headings'],'short_descriptions'=>$_POST['short_description'], );
				$stat=$this->common_model->insert_records('tbl_lower_infobox',$data_field);
				if($stat)
				{
					$this->session->set_userdata('error_msg',$this->lang->line('l_info_add_succ'));
					$this->session->set_userdata('error_cls','success');	
				}
				else
				{
					$this->session->set_userdata('error_msg',$this->lang->line('l_info_add_un'));
					$this->session->set_userdata('error_cls','danger');
					
				}
				
			redirect(base_url().'dashboard/home_page/');
			}
		}
		else
		if(isset($_POST['btn_update_container']))
		{
			$this->form_validation->set_rules('bottom_container_heads','Container headings','required|xss_clean');
			$this->form_validation->set_rules('bottom_container_desc','Container Descriptions ','required|xss_clean');
			if($this->form_validation->run())
			{
				$data_field=array( 'bottom_container_heads'=>$_POST['bottom_container_heads'],'bottom_container_desc'=>base64_encode($_POST['bottom_container_desc']) );
				$stat=$this->common_model->update_records('tbl_home_page_settings',$data_field,'id','1');
				if($stat)
				{
					$this->session->set_userdata('error_msg',$this->lang->line('web_b_succ'));
					$this->session->set_userdata('error_cls','success');	
				}
				else
				{
					$this->session->set_userdata('error_msg',$this->lang->line('web_b_un'));
					$this->session->set_userdata('error_cls','danger');
					
				}
				
			redirect(base_url().'dashboard/home_page/');
			}
		}
		
		else
		if(isset($_POST['btn_set_menu_background_color']))
		{
			$this->form_validation->set_rules('menu_background_color','Colour','required|xss_clean');
			
			if($this->form_validation->run())
			{
				$data_field=array( 'menu_background_color'=>$_POST['menu_background_color']);
				$stat=$this->common_model->update_records('tbl_home_page_settings ',$data_field,'id','1');
				if($stat)
				{
					$this->session->set_userdata('error_msg',$this->lang->line('bk_c_succ'));
					$this->session->set_userdata('error_cls','success');	
				}
				else
				{
					$this->session->set_userdata('error_msg',$this->lang->line('bk_c_un'));
					$this->session->set_userdata('error_cls','danger');
					
				}
				
			redirect(base_url().'dashboard/home_page/');
			}
		}
		
		else
		if(isset($_POST['btn_set_menu_hover_color']))
		{
			$this->form_validation->set_rules('menu_hover_color','Colour','required|xss_clean');
			
			if($this->form_validation->run())
			{
				$data_field=array( 'menu_hover_color'=>$_POST['menu_hover_color']);
				$stat=$this->common_model->update_records('tbl_home_page_settings ',$data_field,'id','1');
				if($stat)
				{
					$this->session->set_userdata('error_msg',$this->lang->line('hw_c_succ'));
					$this->session->set_userdata('error_cls','success');	
				}
				else
				{
					$this->session->set_userdata('error_msg',$this->lang->line('h'));
					$this->session->set_userdata('error_cls','danger');
					
				}
				
			redirect(base_url().'dashboard/home_page/');
			}
		}
		
		
			$this->load->view('dashboard/template',$data);
   }
   
	public function product_details()
	{
		$lang='';
		if(isset($_GET['ln']))
		{
			$this->session->set_userdata('language',$_GET['ln']);
		}
	     $this->lang->load('content', $lang=='' ?  $this->session->userdata('language') : $lang);
		
       
        
        $data['dashboard']= $this->lang->line('dashboard');
        $data['web_setting']= $this->lang->line('web_setting');
        $data['web_slider']= $this->lang->line('web_slider');
        $data['home_page_setting']= $this->lang->line('home_page_setting');
        $data['blog']= $this->lang->line('blog');
        $data['news']= $this->lang->line('news');
        $data['event']= $this->lang->line('event');
        $data['appointment']= $this->lang->line('appointment');
        $data['reservation']= $this->lang->line('reservation');
        $data['web_pages']= $this->lang->line('web_pages');
        $data['video']= $this->lang->line('video');
        $data['newsletter_design']= $this->lang->line('newsletter_design');
        $data['newsletter']= $this->lang->line('newsletter');
        $data['sub_user']= $this->lang->line('sub_user');
        $data['web_enq']= $this->lang->line('web_enq');
        $data['contact_details']= $this->lang->line('contact_details');        
        $data['designed_by']= $this->lang->line('designed_by');        


		if(isset($_POST['btn_update_account']))
		{
			$this->form_validation->set_rules('product_name','Product Name','required|xss_clean');
			$this->form_validation->set_rules('short_description','Short Description','required|xss_clean');
			$this->form_validation->set_rules('price','Price','required|xss_clean');
			$this->form_validation->set_rules('available_qty','Quantity','required|xss_clean');
			$this->form_validation->set_rules('long_description','Long Description','required|xss_clean');
			$this->form_validation->set_rules('tax','Tax','required|xss_clean');
			$this->form_validation->set_rules('shipping_charges','Shipping Charges','required|xss_clean');
			
			if($this->form_validation->run())
			{
				
				$data_field=array(
					'product_name'=>$_POST['product_name'],
					'short_description'=>$_POST['short_description'],
					'price'=>$_POST['price'],
					'available_qty'=>$_POST['available_qty'],
					'long_description'=>$_POST['long_description'],
					'tax'=>$_POST['tax'],
					'shipping_charges'=>$_POST['shipping_charges']
				);
					
					$q=$this->common_model->update_records('tbl_product_details',$data_field,'id','1');
					if($q)
					{
						$this->session->set_userdata('error_msg','Product Details Updated Sucessfully..');
						$this->session->set_userdata('error_cls','success');
					}
					else
					{
						$this->session->set_userdata('error_msg','Error Occurred Try again...');
						$this->session->set_userdata('error_cls','danger');
					}
					redirect(base_url().'dashboard/product_details/');
			}	
		}
		$data['page_header']="Product Details | " . $this->website_name;
		$data['Website_name']=$this->website_name;
	 	$data['page']='product-details';
		$this->load->view('dashboard/template',$data);
	}
	
	public function product_gallary()
	{
		$lang='';
		if(isset($_GET['ln']))
		{
			$this->session->set_userdata('language',$_GET['ln']);
		}
	     $this->lang->load('content', $lang=='' ?  $this->session->userdata('language') : $lang);
		
       
        
        $data['dashboard']= $this->lang->line('dashboard');
        $data['web_setting']= $this->lang->line('web_setting');
        $data['web_slider']= $this->lang->line('web_slider');
        $data['home_page_setting']= $this->lang->line('home_page_setting');
        $data['blog']= $this->lang->line('blog');
        $data['news']= $this->lang->line('news');
        $data['event']= $this->lang->line('event');
        $data['appointment']= $this->lang->line('appointment');
        $data['reservation']= $this->lang->line('reservation');
        $data['web_pages']= $this->lang->line('web_pages');
        $data['video']= $this->lang->line('video');
        $data['newsletter_design']= $this->lang->line('newsletter_design');
        $data['newsletter']= $this->lang->line('newsletter');
        $data['sub_user']= $this->lang->line('sub_user');
        $data['web_enq']= $this->lang->line('web_enq');
        $data['contact_details']= $this->lang->line('contact_details');        
        $data['designed_by']= $this->lang->line('designed_by');        


		if(isset($_POST['btn_update_image']))
		{ 	
		
				$config=array('upload_path' => 'assets/dashboard/uploads/image_gal', 'allowed_types' => 'jpg', 'overwrite'=> True,);
				$this->upload->initialize($config); // Important
				$this->upload->do_upload("image_gal");
				$datas=($this->upload->data());
				//echo "<br/>";
				
				if($datas['file_size'] >0 )
				{
					$config["source_image"] = 'assets/dashboard/uploads/image_gal/'.$datas['file_name'];
					$config['new_image'] = 'assets/dashboard/uploads/image_gal/'.$datas['file_name'];
					$config["width"] = 320;
					$config["height"] = 240;

					$this->load->library('image_lib', $config);
					$this->image_lib->fit();
			 
$qq=$this->db->query("select * from tbl_product_gallary WHERE image_name='".$datas['file_name']."'")->row();
if($qq)
{
}else
{
	$data_field=array('image_name'=>$datas['file_name'],'image_description'=>$_POST['image_description']);
	$this->common_model->insert_records('tbl_product_gallary',$data_field);
}
					
					$this->session->set_userdata('error_msg','Product Image Uploaded Sucessfully..');
					$this->session->set_userdata('error_cls','success');
					
				}
				else
				{
					$this->session->set_userdata('error_msg','Unable to upload, Select proper image.');
					$this->session->set_userdata('error_cls','danger');
					
				}
				redirect(base_url().'dashboard/product_gallary/');
		
		}
		if(isset($_GET['ch']))
		{
			$img_path=FCPATH."assets/dashboard/uploads/image_gal/".base64_decode($_GET['nm']);
			unlink($img_path);
			
			$result=$this->common_model->deleteRecords('tbl_product_gallary',base64_decode($_GET['d']));
			if($result)
					{
						$this->session->set_userdata('error_msg','Product Image Updated Sucessfully..');
						$this->session->set_userdata('error_cls','success');
					}
					else
					{
						$this->session->set_userdata('error_msg','Error Occurred Try again...');
						$this->session->set_userdata('error_cls','danger');
					}
					redirect(base_url().'dashboard/product_gallary/');
		}
		$data['page_header']="Product Gallary | " . $this->website_name;
		$data['Website_name']=$this->website_name;
	 	$data['page']='product-gallary';
		$this->load->view('dashboard/template',$data);
	}
	
	public function product_order()
	{
		$lang='';
		if(isset($_GET['ln']))
		{
			$this->session->set_userdata('language',$_GET['ln']);
		}
	     $this->lang->load('content', $lang=='' ?  $this->session->userdata('language') : $lang);
		
       
        
        $data['dashboard']= $this->lang->line('dashboard');
        $data['web_setting']= $this->lang->line('web_setting');
        $data['web_slider']= $this->lang->line('web_slider');
        $data['home_page_setting']= $this->lang->line('home_page_setting');
        $data['blog']= $this->lang->line('blog');
        $data['news']= $this->lang->line('news');
        $data['event']= $this->lang->line('event');
        $data['appointment']= $this->lang->line('appointment');
        $data['reservation']= $this->lang->line('reservation');
        $data['web_pages']= $this->lang->line('web_pages');
        $data['video']= $this->lang->line('video');
        $data['newsletter_design']= $this->lang->line('newsletter_design');
        $data['newsletter']= $this->lang->line('newsletter');
        $data['sub_user']= $this->lang->line('sub_user');
        $data['web_enq']= $this->lang->line('web_enq');
        $data['contact_details']= $this->lang->line('contact_details');        
        $data['designed_by']= $this->lang->line('designed_by');        


		$data['page_header']="Orders | " . $this->website_name;
		$data['Website_name']=$this->website_name;
	 	$data['page']='order';
		$this->load->view('dashboard/template',$data);
	}
	
	public function newsletter()
	{
		$lang='';
		if(isset($_GET['ln']))
		{
			$this->session->set_userdata('language',$_GET['ln']);
		}
	     $this->lang->load('content', $lang=='' ?  $this->session->userdata('language') : $lang);
		
       
        
        $data['dashboard']= $this->lang->line('dashboard');
        $data['web_setting']= $this->lang->line('web_setting');
        $data['web_slider']= $this->lang->line('web_slider');
        $data['home_page_setting']= $this->lang->line('home_page_setting');
        $data['blog']= $this->lang->line('blog');
        $data['news']= $this->lang->line('news');
        $data['event']= $this->lang->line('event');
        $data['appointment']= $this->lang->line('appointment');
        $data['reservation']= $this->lang->line('reservation');
        $data['web_pages']= $this->lang->line('web_pages');
        $data['video']= $this->lang->line('video');
        $data['delete']= $this->lang->line('delete');
        
        $data['w_enquery_t']= $this->lang->line('w_enquery_t');
        $data['newsletter_design']= $this->lang->line('newsletter_design');
        
        $data['newsletter']= $this->lang->line('newsletter');
        $data['sub_user']= $this->lang->line('sub_user');
        $data['web_enq']= $this->lang->line('web_enq');
        $data['contact_details']= $this->lang->line('contact_details');        
        $data['designed_by']= $this->lang->line('designed_by');        
        
        $data['n_manage_user']= $this->lang->line('n_manage_user');        
        $data['n_send']= $this->lang->line('n_send');        
        $data['n_sdate_time']= $this->lang->line('n_sdate_time');        
      
        $data['tbl_sr_no']= $this->lang->line('tbl_sr_no');
        $data['tbl_email']= $this->lang->line('tbl_email');
        $data['tbl_action']= $this->lang->line('tbl_action');
        $data['delete']= $this->lang->line('delete');        
              
        



		if(isset($_GET['send']))
		{
		
		$From_email="";$title="";$sub="";$ebody="";$cnt=0;

		$q=$this->db->query("select * from tbl_website_settings where id='1'")->row();
		if($q)
		{
			$From_email=$q->for_newsletter_page;
		}

		$result=$this->db->query("select * from tbl_newsletter_design where id='1'")->row();
		if($result)
		{
			$title=$result->nl_title;
			$sub=$result->nl_subject;
			$ebody=base64_decode($result->nl_design);
		 
			$config = Array(
				'protocol' => 'smtp',
		        'smtp_host' => 'ssl://smtp.googlemail.com',
		        'smtp_port' => 465,
		        'smtp_user' => 'rajendra827@gmail.com',
		        'smtp_pass' => '9185awds',
		        'mailtype'  => 'html', 
		        'charset' => 'utf-8',
		        'wordwrap' => TRUE
	    	);
		    $this->load->library('email', $config);
			$this->email->set_mailtype("html");
		    $this->email->set_newline("\r\n");
 
		    $email_body ='<div>'.$title.'</div>';
		    $this->email->from('rajendra827@gmail.com', 'One Product Shop');
			$result=$this->db->query("select email_id from tbl_newsletter");	
			$list=array();
			if($result->result()>0)
			{
				foreach($result->result() as $row)
				{
					array_push($list,$row->email_id);
				}
				 $cnt=count($list);
			}		    
		   
		    $this->email->to($list);
		    $this->email->bcc($From_email);
		    $this->email->subject($sub);
		    $this->email->message($ebody);

		    $this->email->send();
		    //echo $this->email->print_debugger();
	
/*
 		   $subject = $sub;
		   $message = $ebody;
		   $header = "From:".$From_email." \r\n";
		  // $header = "bcc:admin@creowebtech.com \r\n";
		   $header .= "MIME-Version: 1.0\r\n";
		   $header .= "Content-type: text/html\r\n";	
$result=$this->db->query("select * from tbl_newsletter");	
if($result->result()>0)
{
	foreach($result->result() as $row())	
	{
		  $to = $row->email_id;
		  $retval = mail ($to,$subject,$message,$header);
		  $cnt++;
	}
}
		  
	*/
   }
					 $this->session->set_userdata('error_msg',$this->lang->line('n_send_succ').$cnt.'Users');
					 $this->session->set_userdata('error_cls','success');
					redirect(base_url().'dashboard/newsletter/');
		}
		if(isset($_GET['ch']))
		{
			$result=$this->common_model->deleteRecords('tbl_newsletter',base64_decode($_GET['d']));
			if($result)
					{
						$this->session->set_userdata('error_msg',$this->lang->line('n_d_succ'));
						$this->session->set_userdata('error_cls','success');
					}
					else
					{
						$this->session->set_userdata('error_msg',$this->lang->line('n_d_un'));
						$this->session->set_userdata('error_cls','danger');
					}
					redirect(base_url().'dashboard/newsletter/');
		}
		$data['page_header']="Newsletter  | " . $this->website_name;
		$data['Website_name']=$this->website_name;
	 	$data['page']='newsletter-subscribe-user';
		$this->load->view('dashboard/template',$data);
	}
	
	public function newsletter_design()
	{
		$lang='';
		if(isset($_GET['ln']))
		{
			$this->session->set_userdata('language',$_GET['ln']);
		}
	     $this->lang->load('content', $lang=='' ?  $this->session->userdata('language') : $lang);
		
       
        
        $data['dashboard']= $this->lang->line('dashboard');
        $data['web_setting']= $this->lang->line('web_setting');
        $data['web_slider']= $this->lang->line('web_slider');
        $data['home_page_setting']= $this->lang->line('home_page_setting');
        $data['blog']= $this->lang->line('blog');
        $data['news']= $this->lang->line('news');
        $data['event']= $this->lang->line('event');
        $data['appointment']= $this->lang->line('appointment');
        $data['reservation']= $this->lang->line('reservation');
        $data['web_pages']= $this->lang->line('web_pages');
        $data['video']= $this->lang->line('video');
       $data['newsletter_design']= $this->lang->line('newsletter_design'); 
        $data['newsletter']= $this->lang->line('newsletter');
        $data['sub_user']= $this->lang->line('sub_user');
        $data['web_enq']= $this->lang->line('web_enq');
        $data['contact_details']= $this->lang->line('contact_details');        
        $data['designed_by']= $this->lang->line('designed_by');        

        $data['n_title']= $this->lang->line('n_title');
        $data['n_title1']= $this->lang->line('n_title1');
        $data['n_subject']= $this->lang->line('n_subject');
        $data['n_design']= $this->lang->line('n_design');
        $data['n_title1_p']= $this->lang->line('n_title1_p');
        $data['n_subject_p']= $this->lang->line('n_subject_p');
        $data['n_design_p']= $this->lang->line('n_design_p');
        
        $data['save']= $this->lang->line('save');


		if(isset($_POST['btn_save_design']))
		{
			$data_field=array('nl_design'=>base64_encode($_POST['nl_design']),'nl_subject'=>$_POST['nl_subject'],'nl_title'=>$_POST['nl_title'],);
			$result=$this->common_model->update_records('tbl_newsletter_design',$data_field,'id','1');
			if($result)
					{
						$this->session->set_userdata('error_msg',$this->lang->line('n_updated_succ'));
						$this->session->set_userdata('error_cls','success');
					}
					else
					{
						$this->session->set_userdata('error_msg',$this->lang->line('n_updated_un'));
						$this->session->set_userdata('error_cls','danger');
					}
					redirect(base_url().'dashboard/newsletter_design/');
		}
		$data['page_header']="Newsletter Design | " . $this->website_name;
		$data['Website_name']=$this->website_name;
	 	$data['page']='newsletter-design';
		$this->load->view('dashboard/template',$data);
	}
	
	public function website_enquery()
	{
		$lang='';
		if(isset($_GET['ln']))
		{
			$this->session->set_userdata('language',$_GET['ln']);
		}
	     $this->lang->load('content', $lang=='' ?  $this->session->userdata('language') : $lang);
		
       
        
        $data['dashboard']= $this->lang->line('dashboard');
        $data['web_setting']= $this->lang->line('web_setting');
        $data['web_slider']= $this->lang->line('web_slider');
        $data['home_page_setting']= $this->lang->line('home_page_setting');
        $data['blog']= $this->lang->line('blog');
        $data['news']= $this->lang->line('news');
        $data['event']= $this->lang->line('event');
        $data['appointment']= $this->lang->line('appointment');
        $data['reservation']= $this->lang->line('reservation');
        $data['web_pages']= $this->lang->line('web_pages');
        $data['video']= $this->lang->line('video');
       $data['newsletter_design']= $this->lang->line('newsletter_design'); 
        $data['newsletter']= $this->lang->line('newsletter');
        $data['sub_user']= $this->lang->line('sub_user');
        $data['web_enq']= $this->lang->line('web_enq');
        $data['contact_details']= $this->lang->line('contact_details');        
        $data['designed_by']= $this->lang->line('designed_by');        

        $data['w_enquery_t']= $this->lang->line('w_enquery_t');
        
        $data['tbl_sr_no']= $this->lang->line('tbl_sr_no');
        $data['tbl_name']= $this->lang->line('tbl_name');
        $data['tbl_email']= $this->lang->line('tbl_email');
        $data['tbl_message']= $this->lang->line('tbl_message');
        
        $data['tbl_action']= $this->lang->line('tbl_action');
        $data['delete']= $this->lang->line('delete');
        
		if(isset($_GET['ch']))
		{
			$result=$this->common_model->deleteRecords('tbl_enquery',base64_decode($_GET['id']));
			if($result)
					{
						$this->session->set_userdata('error_msg',$this->lang->line('w_d_succ'));
						$this->session->set_userdata('error_cls','success');
					}
					else
					{
						$this->session->set_userdata('error_msg',$this->lang->line('w_d_un'));
						$this->session->set_userdata('error_cls','danger');
					}
					redirect(base_url().'dashboard/website_enquery/');
		}
		$data['page_header']="Website Enquery | " . $this->website_name;
		$data['Website_name']=$this->website_name;
	 	$data['page']='website-enq';
		$this->load->view('dashboard/template',$data);
	}
	 
	 public function blogs()
	 {	
	 $lang='';
		if(isset($_GET['ln']))
		{
			$this->session->set_userdata('language',$_GET['ln']);
		}
	     $this->lang->load('content', $lang=='' ?  $this->session->userdata('language') : $lang);
		
       
        
        $data['dashboard']= $this->lang->line('dashboard');
        $data['web_setting']= $this->lang->line('web_setting');
        $data['web_slider']= $this->lang->line('web_slider');
        $data['home_page_setting']= $this->lang->line('home_page_setting');
        $data['blog']= $this->lang->line('blog');
        $data['news']= $this->lang->line('news');
        $data['event']= $this->lang->line('event');
        $data['appointment']= $this->lang->line('appointment');
        $data['reservation']= $this->lang->line('reservation');
        $data['web_pages']= $this->lang->line('web_pages');
        $data['video']= $this->lang->line('video');
       $data['newsletter_design']= $this->lang->line('newsletter_design'); 
        $data['newsletter']= $this->lang->line('newsletter');
        $data['sub_user']= $this->lang->line('sub_user');
        $data['web_enq']= $this->lang->line('web_enq');
        $data['contact_details']= $this->lang->line('contact_details');        
        $data['designed_by']= $this->lang->line('designed_by');        

        
        $data['create_new_blog']= $this->lang->line('create_new_blog');
        $data['blog_title']= $this->lang->line('blog_title');
        $data['mng_cmnt']= $this->lang->line('mng_cmnt');
        $data['tbl_sr_no']= $this->lang->line('tbl_sr_no');      
        $data['tbl_heading']= $this->lang->line('tbl_heading');        
        $data['tbl_discription']= $this->lang->line('tbl_discription');
        $data['tbl_status']= $this->lang->line('tbl_status');
        $data['tbl_img']= $this->lang->line('tbl_img');
        $data['tbl_action']= $this->lang->line('tbl_action');
        $data['status_p']= $this->lang->line('status_p');
        $data['status_u']= $this->lang->line('status_u');
        $data['edit']= $this->lang->line('edit');
        $data['update']= $this->lang->line('update');
        $data['delete']= $this->lang->line('delete');
        $data['create']= $this->lang->line('create');
        $data['back']= $this->lang->line('back');
        $data['blog_mng']= $this->lang->line('blog_mng');
        
	    $data['blog_title']= $this->lang->line('blog_title');
	    $data['blog_title_p']= $this->lang->line('blog_title_p');
        $data['blog_img']= $this->lang->line('blog_img');
        $data['blog_dis']= $this->lang->line('blog_dis');
        $data['blog_date']= $this->lang->line('blog_date');
        $data['blog_tag']= $this->lang->line('blog_tag');
        $data['blog_content']= $this->lang->line('blog_content');
        $data['blog_dis_p']= $this->lang->line('blog_dis_p');
        $data['blog_tag_p']= $this->lang->line('blog_tag_p');
        $data['blog_content_p']= $this->lang->line('blog_content_p');
        $data['blog_update_t']= $this->lang->line('blog_update_t');

		$data['tbl_person_name']= $this->lang->line('tbl_person_name');
		$data['tbl_person_email']= $this->lang->line('tbl_person_email');
		$data['tbl_comnt']= $this->lang->line('tbl_comnt');


		$data['page_header']="Website Blogs | " . $this->website_name;
		$data['Website_name']=$this->website_name;
	 	$data['page']='blogs';
	 	 	
	 	
		if(isset($_GET['pg']))
		{
			$data['page']= base64_decode( $_GET['pg'] );
			
		}
		else
		if(isset($_GET['ch']))
		{
			if($_GET['ch']=='down')
			{
				$stat=$this->common_model->updateStatus('tbl_blogs',base64_decode($_GET['id']),'0');
				if($stat)
				{
					$this->session->set_userdata('error_msg', $this->lang->line('blog_u'));
					$this->session->set_userdata('error_cls','success');
				}
				else
				{
					$this->session->set_userdata('error_msg',$this->lang->line('blog_error'));
					$this->session->set_userdata('error_cls','danger');
				}
				redirect(base_url().'dashboard/blogs');
			}
			else
			if($_GET['ch']=='up')
			{
				$stat=$this->common_model->updateStatus('tbl_blogs',base64_decode($_GET['id']),'1');
				if($stat)
				{
					$this->session->set_userdata('error_msg',$this->lang->line('blog_p'));
					$this->session->set_userdata('error_cls','success');
				}
				else
				{
					$this->session->set_userdata('error_msg',$this->lang->line('blog_error'));
					$this->session->set_userdata('error_cls','danger');
				}
				redirect(base_url().'dashboard/blogs');
			}
			
			else
			if($_GET['ch']=='del')
			{
				$stat=$this->common_model->deleteRecords('tbl_blogs',base64_decode($_GET['id']));
				if($stat)
				{
					$img_path=FCPATH."assets/dashboard/uploads/blogs/".base64_decode($_GET['img_name']);
					unlink($img_path);
			
					$this->session->set_userdata('error_msg',$this->lang->line('blog_del_succ'));
					$this->session->set_userdata('error_cls','success');
				}
				else
				{
					$this->session->set_userdata('error_msg',$this->lang->line('blog_del_un'));
					$this->session->set_userdata('error_cls','danger');
				}
				redirect(base_url().'dashboard/blogs');
			}
		}
		if(isset($_POST['btn_update_blog']))
		{
			$this->form_validation->set_rules('title','Blog Title', 'required|xss_clean');
			$this->form_validation->set_rules('short_description','Short Desctiption', 'required|xss_clean');
			$this->form_validation->set_rules('descriptions','Blog Content', 'required|xss_clean');
			$this->form_validation->set_rules('blog_date','Blog Date', 'required|xss_clean');
			$this->form_validation->set_rules('tags','Blog Tags/Keywords', 'required|xss_clean');
			
			if($this->form_validation->run())
			{	
				if(($_FILES['blog_img']['size']>0))
					{
						$config=array('upload_path' => 'assets/dashboard/uploads/blogs', 'allowed_types' => 'jpg', 'overwrite'=> True,);
						$this->upload->initialize($config); // Important
						$this->upload->do_upload("blog_img");
						$datas=$this->upload->data();
						if($datas['file_size'] >0 )
						{
								
								$data_field=array(
									'title'=>$_POST['title'],
									'image_name'=>$datas['file_name'],
									'short_description'=>$_POST['short_description'],
									'descriptions'=>base64_encode($_POST['descriptions']),
									'blog_date'=>$_POST['blog_date'],
									'tags'=>$_POST['tags']
								);
						
								$ins=$this->common_model->update_records('tbl_blogs',$data_field,'id',base64_decode($_POST['id']));
								if($ins)
								{
									$this->session->set_userdata('error_msg',$this->lang->line('blog_up_succ'));
									$this->session->set_userdata('error_cls','success');
									redirect(base_url().'dashboard/blogs');
								}
								else
								{
									$this->session->set_userdata('error_msg',$this->lang->line('blog_up_un'));
									$this->session->set_userdata('error_cls','success');
									redirect(base_url().'dashboard/blogs?pg='.base64_encode('blogs-update').'&id='.$_POST['id']);
								}
						}
							 
								$this->session->set_userdata('error_msg','Unable to upload Image, Try again');
								$this->session->set_userdata('error_cls','success');
								redirect(base_url().'dashboard/blogs?pg='.base64_encode('blogs-update').'&id='.$_POST['id']);
							 
					}
					  	
						$data_field=array(
									'title'=>$_POST['title'],
									'short_description'=>$_POST['short_description'],
									'descriptions'=>base64_encode($_POST['descriptions']),
									'blog_date'=>$_POST['blog_date'],
									'tags'=>$_POST['tags']
								);
						
						$ins=$this->common_model->update_records('tbl_blogs',$data_field,'id',base64_decode($_POST['id']));
						if($ins)
								{
									$this->session->set_userdata('error_msg','Blog Uploaded successfully');
									$this->session->set_userdata('error_cls','success');
									redirect(base_url().'dashboard/blogs');
								}
								else
								{
									$this->session->set_userdata('error_msg','Error while uploading details');
									$this->session->set_userdata('error_cls','success');
									redirect(base_url().'dashboard/blogs?pg='.base64_encode('blogs-update').'&id='.$_POST['id']);
								}
			 	 }
			redirect(base_url().'dashboard/blogs?pg='.base64_encode('blogs-update').'&id='.$_POST['id']);
		}
		if(isset($_POST['btn_create_blog']))
		{
			$this->form_validation->set_rules('title','Blog Title', 'required|xss_clean');
			$this->form_validation->set_rules('short_description','Short Desctiption', 'required|xss_clean');
			$this->form_validation->set_rules('descriptions','Blog Content', 'required|xss_clean');
			$this->form_validation->set_rules('blog_date','Blog Date', 'required|xss_clean');
			$this->form_validation->set_rules('tags','Blog Tags/Keywords', 'required|xss_clean');
			
			 
			if($this->form_validation->run())
			{					
				$config=array('upload_path' => 'assets/dashboard/uploads/blogs', 'allowed_types' => 'jpg', 'overwrite'=> True,);
				$this->upload->initialize($config); // Important
				$this->upload->do_upload("blog_img");
				$datas=($this->upload->data());
				//echo "<br/>";
				
				if($datas['file_size'] >0 )
				{
					$config["source_image"] = 'assets/dashboard/uploads/blogs/'.$datas['file_name'];
					$config['new_image'] = 'assets/dashboard/uploads/blogs/'.$datas['file_name'];
					$config["width"] = 925;
					$config["height"] = 300;

					$this->load->library('image_lib', $config);
					$this->image_lib->fit();
			 
					$qq=$this->db->query("select * from tbl_blogs WHERE image_name='".$datas['file_name']."'")->row();
					if($qq)
					{
					}else
					{
						$data_field=array(
							'title'=>$_POST['title'],
							'image_name'=>$datas['file_name'],
							'short_description'=>$_POST['short_description'],
							'descriptions'=>base64_encode($_POST['descriptions']),
							'blog_date'=>$_POST['blog_date'],
							'tags'=>$_POST['tags']
						);
						
						$this->common_model->insert_records('tbl_blogs',$data_field);
					}
					
					$this->session->set_userdata('error_msg',$this->lang->line('blog_add_succ'));
					$this->session->set_userdata('error_cls','success');
					
					redirect(base_url().'dashboard/blogs');
					
				}
				else
				{
					$this->session->set_userdata('error_msg',$this->lang->line('blog_add_un'));
					$this->session->set_userdata('error_cls','danger');
					
				}
				redirect(base_url().'dashboard/blogs?pg='.base64_encode('blog-create'));
			}
			
		}
		else
		{
			if(isset($_GET['comments']))
			{
				if($_GET['comments']=='view')
				{
					
					if(isset($_GET['Bch']))
					{
						if($_GET['Bch']=="del")
						{
							$ins=$this->common_model->deleteRecords('tbl_blog_comments',base64_decode($_GET['id']));
							if($ins)
							{
								$this->session->set_userdata('error_msg',$this->lang->line('blog_c_del_succ'));
								$this->session->set_userdata('error_cls','success');
							}
							else
							{
								$this->session->set_userdata('error_msg',$this->lang->line('blog_c_del_un'));
								$this->session->set_userdata('error_cls','danger');
							}
							 
						}
						 else
						if($_GET['Bch']=="down")
						{ 
							
							$stat=$this->common_model->updateStatus('tbl_blog_comments',base64_decode($_GET['id']),'0');
							if($stat)
							{
								$this->session->set_userdata('error_msg',$this->lang->line('blog_c_u'));
								$this->session->set_userdata('error_cls','success');
							}
							else
							{
								$this->session->set_userdata('error_msg','Error occurred, Try again');
								$this->session->set_userdata('error_cls',$this->lang->line('blog_error'));
							}
							 
						}
						else
						if($_GET['Bch']=="up")
						{ 
							$stat=$this->common_model->updateStatus('tbl_blog_comments',base64_decode($_GET['id']),'1');
							if($stat)
							{
								$this->session->set_userdata('error_msg',$this->lang->line('blog_c_p'));
								$this->session->set_userdata('error_cls','success');
							}
							else
							{
								$this->session->set_userdata('error_msg','Error occurred, Try again');
								$this->session->set_userdata('error_cls',$this->lang->line('blog_error'));
							}
							 
						}
						
						redirect(base_url().'dashboard/blogs?comments=view&blog_id='.base64_encode(base64_encode($_GET['id'])));
						
					}
					$data['page']='blogs-comments';
					
					 
				}
			}
		}
			
		
		$this->load->view('dashboard/template',$data);
		
	 }
	 
	 
	 public function news()
	 {
	 	$lang='';
		if(isset($_GET['ln']))
		{
			$this->session->set_userdata('language',$_GET['ln']);
		}
	     $this->lang->load('content', $lang=='' ?  $this->session->userdata('language') : $lang);
		
       
        
        $data['dashboard']= $this->lang->line('dashboard');
        $data['web_setting']= $this->lang->line('web_setting');
        $data['web_slider']= $this->lang->line('web_slider');
        $data['home_page_setting']= $this->lang->line('home_page_setting');
        $data['blog']= $this->lang->line('blog');
        $data['news']= $this->lang->line('news');
        $data['event']= $this->lang->line('event');
        $data['appointment']= $this->lang->line('appointment');
        $data['reservation']= $this->lang->line('reservation');
        $data['web_pages']= $this->lang->line('web_pages');
        $data['video']= $this->lang->line('video');
        $data['newsletter']= $this->lang->line('newsletter');
        $data['sub_user']= $this->lang->line('sub_user');
       $data['newsletter_design']= $this->lang->line('newsletter_design');
        $data['web_enq']= $this->lang->line('web_enq');
        $data['contact_details']= $this->lang->line('contact_details');        
        $data['designed_by']= $this->lang->line('designed_by');        
        
        $data['new_mng']= $this->lang->line('new_mng');        
        $data['news_create']= $this->lang->line('news_create');        
        $data['tbl_sr_no']= $this->lang->line('tbl_sr_no');        
        $data['tbl_heading']= $this->lang->line('tbl_heading');        
        $data['tbl_discription']= $this->lang->line('tbl_discription');        
        $data['tbl_status']= $this->lang->line('tbl_status');        
        $data['tbl_img']= $this->lang->line('tbl_img');        
        $data['tbl_action']= $this->lang->line('tbl_action');        
        $data['tbl_date']= $this->lang->line('tbl_date');        
        $data['status_p']= $this->lang->line('status_p');        
        $data['status_u']= $this->lang->line('status_u');        
       
        $data['new_mng']= $this->lang->line('new_mng');        
        $data['news_img']= $this->lang->line('news_img');        
        $data['news_date']= $this->lang->line('news_date');        
        $data['news_dis']= $this->lang->line('news_dis');        
        $data['new_mng_p']= $this->lang->line('new_mng_p');        
        $data['news_dis_p']= $this->lang->line('news_dis_p');        
        $data['status_u']= $this->lang->line('status_u');        
        $data['news_title']= $this->lang->line('news_title');        
        $data['news_title_p']= $this->lang->line('news_title_p');    
        $data['create']= $this->lang->line('create');
        $data['back']= $this->lang->line('back');
        $data['update']= $this->lang->line('update');
        
        $data['news_img_pre']= $this->lang->line('news_img_pre');
        
        $data['news_image_pre']= $this->lang->line('news_image_pre');
        $data['news_update_t']= $this->lang->line('news_update_t');

	 	$data['page_header']="Website News | " . $this->website_name;
		$data['Website_name']=$this->website_name;
	 	$data['page']='news';
	 	
	 	if(isset($_GET['pg']))
		{
			$data['page']= base64_decode( $_GET['pg'] );
		}
		
		if(isset($_POST['btn_create_news']))
		{
			$this->form_validation->set_rules('title','News Title', 'required|xss_clean');
			$this->form_validation->set_rules('description','Desctiption', 'required|xss_clean');
			$this->form_validation->set_rules('news_date','News Date', 'required|xss_clean');
			
			 
			if($this->form_validation->run())
			{					
				$config=array('upload_path' => 'assets/dashboard/uploads/news', 'allowed_types' => 'jpg', 'overwrite'=> True,);
				$this->upload->initialize($config); // Important
				$this->upload->do_upload("news_img");
				$datas=($this->upload->data());
				//echo "<br/>";
				
				if($datas['file_size'] >0 )
				{
					$config["source_image"] = 'assets/dashboard/uploads/news/'.$datas['file_name'];
					$config['new_image'] = 'assets/dashboard/uploads/news/'.$datas['file_name'];
					$config["width"] = 150;
					$config["height"] = 150;

					$this->load->library('image_lib', $config);
					$this->image_lib->fit();
			 
						$data_field=array(
							'title'=>$_POST['title'],
							'image_name'=>$datas['file_name'],
							'description'=>base64_encode($_POST['description']),
							'news_date'=>$_POST['news_date']
						);
						
						$this->common_model->insert_records('tbl_news',$data_field);
					 
					
					$this->session->set_userdata('error_msg',$this->lang->line('news_add_succ'));
					$this->session->set_userdata('error_cls','success');
					
					redirect(base_url().'dashboard/news');
					
				}
				else
				{
					$this->session->set_userdata('error_msg',$this->lang->line('news_add_un'));
					$this->session->set_userdata('error_cls','danger');
					
				}
				redirect(base_url().'dashboard/news?pg='.base64_encode('blog-create'));
			}
			
		
		}
		else
		if(isset($_POST['btn_update_news']))
		{
			
			$this->form_validation->set_rules('title','News Title', 'required|xss_clean');
			$this->form_validation->set_rules('description','Desctiption', 'required|xss_clean');
			$this->form_validation->set_rules('news_date','News Date', 'required|xss_clean');
				
			if($this->form_validation->run())
			{	
				if(($_FILES['news_img']['size']>0))
					{
						$config=array('upload_path' => 'assets/dashboard/uploads/news', 'allowed_types' => 'jpg', 'overwrite'=> True,);
						$this->upload->initialize($config); // Important
						$this->upload->do_upload("news_img");
						$datas=$this->upload->data();
						
						if($datas['file_size'] >0 )
						{								
								$data_field=array(
									'title'=>$_POST['title'],
									'image_name'=>$datas['file_name'],
									'description'=>base64_decode($_POST['description']),
									'news_date'=>$_POST['news_date']
								);
						
								$ins=$this->common_model->update_records('tbl_news',$data_field,'id',base64_decode($_POST['id']));
								if($ins)
								{
									$this->session->set_userdata('error_msg',$this->lang->line('news_up_succ'));
									$this->session->set_userdata('error_cls','success');
									redirect(base_url().'dashboard/news');
								}
								else
								{
									$this->session->set_userdata('error_msg','Image Uploaded but Error while uploading details');
									$this->session->set_userdata('error_cls','success');
									redirect(base_url().'dashboard/news?pg='.base64_encode('blogs-update').'&id='.$_POST['id']);
								}
						}
							 
								$this->session->set_userdata('error_msg',$this->lang->line('news_update_un'));
								$this->session->set_userdata('error_cls','success');
								redirect(base_url().'dashboard/news?pg='.base64_encode('news-update').'&id='.$_POST['id']);
							 
					}
					  	
						$data_field=array(
									'title'=>$_POST['title'],
									'description'=>base64_encode($_POST['description']),
									'news_date'=>$_POST['news_date'],
								);
						
						$ins=$this->common_model->update_records('tbl_news',$data_field,'id',base64_decode($_POST['id']));
						if($ins)
								{
									$this->session->set_userdata('error_msg','News Uploaded successfully');
									$this->session->set_userdata('error_cls','success');
									redirect(base_url().'dashboard/news');
								}
								else
								{
									$this->session->set_userdata('error_msg','Error while uploading details');
									$this->session->set_userdata('error_cls','success');
									redirect(base_url().'dashboard/news?pg='.base64_encode('news-update').'&id='.$_POST['id']);
								}
			 	 }
			redirect(base_url().'dashboard/news?pg='.base64_encode('news-update').'&id='.$_POST['id']);
		
		}
		else
			if(isset($_GET['ch']))
			{
				if($_GET['ch']=="del")
				{
					$img_path=FCPATH.'assets/dashboard/uploads/news/'.base64_decode($_GET['img_name']);
					unlink($img_path);
					$ins=$this->common_model->deleteRecords('tbl_news',base64_decode($_GET['id']));
					if($ins)
					{
						$this->session->set_userdata('error_msg',$this->lang->line('news_del_succ'));
						$this->session->set_userdata('error_cls','success');
					}
					else
					{
						$this->session->set_userdata('error_msg',$this->lang->line('news_del_un'));
						$this->session->set_userdata('error_cls','danger');
					}
				}else
				if($_GET['ch']=="down")
				{ 
					$stat=$this->common_model->updateStatus('tbl_news',base64_decode($_GET['id']),'0');
					if($stat)
					{
						$this->session->set_userdata('error_msg',$this->lang->line('news_p'));
						$this->session->set_userdata('error_cls','success');
					}
					else
					{
						$this->session->set_userdata('error_msg',$this->lang->line('news_err'));
						$this->session->set_userdata('error_cls','danger');
					}
							 
				}
				else
				if($_GET['ch']=="up")
				{ 
						$stat=$this->common_model->updateStatus('tbl_news',base64_decode($_GET['id']),'1');
						if($stat)
						{
							$this->session->set_userdata('error_msg',$this->lang->line('news_u'));
							$this->session->set_userdata('error_cls','success');
						}
						else
						{
							$this->session->set_userdata('error_msg','Error occurred, Try again');
							$this->session->set_userdata('error_cls',$this->lang->line('news_err'));
						}
				}
				
				redirect(base_url().'dashboard/news');
			}
		
		
	 	$this->load->view('dashboard/template',$data);
	 }
	 
	  
	 public function videos()
	 {
	 	$lang='';
		if(isset($_GET['ln']))
		{
			$this->session->set_userdata('language',$_GET['ln']);
		}
	     $this->lang->load('content', $lang=='' ?  $this->session->userdata('language') : $lang);
		
       
        
        $data['dashboard']= $this->lang->line('dashboard');
        $data['web_setting']= $this->lang->line('web_setting');
        $data['web_slider']= $this->lang->line('web_slider');
        $data['home_page_setting']= $this->lang->line('home_page_setting');
        $data['blog']= $this->lang->line('blog');
        $data['news']= $this->lang->line('news');
        $data['event']= $this->lang->line('event');
        $data['appointment']= $this->lang->line('appointment');
        $data['reservation']= $this->lang->line('reservation');
        $data['web_pages']= $this->lang->line('web_pages');
        $data['video']= $this->lang->line('video');
        $data['newsletter_design']= $this->lang->line('newsletter_design');
        $data['newsletter']= $this->lang->line('newsletter');
        $data['sub_user']= $this->lang->line('sub_user');
        $data['web_enq']= $this->lang->line('web_enq');
        $data['contact_details']= $this->lang->line('contact_details');        
        $data['designed_by']= $this->lang->line('designed_by');        

               
        $data['web_video_title']= $this->lang->line('web_video_title');        
        $data['youtube_video_link']= $this->lang->line('youtube_video_link');        
        $data['youtube_video_link_p']= $this->lang->line('youtube_video_link_p');        
        $data['select_video']= $this->lang->line('select_video');        
        $data['select_video_note']= $this->lang->line('select_video_note'); 
        $data['btn_upload']= $this->lang->line('btn_upload');        
       

	 	if(isset($_POST['btn_submit_link']))
	 	{
	 		$this->form_validation->set_rules('video_url','Video Link', 'required');
	 		if($this->form_validation->run())
	 		{
				$url = $_POST['video_url'];
				$parts = parse_url($url);
				parse_str($parts['query'], $query);
				 
				$data_fiields=array(
					'youtube_link'=>$query['v']
				);
				
				$ins=$this->common_model->update_records('tbl_website_settings',$data_fiields,'id','1');
				if($ins)
				{
					$this->session->set_userdata('error_msg',$this->lang->line('v_add_succ'));
					$this->session->set_userdata('error_cls','success');
				}
				else
				{
					$this->session->set_userdata('error_msg',$this->lang->line('v_add_un'));
					$this->session->set_userdata('error_cls','danger');
				}
			}
	 		
			
			
		}
	 	
	 	if(isset($_POST['btn_submit_video']))
		{	
		 
				$file				= 'userfile';
				$config['upload_path']		= 'assets/dashboard/uploads/';
				$config['allowed_types'] 	= 'MP4|Mp4|mov|mpeg|mp4|avi|mp3';
				$config['max_size']		= '500000';
				$config['overwrite']		= 'true';
				$config['file_name']		= 'video';
				
$this->upload->initialize($config);
$this->load->library('upload', $config);
if(!$this->upload->do_upload($file))
{
	$this->session->set_userdata('error_msg',$this->lang->line('btn_up_un'));
	$this->session->set_userdata('error_cls','danger');
}
else
{
	$this->session->set_userdata('error_msg',$this->lang->line('btn_up_succ'));
	$this->session->set_userdata('error_cls','success');
}
				 
				redirect(base_url().'dashboard/videos/');
		
			}
			
	 	$data['page_header']="Website Videos | " . $this->website_name;
		$data['Website_name']=$this->website_name;
	 	$data['page']='videos';
	 	
	 	$this->load->view('dashboard/template',$data);
	 }
	 
	 
	 
	 
	 public function events()
	 {
	 	$lang='';
		if(isset($_GET['ln']))
		{
			$this->session->set_userdata('language',$_GET['ln']);
		}
	     $this->lang->load('content', $lang=='' ?  $this->session->userdata('language') : $lang);
		
       
        
        $data['dashboard']= $this->lang->line('dashboard');
        $data['web_setting']= $this->lang->line('web_setting');
        $data['web_slider']= $this->lang->line('web_slider');
        $data['home_page_setting']= $this->lang->line('home_page_setting');
        $data['blog']= $this->lang->line('blog');
        $data['news']= $this->lang->line('news');
        $data['event']= $this->lang->line('event');
        $data['appointment']= $this->lang->line('appointment');
        $data['reservation']= $this->lang->line('reservation');
        $data['web_pages']= $this->lang->line('web_pages');
        $data['video']= $this->lang->line('video');
        
        $data['newsletter']= $this->lang->line('newsletter');
        $data['sub_user']= $this->lang->line('sub_user');
        $data['web_enq']= $this->lang->line('web_enq');
        $data['contact_details']= $this->lang->line('contact_details');        
        $data['designed_by']= $this->lang->line('designed_by');        
$data['newsletter_design']= $this->lang->line('newsletter_design');
        $data['event_mng']= $this->lang->line('event_mng');        
        $data['event_create']= $this->lang->line('event_create');
        $data['tbl_sr_no']= $this->lang->line('tbl_sr_no');        
        $data['tbl_heading']= $this->lang->line('tbl_heading');        
        $data['tbl_discription']= $this->lang->line('tbl_discription');        
        $data['tbl_status']= $this->lang->line('tbl_status');        
        $data['tbl_img']= $this->lang->line('tbl_img');        
        $data['tbl_action']= $this->lang->line('tbl_action');        
        $data['tbl_date']= $this->lang->line('tbl_date');        
        $data['status_p']= $this->lang->line('status_p');        
        $data['status_u']= $this->lang->line('status_u');        
        $data['tbl_title']= $this->lang->line('tbl_title');        
        $data['tbl_location']= $this->lang->line('tbl_location');            
        $data['edit']= $this->lang->line('edit');
        $data['delete']= $this->lang->line('delete');
        $data['update']= $this->lang->line('update');
        $data['create']= $this->lang->line('create');
        
        $data['event_title']= $this->lang->line('event_title');
        $data['event_date']= $this->lang->line('event_date');
        $data['event_location']= $this->lang->line('event_location');
        $data['event_day']= $this->lang->line('event_day');
        $data['event_time']= $this->lang->line('event_time');
        $data['event_address']= $this->lang->line('event_address');
        $data['event_dis']= $this->lang->line('event_dis');
        $data['event_content']= $this->lang->line('event_content');
        
        $data['event_title_p']= $this->lang->line('event_title_p');
        $data['event_location_p']= $this->lang->line('event_location_p');
        $data['event_address_p']= $this->lang->line('event_address_p');
        $data['event_dis_p']= $this->lang->line('event_dis_p');
        $data['event_content_p']= $this->lang->line('event_content_p');
        
        $data['event_title_update']= $this->lang->line('event_title_update');

        

	 	$data['page_header']="Website Events | " . $this->website_name;
		$data['Website_name']=$this->website_name;
	 	$data['page']='events-manage';
	 	if(isset($_GET['pg']))
		{
			$data['page']= base64_decode( $_GET['pg'] );
			
		}
		
	 	if(isset($_POST['btn_create_events']))
	 	{
			$this->form_validation->set_rules('title','Title','required|xss_Clean');
			$this->form_validation->set_rules('short_description','Short Description','required|xss_Clean');
			$this->form_validation->set_rules('description','Description','required|xss_Clean');
			$this->form_validation->set_rules('tyme','Event Time','required|xss_Clean');
			$this->form_validation->set_rules('address','Event Address','required|xss_Clean');
			$this->form_validation->set_rules('day','Event Day','required|xss_Clean');
			$this->form_validation->set_rules('location','Event Location','required|xss_Clean');
			
			$this->form_validation->set_rules('dd','DD','required|xss_Clean');
			$this->form_validation->set_rules('mm','MM','required|xss_Clean');
			$this->form_validation->set_rules('yyyy','YYYY','required|xss_Clean');
			
			if($this->form_validation->run())
			{
				$data_fields=array(
					'dd'=>$_POST['dd'],
					'mm'=>$_POST['mm'],
					'yyyy'=>$_POST['yyyy'],
					'title'=>$_POST['title'],
					'day'=>$_POST['day'],
					'location'=>$_POST['location'],
					'short_description'=>$_POST['short_description'],
					'description'=>$_POST['description'],
					'tyme'=>$_POST['tyme'],
					'address'=>$_POST['address'],
				);
				
				$ins=$this->common_model->insert_records('tbl_events',$data_fields);
				if($ins)
				{
					$this->session->set_userdata('error_msg',$this->lang->line('event_add_succ'));
					$this->session->set_userdata('error_cls','success');
				}
				else
				{
					$this->session->set_userdata('error_msg',$this->lang->line('event_add_in'));
					$this->session->set_userdata('error_cls','danger');
				}
				redirect(base_url().'dashboard/events');
			}
			
		}
		else
		if(isset($_POST['btn_update_events']))
		{
				$this->form_validation->set_rules('title','Title','required|xss_Clean');
				$this->form_validation->set_rules('short_description','Short Description','required|xss_Clean');
				$this->form_validation->set_rules('description','Description','required|xss_Clean');
				$this->form_validation->set_rules('tyme','Event Time','required|xss_Clean');
				$this->form_validation->set_rules('address','Event Address','required|xss_Clean');
				$this->form_validation->set_rules('day','Event Day','required|xss_Clean');
				$this->form_validation->set_rules('location','Event Location','required|xss_Clean');
				$this->form_validation->set_rules('dd','DD','required|xss_Clean');
				$this->form_validation->set_rules('mm','MM','required|xss_Clean');
				$this->form_validation->set_rules('yyyy','YYYY','required|xss_Clean');
			
				if($this->form_validation->run())
				{
					$data_fields=array(
					'dd'=>$_POST['dd'],
					'mm'=>$_POST['mm'],
					'yyyy'=>$_POST['yyyy'],
					'title'=>$_POST['title'],
					'day'=>$_POST['day'],
					'location'=>$_POST['location'],
					'short_description'=>$_POST['short_description'],
					'description'=>$_POST['description'],
					'tyme'=>$_POST['tyme'],
					'address'=>$_POST['address'],
				);
				
				$ins=$this->common_model->update_records('tbl_events',$data_fields,'id',base64_decode($_POST['id']));
				if($ins)
				{
					$this->session->set_userdata('error_msg',$this->lang->line('event_up_succ'));
					$this->session->set_userdata('error_cls','success');
				}
				else
				{
					$this->session->set_userdata('error_msg',$this->lang->line('event_up_un'));
					$this->session->set_userdata('error_cls','danger');
				}
				redirect(base_url().'dashboard/events');
				}
		}
		else
		if(isset($_GET['ch']))
		{
			if($_GET['ch']=='down')
			{
				$ins=$this->common_model->updateStatus('tbl_events',base64_decode($_GET['id']),0);
				if($ins)
				{
					$this->session->set_userdata('error_msg',$this->lang->line('event_p'));
					$this->session->set_userdata('error_cls','success');
				}
				else
				{
					$this->session->set_userdata('error_msg',$this->lang->line('event_err'));
					$this->session->set_userdata('error_cls','danger');
				}
			}
			else
			if($_GET['ch']=='up')
			{
				$ins=$this->common_model->updateStatus('tbl_events',base64_decode($_GET['id']),1);
				if($ins)
				{
					$this->session->set_userdata('error_msg',$this->lang->line('event_u'));
					$this->session->set_userdata('error_cls','success');
				}
				else
				{
					$this->session->set_userdata('error_msg',$this->lang->line('event_err'));
					$this->session->set_userdata('error_cls','danger');
				}
			}
			else
			if($_GET['ch']=='del')
			{
				$ins=$this->common_model->deleteRecords('tbl_events',base64_decode($_GET['id']));
				if($ins)
				{
					$this->session->set_userdata('error_msg','Event deleted successfully');
					$this->session->set_userdata('error_cls','success');
				}
				else
				{
					$this->session->set_userdata('error_msg','Error occurred, Try again...');
					$this->session->set_userdata('error_cls','danger');
				}
			}
			
			redirect(base_url().'dashboard/events');
		}
	 	$this->load->view('dashboard/template',$data);
	 }
	 
	 public function schedules()
	 {
	 	$lang='';
		if(isset($_GET['ln']))
		{
			$this->session->set_userdata('language',$_GET['ln']);
		}
	     $this->lang->load('content', $lang=='' ?  $this->session->userdata('language') : $lang);
		
       
        
        $data['dashboard']= $this->lang->line('dashboard');
        $data['web_setting']= $this->lang->line('web_setting');
        $data['web_slider']= $this->lang->line('web_slider');
        $data['home_page_setting']= $this->lang->line('home_page_setting');
        $data['blog']= $this->lang->line('blog');
        $data['news']= $this->lang->line('news');
        $data['event']= $this->lang->line('event');
        $data['appointment']= $this->lang->line('appointment');
        $data['reservation']= $this->lang->line('reservation');
        $data['web_pages']= $this->lang->line('web_pages');
        $data['video']= $this->lang->line('video');
        $data['newsletter_design']= $this->lang->line('newsletter_design');
        $data['newsletter']= $this->lang->line('newsletter');
        $data['sub_user']= $this->lang->line('sub_user');
        $data['web_enq']= $this->lang->line('web_enq');
        $data['contact_details']= $this->lang->line('contact_details');        
        $data['designed_by']= $this->lang->line('designed_by'); 
        
        $data['tbl_sr_no']= $this->lang->line('tbl_sr_no');        
        $data['tbl_heading']= $this->lang->line('tbl_heading');        
        $data['tbl_discription']= $this->lang->line('tbl_discription');        
        $data['tbl_status']= $this->lang->line('tbl_status');        
        $data['tbl_img']= $this->lang->line('tbl_img');        
        $data['tbl_action']= $this->lang->line('tbl_action');        
        $data['tbl_date']= $this->lang->line('tbl_date');        
        $data['status_p']= $this->lang->line('status_p');        
        $data['status_u']= $this->lang->line('status_u');        
        $data['tbl_title']= $this->lang->line('tbl_title');        
        $data['tbl_location']= $this->lang->line('tbl_location');            
        $data['edit']= $this->lang->line('edit');
        $data['delete']= $this->lang->line('delete');
        $data['update']= $this->lang->line('update');
        $data['create']= $this->lang->line('create');
       
        $data['shedule_t']= $this->lang->line('shedule_t');
        $data['shedule_s']= $this->lang->line('shedule_s');
        $data['shedule_t2']= $this->lang->line('shedule_t2');
        $data['shedule_mng']= $this->lang->line('shedule_mng');
        $data['shedule_add_new']= $this->lang->line('shedule_add_new');
        $data['show']= $this->lang->line('show');
        $data['hide']= $this->lang->line('hide');
       
        $data['shedule_create']= $this->lang->line('shedule_create');
        $data['shedule_title']= $this->lang->line('shedule_title');
        $data['shedule_title_p']= $this->lang->line('shedule_title_p');
        $data['shedule_stime']= $this->lang->line('shedule_stime');
        $data['shedule_etime']= $this->lang->line('shedule_etime');
       
        $data['shedule_sdate']= $this->lang->line('shedule_sdate');
        $data['shedule_edate']= $this->lang->line('shedule_edate');
        $data['shedule_ev_color']= $this->lang->line('shedule_ev_color');
        $data['shedule_all_day_e']= $this->lang->line('shedule_all_day_e');
        $data['shedule_available']= $this->lang->line('shedule_available');
        $data['tbl_edate_time']= $this->lang->line('tbl_edate_time');
        $data['tbl_sdate_time']= $this->lang->line('tbl_sdate_time');
        $data['shedule_edit']= $this->lang->line('shedule_edit');        
        $data['yes']= $this->lang->line('yes');
        $data['no']= $this->lang->line('no');        
        $data['create']= $this->lang->line('create');
        $data['is_available']= $this->lang->line('is_available');
       
       $data['reason_t']= $this->lang->line('reason_t');
       $data['reason_d_succ']= $this->lang->line('reason_d_succ');
       $data['reason_d_un']= $this->lang->line('reason_d_un');
       $data['reason_add_succ']= $this->lang->line('reason_add_succ');
       $data['reason_add_un']= $this->lang->line('reason_add_un');
       $data['reason_up_succ']= $this->lang->line('reason_up_succ');
       $data['reason_up_un']= $this->lang->line('reason_up_un');
       $data['reason_create']= $this->lang->line('reason_create');
       $data['tbl_reason']= $this->lang->line('tbl_reason');
       $data['tbl_message']= $this->lang->line('tbl_message');
       $data['reason_p']= $this->lang->line('reason_p');
       $data['message_p']= $this->lang->line('message_p');
       $data['reason_up_t']= $this->lang->line('reason_up_t');
       
       
     
        
        
               


	 		$data['page_header']="Schedule Appointment | " . $this->website_name;
			$data['Website_name']=$this->website_name;
		 	$data['page']='schedule-manage';
	 
		 	if(isset($_GET['pg']))
			{
				$data['page']= base64_decode( $_GET['pg'] );
			}
			
			if(isset($_POST['btn_create_schedule']))
			{
				$this->form_validation->set_rules('title','Schedule','required|xss_clean');
				$this->form_validation->set_rules('start_date','Start Date','required|xss_clean');
				$this->form_validation->set_rules('end_date','End Date','required|xss_clean');
				$this->form_validation->set_rules('start_time','Start Time','required|xss_clean');
				$this->form_validation->set_rules('end_time','End Time','required|xss_clean');
				$this->form_validation->set_rules('bg_colors','Event Color','required|xss_clean');
				$this->form_validation->set_rules('allday','Event Type','required|xss_clean');
				$this->form_validation->set_rules('is_available','Is Available','required|xss_clean');
				if($this->form_validation->run())
				{
					$data_fields=array(
						'title'=>$_POST['title'],
						'start_date'=>$_POST['start_date'],
						'end_date'=>$_POST['end_date'],
						'start_time'=>$_POST['start_time'],
						'end_time'=>$_POST['end_time'],
						'bg_colors'=>$_POST['bg_colors'],
						'allday'=>$_POST['allday'],
						'is_available'=>$_POST['is_available']
					);
					
					$ins=$this->common_model->insert_records('tbl_schedule',$data_fields);
					if($ins)
					{
						$this->session->set_userdata('error_msg',$this->lang->line('shedule_add_succ'));
						$this->session->set_userdata('error_cls','success');
					}
					else
					{
						$this->session->set_userdata('error_msg',$this->lang->line('shedule_add_err'));
						$this->session->set_userdata('error_cls','danger');
					}
					
					redirect(base_url().'dashboard/schedules');
				}
				
				
			}else
			if(isset($_POST['btn_create_reason']))
			{
				$this->form_validation->set_rules('reason','Reason','required|xss_clean');
				$this->form_validation->set_rules('message','Message','required|xss_clean');
			
				if($this->form_validation->run())
				{
					$data_fields=array(
						'reason'=>$_POST['reason'],
						'message'=>$_POST['message']
					);
					
					$ins=$this->common_model->insert_records('tbl_booking_reasons',$data_fields);
					if($ins)
					{
						$this->session->set_userdata('error_msg',$this->lang->line('reason_add_succ'));
						$this->session->set_userdata('error_cls','success');
					}
					else
					{
						$this->session->set_userdata('error_msg',$this->lang->line('reason_add_err'));
						$this->session->set_userdata('error_cls','danger');
					}
					
					redirect(base_url().'dashboard/schedules');
				}
				
				
			}
	        else
			if(isset($_POST['btn_update_schedule']))
			{
				
				$this->form_validation->set_rules('title','Schedule','required|xss_clean');
				$this->form_validation->set_rules('start_date','Start Date','required|xss_clean');
				$this->form_validation->set_rules('end_date','End Date','required|xss_clean');
				$this->form_validation->set_rules('start_time','Start Time','required|xss_clean');
				$this->form_validation->set_rules('end_time','End Time','required|xss_clean');
				$this->form_validation->set_rules('bg_colors','Event Color','required|xss_clean');
				$this->form_validation->set_rules('allday','Event Type','required|xss_clean');
				$this->form_validation->set_rules('is_available','Is Available','required|xss_clean');
				if($this->form_validation->run())
				{
					$data_fields=array(
						'title'=>$_POST['title'],
						'start_date'=>$_POST['start_date'],
						'end_date'=>$_POST['end_date'],
						'start_time'=>$_POST['start_time'],
						'end_time'=>$_POST['end_time'],
						'bg_colors'=>$_POST['bg_colors'],
						'allday'=>$_POST['allday'],
						'is_available'=>$_POST['is_available']
					);
					
					$ins=$this->common_model->update_records('tbl_schedule',$data_fields,'id',base64_decode($_POST['id']));
					if($ins)
					{
						$this->session->set_userdata('error_msg',$this->lang->line('shedule_up_succ'));
						$this->session->set_userdata('error_cls','success');
					}
					else
					{
						$this->session->set_userdata('error_msg',$this->lang->line('shedule_up_un'));
						$this->session->set_userdata('error_cls','danger');
					}
					
					redirect(base_url().'dashboard/schedules?pg='.base64_encode('schedule-manage1'));
				}
			}
			 else
			if(isset($_POST['btn_update_resons']))
			{
				
				$this->form_validation->set_rules('reason','Reason','required|xss_clean');
				$this->form_validation->set_rules('message','Message','required|xss_clean');
			
				if($this->form_validation->run())
				{
					$data_fields=array(
						'reason'=>$_POST['reason'],
						'message'=>$_POST['message']
					);
					
					
					$ins=$this->common_model->update_records('tbl_booking_reasons',$data_fields,'id',base64_decode($_POST['id']));
				
					if($ins)
					{
						$this->session->set_userdata('error_msg',$this->lang->line('reason_up_succ'));
						$this->session->set_userdata('error_cls','success');
					}
					else
					{
						$this->session->set_userdata('error_msg',$this->lang->line('reason_up_un'));
						$this->session->set_userdata('error_cls','danger');
					}
					
					redirect(base_url().'dashboard/schedules?pg='.base64_encode('schedule-manage1'));
				}
			}

			else
			if(isset($_GET['ch']))
			{
				if($_GET['ch']=="del")
				{
					 
					$ins=$this->common_model->deleteRecords('tbl_schedule',base64_decode($_GET['id']));
					if($ins)
					{
						$this->session->set_userdata('error_msg',$this->lang->line('shedule_d_succ'));
						$this->session->set_userdata('error_cls','success');
					}
					else
					{
						$this->session->set_userdata('error_msg',$this->lang->line('shedule_d_un'));
						$this->session->set_userdata('error_cls','danger');
					}
				}
				
				if($_GET['ch']=="delre")
				{
					 
					$ins=$this->common_model->deleteRecords('tbl_booking_reasons',base64_decode($_GET['id']));
					if($ins)
					{
						$this->session->set_userdata('error_msg',$this->lang->line('reason_d_succ'));
						$this->session->set_userdata('error_cls','success');
					}
					else
					{
						$this->session->set_userdata('error_msg',$this->lang->line('reason_d_un'));
						$this->session->set_userdata('error_cls','danger');
					}
				}
				
				
				
				
				else if($_GET['ch']=='down')
				{
					$ins=$this->common_model->updateStatus('tbl_schedule',base64_decode($_GET['id']),0);
					if($ins)
					{
						$this->session->set_userdata('error_msg',$this->lang->line('shedule_p'));
						$this->session->set_userdata('error_cls','success');
					}
					else
					{
						$this->session->set_userdata('error_msg',$this->lang->line('shedule_err'));
						$this->session->set_userdata('error_cls','danger');
					}
				}
				else
			if($_GET['ch']=='up')
			{
				$ins=$this->common_model->updateStatus('tbl_schedule',base64_decode($_GET['id']),1);
				if($ins)
				{
					$this->session->set_userdata('error_msg',$this->lang->line('shedule_un'));
					$this->session->set_userdata('error_cls','success');
				}
				else
				{
					$this->session->set_userdata('error_msg',$this->lang->line('shedule_error'));
					$this->session->set_userdata('error_cls','danger');
				}
			}
			else if($_GET['ch']=='downre')
				{
					$ins=$this->common_model->updateStatus('tbl_booking_reasons',base64_decode($_GET['id']),0);
					if($ins)
					{
						$this->session->set_userdata('error_msg',$this->lang->line('reason_p'));
						$this->session->set_userdata('error_cls','success');
					}
					else
					{
						$this->session->set_userdata('error_msg',$this->lang->line('shedule_err'));
						$this->session->set_userdata('error_cls','danger');
					}
				}
				else
			if($_GET['ch']=='upre')
			{
				$ins=$this->common_model->updateStatus('tbl_booking_reasons',base64_decode($_GET['id']),1);
				if($ins)
				{
					$this->session->set_userdata('error_msg',$this->lang->line('reason_un'));
					$this->session->set_userdata('error_cls','success');
				}
				else
				{
					$this->session->set_userdata('error_msg',$this->lang->line('shedule_error'));
					$this->session->set_userdata('error_cls','danger');
				}
			}
				redirect(base_url().'dashboard/schedules?pg='.base64_encode('schedule-manage1'));
				
			}
			if(isset($_POST['btn_change_stat']))
			{
				echo $_POST['display_stat'];
				$data_val=array('display_schedule'=>$_POST['display_stat']);
				$ins=$this->common_model->update_records('tbl_website_settings',$data_val,'id','1');
				if($ins)
				{
					$this->session->set_userdata('error_msg',$this->lang->line('shedule_s_succ'));
					$this->session->set_userdata('error_cls','success');
				}
				else
				{
					$this->session->set_userdata('error_msg',$this->lang->line('shedule_s_un'));
					$this->session->set_userdata('error_cls','danger');
				}
				redirect(base_url().'dashboard/schedules');
			}
			
			
	 		$this->load->view('dashboard/template',$data);
	 }
	 
	 public function reservation()
	 {
	 	$lang='';
		if(isset($_GET['ln']))
		{
			$this->session->set_userdata('language',$_GET['ln']);
		}
	     $this->lang->load('content', $lang=='' ?  $this->session->userdata('language') : $lang);
		
       
        
        $data['dashboard']= $this->lang->line('dashboard');
        $data['web_setting']= $this->lang->line('web_setting');
        $data['web_slider']= $this->lang->line('web_slider');
        $data['home_page_setting']= $this->lang->line('home_page_setting');
        $data['blog']= $this->lang->line('blog');
        $data['news']= $this->lang->line('news');
        $data['event']= $this->lang->line('event');
        $data['appointment']= $this->lang->line('appointment');
        $data['reservation']= $this->lang->line('reservation');
        $data['web_pages']= $this->lang->line('web_pages');
        $data['video']= $this->lang->line('video');
        $data['newsletter_design']= $this->lang->line('newsletter_design');
        $data['newsletter']= $this->lang->line('newsletter');
        $data['sub_user']= $this->lang->line('sub_user');
        $data['web_enq']= $this->lang->line('web_enq');
        $data['contact_details']= $this->lang->line('contact_details');        
        $data['designed_by']= $this->lang->line('designed_by');  
        
        
        $data['tbl_sr_no']= $this->lang->line('tbl_sr_no');        
        $data['tbl_heading']= $this->lang->line('tbl_heading');        
        $data['tbl_discription']= $this->lang->line('tbl_discription');        
        $data['tbl_status']= $this->lang->line('tbl_status');        
        $data['tbl_img']= $this->lang->line('tbl_img');        
        $data['tbl_action']= $this->lang->line('tbl_action');        
        $data['tbl_date']= $this->lang->line('tbl_date');           

        $data['mng_reservation']= $this->lang->line('mng_reservation');           
		$data['tbl_a_date']= $this->lang->line('tbl_a_date');           
		$data['tbl_a_time']= $this->lang->line('tbl_a_time');           

        $data['confirmed']= $this->lang->line('confirmed');           
		$data['not_confirmed']= $this->lang->line('not_confirmed');           
		$data['tbl_email']= $this->lang->line('tbl_email');                     
		$data['tbl_phone']= $this->lang->line('tbl_phone');           
		                  
		$data['delete']= $this->lang->line('delete'); 
		$data['tbl_person_name']= $this->lang->line('tbl_person_name'); 
		 
	 	if(isset($_GET['ch']))
	 	{
			if($_GET['ch']=='del')
			{
				$ins=$this->common_model->deleteRecords('tbl_booking_appointment',base64_decode($_GET['id']));
				if($ins)
				{
					$this->session->set_userdata('error_msg',$this->lang->line('r_del_succ'));           
		                  
					$this->session->set_userdata('error_cls','success');
				}
				else
				{
					$this->session->set_userdata('error_msg',$this->lang->line('r_del_un'));
					$this->session->set_userdata('error_cls','danger');
				}
			}
			else
			if($_GET['ch']=='confirm')
			{
				$emailid=$this->db->query("select for_support as emailid from tbl_website_settings where id = '1'")->row();
				if($emailid)
				{
					
					$msg='
<div>
<table width="650" border="0" align="center" cellspacing="0" cellpadding="0" style="border:1px solid #c5c5c5;padding:20px;width:650px;margin:20px auto">
	<tbody><tr>
		<td>
			<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
				<tbody><tr style="border:0px;background-color:#ffdc34">
					<td align="center" valign="top">
					<a href="'.base_url().'">
					<img src="'.base_url().'assets/dashboard/uploads/logo.png" />
					</a></td>
				</tr>
			</tbody></table>
			<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
				<tbody><tr>
					<td align="left" valign="top" style="padding:0 30px;font-family:Arial,Helvetica,sans-serif;font-size:15px;line-height:24px;color:#191b1f;text-align:left">
						<h3>Hello '.strtoupper(base64_decode($_GET['nm'])).',</h3>
						<p></p><p>Congratulations !!! <span class="il">Your</span> <span class="il">appointment</span> has been created successfully</p>

<p><span class="il">Your</span> email is <a href="mailto:'.base64_decode($_GET['email']).'" target="_blank">'.base64_decode($_GET['email']).'</a></p>

<p>Please click <a href="'.base_url().'site/confirm_booking?booking_id='.base64_encode(base64_encode(base64_encode($_GET['id']))).'" target="_blank">here</a> to confirm <span class="il">your</span> <span class="il">booking</span></p><p></p>
 </td>
				</tr>
			</tbody></table>
			<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" style="border:1px solid #d7d7d7;background:#e9e9e9;padding:10px;margin:20px 0">
			</table>
			<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" style="border:1px solid #d7d7d7;background:#f3f3f3;padding:10px;margin-bottom:20px">
				<tbody><tr>
					<td align="left" valign="middle" style="font-size:11px;font-family:Arial,Helvetica,sans-serif;color:#666666;font-style:italic;text-align:left"> Copyright © <u></u> '.base_url().', All rights reserved. </td>
				</tr>
			</tbody></table>
		</td>
	</tr>
</tbody></table><div class="yj6qo"></div><div class="adL">
</div></div>';


			
/*
					$config = Array(
						'protocol' => 'smtp',
				        'smtp_host' => 'ssl://smtp.gmail.com',
				        'smtp_port' => 465,
				        'smtp_user' => 'rajendra827@gmail.com',
				        'smtp_pass' => '9185awds',
				        'mailtype'  => 'html', 
				        'charset' => 'utf-8',
				        'wordwrap' => TRUE
			    	);
				    $this->load->library('email', $config);
					$this->email->set_mailtype("html");
				    $this->email->set_newline("\r\n");
		 
				    $this->email->from('rajendra827@gmail.com', $this->website_name);
				    
				    $list = array(base64_decode($_GET['email']));
				
				    $this->email->to($list);
				    $this->email->subject('Appointment Confirmation');
				    $this->email->message($msg);

				    $stat=$this->email->send();
				    
				    //echo $this->email->print_debugger();
				     */
	 	   $to = base64_decode($_GET['email']);
		   $subject = 'Appointment Confirmation';
		   $message = "";
		   $header = "From:".$emailid->emailid." \r\n";
		   $header .= "MIME-Version: 1.0\r\n";
		   $header .= "Content-type: text/html\r\n";
		   $stat = mail ($to,$subject,$msg,$header);
	 
					if($stat==1)
					{
						$data_fiels=array(
							'status'=>'sent_to_user'
						)	;
						
						$ins=$this->common_model->update_records('tbl_booking_appointment',$data_fiels,'id',base64_decode($_GET['id']));
						if($ins)
						{
							$this->session->set_userdata('error_msg',$this->lang->line('r_c_succ'));
							$this->session->set_userdata('error_cls','success');
						}
						else
						{
							$this->session->set_userdata('error_msg',$this->lang->line('r_c_un'));
							$this->session->set_userdata('error_cls','danger');
						}
					}
					else
					{
						$this->session->set_userdata('error_msg',$this->lang->line('r_c_m_un'));
						$this->session->set_userdata('error_cls','danger');
						redirect(base_url().'dashboard/reservation');
					}


 
	
	
	  
				}
				
			}
			redirect(base_url().'dashboard/reservation');
		}
	 		$data['page_header']="Manage Reservation | " . $this->website_name;
			$data['Website_name']=$this->website_name;
		 	$data['page']='reservation-manage';
		 	$this->load->view('dashboard/template',$data);
	 }
}
?>