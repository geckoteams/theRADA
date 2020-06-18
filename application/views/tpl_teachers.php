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
                                  <!--<div class="admin-name">Joe Bloggs</div>-->
                                <div class="info-text">Informant:- TEACHER<br>for</div>
                                <div class="rpq-info-select">
                                	<div class="select-row">
                                    	<?php
										$nvchildsession = $this->session->userdata('childsession');
										?>
                                        <select class="selectpicker childsel triggeron" id="child" name="child">
                                        <option value="">Name of Child</option>
                                        <?php
                                        foreach($CHILD_DATA as $child)
                                        {
											if($nvchildsession == $child->id)
											{
												?>
                                                <option value="<?php echo $child->id; ?>" selected="selected"><?php echo $child->name; ?></option>
                                                <?php
											}
											else
											{
												?>
                                                <option value="<?php echo $child->id; ?>"><?php echo $child->name; ?></option>
                                                <?php
											}
											
                                        }
                                        ?>
                                        </select>
                                    </div>
                                    <input type="hidden" name="survey" value="rpq" class="surveytype" id="survey" />
                                    <!--<div class="select-row">
                                        <select class="selectpicker surveytype" name="survey" id="survey">
                                            <option value="rpq">RPQ</option>
                                            <option value="capa-rad">CAPA-RAD</option>
                                        </select>
                                    </div>-->
                                </div>
                            </div>
                            <input type="hidden" name="hidden_child_techer" id="hidden_child_techer" value="" />
                            <input type="hidden" name="hidden_survy_techer" id="hidden_survy_techer" value="" />
                            <input type="hidden" name="user_role" id="user_role" value="<?php echo $this->session->userdata('role');?>"/>
                            <div class="rpq-info-btn-row" style="display:none;">
                                <div class="center-icon">

									<a href="javascript:void(0)" id="showSurveytecher" ><img src="<?php echo base_url('public/images/appproval-icon-outlined.svg'); ?>" alt=""></a>
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
<script language="javascript">
$(document).ready(function(e) {
    $('body').delegate('.triggeron','change',function(){
		$( "#showSurveytecher" ).trigger( "click" );
	});
});
</script>