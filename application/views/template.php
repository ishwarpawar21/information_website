<?php
$page_data['page_header']=$page_header;
$page_data['Website_name']=$Website_name;

		$this->load->view('site-header',$page_data);
		$this->load->view($page);
		$contact=$this->db->query("select * from  tbl_contact_details WHERE id='1'")->row();
		$this->load->view('site-footer',$contact);
?>