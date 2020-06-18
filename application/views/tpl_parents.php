<section class="content">

    <!--rpq-info page start-->
    <div class="rpq-info-content">
        
        <!--rpq-info-section start-->
    	<div class="rpq-info-section">
        	<div class="container">
            	<div class="rpq-info-block">
                	<div class="row">
                    	<div class="col-sm-12">
                        <div class="welcome-box">
                        	<a href="#">Welcome to Capa-Rad.com</a>
                            <div class="text-right logout-custom">
                            	<a href="<?php echo base_url('home/logout'); ?>" title="Logout"><img src="<?php echo base_url("public/images/logout-icon.svg"); ?>" alt=""></a>
                        	</div>
                        </div>
                            <div class="rpq-info-box">
                            	<!--<div class="admin-name"><?php //echo $nvUsername;?></div>-->
                                <div class="info-text">Informant:- Parents<br>for</div>
                                <div class="rpq-info-select">
                                	<div class="select-row">
                                        <select class="selectpicker childsel" id="child" name="child">
                                        <option value="">Name of Child</option>
                                        <?php
                                        foreach($CHILD_DATA as $child)
                                        {
                                        ?>
                                        <option value="<?php echo $child->id; ?>"><?php echo $child->name; ?></option>
                                        <?php
                                        }
                                        ?>
                                        </select>
                                    </div>
                                    <div class="select-row">
                                        <select class="selectpicker surveytype" name="survey" id="survey">
                                            <option value="rpq">RPQ</option>
                                            <option value="capa-rad">CAPA-RAD</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="hidden_child_parent" id="hidden_child_parent" value="" />
                            <input type="hidden" name="hidden_survy_parent" id="hidden_survy_parent" value="" />
                            <input type="hidden" name="user_role" id="user_role" value="<?php echo $this->session->userdata('role');?>"/>
                            <div class="rpq-info-btn-row">
                                <div class="center-icon">

									<a href="javascript:void(0)" id="showSurveyparent" title="Submit" ><img src="<?php echo base_url('public/images/appproval-icon-outlined.svg'); ?>" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--rpq-info-section end-->
    	 
    </div>
    <!--rpq-info page end-->
    
</section>
