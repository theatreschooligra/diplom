// Slider
$(function(){
	$('.slider').slick({
		autoplay: true,
		spped: 1000,
		arrows: true,
		dots: true
	});
});

$(function(){
	$('.spectacles-slider').slick({
		autoplay: true,
		spped: 1200,
		arrows: true,
		dots: false,
		slidesToShow: 3,
		slidesToScroll: 1,
		responsive: [
			{
				breakpoint: 1199,
				settings: {
					slidesToShow: 3,
					slidesToScroll: 3,
				}
			},
			{
				breakpoint: 991,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 2,
				}
			},
			{
				breakpoint: 600,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1,
				}
				
			}
		]
	});
});


$(function(){
	$('.reviews-slider').slick({
		autoplay: true,
		spped: 1200,
		arrows: false,
		dots: true
	});
});





$(function(){
	$('.nav--btn').on('click', function(){
		var menu = document.querySelector('header .menu');
		if($(menu).is(':visible')){
			$(menu).slideUp();
			$(this).removeClass('open');
		}
		else{
			$(menu).slideDown();
			$(this).addClass('open');
		}
	});

});

$(function(){
	$('.phone--btn').on('click', function(){
		var phone = document.querySelector('header .phone');
		if($(phone).is(':visible')){
			$(phone).slideUp();
			$(this).removeClass('open');
		}
		else{
			$(phone).slideDown();
			$(this).addClass('open');
		}
	})
})