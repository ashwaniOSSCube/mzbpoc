
// SLIDE OPEN MENU PLUGIN
// https://github.com/aldomatic/FB-Style-Page-Slide-Menu
// ---------------------------------------------------------------------------------
(function($){

	$(window).load(function(){
		setTimeout(function(){
			window.scrollTo(0, 1);
		}, 0);	
	});
	
	var menuStatus;
	
	//Show menu
	$("a.showMenu").click(function(){
		if(menuStatus != true){             
			$(".ui-page-active").animate({
				'margin-left': "165px",
				}, 'fast', function(){menuStatus = true});
			return false;
		} else {
			$(".ui-page-active").animate({
				'margin-left': "0px",
				}, 'fast', function(){menuStatus = false});
			return false;
		}
	});
	
	
	// Delete Code below for stop swipe left & right function.
	
	// Swipe left function for menu. If you want you can disable swipe left funtion delete code below.
	$('#menu, .pages').live("swipeleft", function(){
		if (menuStatus){    
		$(".ui-page-active").animate({
			'margin-left': "0px",
			}, 'fast', function(){menuStatus = false});
		}
	});
	// Swipe left end
	
	
	// Swipe right function for menu. If you want you can disable swipe right funtion delete code below.
	$('.pages').live("swiperight", function(){
		if (!menuStatus){   
			$(".ui-page-active").animate({
			'margin-left': "165px",
			}, 'fast', function(){menuStatus = true});
		}
	});
	// Swipe right end
	
	//End Delete Code
	
	
	$('div[data-role="page"]').live('pagebeforeshow',function(event, ui){
		menuStatus = false;
		$(".pages").css("margin-left","0");
	});
	
	// Menu behaviour
	$("#menu li a").click(function(){
		var p = $(this).parent();
		if($(p).hasClass('active')){
			$("#menu li").removeClass('active');
		} else {
			$("#menu li").removeClass('active');
			$(p).addClass('active');
		}
	});
 
})(jQuery); 
 