$( document ).ready( function () {
	$('#skill_list').select2({
        placeholder:'Select skill set',
        tags:true
    });

	$("#bell").click(function() {
		if($(".new-message").css('display') == 'none'){
			$(".new-message").show();
		}
		else if ($(".new-message").css('display') == 'block'){
			$(".new-message").hide();
		}
	});

	$(".owl-carousel").owlCarousel({
		items:1,
		autoplay: true,
		autoplayTimeout: 6000,
		loop: true
	});

	$('nav a').click(function(){

    var idscroll = $(this).attr('href');
    $.scrollTo(idscroll, 1000, { offset: {top: -105} });
    return false;

   });


	$(".new-message-close").click(function() {
		$(this).parents(".new-message-item").hide();
	});
	
	var firstItemAnimate = $('.how-it-works-first-section-text'),
			firstAnimate = firstItemAnimate.offset().top,
			secondItemAnimate = $('.how-it-works-second-section-text'),
			secondAnimate = secondItemAnimate.offset().top,
			thirdItemAnimate = $('.how-it-works-third-section-text'),
			thirdAnimate = thirdItemAnimate.offset().top;


	var windowHeight = $(window).height(),
			firstElementHeight = firstItemAnimate.height(),
			secondElementHeight = secondItemAnimate.height(),
			thirdElementHeight = thirdItemAnimate.height(),
			firstMargin = (windowHeight - firstElementHeight),
			secondMargin = (windowHeight - secondElementHeight),
			thirdMargin = (windowHeight - thirdElementHeight);




	$('.done-section-content').hide();
	$('.done-section-content').delay(500).fadeIn(1500);
	firstItemAnimate.addClass('animate-opacity');
	secondItemAnimate.addClass('animate-opacity');
	thirdItemAnimate.addClass('animate-opacity');
	
	$(window).on('scroll', function animateSection() {

		var body = $(document),
				documentTop = body.scrollTop();

				console.log(documentTop);
				console.log(secondAnimate);

				if(documentTop >= firstAnimate - firstMargin && documentTop < secondAnimate - secondMargin  ){
					firstItemAnimate.removeClass('animate-opacity');
				}

				else if(documentTop >= secondAnimate - secondMargin && documentTop < thirdAnimate - thirdMargin){
					secondItemAnimate.removeClass('animate-opacity');
				}

				else if(documentTop >= secondAnimate - secondMargin){
					thirdItemAnimate.removeClass('animate-opacity');
				}
				
	});
	

});