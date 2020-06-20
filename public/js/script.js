<!-- Footer Function Start -->
var $anim = $("#loadAnim");
$(function (){
	var z = $('.footer').outerHeight();
	$('#wrapper').css('padding-bottom', z);
});
$( window ).resize(function() {
	var footer = $('.footer').outerHeight();
	$('#wrapper').css('padding-bottom', footer);
});

<!-- Footer Function End -->

<!-- Selectpicker Start -->

$(function () {
	$('.selectpicker').selectpicker();
	$("body").delegate(".readmorequs","click",function(){
		var readid = $(this).attr("id");
		$(".nv"+readid).hide();
		$("."+readid).show();
		
	});
	
});

<!-- Selectpicker End -->

<!-- Custome-Selectbox Start -->

$(document).ready(function(){
	$('.custome-selectbox .selectbox').click(function(event){
		event.stopPropagation();
		$(this).parent(".custome-selectbox").toggleClass("open");
	})

	$('body').click(function(){
		$('.custome-selectbox').removeClass("open");
	})
	
	$('.findchild').click(function(){
		var clickval = $(this).text();
		if(clickval != "")
		{
			$(".groupfliter").text(clickval);
		}
		else
		{
			$(".groupfliter").text("Group");
		}
	});
	
	
	//$('.nvselchildren').click(function(){
	$('body').delegate(".nvselchildren",'click',function(){
		var selchildnm = $(this).text();
		if(selchildnm != "")
		{
			$(".childrenselected").text(selchildnm);
		}
		else
		{
			$(".childrenselected").text(selchildnm);
		}
	});
	
	
	
});

<!-- Custome-Selectbox End -->

<!-- Bxslider Start -->




<!-- Bxslider End -->

<!-- Other Function Start -->

$(document).ready(function(){
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
});

$('.main-modal .clinician-2 .clinic-2-panel .pencil').click(function(){
	$("#myModal-10").modal("show");
	$("#myModal-9").modal("hide");
});

$('.main-modal .clinician-2 .clinic-2-panel .question-mark').click(function(){
	$("#myModal-11").modal("show");
	$("#myModal-9").modal("hide");
});

<!-- Other Function End -->

<!-- Capa-info-2-tab Start -->

$(document).ready(function(){
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

	$("body").delegate(".childview","click",function(){ });


	$("body").delegate(".childpricelist","change",function(){
		var totalnumber = $(this).val();
		var finalamount = parseInt(totalnumber*10);
		$("#total_amount").val(finalamount);
		$(".finalprice").html("&euro;"+finalamount);
	});
	
$("body").delegate(".infoque","click",function(){
	var text = jQuery(this).find(".qdetails").html();
	var title=jQuery(this).find(".qtitle").html();

	jQuery("#quesinfo").find("#ques_title_info").html(title);
	jQuery("#quesinfo").find("#ques_desc_info").html("<p>"+text+"</p>");
	jQuery("#quesinfo").modal("show");
});

	
});

<!-- Capa-info-2-tab End -->

var slider;

/*$(document).ready(function(){
	
	slider = $('.nvbxslider').bxSlider({
		hideControlOnEnd:true,
		infiniteLoop:false,
		pager: true, 
		pagerType: 'short',
		infiniteLoop: false,
	});
	
});*/



