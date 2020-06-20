<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teachers extends CI_Controller 
{
	function __construct()
    {
		parent::__construct();
		$this->load->library('session');
		$this->load->model('Database');
		
		if($this->session->userdata('role')=='admin')
		{
			if($this->session->userdata('nvrole')!='teacher')
			{
				redirect(base_url());
			}
		}
		else if($this->session->userdata('role')!='teacher')
		{
			redirect(base_url());
		}
    }
	public function index()
	{
		$header_data['PAGE_TITLE']="Teacher's Section";
		$this->load->view("header",$header_data);
		
		$userrole = $this->session->userdata('role');
		if($userrole == "admin")
		{
			$userrole = $this->session->userdata('nvrole');
			$nvUserID = $this->session->userdata('nvuserid');
		}
		else
		{
			$nvUserID = $this->session->userdata('userid');
		}
		
		$teacher_questions = $this->Database->getTblRecord("questions", array("question_type"=>$userrole,'status'=>'yes'));
		$child =$this->Database->getMyChild($nvUserID);
		$questions['teacher_question']=$teacher_questions;
		$return['CHILD_DATA']=$child;
		
		$masterQuestion=$this->Database->getAllRecord('questionnaires_master');
		$questions['masterquestions']=$masterQuestion;
		//$nvUserID = $this->session->userdata('userid');
		
		$this->load->view("tpl_teachers",$return);
		$this->load->view("modal",$questions);
		$this->load->view("footer");
	}
	
	
	public function master_teacher_question()
	{
		$nvUserID = $this->session->userdata('userid');
		$userrole = $this->session->userdata('role');
		if($userrole == "admin")
		{
			$nvUserID = $this->session->userdata('nvuserid');
			$userrole = $this->session->userdata('nvrole');
		}
		$masterQuestion=$this->Database->getAllRecord('questionnaires_master');
		$nvmodelslider = "";
		if(isset($_POST['childid']))
		{
			$nvmodelslider .='<div class="bxslider nvbxslider" id="master_question_insert">';
			foreach($masterQuestion as $val)
			{
				$nvQuestionID = $val->que_id;
				
				$nvmainAnswer = $this->Database->getRecordSubAnsID('capa_red_main_answers',"user_id",$nvUserID,"child_id",$_POST['childid'],'question_id',$nvQuestionID,"answer"); 
				if($nvmainAnswer == "no")
				{
					$nvnoactive = "active";
					$nvmayactive = "";
					$nvyesactive = "";
					
					$nvnoblockshow = 'style="display:block;"';
					$nvmaybeblockshow = "";
					$nvyesblockshow = "";
				}
				else if($nvmainAnswer == "maybe")
				{
					$nvnoactive = "";
					$nvmayactive = "active";
					$nvyesactive = "";
					
					$nvnoblockshow = "";
					$nvmaybeblockshow = 'style="display:block;"';
					$nvyesblockshow = "";
				}
				else if($nvmainAnswer == "yes")
				{
					$nvnoactive = "";
					$nvmayactive = "";
					$nvyesactive = "active";
					
					$nvnoblockshow = "";
					$nvmaybeblockshow = "";
					$nvyesblockshow = 'style="display:block;"';
				}
				else
				{
					$nvnoactive = "";
					$nvmayactive = "";
					$nvyesactive = "";
					
					$nvnoblockshow = "";
					$nvmaybeblockshow = "";
					$nvyesblockshow = "";
				}
				
				$nvmodelslider.='<!--capa-info-slide start-->
								<div class="capa-info-slide">
									<div class="capa-info-2-top">
										<div class="text">
											<p>'.$val->question.'</p>
										</div>
									</div>
									<input type="hidden" name="hidden_capa_userid" id="hidden_capa_userid" value="'.$nvUserID.'"/>
									<input type="hidden" name="hidden_capa_childid" id="hidden_capa_childid" value="'.$_POST['childid'].'"/>
									<input type="hidden" name="hidden_capa_main_ans_id" id="hidden_capa_main_ans_id" value=""/>
									
									<div class="capa-info-2-tab">
										<!--capa-tab start-->
										<div class="capa-tab">
											<ul class="clearfix">
												<li><a class="no mainansewer '.$nvnoactive.' '.$nvQuestionID.'" data-question="'.$nvQuestionID.'"  data-answer="no" href="#">No</a></li>
												<li><a class="maybe mainansewer '.$nvmayactive.' '.$nvQuestionID.'" data-question="'.$nvQuestionID.'" data-answer="maybe" href="#">Maybe</a></li>
												<li><a class="yes mainansewer '.$nvyesactive.' '.$nvQuestionID.'" data-question="'.$nvQuestionID.'" data-answer="yes" href="#">Yes</a></li>
											</ul>
										</div>
										<!--capa-tab end-->
										<!--capa-tab-content start-->
										<div class="capa-tab-content">';
											
											
											$questionnaires_probes=$this->Database->getSubQuestions('questionnaires_probes','que_id',$nvQuestionID);
											
											$nvmodelslider.='<!--capa-tab-panel start-->
											<div class="capa-tab-panel no" '.$nvnoblockshow.'>
												<a class="close-btn" href="#"></a>
												<div class="tab-box-1">';
												if($questionnaires_probes == "No Value")
												{
													
													$nvmodelslider.='<div class="box-text">
														<p>No Record Found</p>
													</div>';
												}
												else
												{
													$qusno=1;
													foreach($questionnaires_probes as $noqus)
													{
														$nvprobID = $noqus->probes_id;
														if($nvmainAnswer == "no")
														{
															$nvNoAnswerCount = $this->Database->getRecordCount('capa_red_probes_answers',"user_id",$nvUserID,"child_id",$_POST['childid'],'probes_id',$nvprobID); 
															if($nvNoAnswerCount > 0)
															{
																$nvNoSubAnswer = $this->Database->getRecordSubAnsID('capa_red_probes_answers',"user_id",$nvUserID,"child_id",$_POST['childid'],'probes_id',$nvprobID,"answer"); 
																if($nvNoSubAnswer == "yes")
																{
																	$nvSubYesactive = "active";
																	$nvSubNoactive = "";
																}
																else
																{
																	$nvSubYesactive = "";
																	$nvSubNoactive = "active";
																}
																
																$nvmodelslider.='
																<div class="box-title"><h3>Probel '.$qusno.'</h3></div>
																<div class="box-text">
																	<p>'.$noqus->question.'</p>
																	<ul class="probyesno">
																		<li><a class="yesnoprob '.$nvSubYesactive.'" data-mainquestion="'.$nvQuestionID.'" data-probid="'.$noqus->probes_id.'" data-ans="yes" href="javascript:void(0)">Yes</a></li>
																		<li><a class="yesnoprob '.$nvSubNoactive.'" data-mainquestion="'.$nvQuestionID.'" data-probid="'.$noqus->probes_id.'" data-ans="no"  href="javascript:void(0)">No</a></li>
																	</ul>
																</div>';
															}
															else
															{
																$nvmodelslider.='
																<div class="box-title"><h3>Probel '.$qusno.'</h3></div>
																<div class="box-text">
																	<p>'.$noqus->question.'</p>
																	<ul class="probyesno">
																		<li><a class="yesnoprob" data-mainquestion="'.$nvQuestionID.'" data-probid="'.$noqus->probes_id.'" data-ans="yes" href="javascript:void(0)">Yes</a></li>
																		<li><a class="yesnoprob" data-mainquestion="'.$nvQuestionID.'" data-probid="'.$noqus->probes_id.'" data-ans="no"  href="javascript:void(0)">No</a></li>
																	</ul>
																</div>';
															}
															
														}
														else
														{
															$nvmodelslider.='
															<div class="box-title"><h3>Probel '.$qusno.'</h3></div>
															<div class="box-text">
																<p>'.$noqus->question.'</p>
																<ul class="probyesno">
																	<li><a class="yesnoprob" data-mainquestion="'.$nvQuestionID.'" data-probid="'.$noqus->probes_id.'" data-ans="yes" href="javascript:void(0)">Yes</a></li>
																	<li><a class="yesnoprob" data-mainquestion="'.$nvQuestionID.'" data-probid="'.$noqus->probes_id.'" data-ans="no"  href="javascript:void(0)">No</a></li>
																</ul>
															</div>';
														}
														
														$qusno++;	
													}
												}
												
												
											$nvmodelslider.='</div></div>
											<!--capa-tab-panel end-->
											
											
											<!--capa-tab-panel start-->
											<div class="capa-tab-panel maybe " '.$nvmaybeblockshow.'>
												<a class="close-btn" href="#"></a>
												<div class="tab-box-2">
													<div class="question-form">';
														$questionnaires_extras=$this->Database->getSubQuestions('questionnaires_extras','que_id',$nvQuestionID);
														$questionnaires_extras_count=$this->Database->getSubQuestionsCount('questionnaires_extras','que_id',$nvQuestionID);
														if($questionnaires_extras_count > 0)
														{
															$qusmaybe = 1;
															foreach($questionnaires_extras as $maybe)
															{
																$nvExtraQuestionID = $maybe->extra_id;
																if($qusmaybe ==1)
																{
																	$nvmodelslider.='<form name="" id="frm'.$nvQuestionID.'" method="post">';
																}
																
																if($nvmainAnswer == "maybe")
																{
																	$nvExtraAnswerCount = $this->Database->getRecordCount('capa_red_extras_answers',"user_id",$nvUserID,"child_id",$_POST['childid'],'extra_qus_id',$nvExtraQuestionID); 
																	if($nvExtraAnswerCount > 0)
																	{
																		$nvExtraSubAnswer = $this->Database->getRecordSubAnsID('capa_red_extras_answers',"user_id",$nvUserID,"child_id",$_POST['childid'],'extra_qus_id',$nvExtraQuestionID,"answer"); 		
																		$nvmodelslider.='<div class="form-row">
																			<label>'.$maybe->question.'</label>
																			<textarea class="textarea" data-mainquestion="'.$nvQuestionID.'" data-maybeid="'.$maybe->extra_id.'" name="maybe_ans_'.$qusmaybe.'" id="maybe_ans_'.$qusmaybe.'" placeholder="Answer would go here">'.$nvExtraSubAnswer.'</textarea>
																			<input type="hidden" name="hidden_maybe_que_'.$qusmaybe.'" id="hidden_maybe_que_'.$qusmaybe.'" value="'.$maybe->extra_id.'">
																			<input type="hidden" name="hidden_main_question_'.$qusmaybe.'" id="hidden_main_question_'.$qusmaybe.'" value="'.$nvQuestionID.'">
																			
																		</div>';
																	}
																	else
																	{
																		$nvmodelslider.='<div class="form-row">
																			<label>'.$maybe->question.'</label>
																			<textarea class="textarea" data-mainquestion="'.$nvQuestionID.'" data-maybeid="'.$maybe->extra_id.'" name="maybe_ans_'.$qusmaybe.'" id="maybe_ans_'.$qusmaybe.'" placeholder="Answer would go here"></textarea>
																			<input type="hidden" name="hidden_maybe_que_'.$qusmaybe.'" id="hidden_maybe_que_'.$qusmaybe.'" value="'.$maybe->extra_id.'">
																			<input type="hidden" name="hidden_main_question_'.$qusmaybe.'" id="hidden_main_question_'.$qusmaybe.'" value="'.$nvQuestionID.'">
																			
																		</div>';
																	}
																	
																}
																else
																{
																	$nvmodelslider.='<div class="form-row">
																		<label>'.$maybe->question.'</label>
																		<textarea class="textarea" data-mainquestion="'.$nvQuestionID.'" data-maybeid="'.$maybe->extra_id.'" name="maybe_ans_'.$qusmaybe.'" id="maybe_ans_'.$qusmaybe.'" placeholder="Answer would go here"></textarea>
																		<input type="hidden" name="hidden_maybe_que_'.$qusmaybe.'" id="hidden_maybe_que_'.$qusmaybe.'" value="'.$maybe->extra_id.'">
																		<input type="hidden" name="hidden_main_question_'.$qusmaybe.'" id="hidden_main_question_'.$qusmaybe.'" value="'.$nvQuestionID.'">
																		
																	</div>';	
																}
																
																if($qusmaybe == $questionnaires_extras_count)
																{
																	$nvmodelslider.='
																	<div class="form-row text-center">
																		<input class="submit-btn maybe_submit" id="'.$nvQuestionID.'" type="submit" value="Submit">
																	</div>
																	</form>';
																}
																$qusmaybe++;
															}
														}
														else
														{
															$nvmodelslider.='<p>No Record Found...</p>';
														}
													$nvmodelslider.='</div>
												</div>
											</div>
											<!--capa-tab-panel end-->';
											
											if($nvmainAnswer == "yes")
											{
												$nvYesAnswer = $this->Database->getRecordCount('capa_red_yes_answers',"user_id",$nvUserID,"child_id",$_POST['childid'],'main_ques_id',$nvQuestionID); 
												if($nvYesAnswer > 0)
												{
													$nvYesSubAnswer = $this->Database->getRecordSubAnsID('capa_red_yes_answers',"user_id",$nvUserID,"child_id",$_POST['childid'],'main_ques_id',$nvQuestionID,"comment"); 		
													$nvmodelslider .='<!--capa-tab-panel start-->
													<div class="capa-tab-panel yes" '.$nvyesblockshow.'>
														<a class="close-btn" href="#"></a>
														<div class="tab-box-3">
															<div class="box-title"><h3>Comments</h3></div>
															<div class="comment-box">
																<!--<div class="comment-area">-->
																<textarea name="yescomment" class="yescomment" data-comment="'.$nvQuestionID.'" placeholder="please write an example of when this behaviour happens." id="cmt_'.$nvQuestionID.'">'.$nvYesSubAnswer.'</textarea>
																<div class="form-row text-center">
																	<input class="submit-btn-yes cmtsubmit" id="'.$nvQuestionID.'" type="submit" value="Submit">
																</div>
																 <!--</div>-->
															</div>
														</div>
													</div>
													<!--capa-tab-panel end-->';
												}
												else
												{
													$nvmodelslider .='<!--capa-tab-panel start-->
													<div class="capa-tab-panel yes" '.$nvyesblockshow.'>
														<a class="close-btn" href="#"></a>
														<div class="tab-box-3">
															<div class="box-title"><h3>Comments</h3></div>
															<div class="comment-box">
																<!--<div class="comment-area">-->
																<textarea name="yescomment" class="yescomment" data-comment="'.$nvQuestionID.'" placeholder="please write an example of when this behaviour happens." id="cmt_'.$nvQuestionID.'"></textarea>
																<div class="form-row text-center">
																	<input class="submit-btn-yes cmtsubmit" id="'.$nvQuestionID.'" type="submit" value="Submit">
																</div>
																 <!--</div>-->
															</div>
														</div>
													</div>
													<!--capa-tab-panel end-->';
												}
												
												
											}
											else
											{
												$nvmodelslider .='<!--capa-tab-panel start-->
												<div class="capa-tab-panel yes" '.$nvyesblockshow.'>
													<a class="close-btn" href="#"></a>
													<div class="tab-box-3">
														<div class="box-title"><h3>Comments</h3></div>
														<div class="comment-box">
															<!--<div class="comment-area">-->
															<textarea name="yescomment" class="yescomment" data-comment="'.$nvQuestionID.'" placeholder="This is the space that is used as an example for this question." id="cmt_'.$nvQuestionID.'"></textarea>
															<div class="form-row text-center">
																<input class="submit-btn-yes cmtsubmit" id="'.$nvQuestionID.'" type="submit" value="Submit">
															</div>
															 <!--</div>-->
														</div>
													</div>
												</div>
												<!--capa-tab-panel end-->';
											}
											
											
										$nvmodelslider .='</div>
										<!--capa-tab-content end-->
									</div>
								</div>
								<!--capa-info-slide end-->';
			}
			$nvmodelslider .='</div>';
		}
		echo $nvmodelslider;
	}
	
	
	public function question_teacher()
	{
		$nvuserID = $this->session->userdata('userid');
		$userrole = $this->session->userdata('role');
		$nvroles = $userrole;
		if($userrole == "admin")
		{
			$nvuserID = $this->session->userdata('nvuserid');
			$userrole = $this->session->userdata('nvrole');
			
			$nvroles = "teacher";
		}
		
		
		if($_POST['userrole'])
		{
			$questions = $this->Database->getTblRecord("questions", array("question_type"=>$nvroles,'status'=>'yes'));
			//$nvMaxID = $this->Database->getMaxID("parent_children_answers","question_id","child_id",$_POST['childid'],'user_id',$nvuserID);
			
			$return = "";
			if(!empty($questions))
			{
				
				$return .= '<input type="hidden" name="txtchildren_id" id="txtchildren_id" value="'.$_POST['childid'].'"/>';
				$return .= '<input type="hidden" name="user_role" id="user_role" value="'.$userrole.'"/>';
                $return .= '<input type="hidden" name="txtuser_id" id="txtuser_id" value="'.$nvuserID.'"/>';

				$return .='<div class="bxslider" id="question_insert">';
				$childrenname = $this->Database->getName("children","name","id",$_POST['childid']);
				$ans_first = 1;
				$ans_second = 2;
				$ans_third = 3;
				$ans_fourth = 4;
				$radioans = 1;
				foreach($questions as $key=>$val)
				{
					$nvQuestion = $val->question;
					$nvQuestionID = $val->question_id;
					
					$nvAnswer = $this->Database->getRecordSubAnsID('parent_children_answers',"user_id",$nvuserID,"child_id",$_POST['childid'],'question_id',$nvQuestionID,"answer"); 
					if($nvAnswer == 1)
					{
						$firstans = 'checked="checked"';
						$secondans = "";
						$thirdans = "";
						$fourthans = "";
					}
					else if($nvAnswer == 2)
					{
						$firstans = "";
						$secondans = 'checked="checked"';
						$thirdans = "";
						$fourthans = "";
					}
					else if($nvAnswer == 3)
					{
						$firstans = "";
						$secondans = "";
						$thirdans = 'checked="checked"';
						$fourthans = "";
					}
					else if($nvAnswer == 4)
					{
						$firstans = "";
						$secondans = "";
						$thirdans = "";
						$fourthans = 'checked="checked"';
					}
					else
					{
						$firstans = "";
						$secondans = "";
						$thirdans = "";
						$fourthans = "";
					}
					
					$return .= '<div class="rpq-info-slide slide">
                                <!--<div class="rpq-info-2-top">
                                	<div class="text-title">
                                    	<p>Relationship problem Questionnaire</p>
                                        <span>'.$userrole.'</span>
                                    </div>
                                    <div class="text">
                                    	<p>Please tick the statement that best describes <i>'.$childrenname.'</i></p>
                                    </div>
                                </div>-->
                                <div class="rpq-info-2-question">
                                	<p>'.$nvQuestion.'</p>
                                    <div class="radio-btn">
                                        <input id="rpq-radio-'.$ans_first.'" class="selanswer" data-question="'.$nvQuestionID.'" type="radio" name="answer'.$radioans.'" value="1" '.$firstans.'>
                                        <label for="rpq-radio-'.$ans_first.'">Exactly like '.$childrenname.'</label>
                                    </div>
                                    <div class="radio-btn">
                                        <input id="rpq-radio-'.$ans_second.'" class="selanswer" data-question="'.$nvQuestionID.'" type="radio" name="answer'.$radioans.'" value="2" '.$secondans.'>
                                        <label for="rpq-radio-'.$ans_second.'">Like '.$childrenname.'</label>
                                    </div>
                                    <div class="radio-btn">
                                        <input id="rpq-radio-'.$ans_third.'" class="selanswer" data-question="'.$nvQuestionID.'" type="radio" name="answer'.$radioans.'" value="3" '.$thirdans.'>
                                        <label for="rpq-radio-'.$ans_third.'">A bit like '.$childrenname.'</label>
                                    </div>
                                    <div class="radio-btn">
                                        <input id="rpq-radio-'.$ans_fourth.'" class="selanswer" data-question="'.$nvQuestionID.'" type="radio" name="answer'.$radioans.'" value="4" '.$fourthans.'>
                                        <label for="rpq-radio-'.$ans_fourth.'">Not at all like</label>
                                    </div>
                                </div>
                            </div>';
				$radioans++;			
				$ans_first = $ans_fourth+1;
				$ans_second = $ans_first+1;
				$ans_third = $ans_second+1;
				$ans_fourth = $ans_third+1;
				}
				$return .='</div>';
			}
			else
			{
				$return.='<div class="bxslider" id="question_insert"></div>';
			}
			echo $return;
		}
	}
	
	public function teacher_answer()
	{
		$nvuserID = $this->session->userdata('userid');
		$userrole = $this->session->userdata('role');
		if($userrole == "admin")
		{
			$userrole = $this->session->userdata('nvrole');
			$nvuserID = $this->session->userdata('nvuserid');
		}
		if(isset($_POST['answer']))
		{
			$nvAnswer = $_POST['answer'];
			$nvQuestionID = $_POST['questionID'];
			$nvChildren_id = $_POST['txtchildren_id'];
			$nvcount = $this->Database->getRecordCount('parent_children_answers',"user_id",$nvuserID,"child_id",$nvChildren_id,'question_id',$nvQuestionID); //create user
			if($nvcount > 0)
			{
				$nvAnsID = $this->Database->getRecordSubAnsID('parent_children_answers',"user_id",$nvuserID,"child_id",$nvChildren_id,'question_id',$nvQuestionID,"ans_id"); 
				$filed_value['answer']=$nvAnswer;
				$update=$this->Database->updateRecord('parent_children_answers',$filed_value,'ans_id',$nvAnsID);
				if($update)
				{
					echo $nvAnsID;
				}		
				
			}
			else
			{
				$data = array(
				   'answer' => $nvAnswer,
				   'question_id' => $nvQuestionID,
				   'child_id'=>$nvChildren_id,
				   'user_id'=>$nvuserID,
				);
				echo $this->Database->AddFunction('parent_children_answers',$data); //create user
			}
			
		}
	}
	
	public function teacher_main_ans()
	{
		$nvuserID = $this->session->userdata('userid');
		$userrole = $this->session->userdata('role');
		if($userrole == "admin")
		{
			$nvuserID = $this->session->userdata('nvuserid');
			$userrole = $this->session->userdata('nvrole');
		}
		$nvChildID = $_POST['ChildID'];
		$nvQuestionID = $_POST['QuestionID'];
		$nvpostAns = $_POST['MainAns'];
		$nvcount = $this->Database->getRecordCount('capa_red_main_answers',"user_id",$nvuserID,"child_id",$nvChildID,'question_id',$nvQuestionID); //create user
		if($nvcount > 0)
		{
			$nvAnsID = $this->Database->getRecordAnsID('capa_red_main_answers',"user_id",$nvuserID,"child_id",$nvChildID,'question_id',$nvQuestionID); 		
			
			$filed_value['answer']=$nvpostAns;
			$update=$this->Database->updateRecord('capa_red_main_answers',$filed_value,'ans_id',$nvAnsID);
			if($update)
			{
				echo $nvAnsID;
			}
		}
		else
		{
			if(isset($_POST['MainAns']))
			{
				$data = array(
				   'child_id' => $nvChildID,
				   'user_id' => $nvuserID,
				   'question_id'=>$_POST['QuestionID'],
				   'answer'=>$_POST['MainAns'],
				);
				echo $this->Database->AddFunction('capa_red_main_answers',$data); //create user	
			}
		}
		
	}	
	
	// prob ans start
	public function teacher_prob_ans()
	{
		$postMainqustionID = $_POST['mainqustionid'];
		$postProbID = $_POST['probid'];
		$postAnswer = $_POST['answer'];
		$nvChildID = $_POST['hidden_capa_childid'];
		$nvuserID = $this->session->userdata('userid');
		$userrole = $this->session->userdata('role');
		if($userrole == "admin")
		{
			$nvuserID = $this->session->userdata('nvuserid');
			$userrole = $this->session->userdata('nvrole');
		}
		
		$nvcount = $this->Database->getRecordCount('capa_red_probes_answers',"user_id",$nvuserID,"child_id",$nvChildID,'probes_id',$postProbID); //create user
		if($nvcount > 0)
		{
			$nvAnsID = $this->Database->getRecordSubAnsID('capa_red_probes_answers',"user_id",$nvuserID,"child_id",$nvChildID,'probes_id',$postProbID,"prob_ans_id"); 		
			$filed_value['answer']=$postAnswer;
			$update=$this->Database->updateRecord('capa_red_probes_answers',$filed_value,'prob_ans_id',$nvAnsID);
			if($update)
			{
				echo $nvAnsID;
			}
		}
		else
		{
			if(isset($_POST['probid']))
			{
				$data = array(
				   'child_id' => $nvChildID,
				   'user_id' => $nvuserID,
				   'main_ques_id'=>$postMainqustionID,
				   'answer'=>$postAnswer,
				   'probes_id'=>$postProbID,
				);	
				echo $this->Database->AddFunction('capa_red_probes_answers',$data); //create user	
			}
		}
	}
	// prob ans end
	
	
	//teacher_extra_ans ans start here
	public function teacher_extra_ans()
	{
		$nvChildID = $_POST['hidden_capa_childid'];
		
		$nvuserID = $this->session->userdata('userid');
		$userrole = $this->session->userdata('role');
		if($userrole == "admin")
		{
			$nvuserID = $this->session->userdata('nvuserid');
			$userrole = $this->session->userdata('nvrole');
		}
		$nvCountpost = count($_POST)-1;
		$FinalCountpost = ($nvCountpost)/3;
		for($i=1;$i<=$FinalCountpost;$i++)
		{
			$nvans = $_POST["maybe_ans_".$i];
			$nvSubQus = $_POST['hidden_maybe_que_'.$i];
			$nvMainQus = $_POST['hidden_main_question_'.$i];
			$nvcount = $this->Database->getRecordCount('capa_red_extras_answers',"user_id",$nvuserID,"child_id",$nvChildID,'extra_qus_id',$nvSubQus); //create user			
			if($nvcount > 0)
			{
				$nvAnsID = $this->Database->getRecordSubAnsID('capa_red_extras_answers',"user_id",$nvuserID,"child_id",$nvChildID,'extra_qus_id',$nvSubQus,"extra_ans_id"); 
				$filed_value['answer']=$nvans;
				$update=$this->Database->updateRecord('capa_red_extras_answers',$filed_value,'extra_ans_id',$nvAnsID);
				if($update)
				{
					echo $nvAnsID;
				}
						
			}
			else
			{
				$data = array(
				   'child_id' => $nvChildID,
				   'user_id' => $nvuserID,
				   'main_ques_id'=>$nvMainQus,
				   'answer' =>$nvans,
				   'extra_qus_id'=>$nvSubQus,
				);
				echo $this->Database->AddFunction('capa_red_extras_answers',$data); //create user		
			}
		}
	}
	//teacher_extra_ans ans End here	
	public function teacher_yes_comment()
	{
		$nvChildID = $_POST['hidden_capa_childid'];
		$nvuserID = $this->session->userdata('userid');
		$userrole = $this->session->userdata('role');
		if($userrole == "admin")
		{
			$nvuserID = $this->session->userdata('nvuserid');
			$userrole = $this->session->userdata('nvrole');
		}
		$postComment = $_POST['comment'];
		$postMainquestionID = $_POST['mainquestionID'];
		$nvcount = $this->Database->getRecordCount('capa_red_yes_answers',"user_id",$nvuserID,"child_id",$nvChildID,'main_ques_id',$postMainquestionID);
		if($nvcount)
		{
			$nvAnsID = $this->Database->getRecordSubAnsID('capa_red_yes_answers',"user_id",$nvuserID,"child_id",$nvChildID,'main_ques_id',$postMainquestionID,"yes_ans_id"); 
			$filed_value['comment']=$postComment;
			$update=$this->Database->updateRecord('capa_red_yes_answers',$filed_value,'yes_ans_id',$nvAnsID);
			if($update)
			{
				echo $nvAnsID;
			}
		}
		else
		{
			$data = array(
				   'child_id' => $nvChildID,
				   'user_id' => $nvuserID,
				   'main_ques_id'=>$postMainquestionID,
				   'comment' =>$postComment,
				);
				echo $this->Database->AddFunction('capa_red_yes_answers',$data); //create user		
		}
					
	}
	
	
	
}