<?php
/**
 * Settings and functions related to the block editor (aka Gutenberg).
 *
 * @author  Marco Di Bella
 * @package mdb-kanzlei
 */

namespace mdb_kanzlei;


/** Prevent direct access */

defined( 'ABSPATH' ) or exit;



/**
 * Removes the (additional) post-title-wrapper.
 *
 * @since 1.0.0
 *
 * @see https://generatepress.com/forums/topic/when-editing-in-gutenberg-remove-the-title-from-the-editing-interface/ (thx David)
 *
 * @param array $editor_settings The settings.
 *
 * @return array The modified settings.
 */

function block_editor_settings_all( $editor_settings ) {
    $styles = '
        .edit-post-visual-editor__post-title-wrapper {
            display: none;
        }
    ';

    $editor_settings['styles'][] = [
        'css' => $styles
    ];

    return $editor_settings;
}

add_filter( 'block_editor_settings_all', __NAMESPACE__ .'\block_editor_settings_all' );
