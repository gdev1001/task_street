jQuery.noConflict();

var shokesScriptObj = {};

jQuery(function($){
	
	//js for slick company-research
	$('.trusted-logo').slick({
		slidesToShow: 6,
		slidesToScroll: 3,
		autoplay: true,
		autoplaySpeed: 2000,
		arrows: false,
		dots: true,
		responsive: [
		{
		  breakpoint: 991,
		  settings: {
			  slidesToShow: 4,
			  slidesToScroll: 3,
			  autoplay: true,
			  autoplaySpeed: 2000,
			  arrows: false,
			  dots: true
		  }
		},
		{
		  breakpoint: 640,
		  settings: {
			  slidesToShow: 2,
			  slidesToScroll: 2,
			  autoplay: true,
			  autoplaySpeed: 2500,
			  arrows: false,
			  dots: true,
		  }
		}
		]
	});
	
	
	//Click menu scroll to section 
	$('.scrollToContent').click(function(){
		var scrollToContent = $(this).data('scrollto');
		if (scrollToContent !== 'undefined' && scrollToContent != '' && $(scrollToContent).length) {
			$('html, body').animate({
				'scrollTop' : $(scrollToContent).offset().top
			}, 1000);
		}
		return false;
	});
	
	
	
	shokesScriptObj.horizontalContentScroll($);
	
});


var myScroll;

jQuery(window).load(function(e) {
    shokesScriptObj.horizontalContentScroll(jQuery);
});


shokesScriptObj.horizontalContentScroll = function($) {
	if ($(window).width() > 767) {
		if ($('.horizontal-content-wrap').length) {
			var _hMaxheight = 0, _hTotalWidth = 0;
			$('.horizontal-content-wrap').children().each(function(index, element) {
				_hTotalWidth += ($(this).width() + 15);
				_hMaxheight = $(this).height() > _hMaxheight ? $(this).height() : _hMaxheight;
			});	
			
			$('.horizontal-content-wrap-scroll').css({'min-height' : (_hMaxheight) + 'px'});
			$('.horizontal-content-wrap').css({'min-height' : (_hMaxheight) + 'px', 'width' : _hTotalWidth + 'px'});
			$('.horizontal-content-wrap').children().css({'min-height' : _hMaxheight + 'px', 'width' : $('.horizontal-content-wrap-noscroll').width() + 'px'});
			var current_page = 1; 
			var old_page = 0; 
			myScroll = new IScroll('.horizontal-content-wrap-scroll', {ignoreBoundaries: false, eventPassthrough: true, preventDefault: false ,scrollX: true, scrollY: true, mouseWheel: true});
			myScroll.on('scrollEnd', function(e)
			{
				if (this.x==0 && jQuery(".isscroll_dis_wrap").attr('drct')=='up')
				{
					$(".isscroll_dis_wrap").fadeIn();
				}
				else if(this.x > 0 && this.x < this.maxScrollX)
				{
					$(".isscroll_dis_wrap").fadeOut();
				}
				else if(this.x == this.maxScrollX)
				{
					$(".isscroll_dis_wrap").fadeIn();
				}
				else
				{
					//$(".isscroll_dis_wrap").fadeOut();
				}
			});
		}
	}
};
if(jQuery('.horizontal-content-wrap-scroll').length)
{
window.addEventListener('wheel', function(e) {
	//alert(myScroll.x);
if (e.deltaY < 0) 
{
	jQuery(".isscroll_dis_wrap").fadeOut();
	jQuery(".isscroll_dis_wrap").attr('drct','up');
}
if (e.deltaY > 0) 
{
	jQuery(".isscroll_dis_wrap").attr('drct','down');
}
if (myScroll.x==0 && jQuery(".isscroll_dis_wrap").attr('drct')=='up')
{
	jQuery(".isscroll_dis_wrap").show();
}
else if(myScroll.x > 0 && myScroll.x < this.maxScrollX)
{
	jQuery(".isscroll_dis_wrap").hide();
}
else if(myScroll.x == myScroll.maxScrollX)
{
	jQuery(".isscroll_dis_wrap").show();
}
else
{
	//$(".isscroll_dis_wrap").fadeOut();
}
});
}


/*shokesScriptObj.horizontalContentScroll = function($) {
	if ($('.horizontal-content-wrap').length) {
		var _hMaxheight = 0, _hTotalWidth = 0;
		$('.horizontal-content-wrap').children().each(function(index, element) {
            _hTotalWidth += ($(this).width() + 15);
			_hMaxheight = $(this).height() > _hMaxheight ? $(this).height() : _hMaxheight;
        });	
		
		//$('.horizontal-content-wrap-noscroll').css({'height' : _hMaxheight + 'px'});
		//$('.horizontal-content-wrap-scroll').css({'height' : (_hMaxheight + 15) + 'px'});
		//$('.horizontal-content-wrap').css({'height' : (_hMaxheight + 15) + 'px', 'width' : _hTotalWidth + 'px'});
		//$('.horizontal-content-wrap').children().css({'height' : _hMaxheight + 'px', 'width' : $('.horizontal-content-wrap-noscroll').width() + 'px'});
		
		//$('.horizontal-content-wrap-noscroll').css({'height' : _hMaxheight + 'px'});
		$('.horizontal-content-wrap-scroll').css({'height' : (_hMaxheight) + 'px'});
		$('.horizontal-content-wrap').css({'height' : (_hMaxheight) + 'px', 'width' : _hTotalWidth + 'px'});
		$('.horizontal-content-wrap').children().css({'height' : _hMaxheight + 'px', 'width' : $('.horizontal-content-wrap-noscroll').width() + 'px'});
		
		myScroll = new IScroll('.horizontal-content-wrap-scroll', { scrollX: true, scrollY: false, mouseWheel: true });
		
	}
};*/
