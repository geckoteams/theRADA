<?php 
if (! defined('BASEPATH')) exit('No direct script access allowed');

class Database extends CI_Model {

    var $title   = '';
    var $content = '';
    var $date    = '';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	
	//add record
	function addFunction($tablename,$data)
	{
		$this->db->insert($tablename, $data);
		return $this->db->insert_id();
	}
	
	function fnqrywhereincount($tblnm,$wherefieldnm,$wherearray,$childidfield,$childisvalue,$userfieldnm,$userfieldvalue)
	{
		$this->db->select('*');
		$this->db->from($tblnm);	
		$this->db->where($userfieldnm, $userfieldvalue);
		$this->db->where($childidfield, $childisvalue);
		$this->db->where_in($wherefieldnm, $wherearray);
		$query = $this->db->get();
		//$result_array =$query->result();
		$resultcount = $query->num_rows();
		return $resultcount;
	}
	
	function fnqrywhereinObsevationcount($tblnm,$wherefieldnm,$wherearray,$userfieldnm,$userfieldvalue)
	{
		$this->db->select('*');
		$this->db->from($tblnm);	
		$this->db->where($userfieldnm, $userfieldvalue);
		$this->db->where_in($wherefieldnm, $wherearray);
		$query = $this->db->get();
		//$result_array =$query->result();
		$resultcount = $query->num_rows();
		return $resultcount;
	}
	
	//check field alyready exists or not
	function checkeAllreadyExist($tablename,$fieldname,$value)
	{
		$query = $this->db->get_where($tablename, array($fieldname => $value));
		if($this->db->affected_rows() >= 1)
			return true;
		else
			return false;
	}
	
	//login Function
	function checklogin($email,$password)
	{
		$query = $this->db->get_where('users', array('email' => $email,'password'=>md5($password)));
		$result_array =$query->result();
		//return $this->db->last_query();
		return $result_array;
	}
	
	function forgotEmail($tablename,$value)
	{
		$query = $this->db->get_where($tablename, array('email' => $value));
		$result_array =$query->result();
		return $result_array;
	}
	
	function updateForgotString($tablename,$value)
	{
		$data=array('forgot_string'=>md5(rand(10,100)));
		$this->db->where('user_id',$value);
		$this->db->update($tablename,$data);
	}
	function updatePassword($tablename,$email,$usercode,$password)
	{
		$query = $this->db->get_where($tablename, array('email' => $email,'forgot_string'=>$usercode));
		$result =$query->result();
		if(count($result>0) || $result!='')
		{
		
			//$data=array('updated_password'=>md5($password));
			$data=array('password'=>md5($password));
			$this->db->where('user_id',$result[0]->user_id);
			$this->db->update($tablename,$data);
		}
		 
	}
	
	function getRow($tablename,$field,$val)
	{
		$query = $this->db->get_where($tablename, array($field => $val));
		$result_array =$query->result();
		return $result_array;
	}

	function getRowCount($tablename,$field,$val)
	{
		$query = $this->db->get_where($tablename, array($field => $val));
		$result = $query->num_rows();
		
		return $result;
	}
	
	
	function getRecord($tablename,$wherefield1,$wherevalue1,$wherefield2,$wherevalue2)
	{
		$query = $this->db->query("SELECT * FROM `$tablename` where `$wherefield1`='$wherevalue1' and `$wherefield2`='$wherevalue2'");	
		return $query->result_array();
	}
	
	function updateRecord($tablename,$fieldarray,$wherefield,$whereval)
	{
		foreach($fieldarray as $key=>$val)
		{
			$array_key[$key]=$val;
		}
		$data=$array_key;
		$this->db->where($wherefield,$whereval);
		$this->db->update($tablename,$data);
		return $this->db->affected_rows();
	}
	function getAllRecord($tablename)
	{
		$query = $this->db->get($tablename);
		return $query->result();
	}
	function getAlladminRecord()
	{
		$query = $this->db->query("SELECT * FROM users where role='admin'");	
		return $query->result();
	}
	
	function getAllcapaquestions()
	{
		$query = $this->db->query("SELECT * FROM questionnaires_master");	
		return $query->result();
	}
	
