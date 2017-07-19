<?php
$page_data['page_header']=$page_header;
$page_data['Website_name']=$Website_name;

		$this->load->view('dashboard/dashboard-header',$page_data);
		$this->load->view('dashboard/dashboard-left-menu');
		$this->load->view('dashboard/'.$page);
		$this->load->view('dashboard/dashboard-footer');
?>