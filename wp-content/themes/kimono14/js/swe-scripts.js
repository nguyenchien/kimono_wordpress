/*
  # Begin - Chien
 -----------------------------------------------------------------------------*/

$("img").error(function () {
	$(this).hide();
});

jQuery(document).ready(function($){

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
    $('.map.shop').on('click', onMapClickHandler);
    /*==============================================================
     * End - Disable zoom maps
     ===============================================================*/
    
    /*==============================================================
     * Begin - Smartphone
     ===============================================================*/
    
        //.item-blog-top
		/*
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
		*/
       
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
		

		//breadcrumd scroll
		if (typeof breadcrumbs!=='undefined'){
			var bWidth = 22; 
			$('#breadcrumbs > span > span').each(function(){ bWidth+=$(this).outerWidth();});
			$('#breadcrumbs').css('overflow-x','auto');
			$('#breadcrumbs > span ').css('width', bWidth);
			$('#breadcrumbs').scrollLeft(bWidth);
		}


    /*==============================================================
     * End - Smartphone
     ===============================================================*/
    
});
/*
  # End - Chien
 -----------------------------------------------------------------------------*/
// Start Tona

jQuery('.step-by-step-sp .tn-step-by-step-ico-sp li').each(function(){
	$(this).addClass('li-active');
	$(this).children('span').addClass('span-active');
	if($(this).hasClass('active')){
		return false;
	}
});

// End Tona


jQuery(function($){
	if($('.formAplly1Day').length){
		//console.log('formAplly1Day');
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
	//console.log('scroll 2');
	var heightMasthead = $('#masthead').height();
	//console.log(heightMasthead);//65
	if($(window).scrollTop() > heightMasthead){
		
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
	var menuTop = $('.menu-top-kimono-sp');
	var topVal = parseInt(menuTop.css('top'), 10);
	if (topVal < 0){
		menuTop.css('top', 0);
	}
	// timeout 2s
	// myTimes = setTimeout(function(){
	// 	menuTop.css('top', -50);
	// 	//console.log('hide!');
	// }, 2000);
}
/* Thanks to CSS Tricks for pointing out this bit of jQuery
 http://css-tricks.com/equal-height-blocks-in-rows/
 It's been modified into a function called at page load and then each time the page is resized. One large modification was to remove the set height before each new calculation. */

equalheight = function(container){

	var currentTallest = 0,
		currentRowStart = 0,
		rowDivs = new Array(),
		$el,
		topPosition = 0;
	$(container).each(function() {

		$el = $(this);
		$($el).height('auto')
		topPostion = $el.position().top;

		if (currentRowStart != topPostion) {
			for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
				rowDivs[currentDiv].height(currentTallest);
			}
			rowDivs.length = 0; // empty the array
			currentRowStart = topPostion;
			currentTallest = $el.height();
			rowDivs.push($el);
		} else {
			rowDivs.push($el);
			currentTallest = (currentTallest < $el.height()) ? ($el.height()) : (currentTallest);
		}
		for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
			rowDivs[currentDiv].height(currentTallest);
		}
	});
}
