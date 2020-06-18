/*!
 * bootstrap-select v1.3.7
 * http://silviomoreto.github.io/bootstrap-select/
 *
 * Copyright 2013 bootstrap-select
 * Licensed under the MIT license
 */

!function(e){"use strict";e.expr[":"].icontains=function(t,i,s){return e(t).text().toUpperCase().indexOf(s[3].toUpperCase())>=0};var t=function(i,s,n){n&&(n.stopPropagation(),n.preventDefault()),this.$element=e(i),this.$newElement=null,this.$button=null,this.$menu=null,this.options=e.extend({},e.fn.selectpicker.defaults,this.$element.data(),"object"==typeof s&&s),null==this.options.title&&(this.options.title=this.$element.attr("title")),this.val=t.prototype.val,this.render=t.prototype.render,this.refresh=t.prototype.refresh,this.setStyle=t.prototype.setStyle,this.selectAll=t.prototype.selectAll,this.deselectAll=t.prototype.deselectAll,this.init()};t.prototype={constructor:t,init:function(){this.$element.hide(),this.multiple=this.$element.prop("multiple");var t=this.$element.attr("id");if(this.$newElement=this.createView(),this.$element.after(this.$newElement),this.$menu=this.$newElement.find("> .dropdown-menu"),this.$button=this.$newElement.find("> button"),this.$searchbox=this.$newElement.find("input"),void 0!==t){var i=this;this.$button.attr("data-id",t),e('label[for="'+t+'"]').click(function(e){e.preventDefault(),i.$button.focus()})}this.checkDisabled(),this.clickListener(),this.options.liveSearch&&this.liveSearchListener(),this.render(),this.liHeight(),this.setStyle(),this.setWidth(),this.options.container&&this.selectPosition(),this.$menu.data("this",this),this.$newElement.data("this",this)},createDropdown:function(){var t=this.multiple?" show-tick":"",i=this.options.header?'<div class="popover-title"><button type="button" class="close" aria-hidden="true">&times;</button>'+this.options.header+"</div>":"",s=this.options.liveSearch?'<div class="bootstrap-select-searchbox"><input type="text" class="input-block-level form-control" /></div>':"",n="<div class='btn-group bootstrap-select"+t+"'><button type='button' class='btn dropdown-toggle selectpicker' data-toggle='dropdown'><span class='filter-option pull-left'></span>&nbsp;<span class='caret'></span></button><div class='dropdown-menu open'>"+i+s+"<ul class='dropdown-menu inner selectpicker' role='menu'></ul></div></div>";return e(n)},createView:function(){var e=this.createDropdown(),t=this.createLi();return e.find("ul").append(t),e},reloadLi:function(){this.destroyLi();var e=this.createLi();this.$menu.find("ul").append(e)},destroyLi:function(){this.$menu.find("li").remove()},createLi:function(){var t=this,i=[],s="";return this.$element.find("option").each(function(){var s=e(this),n=s.attr("class")||"",o=s.attr("style")||"",a=s.data("content")?s.data("content"):s.html(),l=void 0!==s.data("subtext")?'<small class="muted text-muted">'+s.data("subtext")+"</small>":"",d=void 0!==s.data("icon")?'<i class="glyphicon '+s.data("icon")+'"></i> ':"";if(""!==d&&(s.is(":disabled")||s.parent().is(":disabled"))&&(d="<span>"+d+"</span>"),s.data("content")||(a=d+'<span class="text">'+a+l+"</span>"),t.options.hideDisabled&&(s.is(":disabled")||s.parent().is(":disabled")))i.push('<a style="min-height: 0; padding: 0"></a>');else if(s.parent().is("optgroup")&&s.data("divider")!==!0)if(0==s.index()){var r=s.parent().attr("label"),h=void 0!==s.parent().data("subtext")?'<small class="muted text-muted">'+s.parent().data("subtext")+"</small>":"",c=s.parent().data("icon")?'<i class="'+s.parent().data("icon")+'"></i> ':"";r=c+'<span class="text">'+r+h+"</span>",i.push(0!=s[0].index?'<div class="div-contain"><div class="divider"></div></div><dt>'+r+"</dt>"+t.createA(a,"opt "+n,o):"<dt>"+r+"</dt>"+t.createA(a,"opt "+n,o))}else i.push(t.createA(a,"opt "+n,o));else i.push(s.data("divider")===!0?'<div class="div-contain"><div class="divider"></div></div>':e(this).data("hidden")===!0?"":t.createA(a,n,o))}),e.each(i,function(e,t){s+="<li rel="+e+">"+t+"</li>"}),this.multiple||0!=this.$element.find("option:selected").length||this.options.title||this.$element.find("option").eq(0).prop("selected",!0).attr("selected","selected"),e(s)},createA:function(e,t,i){return'<a tabindex="0" class="'+t+'" style="'+i+'">'+e+'<i class="fa fa-check"></i></a>'},render:function(){var t=this;this.$element.find("option").each(function(i){t.setDisabled(i,e(this).is(":disabled")||e(this).parent().is(":disabled")),t.setSelected(i,e(this).is(":selected"))}),this.tabIndex();var i=this.$element.find("option:selected").map(function(){var i,s=e(this),n=s.data("icon")&&t.options.showIcon?'<i class="glyphicon '+s.data("icon")+'"></i> ':"";return i=t.options.showSubtext&&s.attr("data-subtext")&&!t.multiple?' <small class="muted text-muted">'+s.data("subtext")+"</small>":"",s.data("content")&&t.options.showContent?s.data("content"):void 0!=s.attr("title")?s.attr("title"):n+s.html()+i}).toArray(),s=this.multiple?i.join(", "):i[0];if(this.multiple&&this.options.selectedTextFormat.indexOf("count")>-1){var n=this.options.selectedTextFormat.split(">"),o=this.options.hideDisabled?":not([disabled])":"";(n.length>1&&i.length>n[1]||1==n.length&&i.length>=2)&&(s=this.options.countSelectedText.replace("{0}",i.length).replace("{1}",this.$element.find('option:not([data-divider="true"]):not([data-hidden="true"])'+o).length))}s||(s=void 0!=this.options.title?this.options.title:this.options.noneSelectedText),this.$newElement.find(".filter-option").html(s)},setStyle:function(e,t){this.$element.attr("class")&&this.$newElement.addClass(this.$element.attr("class").replace(/selectpicker|mobile-device/gi,""));var i=e?e:this.options.style;"add"==t?this.$button.addClass(i):"remove"==t?this.$button.removeClass(i):(this.$button.removeClass(this.options.style),this.$button.addClass(i))},liHeight:function(){var e=this.$menu.parent().clone().appendTo("body"),t=e.addClass("open").find("> .dropdown-menu"),i=t.find("li > a").outerHeight(),s=this.options.header?t.find(".popover-title").outerHeight():0,n=this.options.liveSearch?t.find(".bootstrap-select-searchbox").outerHeight():0;e.remove(),this.$newElement.data("liHeight",i).data("headerHeight",s).data("searchHeight",n)},setSize:function(){var t,i,s,n=this,o=this.$menu,a=o.find(".inner"),l=this.$newElement.outerHeight(),d=this.$newElement.data("liHeight"),r=this.$newElement.data("headerHeight"),h=this.$newElement.data("searchHeight"),c=o.find("li .divider").outerHeight(!0),p=parseInt(o.css("padding-top"))+parseInt(o.css("padding-bottom"))+parseInt(o.css("border-top-width"))+parseInt(o.css("border-bottom-width")),u=this.options.hideDisabled?":not(.disabled)":"",m=e(window),f=p+parseInt(o.css("margin-top"))+parseInt(o.css("margin-bottom"))+2,v=function(){i=n.$newElement.offset().top-m.scrollTop(),s=m.height()-i-l};if(v(),this.options.header&&o.css("padding-top",0),"auto"==this.options.size){var b=function(){var e;v(),t=s-f,n.options.dropupAuto&&n.$newElement.toggleClass("dropup",i>s&&t-f<o.height()),n.$newElement.hasClass("dropup")&&(t=i-f),e=o.find("li").length+o.find("dt").length>3?3*d+f-2:0,o.css({"max-height":t+"px",overflow:"hidden","min-height":e+"px"}),a.css({"max-height":t-r-h-p+"px","overflow-y":"auto","min-height":e-p+"px"})};b(),e(window).resize(b),e(window).scroll(b)}else if(this.options.size&&"auto"!=this.options.size&&o.find("li"+u).length>this.options.size){var $=o.find("li"+u+" > *").filter(":not(.div-contain)").slice(0,this.options.size).last().parent().index(),w=o.find("li").slice(0,$+1).find(".div-contain").length;t=d*this.options.size+w*c+p,n.options.dropupAuto&&this.$newElement.toggleClass("dropup",i>s&&t<o.height()),o.css({"max-height":t+r+h+"px",overflow:"hidden"}),a.css({"max-height":t-p+"px","overflow-y":"auto"})}},setWidth:function(){if("auto"==this.options.width){this.$menu.css("min-width","0");var e=this.$newElement.clone().appendTo("body"),t=e.find("> .dropdown-menu").css("width");e.remove(),this.$newElement.css("width",t)}else"fit"==this.options.width?(this.$menu.css("min-width",""),this.$newElement.css("width","").addClass("fit-width")):this.options.width?(this.$menu.css("min-width",""),this.$newElement.css("width",this.options.width)):(this.$menu.css("min-width",""),this.$newElement.css("width",""));this.$newElement.hasClass("fit-width")&&"fit"!==this.options.width&&this.$newElement.removeClass("fit-width")},selectPosition:function(){var t,i,s=this,n="<div />",o=e(n),a=function(e){o.addClass(e.attr("class")).toggleClass("dropup",e.hasClass("dropup")),t=e.offset(),i=e.hasClass("dropup")?0:e[0].offsetHeight,o.css({top:t.top+i,left:t.left,width:e[0].offsetWidth,position:"absolute"})};this.$newElement.on("click",function(){a(e(this)),o.appendTo(s.options.container),o.toggleClass("open",!e(this).hasClass("open")),o.append(s.$menu)}),e(window).resize(function(){a(s.$newElement)}),e(window).on("scroll",function(){a(s.$newElement)}),e("html").on("click",function(t){e(t.target).closest(s.$newElement).length<1&&o.removeClass("open")})},mobile:function(){this.$element.addClass("mobile-device").appendTo(this.$newElement),this.options.container&&this.$menu.hide()},refresh:function(){this.reloadLi(),this.render(),this.setWidth(),this.setStyle(),this.checkDisabled(),this.liHeight()},update:function(){this.reloadLi(),this.setWidth(),this.setStyle(),this.checkDisabled(),this.liHeight()},setSelected:function(e,t){this.$menu.find("li").eq(e).toggleClass("selected",t)},setDisabled:function(e,t){t?this.$menu.find("li").eq(e).addClass("disabled").find("a").attr("href","#").attr("tabindex",-1):this.$menu.find("li").eq(e).removeClass("disabled").find("a").removeAttr("href").attr("tabindex",0)},isDisabled:function(){return this.$element.is(":disabled")},checkDisabled:function(){var e=this;this.isDisabled()?this.$button.addClass("disabled").attr("tabindex",-1):(this.$button.hasClass("disabled")&&this.$button.removeClass("disabled"),-1==this.$button.attr("tabindex")&&(this.$element.data("tabindex")||this.$button.removeAttr("tabindex"))),this.$button.click(function(){return!e.isDisabled()})},tabIndex:function(){this.$element.is("[tabindex]")&&(this.$element.data("tabindex",this.$element.attr("tabindex")),this.$button.attr("tabindex",this.$element.data("tabindex")))},clickListener:function(){var t=this;e("body").on("touchstart.dropdown",".dropdown-menu",function(e){e.stopPropagation()}),this.$newElement.on("click",function(){t.setSize(),t.options.liveSearch||t.multiple||setTimeout(function(){t.$menu.find(".selected a").focus()},10)}),this.$menu.on("click","li a",function(i){var s=e(this).parent().index(),n=t.$element.val(),o=t.$element.prop("selectedIndex");if(t.multiple&&i.stopPropagation(),i.preventDefault(),!t.isDisabled()&&!e(this).parent().hasClass("disabled")){var a=t.$element.find("option"),l=a.eq(s);if(t.multiple){var d=l.prop("selected");l.prop("selected",!d)}else a.prop("selected",!1),l.prop("selected",!0);t.multiple?t.options.liveSearch&&t.$searchbox.focus():t.$button.focus(),(n!=t.$element.val()&&t.multiple||o!=t.$element.prop("selectedIndex")&&!t.multiple)&&t.$element.change()}}),this.$menu.on("click","li.disabled a, li dt, li .div-contain, .popover-title, .popover-title :not(.close)",function(e){e.target==this&&(e.preventDefault(),e.stopPropagation(),t.options.liveSearch?t.$searchbox.focus():t.$button.focus())}),this.$menu.on("click",".popover-title .close",function(){t.$button.focus()}),this.$searchbox.on("click",function(e){e.stopPropagation()}),this.$element.change(function(){t.render()})},liveSearchListener:function(){var t=this,i=e('<li class="no-results"></li>');this.$newElement.on("click.dropdown.data-api",function(){t.$menu.find(".active").removeClass("active"),t.$searchbox.val()&&(t.$searchbox.val(""),t.$menu.find("li").show(),i.remove()),t.multiple||t.$menu.find(".selected").addClass("active"),setTimeout(function(){t.$searchbox.focus()},10)}),this.$searchbox.on("input propertychange",function(){t.$searchbox.val()?(t.$menu.find("li").show().not(":icontains("+t.$searchbox.val()+")").hide(),t.$menu.find("li").filter(":visible:not(.no-results)").length?i.remove():(i.remove(),i.html('No results match "'+t.$searchbox.val()+'"').show(),t.$menu.find("li").last().after(i))):t.$menu.find("li").show(),t.$menu.find("li.active").removeClass("active"),t.$menu.find("li").filter(":visible:not(.divider)").eq(0).addClass("active").find("a").focus(),e(this).focus()}),this.$menu.on("mouseenter","a",function(i){t.$menu.find(".active").removeClass("active"),e(i.currentTarget).parent().not(".disabled").addClass("active")}),this.$menu.on("mouseleave","a",function(){t.$menu.find(".active").removeClass("active")})},val:function(e){return void 0!=e?(this.$element.val(e),this.$element.change(),this.$element):this.$element.val()},selectAll:function(){this.$element.find("option").prop("selected",!0).attr("selected","selected"),this.render()},deselectAll:function(){this.$element.find("option").prop("selected",!1).removeAttr("selected"),this.render()},keydown:function(t){var i,s,n,o,a,l,d,r,h,c,p,u,m={32:" ",48:"0",49:"1",50:"2",51:"3",52:"4",53:"5",54:"6",55:"7",56:"8",57:"9",59:";",65:"a",66:"b",67:"c",68:"d",69:"e",70:"f",71:"g",72:"h",73:"i",74:"j",75:"k",76:"l",77:"m",78:"n",79:"o",80:"p",81:"q",82:"r",83:"s",84:"t",85:"u",86:"v",87:"w",88:"x",89:"y",90:"z",96:"0",97:"1",98:"2",99:"3",100:"4",101:"5",102:"6",103:"7",104:"8",105:"9"};if(i=e(this),n=i.parent(),i.is("input")&&(n=i.parent().parent()),c=n.data("this"),c.options.liveSearch&&(n=i.parent().parent()),c.options.container&&(n=c.$menu),s=e("[role=menu] li:not(.divider) a",n),u=c.$menu.parent().hasClass("open"),c.options.liveSearch&&(/(^9$|27)/.test(t.keyCode)&&u&&0==c.$menu.find(".active").length&&(t.preventDefault(),c.$menu.parent().removeClass("open"),c.$button.focus()),s=e("[role=menu] li:not(.divider):visible",n),i.val()||/(38|40)/.test(t.keyCode)||0==s.filter(".active").length&&(s=c.$newElement.find("li").filter(":icontains("+m[t.keyCode]+")"))),s.length){if(/(38|40)/.test(t.keyCode))u||c.$menu.parent().addClass("open"),o=s.index(s.filter(":focus")),l=s.parent(":not(.disabled):visible").first().index(),d=s.parent(":not(.disabled):visible").last().index(),a=s.eq(o).parent().nextAll(":not(.disabled):visible").eq(0).index(),r=s.eq(o).parent().prevAll(":not(.disabled):visible").eq(0).index(),h=s.eq(a).parent().prevAll(":not(.disabled):visible").eq(0).index(),c.options.liveSearch&&(s.each(function(t){e(this).is(":not(.disabled)")&&e(this).data("index",t)}),o=s.index(s.filter(".active")),l=s.filter(":not(.disabled):visible").first().data("index"),d=s.filter(":not(.disabled):visible").last().data("index"),a=s.eq(o).nextAll(":not(.disabled):visible").eq(0).data("index"),r=s.eq(o).prevAll(":not(.disabled):visible").eq(0).data("index"),h=s.eq(a).prevAll(":not(.disabled):visible").eq(0).data("index")),p=i.data("prevIndex"),38==t.keyCode&&(c.options.liveSearch&&(o-=1),o!=h&&o>r&&(o=r),l>o&&(o=l),o==p&&(o=d)),40==t.keyCode&&(c.options.liveSearch&&(o+=1),-1==o&&(o=0),o!=h&&a>o&&(o=a),o>d&&(o=d),o==p&&(o=l)),i.data("prevIndex",o),c.options.liveSearch?(t.preventDefault(),i.is(".dropdown-toggle")||(s.removeClass("active"),s.eq(o).addClass("active").find("a").focus(),i.focus())):s.eq(o).focus();else if(!i.is("input")){var f=[];s.each(function(){e(this).parent().is(":not(.disabled)")&&e.trim(e(this).text().toLowerCase()).substring(0,1)==m[t.keyCode]&&f.push(e(this).parent().index())});var v=e(document).data("keycount");v++,e(document).data("keycount",v);var b=e.trim(e(":focus").text().toLowerCase()).substring(0,1);b!=m[t.keyCode]?(v=1,e(document).data("keycount",v)):v>=f.length&&e(document).data("keycount",0),s.eq(f[v-1]).focus()}/(13|32|^9$)/.test(t.keyCode)&&u&&(/(32)/.test(t.keyCode)||t.preventDefault(),c.options.liveSearch?/(32)/.test(t.keyCode)||(c.$menu.find(".active a").click(),i.focus()):e(":focus").click(),e(document).data("keycount",0)),(/(^9$|27)/.test(t.keyCode)&&u&&(c.multiple||c.options.liveSearch)||/(27)/.test(t.keyCode)&&!u)&&(c.$menu.parent().removeClass("open"),c.$button.focus())}},hide:function(){this.$newElement.hide()},show:function(){this.$newElement.show()},destroy:function(){this.$newElement.remove(),this.$element.remove()}},e.fn.selectpicker=function(i,s){var n,o=arguments,a=this.each(function(){if(e(this).is("select")){var a=e(this),l=a.data("selectpicker"),d="object"==typeof i&&i;if(l){if(d)for(var r in d)l.options[r]=d[r]}else a.data("selectpicker",l=new t(this,d,s));if("string"==typeof i){var h=i;l[h]instanceof Function?([].shift.apply(o),n=l[h].apply(l,o)):n=l.options[h]}}});return void 0!=n?n:a},e.fn.selectpicker.defaults={style:"btn-default",size:"auto",title:null,selectedTextFormat:"values",noneSelectedText:"Nothing selected",countSelectedText:"{0} of {1} selected",width:!1,container:!1,hideDisabled:!1,showSubtext:!1,showIcon:!0,showContent:!0,dropupAuto:!0,header:!1,liveSearch:!1},e(document).data("keycount",0).on("keydown",".bootstrap-select [data-toggle=dropdown], .bootstrap-select [role=menu], .bootstrap-select-searchbox input",t.prototype.keydown)}(window.jQuery);