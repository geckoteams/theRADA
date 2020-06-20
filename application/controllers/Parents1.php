<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Parents extends CI_Controller 
{
	function __construct()
    {
		parent::__construct();
		$this->load->library('session');
		$this->load->model('Database');
		if($this->session->userdata('role')!='parent')
		{
			redirect(base_url());
		}
    }
	
	
	public function index()
	{
		$header_data['PAGE_TITLE']="Parent's Section";
		$this->load->view("header",$header_data);
		
		$userrole = $this->session->userdata('role');
		$teacher_questions = $this->Database->getTblRecord("questions", array("question_type"=>$userrole,'status'=>'yes'));
		$child =$this->Database->getMyChild($this->session->userdata('userid'));
		$nvUsername = $this->Database->getName("users","name","user_id",$this->session->userdata('userid'));
		$masterQuestion=$this->Database->getAllRecord('questionnaires_master');
		$questions['masterquestions']=$masterQuestion;
		$nvUserID = $this->session->userdata('userid');
		
		
		
		$return['nvUsername']=$nvUsername;
		$questions['teacher_question']=$teacher_questions;
		$return['CHILD_DATA']=$child;
		$this->load->view("tpl_parents",$return);
		$this->load->view("modal",$questions);
		$this->load->view("footer");
	}
	

	public function master_parent_questionsdd()
	{
		$nvUserID = $this->session->userdata('userid');
		$userrole = $this->session->userdata('role');
		$masterQuestion=$this->Database->getAllRecord('questionnaires_master');
		$nvmodelslider = "";

		if(isset($_POST['childid']))
		{
	  		$childrenname = $this->Database->getName("children","name","id",$_POST['childid']);
		 	$nvmodelslider .='<div class="bxslider nvbxslider" id="master_question_insert">';
			foreach($masterQuestion as $val)
			{
				$nvmodelslider.='<!--capa-info-slide start-->
								<div class="capa-info-slide">
									<div class="capa-info-2-top">
										<div class="text">
											<!-- p>'.$val->question_heading.' <span class="infoque">?<span class="qtitle">'.$val->question_heading.'</span><span class="qdetails">'.$val->description.'</span></span></p -->
											<!--- Sub Slider --->';
				$get_Ques = $this->Database->getSubQuestions('questionnaires_probes','que_id',$val->qua_id);
					


							$nvmodelslider.='<!--- Sub Slider --->

										</div>
									</div>
								</div>';
									
									
									/*<input type="hidden" name="hidden_capa_userid" id="hidden_capa_userid" value="'.$nvUserID.'"/>
									<input type="hidden" name="hidden_capa_childid" id="hidden_capa_childid" value="'.$_POST['childid'].'"/>
									<input type="hidden" name="hidden_capa_main_ans_id" id="hidden_capa_main_ans_id" value=""/>
									
										<div class="capa-info-2-tab">
										<!--capa-tab start-->
										<div class="capa-tab">
											<ul class="clearfix">
												<li><a class="no mainansewerparent '.$nvnoactive.' '.$nvQuestionID.'" data-question="'.$nvQuestionID.'"  data-answer="no" href="#">No</a></li>
												<li><a class="maybe mainansewerparent '.$nvmayactive.' '.$nvQuestionID.'" data-question="'.$nvQuestionID.'" data-answer="maybe" href="#">Maybe</a></li>
												<li><a class="yes mainansewerparent '.$nvyesactive.' '.$nvQuestionID.'" data-question="'.$nvQuestionID.'" data-answer="yes" href="#">Yes</a></li>
											</ul>
										</div>
										<!--capa-tab end-->
										<!--capa-tab-content start-->
										<div class="capa-tab-content">';
											
											$nvmodelslider.='<div class="capa-tab-panel" '.$commentboxnew.' id="main_qus_'.$nvQuestionID.'">
											<a class="close-btn" href="#" title="Close"></a>
											<div class="tab-box-3">
												<div class="box-title"><h3>Comments</h3></div>
												<div class="comment-box">
													<textarea name="yescommentmainquestion" class="yescomment yescommentmainquestion" id="comment_main_qus_'.$nvQuestionID.'" placeholder="please write an example of when this behaviour happens." id="yescommentmainquestion">'.$nvcapayescomment.'</textarea>
													<div class="form-row text-center">
														<a href="javascript:void(0)" class="submit-btn-yes submitansmaincomment" data-child="'.$_POST['childid'].'" data-mainqus="'.$nvQuestionID.'" title="Submit Comment"></a>
													</div>
												</div>
											</div>
										</div>';  */
			}
		  	$nvmodelslider .='</div>';
		}

		echo $nvmodelslider;
	}

	public function master_parent_questions()
	{
		
		$nvUserID = $this->session->userdata('userid');
		$userrole = $this->session->userdata('role');
		$masterQuestion=$this->Database->getAllRecord('questionnaires_master');

		$nvmodelslider = "";
		if(isset($_POST['childid'])) 
		{
			$childrenname = $this->Database->getName("children","name","id",$_POST['childid']);
			$childage = $this->Database->getAge("children","id",$_POST['childid']);
			$nvmodelslider .='<div class="bxslider nvbxslider" id="master_question_insert">';
			foreach($masterQuestion as $val)
			{
				$nvQuestionID = $val->que_id;
				$nvmainAnswer = $this->Database->getRecordSubAnsID('capa_red_main_answers',"user_id",$nvUserID,"child_id",$_POST['childid'],'question_id',$nvQuestionID,"answer");
				$nvcapayescomment = $this->Database->getRecordSubAnsID('capa_red_main_answers',"user_id",$nvUserID,"child_id",$_POST['childid'],'question_id',$nvQuestionID,"parent_comment"); 
				if($nvmainAnswer == "no")
				{
					$nvnoactive = "active";
					$nvmayactive = "";
					$nvyesactive = "";
					$nvyes2active ="";
					
					$nvnoblockshow = 'style="display:block;"';
					$nvmaybeblockshow = "";
					$nvyesblockshow = "";
					$commentboxnew = 'style="display:none;"';
				}
				else if($nvmainAnswer == "maybe")
				{
					$nvnoactive = "";
					$nvmayactive = "active";
					$nvyesactive = "";
					$nvyes2active ="";
				
					$nvnoblockshow = "";
					$nvmaybeblockshow = 'style="display:block;"';
					$nvyesblockshow = "";
					
					$commentboxnew = 'style="display:none;"';
				}
				else if($nvmainAnswer == "yes")
				{
					$nvnoactive = "";
					$nvmayactive = "";
					$nvyesactive = "active";
					$nvyes2active ="";
					
					$nvnoblockshow = "";
					$nvmaybeblockshow = "";
					$nvyesblockshow = 'style="display:block;"';
					$commentboxnew = 'style="display:block;"';
				}
				else if($nvmainAnswer == "yes2")
				{
					$nvnoactive = "";
					$nvmayactive = "";
					$nvyesactive = "";
					$nvyes2active ="active";
					
					$nvnoblockshow = "";
					$nvmaybeblockshow = "";
					$nvyesblockshow = 'style="display:block;"';
					$commentboxnew = 'style="display:block;"';
				}
				else
				{
					$nvnoactive = "";
					$nvmayactive = "";
					$nvyesactive = "";
					$nvyes2active ="";
					
					$nvnoblockshow = "";
					$nvmaybeblockshow = "";
					$nvyesblockshow = "";
					$commentboxnew = 'style="display:none;"';
				}

				if($val->que_id==6)
				{
					if($childage<=12)
					{
						$nvorgquestion='If you are in a new place, does X tend to wander away from you?';
					}
					else
					{
						$nvorgquestion='Do you feel that s/he is acting too independent for his/her age?';
					}
				}
				else
				{
					$nvorgquestion = $val->question;
				}
				$nvputquestion = str_replace("X",$childrenname,$nvorgquestion);
				$nvputquestion = str_replace("[child’s first name]",$childrenname,$nvputquestion);
				
				//str_replace("world","Peter","Hello world!");
				$nvmodelslider.='<!--capa-info-slide start-->
								<div class="capa-info-slide">
									<div class="capa-info-2-top">
										<div class="text">

											<!-- p>'.$val->question_heading.' <span class="infoque">?<span class="qtitle">'.$val->question_heading.'</span><span class="qdetails">'.$val->description.'</span></span></p -->
											<p>'.$nvputquestion.'</p>
										</div>
									</div>
									<input type="hidden" name="hidden_capa_userid" id="hidden_capa_userid" value="'.$nvUserID.'"/>
									<input type="hidden" name="hidden_capa_childid" id="hidden_capa_childid" value="'.$_POST['childid'].'"/>
									<input type="hidden" name="hidden_capa_main_ans_id" id="hidden_capa_main_ans_id" value=""/>
									
									<div class="capa-info-2-tab">
										<!--capa-tab start-->
										<div class="capa-tab">
											<ul class="clearfix">
												<li><a class="no mainansewerparent '.$nvnoactive.' '.$nvQuestionID.'" data-question="'.$nvQuestionID.'"  data-answer="no" href="#">No</a></li>
												<li><a class="maybe mainansewerparent '.$nvmayactive.' '.$nvQuestionID.'" data-question="'.$nvQuestionID.'" data-answer="maybe" href="#">Unsure</a></li>
												<li><a class="yes mainansewerparent '.$nvyesactive.' '.$nvQuestionID.'" data-question="'.$nvQuestionID.'" data-answer="yes" href="#">A Little</a></li>
												<li><a class="yes mainansewerparent '.$nvyes2active.' '.$nvQuestionID.'" data-question="'.$nvQuestionID.'" data-answer="yes2" href="#">A Lot</a></li>
											</ul>
										</div>
										<!--capa-tab end-->
										<!--capa-tab-content start-->
										<div class="capa-tab-content">';
											
											$nvmodelslider.='<div class="capa-tab-panel" '.$commentboxnew.' id="main_qus_'.$nvQuestionID.'">
											<a class="close-btn" href="#" title="Close"></a>
											<div class="tab-box-3">
												<div class="box-title"><h3>Comments</h3></div>
												<div class="comment-box">
													<textarea name="yescommentmainquestion" class="yescomment yescommentmainquestion" id="comment_main_qus_'.$nvQuestionID.'" placeholder="please write an example of when this behaviour happens." id="yescommentmainquestion">'.$nvcapayescomment.'</textarea>
													<div class="form-row text-center">
														<a href="javascript:void(0)" class="submit-btn-yes submitansmaincomment" data-child="'.$_POST['childid'].'" data-mainqus="'.$nvQuestionID.'" title="Submit Comment"></a>
													</div>
												</div>
											</div>
										</div>';
											$questionnaires_probes=$this->Database->getSubQuestions('questionnaires_probes','que_id',$nvQuestionID);
											
											/*$nvmodelslider.='<!--capa-tab-panel start-->
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
																		<li><a class="yesnoprobparent '.$nvSubYesactive.'" data-mainquestion="'.$nvQuestionID.'" data-probid="'.$noqus->probes_id.'" data-ans="yes" href="javascript:void(0)">Yes</a></li>
																		<li><a class="yesnoprobparent '.$nvSubNoactive.'" data-mainquestion="'.$nvQuestionID.'" data-probid="'.$noqus->probes_id.'" data-ans="no"  href="javascript:void(0)">No</a></li>
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
																		<li><a class="yesnoprobparent" data-mainquestion="'.$nvQuestionID.'" data-probid="'.$noqus->probes_id.'" data-ans="yes" href="javascript:void(0)">Yes</a></li>
																		<li><a class="yesnoprobparent" data-mainquestion="'.$nvQuestionID.'" data-probid="'.$noqus->probes_id.'" data-ans="no"  href="javascript:void(0)">No</a></li>
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
																	<li><a class="yesnoprobparent" data-mainquestion="'.$nvQuestionID.'" data-probid="'.$noqus->probes_id.'" data-ans="yes" href="javascript:void(0)">Yes</a></li>
																	<li><a class="yesnoprobparent" data-mainquestion="'.$nvQuestionID.'" data-probid="'.$noqus->probes_id.'" data-ans="no"  href="javascript:void(0)">No</a></li>
																</ul>
															</div>';
														}
														
														$qusno++;	
													}
												}
												
												
											$nvmodelslider.='</div></div>';*/
											/*$nvmodelslider.='<!--capa-tab-panel end-->
											
											
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
																		<input class="submit-btn maybe_submit_parent" id="'.$nvQuestionID.'" type="submit" value="Submit">
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
											<!--capa-tab-panel end-->';*/
											
											/*if($nvmainAnswer == "yes")
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
																	<input class="submit-btn-yes cmtsubmitparent" id="'.$nvQuestionID.'" type="submit" value="Submit">
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
																	<input class="submit-btn-yes cmtsubmitparent" id="'.$nvQuestionID.'" type="submit" value="Submit">
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
																<input class="submit-btn-yes cmtsubmitparent" id="'.$nvQuestionID.'" type="submit" value="Submit">
															</div>
															 <!--</div>-->
														</div>
													</div>
												</div>
												<!--capa-tab-panel end-->';
											}*/
											
											
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
	
	public function parent_save_main_comment()
	{
		$nvuserID = $this->session->userdata('userid');	
		$postmainanscmtqus = $_POST['mainanscmtqus'];
		$postmainanscmtchild = $_POST['mainanscmtchild'];
		$postmainanscmtcomment = $_POST['mainanscmtcomment'];
		
		$nvAnsID = $this->Database->getRecordSubAnsID('capa_red_main_answers',"user_id",$nvuserID,"child_id",$postmainanscmtchild,'question_id',$postmainanscmtqus,"ans_id"); 
		$filed_value['parent_comment']=$postmainanscmtcomment;
		$update=$this->Database->updateRecord('capa_red_main_answers',$filed_value,'ans_id',$nvAnsID);
		echo $postmainanscmtcomment;
		
	}
	
	public function parent_yes_ans_new()
	{
		$nvuserID = $this->session->userdata('userid');	
		$postMainQuestionID = $_POST['QuestionID'];
		$postChildID = $_POST['ChildID'];
		$questionnaires_extras=$this->Database->getSubQuestions('questionnaires_probes','que_id',$postMainQuestionID);
		$questionnaires_extras_count=$this->Database->getSubQuestionsCount('questionnaires_probes','que_id',$postMainQuestionID);
		$nvMainQuestion = $this->Database->getName("questionnaires_master","question","que_id",$postMainQuestionID);
		$nvMainQuestionHeading = $this->Database->getName("questionnaires_master","question_heading","que_id",$postMainQuestionID);
		$childage = $this->Database->getAge("children","id",$postChildID);

		if($questionnaires_extras_count > 0)
		{
			$i=1;
			$nvslides = '<div class="bxslider nvbxslidernew nvbxslidernewparent" id="master_question_insert_parent">';
			foreach($questionnaires_extras as $maybe)
			{
				$nvExtraQuestionID = $maybe->probes_id;
				
				$nvExtraAnswerCount = $this->Database->getRecordCount('capa_red_probes_answers',"user_id",$nvuserID,"child_id",$postChildID,'probes_id',$nvExtraQuestionID); 
				if($nvExtraAnswerCount > 0)
				{
					$nvExtraSubAnswerComment = $this->Database->getRecordSubAnsID('capa_red_probes_answers',"user_id",$nvuserID,"child_id",$postChildID,'probes_id',$nvExtraQuestionID,"ans_comment"); 		
					$nvcommentans = $nvExtraSubAnswerComment;
					
					$nvExtraSubAnswer = $this->Database->getRecordSubAnsID('capa_red_probes_answers',"user_id",$nvuserID,"child_id",$postChildID,'probes_id',$nvExtraQuestionID,"answer");
					
					//echo "<br>-=-=-".$i."====".$nvExtraSubAnswer;
					
					if($nvExtraSubAnswer == "no")
					{
						$nvextractiveno = "active";
						$nvextractiveyes = "";
					}
					else if($nvExtraSubAnswer == "yes")
					{
						$nvextractiveyes = "active";
						$nvextractiveno = "";
					}
					else
					{
						$nvextractiveyes = "";
						$nvextractiveno = "";
					}
					
				}
				else
				{
					$nvcommentans = "";
					$nvextractiveyes = "";
					$nvextractiveno = "";
				}
				
				//echo "<br>-=yes-=-".$nvextractiveyes;
				//$nvextractiveno;
				
				
				if($nvextractiveyes == "active")
				{
					$nvextraboxdisplay = 'style="display:block;"';
				}
				else
				{
					$nvextraboxdisplay = 'style="display:none;"';
				}
				



				if($maybe->que_id==6)
				{
					if($childage<=12)
					{
						$nvorgquestion='If you are in a new place, does X tend to wander away from you?';
					}
					else
					{
						$nvorgquestion='Do you feel that s/he is acting too independent for his/her age?';
					}
				}
				else
				{
				$nvorgquestion = $maybe->question;
				}
				$nvslides.='<div class="capa-info-slide customcountslide">
                                <div class="capa-info-2-top">
                                    <div class="text">
                                    	<p>'.$nvMainQuestionHeading.'</p>
										<p>'.$nvorgquestion.'</p>
                                    </div>
                                </div>
                                <div class="capa-info-2-tab">
                                   
                                    <div class="capa-info-2-tab">
                                	<!--capa-tab start-->
                                	<div class="capa-tab">
                                    	<ul class="clearfix">
                                        	<li style="float:left;"><a class="newyesans nvextracls'.$maybe->probes_id.' no '.$nvextractiveno.'" data-child="'.$postChildID.'" data-ans="no" data-mainqus="'.$postMainQuestionID.'" data-subqus="'.$maybe->probes_id.'" href="javascript:void(0)">No</a></li>
                                            <!--li><a class="maybe" href="#">Maybe</a></li-->
                                            <li style="float:right;"><a class="newyesans nvextracls'.$maybe->probes_id.' yes '.$nvextractiveyes.'" data-child="'.$postChildID.'" data-ans="yes" data-mainqus="'.$postMainQuestionID.'" data-subqus="'.$maybe->probes_id.'" href="javascript:void(0)">Yes</a></li>
                                        </ul>
                                    </div>
                                    <!--capa-tab end-->
                                    <!--capa-tab-content start-->
                                    <div class="capa-tab-content">
                                    	<!--capa-tab-panel start-->
                                    	<div class="capa-tab-panel" '.$nvextraboxdisplay.' id="newcomment'.$maybe->probes_id.'">
											<a class="close-btn" href="#" title="Close"></a>
											<div class="tab-box-3">
												<div class="box-title"><h3>Comments</h3></div>
												<div class="comment-box">
													<textarea name="yescomment" class="yescomment" placeholder="please write an example of when this behaviour happens." id="newcmt_'.$maybe->probes_id.'">'.$nvcommentans.'</textarea>
													<div class="form-row text-center">
														<input class="submit-btn-yes cmtsubmitparentnew" id="'.$maybe->probes_id.'" data-childid="'.$postChildID.'" type="submit" value="Submit">
													</div>
												</div>
											</div>
										</div>
                                        <!--capa-tab-panel end-->
                                        
                                    </div>
                                    <!--capa-tab-content end-->
                                </div>
                                        
                                        
                                </div>
                            </div>';
					$i++;
			}
			$nvslides.= "</div>";	
		}
		else
		{
			$nvslides = "";
		}
		echo $nvslides;
	}
	
	public function parent_yes_ans_new_sub()
	{
		$nvuserID = $this->session->userdata('userid');	
		$postMainQuestionID = $_POST['QuestionID'];
		$postChildID = $_POST['ChildID'];
		$questionnaires_extras=$this->Database->getSubQuestions('questionnaires_probes','que_id',$postMainQuestionID);
		$questionnaires_extras_count=$this->Database->getSubQuestionsCount('questionnaires_probes','que_id',$postMainQuestionID);
		$nvMainQuestion = $this->Database->getName("questionnaires_master","question","que_id",$postMainQuestionID);
		$nvMainQuestionHeading = $this->Database->getName("questionnaires_master","question_heading","que_id",$postMainQuestionID);
		
		if($questionnaires_extras_count > 0)
		{
			$i=1;
			$nvslides = '<div class="bxslider nvbxslidernew nvbxslidernew_sub" id="master_question_insert_parent_sub">';
			foreach($questionnaires_extras as $maybe)
			{
				$nvExtraQuestionID = $maybe->probes_id;
				
				$nvExtraAnswerCount = $this->Database->getRecordCount('capa_red_probes_answers',"user_id",$nvuserID,"child_id",$postChildID,'probes_id',$nvExtraQuestionID); 
				if($nvExtraAnswerCount > 0)
				{
					$nvExtraSubAnswerComment = $this->Database->getRecordSubAnsID('capa_red_probes_answers',"user_id",$nvuserID,"child_id",$postChildID,'probes_id',$nvExtraQuestionID,"ans_comment"); 		
					$nvcommentans = $nvExtraSubAnswerComment;
					
					$nvExtraSubAnswer = $this->Database->getRecordSubAnsID('capa_red_probes_answers',"user_id",$nvuserID,"child_id",$postChildID,'probes_id',$nvExtraQuestionID,"answer");
					
					//echo "<br>-=-=-".$i."====".$nvExtraSubAnswer;
					
					if($nvExtraSubAnswer == "no")
					{
						$nvextractiveno = "active";
						$nvextractiveyes = "";
					}
					else if($nvExtraSubAnswer == "yes")
					{
						$nvextractiveyes = "active";
						$nvextractiveno = "";
					}
					else
					{
						$nvextractiveyes = "";
						$nvextractiveno = "";
					}
					
				}
				else
				{
					$nvcommentans = "";
					$nvextractiveyes = "";
					$nvextractiveno = "";
				}
				
				//echo "<br>-=yes-=-".$nvextractiveyes;
				//$nvextractiveno;
				
				
				if($nvextractiveno == "active" || $nvextractiveyes == "active")
				{
					$nvextraboxdisplay = 'style="display:block;"';
				}
				else
				{
					$nvextraboxdisplay = 'style="display:none;"';
				}

				
				if($maybe->que_id==6)
				{
					if($childage<=12)
					{
						$nvorgquestion='If you are in a new place, does X tend to wander away from you?';
					}
					else
					{
						$nvorgquestion='Do you feel that s/he is acting too independent for his/her age?';
					}
				}
				else
				{
					$nvorgquestion = $maybe->question;
				}


				$nvslides.='<div class="capa-info-slide customcountslide">
                                <div class="capa-info-2-top">
                                    <div class="text">
                                    	<p>'.$nvMainQuestionHeading.'</p>
										<p>'.$maybe->question.'</p>
                                    </div>
                                </div>
                                <div class="capa-info-2-tab">
                                   
                                    <div class="capa-info-2-tab">
                                	<!--capa-tab start-->
                                	<div class="capa-tab">
                                    	<ul class="clearfix">
                                        	<li style="float:left;"><a class="newyesans nvextracls'.$maybe->probes_id.' no '.$nvextractiveno.'" data-child="'.$postChildID.'" data-ans="no" data-mainqus="'.$postMainQuestionID.'" data-subqus="'.$maybe->probes_id.'" href="javascript:void(0)">No</a></li>
                                            <!--li><a class="maybe" href="#">Maybe</a></li-->
                                            <li style="float:right;"><a class="newyesans nvextracls'.$maybe->probes_id.' yes '.$nvextractiveyes.'" data-child="'.$postChildID.'" data-ans="yes" data-mainqus="'.$postMainQuestionID.'" data-subqus="'.$maybe->probes_id.'" href="javascript:void(0)">Yes</a></li>
                                        </ul>
                                    </div>
                                    <!--capa-tab end-->
                                    <!--capa-tab-content start-->
                                    <div class="capa-tab-content">
                                    	<!--capa-tab-panel start-->
                                    	<div class="capa-tab-panel" '.$nvextraboxdisplay.' id="newcomment'.$maybe->probes_id.'">
											<a class="close-btn" href="#" title="Close"></a>
											<div class="tab-box-3">
												<div class="box-title"><h3>Comments</h3></div>
												<div class="comment-box">
													<textarea name="yescomment" class="yescomment" placeholder="please write an example of when this behaviour happens." id="newcmt_'.$maybe->probes_id.'">'.$nvcommentans.'</textarea>
													<div class="form-row text-center">
														<input class="submit-btn-yes cmtsubmitparentnew" id="'.$maybe->probes_id.'" data-childid="'.$postChildID.'" type="submit" value="Submit">
													</div>
												</div>
											</div>
										</div>
                                        <!--capa-tab-panel end-->
                                        
                                    </div>
                                    <!--capa-tab-content end-->
                                </div>
                                        
                                        
                                </div>
                            </div>';
					$i++;
			}
			$nvslides.= "</div>";	
		}
		else
		{
			$nvslides = "";
		}
		echo $nvslides;
	}
	
	public function newyesanswer()
	{
		$postsubQuestionID = $_POST['subQuestionID'];
		$postanswer = $_POST['answer'];
		$postmainqusid = $_POST['mainqusid'];
		$postchildID = $_POST['childID'];
		$nvuserID = $this->session->userdata('userid');	
		if($postanswer != "")
		{
			$nvcount = $this->Database->getRecordfourCount('capa_red_probes_answers',"user_id",$nvuserID,"main_ques_id",$postmainqusid,'probes_id',$postsubQuestionID,'child_id',$postchildID); //create user
			if($nvcount > 0)
			{
				$nvAnsID = $this->Database->getRecordSubAnsID('capa_red_probes_answers',"user_id",$nvuserID,"child_id",$postchildID,'probes_id',$postsubQuestionID,'prob_ans_id'); 		
				$filed_value['answer']=$postanswer;
				$update=$this->Database->updateRecord('capa_red_probes_answers',$filed_value,'prob_ans_id',$nvAnsID);
				if($update)
				{
					echo $nvAnsID;
				}
			}
			else
			{
				$data = array(
				   'child_id' => $postchildID,
				   'user_id' => $nvuserID,
				   'main_ques_id'=>$postmainqusid,
				   'answer'=>$postanswer,
				   'probes_id'=>$postsubQuestionID,
				);
				echo $this->Database->AddFunction('capa_red_probes_answers',$data); //create user	
			}
		}
	}
	
	public function parent_maybe_ans()
	{
		$nvuserID = $this->session->userdata('userid');	
		$postMainQuestionID = $_POST['QuestionID'];
		$postChildID = $_POST['ChildID'];
		$questionnaires_extras=$this->Database->getSubQuestions('questionnaires_extras','que_id',$postMainQuestionID);
		$questionnaires_extras_count=$this->Database->getSubQuestionsCount('questionnaires_extras','que_id',$postMainQuestionID);
		$nvMainQuestion = $this->Database->getName("questionnaires_master","question","que_id",$postMainQuestionID);
		$nvMainQuestionHeading = $this->Database->getName("questionnaires_master","question_heading","que_id",$postMainQuestionID);
		$nvExtraSubComment = "";
		if($questionnaires_extras_count > 0)
		{
			$i=1;
			$nvslides = '<div class="bxslider nvbxslidernew nvbxslidernew_parent" id="master_question_insert_parent">';
			foreach($questionnaires_extras as $maybe)
			{
				$nvExtraQuestionID = $maybe->extra_id;
				
				$nvExtraAnswerCount = $this->Database->getRecordCount('capa_red_extras_answers',"user_id",$nvuserID,"child_id",$postChildID,'extra_qus_id',$nvExtraQuestionID); 
				if($nvExtraAnswerCount > 0)
				{
					$nvExtraSubAnswer = $this->Database->getRecordSubAnsID('capa_red_extras_answers',"user_id",$nvuserID,"child_id",$postChildID,'extra_qus_id',$nvExtraQuestionID,"answer"); 		
					
					$nvExtraSubComment = $this->Database->getRecordSubAnsID('capa_red_extras_answers',"user_id",$nvuserID,"child_id",$postChildID,'extra_qus_id',$nvExtraQuestionID,"extra_comment"); 		
					//$nvcommentans = $nvExtraSubAnswer;
					$nvcommentans = "";
				
					if($nvExtraSubAnswer == "no")
					{
						$nvnoactive = "active";
						$nvyesactive = "";
						$nvyes2active = "";
						$nvmaybeactive = "";
						$nvyesexample = 'style="display:none;"';
					}
					else if($nvExtraSubAnswer == "yes")
					{
						$nvyesactive = "active";
						$nvyes2active = "";
						$nvnoactive = "";
						$nvmaybeactive = "";
						$nvyesexample = 'style="display:block;"';
						
					}
					else if($nvExtraSubAnswer == "yes2")
					{
						$nvyesactive = "";
						$nvyes2active = "active";
						$nvnoactive = "";
						$nvmaybeactive = "";
						$nvyesexample = 'style="display:block;"';
						
					}
					else if($nvExtraSubAnswer == "maybe")
					{
						$nvmaybeactive = "active";
						$nvyes2active = "";
						$nvyesactive = "";
						$nvnoactive = "";
						$nvyesexample = 'style="display:none;"';
					}
					else
					{
						$nvnoactive = "";
						$nvyesactive = "";
						$nvyes2active = "";
						$nvmaybeactive = "";
						$nvyesexample = 'style="display:none;"';
					}
				}
				else
				{
					$nvcommentans = "";
					$nvnoactive = "";
					$nvyesactive = "";
					$nvyes2active = "";
					$nvmaybeactive = "";
					$nvyesexample = "";
				}
				$nvslides.='<div class="capa-info-slide customcountslide">
                                <div class="capa-info-2-top">
                                    <div class="text">
                                    	<p>'.$nvMainQuestionHeading.'</p>
										<p>'.$maybe->question.'</p>
                                    </div>
                                </div>
                                <div class="capa-info-2-tab">
                                   
                                    <div class="tab-box-2">
                                        <div class="question-form custom-form">
                                            <div class="capa-tab">
												<ul class="clearfix">
													<li><a class="no nvclsextramaybe '.$nvnoactive.'" data-ans="no" data-mainqus="'.$postMainQuestionID.'" data-childid="'.$postChildID.'" data-subid="'.$nvExtraQuestionID.'" href="javascript:void(0)">No</a></li>
													<li><a class="maybe nvclsextramaybe '.$nvmaybeactive.'" data-ans="maybe" data-mainqus="'.$postMainQuestionID.'" data-childid="'.$postChildID.'" data-subid="'.$nvExtraQuestionID.'" href="javascript:void(0)">Unsure</a></li>
													<li><a class="yes nvclsextramaybe '.$nvyesactive.'" data-ans="yes" data-mainqus="'.$postMainQuestionID.'" data-childid="'.$postChildID.'" data-subid="'.$nvExtraQuestionID.'" href="javascript:void(0)">A Little</a></li>
													<li><a class="yes nvclsextramaybe '.$nvyes2active.'" data-ans="yes2" data-mainqus="'.$postMainQuestionID.'" data-childid="'.$postChildID.'" data-subid="'.$nvExtraQuestionID.'" href="javascript:void(0)">A Lot</a></li>
												</ul>
											</div>';
                                            
											$nvslides.='<!--Example code start here--><div class="capa-tab-content">';
$nvslides.='<div class="capa-tab-panel"  id="may_be_qus_'.$maybe->extra_id.'" '.$nvyesexample.'>
											<a class="close-btn" href="#" title="Close"></a>
											<div class="tab-box-3">
												<div class="box-title"><h3>Comments</h3></div>
												<div class="comment-box">
													<textarea name="yescommentmainquestion" class="yescomment yescommentmainquestion" id="comment_sub_qus_'.$maybe->extra_id.'" placeholder="please write an example of when this behaviour happens.">'.$nvExtraSubComment.'</textarea>
													<div class="form-row text-center">
														<a href="javascript:void(0)" class="submit-btn-yes submitanssubcomment" data-child="'.$postChildID.'" data-mainqus="'.$postMainQuestionID.'" data-subqus="'.$maybe->extra_id.'" title="Submit Comment"></a>
													</div>
												</div>
											</div>
										</div>';
										$nvslides.='</div><!--Example code end here-->';
											
                                            
                                        $nvslides .='</div>
                                    </div>
                                        
                                        
                                </div>
                            </div>';
					$i++;
			}
			$nvslides.= "</div>";
		}
		else
		{
			$nvslides = "";
		}
		
		echo $nvslides;
	}
	
	public function parent_maybe_ans_save_new()
	{
		$nvuserID = $this->session->userdata('userid');	
		$postanswer = $_POST['answer'];
		$postsubqusid = $_POST['subqusid'];
		$postchildID = $_POST['childID'];
		$postmainQusID = $_POST['mainQusID'];
		$nvcount = $this->Database->getRecordCount('capa_red_extras_answers',"user_id",$nvuserID,"child_id",$postchildID,'extra_qus_id',$postsubqusid); //create user	
		if($nvcount > 0)
		{
			$nvAnsID = $this->Database->getRecordSubAnsID('capa_red_extras_answers',"user_id",$nvuserID,"child_id",$postchildID,'extra_qus_id',$postsubqusid,"extra_ans_id"); 
			$filed_value['answer']=$postanswer;
			$update=$this->Database->updateRecord('capa_red_extras_answers',$filed_value,'extra_ans_id',$nvAnsID);
			echo $postanswer;
			/*if($update)
			{
			}*/
		}
		else
		{
			$data = array(
			   'child_id' => $postchildID,
			   'user_id' => $nvuserID,
			   'main_ques_id'=>$postmainQusID,
			   'answer' =>$postanswer,
			   'extra_qus_id'=>$postsubqusid,
			);
			$this->Database->AddFunction('capa_red_extras_answers',$data); //create user	
			echo $postanswer;
		}
		
	}
	
	public function parent_maybe_ans_save()
	{
		$nvuserID = $this->session->userdata('userid');	
		$postsubqusid = $_POST['subqusid'];
		$postchildid = $_POST['childid'];
		$postmainquestionID = $_POST['mainquestionID'];
		$postmaybecomment = $_POST['maybecomment'];
		
		$nvcount = $this->Database->getRecordCount('capa_red_extras_answers',"user_id",$nvuserID,"child_id",$postchildid,'extra_qus_id',$postsubqusid); //create user		
		if($nvcount > 0)
		{
			$nvAnsID = $this->Database->getRecordSubAnsID('capa_red_extras_answers',"user_id",$nvuserID,"child_id",$postchildid,'extra_qus_id',$postsubqusid,"extra_ans_id"); 
			$filed_value['answer']=$postmaybecomment;
			$update=$this->Database->updateRecord('capa_red_extras_answers',$filed_value,'extra_ans_id',$nvAnsID);
			if($update)
			{
				echo $nvAnsID;
			}
					
		}
		else
		{
			$data = array(
			   'child_id' => $postchildid,
			   'user_id' => $nvuserID,
			   'main_ques_id'=>$postmainquestionID,
			   'answer' =>$postmaybecomment,
			   'extra_qus_id'=>$postsubqusid,
			);
			echo $this->Database->AddFunction('capa_red_extras_answers',$data); //create user		
		}
	}
	
	public function question_teacher()
	{
		$nvuserID = $this->session->userdata('userid');
		$userrole = $this->session->userdata('role');
		if($_POST['userrole'])
		{
			$questions = $this->Database->getTblRecord("questions", array("question_type"=>$_POST['userrole'],'status'=>'yes'));
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
					
					
					$return .= '<div class="rpq-info-slide">
                                <!--<div class="rpq-info-2-top">
                                	<div class="text-title">
                                    	<p>Relationship problem Questionnaire</p>
                                        <span>Parent</span>
                                    </div>
                                    <div class="text">
                                    	<p>Please tick the statement that best describes<i>'.$childrenname.'</i></p>
                                    </div>
                                </div>-->
                                <div class="rpq-info-2-question">
                                	<p>'.$nvQuestion.'</p>
                                    <div class="radio-btn">
                                        <input id="rpq-radio-'.$ans_first.'" class="selanswer_parent" data-question="'.$nvQuestionID.'" type="radio" name="answer'.$radioans.'" value="1" '.$firstans.'>
                                        <label for="rpq-radio-'.$ans_first.'">Exactly like '.$childrenname.'</label>
                                    </div>
                                    <div class="radio-btn">
                                        <input id="rpq-radio-'.$ans_second.'" class="selanswer_parent" data-question="'.$nvQuestionID.'" type="radio" name="answer'.$radioans.'" value="2" '.$secondans.'>
                                        <label for="rpq-radio-'.$ans_second.'">Like '.$childrenname.'</label>
                                    </div>
                                    <div class="radio-btn">
                                        <input id="rpq-radio-'.$ans_third.'" class="selanswer_parent" data-question="'.$nvQuestionID.'" type="radio" name="answer'.$radioans.'" value="3" '.$thirdans.'>
                                        <label for="rpq-radio-'.$ans_third.'">A bit like '.$childrenname.'</label>
                                    </div>
                                    <div class="radio-btn">
                                        <input id="rpq-radio-'.$ans_fourth.'" class="selanswer_parent" data-question="'.$nvQuestionID.'" type="radio" name="answer'.$radioans.'" value="4" '.$fourthans.'>
                                        <label for="rpq-radio-'.$ans_fourth.'">Not at all like '.$childrenname.'</label>
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
	
	
	public function parent_answer()
	{
		$nvuserID = $this->session->userdata('userid');
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
	
	public function teacher_answer()
	{
		$nvuserID = $this->session->userdata('userid');
		if(isset($_POST['answer']))
		{
			$nvAnswer = $_POST['answer'];
			$nvQuestionID = $_POST['questionID'];
			$nvChildren_id = $_POST['txtchildren_id'];
			
			$data = array(
			   'answer' => $nvAnswer,
			   'question_id' => $nvQuestionID,
			   'child_id'=>$nvChildren_id,
			   'user_id'=>$nvuserID,
			);
			echo $this->Database->AddFunction('parent_children_answers',$data); //create user
		}
	}
	
	public function parent_main_ans()
	{
		$nvuserID = $this->session->userdata('userid');
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
	public function parent_prob_ans()
	{
		$postMainqustionID = $_POST['mainqustionid'];
		$postProbID = $_POST['probid'];
		$postAnswer = $_POST['answer'];
		$nvChildID = $_POST['hidden_capa_childid'];
		$nvuserID = $this->session->userdata('userid');
		
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
	public function parent_extra_ans()
	{
		$nvChildID = $_POST['hidden_capa_childid'];
		$nvuserID = $this->session->userdata('userid');
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
	
	
	
	public function parent_yes_ans_new_comment()
	{
		$postChildID = $_POST['subquschildID'];
		$postMainQusID = $_POST['submainqusID'];
		$postSubQusID = $_POST['subsubqusID'];
		$postcomment = $_POST['comment'];
		$nvuserID = $this->session->userdata('userid');
		$nvcount = $this->Database->getRecordCount('capa_red_extras_answers',"user_id",$nvuserID,"child_id",$postChildID,'extra_qus_id',$postSubQusID);
		if($nvcount > 0)
		{
			$nvAnsID = $this->Database->getRecordSubAnsID('capa_red_extras_answers',"user_id",$nvuserID,"child_id",$postChildID,'extra_qus_id',$postSubQusID,"extra_ans_id"); 
			$filed_value['extra_comment']=$postcomment;
			$update=$this->Database->updateRecord('capa_red_extras_answers',$filed_value,'extra_ans_id',$nvAnsID);
			if($update)
			{
				echo $nvAnsID;
			}else
			{
				echo $nvAnsID;
			}
		}
		else
		{
			$data = array(
			   'child_id' => $postChildID,
			   'user_id' => $nvuserID,
			   'main_ques_id'=>$postMainQusID,
			   'extra_qus_id'=>$postSubQusID,
			   'extra_comment' =>$postcomment,
			);
			echo $this->Database->AddFunction('capa_red_extras_answers',$data); //create user		
		}
	}
	
	
	//teacher_extra_ans ans End here	
	public function parent_yes_comment()
	{
		$nvChildID = $_POST['hidden_capa_childid'];
		$nvuserID = $this->session->userdata('userid');
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
	
	public function parent_yes_new_comment()
	{
		$postsubquestionID = $_POST['subquestionID'];
		$postcomment = $_POST['comment'];
		$postchildID = $_POST['childID'];
		$nvuserID = $this->session->userdata('userid');
		$nvcount = $this->Database->getRecordCount('capa_red_probes_answers',"user_id",$nvuserID,"child_id",$postchildID,'probes_id',$postsubquestionID);
		if($nvcount > 0)
		{
			$nvAnsID = $this->Database->getRecordSubAnsID('capa_red_probes_answers',"user_id",$nvuserID,"child_id",$postchildID,'probes_id',$postsubquestionID,"prob_ans_id"); 
			$filed_value['ans_comment']=$postcomment;
			$update=$this->Database->updateRecord('capa_red_probes_answers',$filed_value,'prob_ans_id',$nvAnsID);
			if($update)
			{
				echo $nvAnsID;
			}
		}
		else
		{
				$data = array(
				   'child_id' => $postchildID,
				   'user_id' => $nvuserID,
				   'probes_id'=>$postsubquestionID,
				   'ans_comment' =>$postcomment,
				);
				echo $this->Database->AddFunction('capa_red_probes_answers',$data); //create user		
		}
	}
	
	
}