<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	 
	function __construct()
    {

        // Call the Model constructor
		// $this->output->enable_profiler(TRUE);  
		parent::__construct();
		
    }
	
	
	public function index()
	{
		$this->load->library('session');
		$this->load->library('email');
		$this->load->model('Database');
		//$centerVal=$this->Database->getAllRecord('users');
		$centerVal=$this->Database->getAlladminRecord();
		$center['center']=$centerVal;
		$this->load->helper('url');

		$head_data['PAGE_TITLE']="CAPA-Rad";
		$this->load->view('header',$head_data);
		if ($this->session->userdata('logged_in'))
		{
			$redirectTo = base_url('admin/');
			if($this->session->userdata('role')=='parent')
			{
				$redirectTo = base_url('parents/');
			}
			if($this->session->userdata('role')=='teachers')
			{
				$redirectTo = base_url('teachers/');
			}
			if($this->session->userdata('role')=='clinical')
			{
				$redirectTo = base_url('clinical/');
			}
			
			header('Location: '.$redirectTo);
		}
		else
		{
			$this->load->view('tpl_home');
		}
		$this->load->view('modal',$center);
		$this->load->view('footer');
	}
	
	function forgot()
    {
		$this->load->library('session');
		$this->load->library('email');
		$this->load->model('Database');
		$this->load->helper('url');
		$head_data['PAGE_TITLE']="Forgot Password";
		$this->load->view('header',$head_data);
		$this->load->view('tpl_forgot_pass');
		$this->load->view('modal');
		$this->load->view('footer');
    }
	//For Registration 
	public function registration()
	{	
		$this->load->model('Database');
		$this->load->library('email');
		//create insert array
		$data = array(
		   'name' => $_POST['name'],
		   'email' => $_POST['email'],
		   'password'=>md5($_POST['password']),
		   'number_of_child'=>$_POST['number_of_child'],
		   'center_name'=>$_POST['center_name'],
		   'total_amount'=>$_POST['total_amount'],
		   'role'=>'admin'
 		);
		
		
		if($_POST['name']=="")
		{
			$return['result'] = 'error';
			$return['msg']="Name is Required";	
		}
		elseif($_POST['email']=="")
		{
			$return['result'] = 'error';
			$return['msg']="Name is Required";
		}
		elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
		{
			$return['result'] = 'error';
			$return['msg']="Please Enter Valid Email Address";
		}
		elseif($this->Database->checkeAllreadyExist('users','email',$_POST['email'])=='true')
		{
			$return['result'] = 'error';
			$return['msg']="Email alyready exists";
		}
		elseif(!preg_match("@[A-Z]@",$_POST['password']) || !preg_match("@[a-z]@",$_POST['password']) || !preg_match("@[0-9]@",$_POST['password']) || !preg_match("@[^a-zA-z0-9]@",$_POST['password']))
		{
				$return['result'] = 'error';
				$return['msg']="Please enter password with one small letter,one capital letter, one number and one symbol";
		}
		elseif($_POST['password'] != $_POST['confirn_password'])
		{
			$return['result'] = 'error';
			$return['msg']="Confrim password and password dose not match!";
		}
		elseif($_POST['number_of_child']=="")
		{
			$return['result'] = 'error';
			$return['msg']="Enter No of Children";
		}
		elseif($_POST['center_name']=="")
		{
			$return['result'] = 'error';
			$return['msg']="Enter Center Name";
		}
		else
		{
			$userid=$this->Database->AddFunction('users',$data); //create user
			
			$query_string="INSERT IGNORE INTO `p_master` (p_email,p_text) values ('".$_POST['email']."','".$this->Enc->encrypt($_POST['password'])."')";
			$this->db->query($query_string);

			//for creating group
			$groupData = array(
			'group_name' => $_POST['center_name'],
			'createdby' => $userid,
			'number_of_child'=>$_POST['number_of_child'],
			'is_active'=>'1');
			$this->Database->addFunction('group',$groupData);  //create group
			
				//for send email
			/*$this->email->from('hello@capared.com', 'capa-red');
			$this->email->to($_POST['email']);
			$this->email->subject('You Registration Successfully!');
			$this->email->message('Thank you for Registration.\n User Name/Email:"'.$_POST['email'].'" \n Password :"'.$_POST['password'].'"');
			$this->email->send();*/
			$email=$_POST['email'];
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: <no-reply@caparad.com>' . "\r\n";

//			mail($email,"You Registration Successfully!",'Thank you for Registration.\n User Name/Email:"'.$_POST['email'].'" \n Password :"'.$_POST['password'].'"',$headers);


									$result = $this->email
									->from('no-reply@therada.co.uk')
									->to($email)
									->subject("You Registration Successfully!")
									->message('Thank you for Registration.\n User Name/Email:"'.$_POST['email'].'" \n Password :"'.$_POST['password'].'"')
									->send();

			
			$return['result'] = 'success';
			$return['msg']="You are Register Successfully!";
			$return['insid']=$userid;
			
		}
		echo json_encode($return);
	}
	//For Login 
	public function loginform()
	{
		$email=$_POST['email'];
		$password=$_POST['password'];
		
		$this->load->model('Database');
		$this->load->library('session');		
		
		$check=$this->Database->checklogin($email,$password);  
		
		if($email!='' && $password!='')
		{
			if(count($check)>0)
			{
				$_SESSION['logged_in'] = true;
				$_SESSION['userid'] = $check[0]->user_id;
				$_SESSION['username'] = $check[0]->name;
				$_SESSION['email'] = $check[0]->email;
				$_SESSION['role'] = $check[0]->role;
				$return['result'] = 'success';
				$return['msg']="Login Succesfully!";	
				$rediectTo=base_url("/admin");
				if(strtolower($_SESSION['role'])=='parent')
				{
					$rediectTo=base_url("/parents");
				}
				else if(strtolower($_SESSION['role'])=='teacher')
				{
					$rediectTo=base_url("/teachers");
				}
				else if($this->session->userdata('role')=='clinical')
				{
					$redirectTo = base_url('clinical/');
				}
				
				$return['redirect']=$rediectTo;
			}
			else
			{
				$return['result'] = 'error';
				$return['msg']="Wrong email or password";	
			}
		}else{
			
			$return['result'] = 'error';
			$return['msg']="Wrong email or password";
		}
		echo json_encode($return);
	}
	
	public function forgotPassword()
	{
		$this->load->model('Database');
		$this->load->library('session');
		$config = Array(
			  'mailtype' => 'html',
			  'charset' => 'iso-8859-1'
			);		
		$this->load->library('email',$config);
		
		$check=$this->Database->forgotEmail('users',$_POST['email']);
		if(count($check)<=0 || $check=="")
		{
			$return['result'] = 'error';
			$return['msg']="Wrong password";	
		}
		else
		{	
			$return['result'] = 'success';
			$return['msg']="Check Mail";
			$this->Database->updateForgotString('users',$check[0]->user_id);
			
			$check=$this->Database->forgotEmail('users',$_POST['email']);
			
				$email=$_POST['email'];
				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
				$headers .= 'From: <no-reply@caparad.com>' . "\r\n";

//				mail($email,"Reset Password!",'Click on this link to reset password.<br/> <a href="'.base_url('/home/forgot?email='.$email.'&usercode='.$check[0]->forgot_string).'">Click Here to reset password</a>',$headers);

									$result = $this->email
									->from('no-reply@therada.co.uk')
									->to($email)
									->subject("Reset Password!")
									->message('Click on this link to reset password.<br/> <a href="'.base_url('/home/forgot?email='.$email.'&usercode='.$check[0]->forgot_string).'">Click Here to reset password</a>')
									->send();


/*
//			$config['mailtype'] = 'html';
//			$this->email->from('hello@capared.com', 'capa-red');
			$this->email->to($_POST['email']);
			$this->email->subject('Reset Password!');
//$this->email->message('Click on this link to reset password.<br/> <a href="http://192.168.1.51/Darpan/project/capared/home/forgot?email='.$email.'&usercode='.$check[0]->forgot_string.'">Click Here to reset password</a>');
			$this->email->message('Click on this link to reset password.<br/> <a href="'.base_url('/home/forgot?email='.$email.'&usercode='.$check[0]->forgot_string).'">Click Here to reset password</a>');
			$this->email->send();
*/

		}
		echo json_encode($return);
	}
	public function resetpassword()
	{
		$this->load->model('Database');
		$this->load->library('session');	
		$this->load->library('email');
		
		$email=$_POST['email'];
		$usercode=$_POST['usercode'];
		$password=$_POST['pass'];
		$confpassword=$_POST['confirm_pass'];
		if(!preg_match("@[A-Z]@",$password) || !preg_match("@[a-z]@",$password) || !preg_match("@[0-9]@",$password) || !preg_match("@[^a-zA-z0-9]@",$password))
		{
				$return['result'] = 'error';
				$return['msg']="Please enter password with one small letter,one capital letter, one number and one symbol";
		}
		elseif($password!=$confpassword)
		{
			$return['result'] = 'error';
			$return['msg']="Confrim password and password dose not match!";
			
		}else{
			
				$this->Database->updatePassword('users',$email,$usercode,$password);
				$return['result'] = 'success';
				$return['msg']="Update Successfully!";
		}
		echo json_encode($return);
	}
	
	public function getCenter()
	{
		$this->load->model('Database');
		$row=$this->Database->getRow('users','user_id',$_POST['centerId']);
		if(!empty($row))
		{
			?>
			<div class="form-row">
				<div class="l-row"><label>Name</label></div>
				<div class="r-row"><input class="input-text" value="<?php echo $row[0]->name; ?>" type="text" placeholder="Ireen O'Neil"></div>
			</div>
			<div class="form-row">
				<div class="l-row"><label>Email</label></div>
				<div class="r-row"><input class="input-text" value="<?php echo $row[0]->email; ?>" type="email" placeholder="Ireen@gla.ac.uk"></div>
			</div>
			<div class="form-row">
				<div class="l-row"><label>Phone</label></div>
				<div class="r-row"><input class="input-text" value="<?php //echo $row[0]->email; ?>" type="tel" placeholder="0141 221 xxxx"></div>
			</div>
			<?php
		}
		else
		{
			?>
            <div class="form-row">
                <div class="l-row"><label>Name</label></div>
                <div class="r-row"><input class="input-text" value="" type="text" placeholder="Ireen O'Neil"></div>
            </div>
            <div class="form-row">
                <div class="l-row"><label>Email</label></div>
                <div class="r-row"><input class="input-text" value="" type="email" placeholder="Ireen@gla.ac.uk"></div>
            </div>
            <div class="form-row">
                <div class="l-row"><label>Phone</label></div>
                <div class="r-row"><input class="input-text" value="" type="tel" placeholder="0141 221 xxxx"></div>
            </div>
            <?php
		}
	}

	function logout()
	{
		unset($_SESSION['logged_in']);
		unset($_SESSION['userid']);
		unset($_SESSION['username']);
		unset($_SESSION['email']);
		unset($_SESSION['role']);
		
		unset($_SESSION['nvuserid']);
		unset($_SESSION['nvusername']);
		unset($_SESSION['nvemail']);
		unset($_SESSION['nvrole']);
		unset($_SESSION['childsession']);
		unset($_SESSION['groupidsession']);
		redirect(base_url(),"refresh");
	}
}