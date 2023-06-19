<?php
/**
 * Additional setup for the block patterns.
 *
 * @author  Marco Di Bella
 * @package mdb-kanzlei
 */

namespace mdb_kanzlei;


/** Prevent direct access */

defined( 'ABSPATH' ) or exit;



/**
 * Registers block patterns and categories.
 *
 * @since  1.0.0
 */

function register_block_patterns()
{
    /**
     * Filters the theme block pattern categories.
     */

    $block_pattern_categories = array(
        'featured' => array( 'label' => __( 'Featured', 'mdb-kanzlei' ) ),
        'footer'   => array( 'label' => __( 'Footers', 'mdb-kanzlei' ) ),
        'header'   => array( 'label' => __( 'Headers', 'mdb-kanzlei' ) ),
        'query'    => array( 'label' => __( 'Query', 'mdb-kanzlei' ) ),
        'pages'    => array( 'label' => __( 'Pages', 'mdb-kanzlei' ) ),
    );

    foreach( $block_pattern_categories as $name => $properties ) :
        if( ! WP_Block_Pattern_Categories_Registry::get_instance()->is_registered( $name ) ) :
            register_block_pattern_category(
                $name,
                $properties
            );
        endif;
    endforeach;


    /**
     * Filters the theme block patterns.
     */

    $block_patterns = array(
        // add here (STRING), (STRING), ....
    );

    foreach( $block_patterns as $block_pattern ) :
        $pattern_file = THEME_DIR . 'includes/patterns/' . $block_pattern . '.php';

        register_block_pattern(
            'mdb-kanzlei' . '/' . $block_pattern,
            require $pattern_file
        );
    endforeach;
}

add_action( 'init', 'mdb_kanzlei\register_block_patterns', 9 );
