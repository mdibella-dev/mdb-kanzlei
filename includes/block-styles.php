<?php
/**
 * Additional setup for the block styles.
 *
 * @author  Marco Di Bella
 * @package mdb-kanzlei
 */

namespace ph_THEME_NAMESPACE;


/** Prevent direct access */

defined( 'ABSPATH' ) or exit;



/**
 * Script and style modifications for the block editor.
 *
 * @since 1.0.0
 */

function register_block_styles()
{
    wp_enqueue_script(
        'ph_THEME-PREFIX-block-styles',
        THEME_URI . 'assets/src/js/block-styles.js',    // maybe add a 'build' version?
        array(
            'wp-blocks',
            'wp-dom-ready',
            'wp-edit-post'
        ),
        THEME_VERSION
    );
}

add_action( 'enqueue_block_editor_assets', 'ph_THEME_NAMESPACE\register_block_styles' );
