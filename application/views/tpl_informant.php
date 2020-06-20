<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Content Start -->   
<section class="content">
    <!--rpq-info page start-->
    <div class="rpq-info-content">
        <!--rpq-info-section start-->
    	<div class="rpq-info-section">
        	<div class="container">
            	<div class="rpq-info-block">
                	<div class="row">
                    	<div class="col-sm-12">
                        	<div class="welcome-box"><a href="#">Welcome to Capa-Rad.com</a></div>
                            <div class="rpq-info-box">
                            	<div class="admin-name">Joe Bloggs</div>
                                <div class="info-text">Informant:- TEACHER<br>for</div>
                                <div class="rpq-info-select">
                                	<div class="select-row">
                                        <select class="selectpicker childnm">
                                            <option data-id="">Name of Child</option>
                                            <?php foreach($childs as $child ){
													echo '<option data-id="'.$child->id.'">'.$child->name.'</option>';
											} ?>
                                        </select>
                                    </div>
                                    <div class="select-row">
                                        <select class="selectpicker questiontype">
                                            <option data-type="RPQ">RPQ</option>
                                            <option data-type="CAPA-RAD">CAPA-RAD</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="rpq-info-btn-row">
                                <div class="center-icon">
                                	<a href="#" data-toggle="modal" data-target="#myModal-13">
                                    <img src="<?php echo base_url("public/images/appproval-icon-outlined.svg"); ?>" alt=""></a>
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
<!-- Content End -->