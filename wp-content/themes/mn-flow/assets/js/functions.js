( function( $ ) {

	//placeholder crossbrowser
	$( function() {
		$('form input[placeholder], form textarea[placeholder]').each(function(){
			var ph = $(this).attr('placeholder');

			$(this).val(ph).focus(function(){
				if($(this).val() == ph) $(this).val('');
			}).blur(function(){
				if(!$(this).val()) $(this).val(ph);
			});
		});
	});

	//fitvids
	$( function() {
		$('.format-video').fitVids();
	});

	//dropdown menu
	$( function() {
		$('nav li').hover(
			function () {
				$('ul:first', this).stop().slideDown(100);
				$(this).addClass('active');
			},
			function () {
				$('ul:first', this).stop().slideUp(100);
				$(this).removeClass('active');
			}
		);
	});

} )( jQuery );