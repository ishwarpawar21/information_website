<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Carts extends CI_Controller {
	function __construct() {
		parent::__construct();
	}
	
	public function add()
	{ 
		$data=array(
			'name' => $_POST['pnm'],
			'id'	=> $_POST['pid'],
			'price'	=> $_POST['pop'],
			'qty'	=> $_POST['pqty']
		);
		 
		$this->cart->insert($data);
		$this->session->set_userdata('cart_msg','Product added to cart successfully.');
		$this->session->set_userdata('cart_class','success');
		redirect(base_url().'site/page?page=product_details&product_id='.$_POST['pid']);
	}
	
	public function show()
	{
		$carts = $this->cart->contents();
		
		print_r($carts);
		
	}
	
	public function remove()
	{
		$data=array(
				'rowid' => $_GET['rowid'],
				'qty'	=> 0
			);
			$this->cart->update($data);
			
			$this->session->set_userdata('cart_msg','Product remove from cart successfully.');
			$this->session->set_userdata('cart_class','success');
			
		if(isset($_GET['product_id']))
		{
	 		redirect(base_url().'site/page?page=product_details&product_id='.$_GET['product_id']);
		}
		else
		if(isset($_GET['ch']))
		{
			redirect(base_url().'user/page?page=user_account');
		}
		else
		{
			redirect(base_url().'site/page?page='.$_GET['page']);
		}	
	}
}
	
?>