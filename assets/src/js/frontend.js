jQuery( document ).ready( function( $ ) {

    /**
     * Implemention of SmoothScroll
     *
     */


    /**
     * Helper function to determine the numerical value.
     *
     * @param string x The string which contains a number.
     *
     * @return int The parsed number.
     */

    function getNumber( x ) {
        const parsed = parseInt( x );

        if( isNaN( parsed ) ) {
          return 0;
        }
        return parsed;
    }


    /**
     * Scrolls to an anchor which is specified by hash + selector.
     *
     * @param string selector The name of the target.
     */

    function scrollToAnchor( selector ) {
        let destination = $('#' + selector);
        let current     = $( "#main").scrollTop();
        let offset      = destination.offset().top;


        // If we don't start from the top, correct the offset.
        if( 0 != current ) {
          offset += current;
        }


        // To ensure that the target object is actually displayed, we correct the offset
        // by subtracting the (vertical) margin, padding and the height of the target object.
        const tags = [ 'padding-top', 'padding-bottom', 'margin-top', 'margin-bottom', 'height' ];

        tags.forEach( function( tag ) {
            offset -= getNumber( destination.css( tag ) );
        } );


        // Engage the smooth scroll
        $( '#main' ).animate( { scrollTop: offset }, 2500, 'easeInOutExpo' );
    }


    /**
     *  The event handler to execute the smooth scroll.
     */

    $( '.wp-block-navigation a.wp-block-navigation-item__content' ).on( 'click', function(e) {

        // Check if the current page is the home page where our targets are located.
        // In case this is true, engage the smooth scroll.
        if( "/" == window.location.pathname ) {

            let full_url = this.href;
            let parts    = full_url.split( '#' );

            if( 2 == parts.length ) {
                let anchor = parts[1];

                e.preventDefault();
                scrollToAnchor( parts[1] );
            }
        }

        // Otherwise redirect to the home page (normal behaviour).
    } );

});
