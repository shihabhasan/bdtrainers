$( document ).keyup( function(e) {
	if( e.keyCode == 37 ) {
		$( '.image-nav .prev' ).click();
	} else if( e.keyCode == 39 ) {
		$( '.image-nav .next' ).click();
	}
});