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
/*
function block_editor_settings_all( $editor_settings )
{
    $editor_settings['styles'][] = array(
        'css' => '.edit-post-visual-editor__post-title-wrapper { display: none; } '
                 . '.block-editor-block-list__block.wp-block[data-type="wpmapblock/wp-map-block"] {height: 0;} '
                 . '.editor-styles-wrapper { padding-bottom: 0 !important; } '
    );

    return $editor_settings;
}

add_filter( 'block_editor_settings_all', __NAMESPACE__ .'\block_editor_settings_all' );
*/





function enqueue_block_editor_assets()
{
    $styles = '
        .block-editor .edit-post-visual-editor__post-title-wrapper {
            display: none;
        }

        .block-editor .editor-styles-wrapper {
            padding-bottom: 0 !important;
        }
    ';

    wp_add_inline_style( 'block-editor-styles',  $styles );
}

add_action( 'enqueue_block_editor_assets', __NAMESPACE__ . '\enqueue_block_editor_assets' );