	function sumofRecord($tablename,$field,$wherefield,$wherevalue)
	{
		$query = $this->db->query("SELECT sum($field) as total FROM `$tablename` where `$wherefield`='$wherevalue'");	
		return $query->result_array();
	}
	function deleteRow($tablename,$fieldname,$value)
	{
		$this->db->where($fieldname, $value);
		$this->db->delete($tablename); 
	}
	function generateRandomString($length = 10)
	{
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}
	function getchildByIdIN($tablename,$ids)
	{
		$query = $this->db->query("SELECT * FROM `$tablename` where `id`  IN($ids)");	
		return $query->result();
	}
	function getAllQuestion()
	{
		$query=$this->db->query('SELECT  m.que_id as mas_que_id,m.question as mas_que,m.description as mas_des,p.probes_id
							as prob_probes_id, p.description as prob_desc, e.extra_id as extra_extra_id, e.que_id as 
							extra_que_id, e.question as extra_question
							FROM questionnaires_master m
							INNER JOIN questionnaires_probes p ON p.que_id = m.que_id
							INNER JOIN questionnaires_extras e ON e.que_id   = m.que_id');
		return $query=$query->result_array();
	}

	function getMyChild($userid)
	{
		if(is_null($userid)) return false;
		$query = $this->db->query("select a.id, a.group_id, a.name from children as a inner join child_of_user as b on b.child_id =a.id where  b.user_id='".$userid."'");
		return $query->result();	
	}

	function getTblRecord($tbl,$where)
	{
		if(is_null($where)) return false;
		$query = $this->db->get_where($tbl, $where);
		return $query->result();
		
	}
	
	function getName($tblName,$column,$WhereColumn,$whereColumnValue){
		$r = $this->db->query("SELECT ".$column." FROM ".$tblName." WHERE ".$WhereColumn."='".$whereColumnValue."'");
		if($r->num_rows())
		{
			$res = $r->result(); 
			return $res[0]->$column;		
		}
		else{
			return "No value";	
		}
	}
	
	function getAge($tblName,$WhereColumn,$whereColumnValue)
	{
		$r = $this->db->query("SELECT (YEAR(CURDATE())-YEAR(birthdate)) as age FROM ".$tblName." WHERE ".$WhereColumn."='".$whereColumnValue."'");
		if($r->num_rows())
		{
			$res = $r->result(); 
			return $res[0]->age;		
		}
		else{
			return "No value";	
		}
	}
	
	function getCapaQuestion($tblName,$column,$WhereColumn,$whereColumnValue){
		$r = $this->db->query("SELECT ".$column." FROM ".$tblName." WHERE ".$WhereColumn."='".$whereColumnValue."'");
		if($r->num_rows())
		{
			$res = $r->result(); 
			return $res[0]->$column;		
		}
		else{
			return "No record";	
		}
	}
	
	function getSubQuestions($tablename,$where,$value)
	{
		$query = $this->db->query("SELECT * FROM ".$tablename." WHERE ".$where."=".$value."");
		$total_rows = $query->num_rows();
		if($total_rows > 0)
		{
			return $result_array =$query->result();
		}
		else
		{
			return "No Value";
		}
		
	}
	
	function getSubQuestionsCount($tablename,$where,$value)
	{
		$query = $this->db->query("SELECT * FROM ".$tablename." WHERE ".$where."=".$value."");
		$total_rows = $query->num_rows();
		return $total_rows;
	}
	
	function getRecordCount($tablename,$wherefield1,$wherevalue1,$wherefield2,$wherevalue2,$wherefield3,$wherevalue3)
	{
		$query = $this->db->query("SELECT * FROM `$tablename` where `$wherefield1`='$wherevalue1' and `$wherefield2`='$wherevalue2' and `$wherefield3`='$wherevalue3'");	
		$total_rows = $query->num_rows();
		return $total_rows;
	}
	
	function getRecordfourCount($tablename,$wherefield1,$wherevalue1,$wherefield2,$wherevalue2,$wherefield3,$wherevalue3,$wherefield4,$wherevalue4)
	{
		$query = $this->db->query("SELECT * FROM `$tablename` where `$wherefield1`='$wherevalue1' and `$wherefield2`='$wherevalue2' and `$wherefield3`='$wherevalue3' and `$wherefield4`='$wherevalue4'");	
		$total_rows = $query->num_rows();
		return $total_rows;
	}
	
	function getRecordtwoRowCount($tablename,$wherefield1,$wherevalue1,$wherefield2,$wherevalue2)
	{
		$query = $this->db->query("SELECT * FROM `$tablename` where `$wherefield1`='$wherevalue1' and `$wherefield2`='$wherevalue2'");	
		$total_rows = $query->num_rows();
		return $total_rows;
	}
	
	function getRecordtwoRowCountWithAns($tablename,$wherefield1,$wherevalue1,$wherefield2,$wherevalue2)
	{
		$query = $this->db->query("SELECT * FROM `$tablename` where `$wherefield1`='$wherevalue1' and `$wherefield2`='$wherevalue2' and answer!='' ");	
		$total_rows = $query->num_rows();
		return $total_rows;
	}
	
	function getRecordAnsID($tablename,$wherefield1,$wherevalue1,$wherefield2,$wherevalue2,$wherefield3,$wherevalue3)
	{
		$query = $this->db->query("SELECT ans_id FROM `$tablename` where `$wherefield1`='$wherevalue1' and `$wherefield2`='$wherevalue2' and `$wherefield3`='$wherevalue3'");	
		if($query->num_rows())
		{
			$res = $query->result(); 
			return $res[0]->ans_id;		
		}
	}
	
	function getRecordSubAnsID($tablename,$wherefield1,$wherevalue1,$wherefield2,$wherevalue2,$wherefield3,$wherevalue3,$Selvalue)
	{
		$query = $this->db->query("SELECT $Selvalue FROM `$tablename` where `$wherefield1`='$wherevalue1' and `$wherefield2`='$wherevalue2' and `$wherefield3`='$wherevalue3'");	
		if($query->num_rows())
		{
			$res = $query->result(); 
			return $res[0]->$Selvalue;		
		}
	}
	
	
	function getRecordTwoRowID($tablename,$wherefield1,$wherevalue1,$wherefield2,$wherevalue2,$Selvalue)
	{
		$query = $this->db->query("SELECT $Selvalue FROM `$tablename` where `$wherefield1`='$wherevalue1' and `$wherefield2`='$wherevalue2'");	
		if($query->num_rows())
		{
			$res = $query->result(); 
			return $res[0]->$Selvalue;		
		}
	}
	
	function getMaxID($tblnm,$maxid,$wherefield1,$wherevalue1,$wherefield2,$wherevalue2)
	{
		//$maxid = 0;
		$query = $this->db->query('SELECT MAX('.$maxid.') AS `maxid` FROM `'.$tblnm.'` WHERE '.$wherefield1.'='.$wherevalue1.' AND '.$wherefield2.'='.$wherevalue2.'');
		if($query->num_rows())
		{
			$res = $query->result(); 
			$maxid = $res[0]->maxid;
		    //echo "<br>=========".$maxid = $query->maxid; 
		}
		else
		{
			 $maxid = 0;
		}
		return $maxid;
	}
	
	// Insert Import Data of CSV
	 public function insertCSV($data)
     {
		 //echo "insertCSV Function"; 
		 $user_id = $this->session->userdata('userid');
		 //echo "<pre>"; print_r($data);
		 $group_name= $data['group_name'];
		 $name= $data['name'];
		 $birth_date= $data['birthdate'];
		 $date = date_create($birth_date);
		 $birthdate = date_format($date,"Y-m-d"); 
		 $gender= $data['gender'];
		 $clinician_email= $data['clinician_email'];
		 $parent_1_email= $data['parent_1_email'];
		 $parent_2_email= $data['parent_2_email'];
		 $teacher_email= $data['teacher_email'];
          
		 
			 $this->db->select('group_id');
			 $this->db->from('group');
			 $this->db->where('group_name', $group_name);
			 $this->db->where('createdby', $user_id);			 
             $query = $this->db->get(); 
			 $result = $query->result();
			 //echo $this->db->last_query(); exit;	
			//echo count($result);
			if(count($result) == 0)
			{
				
				$this->db->insert('group', array(
					"group_name" => $group_name,     
					"createdby" => $user_id,     
					"created_time" => date('Y-m-d H:i:s'),       
					"is_active" => 1,       
					));
				$group_id = $this->db->insert_id();
			}
			else
			{
				$group_id = $result[0]->group_id;	  
			}
		  	
			
			
			$this->db->insert('children', array(
				"user_id" => $user_id,     
				"group_id" => $group_id,     
				"name" => $name,     
				"birthdate" => $birthdate,     
				"gender" => $gender,     
				"clinician_email" => $clinician_email,     
				"parent_1_email" => $parent_1_email,     
				"parent_2_email" => $parent_2_email,     
				"teacher_email" => $teacher_email,     
				)); 
				$child_id = $this->db->insert_id(); 
			
			
			
			$this->db->select('user_id');
			$this->db->from('users');
			$this->db->where('role', 'clinical');
			$this->db->where('email', $clinician_email);			 
			$clinicalquery = $this->db->get(); 
			$clinicalresult = $clinicalquery->result();
			//echo"<br>------". $this->db->last_query();
			$clinicalcount = count($clinicalresult);
			
			
			
			if($clinicalcount == 0)
			{
				$passwordClinician=$this->generateRandomString(9);
				$data=array('name'=>'','email'=>$clinician_email,'password'=>md5($passwordClinician),'role'=>'clinical');
				$lastcuserid=$this->Database->addFunction('users',$data);
				
				$email=$clinician_email;
				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
				$headers .= 'From: <no-reply@caparad.com>' . "\r\n";
				
				$nvemailmsg = "This is a message from Capa-RAD.com who has successfully log you as a clinical. You can now log in using your email address ".$clinician_email." and this password ".$passwordClinician.".<BR>  Thank you";
				
				mail($email,"You Registration Successfully!",$nvemailmsg,$headers);
				
				$data=array(
						'user_id'=>$lastcuserid,
						'child_id'=>$child_id,
						'group_id'=>$group_id
						);
				$child_of_user=$this->addFunction('child_of_user',$data);
				
				
				
			}
			else
			{
				$lastcuserid=$this->getName('users','user_id','email',$clinician_email);
				$email=$clinician_email;
				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
				$headers .= 'From: <no-reply@caparad.com>' . "\r\n";
				
				$nvemailmsg = "This is a message from Capa-RAD.com who has successfully log you as a clinical. You can now log in using your email address ".$clinician_email.".<BR>  Thank you";
				
				mail($email,"You Registration Successfully!",$nvemailmsg,$headers);
				
				$data=array(
						'user_id'=>$lastcuserid,
						'child_id'=>$child_id,
						'group_id'=>$group_id
						);
				$child_of_user=$this->addFunction('child_of_user',$data);
				
			}
			
			
			$this->db->select('user_id');
			$this->db->from('users');
			$this->db->where('role', 'parent');
			$this->db->where('email', $parent_1_email);			 
			$parent1query = $this->db->get(); 
			$parent1result = $parent1query->result();
			$parent1count = count($parent1result);
			if($parent1count == 0)
			{
				$passwordparent1=$this->generateRandomString(8);
				$data=array('name'=>'','email'=>$parent_1_email,'password'=>md5($passwordparent1),'role'=>'parent');
				$lastcuserid=$this->Database->addFunction('users',$data);
				
				$email=$parent_1_email;
				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
				$headers .= 'From: <no-reply@caparad.com>' . "\r\n";
				
				$nvemailmsg = "This is a message from Capa-RAD.com who has successfully log you as a parent. You can now log in using your email address ".$parent_1_email." and this password ".$passwordparent1.".<BR>  Thank you";
				
				mail($email,"You Registration Successfully!",$nvemailmsg,$headers);
				
				$data=array(
						'user_id'=>$lastcuserid,
						'child_id'=>$child_id,
						'group_id'=>$group_id
						);
				$child_of_user=$this->addFunction('child_of_user',$data);
			}
			else
			{
				$lastcuserid=$this->getName('users','user_id','email',$parent_1_email);
				$email=$parent_1_email;
				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
				$headers .= 'From: <no-reply@caparad.com>' . "\r\n";
				
				$nvemailmsg = "This is a message from Capa-RAD.com who has successfully log you as a parent. You can now log in using your email address ".$parent_1_email.".<BR>  Thank you";
				
				mail($email,"You Registration Successfully!",$nvemailmsg,$headers);
				
				$data=array(
						'user_id'=>$lastcuserid,
						'child_id'=>$child_id,
						'group_id'=>$group_id
						);
				$child_of_user=$this->addFunction('child_of_user',$data);
			}
			
			
			$this->db->select('user_id');
			$this->db->from('users');
			$this->db->where('role', 'parent');
			$this->db->where('email', $parent_2_email);			 
			$parent2query = $this->db->get(); 
			$parent2result = $parent2query->result();
			$parent2count = count($parent2result);
			if($parent2count == 0)
			{
				$passwordparent2=$this->generateRandomString(11);
				$data=array('name'=>'','email'=>$parent_2_email,'password'=>md5($passwordparent2),'role'=>'parent');
				$lastcuserid=$this->Database->addFunction('users',$data);
				
				$email=$parent_2_email;
				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
				$headers .= 'From: <no-reply@caparad.com>' . "\r\n";
				
				$nvemailmsg = "This is a message from Capa-RAD.com who has successfully log you as a parent. You can now log in using your email address ".$parent_2_email." and this password ".$passwordparent2.".<BR>  Thank you";
				
				mail($email,"You Registration Successfully!",$nvemailmsg,$headers);
				
				$data=array(
						'user_id'=>$lastcuserid,
						'child_id'=>$child_id,
						'group_id'=>$group_id
						);
				$child_of_user=$this->addFunction('child_of_user',$data);
			}
			else
			{
				$lastcuserid=$this->getName('users','user_id','email',$parent_2_email);
				$email=$parent_2_email;
				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
				$headers .= 'From: <no-reply@caparad.com>' . "\r\n";
				
				$nvemailmsg = "This is a message from Capa-RAD.com who has successfully log you as a parent. You can now log in using your email address ".$parent_2_email.".<BR>  Thank you";
				
				mail($email,"You Registration Successfully!",$nvemailmsg,$headers);
				
				$data=array(
						'user_id'=>$lastcuserid,
						'child_id'=>$child_id,
						'group_id'=>$group_id
						);
				$child_of_user=$this->addFunction('child_of_user',$data);
			}
			
			
			
			
			
			$this->db->select('user_id');
			$this->db->from('users');
			$this->db->where('role', 'teacher');
			$this->db->where('email', $teacher_email);			 
			$teacherquery = $this->db->get(); 
			$teacherresult = $teacherquery->result();
			$teachercount = count($teacherresult);
			if($teachercount == 0)
			{
				$passwordteacher = $this->generateRandomString(10);
				$data=array('name'=>'','email'=>$teacher_email,'password'=>md5($passwordteacher),'role'=>'teacher');
				$lastcuserid=$this->Database->addFunction('users',$data);
				
				$email=$teacher_email;
				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
				$headers .= 'From: <no-reply@caparad.com>' . "\r\n";
				
				$nvemailmsg = "This is a message from Capa-RAD.com who has successfully log you as a teacher. You can now log in using your email address ".$teacher_email." and this password ".$passwordteacher.".<BR>  Thank you";
				
				mail($email,"You Registration Successfully!",$nvemailmsg,$headers);
				
				$data=array(
						'user_id'=>$lastcuserid,
						'child_id'=>$child_id,
						'group_id'=>$group_id
						);
				$child_of_user=$this->addFunction('child_of_user',$data);
			}
			else
			{
				$lastcuserid=$this->getName('users','user_id','email',$teacher_email);
				$email=$teacher_email;
				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
				$headers .= 'From: <no-reply@caparad.com>' . "\r\n";
				
				$nvemailmsg = "This is a message from Capa-RAD.com who has successfully log you as a teacher. You can now log in using your email address ".$teacher_email.".<BR>  Thank you";
				
				mail($email,"You Registration Successfully!",$nvemailmsg,$headers);
				
				$data=array(
						'user_id'=>$lastcuserid,
						'child_id'=>$child_id,
						'group_id'=>$group_id
						);
				$child_of_user=$this->addFunction('child_of_user',$data);
			}
			
			
			//print_r($clinicalresult);
			
			//exit;
			
			
			
			
				
			/*$this->db->insert('child_of_user', array(
				"user_id" => $user_id,     
				"child_id" => $child_id,     
				"group_id" => $group_id,	 			 
				));	*/
			
			$res = $this->get_count_child($group_id);
			$this->update_grop_child_no($res,$group_id);
				
     }
	 
	 // Get no of child grop
	 public function get_count_child($group_id){
		 
		 $this->db->select('group_id');
			 $this->db->from('child_of_user');
			 $this->db->where('group_id', $group_id);			 
             $query = $this->db->get(); 
			 $result = $query->result();
			 $res = count($result);			 
			 return $res;
	 }
	 
	 // Update grop child no
	 public function update_grop_child_no($res,$group_id){
		 
		 	$data=array('number_of_child'=>$res); 
			$this->db->where('group_id',$group_id);
			$this->db->update('group',$data);
			return true;
	 }
	 
	 // Get count total child
	 
	 public function get_total_child_no($user_id){
		 
		 	$this->db->select('group_id');
			 $this->db->from('child_of_user');
			 $this->db->where('user_id', $user_id);			 
             $query = $this->db->get(); 
			 $result = $query->result();
			 $res = count($result);			 
			 return $res;
	 }
		 

	

}
?>