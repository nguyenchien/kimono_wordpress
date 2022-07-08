// Tab
var $ = jQuery;
var swe_tab = $('div.swe-tab');
var hash = $.trim( window.location.hash );
$(window).bind('hashchange ready', function() {
	hash = $.trim( window.location.hash );
    if (typeof hash !== 'undefined' && hash !== "") {
		swe_tab.find('.swe-tab-title li a[href$="'+hash+'"]').click();		 
	}
});
swe_tab.find('.swe-tab-title li a').click(function(e){
    if( jQuery(this).hasClass('active') ) return;

//    var data_tab = jQuery(this).attr('data-tab');
    var href = jQuery(this).attr('href'); 
//	window.location.hash = href;
    var tab_title = jQuery(this).parents('ul.swe-tab-title');
    var tab_content = tab_title.siblings('ul.swe-tab-content');
	
    // tab title
    tab_title.find('a.active').removeClass('active');
	
    jQuery(this).addClass('active');
	
    // tab content
    //tab_content.children('li.active').removeClass('active').css('display', 'none');
	tab_content.children('li.active').removeClass('active');
//    tab_content.children('li[data-tab="' + data_tab + '"]').fadeIn().addClass('active');
    $(href).fadeIn().addClass('active');

    //e.preventDefault();
});


// Toggle Box
var swe_toggle_box = jQuery('ul.swe-toggle-box');
swe_toggle_box.children('li').not('.active').addClass('active');
/*swe_toggle_box.children('li').not('.active').each(function(){
    jQuery(this).children('.toggle-box-content').css('display', 'none');
});*/
swe_toggle_box.children('li').children('.toggle-box-title').click(function(){
    var cur_toggle = jQuery(this).parent();
    if( cur_toggle.hasClass('active') ){
        cur_toggle.removeClass('active').children('.toggle-box-content').slideUp();
    }else{
        cur_toggle.addClass('active').children('.toggle-box-content').slideDown();
    }
});	

/*
  # Begin - Chien
 -----------------------------------------------------------------------------*/
$(document).ready(function(){

   $('#rad-ja input:radio[name="radio-224"]').attr('checked', true);
   $('input:text[name="text-422"]').attr("disabled", "disabled");
   $('select[name="menu-248"]').removeAttr("disabled");
   
   $('input:radio[name="radio-224"]').change(function(){
       //console.log($(this).val(),$(this).parents('#rad-ja').length,$(this).parents('#rad-foreign').length);
       if($(this).parents('#rad-ja').length === 1){
           $('select[name="menu-248"]').removeAttr("disabled");
           $('input:text[name="text-422"]').attr("disabled", "disabled");
       }else{
           $('input:text[name="text-422"]').removeAttr("disabled");
           $('select[name="menu-248"]').attr("disabled", "disabled");
       }
   });
   
   $('#menu-item-125').click(function(objselectstr){
			var offset = $('.tn-main-footer').offset();
			offset.top -= 40;
//			console.log('offset.top',offset.top);
			$('html, body').animate({
				scrollTop: offset.top
			});
			return false;
		});
                
                
    $(".menu-top-kimono .container .main-navigation ul li:last-child").addClass("last");
    
    /*==============================================================
     * Begin - Disable zoom maps
     ===============================================================*/
    // Disable scroll zooming and bind back the click event
    var onMapMouseleaveHandler = function (event) {
      var that = $(this);

      that.on('click', onMapClickHandler);
      that.off('mouseleave', onMapMouseleaveHandler);
      that.find('iframe').css("pointer-events", "none");
    }

    var onMapClickHandler = function (event) {
      var that = $(this);

      // Disable the click handler until the user leaves the map area
      that.off('click', onMapClickHandler);

      // Enable scrolling zoom
      that.find('iframe').css("pointer-events", "auto");

      // Handle the mouse leave event
      that.on('mouseleave', onMapMouseleaveHandler);
    }

    // Enable map zooming with mouse scroll when the user clicks the map
    $('.maps.embed-container').on('click', onMapClickHandler);
    /*==============================================================
     * End - Disable zoom maps
     ===============================================================*/
    
    /*==============================================================
     * Begin - Smartphone
     ===============================================================*/

        //.item-blog-top
        if (window.innerWidth < 767) {
           $('.item-blog-top p.title span.newtitle-top').each(function(){
               parent = $(this).closest('.text');
               parent.find('p.title span.newtitle-top').appendTo(parent.find('p.first-title'));
               $(this).addClass('moved');
           });
       }else{
           $('.item-blog-top p.first-title span.newtitle-top').each(function(){
               parent = $(this).closest('.text');
               parent.find('p.first-title span.newtitle-top').prependTo(parent.find('p.title'));
           });
       }

		//.menu-top-kimono-sp scroll
		$(window).bind('scroll', catchScroll);

		// lang SF menu click
		$('ul.menu-lang-right .li-item-mn').click(function(){
			$('ul.menu-lang-right ul.qtranxs_language_chooser').toggle(flip++ % 2 === 0);
			if (flip % 2 !== 0 && myTimes)
				clearTimeout(myTimes);
			else
				showMenuTop3second();
			//$('ul.menu-lang-right ul.qtranxs_language_chooser').show();
		});
		
		//breadcrumd
		var tt=2; 
		$('#breadcrumbs > span > span').each(function(){tt+=$(this).outerWidth();});
		$('#breadcrumbs').css('overflow-x','auto');
		$('#breadcrumbs > span ').css('width',tt);
		$('#breadcrumbs').scrollLeft(tt);

    /*==============================================================
     * End - Smartphone
     ===============================================================*/

});
/*
  # End - Chien
 -----------------------------------------------------------------------------*/
// Start Tona

$('.step-by-step-sp .tn-step-by-step-ico-sp li').each(function(){
	$(this).addClass('li-active');
	$(this).children('span').addClass('span-active');
	if($(this).hasClass('active')){
		return false;
	}
});

// End Tona


$(function(){
	if($('.formAplly1Day').length){
//		console.log('formAplly1Day');
		($('input[name="radio-course"]')).change(function(){
      //console.log(this);
			if($('input[name="radio-course"]').first().prop("checked")){
				$('input[name="radio-sex"]').prop('disabled',true);
				$('input[name="radio-sex"]').first().prop('checked',true).prop('disabled',false);
			}else{
				$('input[name="radio-sex"]').prop('disabled',false).prop('checked',false);			
			}	
		});		
	}
});

//menu-top-sp
function catchScroll(){

	if (flip %2 === 1) {
		$('ul.menu-lang-right ul.qtranxs_language_chooser').css('display','none');
		flip = 0;
	}
	console.log('scroll 2');
	if($(window).scrollTop() > 65){

		// hide lang menu when scroll
		showMenuTop3second();
		if (!$('.menu-top-kimono-sp').hasClass('fixed'))
			$('.menu-top-kimono-sp').addClass('fixed');

	}else{
		$('.menu-top-kimono-sp').removeClass('fixed');
	}
};

var flip = 0;
var myTimes;
function showMenuTop3second(){
	if (myTimes) clearTimeout(myTimes);
	// Show menu then setup timeout to hide
	if ($('.menu-top-kimono-sp').css('top')=== '-50px'){
		$('.menu-top-kimono-sp').css('top', 0);
		//$('ul.menu-lang-right ul.qtranxs_language_chooser').css('display','none');
	}
	// timeout 2s
	myTimes = setTimeout(function(){
		$('.menu-top-kimono-sp').css('top', -50);
		//$('ul.menu-lang-right ul.qtranxs_language_chooser').css('display','none');
		//flip = 0;
		//console.log('hide!');
	}, 2000);
}
