// JavaScript Document
var SiteMain = (function() {

	var setting = {
	   font: 10,
	   w: 1170,
   }

	function init(){
		signUpEvent();
		carousel_3d();
		respone();
		if($('body').hasClass('home')) {
			$('.welcomeBox').height($(window).height()- $('header nav').height())
			$(window).resize(function(e) {
			   respone();
			});
			if($('.welcomeBox').length > 0){
				$('body').addClass('overflowHidden')
				if($('.welcomeBox').height() > $('body')) {

				}
			}
			animateHome();
		} else {
			$('.welcomeBox').hide()
		}
		$(window).scroll(function(){
		       // $(".cd-quick-view")
		       //        .animate({"marginTop": ($(window).scrollTop() + 50) + "px"}, 0 );
		});
	}

	function animateHome(){
		$('a.arrowWelcome ').click(function(){
			$('.welcomeBox').animate({height:0},100, function(){
				$('.welcomeBox').css('margin-top',0)
				$('body').removeClass('overflowHidden')
			});

		});
	}

	function respone() {
		if($(window).width() < 1171) {
	        setting.font = ($(window).width() * 10) / setting.w;
	        if ($('html').hasClass('ie8'))
	            setting.font = Math.round(setting.font);
	        $('body, .welcomeBox').css('font-size', setting.font + 'px');
		}
    }

	var separation = 230;
	var sizeMultiplier = 0.9;
	var flankingItems = 3;
	if($(window).width() < 640) {
		separation = 140
		flankingItems = 2
	} else if($(window).width() > 992 && $(window).width() <=1024) {
		separation = 160
		flankingItems = 2
	}

	function signUpEvent(){
		$('.signupBox .btn-button').click(function(){
			$('#signUp').css({'visibility':'visible','display':'block'});
			return false;
		});
		$('.signup .overlaywhite').click(function(){
			$('#signUp').css({'visibility':'hidden','display':'none'});
		});
	}

	function openPopup(idDiv){
		$('.result_question').css('display','none')
		$(idDiv).css('margin-top',($(window).scrollTop() + 50) + "px");
		$(idDiv).css({'visibility':'visible','display':'block'});
	}
	function closePopup(idDiv){
		$(idDiv).css({'visibility':'hidden','display':'none'});
	}

	function carousel_3d() {
		$(window).resize(function(){
			var separation = 230;
			var sizeMultiplier = 0.9;
			var flankingItems = 3;
			if($(window).width() < 640) {
				separation = 140
				flankingItems = 2
			} else if($(window).width() > 992 && $(window).width() <=1024) {
				separation = 160
				flankingItems = 2
			}

		})
		var options = {
			flankingItems: flankingItems,
			separation: separation,
			sizeMultiplier: sizeMultiplier,
			opacityMultiplier: 1,
			preloadImages:true,
			activeClassName: 'active',
			clickedCenter: function($clickedItem) {
		      // $clickedItem is a jQuery wrapped object describing the image that was clicked.
			  var productID = $($clickedItem).attr('data-id');
			  openPopup('#viewProduct-'+ productID);
		    }
		}
		var carousel = $("#carousel1").waterwheelCarousel(options)

		$('.prev').bind('click', function () {
          carousel.prev();
          return false
        });

		$(window).resize(function(){
			carousel.reload(options)
		})

        $('.next').bind('click', function () {
          carousel.next();
          return false;
        });
	}

	return {
		init:init,
		openPopup:openPopup,
		closePopup:closePopup
	}

})();

$(document).ready( function() {
	SiteMain.init();
});

// Page Loader
$(window).load(function () {
    "use strict";
	$('#loader').fadeOut();
});
