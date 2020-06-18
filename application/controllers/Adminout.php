<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller {



	public	function __construct()
	{
		 parent::__construct();
        $this->load->model('Database');
			$this->load->library('email');

	}

        public function index()
        {
			$this->load->library('session');
			$this->load->model('Database');
			$val=$this->Database->getRow('group','createdby',$_SESSION['userid']);
//			echo "<br>---".$this->db->last_query(); 
			$this->load->helper('url');
			$head_data['PAGE_TITLE']="CAPA-Rad";
			$this->load->view('header',$head_data);
			$user['data']=$val;
			$user['username']=$_SESSION['username'];
			//echo "<br>-=-=-=".$this->session->userdata('nvrole');
			if (!$this->session->userdata('logged_in'))
			{
				
				header('Location: '.base_url());
			}
			else
			{
				if($this->session->userdata('role')=='clinical')
				{
					$redirectTo = base_url('clinical/');
					header('Location: '.$redirectTo);
				}
				$this->load->view('tpl_admin',$user);
			}
			$userDetail=$this->Database->getRow('users','user_id',$_SESSION['userid']);
			$data['userDetail']=$userDetail;
			$this->load->view('modal',$data);
			$this->load->view('footer');
			//$this->sessilion->unset_userdata('logged_in');
        }
		public function updateProfile()
		{
			$this->load->model('Database');
			if($_POST['name']!=''){
			$filed_value['name']=$_POST['name'];
			}
			if($_POST['email']!="")
			{
				$filed_value['email']=$_POST['email'];
			}
			if($_POST['updated_password']!="")
			{
				$filed_value['updated_password']=md5($_POST['updated_password']);
			}
			if($_POST['center_name']!="")
			{
				$filed_value['center_name']=$_POST['center_name'];
			}
			$update=$this->Database->updateRecord('users',$filed_value,'user_id',$_POST['uid']);
			if($update>0)
			{
				$return['result'] = 'success';
				$return['msg']="Record Update Successfully";
			}else{
				$return['result'] = 'error';
				$return['msg']="Record cant updated Successfully";
			}
			echo json_encode($return);
		}
		public function getChildren()
		{
			$this->load->model('Database');
			if($_POST['groupid']!="" and $_POST['userid']!="")
			{
				$childrens=$this->Database->getRow('children','group_id',$_POST['groupid']);
				
				$groupDetail=$this->Database->getRow('group','group_id',$_POST['groupid']);
				$totRecByUid=$this->Database->getRow('children','user_id',$_POST['userid']);
				//$totalPucharesedChild=$this->Database->sumofRecord('group','number_of_child','createdby',$_POST['userid']);
				$PucharesedChild=$this->Database->getRow('users','user_id',$_SESSION['userid']);
				$totalPucharesedChild=$PucharesedChild[0]->number_of_child;
				
				if($totalPucharesedChild==count($totRecByUid) || $totalPucharesedChild<=count($totRecByUid))
				{
					$class="nomore";
					$model="myModal-14";
				}else{
					$class="addchild";
					$model="myModal-5";
				}
					echo'<ul>
							<li>
								<a href="javascript:void(0)">New</a>
								<a class="icon-1 '.$class.' inactive" data-groupid="'.$groupDetail[0]->group_id.'" data-userid="'.$groupDetail[0]->createdby.'" href="javascript:void(0);" data-toggle="modal" data-target="#'.$model.'" title="Add New Child"></a>
							</li>';
				$nvfilenm = $groupDetail[0]->filename;		
				if(count($childrens)>0){
					foreach($childrens as $child)
					{	
						echo'
							<li class="'.$child->id.'-replace">
								<a href="#" class="nvselchildren">'.$child->name.'</a>
								<a class="icon-1 eye editchild" id="'.$child->id.'" data-childid="'.$child->id.'" data-groupid="'.$child->group_id.'" data-userid="'.$child->user_id.'" href="#"  data-toggle="modal" data-target="#myModal-5" title="Edit Child Profile"></a>
								<a class="icon-2 pencil observation admin_observation" id="'.$child->id.'" data-childid="'.$child->id.'" data-groupid="'.$child->group_id.'" data-userid="'.$child->user_id.'" data-file="'.base_url().'Document/'.$nvfilenm.'" href="#" data-modal="#myModal-7" title="Child Information" ></a>
							</li>';
					}
					echo'</ul>';
				}
			}
			 
		}
		
		public function addChildren()
		{
			$this->load->model('Database');
			$this->load->helper('url');
			$this->load->library('session');
			$config = Array(
			  'mailtype' => 'html',
			  'charset' => 'iso-8859-1'
			);		
			$this->load->library('email',$config);
		
			//echo 'ddddddd'.$_POST['childid'];
			
			//$nvExplodeBdate = explode(" ",$_POST['birthdate']);
			
			
			
			if($_POST['name']=="")
			{
				$return['result'] = 'error';
				$return['msg']="Name is Required";	
			}elseif($_POST['birthdate']=="")
			{
				$return['result'] = 'error';
				$return['msg']="birthdate is Required";	
			}elseif($_POST['gender']=="")
			{
				$return['result'] = 'error';
				$return['msg']="gender is Required";	
			}elseif($_POST['clinician_email']=="")
			{
				$return['result'] = 'error';
				$return['msg']="clinician email is Required";	
			}elseif($_POST['parent_1_email']=="" && $_POST['parent_2_email']=="")
			{
				
				$return['result'] = 'error';
				$return['msg']="parent email is Required";	
			}elseif($_POST['teacher_email']=="")
			{
				$return['result'] = 'error';
				$return['msg']="teacher email is Required";	
			}else
			{
				if(!isset($_POST['childid'])) //check child if not exist then add 
				{
					
					$nvpostBdate = date("Y-m-d", strtotime($_POST['birthdate']));
					
					$data = array(
					   'name' => $_POST['name'],
					   'user_id'=>$_POST['userid'],
					   'group_id'=>$_POST['groupid'],
					   'birthdate'=>$nvpostBdate,
					   'gender'=>$_POST['gender'],
					   'clinician_email'=>$_POST['clinician_email'],
					   'parent_1_email'=>$_POST['parent_1_email'],
					   'parent_2_email'=>$_POST['parent_2_email'],
					   'teacher_email'=>$_POST['teacher_email']
					  );
						$lastId=$this->Database->addFunction('children',$data);
						$val=$this->Database->getRow('children','id',$lastId);
						$passwordParent=$this->Database->generateRandomString(8);
						$passwordParent2=$this->Database->generateRandomString(9);
						$passwordClinician=$this->Database->generateRandomString(9);
						$passwordTeacher=$this->Database->generateRandomString(10);
						
						//check and send mail to parent 1
							if($_POST['parent_1_email']!='')
							{
								$createParentEmail=$_POST['parent_1_email'];
								if($this->Database->checkeAllreadyExist('users','email',$createParentEmail)=='true')
								{
									$userdata=$this->Database->getRow('users','email',$createParentEmail);
									$email=$createParentEmail;
									$headers  = "MIME-Version: 1.0" . "\r\n";
									$headers .= "Content-type: text/plain; charset=UTF-8" . "\r\n";
									$headers .= "Return-Path: no-reply@attachmentdisorderassessment.com\r\n";
									$headers .= 'From: no-reply@attachmentdisorderassessment.com' . "\r\n";
									$headers .= "X-Priority: 3\r\n";
									$headers .= "X-Mailer: PHP". phpversion() ."\r\n" ;
									
									$nvemailmsg = "This is a message from Capa-RAD.com who has successfully log you as a parent for ".$_POST['name'].".<BR><BR>You can now log in using your email address ".$userdata[0]->email." and this password ".$passwordParent.".<BR>  Thank you";
									
//									mail($email,"You Registration Successfully!",$nvemailmsg,$headers);

//									->from('no-reply@attachmentdisorderassessment.com')
									$result = $this->email
									->from('attachmentdisorderassessment@gmail.com')
									->to($email)
									->subject("You Registration Successfully!")
									->message($nvemailmsg)
									->send();
									/*$this->email->set_mailtype("html");
									$this->email->from('no-reply@caparad.com', 'no-reply');
									$this->email->to($createParentEmail);
									$this->email->subject('You Registration Successfully!');
									$this->email->message('Please login and review question Email :- <BR><BR>'.$userdata[0]->email.'<br/> Password :- '.$passwordParent.'');
									$this->email->send();*/
									$data=array(
												'user_id'=>$userdata[0]->user_id,
												'child_id'=>$lastId,
												'group_id'=>$_POST['groupid']
												);
									$child_of_user=$this->Database->addFunction('child_of_user',$data);
								}
								else
								{
									$data=array('name'=>'','email'=>$createParentEmail,'password'=>md5($passwordParent),'role'=>'parent');
									$userid=$this->Database->addFunction('users',$data);
									/*$this->email->set_mailtype("html");
									$userid=$this->Database->addFunction('users',$data);
//									$this->email->from('hello@caparad.com', 'capa-red');
									$this->email->from('no-reply@caparad.com', 'no-reply');

									$this->email->to($createParentEmail);
									$this->email->subject('You Registration Successfully!');
									$this->email->message('Please login and review question. <br><BR>Email :- '.$createParentEmail.'<br/>Password :- '.$passwordParent.'');
									$this->email->send();*/
									$userdata=$this->Database->getRow('users','email',$createParentEmail);
									$email=$createParentEmail;
									$headers  = "MIME-Version: 1.0" . "\r\n";
									$headers .= "Content-type: text/plain; charset=UTF-8" . "\r\n";
									$headers .= "Return-Path: no-reply@attachmentdisorderassessment.com\r\n";
									$headers .= 'From: no-reply@attachmentdisorderassessment.com' . "\r\n";
									$headers .= "X-Priority: 3\r\n";
									$headers .= "X-Mailer: PHP". phpversion() ."\r\n" ;
									
									$nvemailmsg = "This is a message from Capa-RAD.com who has successfully log you as a parent for ".$_POST['name'].".<BR><BR>You can now log in using your email address ".$createParentEmail." and this password ".$passwordParent.".<BR>  Thank you";
								//	mail($email,"You Registration Successfully!",$nvemailmsg,$headers);

									$result = $this->email
									->from('attachmentdisorderassessment@gmail.com')
									->to($email)
									->subject("You Registration Successfully!")
									->message($nvemailmsg)
									->send();


									/*mail($email,"You Registration Successfully!",'Please login and review question Email :- <BR><BR>'.$createParentEmail.'<br/> Password :- '.$passwordParent.'',$headers);*/
									
									$data=array(
											'user_id'=>$userid,
											'child_id'=>$lastId,
											'group_id'=>$_POST['groupid']
											);
									$child_of_user=$this->Database->addFunction('child_of_user',$data);
								}
							}
						//check and send mail to parent 2
							if($_POST['parent_2_email']!='')
							{
								$createParentEmail=$_POST['parent_2_email'];
								if($this->Database->checkeAllreadyExist('users','email',$createParentEmail)=='true')
								{
									$userdata=$this->Database->getRow('users','email',$createParentEmail);
									/*$this->email->from('hello@capared.com', 'capa-red');
									$this->email->to($createParentEmail);
									$this->email->subject('You Registration Successfully!');
									$this->email->message('please login and review question Email :- '.$userdata[0]->email.'<br/>Password :- '.$passwordParent.'');
									$this->email->send();*/
									$email=$createParentEmail;
									$headers  = "MIME-Version: 1.0" . "\r\n";
									$headers .= "Content-type: text/plain; charset=UTF-8" . "\r\n";
									$headers .= "Return-Path: no-reply@attachmentdisorderassessment.com\r\n";
									$headers .= 'From: no-reply@attachmentdisorderassessment.com' . "\r\n";
									$headers .= "X-Priority: 3\r\n";
									$headers .= "X-Mailer: PHP". phpversion() ."\r\n" ;
									
									$nvemailmsg = "This is a message from Capa-RAD.com who has successfully log you as a parent for ".$_POST['name'].".\r\n\r\nYou can now log in using your email address ".$userdata[0]->email." and this password ".$passwordParent2.".<BR>  Thank you";
									
//									mail($email,"You Registration Successfully!",$nvemailmsg,$headers);

									$result = $this->email
									->from('attachmentdisorderassessment@gmail.com')
									->to($email)
									->subject("You Registration Successfully!")
									->message($nvemailmsg)
									->send();
									/*mail($email,"You Registration Successfully!",'Please login and review question Email :- <BR><BR>'.$userdata[0]->email.'<br/> Password :- '.$passwordParent.'',$headers);*/
									$data=array(
											'user_id'=>$userdata[0]->user_id,
											'child_id'=>$lastId,
											'group_id'=>$_POST['groupid']
											);
									$child_of_user=$this->Database->addFunction('child_of_user',$data);
								}
								else
								{
									$data=array('name'=>'','email'=>$createParentEmail,'password'=>md5($passwordParent2),'role'=>'parent');
									$userid=$this->Database->addFunction('users',$data);
									/*$this->email->from('hello@capared.com', 'capa-red');
									$this->email->to($createParentEmail);
									$this->email->subject('You Registration Successfully!');
									$this->email->message('please login and review question. <br/>Email :- '.$createParentEmail.'<br/>Password :- '.$passwordParent.'');
									$this->email->send();*/
									$email=$createParentEmail;
									$headers  = "MIME-Version: 1.0" . "\r\n";
									$headers .= "Content-type: text/plain; charset=UTF-8" . "\r\n";
									$headers .= "Return-Path: no-reply@attachmentdisorderassessment.com\r\n";
									$headers .= 'From: no-reply@attachmentdisorderassessment.com' . "\r\n";
									$headers .= "X-Priority: 3\r\n";
									$headers .= "X-Mailer: PHP". phpversion() ."\r\n" ;
									
									$nvemailmsg = "This is a message from Capa-RAD.com who has successfully log you as a parent for ".$_POST['name'].".\r\n\r\nYou can now log in using your email address ".$createParentEmail." and this password ".$passwordParent2.".<BR>  Thank you";
									
//									mail($email,"You Registration Successfully!",$nvemailmsg,$headers);
									$result = $this->email
									->from('attachmentdisorderassessment@gmail.com')
									->to($email)
									->subject("You Registration Successfully!")
									->message($nvemailmsg)
									->send();
									/*mail($email,"You Registration Successfully!",'Please login and review question Email :- <BR><BR>'.$createParentEmail.'<br/> Password :- '.$passwordParent.'',$headers);*/
									$data=array(
												'user_id'=>$userid,
												'child_id'=>$lastId,
												'group_id'=>$_POST['groupid']
											   );
									$child_of_user=$this->Database->addFunction('child_of_user',$data);
								}
							}
						//check and send mail to clinical
							
							if($_POST['clinician_email']!='')
							{
								$createClinicalEmail=$_POST['clinician_email'];
								if($this->Database->checkeAllreadyExist('users','email',$createClinicalEmail)=='true')
								{
									$userdata=$this->Database->getRow('users','email',$createClinicalEmail);
									/*$this->email->from('hello@capared.com', 'capa-red');
									$this->email->to($createClinicalEmail);
									$this->email->subject('You Registration Successfully!');
									$this->email->message('please login and review question Email :- '.$userdata[0]->email.'<br/>Password :- '.$passwordClinician.'');
									$this->email->send();*/
									
									$email=$createClinicalEmail;
									$headers  = "MIME-Version: 1.0" . "\r\n";
									$headers .= "Content-type: text/plain; charset=UTF-8" . "\r\n";
									$headers .= "Return-Path: no-reply@attachmentdisorderassessment.com\r\n";
									$headers .= 'From: no-reply@attachmentdisorderassessment.com' . "\r\n";
									$headers .= "X-Priority: 3\r\n";
									$headers .= "X-Mailer: PHP". phpversion() ."\r\n" ;
									
									$nvemailmsg = "This is a message from Capa-RAD.com who has successfully log you as a clinician for ".$_POST['name'].".\r\n\r\nYou can now log in using your email address ".$userdata[0]->email." and this password ".$passwordClinician.".<BR>  Thank you";
									
//									mail($email,"You Registration Successfully!",$nvemailmsg,$headers);

									$result = $this->email
									->from('attachmentdisorderassessment@gmail.com')
									->to($email)
									->subject("You Registration Successfully!")
									->message($nvemailmsg)
									->send();

									
									/*mail($email,"You Registration Successfully!",'Please login and review question Email :- <BR><BR>'.$userdata[0]->email.'<br/> Password :- '.$passwordClinician.'',$headers);*/
									
									$data=array(
													'user_id'=>$userdata[0]->user_id,
													'child_id'=>$lastId,
													'group_id'=>$_POST['groupid']
												   );
										$child_of_user=$this->Database->addFunction('child_of_user',$data);
								}
								else
								{
									$data=array('name'=>'','email'=>$createClinicalEmail,'password'=>md5($passwordClinician),'role'=>'clinical');
									$userid=$this->Database->addFunction('users',$data);
									/*$this->email->from('hello@capared.com', 'capa-red');
									$this->email->to($createClinicalEmail);
									$this->email->subject('You Registration Successfully!');
									$this->email->message('please login and review question. <br/>Email :- '.$createClinicalEmail.'<br/>Password :- '.$passwordClinician.'');
									$this->email->send();*/
									$email=$createClinicalEmail;
									$headers  = "MIME-Version: 1.0" . "\r\n";
									$headers .= "Content-type: text/plain; charset=UTF-8" . "\r\n";
									$headers .= "Return-Path: no-reply@attachmentdisorderassessment.com\r\n";
									$headers .= 'From: no-reply@attachmentdisorderassessment.com' . "\r\n";
									$headers .= "X-Priority: 3\r\n";
									$headers .= "X-Mailer: PHP". phpversion() ."\r\n" ;									
									
									$nvemailmsg = "This is a message from Capa-RAD.com who has successfully log you as a clinician for ".$_POST['name'].".\r\n\r\nYou can now log in using your email address ".$createClinicalEmail." and this password ".$passwordClinician.".<BR>  Thank you";
									
//									mail($email,"You Registration Successfully!",$nvemailmsg,$headers);

									$result = $this->email
									->from('attachmentdisorderassessment@gmail.com')
									->to($email)
									->subject("You Registration Successfully!")
									->message($nvemailmsg)
									->send();

									/*mail($email,"You Registration Successfully!",'Please login and review question Email :- <BR><BR>'.$createClinicalEmail.'<br/> Password :- '.$passwordClinician.'',$headers);*/
									
									$data=array(
													'user_id'=>$userid,
													'child_id'=>$lastId,
													'group_id'=>$_POST['groupid']
												   );
										$child_of_user=$this->Database->addFunction('child_of_user',$data);
								}
							}
							
						
						//check teacher email and send it to mail
						if($_POST['teacher_email'] != "")
						{
							$createTeacherEmail=$_POST['teacher_email'];
							if($this->Database->checkeAllreadyExist('users','email',$createTeacherEmail)=='true')
							{
								$userdata=$this->Database->getRow('users','email',$createTeacherEmail);
								/*$this->email->from('hello@capared.com', 'capa-red');
								$this->email->to($createTeacherEmail);
								$this->email->subject('You Registration Successfully!');
								$this->email->message('please login and review question Email :- '.$userdata[0]->email.'<br/>Password :- '.$passwordClinician.'');
								$this->email->send();*/
								$email=$createTeacherEmail;
								$headers  = "MIME-Version: 1.0" . "\r\n";
								$headers .= "Content-type: text/plain; charset=UTF-8" . "\r\n";
								$headers .= "Return-Path: no-reply@attachmentdisorderassessment.com\r\n";
								$headers .= 'From: no-reply@attachmentdisorderassessment.com' . "\r\n";
								$headers .= "X-Priority: 3\r\n";
								$headers .= "X-Mailer: PHP". phpversion() ."\r\n" ;
								
								$nvemailmsg = "This is a message from Capa-RAD.com who has successfully log you as a teacher for ".$_POST['name'].".\r\n\r\nYou can now log in using your email address ".$userdata[0]->email." and this password ".$passwordTeacher.".<BR>  Thank you";
								
//								mail($email,"You Registration Successfully!",$nvemailmsg,$headers);

									$result = $this->email
									->from('attachmentdisorderassessment@gmail.com')
									->to($email)
									->subject("You Registration Successfully!")
									->message($nvemailmsg)
									->send();

								
								/*mail($email,"You Registration Successfully!",'Please login and review question Email :- <BR><BR>'.$userdata[0]->email.'<br/> Password :- '.$passwordClinician.'',$headers);*/
								
								$data=array(
											'user_id'=>$userdata[0]->user_id,
											'child_id'=>$lastId,
											'group_id'=>$_POST['groupid']
										   );
									$child_of_user=$this->Database->addFunction('child_of_user',$data);
							}
							else
							{
								$data=array('name'=>'','email'=>$createTeacherEmail,'password'=>md5($passwordTeacher),'role'=>'teacher');
								$userid=$this->Database->addFunction('users',$data);
								/*$this->email->from('hello@capared.com', 'capa-red');
								$this->email->to($createTeacherEmail);
								$this->email->subject('You Registration Successfully!');
								$this->email->message('please login and review question. <br/>Email :- '.$createTeacherEmail.'<br/>Password :- '.$passwordClinician.'');
								$this->email->send();*/
								$email=$createTeacherEmail;
								$headers  = "MIME-Version: 1.0" . "\r\n";
									$headers .= "Content-type: text/plain; charset=UTF-8" . "\r\n";
									$headers .= "Return-Path: no-reply@attachmentdisorderassessment.com\r\n";
									$headers .= 'From: no-reply@attachmentdisorderassessment.com' . "\r\n";
									$headers .= "X-Priority: 3\r\n";
								$headers .= "X-Mailer: PHP". phpversion() ."\r\n" ;
								
								$nvemailmsg = "This is a message from Capa-RAD.com who has successfully log you as a teacher for ".$_POST['name'].". You can now log in using your email address ".$createTeacherEmail." and this password ".$passwordTeacher.".<BR>  Thank you";
								
								/*mail($email,"You Registration Successfully!",'Please login and review question Email :- <BR><BR>'.$createTeacherEmail.'<br/> Password :- '.$passwordClinician.'',$headers);*/
//								mail($email,"You Registration Successfully!",$nvemailmsg,$headers);

									$result = $this->email
									->from('attachmentdisorderassessment@gmail.com')
									->to($email)
									->subject("You Registration Successfully!")
									->message($nvemailmsg)
									->send();

								$data=array(
												'user_id'=>$userid,
												'child_id'=>$lastId,
												'group_id'=>$_POST['groupid']
											   );
									$child_of_user=$this->Database->addFunction('child_of_user',$data);
							}
						}
							
							
						
						
						$output="";
						$output.='  <li class="'.$lastId.'-replace">
										<a href="#">'.$val[0]->name.'</a>
										<a class="icon-1 eye editchild" id="'.$lastId.'" data-childid="'.$val[0]->id.'" data-groupid="'.$val[0]->group_id.'" data-userid="'.$val[0]->user_id.'" href="#" data-toggle="modal" data-target="#myModal-5"></a>
										<a class="icon-2 pencil" href="#" data-toggle="modal" data-target="#myModal-7"></a>
								    </li>';
						$return['output'] = $output;
						$return['result'] = 'success';
						$return['msg']="Add Successfully!";
				}
				else
				{ 
					$nvpostBdate = date("Y-m-d", strtotime($_POST['birthdate']));
					
					$filed_value['name']=$_POST['name'];
					$filed_value['birthdate']=$nvpostBdate;
					$filed_value['gender']=$_POST['gender'];
					$filed_value['clinician_email']=$_POST['clinician_email'];
					$filed_value['parent_1_email']=$_POST['parent_1_email'];
					$filed_value['parent_2_email']=$_POST['parent_2_email'];
					$filed_value['teacher_email']=$_POST['teacher_email'];
					
					$this->Database->updateRecord('children',$filed_value,'id',$_POST['childid']);
					$val=$this->Database->getRow('children','id',$_POST['childid']);
					$output="";
					$output.='<li class="'.$_POST['childid'].'-replace">
								<a href="#">'.$val[0]->name.'</a>
								<a class="icon-1 eye editchild" id="'.$_POST['childid'].'" data-childid="'.$val[0]->id.'" data-groupid="'.$val[0]->group_id.'" data-userid="'.$val[0]->user_id.'" href="#" data-toggle="modal" data-target="#myModal-5"></a>
								<a class="icon-2 pencil" href="#" data-toggle="modal" data-target="#myModal-7"></a>
							  </li>';
					$return['updateoutput'] = $output;					
					$return['replaceclass'] = $_POST['childid'].'-replace';				
					$return['result'] = 'success';
					$return['msg']="Update Successfully!";
				}
			}
			echo json_encode($return);
		}
		public function editChildren()
		{
			$this->load->model('Database');
			$this->load->library('session');
			$val=$this->Database->getRow('children','id',$_POST['childid']);

			$output="";
			$malesel="";
			$femsel="";
			if($val[0]->gender=="Male")
			{
				$malesel="selected";
			}if($val[0]->gender=="Female")
			{
				$femsel="selected";
			}
			$nvSelBdate = date("F d, Y", strtotime($val[0]->birthdate));
			
			$output.='<input type="hidden" name="childid" value="'.$_POST['childid'].'" class="gid">
				<div class="form-row">';
					$output.= "<label>Child's Name</label>";
					$output.='<input class="input-text" name="name" value="'.$val[0]->name.'" type="text" placeholder="Ireen O Neil">
				</div>
				<div class="form-row">
					<label>Date of Birth</label>
					<input class="input-text dateBirdy" name="birthdate"  value="'.$nvSelBdate.'" type="text" placeholder="July 31, 1999">
				</div>
				<div class="form-row">
					<label>Gender</label>
					<select class="selectpicker" name="gender">
						<option  value="">Select Gender</option>
						<option '.$malesel.' value="Male">Male</option>
						<option '.$femsel.' value="Female">Female</option>
					</select>
				</div>
				<div class="form-row">
					<label>Clinician Email</label>
					<input class="input-text" type="email" value="'.$val[0]->clinician_email.'" name="clinician_email" placeholder="Clinician@clinician.com">
				</div>
				<div class="form-row">
					<label>Parent 1 Email</label>
					<input class="input-text" type="email" value="'.$val[0]->parent_1_email.'" name="parent_1_email" placeholder="Parent1@parent1.com">
				</div>
				<div class="form-row">
					<label>Parent 2 Email</label>
					<input class="input-text" type="email" value="'.$val[0]->parent_2_email.'" name="parent_2_email" placeholder="Parent2@parent2.com">
				</div>
				<div class="form-row">';
					$output.= "<label>Teacher's Email</label>";
					$confirn="";
					$output.= ' <input class="input-text" type="email" value="'.$val[0]->teacher_email.'" name="teacher_email" placeholder="Teacher@teacher.com">
				</div>
				<div class="form-row">
					<div class="row">
						<div class="col-xs-12">
							<a class="delete-btn" onclick="'.$confirn.'" data-id="'.$val[0]->id.'" data-grupid="'.$val[0]->group_id.'" href="#"><img src="'.base_url('public/').'images/rubbish-bin-icon-outlined-2.svg" alt=""></a>
							<input class="submit-btn" type="submit" value="Submit">
						</div>
					</div>
				</div>';
			 
			echo $output;
		}
		public function addNewChildren()
		{
			$this->load->model('Database');
			$this->load->library('session');
			$output="";
			$output.='<input type="hidden" name="groupid" value="'.$_POST['groupid'].'" class="gid">
					  <input type="hidden" name="userid" value="'.$_POST['userid'].'" class="uid">
				<div class="form-row">';
					$output.= "<label>Child's Name</label>";
					$output.='<input class="input-text" name="name" value="" type="text" placeholder="Ireen O Neil">
				</div>
				<div class="form-row">
					<label>Date of Birth</label>
					<input class="input-text dateBirdy" name="birthdate"  value="" type="text" placeholder="July 31, 1999">
				</div>
				<div class="form-row">
					<label>Gender</label>
					<select class="selectpicker" name="gender">
						<option  value="">Select Gender</option>
						<option value="Male">Male</option>
						<option value="Female">Female</option>
					</select>
				</div>
				<div class="form-row">
					<label>Clinician Email</label>
					<input class="input-text" type="email" value="" name="clinician_email" placeholder="Clinician@clinician.com">
				</div>
				<div class="form-row">
					<label>Parent 1 Email</label>
					<input class="input-text" type="email" value="" name="parent_1_email" placeholder="Parent1@parent1.com">
				</div>
				<div class="form-row">
					<label>Parent 2 Email</label>
					<input class="input-text" type="email" value="" name="parent_2_email" placeholder="Parent2@parent2.com">
				</div>
				<div class="form-row">';
					$output.= "<label>Teacher's Email</label>";
					$output.= ' <input class="input-text" type="email" value="" name="teacher_email" placeholder="Teacher@teacher.com">
				</div>
				<div class="form-row">
					<div class="row">
						<div class="col-xs-12">
							<a class="delete-btn" href="#"><img src="'.base_url('public/').'images/rubbish-bin-icon-outlined-2.svg" alt=""></a>
							<input class="submit-btn" type="submit" value="Submit">
						</div>
					</div>
				</div>';
				echo $output;
		}
		public function deleteChild()
		{
			$this->load->library('session');
			$this->load->model('Database');
			$this->Database->deleteRow('children','id',$_POST['id']);
			$this->Database->deleteRow('child_of_user','child_id',$_POST['id']);
			$res = $this->Database->get_count_child($_POST['grupid']);
			$this->Database->update_grop_child_no($res,$_POST['grupid']);			
			
		}
		public function updateGroup()
		{
			$this->load->library('session');
			$this->load->model('Database');
		}
		public function createGroup()
		{
			$this->load->library('session');
			$this->load->model('Database');
			$root_dir = "Document/";
			if(!file_exists($root_dir))
			{
				mkdir($root_dir);
			}
			
			
			
			
			if($_POST['groupid']=="")
			{
				
				if($_FILES["file-0"]["name"] != "")
				{
					$target_dir = $root_dir;
					$temp_target = $target_dir.basename($_FILES["file-0"]["name"]);
					$FileType = pathinfo($temp_target,PATHINFO_EXTENSION);
					$uiqid=uniqid()."-".uniqid()."-".uniqid()."-".uniqid()."-".uniqid().".".$FileType;
					//$uiqid = $_FILES["file-0"]["name"];
					$target_file = $target_dir.$uiqid;
					
					if (move_uploaded_file($_FILES["file-0"]["tmp_name"], $target_file))
					{
						//$target_dir1 = "group_profile_pic/thumb/".$dir;
						//$target_file1 = $target_dir1.$uiqid;
					}
					$groupData = array(
									'group_name' => $_POST['name'],
									'filename' => $uiqid,
									'createdby' => $_SESSION['userid'],
									'is_active'=>'1'
								);
				}
				else
				{
					$groupData = array(
									'group_name' => $_POST['name'],
									'createdby' => $_SESSION['userid'],
									'is_active'=>'1'
								);
				}
				
				
				if($_POST['name']!="")
				{
					$insertID=$this->Database->addFunction('group', $groupData);
				}
				if($insertID!="")
				{	
					$data=$this->Database->getRow('group','group_id',$insertID);
					$output="";
					$output.='	<li class="'.$data[0]->group_id.'-groupupdate"><a class="findchild" data-group="'.$data[0]->group_id.'" data-userid="'.$data[0]->createdby.'" value="'.$data[0]->createdby.'" href="#">'.$data[0]->group_name.'</a><li>';
//								<a class="editgroup" data-editid="'.$data[0]->group_id.'" href="#">edit</a>
//								<a class="" href="#" data-toggle="modal" data-target="">delete</a></li>';
					$return['output'] = $output;
					$return['result'] = 'success';
					$return['msg']="Group Created";
				}else{
					$return['result'] = 'error';
					$return['msg']="Not Created";	
				}
			}
			else
			{
				$filed_value['group_name']=$_POST['name'];
				$filed_value['createdby']=$_SESSION['userid'];
			
				$update=$this->Database->updateRecord('group',$filed_value,'group_id',$_POST['groupid']);
				$select=$this->Database->getRow('group','group_id',$_POST['groupid']);
				$output="";
				if($update!='' && $update!=0)
				{
					$output.='<li class="'.$_POST['groupid'].'-groupupdate"><a class="findchild" data-group="'.$select[0]->group_id.'" data-userid="'.$select[0]->createdby.'" value="'.$select[0]->createdby.'" href="#">'.$select[0]->group_name.'</a>
					<a class="editgroup" data-editid="'.$select[0]->group_id.'" href="#">edit</a>
					<a class="" href="#" data-toggle="modal" data-target="">delete</a></li>';
				
					$return['outputupdate'] = $output;
					$return['replaceclass'] = $_POST['groupid'].'-groupupdate';
					$return['result'] = 'success';
					$return['msg']="Group edit successfully";
				}
				else
				{
					$return['result'] = 'error';
					$return['msg']="Not edited";	
				}
				
			}
			echo json_encode($return);
		}
		
		public function groupeditmodel()
		{
			$this->load->library('session');
			$this->load->model('Database');
			$nvgroupmodel = "";
			if(isset($_POST['groupID']))
			{
				$postGroupID = $_POST['groupID'];
				$postGroupnm = $_POST['groupnm'];
				$postFilenm = $_POST['filenm'];
				$nvgroupmodel.= '
						
							<div class="form-row">
								<input type="hidden" class="groupid" id="edit-group-id" name="groupid" value="'.$postGroupID.'">
								<input class="input-text create-name" id="edit-group-nm" type="text" name="name" value="'.$postGroupnm.'" placeholder="Name">
							</div>
							<div class="form-row">
								<input class="input-text" type="file" name="file-0" placeholder="Document" value="'.$postFilenm.'">
							</div>
							<div class="form-row">
								<input class="button admin-edit-group111"  type="submit" value="Update Group">
							</div>
						
						';
				
			}
			echo $nvgroupmodel;
		}
		
		public function groupupdate()
		{
			$this->load->library('session');
			$this->load->model('Database');
			
			$postgroupid= $_POST['groupid'];
			$postgroupnm= $_POST['name'];
			
			$nvUserID = $this->session->userdata('userid');
			if($postgroupnm != "")
			{
				$filed_value['group_name']=$postgroupnm;
				$update=$this->Database->updateRecord('group',$filed_value,'group_id',$postgroupid);
			}
			$nvfilenm = "";
			if($_FILES["file-0"]["name"] != "")
			{
				$r = $this->db->query("SELECT filename FROM `group` WHERE group_id='".$postgroupid."'");
				if($r->num_rows())
				{
					$res = $r->result(); 
					$nvfilenm = $res[0]->filename;	
				}
				if($nvfilenm != $_FILES["file-0"]["name"])
				{
					$root_dir = "Document/";
					if(!file_exists($root_dir))
					{
						mkdir($root_dir);
					}
					$target_dir = $root_dir;
					$temp_target = $target_dir.basename($_FILES["file-0"]["name"]);
					$FileType = pathinfo($temp_target,PATHINFO_EXTENSION);
					$uiqid=uniqid()."-".uniqid()."-".uniqid()."-".uniqid()."-".uniqid().".".$FileType;
					
					$target_file = $target_dir.$uiqid;
					
					
					
					if (move_uploaded_file($_FILES["file-0"]["tmp_name"], $target_file))
					{
						$this->load->helper("file");
						$nvdeletefilepath = $target_dir.$nvfilenm;
						unlink($nvdeletefilepath);
						//$target_dir1 = "group_profile_pic/thumb/".$dir;
						//$target_file1 = $target_dir1.$uiqid;
						$filed_value['filename']=$uiqid;
						$update=$this->Database->updateRecord('group',$filed_value,'group_id',$postgroupid);
					}
					$nvfilenm = $uiqid;
				}
				
			}
			
				echo '<li class="'.$postgroupid.'-groupupdate"><a class="findchild" data-group="'.$postgroupid.'" data-userid="'.$nvUserID.'" value="'.$nvUserID.'" href="#">'.$postgroupnm.'</a><a class="icon-1 pencil edit-group-name" href="#" data-group="'.$postgroupid.'" data-file="'.$nvfilenm.'" data-groupnm="'.$postgroupnm.'"></a></li>';
			
		}
		
		public function displayGraph()
		{
			$this->load->library('session');
			$this->load->model('Database');
			$data=$this->Database->getRow('users','user_id',$_SESSION['userid']);
			$totalchild=$data[0]->number_of_child;
			
			$child=$this->Database->getRow('children','user_id',$_SESSION['userid']);
			
			$totalavailabalchild=count($child);
			$val1=$totalchild-$totalavailabalchild;
			?>
			<script>
			 var barChartData = {
								labels: [""],
								
								datasets: [{
									label: 'Used',
									backgroundColor: "#000",
									borderColor: '#000',
									borderWidth: 1,
									data: [<?php echo $totalavailabalchild ?>]
								}, {
									label: 'Unused',
									backgroundColor: "#fff",
									borderColor: '#000',
									borderWidth: 1,
									data: [<?php echo $val1 ?>]
								}],
								 

							};
								var ctx = document.getElementById("canvas").getContext("2d");
								ctx.canvas.height = 270;

								window.myBar = new Chart(ctx, {
									type: 'bar',
									data: barChartData,
									options: {
										title:{
											display:true,
											fontSize: 20,
											text:"Child Spaces",
										},
										tooltips: {
											mode: 'label'
										},
										responsive: true,
										scales: {
											xAxes: [{
												stacked: true,
											}],
											yAxes: [{
												stacked: true,
												//display: false
											}]
										},
										 legend: { position: 'right' },
										 
									}
								});
			</script>
			<?php
			if($val1==$totalavailabalchild)
			{
				$return['value1']=$totalchild;
				$return['value2']=$totalchild;

			}else{
				
				$return['value1']=$totalavailabalchild;
				$return['value2']=$val1;
			}
		}
		
		public function editGroup()
		{
			$this->load->library('session');
			$this->load->model('Database');
			$data=$this->Database->getRow('group','group_id',$_POST['groupid']);
			echo $data[0]->group_id;
			echo '##';
			echo $data[0]->group_name;
		}
		
		public function deleteGroup()
		{
			$this->load->library('session');
			$this->load->model('Database');
			$this->Database->deleteRow('group','group_id',$_POST['groupid']);
			echo $_POST['groupid'].'-groupupdate';
		}

		public function observationUser()
		{
			$data=$this->Database->getTblRecord("children", array("user_id"=>$_POST['childid'],'group_id'=>$_POST['groupid']));
			echo json_encode($data[0]);
		}
		public function redirectlogin()
		{
			$postuserID = $_POST['userid'];
			$postchildID = $_POST['childid'];
			$postgroupID = $_POST['groupid'];
			$postLogintype = $_POST['logintype'];
			if($postchildID != "")
			{
				$nvTeacherEmail = $this->Database->getName("children","teacher_email","id",$postchildID);
				$nvClinicianEmail = $this->Database->getName("children","clinician_email","id",$postchildID);
				$nvAdminID = $this->Database->getName("children","user_id","id",$postchildID);
				if($postLogintype == "clinicianlogin")
				{
					$nvClinicianUserID = $this->Database->getRecordTwoRowID("users","email",$nvClinicianEmail,"role","clinical","user_id");
					$nvClinicianUserName = $this->Database->getRecordTwoRowID("users","email",$nvClinicianEmail,"role","clinical","name");
					if($nvClinicianUserID > 0)
					{
						$_SESSION['nvuserid'] = $nvClinicianUserID;
						$_SESSION['nvusername'] = $nvClinicianUserName;
						$_SESSION['nvemail'] = $nvClinicianEmail;
						$_SESSION['nvrole'] = "clinical";
						
						$_SESSION['groupidsession'] = $postgroupID;
						$_SESSION['childsession'] = $postchildID;
						echo $redirectTo = base_url('clinical/');	
					}
				}
				if($postLogintype == "teacherlogin")
				{
					$nvTeacherUserID = $this->Database->getRecordTwoRowID("users","email",$nvTeacherEmail,"role","teacher","user_id");
					$nvTeacherUserName = $this->Database->getRecordTwoRowID("users","email",$nvTeacherEmail,"role","teacher","name");
					if($nvTeacherUserID > 0)
					{
						$_SESSION['nvuserid'] = $nvTeacherUserID;
						$_SESSION['nvusername'] = $nvTeacherUserName;
						$_SESSION['nvemail'] = $nvTeacherEmail;
						$_SESSION['nvrole'] = "teacher";
						$_SESSION['childsession'] = $postchildID;
						echo $redirectTo = base_url('teachers/');
						
					}
				}
			}
			
			
			
		}
		public function sendRpq()
		{
			$this->load->library('email');
			$data=$this->Database->getTblRecord("children", array("user_id"=>$_POST['child_id'],'group_id'=>$_POST['group_id']));
			
			$r = $this->db->query("SELECT filename FROM `group` WHERE group_id='".$_POST['group_id']."'");
			if($r->num_rows())
			{
				$res = $r->result(); 
				$nvfilenm = $res[0]->filename;
			}
			else 
			{
				$nvfilenm = "";
			}
			
			
			foreach($data as $res)
			{
				if($nvfilenm != "")
				{
					$sendfile = base_url()."Document/".$nvfilenm;
					$nvtoemail = $res->teacher_email;
					$subject = "CapaRed";
					$message = "RPQTeacher CapaRed Document";
					
					$this->email->set_newline("\r\n");
					$this->email->from('attachmentdisorderassessment@gmail.com');
					$this->email->to($nvtoemail);
					$this->email->subject($subject);
					$this->email->message($message);
					$this->email->attach($sendfile);
					if($this->email->send())
					{
						echo 'sucess';
					}
					else
					{
						echo 'fail';
					}
				}
				else
				{
					
					$nvtoemail = $res->teacher_email;
					$subject = "CapaRed";
					$message = "RPQTeacher CapaRed Document";
					
					$this->email->set_newline("\r\n");
					$this->email->from('testerw3nuts@gmail.com');
					$this->email->to($nvtoemail);
					$this->email->subject($subject);
					$this->email->message($message);
					
					if($this->email->send())
					{
						echo 'sucess';
					}
					else
					{
						echo 'fail';
					}
				}
				
				

			}
		}
		public function addinformation()
		{
			if(isset($_POST['childID']))
			{
				$postChildID = $_POST['childID'];
				$postStatus = $_POST['datatype'];
				$nvUserID = $this->session->userdata('userid');
				$nvAnswerTypeCount = $this->Database->getRecordtwoRowCount('information_children',"user_id",$nvUserID,"child_id",$postChildID); 
				if($nvAnswerTypeCount > 0)
				{
					$nvAnsID = $this->Database->getRecordTwoRowID('information_children',"user_id",$nvUserID,"child_id",$postChildID,"info_id"); 
					$filed_value['status']=$postStatus;
					$update=$this->Database->updateRecord('information_children',$filed_value,'info_id',$nvAnsID);
					if($update)
					{
						echo $nvAnsID;
					}
				}
				else
				{
					$data = array(
					   'child_id' => $postChildID,
					   'user_id'=>$nvUserID,
					   'status'=>$postStatus,
					);
					echo $this->Database->AddFunction('information_children',$data); //create user
				}
			}
		}
		
		// This is Function for Import CSV data
		public function import()
		{
			$user_id = $this->session->userdata('userid');
			$data=$this->Database->getRow('users','user_id',$_SESSION['userid']);
			$totalchild=$data[0]->number_of_child;
			$total = $this->Database->get_total_child_no($user_id);			
			// check number of child same or not						
			if($total<$totalchild){			
			$limit = $totalchild-$total;			
					if(isset($_POST["import"]))
					{
						
						$filename=$_FILES["file"]["tmp_name"];
						if($_FILES["file"]["size"] > 0)
						{
							$file = fopen($filename, "r");
							$i = 0;	
							$nvcountcolumn = count(fgetcsv($file, 10000, ","));				
							if($nvcountcolumn == 8)
							{
								while (($importdata = fgetcsv($file, 10000, ",")) !== FALSE and $limit!= $i )
								{
									
									if (!filter_var($importdata[4], FILTER_VALIDATE_EMAIL))
									{
									    fclose($file);
										$this->session->set_flashdata('message', 'Something went wrong..');
										redirect('admin');
									}
									else if (!filter_var($importdata[5], FILTER_VALIDATE_EMAIL))
									{
										fclose($file);
										$this->session->set_flashdata('message', 'Something went wrong..');
										redirect('admin');
									}
									else if (!filter_var($importdata[6], FILTER_VALIDATE_EMAIL))
									{
										fclose($file);
										$this->session->set_flashdata('message', 'Something went wrong..');
										redirect('admin');
									}
									else if (!filter_var($importdata[7], FILTER_VALIDATE_EMAIL))
									{
										fclose($file);
										$this->session->set_flashdata('message', 'Something went wrong..');
										redirect('admin');
									}
									else
									{
										$data = array(
										'group_name' => $importdata[0],
										'name' =>$importdata[1],
										'birthdate' =>$importdata[2],
										'gender' =>$importdata[3],
										'clinician_email' =>$importdata[4],
										'parent_1_email' =>$importdata[5],
										'parent_2_email' =>$importdata[6],
										'teacher_email' =>$importdata[7],
										);
										$insert = $this->Database->insertCSV($data);
										
										$i++;
									}
										
								}                    
								//echo "<pre>"; print_r($data); exit;
								
								fclose($file);
								$this->session->set_flashdata('message', 'Data are imported successfully..');
								redirect('admin');
							}
							else
							{
								$this->session->set_flashdata('message', 'Something went wrong..');
								redirect('admin');	
							}
							
						}
						else
						{
							$this->session->set_flashdata('message', 'Something went wrong..');
							redirect('admin');
						}
					}
							
			}
			else{
				$this->session->set_flashdata('message', 'No More Child available! you reached your '.$totalchild.'-limit!..');
				redirect('admin');				
			}
		}
		
		///
		
		public function confirmmessage(){
		
		    $user_id = $this->session->userdata('userid');
			$data=$this->Database->getRow('users','user_id',$_SESSION['userid']);
			$totalchild=$data[0]->number_of_child;
			$total = $this->Database->get_total_child_no($user_id);	
			echo $limit = $totalchild-$total;
		}
}