<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Payment extends CI_Controller 
{
	function __construct()
    {
		parent::__construct();
		$this->load->library('session');
		$this->load->model('Database');
	}
	
	
	public function index()
	{
		$header_data['PAGE_TITLE']="Payment";
		$this->load->view("header",$header_data);
		$this->load->view("braintreeConfig");
		
		
		if(isset($_REQUEST['payment_method_nonce'])){
			$total = $_REQUEST['paymentAmount'];
			$firstName = $_REQUEST["first_name"];
			$lastName = $_REQUEST["last_name"];
			$addressLine1= $_REQUEST['line1'];
			$addressLine2 = $_REQUEST['line2'];
			$city= $_REQUEST['city'];
			$state= $_REQUEST['state'];
			$postalCode = $_REQUEST['postal_code'];
			$countryCode= $_REQUEST['country_code'];
			$currencyCode = $_REQUEST['currencyCodeType'];
			$nonce = $_REQUEST['payment_method_nonce'];
			$postUserID = $_REQUEST['userid'];
		}
		
		$result = Braintree_Transaction::sale(array(
			'amount' => $total,
			'channel'=> 'PP-DemoPortal-BT-HF_PP-php',
			'paymentMethodNonce' => $nonce,
			'customer' => array(
				'firstName' => $firstName,
				'lastName' => $lastName,
			),
			'shipping' => array(
				'firstName' => $firstName,
				'lastName' => $lastName,
				'streetAddress' => $addressLine1,
				'extendedAddress' => $addressLine2,
				'locality' => $city,
				'region' => $state,
				'postalCode' => $postalCode,
				'countryCodeAlpha2' => $countryCode
			)
		));
		
		$nvSucessStatus = $result->success;
		$nvTransactionID =  $result->transaction->id;
		
		
		$filed_value['payment_status']=$nvSucessStatus;
		$filed_value['transaction_id']=$nvTransactionID;
		$update=$this->Database->updateRecord('users',$filed_value,'user_id',$postUserID);
		
		
		
		$return['result']= $result;
		
		$this->load->view("tpl_payment",$return);
		$this->load->view("footer");
	}
	
	
	
}