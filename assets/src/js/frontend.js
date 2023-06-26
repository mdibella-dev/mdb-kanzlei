jQuery( document ).ready( function( $ ) {

    function scrollToAnchor(selector){
        let destination = $("a[name='"+ selector +"']");

        $('#main').animate({
          scrollTop: destination.offset().top
        }, 2500, 'easeInOutExpo');
    }


    $( '.wp-block-navigation a.wp-block-navigation-item__content' ).on( 'click', function(e) {
        let full_url = this.href;
        let parts    = full_url.split( '#' );

        if( parts.length == 2 ) {
            e.preventDefault();
            scrollToAnchor( parts[1] );
        }
    } );


    $(window).on("load", function() {
        let anchor = window.location.hash.replace('#', '');
        scrollToAnchor(anchor);
    });

});
