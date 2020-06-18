<!-- Modal Start -->

	<!--login-singup modal start-->
    <div class="main-modal modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <!--button type="button" class="close" data-dismiss="modal" aria-label="Close"></button-->
                </div>
                <div class="modal-body">
                	<div class="login-singup">
                    	<div class="login-singup-top">
                        	<div class="image"><img src="<?php echo base_url("public/images/login-icon-outlined.svg"); ?>" alt=""></div>
                        </div>
                        <div class="login-singup-form">
                            <form name="login" method="POST" action="<?php echo base_url('home/loginform'); ?>" id="login_form">
                                <div class="form-row">
                                    <input class="input-text" type="email" name="email" placeholder="Email">
                                </div>
                                <div class="form-row">
                                    <input class="input-text" name="password" type="password" placeholder="Password">
                                </div>
                                <div class="form-row">
                                    <a class="forgot-password" href="#" data-toggle="modal" data-target="#myModal-fpassword">Forgot Email</a>
                                </div>
                                <div class="form-row">
                                    <input class="button" type="submit" value="Sign in">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--login-singup modal end-->
    
    <!--login-singup modal start-->
    <div class="main-modal modal fade" id="myModal-fpassword" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <!--button type="button" class="close" data-dismiss="modal" aria-label="Close"></button-->
                </div>
                <div class="modal-body">
                	<div class="login-singup">
                    	<div class="login-singup-top">
                        	<div class="image"></div>
                        </div>
                        <div class="login-singup-form">
                            <form name="login" method="POST" action="<?php echo base_url(); ?>/home/forgotPassword" id="forgot_pass_form">
                                <div class="form-row">
                                    <input class="input-text" name="email" type="email" placeholder="Email">
                                </div>
                                <div class="form-row">
                                    <div class="forgot-email">Contact admin if you forgot your email</div>
                                </div>
                                <div class="form-row">
                                    <input class="button" type="submit" value="Send a reset password email">
                                </div>
                                <div class="form-row">
                                    <div class="instructions">A password email was sent follow instructions</div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--login-singup modal end-->
	
    
    <!--landing-5 modal start-->
    <div class="main-modal modal fade" id="myModal-2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <!--button type="button" class="close" data-dismiss="modal" aria-label="Close"></button-->
                    <a class="close" href="javascript:void(0)" data-dismiss="modal" aria-label="Close" title="Close"></a>
                </div>
                <div class="modal-body">
                	<div class="landing-5">
                    	<div class="landing-5-top">
                        	<div class="image"><img src="<?php echo base_url("public/images/pencil-icon-outlined.svg"); ?>" alt=""></div>
                        </div>
                        <div class="landing-5-form">
                             <form name="registration" action="<?php echo base_url('home/registration'); ?>" method="POST" id="registration_form">
                                <div class="form-row">
                                    <input class="input-text" type="text" name="name" placeholder="Name">
                                </div>
                                <div class="form-row">
                                    <input class="input-text" type="email" name="email" placeholder="Admin's Email">
                                </div>
                                <div class="form-row">
                                    <input class="input-text" type="password" name="password" placeholder="Password">
                                </div>
                                <div class="form-row">
                                    <input class="input-text" type="password" name="confirn_password" placeholder="Confirmation Password">
                                </div>
                                <div class="form-row">
                                	<select class="selectpicker childpricelist" name="number_of_child">
										<option value="">Quantity</option>
										<?php for($i=1;$i<=200;$i++){ ?>
                                    	<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
										<?php } ?>
                                    </select>
                                </div>
								<div class="form-row">
                                    <input class="input-text" type="text" name="center_name" placeholder="Centre Name">
                                    <input class="input-text" id="total_amount" type="hidden" name="total_amount">
                                </div>
                                <div class="form-row">
                                	<div class="price">Price:-<span class="finalprice">&euro;XX.YY</span></div>
                                </div>
                                <div class="form-row">
                                	<input class="button" type="submit" value="Check Out">
                                </div>
                                <div class="form-row">
                                	<div class="text-label">
                                    	<p>We Charge to cover running costs</p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--landing-5 modal end-->
	
	<!--landing-5 modal start-->
    <div class="main-modal modal fade" id="admin-create-new-group" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <!--button type="button" class="close" data-dismiss="modal" aria-label="Close"></button-->
                    <a class="close" href="javascript:void(0)" data-dismiss="modal" aria-label="Close" title="Close"></a>
                </div>
                <div class="modal-body">
                	<div class="landing-5">
                    	<div class="landing-5-top">
                        	<div class="image"><img src="<?php echo base_url("public/images/pencil-icon-outlined.svg"); ?>" alt=""></div>
                        </div>
                        <div class="landing-5-form">
                             <form name="registration" action="<?php echo base_url('admin/createGroup'); ?>" method="POST" class="create-group">
                                <div class="form-row">
									<input type="hidden" class="groupid" name="groupid" value="">
                                    <input class="input-text create-name" type="text" name="name" placeholder="Name">
                                </div>
                                
                                <div class="form-row">
									
                                    <input class="input-text" type="file" name="file-0" placeholder="Document">
                                </div>
                                
                                <div class="form-row">
                                	<input class="button" type="submit" value="Create New Group">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--landing-5 modal end-->
    
    <!--landing-5 modal start-->
    <div class="main-modal modal fade" id="admin-edit-group" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <!--button type="button" class="close" data-dismiss="modal" aria-label="Close"></button-->
                    <a class="close" href="javascript:void(0)" data-dismiss="modal" aria-label="Close" title="Close"></a>
                </div>
                <div class="modal-body">
                	<div class="landing-5">
                    	<div class="landing-5-top">
                        	<div class="image"><img src="<?php echo base_url("public/images/pencil-icon-outlined.svg"); ?>" alt=""></div>
                        </div>
                        <div class="landing-5-form" id="edit-group-form111">
                             <form name="frmeditgroup" id="edit-group-form" data-groupid=""  method="post" enctype="multipart/form-data">
                                <div class="form-row">
									<input type="hidden" class="groupid" name="groupid" value="">
                                    <input class="input-text create-name" type="text" name="name" placeholder="Name">
                                </div>
                                
                                <div class="form-row">
                                	<input class="button admin-edit-group" type="submit" value="Update Group">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--landing-5 modal end-->
    
    <!--landing-6 modal start-->
    <div class="main-modal modal fade" id="myModal-3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <!--button type="button" class="close" data-dismiss="modal" aria-label="Close"></button-->
                    <a class="close" href="javascript:void(0)" data-dismiss="modal" aria-label="Close" title="Close"></a>
                </div>
                <div class="modal-body">
                	<div class="landing-6">
                    	<div class="landing-6-top">
                        	<div class="image"><img src="<?php echo base_url("public/images/comment-icon-outlined.svg"); ?>" alt=""></div>
                        </div>
                        <div class="landing-6-select">
                        	
                        	<select class="selectpicker selectchange">
								<option value="">Centre</option>
								<?php 
								
								/*foreach($center as $name)
								{
									echo '<option date-user="'.$name->createdby.'" value="'.$name->group_id.'">'.$name->group_name.'</option>';
								}*/
								foreach($center as $name)
								{
									echo '<option value="'.$name->user_id.'">'.$name->center_name.'</option>';
								}
								?>
                            </select>
                        </div>
                        <div class="landing-6-form replaceData">
                            <div class="form-row">
                                <div class="l-row"><label>Name</label></div>
                                <div class="r-row"><input class="input-text" type="text" placeholder="Ireen O'Neil"></div>
                            </div>
                            <div class="form-row">
                                <div class="l-row"><label>Email</label></div>
                                <div class="r-row"><input class="input-text" type="email" placeholder="Ireen@gla.ac.uk"></div>
                            </div>
                            <div class="form-row">
                                <div class="l-row"><label>Phone</label></div>
                                <div class="r-row"><input class="input-text" type="tel" placeholder="0141 221 xxxx"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--landing-6 modal end-->
    
	<!--admin-3 modal start-->
    <div class="main-modal modal fade" id="myModal-4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <!--button type="button" class="close" data-dismiss="modal" aria-label="Close"></button-->
                    <a class="close" href="javascript:void(0)" data-dismiss="modal" aria-label="Close" title="Close"></a>
                </div>
                <div class="modal-body">
                	<div class="admin-3">
                        <div class="admin-3-form">
                            <form name="" method="POST" id="updProdileData" action="<?php echo base_url(); ?>/admin/updateProfile">
							<input type="hidden" name="uid" value="<?php echo $userDetail[0]->user_id ?>">
                                <div class="form-row">
                                	<label>Administrator's Name</label>
                                    <input class="input-text" name="name" value="<?php echo $userDetail[0]->name ?>" type="text" placeholder="Ireen O'Neil">
                                </div>
                                <div class="form-row">
                                	<label>Administrator's Email</label>
                                    <input class="input-text" name="email" value="<?php echo $userDetail[0]->email ?>" type="email" placeholder="Ireen@gla.ac.uk">
                                </div>
                                <div class="form-row">
                                	<label>Password</label>
                                    <input class="input-text" name="updated_password" value="" type="password" placeholder="Password">
                                </div>
                                <div class="form-row">
                                	<label>Group Name</label>
                                    <input class="input-text" name="center_name" value="<?php echo $userDetail[0]->center_name ?>" type="text" placeholder="Group A">
                                </div>
                                <div class="form-row text-center">
                                	<input class="button" type="submit" value="Submit">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--admin-3 modal end-->
    
    <!--admin-6 modal start-->
    <div class="main-modal modal fade" id="myModal-5" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <!--button type="button" class="close" data-dismiss="modal" aria-label="Close"></button-->
                    <a class="close" href="javascript:void(0)" data-dismiss="modal" aria-label="Close" title="Close"></a>
                </div>
                <div class="modal-body">
                	<div class="admin-6">
                        <div class="admin-6-form">
                            <form name="addChild" class="addChildren" method="POST" action="<?php echo base_url(); ?>/admin/addChildren">
								<input type="hidden" name="groupid" value="" class="gid">
								<input type="hidden" name="userid" value="" class="uid">
                                <div class="form-row">
                                	<label>Child's Name</label>
                                    <input class="input-text" name="name" type="text" placeholder="Ireen O'Neil">
                                </div>
                                <div class="form-row">
                                	<label>Date of Birth</label>
                                    <input class="input-text" name="birthdate" type="text" placeholder="July 31, 1999">
                                </div>
                                <div class="form-row">
                                	<label>Gender</label>
                                    <select class="selectpicker" name="gender">
                                    	<option value="">Select Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                                <div class="form-row">
                                	<label>Clinician Email</label>
                                    <input class="input-text" type="email" name="clinician_email" placeholder="Clinician@clinician.com">
                                </div>
                                <div class="form-row">
                                	<label>Parent 1 Email</label>
                                    <input class="input-text" type="email" name="parent_1_email" placeholder="Parent1@parent1.com">
                                </div>
                                <div class="form-row">
                                	<label>Parent 2 Email</label>
                                    <input class="input-text" type="email" name="parent_2_email" placeholder="Parent2@parent2.com">
                                </div>
                                <div class="form-row">
                                	<label>Teacher's Email</label>
                                    <input class="input-text" type="email" name="teacher_email" placeholder="Teacher@teacher.com">
                                </div>
                                <div class="form-row">
                                	<div class="row">
                                    	<div class="col-xs-12">
                                        	<a class="delete-btn" href="#"><img src="<?php echo base_url("public/images/rubbish-bin-icon-outlined-2.svg"); ?>" alt=""></a>
                                        	<input class="submit-btn" type="submit" value="Submit">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--admin-6 modal end-->
    
    <!--admin-8 modal start-->
    <div class="main-modal modal fade" id="myModal-6" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <!--button type="button" class="close" data-dismiss="modal" aria-label="Close"></button-->
                    <a class="close" href="javascript:void(0)" data-dismiss="modal" aria-label="Close" title="Close"></a>
                </div>
                <div class="modal-body">
                	<div class="admin-8">
                        <div class="admin-8-graph">
                        	<div class="graph-box" style="width: 100%; height:100%">
								<canvas id="canvas"></canvas>
							</div>
							
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--admin-8 modal end-->
    
    <!--admin-4 modal start-->
    <div class="main-modal modal fade" id="myModal-7" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <!--button type="button" class="close" data-dismiss="modal" aria-label="Close"></button-->
                    <a class="close" href="javascript:void(0)" data-dismiss="modal" aria-label="Close" title="Close"></a>
                </div>
                <div class="modal-body">
                	<div class="admin-4">
                        <div class="admin-4-top">
                        	<div class="text"><p>Information for<br /> <span id="modal_child_name"></span></p></div>
                        </div>
                        <div class="admin-4-form">
                        	<form id="frmchildobservation" name="frmchildobservation">
							<input type="hidden" id="group_id" name="group_id" value="">
							<input type="hidden" id="child_id" name="child_id" value="">									
                            	<div class="form-row">
                                	<div class="row">
                                    	<div class="col-xs-6">
                                        	<div class="check-box">
                                            	<input id="check-1" type="checkbox" value="I" class="childview">
                                                <label for="check-1">Input</label>
                                            </div>
                                        </div>
                                        <div class="col-xs-6">
                                            <div class="check-box">
                                            	<input id="check-2" type="checkbox" value="R" class="childview">
                                                <label for="check-2">Request</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row rowrpq"  id="rowI" style="display:none;">
                                	<div class="btn-box"><a class="f-btn loginaction" id="teacherlogin" href="javascript:void(0)" data-file="" data-groupid="" data-childid="" data-techeruserid="">RPQ-Teacher</a></div>
                                    <div class="btn-box"><a class="f-btn loginaction" id="clinicianlogin" href="javascript:void(0)"  data-groupid="" data-childid="" data-techeruserid="">Observation</a></div>
                                </div>
                                <div class="form-row rowrpq"  id="rowR" style="display:none;">
                                	<p>Teacher RPQ</p>
                                	<div class="btn-box">
                                    	<a class="f-btn rpqchildrenemail" data-rpqchildren="" data-rpquserid="" data-type="email" href="#" id="sent_teach_rpq"><img src="<?php echo base_url('public/images/mail-icon-outlined.svg'); ?>" alt="">By Email</a>
                                    </div>
                                    <div class="btn-box">
                                    	<a class="f-btn rpqchildrenemail" data-rpqchildren="" data-rpquserid="" data-type="document" href="javascript:void(0)" id="doc_download" download ><img src="<?php echo base_url('public/images/clipboard-icon.svg'); ?>" alt="">By Parents</a>
                                    </div>
                                </div>
                                <!--<div class="form-row text-center">
                                	<input class="button" type="submit" value="Submit">
                                </div>-->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--admin-4 modal end-->
    
    <!--clinician-2 modal start-->
    <div class="main-modal white modal fade" id="myModal-9" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <!--button type="button" class="close" data-dismiss="modal" aria-label="Close"></button-->
                    <a class="close" href="javascript:void(0)" data-dismiss="modal" aria-label="Close" title="Close"></a>
                </div>
                <div class="modal-body">
                    <div class="clinician-2">
                    	<div class="clinic-2-top">
                        	<div class="text-label">Oberservation</div>
                        </div>
                        <div class="clinic-2-form questionwithans">
                        	
                            <!--clinic-2-panel-wrap start-->
                            <div class="clinic-2-panel-wrap">
                                <div class="clinic-2-panel">
                                    <a class="icon-left pencil filled" href="#"></a>
                                    <a class="icon-left-2 question-mark" href="#"></a>
                                    <span>Question 1</span>
                                    <a class="icon-right plus" href="#"></a>
                                </div>
                                <div class="clinic-2-panel-content">
                                    <div class="comment-box">
                                    	<div class="comment-area">Evidence for the positive response for Q1</div>
                                    </div>
                                </div>
                            </div>
                            <!--clinic-2-panel-wrap end-->
                            <!--clinic-2-panel-wrap start-->
                            <div class="clinic-2-panel-wrap">
                                <div class="clinic-2-panel">
                                    <a class="icon-left pencil" href="#"></a>
                                    <a class="icon-left-2 question-mark" href="#"></a>
                                    <span>Question 5</span>
                                    <a class="icon-right plus" href="#"></a>
                                </div>
                                <div class="clinic-2-panel-content">
                                    <div class="comment-box">
                                    	<div class="comment-area">Evidence for the positive response for Q5</div>
                                    </div>
                                </div>
                            </div>
                            <!--clinic-2-panel-wrap end-->
                            <!--clinic-2-panel-wrap start-->
                            <div class="clinic-2-panel-wrap">
                                <div class="clinic-2-panel">
                                    <a class="icon-left pencil filled" href="#"></a>
                                    <a class="icon-left-2 question-mark" href="#"></a>
                                    <span>Question 7</span>
                                    <a class="icon-right plus" href="#"></a>
                                </div>
                                <div class="clinic-2-panel-content">
                                    <div class="comment-box">
                                    	<div class="comment-area">Evidence for the positive response for Q7</div>
                                    </div>
                                </div>
                            </div>
                            <!--clinic-2-panel-wrap end-->
                        </div>
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--clinician-2 modal end-->
    
    
    <!--clinician-2 modal start-->
    <div class="main-modal white modal-big modal fade" id="myModal-91" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="clinician-2">
                    	<div class="clearfix main-title nvinformatnm"><h2>Informant:- Name of Informant (teacher, parent)</h2></div>
                    	<div class="row top-row">
                        	<div class="col-sm-3">
                            	<div class="clearfix sub-title"><h3>Positive</h3></div>
                            </div>
                        	<div class="col-sm-3">
                            	<div class="clinic-2-top">
                                	<div class="text-label">DSED</div>
                            	</div>
                                <div class="clinic-2-form clsDisinhibitied">
                                    <!--clinic-2-panel-wrap start-->
                                    <div class="clinic-2-panel-wrap">
                                        <div class="clinic-2-panel">
                                            <a class="icon-left pencil filled" href="#"></a>
                                            <a class="icon-left-2 question-mark" href="#"></a>
                                            <span>Question 1</span>
                                            <a class="icon-right plus" href="#"></a>
                                        </div>
                                        <div class="clinic-2-panel-content">
                                            <div class="comment-box">
                                                <div class="comment-area">Evidence for the positive response for Q1</div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--clinic-2-panel-wrap end-->
                                    <!--clinic-2-panel-wrap start-->
                                    <div class="clinic-2-panel-wrap">
                                        <div class="clinic-2-panel">
                                            <a class="icon-left pencil" href="#"></a>
                                            <a class="icon-left-2 question-mark" href="#"></a>
                                            <span>Question 5</span>
                                            <a class="icon-right plus" href="#"></a>
                                        </div>
                                        <div class="clinic-2-panel-content">
                                            <div class="comment-box">
                                                <div class="comment-area">Evidence for the positive response for Q5</div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--clinic-2-panel-wrap end-->
                                    <!--clinic-2-panel-wrap start-->
                                    <div class="clinic-2-panel-wrap">
                                        <div class="clinic-2-panel">
                                            <a class="icon-left pencil filled" href="#"></a>
                                            <a class="icon-left-2 question-mark" href="#"></a>
                                            <span>Question 7</span>
                                            <a class="icon-right plus" href="#"></a>
                                        </div>
                                        <div class="clinic-2-panel-content">
                                            <div class="comment-box">
                                                <div class="comment-area">Evidence for the positive response for Q7</div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--clinic-2-panel-wrap end-->
                                </div>
                            </div>
                            <div class="col-sm-3">
                            	<div class="clinic-2-top">
                                	<div class="text-label">RAD</div>
                            	</div>
                                <div class="clinic-2-form clsInhibitied">
                                    <!--clinic-2-panel-wrap start-->
                                    <div class="clinic-2-panel-wrap">
                                        <div class="clinic-2-panel">
                                            <a class="icon-left pencil filled" href="#"></a>
                                            <a class="icon-left-2 question-mark" href="#"></a>
                                            <span>Question 1</span>
                                            <a class="icon-right plus" href="#"></a>
                                        </div>
                                        <div class="clinic-2-panel-content">
                                            <div class="comment-box">
                                                <div class="comment-area">Evidence for the positive response for Q1</div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--clinic-2-panel-wrap end-->
                                    <!--clinic-2-panel-wrap start-->
                                    <div class="clinic-2-panel-wrap">
                                        <div class="clinic-2-panel">
                                            <a class="icon-left pencil" href="#"></a>
                                            <a class="icon-left-2 question-mark" href="#"></a>
                                            <span>Question 5</span>
                                            <a class="icon-right plus" href="#"></a>
                                        </div>
                                        <div class="clinic-2-panel-content">
                                            <div class="comment-box">
                                                <div class="comment-area">Evidence for the positive response for Q5</div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--clinic-2-panel-wrap end-->
                                    <!--clinic-2-panel-wrap start-->
                                    <div class="clinic-2-panel-wrap">
                                        <div class="clinic-2-panel">
                                            <a class="icon-left pencil filled" href="#"></a>
                                            <a class="icon-left-2 question-mark" href="#"></a>
                                            <span>Question 7</span>
                                            <a class="icon-right plus" href="#"></a>
                                        </div>
                                        <div class="clinic-2-panel-content">
                                            <div class="comment-box">
                                                <div class="comment-area">Evidence for the positive response for Q7</div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--clinic-2-panel-wrap end-->
                                </div>
                            </div>
                            <div class="col-sm-3">
                            	<div class="clinic-2-top">
                                	<div class="text-label">Others</div>
                            	</div>
                                <div class="clinic-2-form clsOthers">
                                    <!--clinic-2-panel-wrap start-->
                                    <div class="clinic-2-panel-wrap">
                                        <div class="clinic-2-panel">
                                            <a class="icon-left pencil filled" href="#"></a>
                                            <a class="icon-left-2 question-mark" href="#"></a>
                                            <span>Question 1</span>
                                            <a class="icon-right plus" href="#"></a>
                                        </div>
                                        <div class="clinic-2-panel-content">
                                            <div class="comment-box">
                                                <div class="comment-area">Evidence for the positive response for Q1</div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--clinic-2-panel-wrap end-->
                                    <!--clinic-2-panel-wrap start-->
                                    <div class="clinic-2-panel-wrap">
                                        <div class="clinic-2-panel">
                                            <a class="icon-left pencil" href="#"></a>
                                            <a class="icon-left-2 question-mark" href="#"></a>
                                            <span>Question 5</span>
                                            <a class="icon-right plus" href="#"></a>
                                        </div>
                                        <div class="clinic-2-panel-content">
                                            <div class="comment-box">
                                                <div class="comment-area">Evidence for the positive response for Q5</div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--clinic-2-panel-wrap end-->
                                    <!--clinic-2-panel-wrap start-->
                                    <div class="clinic-2-panel-wrap">
                                        <div class="clinic-2-panel">
                                            <a class="icon-left pencil filled" href="#"></a>
                                            <a class="icon-left-2 question-mark" href="#"></a>
                                            <span>Question 7</span>
                                            <a class="icon-right plus" href="#"></a>
                                        </div>
                                        <div class="clinic-2-panel-content">
                                            <div class="comment-box">
                                                <div class="comment-area">Evidence for the positive response for Q7</div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--clinic-2-panel-wrap end-->
                                </div>
                            </div>
                        </div>
                        <div class="row bottom-row">
                        	<div class="col-sm-3">
                            	<div class="clearfix sub-title"><h3>Negative</h3></div>
                            </div>
                        	<div class="col-sm-3">
                                <div class="clinic-2-form clsDisinhibitiedhtmlneg">
                                    <!--clinic-2-panel-wrap start-->
                                    <div class="clinic-2-panel-wrap">
                                        <div class="clinic-2-panel">
                                            <a class="icon-left pencil filled" href="#"></a>
                                            <a class="icon-left-2 question-mark" href="#"></a>
                                            <span>Question 11</span>
                                            <a class="icon-right plus" href="#"></a>
                                        </div>
                                        <div class="clinic-2-panel-content">
                                            <div class="comment-box">
                                                <div class="comment-area">Evidence for the positive response for Q1</div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--clinic-2-panel-wrap end-->
                                    <!--clinic-2-panel-wrap start-->
                                    <div class="clinic-2-panel-wrap">
                                        <div class="clinic-2-panel">
                                            <a class="icon-left pencil" href="#"></a>
                                            <a class="icon-left-2 question-mark" href="#"></a>
                                            <span>Question 5</span>
                                            <a class="icon-right plus" href="#"></a>
                                        </div>
                                        <div class="clinic-2-panel-content">
                                            <div class="comment-box">
                                                <div class="comment-area">Evidence for the positive response for Q5</div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--clinic-2-panel-wrap end-->
                                    <!--clinic-2-panel-wrap start-->
                                    <div class="clinic-2-panel-wrap">
                                        <div class="clinic-2-panel">
                                            <a class="icon-left pencil filled" href="#"></a>
                                            <a class="icon-left-2 question-mark" href="#"></a>
                                            <span>Question 7</span>
                                            <a class="icon-right plus" href="#"></a>
                                        </div>
                                        <div class="clinic-2-panel-content">
                                            <div class="comment-box">
                                                <div class="comment-area">Evidence for the positive response for Q7</div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--clinic-2-panel-wrap end-->
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="clinic-2-form clsInhibitiedhtmlneg">
                                    <!--clinic-2-panel-wrap start-->
                                    <div class="clinic-2-panel-wrap">
                                        <div class="clinic-2-panel">
                                            <a class="icon-left pencil filled" href="#"></a>
                                            <a class="icon-left-2 question-mark" href="#"></a>
                                            <span>Question 12</span>
                                            <a class="icon-right plus" href="#"></a>
                                        </div>
                                        <div class="clinic-2-panel-content">
                                            <div class="comment-box">
                                                <div class="comment-area">Evidence for the positive response for Q1</div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--clinic-2-panel-wrap end-->
                                    <!--clinic-2-panel-wrap start-->
                                    <div class="clinic-2-panel-wrap">
                                        <div class="clinic-2-panel">
                                            <a class="icon-left pencil" href="#"></a>
                                            <a class="icon-left-2 question-mark" href="#"></a>
                                            <span>Question 5</span>
                                            <a class="icon-right plus" href="#"></a>
                                        </div>
                                        <div class="clinic-2-panel-content">
                                            <div class="comment-box">
                                                <div class="comment-area">Evidence for the positive response for Q5</div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--clinic-2-panel-wrap end-->
                                    <!--clinic-2-panel-wrap start-->
                                    <div class="clinic-2-panel-wrap">
                                        <div class="clinic-2-panel">
                                            <a class="icon-left pencil filled" href="#"></a>
                                            <a class="icon-left-2 question-mark" href="#"></a>
                                            <span>Question 7</span>
                                            <a class="icon-right plus" href="#"></a>
                                        </div>
                                        <div class="clinic-2-panel-content">
                                            <div class="comment-box">
                                                <div class="comment-area">Evidence for the positive response for Q7</div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--clinic-2-panel-wrap end-->
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="clinic-2-form clsOthershtmlneg">
                                    <!--clinic-2-panel-wrap start-->
                                    <div class="clinic-2-panel-wrap">
                                        <div class="clinic-2-panel">
                                            <a class="icon-left pencil filled" href="#"></a>
                                            <a class="icon-left-2 question-mark" href="#"></a>
                                            <span>Question 13</span>
                                            <a class="icon-right plus" href="#"></a>
                                        </div>
                                        <div class="clinic-2-panel-content">
                                            <div class="comment-box">
                                                <div class="comment-area">Evidence for the positive response for Q1</div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--clinic-2-panel-wrap end-->
                                    <!--clinic-2-panel-wrap start-->
                                    <div class="clinic-2-panel-wrap">
                                        <div class="clinic-2-panel">
                                            <a class="icon-left pencil" href="#"></a>
                                            <a class="icon-left-2 question-mark" href="#"></a>
                                            <span>Question 5</span>
                                            <a class="icon-right plus" href="#"></a>
                                        </div>
                                        <div class="clinic-2-panel-content">
                                            <div class="comment-box">
                                                <div class="comment-area">Evidence for the positive response for Q5</div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--clinic-2-panel-wrap end-->
                                    <!--clinic-2-panel-wrap start-->
                                    <div class="clinic-2-panel-wrap">
                                        <div class="clinic-2-panel">
                                            <a class="icon-left pencil filled" href="#"></a>
                                            <a class="icon-left-2 question-mark" href="#"></a>
                                            <span>Question 7</span>
                                            <a class="icon-right plus" href="#"></a>
                                        </div>
                                        <div class="clinic-2-panel-content">
                                            <div class="comment-box">
                                                <div class="comment-area">Evidence for the positive response for Q7</div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--clinic-2-panel-wrap end-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--clinician-2 modal end-->
    
    
    <!--clinician-3 modal start-->
    <div class="main-modal black modal fade" id="myModal-10" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <!--button type="button" class="close" data-dismiss="modal" aria-label="Close"></button-->
                    <a class="close" href="javascript:void(0)" data-dismiss="modal" aria-label="Close" title="Close"></a>
                </div>
                <div class="modal-body">
                    <div class="clinician-3" id="questionwithcomment">
                    	<div class="clinic-3-top">
                        	<div class="text-label">Clinician's Comment for Parent2 CAPA-RAD QUESTION 1</div>
                        </div>
                        <div class="clinic-3-form">
                        	<form name="">
                            	<div class="form-row">
                                	<textarea class="textarea" placeholder="A place to add comment on the evidence"></textarea>
                                </div>
                                <div class="form-row">
                                	<div class="row">
                                    	<div class="col-xs-12">
                                        	<a class="delete-btn" href="#"><img src="<?php echo base_url("public/images/rubbish-bin-icon-outlined-2.svg"); ?>" alt=""></a>
                                        	<input class="submit-btn" type="submit" value="Submit">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--clinician-3 modal end-->
    
    <!--clinician-4 modal start-->
    <div class="main-modal black modal fade" id="myModal-11" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <!--button type="button" class="close" data-dismiss="modal" aria-label="Close"></button-->
                    <a class="close" href="javascript:void(0)" data-dismiss="modal" aria-label="Close" title="Close"></a>
                </div>
                <div class="modal-body">
                    
                    <div class="clinician-4" id="questionDescriptionCapa">
                    	<div class="clinic-4-top">
                        	<div class="text-title">
                            	<h3>CAPA-RAD:- QUESTION 1</h3>
                                <h5>Glossary Description</h5>
                            </div>
                        </div>
                        <div class="clinic-4-description">
                        	<p>The child/young person is reported to be willing to be friendly towards almost and adult,
                            to a degree unusually to his/her development age, social group, and familiarity with the adult.</p>
                            <p>The child/young person demonstrates reduced or absent reticence around unfamiliar adult.</p>
                            <p>Behavior is inappropriate for contact with unfamiliar adult. In older...</p>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <!--clinician-4 modal end-->
    
    <!--rpq-info-2 modal start-->
    <div class="main-modal black modal fade" id="myModal-12" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                	<div class="rpq-info-2-top top-detail">
                        <div class="text-title">
                            <p>Relationship problem Questionnaire</p>
                            <span class="userrole">Parent</span>
                        </div>
                        <div class="text">
                            <p>Please tick the statement that best describes <i class="child-nm"></i></p>
                        </div>
                    </div>
                    <!--button type="button" class="close" data-dismiss="modal" aria-label="Close"></button-->
                    <a class="close" href="javascript:void(0)" data-dismiss="modal" aria-label="Close" title="Close"></a>
                </div>
                <div class="modal-body">
                    <div class="rpq-info-2">
                    	<div class="bxslider" id="question_insert">
                        	<!--rpq-info-slide start-->
                        	<div class="rpq-info-slide">
                                <div class="rpq-info-2-top">
                                	<div class="text-title">
                                    	<p>Relationship problem Questionnaire</p>
                                        <span>Parent</span>
                                    </div>
                                    <div class="text">
                                    	<p>Please tick the statement that best describes<i>'Child's Name'</i></p>
                                    </div>
                                </div>
                                <div class="rpq-info-2-question">
                                	<p>Gets too physically close to strangers</p>
                                    <div class="radio-btn">
                                        <input id="rpq-radio-1" type="radio" name="radio">
                                        <label for="rpq-radio-1">Exactly like 'Child's Name'</label>
                                    </div>
                                    <div class="radio-btn">
                                        <input id="rpq-radio-2" type="radio" name="radio">
                                        <label for="rpq-radio-2">Like 'Child's Name'</label>
                                    </div>
                                    <div class="radio-btn">
                                        <input id="rpq-radio-3" type="radio" name="radio">
                                        <label for="rpq-radio-3">A bit like 'Child's Name'</label>
                                    </div>
                                    <div class="radio-btn">
                                        <input id="rpq-radio-4" type="radio" name="radio">
                                        <label for="rpq-radio-4">Not at all like</label>
                                    </div>
                                </div>
                            </div>
                            <!--rpq-info-slide end-->
                            <!--rpq-info-slide start-->
                        	<div class="rpq-info-slide">
                                <div class="rpq-info-2-top">
                                	<div class="text-title">
                                    	<p>Relationship problem Questionnaire</p>
                                        <span>Parent</span>
                                    </div>
                                    <div class="text">
                                    	<p>Please tick the statement that best describes<i>'Child's Name'</i></p>
                                    </div>
                                </div>
                                <div class="rpq-info-2-question">
                                	<p>Gets too physically close to strangers</p>
                                    <div class="radio-btn">
                                        <input id="rpq-radio-5" type="radio" name="radio">
                                        <label for="rpq-radio-5">Exactly like 'Child's Name'</label>
                                    </div>
                                    <div class="radio-btn">
                                        <input id="rpq-radio-6" type="radio" name="radio">
                                        <label for="rpq-radio-6">Like 'Child's Name'</label>
                                    </div>
                                    <div class="radio-btn">
                                        <input id="rpq-radio-7" type="radio" name="radio">
                                        <label for="rpq-radio-7">A bit like 'Child's Name'</label>
                                    </div>
                                    <div class="radio-btn">
                                        <input id="rpq-radio-8" type="radio" name="radio">
                                        <label for="rpq-radio-8">Not at all like</label>
                                    </div>
                                </div>
                            </div>
                            <!--rpq-info-slide end-->
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--rpq-info-2 modal end-->
    
    <!--capa-info-2 modal start-->
    <?php /*?><div class="main-modal black modal fade" id="myModal-13" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="capa-info-2">
                    	<div class="bxslider">
						<?php 
						
						foreach($masterquestions as $masterQue){ ?>
                        	<!--capa-info-slide start-->
                        	<div class="capa-info-slide">
                                <div class="capa-info-2-top">
                                    <div class="text">
                                    	<p><?php echo $masterQue->question; ?></p>
                                    </div>
                                </div>
                                <div class="capa-info-2-tab">
                                	<!--capa-tab start-->
                                	<div class="capa-tab">
                                    	<ul class="clearfix">
									
                                        	<li><a class="no" href="#">No</a></li>
                                            <li><a class="maybe" href="#">Maybe</a></li>
                                            <li><a class="yes" href="#">Yes</a></li>
                                        </ul>
                                    </div>
                                    <!--capa-tab end-->
                                    <!--capa-tab-content start-->
                                    <div class="capa-tab-content">
										<!--capa-tab-panel start-->
										<?php 
										$c=1;
										foreach($probquestion as $prob)
										{	
											if($prob->que_id==$masterQue->que_id)
											{	
										?>
												<div class="capa-tab-panel no">
													<a class="close-btn" href="#"></a>
													<div class="tab-box-1">
														<div class="box-title"><h3>Probel <?php echo $c; ?></h3></div>
														<div class="box-text">
															<p><?php echo $prob->question; ?></p>
														</div>
													</div>
												</div>
								<?php 			$c++; 
											} 
										} ?>                                    
										<!--capa-tab-panel end-->
									
                                        <!--capa-tab-panel start-->
                                    	<div class="capa-tab-panel maybe">
                                        	<a class="close-btn" href="#"></a>
                                            <div class="tab-box-2">
                                            	<div class="question-form">
												<form name="">
												<?php 
													$c=1;
													foreach($extraquestion as $extra)
													{	
														if($extra->que_id==$masterQue->que_id)
														{	
												?>
															<div class="form-row">
																<label><?php echo $extra->question; ?></label>
																<textarea class="textarea" placeholder="Answer would go here"></textarea>
															</div>
															
												<?php
														$c++; 
														} 
													} ?> 
													<div class="form-row text-center">
														<input class="submit-btn" type="submit" value="Submit">
													</div>
												</form>												
                                                </div>
                                            </div>
                                        </div>
                                        <!--capa-tab-panel end-->
                                        <!--capa-tab-panel start-->
                                    	<div class="capa-tab-panel yes">
                                        	<a class="close-btn" href="#"></a>
                                            <div class="tab-box-3">
                                            	<div class="box-title"><h3>Example</h3></div>
                                                <div class="comment-box">
                                                    <div class="comment-area"><textarea>This is the space that is used as an example 
                                                    for this question.</textarea></div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--capa-tab-panel end-->
                                    </div>
                                    <!--capa-tab-content end-->
                                </div>
                            </div>
                            <!--capa-info-slide end-->
						<?php } ?>
						
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><?php */?>
    <!--capa-info-2 modal end-->
    
    <!--capa-info-2 modal start-->
    <div class="main-modal black modal fade" id="myModal-13" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <!--button type="button" class="close" data-dismiss="modal" aria-label="Close"></button-->
                    <a class="close" href="javascript:void(0)" data-dismiss="modal" aria-label="Close" title="Close"></a>
                </div>
                <div class="modal-body">
                    <div class="capa-info-2">
                    	<div class="bxslider nvbxslider" id="master_question_insert">
                        	
                            
                            
                            <?php 
							//echo $nvmodelslider;
							?>
                            
                            
                            
                            
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--capa-info-2 modal end-->
    
    <!--capa-info-2 modal start-->
    <div class="main-modal black modal" id="myModal-23" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <!--button type="button" class="close" data-dismiss="modal" aria-label="Close"></button-->
                    <a class="close" href="javascript:void(0)" data-dismiss="modal" aria-label="Close" title="Close"></a>
                </div>
                <div class="modal-body">
                    <div class="capa-info-2">
                    	<div class="bxslider nvbxsliderparent" id="master_question_insert_parent">
                        	
                            
                           <!--capa-info-slide start-->
                        	<div class="capa-info-slide">
                                <div class="capa-info-2-top">
                                    <div class="text">
                                    	<p>Indiscriminate aduld relationship<br /> (DSM-5 DSED criterion A1 and A4)</p>
                                    </div>
                                </div>
                                <div class="capa-info-2-tab">
                                   
                                    <div class="tab-box-2">
                                        <div class="question-form custom-form">
                                            
                                            <div class="form-row">
                                                <label>Does it worry you?</label>
                                                <textarea class="textarea" placeholder="Answer would go here"></textarea>
                                            </div>
                                            <div class="form-row">
                                                <label>Do you think it's a problem?</label>
                                                <textarea class="textarea" placeholder="Answer would go here"></textarea>
                                            </div>
                                            <div class="form-row">
                                                <label>Has he/she always been like that?</label>
                                                <textarea class="textarea" placeholder="Answer would go here"></textarea>
                                            </div>
                                            <div class="form-row text-center">
                                                <input class="submit-btn" type="submit" value="Submit">
                                            </div>
                                            
                                        </div>
                                    </div>
                                        
                                        
                                </div>
                            </div>
                            <!--capa-info-slide end-->   
                            
                            <!--capa-info-slide start-->
                        	<div class="capa-info-slide">
                                <div class="capa-info-2-top">
                                    <div class="text">
                                    	<p>Indiscriminate aduld relationship<br /> (DSM-5 DSED criterion A1 and A4)</p>
                                    </div>
                                </div>
                                <div class="capa-info-2-tab">
                                	<!--capa-tab start-->
                                	<div class="tab-box-2">
                                        <div class="question-form">
                                            <form name="">
                                                <div class="form-row">
                                                    <label>Does it worry you?</label>
                                                    <textarea class="textarea" placeholder="Answer would go here"></textarea>
                                                </div>
                                                <div class="form-row">
                                                    <label>Do you think it's a problem?</label>
                                                    <textarea class="textarea" placeholder="Answer would go here"></textarea>
                                                </div>
                                                <div class="form-row">
                                                    <label>Has he/she always been like that?</label>
                                                    <textarea class="textarea" placeholder="Answer would go here"></textarea>
                                                </div>
                                                <div class="form-row text-center">
                                                    <input class="submit-btn" type="submit" value="Submit">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!--capa-tab-panel end-->
                                    
                                </div>
                            </div>
                            <!--capa-info-slide end-->                          
                            
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="main-modal black modal fade" id="myModal-24" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <!--button type="button" class="close" data-dismiss="modal" aria-label="Close"></button-->
                    <a class="close" href="javascript:void(0)" data-dismiss="modal" aria-label="Close" title="Close"></a>
                </div>
                <div class="modal-body">
                    <div class="capa-info-2">
                    	<div class="bxslider nvbxsliderparent" id="master_question_insert_parent_sub">
                        	
                            
                           <!--capa-info-slide start-->
                        	<div class="capa-info-slide">
                                <div class="capa-info-2-top">
                                    <div class="text">
                                    	<p>Indiscriminate aduld relationship<br /> (DSM-5 DSED criterion A1 and A4)</p>
                                    </div>
                                </div>
                                <div class="capa-info-2-tab">
                                   
                                    <div class="tab-box-2">
                                        <div class="question-form custom-form">
                                            
                                            <div class="form-row">
                                                <label>Does it worry you?</label>
                                                <textarea class="textarea" placeholder="Answer would go here"></textarea>
                                            </div>
                                            <div class="form-row">
                                                <label>Do you think it's a problem?</label>
                                                <textarea class="textarea" placeholder="Answer would go here"></textarea>
                                            </div>
                                            <div class="form-row">
                                                <label>Has he/she always been like that?</label>
                                                <textarea class="textarea" placeholder="Answer would go here"></textarea>
                                            </div>
                                            <div class="form-row text-center">
                                                <input class="submit-btn" type="submit" value="Submit">
                                            </div>
                                            
                                        </div>
                                    </div>
                                        
                                        
                                </div>
                            </div>
                            <!--capa-info-slide end-->   
                            
                            <!--capa-info-slide start-->
                        	<div class="capa-info-slide">
                                <div class="capa-info-2-top">
                                    <div class="text">
                                    	<p>Indiscriminate aduld relationship<br /> (DSM-5 DSED criterion A1 and A4)</p>
                                    </div>
                                </div>
                                <div class="capa-info-2-tab">
                                	<!--capa-tab start-->
                                	<div class="tab-box-2">
                                        <div class="question-form">
                                            <form name="">
                                                <div class="form-row">
                                                    <label>Does it worry you?</label>
                                                    <textarea class="textarea" placeholder="Answer would go here"></textarea>
                                                </div>
                                                <div class="form-row">
                                                    <label>Do you think it's a problem?</label>
                                                    <textarea class="textarea" placeholder="Answer would go here"></textarea>
                                                </div>
                                                <div class="form-row">
                                                    <label>Has he/she always been like that?</label>
                                                    <textarea class="textarea" placeholder="Answer would go here"></textarea>
                                                </div>
                                                <div class="form-row text-center">
                                                    <input class="submit-btn" type="submit" value="Submit">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!--capa-tab-panel end-->
                                    
                                </div>
                            </div>
                            <!--capa-info-slide end-->                          
                            
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--capa-info-2 modal end-->
    
	
	 <!--clinician-4 modal start-->
    <div class="main-modal black modal fade" id="myModal-14" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <!--button type="button" class="close" data-dismiss="modal" aria-label="Close"></button-->
                    <a class="close" href="javascript:void(0)" data-dismiss="modal" aria-label="Close" title="Close"></a>
                </div>
                <div class="modal-body">
                    
                        	<div class="text-title">
                            	<h1 style="color:fff;">No More Child available! you reached your limit!</h1>
                            </div>
                    
                </div>
            </div>
        </div>
    </div>
    <!--clinician-4 modal end-->
<!-- Modal End -->


<div class="main-modal black modal fade" id="myModal-15" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <!--button type="button" class="close" data-dismiss="modal" aria-label="Close"></button-->
                <a class="close" href="javascript:void(0)" data-dismiss="modal" aria-label="Close" title="Close"></a>
            </div>
            <div class="modal-body">
                <div class="capa-info-2">
                    <div class="bxslider observation-slider">
                        
                        
                        
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!--Thank You Model Start Here-->

    <div class="main-modal black modal fade" id="myModal-123" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="clinician-4">
                    	<div class="clinic-4-top">
                        	<div class="text-title">
                            	<h3>Thank You</h3>
                            </div>
                        </div>
                        <div class="clinic-4-description">
                        	<p>all the answers are saved Sucessfully...</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!--Thank You Model Start Here-->



<!--Thank You Model Start Here-->

    <div class="main-modal black modal fade" id="quesinfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="clinician-4">
                    	<div class="clinic-4-top">
                        	<div class="text-title">
                            	<h3 id="ques_title_info"></h3>
                            </div>
                        </div>
                        <div class="clinic-4-description" id="ques_desc_info">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!--Thank You Model Start Here-->