<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Checkout extends CI_Controller 
{
	function __construct()
    {
		parent::__construct();
		$this->load->library('session');
		$this->load->model('Database');
	}
	
	
	public function index()
	{
		$header_data['PAGE_TITLE']="Checkout";
		$this->load->view("header",$header_data);
		$this->load->view("braintreeConfig");
		if(isset($_GET['insID']))
		{
			
			if($_GET['insID'] < 20)
			{
				redirect(base_url(),"refresh");
			}
			
			
			
			
			$userarray = $this->Database->getTblRecord("users", array("user_id"=>$_GET['insID']));

		
		
		
		
		}
		else
		{
			$userarray = "";
		}
		$return['userarray']= $userarray;
		$this->load->view("tpl_checkout",$return);
		$this->load->view("footer");
	}
	
	
	
}