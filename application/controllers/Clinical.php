<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clinical extends CI_Controller 
{
	function __construct()
    {
		parent::__construct();
		$this->load->library('session');
		$this->load->model('Database');
		
		/*if($this->session->userdata('role')!='clinical')
		{
			redirect(base_url());
		}*/
		if($this->session->userdata('role')=='admin')
		{
			if($this->session->userdata('nvrole')!='clinical')
			{
				redirect(base_url());
			}
		}
		else if($this->session->userdata('role')!='clinical')
		{
			redirect(base_url());
		}
    }
	
	
	public function index()
	{
		$header_data['PAGE_TITLE']="Clinical Section";
		$this->load->view("header",$header_data);
		
		$userrole = $this->session->userdata('role');
		$nvUserID = $this->session->userdata('userid');
		if($userrole == "admin")
		{
			$userrole = $this->session->userdata('nvrole');
			$nvUserID = $this->session->userdata('nvuserid');
		}
		
		
		$nvUsername = $this->Database->getName("users","name","user_id",$nvUserID);
		$nvUserEmail = $this->Database->getName("users","email","user_id",$nvUserID);
		
		$nvGroupID = $this->Database->getName("child_of_user","group_id","user_id",$nvUserID);
		$nvGrouparray = $this->Database->getTblRecord("group", array("group_id"=>$nvGroupID));
		//print_r($nvGrouparray);
		//$grouplist=$this->Database->getRow('group','createdby',38);
		//print_r($grouplist);
		
		//$nvUserID = $this->session->userdata('userid');
		
		$return['nvGroupArray'] = $nvGrouparray;
		$return['nvUserEmail'] = $nvUserEmail;
		$return['nvUsername']=$nvUsername;
		$this->load->view("tpl_clinician",$return);
		$this->load->view("modal");
		$this->load->view("footer");
	}
	
	public function observation_questions()
	{
		$nvUserID = $this->session->userdata('userid');
		$userrole = $this->session->userdata('role');
		if($userrole == "admin")
		{
			$nvUserID = $this->session->userdata('nvuserid');
			$userrole = $this->session->userdata('nvrole');
		}
		
		$masterQuestion=$this->Database->getAllRecord('oberservational_survey');
		$nvmodelslider = "";
		$nvmodelslider.= '<div class="bxslider observation-slider">';
		foreach($masterQuestion as $val)
		{
			$oberservationID = $val->observation_id;
			$oberservationAnswerCount = $this->Database->getRecordtwoRowCount('oberservational_answers',"user_id",$nvUserID,"observation_id",$oberservationID); 
			if($oberservationAnswerCount > 0)
			{
				$oberservationAnswer = $this->Database->getRecordTwoRowID('oberservational_answers',"user_id",$nvUserID,"observation_id",$oberservationID,"answer"); 		
				if($oberservationAnswer == "yes")
				{
					$nvyesans = "active";
					$nvnoans = "";
				}
				if($oberservationAnswer == "yes2")
				{
					$nvyesans = "active";
					$nvnoans = "";
				}
				else if($oberservationAnswer == "no")
				{
					$nvyesans = "";
					$nvnoans = "active";
				}
				else
				{
					$nvyesans = "";
					$nvnoans = "";
				}
				
				$nvmodelslider.='<!--rpq-info-slide start-->
                        <div class="capa-info-slide">
                            
                            <div class="capa-info-2-top">
                                <div class="text">
                                    <p>'.$val->question.'</p>
                                </div>
                            </div>
                            <div class="capa-info-2-tab">
                            	<div class="capa-tab">
                                    <ul class="clearfix">
                                		<li><a class="oberservationyesno '.$val->observation_id.' '.$nvnoans.'" data-ans="no" data-question="'.$val->observation_id.'" href="javascript:void(0)">No</a></li>
                                        <li style="float:right;"><a class="oberservationyesno '.$val->observation_id.' '.$nvyesans.'" data-ans="yes" data-question="'.$val->observation_id.'" href="javascript:void(0)">Yes</a></li>
                                    </ul>
                                </div>
                            </div>
                           
                        </div>
                        <!--rpq-info-slide end-->';
			}
			else
			{
				$nvmodelslider.='<!--rpq-info-slide start-->
                        <div class="capa-info-slide">
                            
                            <div class="capa-info-2-top">
                                <div class="text">
                                    <p>'.$val->question.'</p>
                                </div>
                            </div>
                            <div class="capa-info-2-tab">
                            	<div class="capa-tab">
                                    <ul class="clearfix">
                                		<li><a class="oberservationyesno '.$val->observation_id.'" data-ans="no" data-question="'.$val->observation_id.'" href="javascript:void(0)">No</a></li>
                                        <li style="float:right;"><a class="oberservationyesno '.$val->observation_id.'" data-ans="yes" data-question="'.$val->observation_id.'" href="javascript:void(0)">Yes</a></li>
                                    </ul>
                                </div>
                            </div>
                           
                        </div>
                        <!--rpq-info-slide end-->';
			}
			
		}
		$nvmodelslider.= '</div>';
		echo $nvmodelslider;
	}
	
	
	public function oberservation_ans()
	{
		$nvUserID = $this->session->userdata('userid');
		$userrole = $this->session->userdata('role');
		if($userrole == "admin")
		{
			$nvUserID = $this->session->userdata('nvuserid');
			$userrole = $this->session->userdata('nvrole');
		}
		$postquestion = $_POST['question'];
		$postanswer = $_POST['answer'];
		if($postquestion > 0 && $postanswer != "")
		{
			$nvcount = $this->Database->getRecordtwoRowCount('oberservational_answers',"user_id",$nvUserID,"observation_id",$postquestion);
			if($nvcount > 0)
			{
				$nvAnsID = $this->Database->getRecordTwoRowID('oberservational_answers',"user_id",$nvUserID,"observation_id",$postquestion,"obersev_ans_id"); 
				$filed_value['answer']=$postanswer;
				$update=$this->Database->updateRecord('oberservational_answers',$filed_value,'obersev_ans_id',$nvAnsID);
				if($update)
				{
					echo $nvAnsID;
				}
			}
			else
			{
				$data = array(
				   'answer' => $postanswer,
				   'observation_id' => $postquestion,
				   'user_id'=>$nvUserID,
				);
				echo $this->Database->AddFunction('oberservational_answers',$data); //create user
			}
			
		}
	}
	
	
	public function fetchchildren()
	{
		$nvSelectpicker = "";
		$sessionchildID = $this->session->userdata('childsession');
		$nvSelectpicker .= '<select class="selectpicker nvselparentteacher"><option value="">Child</option>';
		if(isset($_POST['nvgroupID']))
		{
			$nvGroupID = $_POST['nvgroupID'];
			$childrens = $this->Database->getRow('children','group_id',$nvGroupID);
			foreach($childrens as $val)
			{
				if($sessionchildID == $val->id)
				{
					$nvSelectpicker .= '<option value="'.$val->id.'" selected="selected">'.$val->name.'</option>';
				}
				else
				{
					$nvSelectpicker .= '<option value="'.$val->id.'">'.$val->name.'</option>';
				}
				
			}
		}
		$nvSelectpicker .= '</select>';
		echo $nvSelectpicker;
	}
	
	public function fetchchildrendetail()
	{
		$nvappenddata = "";
		if(isset($_POST['childrenID']))
		{
			$postChildrenID = $_POST['childrenID'];
			$nvgetChildrenDetail = $this->Database->getRow('children','id',$postChildrenID);
			
			
			
			/* added by nikunj scoreing yes system*/
			$nvallchildans = $this->Database->getRow('capa_red_main_answers','child_id',$postChildrenID);
			$nvmainyestot = 0;
			$nvmainnotot = 0;
			if(!empty($nvallchildans))
			{
				foreach($nvallchildans as $nvallans)
				{
					$nvQusId = $nvallans->question_id;
					$nvMainQusAns = $nvallans->answer;
					if($nvMainQusAns == "yes")
					{
						$nvscoreyes = $this->Database->getCapaQuestion("questionnaires_master","score_yes","que_id",$nvQusId);
						$nvmainyestot = $nvmainyestot+$nvscoreyes;
					}
					else if($nvMainQusAns == "yes2")
					{
						$nvscoreyes = $this->Database->getCapaQuestion("questionnaires_master","score_yes2","que_id",$nvQusId);
						$nvmainyestot = $nvmainyestot+$nvscoreyes;
					}
					/*else if($nvMainQusAns == "maybe")
					{
						$nvscore_maybe = $this->Database->getCapaQuestion("questionnaires_master","score_maybe","que_id",$nvQusId);
						$nvmainyestot = $nvmainyestot+$nvscore_maybe;
						$nvmainnotot = $nvmainnotot+$nvscore_maybe; // add 2 point in no total
					}*/
					else if($nvMainQusAns == "no")
					{
						$nvscore_no = $this->Database->getCapaQuestion("questionnaires_master","score_no","que_id",$nvQusId);
						$nvmainnotot = $nvmainnotot+$nvscore_no;
					}
				}
				
			}
			//echo "<br>-=-=".$nvmainyestot;
			//echo "<br>------".$nvmainnotot;
			$nvUserID = $this->session->userdata('userid');
			$nvobervationans = $this->Database->getRow('oberservational_answers','user_id',$nvUserID);
			
			$nvcountParent1capaAnsInhibitiedans=0;
			$nvcountParent2capaAnsInhibitiedans=0;

			if(!empty($nvobervationans))
			{
				foreach($nvobervationans as $nvobjans)
				{
					$nvqusID = $nvobjans->observation_id;
					$nvansID = $nvobjans->answer;
					if($nvansID == "yes")
					{
						$nvscoreyes = $this->Database->getCapaQuestion("oberservational_survey","score_yes","observation_id",$nvqusID);
						$nvmainyestot = $nvmainyestot+$nvscoreyes;
					}
					else if($nvansID == "yes2")
					{
						$nvscoreyes = $this->Database->getCapaQuestion("oberservational_survey","score_yes2","observation_id",$nvqusID);
						$nvmainyestot = $nvmainyestot+$nvscoreyes;
					}
					else if($nvansID == "no")
					{
						$nvscore_no = $this->Database->getCapaQuestion("oberservational_survey","score_no","observation_id",$nvqusID);
						$nvmainnotot = $nvmainnotot+$nvscore_no;
					}
				}
			}
			/* added by nikunj scoreing yes system*/
			
			
			foreach($nvgetChildrenDetail as $child)
			{
				$nvParent1Email = $child->parent_1_email;
				$nvParent2Email = $child->parent_2_email;
				$nvTeacherEmail = $child->teacher_email;
				$nvClinicianEmail = $child->clinician_email;
				
				$nvChildID = $child->id;

				$nvDisinhibitied;
				$nvInhibitied;
				$nvOthers;
				
				
				/* capa question count type wise start ***/
				$qryDisinhibitiedcapaqustions = $this->Database->getRow("questionnaires_master","question_type","Disinhibitied");
				foreach($qryDisinhibitiedcapaqustions as $qDisinhibitiedcapaqustion)
				{
					$nvDisinhibitied[] = $qDisinhibitiedcapaqustion->que_id;
				}
				
				$Disinhibitiedcapaquscount = $this->Database->getRowCount("questionnaires_master","question_type","Disinhibitied");
				
				
				$qryInhibitiedcapaqustions = $this->Database->getRow("questionnaires_master","question_type","Inhibitied");

				foreach($qryInhibitiedcapaqustions as $qInhibitiedcapaqustion)
				{
					$nvInhibitied[] = $qInhibitiedcapaqustion->que_id;
				}
				$Inhibitiedcapaquscount = $this->Database->getRowCount("questionnaires_master","question_type","Inhibitied");

				
				$qryOtherscapaqustions = $this->Database->getRow("questionnaires_master","question_type","Others");
				foreach($qryOtherscapaqustions as $qOtherscapaqustion)
				{
					$nvOthers[] = $qOtherscapaqustion->que_id;
				}
				$Otherscapaquscount = $this->Database->getRowCount("questionnaires_master","question_type","Others");
				/* capa question count type wise end ***/
				
				
				
				/*Obervation Question Type Count Start Here ****/
				$qryDisinhibitedObservationqustions = $this->Database->getRow("oberservational_survey","oberservation_type","disinhibited");
				$Observationdisinhibited;
				//$nvObervationDisinhibited;
				foreach($qryDisinhibitedObservationqustions as $qDisinhibitedObservationqustion)
				{
					$nvObervationDisinhibited[] = $qDisinhibitedObservationqustion->observation_id;
				}
				
				$qryInhibitedObservationqustions = $this->Database->getRow("oberservational_survey","oberservation_type","inhibited");
				$Observationinhibited;
				foreach($qryInhibitedObservationqustions as $qInhibitedObservationqustion)
				{
					$Observationinhibited[] = $qInhibitedObservationqustion->observation_id;
				}
				
				$qryAdditionalObservationqustions = $this->Database->getRow("oberservational_survey","oberservation_type","additional");
				$Observationadditional;
				foreach($qryAdditionalObservationqustions as $qAdditionalObservationqustion)
				{
					$Observationadditional[] = $qAdditionalObservationqustion->observation_id;
				}
				
				/*Obervation Question Type Count End Here ****/
				
				
				$nvChildrenStatus = $this->Database->getName("children","status","id",$postChildrenID);

				
				
				
				$nvgetParent1UserID = $this->Database->getName("users","user_id","email",$nvParent1Email);
				$nvgetParent2UserID = $this->Database->getName("users","user_id","email",$nvParent2Email);
				$nvgetTeacherUserID = $this->Database->getName("users","user_id","email",$nvTeacherEmail);
				$nvgetClinicianUserID = $this->Database->getName("users","user_id","email",$nvClinicianEmail);
				
				
				/**** Disinhibitied CAPA Count for parent 1 and parent 2 Start ***/
//				$nvcountParent1capaAnsDisinhibitied = $this->Database->fnqrywhereincount("capa_red_main_answers","question_id",$nvDisinhibitied,"child_id",$postChildrenID,"user_id",$nvgetParent1UserID);
//				$nvcountParent2capaAnsDisinhibitied = $this->Database->fnqrywhereincount("capa_red_main_answers","question_id",$nvDisinhibitied,"child_id",$postChildrenID,"user_id",$nvgetParent2UserID);
				/**** Disinhibitied CAPA Count for parent 1 and parent 2 End ***/
				
				
				$nvcountParent1capaAnsDisinhibitiedans=0;
				$nvcountParent1capaAnsDisinhibitied = $this->Database->fnqrywherein("capa_red_main_answers","question_id",$nvDisinhibitied,"child_id",$postChildrenID,"user_id",$nvgetParent1UserID);
		
				foreach($nvcountParent1capaAnsDisinhibitied as $ans)
				{

					if($ans->answer=='yes2')
					{
							$nvcountParent1capaAnsDisinhibitiedans = $nvcountParent1capaAnsDisinhibitiedans + 2;
					}
					if($ans->answer=='yes') // || $ans->answer=='maybe'
					{
							$nvcountParent1capaAnsDisinhibitiedans = $nvcountParent1capaAnsDisinhibitiedans + 1;
					}

				}
				$probes= $this->Database->fnqrywherein("capa_red_probes_answers","main_ques_id",$nvDisinhibitied,"child_id",$postChildrenID,"user_id",$nvgetParent1UserID);

					foreach($probes as $prob)
					{
							if($prob->answer=='yes2')
							{
									$nvcountParent1capaAnsDisinhibitiedans = $nvcountParent1capaAnsDisinhibitiedans + 2;
							}
							if($prob->answer=='yes') //|| $prob->answer=='maybe'
							{
									$nvcountParent1capaAnsDisinhibitiedans = $nvcountParent1capaAnsDisinhibitiedans + 1;
							}
					}
			
				$nvcountParent2capaAnsDisinhibitiedans=0;
				$nvcountParent2capaAnsDisinhibitied = $this->Database->fnqrywherein("capa_red_main_answers","question_id",$nvDisinhibitied,"child_id",$postChildrenID,"user_id",$nvgetParent2UserID);
		
				foreach($nvcountParent2capaAnsDisinhibitied as $ans)
				{

					if($ans->answer=='yes2')
					{
							$nvcountParent2capaAnsDisinhibitiedans = $nvcountParent2capaAnsDisinhibitiedans + 2;
					}
					if($ans->answer=='yes') // || $ans->answer=='maybe'
					{
							$nvcountParent2capaAnsDisinhibitiedans = $nvcountParent2capaAnsDisinhibitiedans + 1;
					}

				}
			
				$probes= $this->Database->fnqrywherein("capa_red_probes_answers","main_ques_id",$nvDisinhibitied,"child_id",$postChildrenID,"user_id",$nvgetParent2UserID);

				foreach($probes as $prob)
				{
						if($prob->answer=='yes2')
						{
								$nvcountParent2capaAnsDisinhibitiedans = $nvcountParent2capaAnsDisinhibitiedans + 2;
						}
						if($prob->answer=='yes') //|| $prob->answer=='maybe'
						{
								$nvcountParent2capaAnsDisinhibitiedans = $nvcountParent2capaAnsDisinhibitiedans + 1;
						}
				}

				
				$nvcountParent1capaAnsInhibitiedans=0;
				$nvcountParent1capaAnsInhibitied = $this->Database->fnqrywherein("capa_red_main_answers","question_id",$nvInhibitied,"child_id",$postChildrenID,"user_id",$nvgetParent1UserID);
				foreach($nvcountParent1capaAnsInhibitied as $ans)
				{
					if($ans->answer=='yes2')
					{
							$nvcountParent1capaAnsInhibitiedans = $nvcountParent1capaAnsInhibitiedans + 2;
					}
					if($ans->answer=='yes') // || $ans->answer=='maybe'
					{
							$nvcountParent1capaAnsInhibitiedans = $nvcountParent1capaAnsInhibitiedans + 1;
					}

				}
					$probes= $this->Database->fnqrywherein("capa_red_probes_answers","main_ques_id",$nvInhibitied,"child_id",$postChildrenID,"user_id",$nvgetParent1UserID);

			foreach($probes as $prob)
			{
					if($prob->answer=='yes2')
					{
							$nvcountParent1capaAnsInhibitiedans = $nvcountParent1capaAnsInhibitiedans + 2;
					}
					if($prob->answer=='yes') // || $prob->answer=='maybe'
					{
							$nvcountParent1capaAnsInhibitiedans = $nvcountParent1capaAnsInhibitiedans + 1;
					}
			}
		
				$nvcountParent2capaAnsInhibitied = $this->Database->fnqrywherein("capa_red_main_answers","question_id",$nvInhibitied,"child_id",$postChildrenID,"user_id",$nvgetParent2UserID);
				$nvcountParent2capaAnsInhibitiedans=0;
				foreach($nvcountParent2capaAnsInhibitied as $ans)
				{

					if($ans->answer=='yes2')
					{
							$nvcountParent2capaAnsInhibitiedans = $nvcountParent2capaAnsInhibitiedans + 2;
					}
					if($ans->answer=='yes') // || $ans->answer=='maybe'
					{
							$nvcountParent2capaAnsInhibitiedans = $nvcountParent2capaAnsInhibitiedans + 1;
					}

				}
	
					$probes= $this->Database->fnqrywherein("capa_red_probes_answers","main_ques_id",$nvInhibitied,"child_id",$postChildrenID,"user_id",$nvgetParent2UserID);

					foreach($probes as $prob)
					{
							if($prob->answer=='yes2')
							{
									$nvcountParent2capaAnsInhibitiedans = $nvcountParent2capaAnsInhibitiedans + 2;
							}
							if($prob->answer=='yes') // || $prob->answer=='maybe'
							{
									$nvcountParent2capaAnsInhibitiedans = $nvcountParent2capaAnsInhibitiedans + 1;
							}
					}
			
				
				/**** Inhibitied CAPA Count for parent 1 and parent 2 End ***/
				
				
				/************ Disinhibitied Obervation Start Here ***********/
				
				//$nvcountParent1obervationAnsDisinhibitied = $this->Database->fnqrywhereinObsevationcount("oberservational_answers","observation_id",$nvObervationDisinhibited,"user_id",$this->session->userdata('userid'));
				/************ Disinhibitied Obervation End Here ***********/
				
				
				$nvTeacherAnsCOunt = $this->Database->getRecordtwoRowCountWithAns('parent_children_answers',"user_id",$nvgetTeacherUserID,"child_id",$nvChildID);
				$nvParent1RPQAnsCount = $this->Database->getRecordtwoRowCountWithAns('parent_children_answers',"user_id",$nvgetParent1UserID,"child_id",$nvChildID);
				$nvParent2RPQAnsCount = $this->Database->getRecordtwoRowCountWithAns('parent_children_answers',"user_id",$nvgetParent2UserID,"child_id",$nvChildID);
				$nvTeacherRPQAnsCount = $this->Database->getRecordtwoRowCountWithAns('parent_children_answers',"user_id",$nvgetTeacherUserID,"child_id",$nvChildID);
				
				$nvClinicianAnsCount = $this->Database->getSubQuestionsCount('oberservational_answers',"user_id",$nvgetClinicianUserID);
				
				
				$nvParent1CapaAnsCount = $this->Database->getRecordtwoRowCountWithAns('capa_red_main_answers',"user_id",$nvgetParent1UserID,"child_id",$nvChildID);
				$nvParent2CapaAnsCount = $this->Database->getRecordtwoRowCountWithAns('capa_red_main_answers',"user_id",$nvgetParent2UserID,"child_id",$nvChildID);
				$nvTeacherCapaAnsCount = $this->Database->getRecordtwoRowCountWithAns('capa_red_main_answers',"user_id",$nvgetTeacherUserID,"child_id",$nvChildID);
				
				$nvDocumentStatus = $this->Database->getName("information_children","status","child_id",$postChildrenID);
				if($nvDocumentStatus == "email")
				{
					$nvdocumentStatus = '<a href="#"><img src="'.base_url("public/images/mail-icon.svg").'" alt=""></a>';
				}
				else if($nvDocumentStatus == "document")
				{
					$nvdocumentStatus = '<a href="#"><img src="'.base_url("public/images/clipboard-icon.svg").'" alt=""></a>';
				}
				else
				{
					//$nvdocumentStatus = '---';
					$nvdocumentStatus = '';
				}
				
				if($nvTeacherAnsCOunt == "15")
				{
					$nvdocumentStatus = '<a class="parentquestionansrpq" href="javascript:void(0)" data-questiontype="teacher" data-user="'.$nvgetTeacherUserID.'" data-childid="'.$nvChildID.'" ><img src="'.base_url("public/images/eye-icon.svg").'" alt=""></a> '.$nvdocumentStatus ;
				}
				else
				{
					$nvdocumentStatus = '<a class="parentquestionansrpq" href="javascript:void(0)" data-questiontype="teacher" data-user="'.$nvgetTeacherUserID.'" data-childid="'.$nvChildID.'" ><img src="'.base_url("public/images/blink-icon.svg").'" alt=""></a> '.$nvdocumentStatus." " ;
				}
			?>
        
            
            <?php	
				
				
				
			}
			
			/**** RPQ TD Start Here ***/
			if($nvParent1RPQAnsCount == "11")
			{
				$nvparent1icon = '<td><a class="parentquestionansrpq" href="javascript:void(0)" data-questiontype="parent" data-user="'.$nvgetParent1UserID.'" data-childid="'.$nvChildID.'" ><img src="'.base_url("public/images/eye-icon.svg").'" alt=""></a></td>';
			}
			else
			{
				$nvparent1icon = '<td><a class="parentquestionansrpq" href="javascript:void(0)" data-questiontype="parent" data-user="'.$nvgetParent1UserID.'" data-childid="'.$nvChildID.'"  ><img src="'.base_url("public/images/blink-icon.svg").'" alt=""></a></td>';
			}
			if($nvParent2RPQAnsCount == "11")
			{
				$nvparent2icon = '<td><a class="parentquestionansrpq" href="javascript:void(0)" data-questiontype="parent" data-user="'.$nvgetParent2UserID.'" data-childid="'.$nvChildID.'" ><img src="'.base_url("public/images/eye-icon.svg").'" alt=""></a></td>';
			}
			else
			{
				$nvparent2icon = '<td><a class="parentquestionansrpq" href="javascript:void(0)" data-questiontype="parent" data-user="'.$nvgetParent2UserID.'" data-childid="'.$nvChildID.'" ><img src="'.base_url("public/images/blink-icon.svg").'" alt=""></a></td>';
			}
			/**** RPQ TD End Here ***/
			
			/**** CAPA TD Start Here ***/
//			echo "<br>=========".$nvParent1CapaAnsCount;
			//if($nvParent1CapaAnsCount > 0)
			if($nvParent1CapaAnsCount == "30")
			{
				$nvparent1capaicon = '<td><a class="parentquestionanscapa" href="javascript:void(0)" data-questiontype="parent" data-user="'.$nvgetParent1UserID.'" data-childid="'.$nvChildID.'" ><img src="'.base_url("public/images/eye-icon.svg").'" alt=""></a></td>';
			}
			else
			{
				$nvparent1capaicon = '<td><a class="parentquestionanscapa" href="javascript:void(0)" data-questiontype="parent" data-user="'.$nvgetParent1UserID.'" data-childid="'.$nvChildID.'" ><img src="'.base_url("public/images/blink-icon.svg").'" alt=""></a></td>';
			}
			
			//if($nvParent2CapaAnsCount > 0)
			if($nvParent2CapaAnsCount == "30")
			{
				$nvparent2capaicon = '<td><a class="parentquestionanscapa" href="javascript:void(0)" data-questiontype="parent" data-user="'.$nvgetParent2UserID.'" data-childid="'.$nvChildID.'" ><img src="'.base_url("public/images/eye-icon.svg").'" alt=""></a></td>';
			}
			else
			{
				$nvparent2capaicon = '<td><a class="parentquestionanscapa" href="javascript:void(0)" data-questiontype="parent" data-user="'.$nvgetParent2UserID.'" data-childid="'.$nvChildID.'" ><img src="'.base_url("public/images/blink-icon.svg").'" alt=""></a></td>';
			}			
			/**** CAPA TD End Here ***/
			
			if($nvClinicianAnsCount > 0)
			{
				$nvobverstatus = '<a class="obervationquestion" href="javascript:void(0)" data-userid="'.$nvgetClinicianUserID.'"><img src="'.base_url("public/images/eye-icon.svg").'" alt=""></a>';
			}
			else
			{
				$nvobverstatus = '<a href="javascript:void(0)" class="obervationquestion" data-userid="'.$nvgetClinicianUserID.'"><img src="'.base_url("public/images/blink-icon.svg").'" alt=""></a>';
			}
			
			
			$nvappenddata .='<div class="clinician-box">
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div class="diagram">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>&nbsp;</th>
                                                                <th>Parent1</th>
                                                                <th>Parent2</th>
                                                                <th>Teacher</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>RPQ</td>
                                                                '.$nvparent1icon.'
                                                                '.$nvparent2icon.'
                                                                <td>
                                                                    '.$nvdocumentStatus.'
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>CAPA-RAD</td>
                                                                '.$nvparent1capaicon.'
                                                                '.$nvparent2capaicon.'
                                                                <td>---</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Oberservation</td>
                                                                <td colspan="3">
                                                                    '.$nvobverstatus.'
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div> 
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="key-list">
                                                <p>Key</p>
                                                <ul>
                                                    <li><span>---</span>No Data</li>
                                                    <li><span><img src="'.base_url("public/images/mail-icon.svg").'" alt=""></span>Send by email</li>
                                                    <li><span><img src="'.base_url("public/images/clipboard-icon.svg").'" alt=""></span>Given on paper</li>
                                                    <li><span><img src="'.base_url("public/images/eye-icon.svg").'" alt=""></span>Positive Responses</li>
                                                    <li><span><img src="'.base_url("public/images/blink-icon.svg").'" alt=""></span>Negative Responses</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="clinician-charts">
									
									<div class="row">
										<div class="col-sm-8">
											<div class="row">
												<div class="col-sm-12">
													<h4 style="text-align: center;padding-bottom: 10px;"><strong>Total Score for Symptoms</strong></h4>
												</div>
												<div class="col-sm-6">
													<div class="chart-box">
														<canvas id="inhibitied-Chart" style="width: 500px; height: 500px;"></canvas>
														<a class="button" href="javascript:void(0)">Clinician\'s RAD</a>
													</div>
												</div>
												<div class="col-sm-6">
													<div class="chart-box">
														<canvas id="disinhibited-chart" style="width: 500px; height: 500px;"></canvas>
														<a class="button btn-gray" href="javascript:void(0)">Clinician</a>
													</div>
												</div>
											</div>
										</div>
										<div class="col-sm-4">
											<div class="key-list-box">
                                                <p>Key</p>
                                                <ul>
                                                    <li><span class="black"></span>RPQ</li>
                                                    <li><span class="gray"></span>CAPA</li>
                                                    <li><span class="white"></span>Observation</li>
                                                </ul>
												<ul>
                                                    <li><span class="black"></span>Likely</li>
                                                    <li><span class="gray"></span>Pending</li>
                                                    <li><span class="white"></span>Unlikely</li>
                                                </ul>
                                            </div>
										</div>
										
										
										
									</div>
								</div>
                                <!--div class="clinician-btn-row">
                                    <ul class="clearfix">';
										if($nvChildrenStatus == "Not Reviewed")
										{
											$nvappenddata .='<li><a class="button reviewd active" data-childid="'.$_POST['childrenID'].'" data-ans="Not Reviewed" href="javascript:void(0)">Not Reviewed</a></li>
                                        <li><a class="button reviewd" data-childid="'.$_POST['childrenID'].'" data-ans="Likely" href="javascript:void(0)">Likely('.$nvmainyestot.')</a></li>
                                        <li><a class="button reviewd" data-childid="'.$_POST['childrenID'].'" data-ans="Unlikely" href="javascript:void(0)">Unlikely('.$nvmainnotot.')</a></li>
                                        <li><a class="button reviewd" data-childid="'.$_POST['childrenID'].'" data-ans="Pending" href="javascript:void(0)">Pending</a></li>';
										}
										else if($nvChildrenStatus == "Likely")
										{
											$nvappenddata .='<li><a class="button reviewd" data-childid="'.$_POST['childrenID'].'" data-ans="Not Reviewed" href="javascript:void(0)">Not Reviewed</a></li>
                                        <li><a class="button reviewd active" data-childid="'.$_POST['childrenID'].'" data-ans="Likely" href="javascript:void(0)">Likely('.$nvmainyestot.')</a></li>
                                        <li><a class="button reviewd" data-childid="'.$_POST['childrenID'].'" data-ans="Unlikely" href="javascript:void(0)">Unlikely('.$nvmainnotot.')</a></li>
                                        <li><a class="button reviewd" data-childid="'.$_POST['childrenID'].'" data-ans="Pending" href="javascript:void(0)">Pending</a></li>';
										}
										else if($nvChildrenStatus == "Unlikely")
										{
											$nvappenddata .='<li><a class="button reviewd" data-childid="'.$_POST['childrenID'].'" data-ans="Not Reviewed" href="javascript:void(0)">Not Reviewed</a></li>
                                        <li><a class="button reviewd" data-childid="'.$_POST['childrenID'].'" data-ans="Likely" href="javascript:void(0)">Likely('.$nvmainyestot.')</a></li>
                                        <li><a class="button reviewd active" data-childid="'.$_POST['childrenID'].'" data-ans="Unlikely" href="javascript:void(0)">Unlikely('.$nvmainnotot.')</a></li>
                                        <li><a class="button reviewd" data-childid="'.$_POST['childrenID'].'" data-ans="Pending" href="javascript:void(0)">Pending</a></li>';
										}
										else if($nvChildrenStatus == "Pending")
										{
											$nvappenddata .='<li><a class="button reviewd" data-childid="'.$_POST['childrenID'].'" data-ans="Not Reviewed" href="javascript:void(0)">Not Reviewed</a></li>
                                        <li><a class="button reviewd" data-childid="'.$_POST['childrenID'].'" data-ans="Likely" href="javascript:void(0)">Likely('.$nvmainyestot.')</a></li>
                                        <li><a class="button reviewd" data-childid="'.$_POST['childrenID'].'" data-ans="Unlikely" href="javascript:void(0)">Unlikely('.$nvmainnotot.')</a></li>
                                        <li><a class="button reviewd active" data-childid="'.$_POST['childrenID'].'" data-ans="Pending" href="javascript:void(0)">Pending</a></li>';
										}
										else
										{
											$nvappenddata .='<li><a class="button reviewd active" data-childid="'.$_POST['childrenID'].'" data-ans="Not Reviewed" href="javascript:void(0)">Not Reviewed</a></li>
                                        <li><a class="button reviewd" data-childid="'.$_POST['childrenID'].'" data-ans="Likely" href="javascript:void(0)">Likely('.$nvmainyestot.')</a></li>
                                        <li><a class="button reviewd" data-childid="'.$_POST['childrenID'].'" data-ans="Unlikely" href="javascript:void(0)">Unlikely('.$nvmainnotot.')</a></li>
                                        <li><a class="button reviewd" data-childid="'.$_POST['childrenID'].'" data-ans="Pending" href="javascript:void(0)">Pending</a></li>';
										}
                                        
                                    $nvappenddata .='</ul>
                                </div-->';
		}
		
		
		echo $nvappenddata;
	
	?>
<script>


/*inhibitied jquery Code Start Here*/
var ctx = document.getElementById("inhibitied-Chart");
var ctxdata = {
            labels: ["Parent 1", "Parent 2", "Teacher", "Obeservation"],
            datasets: [{
            label: 'RPQ',
            backgroundColor: [
                '#000',
                '#000',
                '#000',
                '#000',
                
            ],
           
            data: [
                10, /**RPQ Question Parent 1**/
                20, /**RPQ Question Parent 2**/
				25, /**RPQ Question Teacher**/
                35, /**RPQ Question Obervation **/
            ]
        }, {
            label: 'CAPA',
            /*backgroundColor: window.chartColors.grey,*/
			backgroundColor: [
                '#e5e5e5',
                '#e5e5e5',
                '#e5e5e5',
                '#e5e5e5',
                
            ],
			
           
            data: [
                <?php echo 0;/*$nvcountParent1capaAnsInhibitied;*/ ?>, /**CAPA Question Parent 1**/
                <?php echo 0; /*$nvcountParent2capaAnsInhibitied;*/ ?>, /**CAPA Question Parent 2**/
				30, /**CAPA Question Teacher**/
				30, /**CAPA Question Obervatopn**/
            ],
			
        },
		{
            label: 'Observation',
            backgroundColor: [
                '#fff',
                '#fff',
                '#fff',
                '#fff',
                
            ],
			borderColor: [
                '#000',
                '#000',
                '#000',
                '#000',
               
            ],
            borderWidth: 1,
            
            data: [
                10, /**Obervation Question Parent 1**/
                20, /**Obervation Question Parent 2**/
				30, /**Obervation Question Teacher**/
				40, /**Obervation Question Oberservation**/
            ],
			
			
        }
		]

        };

var ctxdata1= {
            labels: ["Parent 1", "Parent 2", "Teacher", "Obeservation"],
            datasets: [{
            label: 'RPQ',
            backgroundColor: [
                '#000',
                '#000',
                '#000',
                '#000',
                
            ],
           
            data: [
                10, /**RPQ Question Parent 1**/
                20, /**RPQ Question Parent 2**/
				25, /**RPQ Question Teacher**/
                35, /**RPQ Question Obervation **/
            ]
        }, {
            label: 'CAPA',
            /*backgroundColor: window.chartColors.grey,*/
			backgroundColor: [
                '#e5e5e5',
                '#e5e5e5',
                '#e5e5e5',
                '#e5e5e5',
                
            ],
			
           
            data: [
                <?php echo 0/*$nvcountParent1capaAnsDisinhibitied;*/ ?>, /**CAPA Question Parent 1**/
                <?php echo 0/*$nvcountParent2capaAnsDisinhibitied;*/ ?>, /**CAPA Question Parent 2**/
				30, /**CAPA Question Teacher**/
				30, /**CAPA Question Obervatopn**/
            ],
			
        },
		{
            label: 'Observation',
            backgroundColor: [
                '#fff',
                '#fff',
                '#fff',
                '#fff',
                
            ],
			borderColor: [
                '#000',
                '#000',
                '#000',
                '#000',
            ],
            borderWidth: 1,
            
            data: [
                10, /**Obervation Question Parent 1**/
                20, /**Obervation Question Parent 2**/
				30, /**Obervation Question Teacher**/
				40, /**Obervation Question Oberservation**/
            ],
			
			
        }
		]

        }

var myChart = new Chart(ctx, {
    type: 'bar',
    data:  {
            labels: ["Parent 1", "Parent 2"],
            datasets: [{
            label: 'CAPA',
            /*backgroundColor: window.chartColors.grey,*/
			backgroundColor: [
                '#e5e5e5',
                '#e5e5e5',
            ],
            data: [
                <?php echo $nvcountParent1capaAnsInhibitiedans;?>, /**CAPA Question Parent 1**/
                <?php echo $nvcountParent2capaAnsInhibitiedans;?>, /**CAPA Question Parent 2**/
            ],
        },
		]
        },
    options: {
		scales: {
			yAxes: [{
				ticks: {
					beginAtZero: true
				}
			}]
		},
		responsive: true,
		legend: {
		   display: false,
		},
		title: {
			display: true,
			text: 'RAD'
		},
	}
});
/*inhibitied jquery Code End Here*/

/*disinhibited jquery Code Start Here*/

var disinhibited = document.getElementById("disinhibited-chart");
var disinhibitedChart = new Chart(disinhibited, {
    type: 'bar',
    data:  {
            labels: ["Parent 1", "Parent 2"],
            datasets: [{
            label: 'CAPA',
            /*backgroundColor: window.chartColors.grey,*/
			backgroundColor: [
                '#e5e5e5',
                '#e5e5e5',
                
            ],
            data: [
                <?php echo $nvcountParent1capaAnsDisinhibitiedans;?>, /**CAPA Question Parent 1**/
                <?php echo $nvcountParent2capaAnsDisinhibitiedans;?>, /**CAPA Question Parent 2**/
            ],
			
        },
		
		]

        },
    options: {
		scales: {
			yAxes: [{
				ticks: {
					beginAtZero: true
				}
			}]
		},
		responsive: true,
		legend: {
		   display: false,
		},
		title: {
			display: true,
			text: 'DSED'
		},
	}
});
/*disinhibited jquery Code End Here*/

</script>
    
    <?php	
		
	}
	
	public function child_reviewed()
	{
		$postchildID = $_POST['childid'];
		$postanswer = $_POST['answer'];
		$nvUserID = $this->session->userdata('userid');
		$userrole = $this->session->userdata('role');
		if($userrole == "admin")
		{
			$nvUserID = $this->session->userdata('nvuserid');
			$userrole = $this->session->userdata('nvrole');
		}
		$filed_value['status']=$postanswer;
		$filed_value['reviewd_user']=$nvUserID;
		$update=$this->Database->updateRecord('children',$filed_value,'id',$postchildID);
	}
	
	public function fetchobjervationquestion()
	{
		$nvreturn = "";
		if(isset($_POST['userID']))
		{
			$postUserID = $_POST['userID'];
			//$nvCurrentUserID = $this->session->userdata('userid');
			$OberservationQuestions = $this->Database->getAllRecord("oberservational_survey");
			foreach($OberservationQuestions as $objer)
			{
				$nvQuestionID = $objer->observation_id;
				$nvObjQuestion = $objer->question;
				$nvObjQuestionID = $this->Database->getRecordTwoRowID("oberservational_answers","user_id",$postUserID,"observation_id",$nvQuestionID,"answer");
				if($nvObjQuestionID == "yes")
				{
					$nvObjAnswer = "A Little";
				}
				if($nvObjQuestionID == "yes2")
				{
					$nvObjAnswer = "A Lot";
				}
				else if($nvObjQuestionID == "no")
				{
					$nvObjAnswer = "no";
				}
				else
				{
					$nvObjAnswer = "No Answer";
				}
				
				if($nvObjAnswer == "No Answer")
				{
					$nvFilledClass = "";	
				}
				else
				{
					$nvFilledClass = "filled";	
				}
				
				$nvreturn .= '<!--clinic-2-panel-wrap start-->
                            <div class="clinic-2-panel-wrap">
                                <div class="clinic-2-panel">
                                    <a class="icon-left objcomment pencil '.$nvFilledClass.'" data-question="'.$nvQuestionID.'" data-userid="'.$postUserID.'" href="javascript:void(0)"></a>
                                    <!--<a class="icon-left-2 question-mark" href="#"></a>-->
                                    <span>'.$nvObjQuestion.'</span>
                                    <a class="icon-right plus" href="#"></a>
                                </div>
                                <div class="clinic-2-panel-content">
                                    <div class="comment-box">
                                    	<div class="comment-area">'.$nvObjAnswer.'</div>
                                    </div>
                                </div>
                            </div>';
				
				
			}
		}
		echo $nvreturn;
	}
	
	public function fetchparentquestionanswercapa()
	{
		$nvCapaparentquestion = "";
		$nvCapaparentquestionNeg = "";
		$nvInhibitiedHtml = "";
		$nvInhibitiedHtmlNeg = "";
		$nvOthersHtml = "";
		$nvOthersHtmlNeg = "";
		$nvQUsernmwithrole = "";
		if(isset($_POST['userID']))
		{
			$postUserID = $_POST['userID'];
			$postChildID = $_POST['childid'];
			$postQuestiontype = $_POST['questiontype'];
			
			$QUserName = $this->Database->getName("users","name","user_id",$postUserID);
			$QUserRole = $this->Database->getName("users","role","user_id",$postUserID);
			$nvQUsernmwithrole = '<h2>Informant:- '.$QUserName.'('.$QUserRole.')</h2>';
			/*$masterQuestion=$this->Database->getAllRecord('questionnaires_master');
			foreach($masterQuestion as $capaque)
			{
				$nvMainQuestionID = $capaque->que_id;
				$nvParentCapaAnswer = $this->Database->getRecordSubAnsID('capa_red_main_answers',"user_id",$postUserID,"child_id",$postChildID,'question_id',$nvMainQuestionID,"answer"); 
				if($nvParentCapaAnswer == "maybe")
				{
					$nvCapaFinalAns = "Maybe";
				}
				else if($nvParentCapaAnswer == "no")
				{
					$nvCapaFinalAns = "No";
				}
				else if($nvParentCapaAnswer == "yes")
				{
					$nvCapaFinalAns = "Yes";
				}
				else
				{
					$nvCapaFinalAns = "No Answer";
				}
				
				if($nvCapaFinalAns == "No Answer")
				{
					$nvFilledClass = "";	
				}
				else
				{
					$nvFilledClass = "filled";	
				}
				
				$nvCapaparentquestion .='<!--clinic-2-panel-wrap start-->
					<div class="clinic-2-panel-wrap">
						<div class="clinic-2-panel">
							<a class="icon-left pencil '.$nvFilledClass.'" data-question="'.$nvMainQuestionID.'" data-child="'.$postChildID.'" data-questiontype="'.$postQuestiontype.'" data-userID="'.$postUserID.'" href="javascript:void(0)"></a>
							<a class="icon-left-2 question-mark" href="javascript:void(0)" data-question="'.$nvMainQuestionID.'"></a>
							  <span>'.$capaque->question.'</span>
							<a class="icon-right plus" href="javascript:void(0)"></a>
						</div>
						<div class="clinic-2-panel-content">
							<div class="comment-box">
								<div class="comment-area">'.$nvCapaFinalAns.'</div>
							</div>
						</div>
					</div>
					<!--clinic-2-panel-wrap end-->';
				
				
			}*/
			$qryDisinhibitiedcapaqustions = $this->Database->getRow("questionnaires_master","question_type","Disinhibitied");
			foreach($qryDisinhibitiedcapaqustions as $qDisinhibitiedcapaqustion)
			{
				
				$nvMainQuestionID = $qDisinhibitiedcapaqustion->que_id;
				$nvParentCapaAnswer = $this->Database->getRecordSubAnsID('capa_red_main_answers',"user_id",$postUserID,"child_id",$postChildID,'question_id',$nvMainQuestionID,"answer"); 
				if($nvParentCapaAnswer == "maybe")
				{
					$nvCapaFinalAns = "Maybe";
				}
				else if($nvParentCapaAnswer == "no")
				{
					$nvCapaFinalAns = "No";
				}
				else if($nvParentCapaAnswer == "yes")
				{
					$nvCapaFinalAns = "A Little";
				}
				else if($nvParentCapaAnswer == "yes2")
				{
					$nvCapaFinalAns = "A Lot";
				}
				else
				{
					$nvCapaFinalAns = "No Answer";
				}
				
				if($nvCapaFinalAns == "No Answer")
				{
					$nvFilledClass = "";	
				}
				else
				{
					$nvFilledClass = "filled";	
				}
				if($nvParentCapaAnswer != "")
				{
					
					if($nvParentCapaAnswer == "yes")
					{
						$nvCapaparentquestion .='<div class="clinic-2-panel-wrap">
                                        <div class="clinic-2-panel">
                                            <a class="icon-left pencil '.$nvFilledClass.'" data-question="'.$nvMainQuestionID.'" data-child="'.$postChildID.'" data-questiontype="'.$postQuestiontype.'" data-userID="'.$postUserID.'" href="javascript:void(0)"></a>
                                            <a class="icon-left-2 question-mark" href="javascript:void(0)" data-question="'.$nvMainQuestionID.'"></a>
                                            <span>'.$qDisinhibitiedcapaqustion->question.'</span>
                                            <a class="icon-right plus" href="#"></a>
                                        </div>
                                        <div class="clinic-2-panel-content">
                                            <div class="comment-box">
                                                <div class="comment-area">'.$nvCapaFinalAns.'</div>
                                            </div>
                                        </div>
                                    </div>';
					}
					elseif($nvParentCapaAnswer == "yes2")
					{
						$nvCapaparentquestion .='<div class="clinic-2-panel-wrap">
                                        <div class="clinic-2-panel">
                                            <a class="icon-left pencil '.$nvFilledClass.'" data-question="'.$nvMainQuestionID.'" data-child="'.$postChildID.'" data-questiontype="'.$postQuestiontype.'" data-userID="'.$postUserID.'" href="javascript:void(0)"></a>
                                            <a class="icon-left-2 question-mark" href="javascript:void(0)" data-question="'.$nvMainQuestionID.'"></a>
                                            <span>'.$qDisinhibitiedcapaqustion->question.'</span>
                                            <a class="icon-right plus" href="#"></a>
                                        </div>
                                        <div class="clinic-2-panel-content">
                                            <div class="comment-box">
                                                <div class="comment-area">'.$nvCapaFinalAns.'</div>
                                            </div>
                                        </div>
                                    </div>';
					}
					elseif($nvParentCapaAnswer == "maybe")
					{
						$nvCapaparentquestion .='<div class="clinic-2-panel-wrap">
                                        <div class="clinic-2-panel">
                                            <a class="icon-left pencil '.$nvFilledClass.'" data-question="'.$nvMainQuestionID.'" data-child="'.$postChildID.'" data-questiontype="'.$postQuestiontype.'" data-userID="'.$postUserID.'" href="javascript:void(0)"></a>
                                            <a class="icon-left-2 question-mark" href="javascript:void(0)" data-question="'.$nvMainQuestionID.'"></a>
                                            <span>'.$qDisinhibitiedcapaqustion->question.'</span>
                                            <a class="icon-right plus" href="#"></a>
                                        </div>
                                        <div class="clinic-2-panel-content">
                                            <div class="comment-box">
                                                <div class="comment-area">'.$nvCapaFinalAns.'</div>
                                            </div>
                                        </div>
                                    </div>';
					}
					else
					{
						$nvCapaparentquestionNeg .='<div class="clinic-2-panel-wrap">
                                        <div class="clinic-2-panel">
                                            <a class="icon-left pencil '.$nvFilledClass.'" data-question="'.$nvMainQuestionID.'" data-child="'.$postChildID.'" data-questiontype="'.$postQuestiontype.'" data-userID="'.$postUserID.'" href="javascript:void(0)"></a>
                                            <a class="icon-left-2 question-mark" href="javascript:void(0)" data-question="'.$nvMainQuestionID.'"></a>
                                            <span>'.$qDisinhibitiedcapaqustion->question.'</span>
                                            <a class="icon-right plus" href="#"></a>
                                        </div>
                                        <div class="clinic-2-panel-content">
                                            <div class="comment-box">
                                                <div class="comment-area">'.$nvCapaFinalAns.'</div>
                                            </div>
                                        </div>
                                    </div>';
					}
					
					
				}
				else
				{
					$nvCapaparentquestionNeg .='<div class="clinic-2-panel-wrap">
                                        <div class="clinic-2-panel">
                                            <a class="icon-left pencil '.$nvFilledClass.'" data-question="'.$nvMainQuestionID.'" data-child="'.$postChildID.'" data-questiontype="'.$postQuestiontype.'" data-userID="'.$postUserID.'" href="javascript:void(0)"></a>
                                            <a class="icon-left-2 question-mark" href="javascript:void(0)" data-question="'.$nvMainQuestionID.'"></a>
                                            <span>'.$qDisinhibitiedcapaqustion->question.'</span>
                                            <a class="icon-right plus" href="#"></a>
                                        </div>
                                        <div class="clinic-2-panel-content">
                                            <div class="comment-box">
                                                <div class="comment-area">'.$nvCapaFinalAns.'</div>
                                            </div>
                                        </div>
                                    </div>';
				}
				
			}
			
			
			
			$qryInhibitiedcapaqustions = $this->Database->getRow("questionnaires_master","question_type","Inhibitied");
			foreach($qryInhibitiedcapaqustions as $qInhibitiedcapaqustion)
			{
				$nvMainQuestionID = $qInhibitiedcapaqustion->que_id;
				$nvParentCapaAnswer = $this->Database->getRecordSubAnsID('capa_red_main_answers',"user_id",$postUserID,"child_id",$postChildID,'question_id',$nvMainQuestionID,"answer"); 
				if($nvParentCapaAnswer == "maybe")
				{
					$nvCapaFinalAns = "Maybe";
				}
				else if($nvParentCapaAnswer == "no")
				{
					$nvCapaFinalAns = "No";
				}
				else if($nvParentCapaAnswer == "yes")
				{
					$nvCapaFinalAns = "A Little";
				}
				else if($nvParentCapaAnswer == "yes2")
				{
					$nvCapaFinalAns = "A Lot";
				}
				else
				{
					$nvCapaFinalAns = "No Answer";
				}
				
				if($nvCapaFinalAns == "No Answer")
				{
					$nvFilledClass = "";	
				}
				else
				{
					$nvFilledClass = "filled";	
				}
				
				if($nvParentCapaAnswer != "" && $nvParentCapaAnswer == "yes")
				{
					
					
					$nvInhibitiedHtml .='<div class="clinic-2-panel-wrap">
                                        <div class="clinic-2-panel">
                                            <a class="icon-left pencil '.$nvFilledClass.'" data-question="'.$nvMainQuestionID.'" data-child="'.$postChildID.'" data-questiontype="'.$postQuestiontype.'" data-userID="'.$postUserID.'" href="javascript:void(0)"></a>
                                            <a class="icon-left-2 question-mark" href="javascript:void(0)" data-question="'.$nvMainQuestionID.'"></a>
                                            <span>'.$qInhibitiedcapaqustion->question.'</span>
                                            <a class="icon-right plus" href="#"></a>
                                        </div>
                                        <div class="clinic-2-panel-content">
                                            <div class="comment-box">
                                                <div class="comment-area">'.$nvCapaFinalAns.'</div>
                                            </div>
                                        </div>
                                    </div>';
				}
				elseif($nvParentCapaAnswer != "" && $nvParentCapaAnswer == "yes2")
				{
					
					
					$nvInhibitiedHtml .='<div class="clinic-2-panel-wrap">
                                        <div class="clinic-2-panel">
                                            <a class="icon-left pencil '.$nvFilledClass.'" data-question="'.$nvMainQuestionID.'" data-child="'.$postChildID.'" data-questiontype="'.$postQuestiontype.'" data-userID="'.$postUserID.'" href="javascript:void(0)"></a>
                                            <a class="icon-left-2 question-mark" href="javascript:void(0)" data-question="'.$nvMainQuestionID.'"></a>
                                            <span>'.$qInhibitiedcapaqustion->question.'</span>
                                            <a class="icon-right plus" href="#"></a>
                                        </div>
                                        <div class="clinic-2-panel-content">
                                            <div class="comment-box">
                                                <div class="comment-area">'.$nvCapaFinalAns.'</div>
                                            </div>
                                        </div>
                                    </div>';
				}
				elseif($nvParentCapaAnswer != "" && $nvParentCapaAnswer == "maybe")
				{
					
					
					$nvInhibitiedHtml .='<div class="clinic-2-panel-wrap">
                                        <div class="clinic-2-panel">
                                            <a class="icon-left pencil '.$nvFilledClass.'" data-question="'.$nvMainQuestionID.'" data-child="'.$postChildID.'" data-questiontype="'.$postQuestiontype.'" data-userID="'.$postUserID.'" href="javascript:void(0)"></a>
                                            <a class="icon-left-2 question-mark" href="javascript:void(0)" data-question="'.$nvMainQuestionID.'"></a>
                                            <span>'.$qInhibitiedcapaqustion->question.'</span>
                                            <a class="icon-right plus" href="#"></a>
                                        </div>
                                        <div class="clinic-2-panel-content">
                                            <div class="comment-box">
                                                <div class="comment-area">'.$nvCapaFinalAns.'</div>
                                            </div>
                                        </div>
                                    </div>';
				}
				else
				{
					$nvInhibitiedHtmlNeg .='<div class="clinic-2-panel-wrap">
                                        <div class="clinic-2-panel">
                                            <a class="icon-left pencil '.$nvFilledClass.'" data-question="'.$nvMainQuestionID.'" data-child="'.$postChildID.'" data-questiontype="'.$postQuestiontype.'" data-userID="'.$postUserID.'" href="javascript:void(0)"></a>
                                            <a class="icon-left-2 question-mark" href="javascript:void(0)" data-question="'.$nvMainQuestionID.'"></a>
                                            <span>'.$qInhibitiedcapaqustion->question.'</span>
                                            <a class="icon-right plus" href="#"></a>
                                        </div>
                                        <div class="clinic-2-panel-content">
                                            <div class="comment-box">
                                                <div class="comment-area">'.$nvCapaFinalAns.'</div>
                                            </div>
                                        </div>
                                    </div>';	
				}
				
				
				
			}
			
			
			/**** Other Question Code Start Here ***/
			$qryOtherscapaqustions = $this->Database->getRow("questionnaires_master","question_type","Others");
			foreach($qryOtherscapaqustions as $qOtherscapaqustion)
			{
				$nvMainQuestionID = $qOtherscapaqustion->que_id;
				$nvParentCapaAnswer = $this->Database->getRecordSubAnsID('capa_red_main_answers',"user_id",$postUserID,"child_id",$postChildID,'question_id',$nvMainQuestionID,"answer"); 
				$nvotherscore = 0;
				if($nvParentCapaAnswer == "maybe")
				{
					$nvCapaFinalAns = "Maybe";
//					$nvotherscore = $qOtherscapaqustion->score_maybe;
					$nvotherscore = $qOtherscapaqustion->score_yes;
				}
				else if($nvParentCapaAnswer == "no")
				{
					$nvCapaFinalAns = "No";
//					$nvotherscore = $qOtherscapaqustion->score_no;
					$nvotherscore = 0;
				}
				else if($nvParentCapaAnswer == "yes")
				{
					$nvCapaFinalAns = "A Little";
					$nvotherscore = $qOtherscapaqustion->score_yes;
				}
				else if($nvParentCapaAnswer == "yes2")
				{
					$nvCapaFinalAns = "A Lot";
					$nvotherscore = $qOtherscapaqustion->score_yes2;
				}
				else
				{
					$nvCapaFinalAns = "No Answer";
					$nvotherscore = 0;
				}
				
				if($nvCapaFinalAns == "No Answer")
				{
					$nvFilledClass = "";	
				}
				else
				{
					$nvFilledClass = "filled";	
				}
				if($nvParentCapaAnswer != "")
				{
					

					if($nvotherscore > 0)
					{
						$nvOthersHtml .='<div class="clinic-2-panel-wrap">
                                        <div class="clinic-2-panel">
                                            <a class="icon-left pencil '.$nvFilledClass.'" data-question="'.$nvMainQuestionID.'" data-child="'.$postChildID.'" data-questiontype="'.$postQuestiontype.'" data-userID="'.$postUserID.'" href="javascript:void(0)"></a>
                                            <a class="icon-left-2 question-mark" href="javascript:void(0)" data-question="'.$nvMainQuestionID.'"></a>
                                            <span>'.$qInhibitiedcapaqustion->question.'</span>
                                            <a class="icon-right plus" href="#"></a>
                                        </div>
                                        <div class="clinic-2-panel-content">
                                            <div class="comment-box">
                                                <div class="comment-area">'.$nvCapaFinalAns.'</div>
                                            </div>
                                        </div>
                                    </div>';
					}
					else
					{
						$nvOthersHtmlNeg .='<div class="clinic-2-panel-wrap">
                                        <div class="clinic-2-panel">
                                            <a class="icon-left pencil '.$nvFilledClass.'" data-question="'.$nvMainQuestionID.'" data-child="'.$postChildID.'" data-questiontype="'.$postQuestiontype.'" data-userID="'.$postUserID.'" href="javascript:void(0)"></a>
                                            <a class="icon-left-2 question-mark" href="javascript:void(0)" data-question="'.$nvMainQuestionID.'"></a>
                                            <span>'.$qInhibitiedcapaqustion->question.'</span>
                                            <a class="icon-right plus" href="#"></a>
                                        </div>
                                        <div class="clinic-2-panel-content">
                                            <div class="comment-box">
                                                <div class="comment-area">'.$nvCapaFinalAns.'</div>
                                            </div>
                                        </div>
                                    </div>';
					}
					
				}
				else
				{
					$nvOthersHtmlNeg .='<div class="clinic-2-panel-wrap">
                                        <div class="clinic-2-panel">
                                            <a class="icon-left pencil '.$nvFilledClass.'" data-question="'.$nvMainQuestionID.'" data-child="'.$postChildID.'" data-questiontype="'.$postQuestiontype.'" data-userID="'.$postUserID.'" href="javascript:void(0)"></a>
                                            <a class="icon-left-2 question-mark" href="javascript:void(0)" data-question="'.$nvMainQuestionID.'"></a>
                                            <span>'.$qInhibitiedcapaqustion->question.'</span>
                                            <a class="icon-right plus" href="#"></a>
                                        </div>
                                        <div class="clinic-2-panel-content">
                                            <div class="comment-box">
                                                <div class="comment-area">'.$nvCapaFinalAns.'</div>
                                            </div>
                                        </div>
                                    </div>';
				}
				
				
				
			}
			/**** Other Question Code End Here ***/
			
			
			
		}
		echo $nvCapaparentquestion.'_||_'.$nvInhibitiedHtml.'_||_'.$nvOthersHtml.'_||_'.$nvCapaparentquestionNeg.'_||_'.$nvInhibitiedHtmlNeg.'_||_'.$nvOthersHtmlNeg.'_||_'.$nvQUsernmwithrole;
		
	}
	
	public function fetchparentquestionanswer()
	{
		$nvRpqparentquestion = "";
		if(isset($_POST['userID']))
		{
			$postUserID = $_POST['userID'];
			$postChildID = $_POST['childid'];
			$postQuestiontype = $_POST['questiontype'];
			$rpqParentQuestions = $this->Database->getTblRecord("questions", array("question_type"=>$postQuestiontype,'status'=>'yes'));
			$childrenname = $this->Database->getName("children","name","id",$postChildID);
			if($postUserID != "")
			{
				foreach($rpqParentQuestions as $rpqparent)
				{
					$nvQuestionID = $rpqparent->question_id;
					$nvParentRpqAnswer = $this->Database->getRecordSubAnsID('parent_children_answers',"user_id",$postUserID,"child_id",$postChildID,'question_id',$nvQuestionID,"answer"); 
					if($nvParentRpqAnswer == 1)
					{
						$nvFinalansRpq = "Exactly like ".$childrenname;
					}
					else if($nvParentRpqAnswer == 2)
					{
						$nvFinalansRpq = "Like ".$childrenname;
					}
					else if($nvParentRpqAnswer == 3)
					{
						$nvFinalansRpq = "A bit like ".$childrenname;
					}
					else if($nvParentRpqAnswer == 4)
					{
						$nvFinalansRpq = "Not at all like ".$childrenname;
					}
					else
					{
						$nvFinalansRpq = "No Answer";
					}
					
					if($nvFinalansRpq == "No Answer")
					{
						$nvFilledClass = "";	
					}
					else
					{
						$nvFilledClass = "filled";	
					}
					
					
					$nvRpqparentquestion .='<!--clinic-2-panel-wrap start-->
						<div class="clinic-2-panel-wrap">
							<div class="clinic-2-panel">
								<a class="icon-left pencil '.$nvFilledClass.'" data-question="'.$nvQuestionID.'" data-child="'.$postChildID.'" data-questiontype="'.$postQuestiontype.'" data-userID="'.$postUserID.'" href="javascript:void(0)"></a>
								<a class="icon-left-2 question-mark" href="javascript:void(0)"></a>
								  <span>'.$rpqparent->question.'</span>
								<a class="icon-right plus" href="javascript:void(0)"></a>
							</div>
							<div class="clinic-2-panel-content">
								<div class="comment-box">
									<div class="comment-area">'.$nvFinalansRpq.'</div>
								</div>
							</div>
							
						</div>
						<!--clinic-2-panel-wrap end-->';
				}
			}
			else
			{
				foreach($rpqParentQuestions as $rpqparent)
				{
					$nvQuestionID = $rpqparent->question_id;
					
					
					$nvRpqparentquestion .='<!--clinic-2-panel-wrap start-->
						<div class="clinic-2-panel-wrap">
							<div class="clinic-2-panel">
								<a class="icon-left pencil filled" data-question="'.$nvQuestionID.'" data-child="'.$postChildID.'" data-questiontype="'.$postQuestiontype.'" data-userID="'.$postUserID.'" href="javascript:void(0)"></a>
								<a class="icon-left-2 question-mark" href="javascript:void(0)"></a>
								  <span>'.$rpqparent->question.'</span>
								<a class="icon-right plus" href="javascript:void(0)"></a>
							</div>
							<div class="clinic-2-panel-content">
								<div class="comment-box">
									<div class="comment-area">No Answer</div>
								</div>
							</div>
						</div>
						<!--clinic-2-panel-wrap end-->';
				}
				
			}
			
		}
		echo $nvRpqparentquestion;

	}
	
	public function rpqparentcomment()
	{
		$postQuestionType = $_POST['questiontype'];
		$postUserID = $this->session->userdata('userid');
		$userrole = $this->session->userdata('role');
		if($userrole == "admin")
		{
			$postUserID = $this->session->userdata('nvuserid');
			$userrole = $this->session->userdata('nvrole');
		}
		$postChildID = $_POST['childID'];
		$postQuestionID = $_POST['questionID'];
		$postUserID = $_POST['userID'];
		
		$nvquestionwithcomment = "";
		if($postChildID > 0)
		{
			$nvQuestion = $this->Database->getName("questions","question","question_id",$postQuestionID);
			$nvGetComment = $this->Database->getRecordSubAnsID("parent_children_answers","question_id",$postQuestionID,"user_id",$postUserID,"child_id",$postChildID,"clinician_comment");
			
			
			$nvGetdiagnosis = $this->Database->getRecordSubAnsID("parent_children_answers","question_id",$postQuestionID,"user_id",$postUserID,"child_id",$postChildID,"clinician_diagnosis");
			if($nvGetComment == "")
			{
				$nvGetComment = "";
			}
			else
			{
				$nvGetComment = $nvGetComment;
			}
			
			
			if($nvGetdiagnosis == "Likely")
			{
				$nvcheckstatusLikely = 'checked="checked"';
				$nvcheckstatusUnlikely = '';
				$nvcheckstatusPending = '';
			}
			else if($nvGetdiagnosis == "Pending")
			{
				$nvcheckstatusPending = 'checked="checked"';
				$nvcheckstatusUnlikely = '';
				$nvcheckstatusLikely = '';
			}
			else if($nvGetdiagnosis == "Unlikely")
			{
				$nvcheckstatusUnlikely = 'checked="checked"';
				$nvcheckstatusPending = '';
				$nvcheckstatusLikely = '';
			}
			else
			{
				$nvcheckstatusUnlikely = '';
				$nvcheckstatusPending = '';
				$nvcheckstatusLikely = '';
			}
			
			$nvquestionwithcomment.='<div class="clinic-3-top">
                        	<div class="text-label">'.$nvQuestion.'</div>
                        </div>
                        <div class="clinic-3-form">
                        	
                            	<div class="form-row">
                                	<textarea class="textarea" id="postcomment" placeholder="A place to add comment on the evidence">'.$nvGetComment.'</textarea>
                                </div>
								
								
								<div class="form-row">
                                	<div class="row">
                                    	<div class="col-xs-12">
											<h3>Tick appropriate Clincian\'s Diagnosis</h3>
                                        	<div class="check-box-row">
												<div class="check-box black">
													<input id="r-1" type="radio" name="diagnosisrpq" value="Likely" '.$nvcheckstatusLikely.'>
													<label for="r-1">Likely</label>
												</div>
												<div class="check-box gray">
													<input id="r-2" type="radio" name="diagnosisrpq" value="Pending" '.$nvcheckstatusPending.'>
													<label for="r-2">Pending</label>
												</div>
												<div class="check-box white">
													<input id="r-3" type="radio" name="diagnosisrpq" value="Unlikely" '.$nvcheckstatusUnlikely.'>
													<label for="r-3">Unlikely</label>
												</div>
											</div>
                                        </div>
                                    </div>
                                </div>
								
                                <div class="form-row">
                                	<div class="row">
                                    	<div class="col-xs-12">
                                        	<a class="delete-btn delete-comment" href="javascript:void(0)" data-user="'.$postUserID.'" data-child="'.$postChildID.'" data-question="'.$postQuestionID.'"><img src="'.base_url("public/images/rubbish-bin-icon-outlined-2.svg").'" alt=""></a>
                                        	<a href="javascript:void(0)" data-user="'.$postUserID.'" data-child="'.$postChildID.'" data-question="'.$postQuestionID.'" class="submit-btn submit-comment"></a>
                                        </div>
                                    </div>
                                </div>
								
								
                            
                        </div>';
		}
		echo $nvquestionwithcomment;
	}
	
	public function capaparentcomment()
	{
		$postQuestionType = $_POST['questiontype'];
		$postUserID = $this->session->userdata('userid');
		$userrole = $this->session->userdata('role');
		if($userrole == "admin")
		{
			$postUserID = $this->session->userdata('nvuserid');
			$userrole = $this->session->userdata('nvrole');
		}
		$postChildID = $_POST['childID'];
		$postQuestionID = $_POST['questionID'];
		$postUserID = $_POST['userID'];
		
		$nvquestionwithcomment = "";
		if($postChildID > 0)
		{
			$nvQuestion = $this->Database->getName("questionnaires_master","question","que_id",$postQuestionID);
			$nvGetComment = $this->Database->getRecordSubAnsID("capa_red_main_answers","question_id",$postQuestionID,"user_id",$postUserID,"child_id",$postChildID,"clinician_comment");
			
			$nvGetdiagnosis = $this->Database->getRecordSubAnsID("capa_red_main_answers","question_id",$postQuestionID,"user_id",$postUserID,"child_id",$postChildID,"clinician_diagnosis");
			
			if($nvGetdiagnosis == "Likely")
			{
				$nvcheckstatusLikely = 'checked="checked"';
				$nvcheckstatusUnlikely = '';
				$nvcheckstatusPending = '';
			}
			else if($nvGetdiagnosis == "Pending")
			{
				$nvcheckstatusPending = 'checked="checked"';
				$nvcheckstatusUnlikely = '';
				$nvcheckstatusLikely = '';
			}
			else if($nvGetdiagnosis == "Unlikely")
			{
				$nvcheckstatusUnlikely = 'checked="checked"';
				$nvcheckstatusPending = '';
				$nvcheckstatusLikely = '';
			}
			else
			{
				$nvcheckstatusUnlikely = '';
				$nvcheckstatusPending = '';
				$nvcheckstatusLikely = '';
			}
			
			if($nvGetComment == "")
			{
				$nvGetComment = "";
			}
			else
			{
				$nvGetComment = $nvGetComment;
			}
			
			$nvquestionwithcomment.='<div class="clinic-3-top">
                        	<div class="text-label">'.$nvQuestion.'</div>
                        </div>
                        <div class="clinic-3-form">
                        	
                            	<div class="form-row">
                                	<textarea class="textarea" id="postcomment" placeholder="A place to add comment on the evidence">'.$nvGetComment.'</textarea>
                                </div>
								<div class="form-row">
                                	<div class="row">
                                    	<div class="col-xs-12">
											<h3>Tick appropriate Clincian\'s Diagnosis</h3>
                                        	<div class="check-box-row">
												<div class="check-box black">
													<input id="r-1" type="radio" name="diagnosis" value="Likely" '.$nvcheckstatusLikely.'>
													<label for="r-1">Likely</label>
												</div>
												<div class="check-box gray">
													<input id="r-2" type="radio" name="diagnosis" value="Pending" '.$nvcheckstatusPending.'>
													<label for="r-2">Pending</label>
												</div>
												<div class="check-box white">
													<input id="r-3" type="radio" name="diagnosis" value="Unlikely" '.$nvcheckstatusUnlikely.'>
													<label for="r-3">Unlikely</label>
												</div>
											</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                	<div class="row">
                                    	<div class="col-xs-12">
                                        	<a class="delete-btn delete-comment-capa" href="javascript:void(0)" data-user="'.$postUserID.'" data-child="'.$postChildID.'" data-question="'.$postQuestionID.'"><img src="'.base_url("public/images/rubbish-bin-icon-outlined-2.svg").'" alt=""></a>
                                        	<a href="javascript:void(0)" data-user="'.$postUserID.'" data-child="'.$postChildID.'" data-question="'.$postQuestionID.'" class="submit-btn submit-comment-capa"></a>
                                        </div>
                                    </div>
                                </div>
                            
                        </div>';
		}
		echo $nvquestionwithcomment;
	}
	
	
	public function objervationcomment()
	{
		$postQuestionID = $_POST['questionID'];
		$postUserID = $_POST['UserID'];
		$nvquestionwithcomment = "";
		if($postQuestionID != "")
		{
			$nvQuestion = $this->Database->getName("oberservational_survey","question","observation_id",$postQuestionID);
			$nvGetComment = $this->Database->getRecordTwoRowID("oberservational_answers","observation_id",$postQuestionID,"user_id",$postUserID,"observation_comment");
			if($nvGetComment == "")
			{
				$nvGetComment = "";
			}
			else
			{
				$nvGetComment = $nvGetComment;
			}
			
			$nvquestionwithcomment.='<div class="clinic-3-top">
                        	<div class="text-label">'.$nvQuestion.'</div>
                        </div>
                        <div class="clinic-3-form">
                        	
                            	<div class="form-row">
                                	<textarea class="textarea" id="postcomment" placeholder="A place to add comment on the evidence">'.$nvGetComment.'</textarea>
                                </div>
                                <div class="form-row">
                                	<div class="row">
                                    	<div class="col-xs-12">
                                        	<a class="delete-btn delete-comment-objervation" href="javascript:void(0)" data-user="'.$postUserID.'" data-question="'.$postQuestionID.'"><img src="'.base_url("public/images/rubbish-bin-icon-outlined-2.svg").'" alt=""></a>
                                        	<a href="javascript:void(0)" class="submit-btn submit-comment-objervation" data-user="'.$postUserID.'" data-question="'.$postQuestionID.'" ></a>
                                        </div>
                                    </div>
                                </div>
                            
                        </div>';
			
		}
		echo $nvquestionwithcomment;
	}

	
	public function savecomment()
	{
		$postcomment = $_POST['comment'];
		$postquestionID = $_POST['questionID'];
		$postchildID = $_POST['childID'];
		$postdiagnosis = $_POST['diagnosis'];
		$ClinicalUserID = $this->session->userdata('userid');
		$userrole = $this->session->userdata('role');
		if($userrole == "admin")
		{
			$ClinicalUserID = $this->session->userdata('nvuserid');
			$userrole = $this->session->userdata('nvrole');
		}
		$postUserID = $_POST['userID'];
		if($postchildID != "")
		{
			$nvcount = $this->Database->getRecordCount('parent_children_answers',"user_id",$postUserID,"child_id",$postchildID,'question_id',$postquestionID); 
			if($nvcount > 0)
			{
				$nvAnsID = $this->Database->getRecordSubAnsID('parent_children_answers',"user_id",$postUserID,"child_id",$postchildID,'question_id',$postquestionID,"ans_id"); 	
				
				$filed_value['clinician_comment']=$postcomment;
				$filed_value['clinician_diagnosis']=$postdiagnosis;
				$filed_value['clinician_id']=$ClinicalUserID;
				$update=$this->Database->updateRecord('parent_children_answers',$filed_value,'ans_id',$nvAnsID);
				if($update)
				{
					echo $nvAnsID;
				}
			}
			else
			{
				$data = array(
				   'clinician_comment' => $postcomment,
				   'clinician_id' => $ClinicalUserID,
				   'clinician_diagnosis' => $postdiagnosis,
				   'child_id'=>$postchildID,
				   'question_id'=>$postquestionID,
				   'user_id'=>$postUserID,
				);
				echo $this->Database->AddFunction('parent_children_answers',$data); //create user
			}
		}
	}
	
	public function savecommentobjervation()
	{
		$postcomment = $_POST['comment'];
		$postquestionID = $_POST['questionID'];
		$ClinicalUserID = $this->session->userdata('userid');
		$postUserID = $_POST['userID'];
		if($postquestionID > 0)
		{
			$nvcount = $this->Database->getRecordtwoRowCount('oberservational_answers',"user_id",$postUserID,'observation_id',$postquestionID); 
			if($nvcount > 0)
			{
				$nvAnsID = $this->Database->getRecordTwoRowID('oberservational_answers',"user_id",$postUserID,'observation_id',$postquestionID,"obersev_ans_id"); 	
				$filed_value['observation_comment']=$postcomment;
				$filed_value['clinician_id']=$ClinicalUserID;
				$update=$this->Database->updateRecord('oberservational_answers',$filed_value,'obersev_ans_id',$nvAnsID);
				if($update)
				{
					echo $nvAnsID;
				}
				
			}
			else
			{
				$data = array(
				   'observation_comment' => $postcomment,
				   'clinician_id' => $postUserID,
				   'observation_id'=>$postquestionID,
				   'user_id'=>$ClinicalUserID,
				);
				echo $this->Database->AddFunction('oberservational_answers',$data); //create user
				
			}
		}
	}
	
	public function savecommentcapa()
	{
		$postcomment = $_POST['comment'];
		$postquestionID = $_POST['questionID'];
		$postchildID = $_POST['childID'];
		$ClinicalUserID = $this->session->userdata('userid');
		$userrole = $this->session->userdata('role');
		$postdiagnosis = $_POST['diagnosis'];
		if($userrole == "admin")
		{
			$ClinicalUserID = $this->session->userdata('nvuserid');
			$userrole = $this->session->userdata('nvrole');
		}
		$postUserID = $_POST['userID'];
		if($postchildID != "")
		{
			$nvcount = $this->Database->getRecordCount('capa_red_main_answers',"user_id",$postUserID,"child_id",$postchildID,'question_id',$postquestionID); 
			if($nvcount > 0)
			{
				$nvAnsID = $this->Database->getRecordSubAnsID('capa_red_main_answers',"user_id",$postUserID,"child_id",$postchildID,'question_id',$postquestionID,"ans_id"); 	
				
				$filed_value['clinician_comment']=$postcomment;
				$filed_value['clinician_diagnosis']=$postdiagnosis;
				$filed_value['clinician_id']=$ClinicalUserID;
				$update=$this->Database->updateRecord('capa_red_main_answers',$filed_value,'ans_id',$nvAnsID);
				if($update)
				{
					echo $nvAnsID;
				}
			}
			else
			{
				$data = array(
				   'clinician_comment' => $postcomment,
				   'clinician_diagnosis' => $postdiagnosis,
				    'clinician_id' => $ClinicalUserID,
				   'child_id'=>$postchildID,
				   'question_id'=>$postquestionID,
				   'user_id'=>$postUserID,
				);
				echo $this->Database->AddFunction('capa_red_main_answers',$data); //create user
			}
		}
	}
	public function deletecommentobjervation()
	{
		$postcomment = $_POST['comment'];
		$postquestionID = $_POST['questionID'];
		$postUserID = $_POST['userID'];
		$ClinicalUserID = $this->session->userdata('userid');
		
		if($postUserID != "")
		{
			$nvcount = $this->Database->getRecordtwoRowCount('oberservational_answers',"user_id",$postUserID,'observation_id',$postquestionID); 			
			if($nvcount > 0)
			{
				$nvAnsID = $this->Database->getRecordTwoRowID('oberservational_answers',"user_id",$postUserID,'observation_id',$postquestionID,"obersev_ans_id");
				$filed_value['observation_comment']="";
				$filed_value['clinician_id']=$ClinicalUserID;
				$update=$this->Database->updateRecord('oberservational_answers',$filed_value,'obersev_ans_id',$nvAnsID);
				if($update)
				{
					echo $nvAnsID;
				}
				
			}
		}
		
	}
	public function deletecomment()
	{
		$postcomment = $_POST['comment'];
		$postquestionID = $_POST['questionID'];
		$postchildID = $_POST['childID'];
		$ClinicalUserID = $this->session->userdata('userid');
		$userrole = $this->session->userdata('role');
		if($userrole == "admin")
		{
			$ClinicalUserID = $this->session->userdata('nvuserid');
			$userrole = $this->session->userdata('nvrole');
		}
		$postUserID = $_POST['userID'];
		if($postchildID != "")
		{
			$nvcount = $this->Database->getRecordCount('parent_children_answers',"user_id",$postUserID,"child_id",$postchildID,'question_id',$postquestionID); 			if($nvcount > 0)
			{
				$nvAnsID = $this->Database->getRecordSubAnsID('parent_children_answers',"user_id",$postUserID,"child_id",$postchildID,'question_id',$postquestionID,"ans_id"); 	
				
				$filed_value['clinician_comment']=$postcomment;
				$filed_value['clinician_id']=$ClinicalUserID;
				$update=$this->Database->updateRecord('parent_children_answers',$filed_value,'ans_id',$nvAnsID);
				if($update)
				{
					echo $nvAnsID;
				}
			}
		}
	}
	
	public function deletecommentcapa()
	{
		$postcomment = $_POST['comment'];
		$postquestionID = $_POST['questionID'];
		$postchildID = $_POST['childID'];
		$ClinicalUserID = $this->session->userdata('userid');
		$userrole = $this->session->userdata('role');
		if($userrole == "admin")
		{
			$ClinicalUserID = $this->session->userdata('nvuserid');
			$userrole = $this->session->userdata('nvrole');
		}
		$postUserID = $_POST['userID'];
		if($postchildID != "")
		{
			$nvcount = $this->Database->getRecordCount('capa_red_main_answers',"user_id",$postUserID,"child_id",$postchildID,'question_id',$postquestionID); 			if($nvcount > 0)
			{
				$nvAnsID = $this->Database->getRecordSubAnsID('capa_red_main_answers',"user_id",$postUserID,"child_id",$postchildID,'question_id',$postquestionID,"ans_id"); 	
				
				$filed_value['clinician_comment']=$postcomment;
				$filed_value['clinician_id']=$ClinicalUserID;
				$update=$this->Database->updateRecord('capa_red_main_answers',$filed_value,'ans_id',$nvAnsID);
				if($update)
				{
					echo $nvAnsID;
				}
			}
		}
	}
	
	public function capaparentquestionwithdescription()
	{
		$nvCommentDesc = "";
		if(isset($_POST['questionID']))
		{
			$postQuestionID = $_POST['questionID'];
			$nvGetQuestion = $this->Database->getName("questionnaires_master","question","que_id",$postQuestionID);
			$nvGetQuestionDescription = $this->Database->getName("questionnaires_master","description","que_id",$postQuestionID);
			
			$nvCommentDesc.='<div class="clinic-4-top">
				<div class="text-title">
					<h3>CAPA-RAD:- '.$nvGetQuestion.'</h3>
					<h5>Glossary Description</h5>
				</div>
			</div>
			<div class="clinic-4-description">
				<p>'.$nvGetQuestionDescription.'</p>
			</div>';
		}
		echo $nvCommentDesc;
	}
	
}