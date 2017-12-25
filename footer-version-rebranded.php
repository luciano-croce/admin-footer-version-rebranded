<?php 
/*
Plugin Name:       Footer Version Rebranded
Plugin URI:        https://github.com/luciano-croce/footer-version-rebranded/
Description:       Show rebranded version in admin footer (dashboard backend) when is activated, or automatically, if it is in mu-plugins directory.
Version:           1.0.1
Requires at least: 3.0
Tested up to:      5.0
Requires PHP:      5.2.4
Author:            Luciano Croce
Author URI:        https://github.com/luciano-croce/
License:           GPLv2 or later (license.txt)
License URI:       https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:       footer-version-rebranded
Domain Path:       /languages
Network:           true
GitHub Plugin URI: https://github.com/luciano-croce/footer-version-rebranded/
GitHub Branch:     master
Requires WP:       3.0
 *
 * Copyright 2013-2017 Luciano Croce (email: luciano.croce@gmail.com)
 *
 * This program is free software; you can redistribute it and/or modify it under the terms of the GNU
 * General Public License version 2, as published by the Free Software Foundation. You may NOT assume
 * that you can use any other version of the GPL.
 *
 * This program is distributed in the hope that it will be useful, on an "AS IS", but WITHOUT ANY WARRANTY;
 * without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * This program is written with the intent of being helpful,
 * but you are responsible for its use or actions on your own website.
 *
 * Tips - A neat trick, is to put this single file footer-version-rebranded.php (not its parent directory)
 * in the /wp-content/mu-plugins/ directory (create it if not exists) so you won't even have to enable it,
 * and will be loaded by default, also, since first step installation of WordPress setup!
 *
 * The code of this plugin is not written with a php framework, but with a simple php editor, manually.
 */

	/**
	 * Footer Version Rebranded
	 *
	 * Show rebranded version in admin footer (dashboard backend)
	 *
	 * PHPDocumentor
	 *
	 * @package    WordPress\Plugin
	 * @subpackage Footer\Footer_Version_Rebranded
	 * @link       https://github.com/luciano-croce/footer-version-rebranded/
	 * @version    1.0.1 (Build 2017-12-25) Stable
	 * @since      1.0.0 (Build 2013-12-12) 1st Release
	 * @author     Luciano Croce <luciano.croce@gmail.com>
	 * @copyright  2013-2017 - Luciano Croce
	 * @license    https://www.gnu.org/licenses/gpl-2.0.html - GPLv2 or later
	 * @todo       Preemptive support for WordPress 5.0-alpha
	 */

/**
 * Prevent direct access to plugin files.
 *
 * For security reasons, exit without any notifications:
 * - without show the details of the system
 * - without warn the existence of this plugin
 * - show the generic header 403 forbidden error
 * - close the connection header
 *
 * @author  Luciano Croce <luciano.croce@gmail.com>
 * @version 1.0.1 (Build 2017-12-25)
 * @since   1.0.0 (Build 2013-12-12)
 */
if ( ! defined( 'ABSPATH' ) ) exit;
if ( ! defined(  'WPINC'  ) ) exit;

if ( ! function_exists( 'add_action' ) ) {
	header( 'HTTP/0.9 403 Forbidden' );
	header( 'HTTP/1.0 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	header( 'HTTP/1.2 403 Forbidden' );
	header( 'HTTP/1.3 403 Forbidden' );
	header( 'Status: 403 Forbidden'  );
	header( 'Connection: Close'      );
		exit;
}

add_filter( 'update_footer', 'core_update_footer_rebranded', 11 ); # By default core update_footer has level 10

/**
 * Expand, secure, enhance, core code, on /wp-admin/includes/update.php
 *
 * @author  Luciano Croce <luciano.croce@gmail.com>
 * @version 1.0.1 (Build 2017-12-25)
 * @since   WordPress 3.0+ (single and multisite)
 *
 * @param   string $msg
 * @return  string
 */
function core_update_footer_rebranded( $msg = '' ) {

	if ( ! current_user_can( 'update_core' ) ) {
//		return sprintf( __( 'You are using a', 'footer-version-rebranded' ) . ' ' . __( 'Version %s', 'footer-version-rebranded' ), get_bloginfo( 'version', 'display' ) ); # Original core code on /wp-admin/includes/update.php
		return sprintf( __( 'You do <u>not have access</u> to this information <strong>for security purpose</strong>.', 'footer-version-rebranded' ), get_bloginfo( 'version', 'display' ) ); # Sorry, only users can update core have access to this information.
	}

	$cur = get_preferred_from_update_core();
	if ( ! is_object( $cur ) ) {
		$cur = new stdClass;
	}

	if ( ! isset( $cur->current ) ) {
		$cur->current = '';
	}

	if ( ! isset( $cur->url ) ) {
		$cur->url = '';
	}

	if ( ! isset( $cur->response ) ) {
		$cur->response = '';
	}

	switch ( $cur->response ) {
		case 'development':
			/* Translators - 1: WordPress version number 2: WordPress updates admin screen URL */
//			return sprintf( __( 'You are using a development version (%1$s). Cool! Please <a href="%2$s">stay updated</a>.' ), get_bloginfo( 'version', 'display' ), network_admin_url( 'update-core.php' ) ); # Original core code on /wp-admin/includes/update.php
			return sprintf( __( 'You are using a <u>Development Version</u> %1$s', 'footer-version-rebranded' ) . ' - ' . __( '<strong><a href="%2$s">Stay Updated</a></strong>', 'footer-version-rebranded' ), get_bloginfo( 'version', 'display' ), network_admin_url( 'update-core.php' ) );

		case 'upgrade':
//			return '<strong><a href="' . network_admin_url( 'update-core.php' ) . '">' . sprintf( __( 'Get Version %s' ), $cur->current ) . '</a></strong>'; # Original core code on /wp-admin/includes/update.php
			return sprintf( __( 'You are using a <u>not up to date</u> Version %1$s', 'footer-version-rebranded' ), get_bloginfo( 'version', 'display' ), network_admin_url( 'update-core.php' ) ) . ' - ' . '<strong><a href="' . network_admin_url( 'update-core.php' ) . '">' . sprintf( __( 'Get Version %s', 'footer-version-rebranded' ), $cur->current ) . '</a></strong>';

		case 'latest':
		default:
//			return sprintf( __( 'Version %s' ), get_bloginfo( 'version', 'display' ) ); # Original core code on /wp-admin/includes/update.php
			return sprintf( __( 'You are using a <u>latest available</u>', 'footer-version-rebranded' ) . ' ' . __( 'Version %s', 'footer-version-rebranded' ), get_bloginfo( 'version', 'display' ) );
	}

}
