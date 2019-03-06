<?php
/**
 * Remove Menu Items
 *
 * @package  danforthart
 * @subpackage danforthart/inc
 * @author   Chip Sheppard
 * @since    1.0.0
 * @license  GPL-2.0+
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Remove ACF.
 */
add_filter( 'acf/settings/show_admin', '__return_false' );

/**
 * Remove CPTUI.
 */
function wpse_28782_remove_menus() {
	remove_menu_page( 'cptui_main_menu' );
}
add_action( 'admin_init', 'wpse_28782_remove_menus' );
