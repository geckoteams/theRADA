<!-- DateTimepicker Start -->
var alphabar=['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z'];
var bx;
$( function() {
	
	
	$( ".dateBirdy").datepicker({
		dateFormat: "dd/mm/yy",
	});
	
	$( "#datepicker" ).datepicker({
		dateFormat: "dd MM, yy",
		altField: "#myModal-12 #setDateEvet",
      	altFormat: "dd MM, yy 00:00-00:00",
	 	onSelect: function(dateText, inst) {
        	var date = $(this).val();
			
        	var selectpickerStartEventH = $('.selectpickerStartEventH').val();
			var selectpickerStartEventM = $('.selectpickerStartEventM').val();
			var selectpickerEndEventH = $('.selectpickerEndEventH').val();
			var selectpickerEndEventM = $('.selectpickerEndEventM').val();
			$("#myModal-12 #eventDateModal").val(date);
			$("#myModal-12 #setDateEvet").val(date+' '+selectpickerStartEventH+':'+selectpickerStartEventM+'-'+selectpickerEndEventH+':'+selectpickerEndEventM);
			
	    }
	});
	
	
});

<!-- DateTimepicker End -->
$(document).ready(function(){
	function showalert(type,msg)
	{
		if(type == "error")
		{
			aler = '<div class="alert errormsg">'+msg+'</div>';
		}
		else
		{
			aler = '<div class="alert sucessmsg">'+msg+'</div>';
		}
		setTimeout(function() {
					jQuery('.alert').fadeOut('slow');
				}, 7000);			
		return aler;
	}
	
	$('#registration_form').ajaxForm({
	beforeSubmit:function(){
	$anim.show();
	},	
	success:function(res)
	{
		
		var obj = jQuery.parseJSON(res);
		if(obj.result == 'error')
		{
			msg = showalert('error',obj.msg);
			jQuery('#myModal-2 .landing-5-form').prepend(msg);
		}
		else
		{
			//base_url
			window.location.href = base_url+'checkout/?insID='+obj.insid;
			msg = showalert('success',obj.msg);
			jQuery('#myModal-2 .landing-5-form').prepend(msg);	
		} 
	$anim.hide();
	}}) 
	 
	$('#login_form').ajaxForm({
		beforeSubmit:function()
		{
				$anim.show();
		},
		success:function(res){
		$anim.hide();
		var obj = jQuery.parseJSON(res);
		var redirect = obj.redirect;

		 if(obj.result == 'error')
		{
			msg = showalert('error',obj.msg);
			jQuery('#myModal .login-singup-form').prepend(msg);
		}
		else
		{
			msg = showalert('success',obj.msg);
			jQuery('#myModal .login-singup-form').prepend(msg);	
			window.location=redirect;
		} 

	}}) 
	
	$('#forgot_pass_form').ajaxForm({beforeSubmit:function(){
	
			$anim.show();
	},success:function(res){
		var obj = jQuery.parseJSON(res);
		 if(obj.result == 'error')
		{
			msg = showalert('error',obj.msg);
			jQuery('#myModal-fpassword .login-singup-form').prepend(msg);
		}
		else
		{
			msg = showalert('success',obj.msg);
			jQuery('#myModal-fpassword .login-singup-form').prepend(msg);	
		} 
				$anim.hide();
	}})
	
	$('#reset_pass_form').ajaxForm({
		beforeSubmit:function()
		{
			$anim.show();
		}
		,success:function(res){
		var obj = jQuery.parseJSON(res);
		 if(obj.result == 'error')
		{
			$anim.hide();
			msg = showalert('error',obj.msg);
			jQuery('.forgot-password-form').prepend(msg);
			
		}
		else
		{
			$anim.hide();
			msg = showalert('success',obj.msg);
			jQuery('.forgot-password-form').prepend(msg);	
			
		} 
		$anim.hide();
	}})
	
	$('#updProdileData').ajaxForm(
	{
	beforeSubmit:function(){
	
				$anim.show();
	},
		success:function(res){

		var obj = jQuery.parseJSON(res);
		
		 if(obj.result == 'error')
		{
			msg = showalert('error',obj.msg);
			jQuery('#myModal-4 .admin-3-form').prepend(msg);
			$anim.hide();
			
		}
		else
		{
			msg = showalert('success',obj.msg);
			jQuery('#myModal-4 .admin-3-form').prepend(msg);
			$anim.hide();
			jQuery("#myModal-4").modal("hide");
		} 
			//	$anim.show();
	}})
	
	/*$('#myModal-5 .addChildren').ajaxForm(function(res){
		var obj = jQuery.parseJSON(res);
		
		if(obj.result == 'error')
		{
			msg = showalert('error',obj.msg);
			jQuery('#myModal-5 .admin-6-form').prepend(msg);
			$anim.hide();
		}
		else
		{
			
			msg = showalert('success',obj.msg);
			jQuery('#myModal-5 .admin-6-form').prepend(msg);
			
			jQuery("#myModal-5").modal("hide");
			//alert(obj.output);
			if(obj.output!="")
			{
				$('.select-dropdown.childrendrop ul').append(obj.output);
			}
			if(obj.updateoutput!="")
			{
				$('.'+obj.replaceclass).replaceWith(obj.updateoutput);
				
			}
			
		} 
	})*/
	$('#myModal-5 .addChildren').ajaxForm({
		beforeSubmit:function()
		{
			$anim.show();
		},
		success:function(res){
			var obj = jQuery.parseJSON(res);
			if(obj.result == 'error')
			{
				msg = showalert('error',obj.msg);
				jQuery('#myModal-5 .admin-6-form').prepend(msg);
				$anim.hide();
			}
			else
			{
				
				msg = showalert('success',obj.msg);
				jQuery('#myModal-5 .admin-6-form').prepend(msg);
				
				jQuery("#myModal-5").modal("hide");
				//alert(obj.output);
				if(obj.output!="")
				{
					$('.select-dropdown.childrendrop ul').append(obj.output);
				}
				if(obj.updateoutput!="")
				{
					$('.'+obj.replaceclass).replaceWith(obj.updateoutput);
					
				}
				$anim.hide();
			} 
			
		}
	})
	
	$('#admin-create-new-group .create-group').ajaxForm({
		beforeSubmit:function()
		{
		
			$anim.show();


		},
		success:function(res){
		var obj = jQuery.parseJSON(res);
		if(obj.result == 'error')
		{
			msg = showalert('error',obj.msg);
			jQuery('.forgot-password-form').prepend(msg);
		}
		else
		{
			msg = showalert('success',obj.msg);
			jQuery('.forgot-password-form').prepend(msg);
			if(obj.output!="")
			{
				$('.groupdrop ul').append(obj.output);
				//$('select.getchild').selectpicker('refresh');
			}
			if(obj.outputupdate!="")
			{
				$('.'+obj.replaceclass).replaceWith(obj.outputupdate);
			}
			$("#admin-create-new-group .create-name").val('');
			$("#admin-create-new-group .groupid").val('');
			//$("#admin-create-new-group").modal("hide");
			
			
		} 
		$anim.hide();
	}})
	
	$('body').delegate('.edit-group-name','click',function(){
		var groupID = $(this).attr("data-group");
		var groupnm = $(this).attr("data-groupnm");
		var filenm = $(this).attr("data-file");
		$anim.show();
		$.ajax({
			type: "POST",
			url: base_url+'admin/groupeditmodel',
			data: {groupID:groupID,groupnm:groupnm,filenm:filenm},
			cache: false,
			success: function(res) 
			{	
				$("#edit-group-form").attr("data-groupid",groupID);
				$("#edit-group-form").html(res);
				$('#admin-edit-group').modal("show");
				$anim.hide();
			}
		});
		
	});
	
	
	
	$( '#edit-group-form' ).submit( function( e ) {
		var groupID = $(this).attr("data-groupid");
		
		$anim.show();
		$.ajax( {
		  url: base_url+'admin/groupupdate',
		  type: 'POST',
		  data: new FormData( $(this)[0] ),
		  cache: false,
		  processData: false,
		  contentType: false,
		  success: function(res) 
		  {
			  //alert(res);
			  $('.'+groupID+'-groupupdate').replaceWith(res);
				$('#admin-edit-group').modal("hide");
				$anim.hide();
		  }
		} );
		e.preventDefault();
  } );
	
	
	
	
	$('body').delegate('.admin-edit-group','click',function(){
		var groupid = $("#edit-group-id").val();
		var groupName = $("#edit-group-nm").val();
		
		$anim.show();
		if(groupid > 0)
		{
			$.ajax({
				type: "POST",
				url: base_url+'admin/groupupdate',
				data: {groupid:groupid,groupName:groupName},
				cache: false,
				success: function(res) 
				{
					if(res != "")
					{
						$('.'+groupid+'-groupupdate').replaceWith(res);
						$('#admin-edit-group').modal("hide");
						$anim.hide();
					}
				    
				}
			});
		}
	});
	//admin-edit-group
	
	$('body').delegate('.selectchange','change',function(){
		
	var centerId = $('.selectchange').val();
	$.ajax({
		type: "POST",
		url: base_url+'/home/getCenter',
		data: {centerId:centerId},
		cache: false,
		success: function(res) 
		{	
			//alert(res);
			$('.landing-6-form.replaceData').html(res);
		}
	});

});
	
	$('body').delegate('#selectgroup','change',function(){
	var groupid=$(this).find(':selected').data('group');
	var userid=$(this).find(':selected').data('userid');
	var centerId = $('.selectchange').val();
		
			$.ajax({
				type: "POST",
				url: base_url+'/admin/getChildren',
				data: {centerId:centerId,groupid:groupid,userid:userid},
				cache: false,
				success: function(res) 
				{	
					$('.select-dropdown.childrendrop').html(res);
				}
			});
		

	});
	$('body').delegate(".icon-1.addchild",'click',function(){
		var gid=$(this).data("groupid");
		var uid=$(this).data("userid");
		$.ajax({
			type: "POST",
			url: base_url+'admin/addNewChildren',
			data: {groupid:gid,userid:uid},
			cache: false,
			success: function(res) 
			{	
				
				$("#myModal-5 .addChildren").html(res);
				$('.selectpicker').selectpicker('refresh');
				$('#myModal-5').modal("show");
				$( ".dateBirdy").datepicker({
						dateFormat: "MM dd, yy",
					});				
			}
		});

	});	
	
	$('body').delegate(".eye.editchild",'click',function(){
		var gid=$(this).data("groupid");
		var uid=$(this).data("userid");
		var childid=$(this).data("childid");
		$.ajax({
			type: "POST",
			url: base_url+'/admin/editChildren',
			data: {gid:gid,uid:uid,childid:childid},
			cache: false,
			success: function(res) 
			{	
				
				$("#myModal-5 .addChildren").html(res);
				$( ".dateBirdy").datepicker({
						//dateFormat: "yy-mm-dd",
						dateFormat: "MM dd, yy",
					});				
				$('.selectpicker').selectpicker('refresh');
				
			}
		});
		
	});	

	$('body').delegate("#myModal-5 .delete-btn",'click',function()
	{
		var id=$(this).data("id");
		var grupid=$(this).data("grupid");
		if(confirm('Are you sure want to delete?'))
		{
			$.ajax({
				type: "POST",
				url: base_url+'/admin/deleteChild',
				data: {id:id,grupid:grupid},
				cache: false,
				success: function(res) 
				{	
					location.reload();							
				}
			});
		}
	});	


	$('body').delegate('.eye.observation',"click", function(e)
	{
			e.preventDefault();
			var groupid=$(this).data("group");
			var userid=$(this).data("userid");
			$anim.show();
	});


	$('body').delegate('.childview','click',function(){
	
		$(".childview").prop("checked",false);
		$(this).prop("checked",true);
		$(".rowrpq").hide();
		if($(this).val()=='I')
		{
			$("#rowI").show();
		}
		if($(this).val()=='R')
		{
			$("#rowR").show();
		}


	
	});

	
	/* $('body').delegate(".select-dropdown .add-newgroup",'click',function()
	{
		$('#admin-create-new-group').modal("show");
	});	
		 */
		
	$('body').delegate(".display-graph",'click',function()
	{
		$.ajax({
				type: "POST",
				url: base_url+'/admin/displayGraph',
				cache: false,
				success: function(res) 
				{	
					//var obj = jQuery.parseJSON(res);
					
							
					$('.admin-8-graph').append(res);
					
					$('#myModal-6').modal("show");
					
				}
			});
	});		
	$('body').delegate(".select-dropdown.getchild .add-newgroup",'click',function()
	{
		$('#admin-create-new-group').modal("show");
	});	

	$('body').delegate(".select-dropdown.getchild .findchild",'click',function(e)
	{
		e.preventDefault();
		$('.custome-selectbox').removeClass("open");
		var groupid=$(this).data('group');
		var userid=$(this).data('userid');
		$anim.show();
		$.ajax({
			type: "POST",
			url: base_url+'/admin/getChildren',
			data: {groupid:groupid,userid:userid},
			cache: false,
			error:function()
			{
				$anim.hide();
			},
			success: function(res) 
			{	
				$('.select-dropdown.childrendrop').html(res);
				$anim.hide();
			}
		});

		return false;
	});	
	$('body').delegate(".select-dropdown.getchild .editgroup",'click',function()
	{
		//$('#admin-create-new-group').modal("show");
		var groupid=$(this).data('editid');
		$.ajax({
			type: "POST",
			url: base_url+'/admin/editGroup',
			data: {groupid:groupid},
			cache: false,
			error:function(x,y,z)
			{
				$anim.hide();
			},
			success: function(res) 
			{	
				r = res.split("##");
				$("#admin-create-new-group .groupid").val(r[0]);
				$("#admin-create-new-group .create-name").val(r[1]);
				$('#admin-create-new-group').modal("show");
				$anim.hide();
			}
		});
	});	
	
	$('body').delegate(".select-dropdown.getchild .deletegroup",'click',function()
	{
		if(confirm('Are you sure want to delete?'))
		{
			var groupid=$(this).data('delete');
			$anim.show();
			$.ajax({
				type: "POST",
				url: base_url+'/admin/deleteGroup',
				data: {groupid:groupid},
				cache: false,
				error:function(x,y,z)
				{
						$anim.hide();
				},
				success: function(res) 
				{	
					$("."+res).hide();
					$anim.hide();
				}
			});
		}
	});	
	
	
	
	$('body').delegate('.rpq-info-content .rpq-info-box .questiontype','change',function(){
	var type=$(".childnm").find(':selected').data('id');
	var userid=$(this).find(':selected').data('type');
	alert(type);
	
	var centerId = $('.selectchange').val();
	if(type!="")
	{}
		
			});	
			
			
			$('body').delegate('.rpq-info-content .rpq-info-block .callquestion','click',function(){
			var type=$(".childnm").find(':selected').data('id');
			var userid=$(".questiontype").find(':selected').data('type');
			$anim.show();
			$.ajax({
				type: "POST",
				url: base_url+'/informant/giveAnswers',
				data: {type:type,userid:userid},
				cache: false,
				error:function(x,y,z)
				{
					$anim.hide();
				},
				success: function(res) 
				{	
					$('#myModal-13 .capa-info-2 .bxslider').html(res);
					slider = $('.bxslider').bxSlider({
						hideControlOnEnd:true,
						infiniteLoop:false
					});
					$('#myModal-13').modal("show");
					$anim.hide();
				}
			}); 
		});	
		$("body").delegate("#showSurvey","click",function()
		{
	var err=false;
	var msg='';
			if($("#child:selected").val()=='')
			{
				msg = msg + " * Select Child first";
				err=true;
			}
		});


		$("body").delegate(".admin_observation","click",function(){
			
			var child_id= $(this).data("userid");
			var group_id= $(this).data("groupid");
			var modal =  $(this).data("modal");
			var nvChildID = $(this).attr("data-childid");
			var filenm = $(this).attr("data-file");
			$anim.show();
			$.ajax({
			url:base_url +"/admin/observationUser",
			type:"POST",
			data:{groupid:group_id, childid:child_id},
			success:function(response)
			{
				var data =$.parseJSON(response);
				$("#modal_child_name").html(data.name);
				$("#frmchildobservation").find("#child_id").val(data.user_id);
				$("#frmchildobservation").find("#group_id").val(data.group_id);
				
				$(".rpqchildrenemail").attr("data-rpqchildren",nvChildID);
				$(".rpqchildrenemail").attr("data-rpquserid",child_id);
				
				$(".loginaction").attr("data-groupid",group_id);
				$(".loginaction").attr("data-childid",nvChildID);
				$(".loginaction").attr("data-techeruserid",child_id);
				
				$("#doc_download").attr("href",filenm);
				$(".childview").prop("checked",false);
				$(".rowrpq").hide();
				$(modal).modal('show');
				$anim.hide();
			}
			});
		});
		
		//redirect loginpage code start here
		$("body").delegate(".loginaction","click",function(){
			var logintype = $(this).attr("id");
			var childid = $(this).attr("data-childid");
			var groupid = $(this).attr("data-groupid");
			var userid = $(this).attr("data-techeruserid");
			$.ajax({
				url:base_url +"admin/redirectlogin",
				type:"POST",
				data:{logintype:logintype,childid:childid,groupid:groupid,userid:userid},
				success:function(response)
				{
					//alert(response);
					window.location = response;
				}
			});
		});
		//redirect loginpage code end here
		
		//rpqchildrenemail
		$("body").delegate(".rpqchildrenemail","click",function(){
			var childID = $(this).attr("data-rpqchildren");
			var datatype = $(this).attr("data-type");
			$.ajax({
				url:base_url +"admin/addinformation",
				type:"POST",
				data:{childID:childID,datatype:datatype},
				success:function(response)
				{
					//alert(response);
				}
			});
		});
		
		$("body").delegate("#sent_teach_rpq","click",function(e){
			e.preventDefault();
			$anim.show();
			$.ajax({
			url:base_url + "/admin/sendRpq",
			type:"POST",
			data: $("#frmchildobservation").serialize(),
			success:function(response)
			{
				if(response == "fail")
				{
					var emailmessage = "Email sending failed..."
					msg = showalert('error',emailmessage);
					jQuery('#myModal-7 .admin-4-top').prepend(msg);
				}
				else
				{
					var emailmessage = "Email send sucessfully..."
					msg = showalert('success',emailmessage);
					jQuery('#myModal-7 .admin-4-top').prepend(msg);
				}
				$anim.hide();
			}
			});

		
		return false;
		});
		
		
		
		$("body").delegate("#showSurveytecher","click",function(e){
			e.preventDefault();
			var childid = $(".childsel").val();
			var childnm = $( ".childsel option:selected" ).text();
			
			$("#hidden_child_techer").val(childid);
			var questiontype = $(".surveytype").val();
			$("#hidden_survy_techer").val(questiontype);
			var userrole = $("#user_role").val();
			if(questiontype == "rpq" && childid > 0)
			{
				$anim.show();
				$(".userrole").html(userrole);
				$(".child-nm").html(childnm);
				
				$.ajax({
					url:base_url + "teachers/question_teacher",
					type:"POST",
					data: {userrole:userrole,childid:childid},
					success:function(response)
					{
						
						$("#question_insert").replaceWith(response);
						if(bx != undefined)
						{
							bx.destroySlider();
						}
						/*bx = $("#question_insert").bxSlider({
								
								hideControlOnEnd:false,
								infiniteLoop:false,
								pager: true, 
								pagerType: 'short',
						});
						
						var allslidecount = bx.getSlideCount();
						var currentslide = 1;
						$(document).on('click','.bx-next', function(){
							if(currentslide == allslidecount)
							{
								$("#myModal-12").modal('hide');	
								currentslide = 0;
							}
							currentslide++;
						});*/
						
						
						bx = $("#question_insert").bxSlider({
								hideControlOnEnd:false,
								infiniteLoop:false,
								pager: true, 
								pagerType: 'short',
								onSlideAfter: function($slideElement, oldIndex, newIndex){
										
								var total1	= bx.getSlideCount();
								var total2	= bx.getCurrentSlide()+1;
								
								if(total1==total2)
								{
									$(".bx-controls-direction .bx-next").addClass("finalstep13");
									//$("#myModal-12").modal('hide');
									//$(".nvbxsliderparent .bx-controls-direction .bx-next").attr("id",QuestionID);
								}
								else
								{
									$(".bx-controls-direction .bx-next").removeClass("finalstep13");
									//$(".nvbxsliderparent .bx-controls-direction .bx-next").attr("id","");
								}
							  },
						});
						
						
						
						$("#myModal-12").modal('show');
						 $(window).trigger('resize');
						 setTimeout(function(){ 						 
						 bx.reloadSlider();
						 $( ".bx-viewport" ).css( "height", "");
						 $(".bx-prev").attr("title","Go to previous question");
						 $(".bx-next").attr("title","Go to next question");
						 },300);
						
						$anim.hide();
					}
				});
				
			}
			
			if(questiontype == "capa-rad" && childid > 0)
			{
				
				$("#hidden_capa_childid").val(childid);
				$anim.show();
				$.ajax({
					url:base_url + "teachers/master_teacher_question",
					type:"POST",
					data: {childid:childid},
					success:function(response)
					{
						$("#master_question_insert").replaceWith(response);
						if(bx != undefined)
						{
							bx.destroySlider();
						}
						bx = $(".nvbxslider").bxSlider({
										hideControlOnEnd:false,
										infiniteLoop:false,
										pager: true, 
										pagerType: 'short',
								});
						
						$(".main-modal .capa-info-2 .capa-tab li a.no").click(function(event){
							event.preventDefault();
							$(this).parent().parent().parent().next().children().hide();
							$(this).parent().parent().parent().next().children(".capa-tab-panel.no").show();
						});
						$(".main-modal .capa-info-2 .capa-tab li a.maybe").click(function(event){
							event.preventDefault();
							$(this).parent().parent().parent().next().children().hide();
							$(this).parent().parent().parent().next().children(".capa-tab-panel.maybe").show();
						});
						$(".main-modal .capa-info-2 .capa-tab li a.yes").click(function(event){
							event.preventDefault();
							$(this).parent().parent().parent().next().children().hide();
							$(this).parent().parent().parent().next().children(".capa-tab-panel.yes").show();
						});
						$(".main-modal .capa-info-2 .capa-tab-panel .close-btn").click(function(event){
							event.preventDefault();
							$(this).parent().hide();
						});	
						
						
						var allslidecount = bx.getSlideCount();
						var currentslide = 1;
						/*$(document).on('click','.bx-next', function(){
							
							if(currentslide == allslidecount)
							{
								$("#myModal-13").modal('hide');	
								currentslide = 0;
							}
							currentslide++;
						});*/
							
						$("#myModal-13").modal('show');
						$(window).trigger('resize');
						setTimeout(function(){ 						 
						bx.reloadSlider();
						$( ".bx-viewport" ).css( "height", "");
						},300);
						
						$anim.hide();
					}
				});
				//alert(hidden_capa_childid);
				
				//$("#myModal-13").modal('show');
				
			}
			
		});
		
		$("body").delegate(".selanswer","click",function(e){
			$anim.show();
			var questionID = $(this).attr("data-question");
			var answer = $(this).val();
			var txtchildren_id = $("#txtchildren_id").val();
			var txtuser_id = $("#txtuser_id").val();
			
			
			$.ajax({
				url:base_url + "teachers/teacher_answer",
				type:"POST",
				data: {questionID:questionID,answer:answer,txtchildren_id:txtchildren_id},
				success:function(response)
				{
					if(response)
					{
						$anim.hide();
					}
					
				}
			});
			
		});
		
		
		$("body").delegate("#showSurveyparent","click",function(e){
			//e.preventDefault();
			var childid = $(".childsel").val();
			$("#hidden_child_parent").val(childid);
			var questiontype = $(".surveytype").val();
			$("#hidden_survy_parent").val(questiontype);
			var userrole = $("#user_role").val();
			var childnm = $( ".childsel option:selected" ).text();
			
			
			
			if(questiontype == "rpq" && childid > 0)
			{
				$anim.show();
				$(".userrole").html(userrole);
				$(".child-nm").html(childnm);
				$.ajax({
					url:base_url + "parents/question_teacher",
					type:"POST",
					data: {userrole:userrole,childid:childid},
					success:function(response)
					{
						$("#question_insert").replaceWith(response);

						
						if(bx != undefined)
						{
							bx.destroySlider();
						}

						/*bx = $("#question_insert").bxSlider({
								hideControlOnEnd:false,
								infiniteLoop:false,
								pager: true, 
								pagerType: 'short',
						});
						
						var allslidecount = bx.getSlideCount();
						var currentslide = 1;
						$(document).on('click','.bx-next', function(){
							if(currentslide == allslidecount)
							{
								$("#myModal-12").modal('hide');	
								currentslide = 0;
							}
							currentslide++;
						});*/
						bx = $("#question_insert").bxSlider({
								hideControlOnEnd:false,
								infiniteLoop:false,
								pager: true, 
								pagerType: 'short',
								onSlideAfter: function($slideElement, oldIndex, newIndex){
										
								var total1	= bx.getSlideCount();
								var total2	= bx.getCurrentSlide()+1;
								
								if(total1==total2)
								{
									$(".bx-controls-direction .bx-next").addClass("finalstep13");
									//$("#myModal-12").modal('hide');
									//$(".nvbxsliderparent .bx-controls-direction .bx-next").attr("id",QuestionID);
								}
								else
								{
									$(".bx-controls-direction .bx-next").removeClass("finalstep13");
									//$(".nvbxsliderparent .bx-controls-direction .bx-next").attr("id","");
								}
							  },
						});
						$("#myModal-12").modal('show');
						
						 $(window).trigger('resize');
						 setTimeout(function(){ 						 
						 bx.reloadSlider();
						$( ".bx-viewport" ).css( "height", ""); 
						$(".bx-prev").attr("title","Go to previous question");
						$(".bx-next").attr("title","Go to next question");
						 },300);
						
						$anim.hide();
					}
				});
				
			}
			
			if(questiontype == "capa-rad" && childid > 0)
			{
				
				$("#hidden_capa_childid").val(childid);
				$anim.show();
				$.ajax({
					url:base_url + "parents/master_parent_questions",
					type:"POST",
					data: {childid:childid},
					success:function(response)
					{
						$("#master_question_insert").replaceWith(response);
						
						if(bx != undefined)
						{
							bx.destroySlider();
						}
						bx = $(".nvbxslider").bxSlider({
										hideControlOnEnd:false,
										infiniteLoop:false,
										pager: false, 
										pagerType: 'short',
										onSliderLoad:function()
										{			
//											bx-has-pager
											
											//.bx-default-pager").html(total2+"a /"+total1);
											setTimeout(function() 
											{
												jQuery("#myModal-13 .bx-has-controls-direction").prepend('<div class="bx-pager bx-default-pager">'+ (bx.getCurrentSlide()+1) +'a / '+ bx.getSlideCount() +'</div>');
											//jQuery("#myModal-13 .bx-default-pager").html( (bx.getCurrentSlide()+1) +'a / '+ bx.getSlideCount());

											}, 400);

										},
										onSlideBefore: function($slideElement, oldIndex, newIndex)
										{
											var total1	= bx.getSlideCount();
											var total2	= bx.getCurrentSlide()+1;
											jQuery("#myModal-13 .bx-default-pager").html(total2+"a /"+total1);
										},
										onSlideAfter: function($slideElement, oldIndex, newIndex)
										{
													
										var total1	= bx.getSlideCount();
										var total2	= bx.getCurrentSlide()+1;

										jQuery("#myModal-13 .bx-default-pager").html(total2+"a /"+total1);

										if(total1==total2)
										{
											$(".bx-controls-direction .bx-next").addClass("finalstep13");
											//$("#myModal-13").modal('hide');
											//$(".nvbxsliderparent .bx-controls-direction .bx-next").attr("id",QuestionID);
										}
										else
										{
											$(".bx-controls-direction .bx-next").removeClass("finalstep13");
											//$(".nvbxsliderparent .bx-controls-direction .bx-next").attr("id","");
										}
									  },
								});
						
						$(".main-modal .capa-info-2 .capa-tab li a.no").click(function(event){
							event.preventDefault();
							$(this).parent().parent().parent().next().children().hide();
							$(this).parent().parent().parent().next().children(".capa-tab-panel.no").show();
						});
						$(".main-modal .capa-info-2 .capa-tab li a.maybe").click(function(event){
							event.preventDefault();
							$(this).parent().parent().parent().next().children().hide();
							$(this).parent().parent().parent().next().children(".capa-tab-panel.maybe").show();
						});
						$(".main-modal .capa-info-2 .capa-tab li a.yes").click(function(event){
							event.preventDefault();
							$(this).parent().parent().parent().next().children().hide();
							$(this).parent().parent().parent().next().children(".capa-tab-panel.yes").show();
						});
						$(".main-modal .capa-info-2 .capa-tab-panel .close-btn").click(function(event){
							event.preventDefault();
							$(this).parent().hide();
						});
						
						var allslidecount = bx.getSlideCount();
						var currentslide = 1;
						$(document).on('click','.finalstep13', function(){

							$("#myModal-13").modal('hide');	
							//var currentslide = bx.getCurrentSlide();
							//alert(currentslide);
							/*if(currentslide == allslidecount)
							{
								$("#myModal-13").modal('hide');	
								currentslide = 0;
							}
							currentslide++;*/
						});
								
						$("#myModal-13").modal('show');
						$(window).trigger('resize');
						setTimeout(function(){ 						 
						bx.reloadSlider();
						$( ".bx-viewport" ).css( "height", ""); 
						$(".bx-prev").attr("title","Go to previous question");
						$(".bx-next").attr("title","Go to next question");
						},300);

						
						$anim.hide();
					}
				});
				//alert(hidden_capa_childid);
				
				//$("#myModal-13").modal('show');
				
			
			}
			
			
		});
		
		//finalstep13
		$("body").delegate(".finalstep13","click",function(e){
			//alert("AAAAAAAA");
			$("#myModal-12").modal('hide');
			$('#myModal-123').modal("show");
		});
		
		$("body").delegate(".selanswer_parent","click",function(e){
			$anim.show();
			var questionID = $(this).attr("data-question");
			var answer = $(this).val();
			var txtchildren_id = $("#txtchildren_id").val();
			var txtuser_id = $("#txtuser_id").val();
			$.ajax({
				url:base_url + "parents/parent_answer",
				type:"POST",
				data: {questionID:questionID,answer:answer,txtchildren_id:txtchildren_id},
				success:function(response)
				{
					if(response)
					{
						$anim.hide();
					}
					
				}
			});
			
		});
		
		$("body").delegate(".mainansewer","click",function(e){
			$anim.show();
			var QuestionID = jQuery(this).attr("data-question");
			var MainAns = jQuery(this).attr("data-answer");
			var UserID = jQuery("#hidden_capa_userid").val();
			var ChildID = jQuery("#hidden_capa_childid").val();
			
			jQuery("."+QuestionID).removeClass("active");
			jQuery(this).addClass("active");
			
			$.ajax({
				url:base_url + "teachers/teacher_main_ans",
				type:"POST",
				data: {QuestionID:QuestionID,MainAns:MainAns,ChildID:ChildID},
				success:function(response)
				{
					$("#hidden_capa_main_ans_id").val(response);
					$anim.hide();
					/*if(MainAns == "no")
					{
						$( ".bx-next" ).trigger( "click" );
					}*/
					
				}
			});
			
			
		});
		
		$("body").delegate(".finalstep","click",function(e){
			var slideid = $(this).attr("id"); 
			if(slideid > 0)
			{
				//alert("AAAAAA");
				$('#myModal-24').modal("hide"); // add by nk
				$('#myModal-23').modal("hide");
				if(bx != undefined)
				{
					bx.destroySlider();
				}
				//alert(parseInt(mainquestionID));
				//var moveslidenumber = parseInt(mainquestionID+1);
				bx = $(".nvbxslider").bxSlider({
						hideControlOnEnd:false,
						infiniteLoop:false,
						pager: false, 
						pagerType: 'short',
						startSlide: parseInt(slideid),
/////AAAA////
		  					onSliderLoad:function()
										{			
//											bx-has-pager
											
												//.bx-default-pager").html(total2+"a /"+total1);
			setTimeout(function() 
			{
				jQuery("#myModal-13 .bx-has-controls-direction").prepend('<div class="bx-pager bx-default-pager">'+ (bx.getCurrentSlide()+1) +'a / '+ bx.getSlideCount() +'</div>');
//				jQuery("#myModal-13 .bx-default-pager").html( (bx.getCurrentSlide()+1) +'a / '+ bx.getSlideCount());

            }, 400);

										},
										onSlideBefore: function($slideElement, oldIndex, newIndex)
										{
											var total1	= bx.getSlideCount();
											var total2	= bx.getCurrentSlide()+1;
											jQuery("#myModal-13 .bx-default-pager").html(total2+"a /"+total1);
										},
										onSlideAfter: function($slideElement, oldIndex, newIndex)
										{
													
										var total1	= bx.getSlideCount();
										var total2	= bx.getCurrentSlide()+1;

										jQuery("#myModal-13 .bx-default-pager").html(total2+"a /"+total1);

										if(total1==total2)
										{
											$(".bx-controls-direction .bx-next").addClass("finalstep13");
											//$("#myModal-13").modal('hide');
											//$(".nvbxsliderparent .bx-controls-direction .bx-next").attr("id",QuestionID);
										}
										else
										{
											$(".bx-controls-direction .bx-next").removeClass("finalstep13");
											//$(".nvbxsliderparent .bx-controls-direction .bx-next").attr("id","");
										}
									  },
/////AAAA////
						
				});
				
				$('#myModal-13').modal("show");
				$(".main-modal .capa-info-2 .capa-tab li a.no").click(function(event){
					event.preventDefault();
					$(this).parent().parent().parent().next().children().hide();
					$(this).parent().parent().parent().next().children(".capa-tab-panel.no").show();
				});
				$(".main-modal .capa-info-2 .capa-tab li a.maybe").click(function(event){
					event.preventDefault();
					$(this).parent().parent().parent().next().children().hide();
					$(this).parent().parent().parent().next().children(".capa-tab-panel.maybe").show();
				});
				$(".main-modal .capa-info-2 .capa-tab li a.yes").click(function(event){
					event.preventDefault();
					$(this).parent().parent().parent().next().children().hide();
					$(this).parent().parent().parent().next().children(".capa-tab-panel.yes").show();
				});
				$(".main-modal .capa-info-2 .capa-tab-panel .close-btn").click(function(event){
					event.preventDefault();
					$(this).parent().hide();
				});
				$(window).trigger('resize');
				setTimeout(function(){ 						 
				bx.reloadSlider();
				$( ".bx-viewport" ).css( "height", ""); 
				},300);
			}
		});
		
		$("body").delegate(".nvclsextramaybe","click",function(e){
			$anim.show();
			$(".nvclsextramaybe").removeClass("active");
			$(this).addClass("active");
			var answer = $(this).attr("data-ans");
			var subqusid = $(this).attr("data-subid");
			var childID = $(this).attr("data-childid");
			var mainQusID = $(this).attr("data-mainqus");
			$.ajax({
				url:base_url + "parents/parent_maybe_ans_save_new",
				type:"POST",
				data: {answer:answer,subqusid:subqusid,childID:childID,mainQusID:mainQusID},
				success:function(response)
				{
					$('#myModal-13').removeClass("fade");
					if(response == "no")
					{
						$('#myModal-23').modal("hide");
						if(bx != undefined)
						{
							bx.destroySlider();
						}
						//alert(parseInt(mainquestionID));
						//var moveslidenumber = parseInt(mainquestionID+1);
						bx = $(".nvbxslider").bxSlider({
								hideControlOnEnd:false,
								infiniteLoop:false,
								pager: false, 
								pagerType: 'short',
								startSlide: parseInt(mainQusID),
						/////AAAA////
		  				onSliderLoad:function()
						{			
//											bx-has-pager
		
												//.bx-default-pager").html(total2+"a /"+total1);
									setTimeout(function() 
									{
										jQuery("#myModal-13 .bx-has-controls-direction").prepend('<div class="bx-pager bx-default-pager">'+ (bx.getCurrentSlide()+1) +'a / '+ bx.getSlideCount() +'</div>');
						//				jQuery("#myModal-13 .bx-default-pager").html( (bx.getCurrentSlide()+1) +'a / '+ bx.getSlideCount());

									}, 400);

						},
							onSlideBefore: function($slideElement, oldIndex, newIndex)
							{
								var total1	= bx.getSlideCount();
								var total2	= bx.getCurrentSlide()+1;
								jQuery("#myModal-13 .bx-default-pager").html(total2+"a /"+total1);
							},
							onSlideAfter: function($slideElement, oldIndex, newIndex)
							{
										
							var total1	= bx.getSlideCount();
							var total2	= bx.getCurrentSlide()+1;

							jQuery("#myModal-13 .bx-default-pager").html(total2+"a /"+total1);

							if(total1==total2)
							{
								$(".bx-controls-direction .bx-next").addClass("finalstep13");
								//$("#myModal-13").modal('hide');
								//$(".nvbxsliderparent .bx-controls-direction .bx-next").attr("id",QuestionID);
							}
							else
							{
								$(".bx-controls-direction .bx-next").removeClass("finalstep13");
								//$(".nvbxsliderparent .bx-controls-direction .bx-next").attr("id","");
							}
						  },
/////AAAA////		
						});
						$('#myModal-13').modal("show");
						setTimeout(function(){ 	
							
							$anim.hide();
						},300);
						$(".main-modal .capa-info-2 .capa-tab li a.no").click(function(event){
							event.preventDefault();
							$(this).parent().parent().parent().next().children().hide();
							$(this).parent().parent().parent().next().children(".capa-tab-panel.no").show();
						});
						$(".main-modal .capa-info-2 .capa-tab li a.maybe").click(function(event){
							event.preventDefault();
							$(this).parent().parent().parent().next().children().hide();
							$(this).parent().parent().parent().next().children(".capa-tab-panel.maybe").show();
						});
						$(".main-modal .capa-info-2 .capa-tab li a.yes").click(function(event){
							event.preventDefault();
							$(this).parent().parent().parent().next().children().hide();
							$(this).parent().parent().parent().next().children(".capa-tab-panel.yes").show();
						});
						$(".main-modal .capa-info-2 .capa-tab-panel .close-btn").click(function(event){
							event.preventDefault();
							$(this).parent().hide();
						});
						$(window).trigger('resize');
						setTimeout(function(){ 						 
						bx.reloadSlider();
						$( ".bx-viewport" ).css( "height", ""); 
						},300);
						$('.bx-next').trigger('click');
						setTimeout(function(){ 	
						$anim.hide();
						},300);
					}
					else if(response == "maybe")
					{
						if($( ".bx-next" ).hasClass( "disabled" ))
						{
							$('#myModal-23').modal("hide");
							if(bx != undefined)
							{
								bx.destroySlider();
							}
							//alert(parseInt(mainquestionID));
							//var moveslidenumber = parseInt(mainquestionID+1);
							bx = $(".nvbxslider").bxSlider({
									hideControlOnEnd:false,
									infiniteLoop:false,
									pager: false, 
									pagerType: 'short',
									startSlide: parseInt(mainQusID),
						/////AAAA////
		  				onSliderLoad:function()
						{			
//											bx-has-pager
		
												//.bx-default-pager").html(total2+"a /"+total1);
									setTimeout(function() 
									{
										jQuery("#myModal-13 .bx-has-controls-direction").prepend('<div class="bx-pager bx-default-pager">'+ (bx.getCurrentSlide()+1) +'a / '+ bx.getSlideCount() +'</div>');
						//				jQuery("#myModal-13 .bx-default-pager").html( (bx.getCurrentSlide()+1) +'a / '+ bx.getSlideCount());

									}, 400);

						},
							onSlideBefore: function($slideElement, oldIndex, newIndex)
							{
								var total1	= bx.getSlideCount();
								var total2	= bx.getCurrentSlide()+1;
								jQuery("#myModal-13 .bx-default-pager").html(total2+"a /"+total1);
							},
							onSlideAfter: function($slideElement, oldIndex, newIndex)
							{
										
							var total1	= bx.getSlideCount();
							var total2	= bx.getCurrentSlide()+1;

							jQuery("#myModal-13 .bx-default-pager").html(total2+"a /"+total1);

							if(total1==total2)
							{
								$(".bx-controls-direction .bx-next").addClass("finalstep13");
								//$("#myModal-13").modal('hide');
								//$(".nvbxsliderparent .bx-controls-direction .bx-next").attr("id",QuestionID);
							}
							else
							{
								$(".bx-controls-direction .bx-next").removeClass("finalstep13");
								//$(".nvbxsliderparent .bx-controls-direction .bx-next").attr("id","");
							}
						  },
/////AAAA////
									
							});
							
							$('#myModal-13').modal("show");
							$(".main-modal .capa-info-2 .capa-tab li a.no").click(function(event){
								event.preventDefault();
								$(this).parent().parent().parent().next().children().hide();
								$(this).parent().parent().parent().next().children(".capa-tab-panel.no").show();
							});
							$(".main-modal .capa-info-2 .capa-tab li a.maybe").click(function(event){
								event.preventDefault();
								$(this).parent().parent().parent().next().children().hide();
								$(this).parent().parent().parent().next().children(".capa-tab-panel.maybe").show();
							});
							$(".main-modal .capa-info-2 .capa-tab li a.yes").click(function(event){
								event.preventDefault();
								$(this).parent().parent().parent().next().children().hide();
								$(this).parent().parent().parent().next().children(".capa-tab-panel.yes").show();
							});
							$(".main-modal .capa-info-2 .capa-tab-panel .close-btn").click(function(event){
								event.preventDefault();
								$(this).parent().hide();
							});
							$(window).trigger('resize');
							setTimeout(function(){ 						 
							bx.reloadSlider();
							$( ".bx-viewport" ).css( "height", ""); 
							},300);
							$('.bx-next').trigger('click');
							$anim.hide();
						}
						else
						{
							$('.bx-next').trigger('click');
							$anim.hide();
						}
					}
					else if(response == "yes")
					{
						var getexample = $("#may_be_qus_"+subqusid).show();
						$anim.hide();
						//return false; //added by nk
					}
					else if(response == "yes2")
					{
						var getexample = $("#may_be_qus_"+subqusid).show();
						$anim.hide();
						//return false; //added by nk
					}
					else
					{
						//alert("n");
						//$('.bx-next').trigger('click');
						$anim.hide();
					}
				}
			});
		});
		
		$("body").delegate(".submitanssubcomment","click",function(e){
			$anim.show();
			var subquschildID = $(this).attr("data-child");
			var submainqusID = $(this).attr("data-mainqus");
			var subsubqusID = $(this).attr("data-subqus");
			var comment = $("#comment_sub_qus_"+subsubqusID).val();

			$.ajax({
				url:base_url + "parents/parent_yes_ans_new_comment",
				type:"POST",
				data: {subquschildID:subquschildID,submainqusID:submainqusID,subsubqusID:subsubqusID,comment:comment},
				success:function(response)
				{
					if(response)
					{
						$.ajax({
							url:base_url + "parents/parent_yes_ans_new_sub",
							type:"POST",
							data: {QuestionID:submainqusID,ChildID:subquschildID},
							success:function(response)
							{
											if(response == "")
											{
												$('.bx-next').trigger('click');
												$anim.hide();
											}
											else
											{
												$anim.show();
												$('#myModal-13').removeClass("fade");
												$("#master_question_insert_parent").html(response);
												$('#myModal-13').modal("hide");
												
												//QuestionID
												if(bx != undefined)
												{
													bx.destroySlider();
												}
						
												bx = $(".nvbxslidernew_sub").bxSlider({
														hideControlOnEnd:false,
														infiniteLoop:false,
														pager: false, 
														pagerType: 'short',
														onSliderLoad:function()
														{
														setTimeout(function() 
														{
															var total1	= bx.getSlideCount();
															var total2	= bx.getCurrentSlide()+1;

																jQuery("#myModal-23 .bx-has-controls-direction").prepend('<div class="bx-pager bx-default-pager">'+ (bx.getCurrentSlide()+1) + '/ extra</div>');
																
								jQuery("#myModal-23 .bx-controls-direction .bx-next").addClass("finalstep");
								jQuery("#myModal-23 .bx-controls-direction .bx-next").attr("id",submainqusID);
														}, 400);
														},


							onSlideBefore: function($slideElement, oldIndex, newIndex)
							{
								var total1	= bx.getSlideCount();
								var total2	= bx.getCurrentSlide()+1;
								jQuery("#myModal-23 .bx-default-pager").html(total2+" / extra");
						 
								$("#myModal-23 .bx-controls-direction .bx-next").addClass("finalstep");
								$("#myModal-23 .bx-controls-direction .bx-next").attr("id",submainqusID);
							},
							onSlideAfter: function($slideElement, oldIndex, newIndex)
							{
										
							var total1	= bx.getSlideCount();
							var total2	= bx.getCurrentSlide()+1;
																					 
							jQuery("#myModal-23 .bx-default-pager").html(total2+" / extra");

								$("#myModal-23 .bx-controls-direction .bx-next").addClass("finalstep");
								$("#myModal-23 .bx-controls-direction .bx-next").attr("id",submainqusID);
						  },

														
												});
												$(window).trigger('resize');
												setTimeout(function(){ 						 
												bx.reloadSlider();
												$( ".bx-viewport" ).css( "height", ""); 
												$(".bx-prev").attr("title","Go to previous question");
												$(".bx-next").attr("title","Go to next question");
												},300);
												//$(".bx-next").addClass("Test123");
												$('#myModal-23').modal("show");
												setTimeout(function(){ 	
													$anim.hide();
												},300);
			
												
											}
											
										
										}
										/*
							{
								if(response == "")
								{
									if($( ".bx-next" ).hasClass( "disabled" ))
									{
										$('#myModal-23').modal("hide");
										if(bx != undefined)
										{
											bx.destroySlider();
										}
										//alert(parseInt(mainquestionID));
										//var moveslidenumber = parseInt(mainquestionID+1);
										/ *{
												hideControlOnEnd:false,
												infiniteLoop:false,
												pager: false, 
												pagerType: 'short',
												startSlide: parseInt(submainqusID),
												
										}* /
										
										bx = $(".nvbxslider").bxSlider({
														hideControlOnEnd:false,
														infiniteLoop:false,
														pager: true, 
														pagerType: 'short',
														onSliderLoad:function()
														{
														setTimeout(function() 
														{
															var total1	= bx.getSlideCount();
															var total2	= bx.getCurrentSlide()+1;

															jQuery("#myModal-23 .bx-has-controls-direction").prepend('<div class="bx-pager bx-default-pager">'+ (bx.getCurrentSlide()+1) + '/ extra</div>');
																if(total1==total2)
																{
																	$(".bx-controls-direction .bx-next").addClass("finalstep13");
																	//$("#myModal-13").modal('hide');
																	//$(".nvbxsliderparent .bx-controls-direction .bx-next").attr("id",QuestionID);
																}
																else
																{
																	$(".bx-controls-direction .bx-next").removeClass("finalstep13");
																	//$(".nvbxsliderparent .bx-controls-direction .bx-next").attr("id","");
																}
														}, 400);
														},


							onSlideBefore: function($slideElement, oldIndex, newIndex)
							{
								var total1	= bx.getSlideCount();
								var total2	= bx.getCurrentSlide()+1;
								jQuery("#myModal-23 .bx-default-pager").html(total2+" / extra");

							if(total1==total2)
							{
								$(".bx-controls-direction .bx-next").addClass("finalstep13");
								//$("#myModal-13").modal('hide');
								//$(".nvbxsliderparent .bx-controls-direction .bx-next").attr("id",QuestionID);
							}
							else
							{
								$(".bx-controls-direction .bx-next").removeClass("finalstep13");
								//$(".nvbxsliderparent .bx-controls-direction .bx-next").attr("id","");
							}
							},
							onSlideAfter: function($slideElement, oldIndex, newIndex)
							{
										
							var total1	= bx.getSlideCount();
							var total2	= bx.getCurrentSlide()+1;
																					 
							jQuery("#myModal-23 .bx-default-pager").html(total2+" / extra");

							if(total1==total2)
							{
								$(".bx-controls-direction .bx-next").addClass("finalstep13");
								//$("#myModal-13").modal('hide');
								//$(".nvbxsliderparent .bx-controls-direction .bx-next").attr("id",QuestionID);
							}
							else
							{
								$(".bx-controls-direction .bx-next").removeClass("finalstep13");
								//$(".nvbxsliderparent .bx-controls-direction .bx-next").attr("id","");
							}
						  },
/////AAAA////
														onSlideAfter: function($slideElement, oldIndex, newIndex)
														{
															
															var total1	= bx.getSlideCount();
															var total2	= bx.getCurrentSlide()+1;

															////AAA/AA
															
															if(total1==total2)
															{
																$(".nvbxsliderparent .bx-controls-direction .bx-next").addClass("finalstep");
																$(".nvbxsliderparent .bx-controls-direction .bx-next").attr("id",QuestionID);
															}
															else
															{
																$(".nvbxsliderparent .bx-controls-direction .bx-next").removeClass("finalstep");
																$(".nvbxsliderparent .bx-controls-direction .bx-next").attr("id","");
															}
														  },
														
												});


										
										$('#myModal-13').modal("show");
										$(".main-modal .capa-info-2 .capa-tab li a.no").click(function(event){
											event.preventDefault();
											$(this).parent().parent().parent().next().children().hide();
											$(this).parent().parent().parent().next().children(".capa-tab-panel.no").show();
										});
										$(".main-modal .capa-info-2 .capa-tab li a.maybe").click(function(event){
											event.preventDefault();
											$(this).parent().parent().parent().next().children().hide();
											$(this).parent().parent().parent().next().children(".capa-tab-panel.maybe").show();
										});
										$(".main-modal .capa-info-2 .capa-tab li a.yes").click(function(event){
											event.preventDefault();
											$(this).parent().parent().parent().next().children().hide();
											$(this).parent().parent().parent().next().children(".capa-tab-panel.yes").show();
										});
										$(".main-modal .capa-info-2 .capa-tab-panel .close-btn").click(function(event){
											event.preventDefault();
											$(this).parent().hide();
										});
										$(window).trigger('resize');
										setTimeout(function(){ 						 
										bx.reloadSlider();
										$( ".bx-viewport" ).css( "height", ""); 
										},300);
										$('.bx-next').trigger('click');
										$anim.hide();
									}
									else
									{
										$('.bx-next').trigger('click');
										$anim.hide();
									}
									
								}
								else
								{
									$anim.show();
									$("#master_question_insert_parent_sub").html(response);
									$('#myModal-23').modal("hide");
									
									//QuestionID
									if(bx != undefined)
									{
										bx.destroySlider();
									}
			
									bx = $(".nvbxslidernew_sub").bxSlider({
											hideControlOnEnd:false,
											infiniteLoop:false,
											pager: true, 
											pagerType: 'short',
											onSlideAfter: function($slideElement, oldIndex, newIndex){
												
												var total1	= bx.getSlideCount();
												var total2	= bx.getCurrentSlide()+1;
												
												if(total1==total2)
												{
													$(".nvbxsliderparent .bx-controls-direction .bx-next").addClass("finalstep");
													$(".nvbxsliderparent .bx-controls-direction .bx-next").attr("id",submainqusID);
												}
												else
												{
													$(".nvbxsliderparent .bx-controls-direction .bx-next").removeClass("finalstep");
													$(".nvbxsliderparent .bx-controls-direction .bx-next").attr("id","");
												}
											  },
											
									});
									$(window).trigger('resize');
									setTimeout(function(){ 						 
										bx.reloadSlider();
										/ *$("#master_question_insert_parent_sub").each(function(){
											$(this).reloadSlider();
										});* /
										$( ".bx-viewport" ).css( "height", ""); 
									},300);
									//$(".bx-next").addClass("Test123");
									$('#myModal-24').modal("show");
									

									$anim.hide();
								}
								
							
							}	   */
						});
					}
				}
			});
		});
		
		
		$("body").delegate(".submitmaybeanswer","click",function(e){
			var subqusid = $(this).attr("id");
			var childid = $(this).attr("data-child");
			var mainquestionID = $(this).attr("data-qmainid");
			
			var maybecomment = $("#extracomment_"+subqusid).val(); 
			var currentslide = $(this).attr("data-slide");
			$anim.show();
			$.ajax({
				url:base_url + "parents/parent_maybe_ans_save",
				type:"POST",
				data: {subqusid:subqusid,childid:childid,mainquestionID:mainquestionID,maybecomment:maybecomment},
				success:function(response)
				{
					var totslide = $('.customcountslide').length;
					if(totslide == currentslide)
					{
						$('#myModal-23').modal("hide");
						if(bx != undefined)
						{
							bx.destroySlider();
						}
						//alert(parseInt(mainquestionID));
						//var moveslidenumber = parseInt(mainquestionID+1);
						bx = $(".nvbxslider").bxSlider({
								hideControlOnEnd:false,
								infiniteLoop:false,
								pager: true, 
								pagerType: 'short',
								startSlide: parseInt(mainquestionID),
								
						});
						
						$('#myModal-13').modal("show");
						$(".main-modal .capa-info-2 .capa-tab li a.no").click(function(event){
							event.preventDefault();
							$(this).parent().parent().parent().next().children().hide();
							$(this).parent().parent().parent().next().children(".capa-tab-panel.no").show();
						});
						$(".main-modal .capa-info-2 .capa-tab li a.maybe").click(function(event){
							event.preventDefault();
							$(this).parent().parent().parent().next().children().hide();
							$(this).parent().parent().parent().next().children(".capa-tab-panel.maybe").show();
						});
						$(".main-modal .capa-info-2 .capa-tab li a.yes").click(function(event){
							event.preventDefault();
							$(this).parent().parent().parent().next().children().hide();
							$(this).parent().parent().parent().next().children(".capa-tab-panel.yes").show();
						});
						$(".main-modal .capa-info-2 .capa-tab-panel .close-btn").click(function(event){
							event.preventDefault();
							$(this).parent().hide();
						});
						$(window).trigger('resize');
						setTimeout(function(){ 						 
						bx.reloadSlider();
						$( ".bx-viewport" ).css( "height", ""); 
						},300);
						
					}
					$('.bx-next').trigger('click');
					$anim.hide();
					
				}
			})
		});
		
		
		
		$("body").delegate(".mainansewerparent","click",function(e){
			$anim.show();
			var QuestionID = jQuery(this).attr("data-question");
			
			jQuery("."+QuestionID).removeClass("active");
			jQuery(this).addClass("active");
			
			var MainAns = jQuery(this).attr("data-answer");
			
			var UserID = jQuery("#hidden_capa_userid").val();
			var ChildID = jQuery("#hidden_capa_childid").val();
			$.ajax({
				url:base_url + "parents/parent_main_ans",
				type:"POST",
				data: {QuestionID:QuestionID,MainAns:MainAns,ChildID:ChildID},
				success:function(response)
				{
					$("#hidden_capa_main_ans_id").val(response);
					
					if(MainAns == "no")
					{
						$anim.hide();
						$('.bx-next').trigger('click');
						 
					}
					else if(MainAns == "maybe")
					{
						//$('.bx-next').trigger('click');
						//$("#myModal-23").removeClass("fade");
						
						$.ajax({
							url:base_url + "parents/parent_maybe_ans",
							type:"POST",
							data: {QuestionID:QuestionID,ChildID:ChildID},
							success:function(response)
							{
								if(response == "")
								{
									$('.bx-next').trigger('click');
									$anim.hide();
								}
								else
								{
									$anim.show();
									$("#master_question_insert_parent").html(response);
									$('#myModal-13').modal("hide");
									
									//QuestionID
									var totalMainSlide=0;
									var totalCurrentSlide=0;
									if(bx != undefined)
									{
										totalMainSlide = bx.getSlideCount();
										totalCurrentSlide = bx.getCurrentSlide()+1;
										bx.destroySlider();
									}
			
									bx = $(".nvbxslidernew_parent").bxSlider({
											hideControlOnEnd:false,
											infiniteLoop:false,
											pager: false, 
											pagerType: 'short',	
												
										onSliderLoad:function()
										{			
											setTimeout(function() 
											{
												jQuery("#myModal-23 .bx-has-controls-direction").prepend('<div class="bx-pager bx-default-pager">'+ totalCurrentSlide+ alphabar[1] +" / "+totalMainSlide +'</div>');

											}, 400);

										},
											onSlideAfter: function($slideElement, oldIndex, newIndex)
											{
												var total1	= bx.getSlideCount();
												var total2	= bx.getCurrentSlide()+1;

												jQuery("#myModal-23 .bx-default-pager").html(totalCurrentSlide+ alphabar[total2] +" / "+totalMainSlide);
												if(total1==total2)
												{
													$(".nvbxsliderparent .bx-controls-direction .bx-next").addClass("finalstep");
													$(".nvbxsliderparent .bx-controls-direction .bx-next").attr("id",QuestionID);
												}
												else
												{
													$(".nvbxsliderparent .bx-controls-direction .bx-next").removeClass("finalstep");
													$(".nvbxsliderparent .bx-controls-direction .bx-next").attr("id","");
												}
											  },
											
									});
									$(window).trigger('resize');
									setTimeout(function(){ 						 
									bx.reloadSlider();
									$( ".bx-viewport" ).css( "height", ""); 
									$(".bx-prev").attr("title","Go to previous question");
									$(".bx-next").attr("title","Go to next question");
									},300);
									//$(".bx-next").addClass("Test123");
									$('#myModal-23').modal("show");
									setTimeout(function(){ 	
										
										$anim.hide();
									},300);
								}
								
							}
						});
						
						
					}
					else if(MainAns == "yes")
					{
						//alert(response); nikunjyesans
						$("#main_qus_"+QuestionID).show();
						$anim.hide();



					
/*
						$("body").undelegate("click").delegate(".submitansmaincomment","click",function(e){
							e.preventDefault();
							var mainanscmtqus = jQuery(this).attr("data-mainqus");
							var mainanscmtchild = jQuery(this).attr("data-child");
							var mainanscmtcomment = jQuery("#comment_main_qus_"+mainanscmtqus).val();
							$anim.show();
							$.ajax({
								url:base_url + "parents/parent_save_main_comment",
								type:"POST",
								data: {mainanscmtqus:mainanscmtqus,mainanscmtchild:mainanscmtchild,mainanscmtcomment:mainanscmtcomment},
								success:function(responsecomment)
								{
									$.ajax({
										url:base_url + "parents/parent_yes_ans_new",
										type:"POST",
										data: {QuestionID:QuestionID,ChildID:ChildID},
										success:function(response)
										{
											if(response == "")
											{
												$('.bx-next').trigger('click');
												$anim.hide();
											}
											else
											{
												$anim.show();
												$('#myModal-13').removeClass("fade");
												$("#master_question_insert_parent").html(response);
												$('#myModal-13').modal("hide");
												
												//QuestionID
												if(bx != undefined)
												{
													bx.destroySlider();
												}
						
												bx = $(".nvbxslidernewparent").bxSlider({
														hideControlOnEnd:false,
														infiniteLoop:false,
														pager: true, 
														pagerType: 'short',
														onSliderLoad:function()
														{
														setTimeout(function() 
														{
															var total1	= bx.getSlideCount();
															var total2	= bx.getCurrentSlide()+1;

															jQuery("#myModal-23 .bx-has-controls-direction").prepend('<div class="bx-pager bx-default-pager">'+ (bx.getCurrentSlide()+1) + '/ extra</div>');
																if(total1==total2)
																{
																	$(".bx-controls-direction .bx-next").addClass("finalstep13");
																	//$("#myModal-13").modal('hide');
																	//$(".nvbxsliderparent .bx-controls-direction .bx-next").attr("id",QuestionID);
																}
																else
																{
																	$(".bx-controls-direction .bx-next").removeClass("finalstep13");
																	//$(".nvbxsliderparent .bx-controls-direction .bx-next").attr("id","");
																}
														}, 400);
														},


							onSlideBefore: function($slideElement, oldIndex, newIndex)
							{
								var total1	= bx.getSlideCount();
								var total2	= bx.getCurrentSlide()+1;
								jQuery("#myModal-23 .bx-default-pager").html(total2+" / extra");

							if(total1==total2)
							{
								$(".bx-controls-direction .bx-next").addClass("finalstep13");
								//$("#myModal-13").modal('hide');
								//$(".nvbxsliderparent .bx-controls-direction .bx-next").attr("id",QuestionID);
							}
							else
							{
								$(".bx-controls-direction .bx-next").removeClass("finalstep13");
								//$(".nvbxsliderparent .bx-controls-direction .bx-next").attr("id","");
							}
							},
							onSlideAfter: function($slideElement, oldIndex, newIndex)
							{
										
							var total1	= bx.getSlideCount();
							var total2	= bx.getCurrentSlide()+1;
																					 
							jQuery("#myModal-23 .bx-default-pager").html(total2+" / extra");

							if(total1==total2)
							{
								$(".bx-controls-direction .bx-next").addClass("finalstep13");
								//$("#myModal-13").modal('hide');
								//$(".nvbxsliderparent .bx-controls-direction .bx-next").attr("id",QuestionID);
							}
							else
							{
								$(".bx-controls-direction .bx-next").removeClass("finalstep13");
								//$(".nvbxsliderparent .bx-controls-direction .bx-next").attr("id","");
							}
						  },
/////AAAA////
														onSlideAfter: function($slideElement, oldIndex, newIndex)
														{
															
															var total1	= bx.getSlideCount();
															var total2	= bx.getCurrentSlide()+1;

															////AAA/AA
															
															if(total1==total2)
															{
																$(".nvbxsliderparent .bx-controls-direction .bx-next").addClass("finalstep");
																$(".nvbxsliderparent .bx-controls-direction .bx-next").attr("id",QuestionID);
															}
															else
															{
																$(".nvbxsliderparent .bx-controls-direction .bx-next").removeClass("finalstep");
																$(".nvbxsliderparent .bx-controls-direction .bx-next").attr("id","");
															}
														  },
														
												});
												$(window).trigger('resize');
												setTimeout(function(){ 						 
												bx.reloadSlider();
												$( ".bx-viewport" ).css( "height", ""); 
												$(".bx-prev").attr("title","Go to previous question");
												$(".bx-next").attr("title","Go to next question");
												},300);
												//$(".bx-next").addClass("Test123");
												$('#myModal-23').modal("show");
												setTimeout(function(){ 	
													$anim.hide();
												},300);
			
												
											}
											
										
										}
									});
								}
							});
						});
Delegate Item
						*/
						/*$.ajax({
							url:base_url + "parents/parent_yes_ans_new",
							type:"POST",
							data: {QuestionID:QuestionID,ChildID:ChildID},
							success:function(response)
							{
								
								if(response == "")
								{
									$('.bx-next').trigger('click');
									$anim.hide();
								}
								else
								{
									$anim.show();
									$("#master_question_insert_parent").html(response);
									$('#myModal-13').modal("hide");
									
									//QuestionID
									if(bx != undefined)
									{
										bx.destroySlider();
									}
			
									bx = $(".nvbxslidernewparent").bxSlider({
											hideControlOnEnd:false,
											infiniteLoop:false,
											pager: true, 
											pagerType: 'short',
											onSlideAfter: function($slideElement, oldIndex, newIndex){
												
												var total1	= bx.getSlideCount();
												var total2	= bx.getCurrentSlide()+1;
												
												if(total1==total2)
												{
													$(".nvbxsliderparent .bx-controls-direction .bx-next").addClass("finalstep");
													$(".nvbxsliderparent .bx-controls-direction .bx-next").attr("id",QuestionID);
												}
												else
												{
													$(".nvbxsliderparent .bx-controls-direction .bx-next").removeClass("finalstep");
													$(".nvbxsliderparent .bx-controls-direction .bx-next").attr("id","");
												}
											  },
											
									});
									$(window).trigger('resize');
									setTimeout(function(){ 						 
									bx.reloadSlider();
									$( ".bx-viewport" ).css( "height", ""); 
									},300);
									//$(".bx-next").addClass("Test123");
									$('#myModal-23').modal("show");
									

									$anim.hide();
								}
								
							
							}
						});*/
					}
					else if(MainAns == "yes2")
					{
						//alert(response); nikunjyesans
						$("#main_qus_"+QuestionID).show();
						$anim.hide();

						
						/*
						
						$("body").delegate(".submitansmaincomment","click",function(e){
							var mainanscmtqus = jQuery(this).attr("data-mainqus");
							var mainanscmtchild = jQuery(this).attr("data-child");
							var mainanscmtcomment = jQuery("#comment_main_qus_"+mainanscmtqus).val();
							$anim.show();
							$.ajax({
								url:base_url + "parents/parent_save_main_comment",
								type:"POST",
								data: {mainanscmtqus:mainanscmtqus,mainanscmtchild:mainanscmtchild,mainanscmtcomment:mainanscmtcomment},
								success:function(responsecomment)
								{
									$.ajax({
										url:base_url + "parents/parent_yes_ans_new",
										type:"POST",
										data: {QuestionID:QuestionID,ChildID:ChildID},


										success:function(response)
										{
											
											if(response == "")
											{
												$('.bx-next').trigger('click');
												$anim.hide();
											}
											else
											{
												$anim.show();
												$('#myModal-13').removeClass("fade");
												$("#master_question_insert_parent").html(response);
												$('#myModal-13').modal("hide");
												
												//QuestionID
												if(bx != undefined)
												{
													bx.destroySlider();
												}
									
												bx = $(".nvbxslidernewparent").bxSlider({
														hideControlOnEnd:false,
														infiniteLoop:false,
														pager: true, 
														pagerType: 'short',
														onSliderLoad:function()
														{
															setTimeout(function() 
															{		
																var total1	= bx.getSlideCount();
																var total2	= bx.getCurrentSlide()+1;
//															    jQuery("#myModal-13 .bx-has-controls-direction").prepend('<div class="bx-pager bx-default-pager">'+ (bx.getCurrentSlide()+1) +'a / '+ bx.getSlideCount() +'</div>');
																jQuery("#myModal-23 .bx-default-pager").html(total2+" / extra");
																if(total1==total2)
																{
																	$(".nvbxsliderparent .bx-controls-direction .bx-next").addClass("finalstep");
																	$(".nvbxsliderparent .bx-controls-direction .bx-next").attr("id",QuestionID);
																}
																else
																{
																	$(".nvbxsliderparent .bx-controls-direction .bx-next").removeClass("finalstep");
																	$(".nvbxsliderparent .bx-controls-direction .bx-next").attr("id","");
																}

															}, 400);
														},
														onSlideBefore: function($slideElement, oldIndex, newIndex)
														{
															var total1	= bx.getSlideCount();
															var total2	= bx.getCurrentSlide()+1;
															jQuery("#myModal-23 .bx-default-pager").html(total2+" / extra");
															if(total1==total2)
															{
																$(".nvbxsliderparent .bx-controls-direction .bx-next").addClass("finalstep");
																$(".nvbxsliderparent .bx-controls-direction .bx-next").attr("id",QuestionID);
															}
															else
															{
																$(".nvbxsliderparent .bx-controls-direction .bx-next").removeClass("finalstep");
																$(".nvbxsliderparent .bx-controls-direction .bx-next").attr("id","");
															}
														},
														onSlideAfter: function($slideElement, oldIndex, newIndex){
															
															var total1	= bx.getSlideCount();
															var total2	= bx.getCurrentSlide()+1;

															jQuery("#myModal-23 .bx-default-pager").html(total2+" / extra");
	
															if(total1==total2)
															{
																$(".nvbxsliderparent .bx-controls-direction .bx-next").addClass("finalstep");
																$(".nvbxsliderparent .bx-controls-direction .bx-next").attr("id",QuestionID);
															}
															else
															{
																$(".nvbxsliderparent .bx-controls-direction .bx-next").removeClass("finalstep");
																$(".nvbxsliderparent .bx-controls-direction .bx-next").attr("id","");
															}
														  },
														
												});
												$(window).trigger('resize');
												setTimeout(function(){ 						 
												bx.reloadSlider();
												$( ".bx-viewport" ).css( "height", ""); 
												$(".bx-prev").attr("title","Go to previous question");
												$(".bx-next").attr("title","Go to next question");
												},300);
												//$(".bx-next").addClass("Test123");
												$('#myModal-23').modal("show");
												setTimeout(function(){ 	
													$anim.hide();
												},300);
			
												
											}
											
										
										}
									});
								}
							});
						});
						*/
						/*$.ajax({
							url:base_url + "parents/parent_yes_ans_new",
							type:"POST",
							data: {QuestionID:QuestionID,ChildID:ChildID},
							success:function(response)
							{
								
								if(response == "")
								{
									$('.bx-next').trigger('click');
									$anim.hide();
								}
								else
								{
									$anim.show();
									$("#master_question_insert_parent").html(response);
									$('#myModal-13').modal("hide");
									
									//QuestionID
									if(bx != undefined)
									{
										bx.destroySlider();
									}
			
									bx = $(".nvbxslidernewparent").bxSlider({
											hideControlOnEnd:false,
											infiniteLoop:false,
											pager: true, 
											pagerType: 'short',
											onSlideAfter: function($slideElement, oldIndex, newIndex){
												
												var total1	= bx.getSlideCount();
												var total2	= bx.getCurrentSlide()+1;
												
												if(total1==total2)
												{
													$(".nvbxsliderparent .bx-controls-direction .bx-next").addClass("finalstep");
													$(".nvbxsliderparent .bx-controls-direction .bx-next").attr("id",QuestionID);
												}
												else
												{
													$(".nvbxsliderparent .bx-controls-direction .bx-next").removeClass("finalstep");
													$(".nvbxsliderparent .bx-controls-direction .bx-next").attr("id","");
												}
											  },
											
									});
									$(window).trigger('resize');
									setTimeout(function(){ 						 
									bx.reloadSlider();
									$( ".bx-viewport" ).css( "height", ""); 
									},300);
									//$(".bx-next").addClass("Test123");
									$('#myModal-23').modal("show");
									

									$anim.hide();
								}
								
							
							}
						});*/
					}
					else
					{
						$anim.hide();
					}
				}
			});
		});
		
		$("body").delegate(".newyesans","click",function(e){
			$anim.show();
			
			var subQuestionID = jQuery(this).attr("data-subqus");
			$(".nvextracls"+subQuestionID).removeClass("active");
			$(this).addClass("active");
					
			var answer = jQuery(this).attr("data-ans");
			var mainqusid = jQuery(this).attr("data-mainqus");
			var childID = jQuery(this).attr("data-child");
			$.ajax({
				url:base_url + "parents/newyesanswer",
				type:"POST",
				data: {subQuestionID:subQuestionID,answer:answer,mainqusid:mainqusid,childID:childID},
				success:function(response)
				{
//					alert(answer);
					if(answer == "no")
					{
						jQuery("#newcomment"+subQuestionID).hide();
						$('.bx-next').trigger('click');
						$anim.hide();
					}
					else
					{
						jQuery("#newcomment"+subQuestionID).show();
						$anim.hide();
					}
					
				}
			});
			//$anim.hide();
		});
		
		$("body").delegate(".yesnoprob","click",function(e){
			$anim.show();
			var mainqustionid = jQuery(this).attr("data-mainquestion");
			var probid = jQuery(this).attr("data-probid");
			var answer = jQuery(this).attr("data-ans");
			var hidden_capa_childid = jQuery("#hidden_capa_childid").val();
			
			$.ajax({
				url:base_url + "teachers/teacher_prob_ans",
				type:"POST",
				data: {mainqustionid:mainqustionid,probid:probid,answer:answer,hidden_capa_childid:hidden_capa_childid},
				success:function(response)
				{
					$anim.hide();
				}
			});
		});
		
		$("body").delegate(".yesnoprobparent","click",function(e){
			$anim.show();
			var mainqustionid = jQuery(this).attr("data-mainquestion");
			var probid = jQuery(this).attr("data-probid");
			var answer = jQuery(this).attr("data-ans");
			var hidden_capa_childid = jQuery("#hidden_capa_childid").val();
			
			$.ajax({
				url:base_url + "parents/parent_prob_ans",
				type:"POST",
				data: {mainqustionid:mainqustionid,probid:probid,answer:answer,hidden_capa_childid:hidden_capa_childid},
				success:function(response)
				{
					$anim.hide();
				}
			});
		});
		
		$("body").delegate(".cmtsubmit","click",function(e){
			$anim.show();
			var mainquestionID = jQuery(this).attr("id");
			var comment = jQuery("#cmt_"+mainquestionID).val();
			
			var hidden_capa_childid = jQuery("#hidden_capa_childid").val();
			$.ajax({
				url:base_url + "teachers/teacher_yes_comment",
				type:"POST",
				data: {mainquestionID:mainquestionID,comment:comment,hidden_capa_childid:hidden_capa_childid},
				success:function(response)
				{
					$anim.hide();
				}
			});
		});
		
		$("body").delegate(".cmtsubmitparentnew","click",function(e){
			$anim.show();
			var subquestionID = jQuery(this).attr("id");
			var comment = jQuery("#newcmt_"+subquestionID).val();
			var childID = jQuery(this).attr("data-childid");
			
			
			$.ajax({
				url:base_url + "parents/parent_yes_new_comment",
				type:"POST",
				data: {subquestionID:subquestionID,comment:comment,childID:childID},
				success:function(response)
				{

						$( ".finalstep13" ).trigger( "click" );
						//$( ".bx-next" ).trigger( "click" );
						$anim.hide();
				}
			});
			//$anim.hide();
		});
		
		$("body").delegate(".cmtsubmitparent","click",function(e){
			$anim.show();
			var mainquestionID = jQuery(this).attr("id");
			var comment = jQuery("#cmt_"+mainquestionID).val();
			
			var hidden_capa_childid = jQuery("#hidden_capa_childid").val();
			$.ajax({
				url:base_url + "parents/parent_yes_comment",
				type:"POST",
				data: {mainquestionID:mainquestionID,comment:comment,hidden_capa_childid:hidden_capa_childid},
				success:function(response)
				{
					$( ".bx-next" ).trigger( "click" );
					$anim.hide();
				}
			});
		});
		
		
		//fetch-observation-qes
		$("body").delegate(".fetch-observation-qes","click",function(e){
			$anim.show();
			$.ajax({
				url:base_url + "clinical/observation_questions",
				type:"POST",
				success:function(response)
				{
					$(".observation-slider").replaceWith(response);
					if(bx != undefined)
					{
						bx.destroySlider();
					}
					bx = $(".observation-slider").bxSlider({
							
							hideControlOnEnd:false,
							infiniteLoop:false,
							pager: true, 
							pagerType: 'short',
							//startSlide: 7,
					});
					var allslidecount = bx.getSlideCount();
					var currentslide = 1;
					$(document).on('click','.bx-next', function(){
						//var currentslide = bx.getCurrentSlide();
						//alert(currentslide);
						if(currentslide == allslidecount)
						{
							$("#myModal-15").modal('hide');	
							currentslide = 0;
						}
						currentslide++;
					});
					
					
					 $(window).trigger('resize');
					 setTimeout(function(){ 						 
					 bx.reloadSlider();},300);
					$('#myModal-15').modal("show");
					$anim.hide();
				}
			});
			
			
		});
		$("body").delegate(".oberservationyesno","click",function(e){
			$anim.show();
			var answer = $(this).attr("data-ans");
			var question = $(this).attr("data-question");
			
			$("."+question).removeClass("active");
			$(this).addClass("active");
			
			$.ajax({
				url:base_url + "clinical/oberservation_ans",
				type:"POST",
				data: {question:question,answer:answer},
				success:function(response)
				{
					$( ".bx-next" ).trigger( "click" );
					$anim.hide();
				}
			});
			
		});
		
		$("body").delegate(".nvchangegroup","change",function(e){
			var selectval = $(this).val();
			if(selectval > 0)
			{
				$anim.show();
				$.ajax({
					url:base_url + "clinical/fetchchildren",
					type:"POST",
					data: {nvgroupID:selectval},
					success:function(response)
					{
						$(".nvajaxchild").html(response);
						$('.selectpicker').selectpicker('refresh');
						$anim.hide();
					}
				});
			}
			
		});
		
		$("body").delegate(".nvselparentteacher","change",function(e){
			var childrenID = $(this).val();
			if(childrenID > 0)
			{
				$anim.show();
				$.ajax({
					url:base_url + "clinical/fetchchildrendetail",
					type:"POST",
					data: {childrenID:childrenID},
					success:function(response)
					{
						//alert("AAAAAAA");
						//alert(response);
						$("#clinician-data").html(response);
						
						
						$anim.hide();
					}
				});
				//$anim.hide();
			}
		});
		
		$("body").delegate(".reviewd","click",function(e){
			var childid = $(this).attr("data-childid");
			var answer = $(this).attr("data-ans");
			$(".reviewd").removeClass("active");
			$(this).addClass("active");
			if(childid != "")
			{
				$anim.show();
				$.ajax({
					url:base_url + "clinical/child_reviewed",
					type:"POST",
					data: {childid:childid,answer:answer},
					success:function(response)
					{
						$anim.hide();
					}
				});
				//$anim.hide();
			}
			
		});
		
		//obervationquestion
		$("body").delegate(".obervationquestion","click",function(e){
			
			var userID = $(this).attr("data-userid");
			
			$anim.show();
			$.ajax({
				url:base_url + "clinical/fetchobjervationquestion",
				type:"POST",
				data: {userID:userID},
				success:function(response)
				{
					$(".questionwithans").html(response);
					$('#myModal-9').modal("show");
					
					$anim.hide();
					$(".main-modal .clinician-2 .clinic-2-panel .plus").click(function(event){
						event.preventDefault();
						if(!$(this).hasClass('active'))
						{
							$(".main-modal .clinician-2 .clinic-2-panel-wrap").each(function(){
								if($(this).children().children().hasClass('active'))
								{
									$(this).children().next().slideToggle("slow");
									$(".main-modal .clinician-2 .clinic-2-panel .plus").removeClass('active');
								}
							});
						}
						$(this).toggleClass("active");
						$(this).parent().next().slideToggle("slow");
					});
					
					$('.main-modal .clinician-2 .clinic-2-panel .objcomment').click(function(){
						var questionID = $(this).attr("data-question");
						var UserID = $(this).attr("data-userid");
						$anim.show();
						$.ajax({
							url:base_url + "clinical/objervationcomment",
							type:"POST",
							data: {questionID:questionID,UserID:UserID},
							success:function(response)
							{
								$("#questionwithcomment").html(response);
								$("#myModal-10").modal("show");
								$("#myModal-9").modal("hide");
								$anim.hide();
							}
						});
						
					});
					
				}
			});
			$anim.hide();
		});
		$("body").delegate(".parentquestionanscapa","click",function(e){
			var childid = $(this).attr("data-childid");
			var userID = $(this).attr("data-user");
			var questiontype = $(this).attr("data-questiontype");
			$anim.show();
			$.ajax({
				url:base_url + "clinical/fetchparentquestionanswercapa",
				type:"POST",
				data: {childid:childid,userID:userID,questiontype:questiontype},
				success:function(response)
				{
					//$(".questionwithans").html(response);
					
					var data1 = response.split("_||_");
					var Disinhibitiedhtml = data1[0];
					var Inhibitiedhtml = data1[1];
					var Othershtml = data1[2];
					var Disinhibitiedhtmlneg = data1[3];
					var Inhibitiedhtmlneg = data1[4];
					var Othershtmlneg = data1[5];
					var formtitlewithnm = data1[6];
					
					
					
					$(".clsDisinhibitied").html(Disinhibitiedhtml);
					$(".clsInhibitied").html(Inhibitiedhtml);
					$(".clsOthers").html(Othershtml);
					$(".clsDisinhibitiedhtmlneg").html(Disinhibitiedhtmlneg);
					$(".clsInhibitiedhtmlneg").html(Inhibitiedhtmlneg);
					$(".clsOthershtmlneg").html(Othershtmlneg);
					$(".nvinformatnm").html(formtitlewithnm);
					
					
					$('#myModal-91').modal("show");
					
					$anim.hide();
					$(".main-modal .clinician-2 .clinic-2-panel .plus").click(function(event){
						event.preventDefault();
						if(!$(this).hasClass('active'))
						{
							$(".main-modal .clinician-2 .clinic-2-panel-wrap").each(function(){
								if($(this).children().children().hasClass('active'))
								{
									$(this).children().next().slideToggle("slow");
									$(".main-modal .clinician-2 .clinic-2-panel .plus").removeClass('active');
								}
							});
						}
						$(this).toggleClass("active");
						$(this).parent().next().slideToggle("slow");
					});
					
					$('.main-modal .clinician-2 .clinic-2-panel .pencil').click(function(){
						//$("#myModal-10").modal("show");
						//$("#myModal-9").modal("hide");
						
						var questionID = $(this).attr("data-question");
						var childID = $(this).attr("data-child");
						var questiontype = $(this).attr("data-questiontype");
						var userID = $(this).attr("data-userID");
						
						
						$anim.show();
						$.ajax({
							url:base_url + "clinical/capaparentcomment",
							type:"POST",
							data: {questionID:questionID,childID:childID,questiontype:questiontype,userID:userID},
							success:function(response)
							{
								$("#questionwithcomment").html(response);
								$("#myModal-10").modal("show");
								$("#myModal-91").modal("hide");
								$anim.hide();
							}
						});
						
						
					});
					
					$('.main-modal .clinician-2 .clinic-2-panel .question-mark').click(function(){
						var questionID = $(this).attr("data-question");
						$anim.show();
						$.ajax({
							url:base_url + "clinical/capaparentquestionwithdescription",
							type:"POST",
							data: {questionID:questionID},
							success:function(response)
							{
								//alert(response);
								$("#questionDescriptionCapa").html(response);
								$("#myModal-11").modal("show");
								$("#myModal-91").modal("hide");
								$anim.hide();
							}
						});
						//$("#myModal-11").modal("show");
						//$("#myModal-9").modal("hide");
					});
					
					
				}
			});
			
			
		});
		
		$("body").delegate(".parentquestionansrpq","click",function(e){
			var childid = $(this).attr("data-childid");
			var userID = $(this).attr("data-user");
			var questiontype = $(this).attr("data-questiontype");
			
			$anim.show();
			$.ajax({
				url:base_url + "clinical/fetchparentquestionanswer",
				type:"POST",
				data: {childid:childid,userID:userID,questiontype:questiontype},
				success:function(response)
				{
					$(".questionwithans").html(response);
					$('#myModal-9').modal("show");
					
					$anim.hide();
					$(".main-modal .clinician-2 .clinic-2-panel .plus").click(function(event){
						event.preventDefault();
						if(!$(this).hasClass('active'))
						{
							$(".main-modal .clinician-2 .clinic-2-panel-wrap").each(function(){
								if($(this).children().children().hasClass('active'))
								{
									$(this).children().next().slideToggle("slow");
									$(".main-modal .clinician-2 .clinic-2-panel .plus").removeClass('active');
								}
							});
						}
						$(this).toggleClass("active");
						$(this).parent().next().slideToggle("slow");
					});
					
					$('.main-modal .clinician-2 .clinic-2-panel .pencil').click(function(){
						var questionID = $(this).attr("data-question");
						var childID = $(this).attr("data-child");
						var questiontype = $(this).attr("data-questiontype");
						var userID = $(this).attr("data-userID");
						$anim.show();
						$.ajax({
							url:base_url + "clinical/rpqparentcomment",
							type:"POST",
							data: {questionID:questionID,childID:childID,questiontype:questiontype,userID:userID},
							success:function(response)
							{
								$("#questionwithcomment").html(response);
								$("#myModal-9").modal("hide");
								$("#myModal-10").modal("show");
								
								
								$anim.hide();
							}
						});
						
						
					});
					
					$('.main-modal .clinician-2 .clinic-2-panel .question-mark').click(function(){
						$("#myModal-11").modal("show");
						$("#myModal-9").modal("hide");
					});
					
					
				}
			});
			
			
		});
		//delete-comment
		$("body").delegate(".delete-comment","click",function(e){
			var comment = "";
			var childID = $(this).attr("data-child");
			var questionID = $(this).attr("data-question");
			var userID = $(this).attr("data-user");
			$anim.show();
			$.ajax({
				url:base_url + "clinical/deletecomment",
				type:"POST",
				data: {comment:comment,childID:childID,questionID:questionID,userID:userID},
				success:function(response)
				{
					if(response)
					{
						$("#postcomment").val("");
						$("#myModal-10").modal("hide");
						$("#myModal-9").modal("show");
						
					}
					$anim.hide();
				}
			});
		});
		
		$("body").delegate(".delete-comment-objervation","click",function(e){
			var comment = "";
			var userID = $(this).attr("data-user");
			var questionID = $(this).attr("data-question");
			
			$anim.show();
			$.ajax({
				url:base_url + "clinical/deletecommentobjervation",
				type:"POST",
				data: {comment:comment,questionID:questionID,userID:userID},
				success:function(response)
				{
					if(response)
					{
						$("#postcomment").val("");
						$("#myModal-10").modal("hide");
						$("#myModal-9").modal("show");
						
					}
					$anim.hide();
				}
			});
		});
		
		$("body").delegate(".delete-comment-capa","click",function(e){
			var comment = "";
			var childID = $(this).attr("data-child");
			var questionID = $(this).attr("data-question");
			var userID = $(this).attr("data-user");
			$anim.show();
			$.ajax({
				url:base_url + "clinical/deletecommentcapa",
				type:"POST",
				data: {comment:comment,childID:childID,questionID:questionID,userID:userID},
				success:function(response)
				{
					if(response)
					{
						$("#postcomment").val("");
					}
					$anim.hide();
				}
			});
		});
		
		
		$("body").delegate(".submit-comment","click",function(e){
			var comment = $("#postcomment").val();
			var childID = $(this).attr("data-child");
			var questionID = $(this).attr("data-question");
			var userID = $(this).attr("data-user");
			var diagnosis = $('input[name=diagnosisrpq]:checked').val();
			
			$anim.show();
			$.ajax({
				url:base_url + "clinical/savecomment",
				type:"POST",
				data: {comment:comment,childID:childID,questionID:questionID,userID:userID,diagnosis:diagnosis},
				success:function(response)
				{
					$("#myModal-10").modal("hide");
					$("#myModal-9").modal("show");
					
					
					$anim.hide();
				}
			});
		});
		
		$("body").delegate(".submit-comment-objervation","click",function(e){
			var userID = $(this).attr("data-user");
			var questionID = $(this).attr("data-question");
			var comment = $("#postcomment").val();
			$anim.show();
			$.ajax({
				url:base_url + "clinical/savecommentobjervation",
				type:"POST",
				data: {comment:comment,questionID:questionID,userID:userID},
				success:function(response)
				{
					$("#myModal-9").modal("show");
					$("#myModal-10").modal("hide");
					$anim.hide();
				}
			});
		});
		
		$("body").delegate(".submit-comment-capa","click",function(e){
			var comment = $("#postcomment").val();
			var childID = $(this).attr("data-child");
			var questionID = $(this).attr("data-question");
			var userID = $(this).attr("data-user");
			var diagnosis = $('input[name=diagnosis]:checked').val();
			
			$anim.show();
			$.ajax({
				url:base_url + "clinical/savecommentcapa",
				type:"POST",
				data: {comment:comment,childID:childID,questionID:questionID,userID:userID,diagnosis:diagnosis},
				success:function(response)
				{
					$("#myModal-91").modal("show");
					$("#myModal-10").modal("hide");
					$anim.hide();
				}
			});
		});
		
		
		
		//maybe_submit
		$("body").delegate(".maybe_submit","click",function(e){
			$anim.show();
			var submitID = jQuery(this).attr("id");
			var hidden_capa_childid = jQuery("#hidden_capa_childid").val();
			var mydata = jQuery("form#frm"+submitID).serialize();
			var datasting = mydata+"&hidden_capa_childid="+hidden_capa_childid;
			$.ajax({
				url:base_url + "teachers/teacher_extra_ans",
				type:"POST",
				data: datasting,
				success:function(response)
				{
					//alert(response);
					$anim.hide();
				}
			});
			return false;
		});
		
		$("body").delegate(".maybe_submit_parent","click",function(e){
			$anim.show();
			var submitID = jQuery(this).attr("id");
			var hidden_capa_childid = jQuery("#hidden_capa_childid").val();
			var mydata = jQuery("form#frm"+submitID).serialize();
			var datasting = mydata+"&hidden_capa_childid="+hidden_capa_childid;
			$.ajax({
				url:base_url + "parents/parent_extra_ans",
				type:"POST",
				data: datasting,
				success:function(response)
				{
					//alert(response);
					$anim.hide();
				}
			});
			return false;
		});
		
		
		//cmtsubmit

});


						$("body").delegate(".submitansmaincomment","click",function(e){
							e.preventDefault();
							var mainanscmtqus = jQuery(this).attr("data-mainqus");
							var mainanscmtchild = jQuery(this).attr("data-child");
							var mainanscmtcomment = jQuery("#comment_main_qus_"+mainanscmtqus).val();

							var QuestionID = mainanscmtqus;
							var ChildID=mainanscmtchild;
							$anim.show();
							$.ajax({
								url:base_url + "parents/parent_save_main_comment",
								type:"POST",
								data: {mainanscmtqus:mainanscmtqus,mainanscmtchild:mainanscmtchild,mainanscmtcomment:mainanscmtcomment},
								success:function(responsecomment)
								{
									$.ajax({
										url:base_url + "parents/parent_yes_ans_new",
										type:"POST",
										data: {QuestionID:QuestionID,ChildID:ChildID},
										success:function(response)
										{
											if(response == "")
											{
												$('.bx-next').trigger('click');
												$anim.hide();
											}
											else
											{
												$anim.show();
												$('#myModal-13').removeClass("fade");
												$("#master_question_insert_parent").html(response);
												$('#myModal-13').modal("hide");
												
												//QuestionID
												if(bx != undefined)
												{
													bx.destroySlider();
												}
						
												bx = $(".nvbxslidernewparent").bxSlider({
														hideControlOnEnd:false,
														infiniteLoop:false,
														pager: false, 
														pagerType: 'short',
														onSliderLoad:function()
														{
														setTimeout(function() 
														{
															var total1	= bx.getSlideCount();
															var total2	= bx.getCurrentSlide()+1;

															jQuery("#myModal-23 .bx-has-controls-direction").prepend('<div class="bx-pager bx-default-pager">'+ (bx.getCurrentSlide()+1) + '/ extra</div>');
																if(total1==total2)
																{
																	$(".bx-controls-direction .bx-next").addClass("finalstep13");
																	//$("#myModal-13").modal('hide');
																	//$(".nvbxsliderparent .bx-controls-direction .bx-next").attr("id",QuestionID);
																}
																else
																{
																	$(".bx-controls-direction .bx-next").removeClass("finalstep13");
																	//$(".nvbxsliderparent .bx-controls-direction .bx-next").attr("id","");
																}
														}, 400);
														},


							onSlideBefore: function($slideElement, oldIndex, newIndex)
							{
								var total1	= bx.getSlideCount();
								var total2	= bx.getCurrentSlide()+1;
								jQuery("#myModal-23 .bx-default-pager").html(total2+" / extra");

							if(total1==total2)
							{
								$(".bx-controls-direction .bx-next").addClass("finalstep13");
								//$("#myModal-13").modal('hide');
								//$(".nvbxsliderparent .bx-controls-direction .bx-next").attr("id",QuestionID);
							}
							else
							{
								$(".bx-controls-direction .bx-next").removeClass("finalstep13");
								//$(".nvbxsliderparent .bx-controls-direction .bx-next").attr("id","");
							}
							},
							onSlideAfter: function($slideElement, oldIndex, newIndex)
							{
										
							var total1	= bx.getSlideCount();
							var total2	= bx.getCurrentSlide()+1;
																					 
							jQuery("#myModal-23 .bx-default-pager").html(total2+" / extra");

							if(total1==total2)
							{
								$(".bx-controls-direction .bx-next").addClass("finalstep13");
								//$("#myModal-13").modal('hide');
								//$(".nvbxsliderparent .bx-controls-direction .bx-next").attr("id",QuestionID);
							}
							else
							{
								$(".bx-controls-direction .bx-next").removeClass("finalstep13");
								//$(".nvbxsliderparent .bx-controls-direction .bx-next").attr("id","");
							}
						  },
/////AAAA////
														onSlideAfter: function($slideElement, oldIndex, newIndex)
														{
															
															var total1	= bx.getSlideCount();
															var total2	= bx.getCurrentSlide()+1;

															////AAA/AA
															
															if(total1==total2)
															{
																$(".nvbxsliderparent .bx-controls-direction .bx-next").addClass("finalstep");
																$(".nvbxsliderparent .bx-controls-direction .bx-next").attr("id",QuestionID);
															}
															else
															{
																$(".nvbxsliderparent .bx-controls-direction .bx-next").removeClass("finalstep");
																$(".nvbxsliderparent .bx-controls-direction .bx-next").attr("id","");
															}
														  },
														
												});
												$(window).trigger('resize');
												setTimeout(function(){ 						 
												bx.reloadSlider();
												$( ".bx-viewport" ).css( "height", ""); 
												$(".bx-prev").attr("title","Go to previous question");
												$(".bx-next").attr("title","Go to next question");
												},300);
												//$(".bx-next").addClass("Test123");
												$('#myModal-23').modal("show");
												setTimeout(function(){ 	
													$anim.hide();
												},300);
			
												
											}
											
										
										}
									});
								}
							});
						});






