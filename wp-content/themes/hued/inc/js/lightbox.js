$( document ).ready( function($) {
	$( "a[href*='.jpg'],a[href*='.jpeg'],a[href*='.png'],a[href*='.gif']" ).addClass( "hued-lightbox" );

	$( "a.hued-lightbox" ).click( function(e) {
		e.preventDefault();
		var image_src = $( this ).attr( "href" );
		if ( $( "#lightbox" ).length > 0 ) {
			$( "#lb-content" ).html( '<img src="' + image_src + '" />' );
			$( "#lightbox" ).show();
		} else {
			var lightbox = '<div id="lightbox"><div id="lb-content"><img src="' + image_src +'" /></div></div>';
			$( "body" ).append( lightbox );
		}
		$( "#lightbox" ).click(function() {
				$( "#lightbox" ).hide();
		});
	});
});
$( document ).keyup( function(e) {
	if ( e.keyCode == 27 ) {
		$( '#lightbox' ).click();
	}
});