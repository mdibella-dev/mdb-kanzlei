<?php
/**
 * Main functions for setting up the theme.
 *
 * @author  Marco Di Bella
 * @package mdb-kanzlei
 */

namespace mdb_kanzlei;


/** Prevent direct access */

defined( 'ABSPATH' ) or exit;



/**
 * Performs basic settings for the theme.
 *
 * @since  1.0.0
 */

function theme_setup() {
    // Enables internationalization.
    load_theme_textdomain( 'mdb-kanzlei', THEME_DIR . 'languages' );


    // Adds 'wide' support for the block editor (Gutenberg).
    add_theme_support( 'align-wide' );


    // Enables responsive embedding of media embeds.
    add_theme_support( 'responsive-embeds' );


    // Adds editor styles.
    add_theme_support( 'editor-styles' );
    add_editor_style( 'assets/build/css/style-editor.min.css' );        // change path/name if necessary
}

add_action( 'after_setup_theme', __NAMESPACE__ . '\theme_setup' );



/**
 * Loads a set of necessary JS scripts and stylesheets.
 *
 * @since  1.0.0
 */

function theme_scripts() {
    /**
    * Registers and loads vendor styles and scripts.
    */

    wp_register_script(
        'jquery-easing',
        THEME_URI . 'assets/build/js/jquery.easing.min.js',
        [
            'jquery'
        ],
        false,
        true
    );
    wp_enqueue_script( 'jquery-easing' );


    /**
     * Registers and loads the theme's own styles and scripts.
     *
     * Note: The style.css in the main directory is only used for theme identification and versioning.
     * Actually the (compressed) style information can be found in frontend(.min).css.
     */

    wp_enqueue_style(
        'mdb-kanzlei-frontend-style',
        THEME_URI . 'assets/build/css/style-frontend.min.css',  // change path/name if necessary
        [],
        THEME_VERSION
    );

    wp_enqueue_script(
        'mdb-kanzlei-frontend-script',
        THEME_URI . 'assets/build/js/frontend.min.js',          // change path/name if necessary
        [
            'jquery'
        ],
        THEME_VERSION,
        true
    );
}

add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\theme_scripts', 9999 );
