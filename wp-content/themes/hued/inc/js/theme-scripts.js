// navigation
$( document ).ready( navLayout );
$( window ).on( "load", navLayout );
$( window ).resize( navLayout );
$( document ).ready( function() {
	var nav = responsiveNav(".nav-collapse");
});
function navLayout() {
	var nodes = $( "#nav-more-list>li" ).length - 1;
	var i;

	// reset: append all li to primary-nav
	for( i = 0; i <= nodes; i++ ) {
		$( "#primary-nav" ).append( $( "#nav-more-list>li>a" ).eq( 0 ).parent() );
	}
	var winWidth = Math.max( $(window).width(), window.innerWidth);
	if ( winWidth <= 600 ) {
		return 0;
	}

	nodes = $( "#primary-nav>li:not(#nav-more-title)" ).length - 1;
	var navWidth = $( "#nav-more-title" ).outerWidth(true);
	var stickyBarWidth = $( "#sticky-bar" ).width() - $( "#logo" ).outerWidth(true) - $( "#site-social-wrap>.social-btn" ).outerWidth(true);
	// find overflow element index
	for( i = 0; i <= nodes; i++ ) {
		if( navWidth >= stickyBarWidth ) {
			break;
		}
		navWidth += $( "#primary-nav>li>a" ).eq(i).parent().outerWidth(true);
	}
	i--;

	var moreList = $( "#nav-more-list" );
	// append overflow elements to nav-more-list
	while( nodes >= i ) {
		moreList.append( $( "#primary-nav>li>a" ).eq( i ).parent() );
		nodes--;
	}

	// adjust height and position of nav-more-list
	moreList.css( { "left":"auto", "height":"auto" } );
	$( "#primary-nav" ).append( $( "#nav-more-title" ) );
	var lf = moreList.outerWidth() - $( "#nav-more-title" ).outerWidth(true);
	moreList.css( "left","-" + lf + "px" );
	if( moreList.height() > $( window ).height() ) {
		moreList.height( $( window ).height() - 100 );
	}
}