jQuery( document ).ready( function( $ ) {

    // Helper

    function getNumber( x ) {
      const parsed = parseInt( x );

      if( isNaN( parsed ) ) {
          return 0;
      }
      return parsed;
    }


    // General scrollToAnchor

    function scrollToID( id ) {
        let tag    = $( "#"+ id );
        let offset = tag.offset().top - getNumber( tag.css( 'padding-top' ) )

        $( '#main' ).animate( { scrollTop: offset }, 2500, 'easeInOutExpo' );
    }

} );
