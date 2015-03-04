( function( $ ) {

	$( function() {
		
		var $container = $('#container-masonry');
		// initialize
		$container.masonry({
			isFitWidth: true,
			itemSelector: '.item'
		});

	});
	
} )( jQuery );