/*

						$("body").delegate(".submitansmaincomment","click",function(e){
							var mainanscmtqus = jQuery(this).attr("data-mainqus");
							var mainanscmtchild = jQuery(this).attr("data-child");
							var mainanscmtcomment = jQuery("#comment_main_qus_"+mainanscmtqus).val();
							$anim.show();
							$.ajax({
								url:base_url + "parents/parent_save_main_comment",
								type:"POST",
								data: {mainanscmtqus:mainanscmtqus,mainanscmtchild:mainanscmtchild,mainanscmtcomment:mainanscmtcomment},
								success:function(responsecomment)
								{
									$.ajax({
										url:base_url + "parents/parent_yes_ans_new",
										type:"POST",
										data: {QuestionID:QuestionID,ChildID:ChildID},


										success:function(response)
										{
											
											if(response == "")
											{
												$('.bx-next').trigger('click');
												$anim.hide();
											}
											else
											{
												$anim.show();
												$('#myModal-13').removeClass("fade");
												$("#master_question_insert_parent").html(response);
												$('#myModal-13').modal("hide");
												
												//QuestionID
												if(bx != undefined)
												{
													bx.destroySlider();
												}
									
												bx = $(".nvbxslidernewparent").bxSlider({
														hideControlOnEnd:false,
														infiniteLoop:false,
														pager: true, 
														pagerType: 'short',
														onSliderLoad:function()
														{
															setTimeout(function() 
															{		
																var total1	= bx.getSlideCount();
																var total2	= bx.getCurrentSlide()+1;
//															    jQuery("#myModal-13 .bx-has-controls-direction").prepend('<div class="bx-pager bx-default-pager">'+ (bx.getCurrentSlide()+1) +'a / '+ bx.getSlideCount() +'</div>');
																jQuery("#myModal-23 .bx-default-pager").html(total2+" / extra");
																if(total1==total2)
																{
																	$(".nvbxsliderparent .bx-controls-direction .bx-next").addClass("finalstep");
																	$(".nvbxsliderparent .bx-controls-direction .bx-next").attr("id",QuestionID);
																}
																else
																{
																	$(".nvbxsliderparent .bx-controls-direction .bx-next").removeClass("finalstep");
																	$(".nvbxsliderparent .bx-controls-direction .bx-next").attr("id","");
																}

															}, 400);
														},
														onSlideBefore: function($slideElement, oldIndex, newIndex)
														{
															var total1	= bx.getSlideCount();
															var total2	= bx.getCurrentSlide()+1;
															jQuery("#myModal-23 .bx-default-pager").html(total2+" / extra");
															if(total1==total2)
															{
																$(".nvbxsliderparent .bx-controls-direction .bx-next").addClass("finalstep");
																$(".nvbxsliderparent .bx-controls-direction .bx-next").attr("id",QuestionID);
															}
															else
															{
																$(".nvbxsliderparent .bx-controls-direction .bx-next").removeClass("finalstep");
																$(".nvbxsliderparent .bx-controls-direction .bx-next").attr("id","");
															}
														},
														onSlideAfter: function($slideElement, oldIndex, newIndex){
															
															var total1	= bx.getSlideCount();
															var total2	= bx.getCurrentSlide()+1;

															jQuery("#myModal-23 .bx-default-pager").html(total2+" / extra");
	
															if(total1==total2)
															{
																$(".nvbxsliderparent .bx-controls-direction .bx-next").addClass("finalstep");
																$(".nvbxsliderparent .bx-controls-direction .bx-next").attr("id",QuestionID);
															}
															else
															{
																$(".nvbxsliderparent .bx-controls-direction .bx-next").removeClass("finalstep");
																$(".nvbxsliderparent .bx-controls-direction .bx-next").attr("id","");
															}
														  },
														
												});
												$(window).trigger('resize');
												setTimeout(function(){ 						 
												bx.reloadSlider();
												$( ".bx-viewport" ).css( "height", ""); 
												$(".bx-prev").attr("title","Go to previous question");
												$(".bx-next").attr("title","Go to next question");
												},300);
												//$(".bx-next").addClass("Test123");
												$('#myModal-23').modal("show");
												setTimeout(function(){ 	
													$anim.hide();
												},300);
			
												
											}
											
										
										}
									});
								}
							});
						});


*/