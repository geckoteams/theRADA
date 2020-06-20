<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Content Start -->   
<section class="content">

    <!--forgot password page start-->
    <div class="forgot-password-content landing-content">
        
        <!--forgot-password-section start-->
    	<div class="forgot-password-section landing-section">
        	<div class="container">
            	<div class="forgot-password-block landing-block">
                	<div class="row">
                    	<div class="col-sm-12">
                        	<div class="welcome-box"><a href="#">Welcome to Capa-Rad.com</a></div>
                        	<div class="forgot-password-form ">
                            	<form action="<?php echo base_url(); ?>/home/resetpassword" id="reset_pass_form" name="forgot" method="post">
                                    <input type="hidden" value="<?php echo $_GET['email']; ?>" name="email">
                                    <input type="hidden" value="<?php echo $_GET['usercode']; ?>" name="usercode">
                                    <div class="form-rowtest">
                                    	<label for="password"></label>
                                        <input class="input-text" type="password" id="password" name="pass" placeholder="Password">
                                    </div>
                                    <div class="form-rowtest">
                                        <input class="input-text" type="password" name="confirm_pass" placeholder="Confirm Password">
                                    </div>
                                    <div class="form-rowtest">
                                        <input class="button" type="submit" value="Submit">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--forgot-password-section end-->
    	 
    </div>
    <!--forgot password page end-->
     
</section>
<!-- Content End -->
