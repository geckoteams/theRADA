<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- Content Start -->   
<section class="content">
    <!--admin page start-->
    <div class="admin-content">
        <!--admin-section start-->
    	<div class="admin-section">
        	<div class="container">
            	<div class="admin-block">
                	<div class="row">
                    	<div class="col-sm-12">
                        	<div class="admin-header">
                            	<div class="left-icon">
								<!-- data-toggle="modal" data-target="#myModal-6-->
                                	<a href="#" class="display-graph" title="View Child Space"><img src="<?php echo base_url('public/images/question-mark.svg') ?>" alt=""></a>
                                </div>
                               
                                <div class="right-icon-logout">
                                	<a href="<?php echo base_url('home/logout'); ?>" title="Logout"><img src="<?php echo base_url("public/images/logout-icon.svg"); ?>" alt=""></a>
                                </div>
                                
                                 <div class="right-icon ">
                                	<a href="#" data-toggle="modal" data-target="#myModal-4" title="Edit Profile"><img src="<?php echo base_url("public/images/user-icon.svg") ?>" alt=""></a>
                                </div>
                                
                                <div class="admin-name"><?php echo $username; ?></div>
                            </div>
                        	<div class="admin-box">
                            	<div class="select-row">
                                	<select class="selectpicker">
                                    	<option>Administrator</option>
                                    </select>
                                </div>
                                <div class="select-row">
								
								<div class="custome-selectbox">
                                    	<div class="selectbox">
                                        	<span class="filter-option groupfliter">Group</span>
                                        	<span class="caret"></span>
                                        </div>
                                        <div class="select-dropdown getchild groupdrop">
                                        	<ul>
                                            	<li>
                                                	<a href="#">New</a>
                                                    <a href="javascript:void(0);" class="icon-1 inactive add-newgroup" data-group=""  data-userid="" value="" title="Add New Group"></a>
                                                </li>
											<?php
											
												foreach($data as $name)
												{ 
											
                                                echo'<li class="'.$name->group_id.'-groupupdate">
                                                	<a class="findchild" data-group="'.$name->group_id.'" data-userid="'.$name->createdby.'" value="'.$name->createdby.'" href="#">'.$name->group_name.'</a><a class="icon-1 pencil edit-group-name" href="#" data-file="'.$name->filename.'" data-group="'.$name->group_id.'" data-groupnm="'.$name->group_name.'" title="Edit Group"></a></li>';
                                                   	/*
													<a class="icon-2 pencil editgroup" data-editid="'.$name->group_id.'" href="#"></a>
                                                    <a class="icon-1 deletegroup" data-delete="'.$name->group_id.'" href="#" data-toggle="modal" data-target="">delete</a>*/
											} ?>
                                            </ul>
                                        </div>
                                    </div>
									
									
                                	<!--select id="selectgroup" class="selectpicker getchild">
                                    	<option data-group=""  data-userid="" value="">Group</option>
										<option data-group=""  data-userid="" value="" class="add-newgroup">ADD NEW</option>
								  <?php foreach($data as $name)
										{ 
											echo '<option class="" data-group="'.$name->group_id.'" data-userid="'.$name->createdby.'" value="'.$name->createdby.'">'.$name->group_name.'</option>';
										}
                                    ?>
									
                                    </select-->
                                </div>
                                <div class="select-row">
                                	<div class="custome-selectbox">
                                    	<div class="selectbox">
                                        	<span class="filter-option childrenselected">Children</span>
                                        	<span class="caret"></span>
                                        </div>
                                        <div class="select-dropdown childrendrop">
                                        	
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="admin-footer">
                            	<div class="left-icon"><a href="#" title="Delete"><img src="<?php echo base_url("public/images/rubbish-bin-icon-outlined.svg") ?>" alt=""></a></div>
                                <!--<div class="center-icon"><a href="<?php echo base_url('home/logout'); ?>" title="Logout"><img src="<?php echo base_url("public/images/download-outlined.svg") ?>" alt=""></a></div>-->                                
                                <div class="csv_data">	
                                
									<?php if($this->session->flashdata('message')){?>
												<div align="center" class="alert alert-success">      
													<?php echo $this->session->flashdata('message')?>
												</div>	
										<?php } ?>

										
									<div align="center">
                                    
										<form action="<?php echo base_url(); ?>admin/import" method="post" name="upload_excel" enctype="multipart/form-data" id="importform">
                                        	<div class="fileUpload btn btn-primary">
    										<span></span>
    										<input type="file" name="file" id="file" class="upload" />
											</div>
											
											<input type="hidden" name="import" value="import" />
										</form>
                                        <!--<input type="button" name="import" value="Import" onclick = "return confirmmessage()" />-->
										<br><br>
									</div>									
								</div>
                                <div class="right-icon"><a href="#" title="Submit"><img src="<?php echo base_url("public/images/appproval-icon-outlined.svg") ?>" alt=""></a></div>
								
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--admin-section end-->
    	 
    </div>
    <!--admin page end-->
     
</section>
<!-- Content End -->
<script type="text/javascript">
function submitform(){

	var imgpath = document.getElementById('file').value;
	
	
	var arr1 = new Array;
	arr1 = imgpath.split("\\");
	var len = arr1.length;
	var img1 = arr1[len-1];
	var filext = img1.substring(img1.lastIndexOf(".")+1);
	if(filext == "csv")
	{
		//return false;
		$('#importform').submit();
		$('#confirm').modal("hide");
		return true;							
	}
	else
	{
		alert("Invalid File Format Selected. please upload only .csv file");
		document.getElementById('file').value="";
		document.form.file.focus();
		return false;
	}					
					
}

function confirmmessage(){
	$.ajax({
				type: "POST",
				url: base_url+'/admin/confirmmessage',				
				cache: false,
				success: function(res) 
				{	
					$('.confirmmessage').html('you have only('+res+') space.');
					$('#confirm').modal("show");
				}
	});	
		
}
$('#file').change(function() {
  confirmmessage();	  
});
</script>

<!--login-singup modal start-->
    <div class="main-modal modal fade" id="confirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>-->
                </div>
                <div class="modal-body">
                	<div class="login-singup">
                    	
                        <div class="login-singup-form">                            
                                
                                <div class="form-row">
                                    <h2 class="confirmmessage"></h2>
                                </div>
                                
                                <div class="form-row">
                                <div class="ok">
                                    <input class="button" type="button" value="OK" onclick = "return submitform()">                                    
                                </div>
                                <div class="cancle">
                                   <input class="button" type="button" value="Cancel" data-dismiss="modal" aria-label="Close">
                                </div>    
                                </div>                                
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--login-singup modal end-->