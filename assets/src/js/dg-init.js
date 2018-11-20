var slideout = new Slideout({
	'panel': document.getElementById('panel'),
	'menu': document.getElementById('menu-mobile'),
	'padding': 256,
	'tolerance': 70
});

document.querySelector('.m-toggle').addEventListener('click', function() {
	slideout.toggle();
});

var fixed = document.querySelector('.site-header');

slideout.on('translate', function(translated) {
  fixed.style.transform = 'translateX(' + translated + 'px)';
});

slideout.on('beforeopen', function () {
  fixed.style.transition = 'transform 300ms ease';
  fixed.style.transform = 'translateX(256px)';
});

slideout.on('beforeclose', function () {
  fixed.style.transition = 'transform 300ms ease';
  fixed.style.transform = 'translateX(0px)';
});

slideout.on('open', function () {
  fixed.style.transition = '';
});

slideout.on('close', function () {
  fixed.style.transition = '';
});

var heroBanner = new Swiper('.hbs-slider-container',{
	spaceBetween: 20,
	autoplay: {
		delay: 2500,
		disableOnInteraction: false,
	},
	loop: true,
	pagination: {
	  	el: '.hbs-pagination',
	  	clickable: true,
	  	bulletClass: 'hbs-pagination-bullet',
	  	bulletActiveClass: 'hbs-pagination-bullet-active'
	},
	effect: 'fade',
	containerModifierClass: 'hbs-slider-container',
	wrapperClass: 'hbs-wrapper',
	slidePrevClass: 'hbs-slide-prev',
	slideNextClass: 'hbs-slide-next',
	slideClass : 'hbs-slide',
});

var services = new Swiper('.serv-slider', {
	
  	breakpoints:{
	    480: {
	      slidesPerView: 1,
	      spaceBetween: 20
	    },
	    // when window width is <= 640px
	    768: {
	      slidesPerView: 2,
	      spaceBetween: 20
	    },
	    992: {
	    	slidesPerView: 3,
	    	spaceBetween: 30,
	    },
	    9000: {
	    	slidesPerView: 3,
	    	spaceBetween: 30,
	    }
  	},
	centeredSlides: false,
	autoplay: {
		delay: 8000,
		disableOnInteraction: false,
	},
	pagination: {
	  	el: '.serv-pagination',
	  	clickable: true,
	},
	navigation: {
		nextEl: '.serv-button-next',
		prevEl: '.serv-button-prev',
	},
	containerModifierClass: 'serv-slider',
	wrapperClass: 'serv-wrapper',
	slidePrevClass: 'serv-slide-prev',
	slideNextClass: 'serv-slide-next',
	slideClass : 'serv-slide',
});

var testimonials = new Swiper('.testi-slider', {
  	spaceBetween: 20,
  	autoplay: {
  		delay: 8000,
  		disableOnInteraction: false,
  	},
  	pagination: {
  	  	el: '.testi-pagination',
  	  	clickable: true,
  	  	bulletClass: 'testi-pagination-bullet',
  	  	bulletActiveClass: 'testi-pagination-bullet-active'
  	},
  	navigation: {
  		nextEl: '.testi-button-next',
  		prevEl: '.testi-button-prev',
  	},
  	effect: 'fade',
  	containerModifierClass: 'testi-slider',
  	wrapperClass: 'testi-wrapper',
  	slidePrevClass: 'test-slide-prev',
  	slideNextClass: 'test-slide-next',
  	slideClass : 'testi-slide',
});

testimonials.navigation.nextEl.addEventListener('click', function(event){
	console.log('next',event);
	testimonials.slideNext(300, true);	
});


testimonials.navigation.prevEl.addEventListener('click', function(event){
	console.log('prev',event);
	testimonials.slidePrev(300, true);	
});

(function($){
  $('.appleshack-slider').slick({
    slidesToShow: 3,
	slidesToScroll: 1,
	arrows: true,
	dots: true,
	autoplay: true,
	  responsive: [
		{
		  breakpoint: 992,
		  settings: {
			slidesToShow: 2,
		  }
		},
		 {
		  breakpoint: 768,
		  settings: {
			slidesToShow: 1,
		  }
		}, 
		{
		  breakpoint: 641,
		  settings: {
			arrows: false,
			slidesToShow: 1,
			  dots: true,
		  }
		}, 
		
	  ]
  });
})(jQuery);