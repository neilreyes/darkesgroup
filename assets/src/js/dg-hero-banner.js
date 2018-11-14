(function($){
	var $btn = $('.hb-col');


	function heroBannerTimeline(args){
		var tl = new TimelineMax();
		var _this = args;
		var targetID = _this.attr('data-img-sm');
		var targetEl = $('.hb-large[data-img-lg="'+targetID+'"]');

		console.log( 'targetID: ', targetID );
		console.log( 'targetEl: ', targetEl );

		tl
		.to($('.hb-col'),0.1,{opacity: 0, zIndex: 5})
		.to(targetEl, 0.5, { opacity: 1, zIndex: 10}, 0.5 );
	}

	$btn.on('click',function(event){
		event.preventDefault();
		var _this = $(this);

		console.log( _this );

		heroBannerTimeline(_this);
	});
})(jQuery);