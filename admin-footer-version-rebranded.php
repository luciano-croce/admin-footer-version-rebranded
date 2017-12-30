<?php 
/*
Plugin Name:       Admin Footer Version (rebranded)
Plugin URI:        https://github.com/luciano-croce/admin-footer-version-rebranded/
Description:       Show rebranded version in admin footer (dashboard backend) when is activated, or automatically, if it is in mu-plugins directory.
Version:           1.0.1
Requires at least: 2.7
Tested up to:      5.0
Requires PHP:      5.2.4
Author:            Luciano Croce
Author URI:        https://github.com/luciano-croce/
License:           GPLv2 or later (license.txt)
License URI:       https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:       admin-footer-version-rebranded
Domain Path:       /languages
Network:           true
GitHub Plugin URI: https://github.com/luciano-croce/admin-footer-version-rebranded/
GitHub Branch:     master
Requires WP:       2.7
 *
 * Plugin approved in the repository of the plugin directory on 2017-12-25
 *
 * Copyright 2013-2017 Luciano Croce (email: luciano.croce@gmail.com)
 *
 * According to the terms of the GNU General Public License, part of Copyright belongs to its own author,
 * and part belongs to other respective their authors, if exist.
 *
 * This program is free software; you can redistribute it and/or modify it under the terms of the GNU
 * General Public License version 2, as published by the Free Software Foundation. You may NOT assume
 * that you can use any other compatible version of the GPL, or version compatible with GPL.
 *
 * This program is distributed in the hope that it will be useful, on an "AS IS", but WITHOUT ANY WARRANTY;
 * without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * This program is written with the intent of being helpful,
 * but you are responsible for its use or actions on your own website.
 *
 * According to the terms of the Detailed Plugin Guidelines (wordpress.org) in particular:
 * - This developer(s) are responsible(s) for the contents and actions of this plugin.
 * - Stable version of this plugin is only available from the WordPress Plugin Directory page.
 * - Plugin version numbers is be incremented for each new release.
 * - Complete plugin was be available on GitHub before the time of submission.
 * - This plugin respect trademarks, copyrights, and project names.
 *
 * Tips - A neat trick, is to put this single file admin-footer-version-rebranded.php (not its parent directory)
 * in the /wp-content/mu-plugins/ directory (create it if not exists) so you won't even have to enable it,
 * and will be loaded by default, also, since first step installation of WordPress setup!
 *
 * The code of this plugin is not written with a php framework, but with a simple php editor, manually.
 */

	/**
	 * Admin Footer Version (rebranded)
	 *
	 * Show rebranded version in admin footer (dashboard backend)
	 *
	 * PHPDocumentor
	 *
	 * @package    WordPress\Plugin
	 * @subpackage Footer\Admin_Footer_Version_Rebranded
	 * @link       https://wordpress.org/plugins/admin-footer-version-rebranded/ - Plugin hosted on wordpress.org repository
	 * @version    1.0.1 (Build 2017-12-25) Stable
	 * @since      1.0.0 (Build 2013-12-12) 1st Release
	 * @author     Luciano Croce <luciano.croce@gmail.com>
	 * @copyright  2013-2017 - Luciano Croce
	 * @license    https://www.gnu.org/licenses/gpl-2.0.html - GPLv2 or later
	 * @todo       Preemptive support for WordPress 5.0-alpha - Adds compatibility with WP 2.1+ to 2.6+
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
	header( 'HTTP/2.0 403 Forbidden' );
	header( 'Status:  403 Forbidden' );
	header( 'Connection: Close'      );
		exit;
}

global $wp_version;
include( ABSPATH . WPINC . '/version.php' );
$version = str_replace( '-src', '', $wp_version );

/**
 * Make sure that run under PHP 5.2.4 or greater
 *
 * @author  Luciano Croce <luciano.croce@gmail.com>
 * @version 1.0.1 (Build 2017-12-25)
 * @since   1.0.0 (Build 2013-12-12)
 */
if ( version_compare( PHP_VERSION, '5.2.4', '<' ) ) {
// wp_die( __( 'This plugin requires PHP 5.2.4 or greater: Activation Stopped! Please note that a good choice is PHP 5.6+ ~ 7.0+ (previous stable branch) or PHP 7.1+ (current stable branch).', 'admin-footer-version-rebranded' ) );   # uncomment it if you prefer die notification

	add_action( 'admin_init', 'avcufr_psd_php_version_init', 0 );
	add_action( 'admin_notices', 'avcufr_ant_php_version_init' );
	add_action( 'network_admin_notices',  'avcufr_ant_php_version_init' );

	/**
	 * Plugin Self Deactivated when PHP version not meet minimum requirements requested
	 *
	 * @author  Luciano Croce <luciano.croce@gmail.com>
	 * @version 1.0.1 (Build 2017-12-25)
	 * @since   1.0.0 (Build 2013-12-12)
	 */
	function avcufr_psd_php_version_init() {
		deactivate_plugins( plugin_basename( __FILE__ ) );
	}

	/**
	 * Show Admin Notice when PHP version not meet minimum requirements requested
	 *
	 * @author  Luciano Croce <luciano.croce@gmail.com>
	 * @version 1.0.1 (Build 2017-12-25)
	 * @since   1.0.0 (Build 2013-12-12)
	 */
	function avcufr_ant_php_version_init() {
		?>
		<div class="notice notice-error is-dismissible error">
		<p>
		<?php _e( 'This plugin requires PHP 5.2.4 or greater: please note that a good choice is PHP 5.6+ ~ 7.1+ (previous stable branch) or PHP 7.2+ (current stable branch).', 'admin-footer-version-rebranded' );?>
		</p>
		</div>
		<div class="notice notice-warning is-dismissible updated">
		<p>
		<?php _e( 'Plugin Admin Footer Version (rebranded) <strong>not activated</strong>.', 'admin-footer-version-rebranded' );?>
		<script>window.jQuery && jQuery( function( $ ) { $( 'div#message.updated' ).remove(); } );</script>                                                                                                                   <!-- This script remove update message when plugin is auto deactivated -->
		</p>
		</div>
		<?php 
	}
}

/**
 * Make sure that run under WP 2.7+ or greater
 *
 * @author  Luciano Croce <luciano.croce@gmail.com>
 * @version 1.0.1 (Build 2017-12-25)
 * @since   1.0.0 (Build 2013-12-12)
 */
if ( version_compare( $version, '2.7', '<' ) ) {
// wp_die( __( 'This plugin requires WordPress 2.7+ or greater: Activation Stopped! Please note that the Admin Footer Version (rebranded) was introduced since WordPress 2.7+', 'admin-footer-version-rebranded' ) );                 # uncomment it if you prefer die notification

	add_action( 'admin_init', 'avcufr_psd_wp_version_init', 0 );
	add_action( 'admin_notices', 'avcufr_ant_wp_version_init' );
	add_action( 'network_admin_notices',  'avcufr_ant_wp_version_init' );

	/**
	 * Plugin Self Deactivated when PHP version not meet minimum requirements requested
	 *
	 * @author  Luciano Croce <luciano.croce@gmail.com>
	 * @version 1.0.1 (Build 2017-12-25)
	 * @since   1.0.0 (Build 2013-12-12)
	 */
	function avcufr_psd_wp_version_init() {
		deactivate_plugins( plugin_basename( __FILE__ ) );
	}

	/**
	 * Show Admin Notice when WP version not meet minimum requirements requested
	 *
	 * @author  Luciano Croce <luciano.croce@gmail.com>
	 * @version 1.0.1 (Build 2017-12-25)
	 * @since   1.0.0 (Build 2013-12-12)
	 */
	function avcufr_ant_wp_version_init() {
		?>
		<div class="notice notice-error is-dismissible error">
		<p>
		<?php _e( 'This plugin requires WordPress 2.7+ or greater: please note that the Admin Footer Version (rebranded) was introduced since WordPress 2.7+', 'admin-footer-version-rebranded' );?>
		</p>
		</div>
		<div class="notice notice-warning is-dismissible updated">
		<p>
		<?php _e( 'Plugin Admin Footer Version (rebranded) <strong>not activated</strong>.', 'admin-footer-version-rebranded' );?>
		<script>window.jQuery && jQuery( function( $ ) { $( 'div#message.updated' ).remove(); } );</script>                                                                                                                   <!-- This script remove update message when plugin is auto deactivated -->
		</p>
		</div>
		<?php 
	}
}
else {
	add_filter( 'plugins_loaded', 'avcufr_load_plugin_textdomain' );
	if ( version_compare( $version, '3.0', '>=' ) ) {
		add_filter( 'plugins_loaded', 'avcufr_load_muplugin_textdomain' );
	}
	add_filter( 'plugin_row_meta', 'avcufr_adds_row_meta_build', 10, 4 );                                                                                                                                                     # comment or uncomment to enable or disable this customization
	if ( version_compare( $version, '4.0', '<' ) ) {
		add_filter( 'plugin_row_meta', 'avcufr_adds_row_meta_details', 10, 2 );                                                                                                                                               # comment or uncomment to enable or disable this customization
	}
	if ( version_compare( $version, '4.0', '>=' ) ) {
		add_filter( 'plugin_row_meta', 'avcufr_adds_row_meta_links', 10, 2 );                                                                                                                                                 # comment or uncomment to enable or disable this customization
	}
	if ( version_compare( $version, '3.0', '>=' ) ) {
	add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'avcufr_adds_action_links', 10, 4 );                                                                                                                    # comment or uncomment to enable or disable this customization
	}
	if ( version_compare( $version, '3.0', '<' ) ) {
		if ( version_compare( $version, '2.9', '>=' ) ) {
			add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'avcufr_adds_action_links_shift', 10, 4 );                                                                                                      # comment or uncomment to enable or disable this customization
		}
	}
	if ( version_compare( $version, '2.9', '<' ) ) {
		if ( version_compare( $version, '2.8', '>=' ) ) {
			add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'avcufr_adds_action_links_shift', 10, 4 );                                                                                                      # comment or uncomment to enable or disable this customization
		}
	}
	if ( version_compare( $version, '2.8', '<' ) ) {
	add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'avcufr_adds_action_links_unshift', 10, 4 );                                                                                                            # comment or uncomment to enable or disable this customization
	}
	if ( version_compare( $version, '3.0', '>=' ) ) {
	add_filter( 'network_admin_plugin_action_links_' . plugin_basename( __FILE__ ), 'avcufr_adds_action_links', 10, 4 );                                                                                                      # comment or uncomment to enable or disable this customization
	}
	add_filter( 'update_footer', 'core_update_footer_rebranded', 11 ); # By default core update_footer has level 10

	/**
	 * Load Plugin Textdomain
	 *
	 * @author  Luciano Croce <luciano.croce@gmail.com>
	 * @version 1.0.1 (Build 2017-12-25)
	 * @since   1.0.0 (Build 2013-12-12)
	 */
	function avcufr_load_plugin_textdomain() {
		load_plugin_textdomain( 'admin-footer-version-rebranded', false, basename( dirname( __FILE__ ) ) . '/languages' );
	}

	/**
	 * Load MU-Plugin (dir) Textdomain
	 *
	 * @author  Luciano Croce <luciano.croce@gmail.com>
	 * @version 1.0.1 (Build 2017-12-25)
	 * @since   1.0.0 (Build 2013-12-12)
	 */
	function avcufr_load_muplugin_textdomain() {
		load_muplugin_textdomain( 'admin-footer-version-rebranded', basename( dirname( __FILE__ ) ) . '/languages' );
	}

	/**
	 * Adds Plugin Row Meta Build
	 *
	 * @author  Luciano Croce <luciano.croce@gmail.com>
	 * @version 1.0.1 (Build 2017-12-25)
	 * @since   1.0.0 (Build 2013-12-12)
	 */
	function avcufr_adds_row_meta_build( $plugin_meta, $plugin_file ) {
		if ( $plugin_file == plugin_basename( __FILE__ ) )
			{
				$plugin_meta[ 0 ] .= ' | ' . __( 'Build', 'admin-footer-version-rebranded' ) . ' ' . __( '2017-12-25', 'admin-footer-version-rebranded' );
			}
		return $plugin_meta;
	}

	/**
	 * Adds Plugin Row Meta Details
	 *
	 * @author  Luciano Croce <luciano.croce@gmail.com>
	 * @version 1.0.1 (Build 2017-12-25)
	 * @since   1.0.0 (Build 2013-12-12)
	 */
	function avcufr_adds_row_meta_details( $plugin_meta, $plugin_file ) {
		if ( $plugin_file == plugin_basename( __FILE__ ) )
			{
				$plugin_meta[] .= '<a class="thickbox" href="plugin-install.php?tab=plugin-information&amp;plugin=admin-footer-version-rebranded&amp;section=changelog&amp;TB_iframe=true">' . __( 'View details', 'admin-footer-version-rebranded' ) . '</a>';
			}
		return $plugin_meta;
	}

	/**
	 * Adds Plugin Row Meta Links
	 *
	 * @author  Luciano Croce <luciano.croce@gmail.com>
	 * @version 1.0.1 (Build 2017-12-25)
	 * @since   1.0.0 (Build 2013-12-12)
	 */
	function avcufr_adds_row_meta_links( $plugin_meta, $plugin_file ) {
		if ( $plugin_file == plugin_basename( __FILE__ ) )
			{
				$plugin_meta[] .= '<a href="https://github.com/luciano-croce/admin-footer-version-rebranded/">' . __( 'Visit plugin site', 'admin-footer-version-rebranded' ) . '</a>';
			}
		return $plugin_meta;
	}

	/**
	 * Adds Plugin Action Links
	 *
	 * @author  Luciano Croce <luciano.croce@gmail.com>
	 * @version 1.0.1 (Build 2017-12-25)
	 * @since   1.0.0 (Build 2013-12-12)
	 */
	function avcufr_adds_action_links( $plugin_meta, $plugin_file ) {
		if ( ! current_user_can( 'update_core' ) ) {
			$plugin_meta[] .= '<a href="index.php" style="color:#3db634">' . __( 'Dashboard', 'admin-footer-version-rebranded' ) . '</a>';
		}
		else {
			$plugin_meta[] .= '<a href="update-core.php" style="color:#ffa500">' . __( 'Updates', 'admin-footer-version-rebranded' ) . '</a>';
		}
		return $plugin_meta;
	}

	/**
	 * Adds Plugin Action Links Shift
	 *
	 * Insert after -> Deactivate | Edit -> Work only on WordPress 2.8+ and 2.9+
	 *
	 * @author  Luciano Croce <luciano.croce@gmail.com>
	 * @version 1.0.1 (Build 2017-12-25)
	 * @since   1.0.0 (Build 2013-12-12)
	 */
	function avcufr_adds_action_links_shift( $plugin_meta, $plugin_file ) {
		if ( ! current_user_can( 'administrator' ) ) {
			$plugin_meta[] .= '<a href="index.php" style="color:#3db634">' . __( 'Dashboard', 'admin-footer-version-rebranded' ) . '</a>';
		}
		else {
			$plugin_meta[] .= '<a href="update-core.php" style="color:#ffa500">' . __( 'Updates', 'admin-footer-version-rebranded' ) . '</a>';
		}
		return $plugin_meta;
	}

	/**
	 * Adds Plugin Action Links Unshift
	 *
	 * Insert before -> Deactivate | Edit -> Work only on WordPress 2.7+ or previous releases.
	 *
	 * @author  Luciano Croce <luciano.croce@gmail.com>
	 * @version 1.0.1 (Build 2017-12-25)
	 * @since   1.0.0 (Build 2013-12-12)
	 */
	function avcufr_adds_action_links_unshift( $links, $file ) {
		if ( $file == plugin_basename(__FILE__) ) {
			if ( ! current_user_can( 'administrator' ) ) {
				$avcufr_settings_link_unshift = '<a href="index.php" style="color:#3db634">' . __( 'Dashboard', 'admin-footer-version-rebranded' ) . '</a>';
				array_unshift( $links, $avcufr_settings_link_unshift );
				$plugin_meta[] = $avcufr_settings_link_unshift;
			}
			else {
				$avcufr_settings_link_unshift = '<a href="update-core.php" style="color:#ffa500">' . __( 'Updates', 'admin-footer-version-rebranded' ) . '</a>';
				array_unshift( $links, $avcufr_settings_link_unshift );
				$plugin_meta[] = $avcufr_settings_link_unshift;
			}
		}
			return $links;
	}

	/**
	 * Expand, secure, enhance, core code, on /wp-admin/includes/update.php
	 *
	 * Candidate for [features are being developed plugins first](https://make.wordpress.org/core/features-as-plugins/)?
	 *
	 * @author  Luciano Croce <luciano.croce@gmail.com>
	 * @version 1.0.1 (Build 2017-12-25)
	 * @since   WordPress 2.7+ ~ 2.8+ ~ 2.9+ (single) or WordPress 3.0+ ~ 5.0+ (single and multisite)
	 *
	 * @param   string $msg
	 * @return  string
	 */
	function core_update_footer_rebranded( $msg = '' ) {
		global $wp_version;
		include( ABSPATH . WPINC . '/version.php' );
		$version = str_replace( '-src', '', $wp_version );

		if ( version_compare( $version, '3.0', '<' ) ) {
			if ( ! current_user_can( 'administrator' ) ) {
//				case 'security':
//					return sprintf( __( 'Version %s' ), get_bloginfo( 'version', 'display' ) ); # Original core code on /wp-admin/includes/update.php
					return sprintf( __( 'You do <span title="This information has been disabled by the WordPress Administrator for security reasons."><font style="cursor:help"><u>not have access</u></font></span> to this information <strong>for security purpose</strong></span>.', 'admin-footer-version-rebranded' ), get_bloginfo( 'version', 'display' ) ); # Sorry, only users can update core have access to this information.
			}
		}

		if ( version_compare( $version, '3.0', '>=' ) ) {
			if ( ! current_user_can( 'update_core' ) ) {
//				case 'security':
//					return sprintf( __( 'Version %s' ), get_bloginfo( 'version', 'display' ) ); # Original core code on /wp-admin/includes/update.php
					return sprintf( __( 'You do <span title="This information has been disabled by the WordPress Administrator for security reasons."><font style="cursor:help"><u>not have access</u></font></span> to this information <strong>for security purpose</strong></span>.', 'admin-footer-version-rebranded' ), get_bloginfo( 'version', 'display' ) ); # Sorry, only users can update core have access to this information.
			}
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

		if ( version_compare( $version, '3.0', '<' ) ) {
			switch ( $cur->response ) {
				case 'development':
					/* Translators - 1: WordPress version number 2: WordPress updates admin screen URL */
//					return sprintf( __( 'You are using a development version (%1$s). Cool! Please <a href="%2$s">stay updated</a>.' ), get_bloginfo( 'version', 'display' ), network_admin_url( 'update-core.php' ) ); # Original core code on /wp-admin/includes/update.php
					return sprintf( __( 'You are using a <span title="You are using a development version %s of WordPress"><font style="cursor:help"; color="orange"><strong><u>Development Version</u></strong></font></span> %1$s', 'admin-footer-version-rebranded' ) . ' - ' . __( '<strong><a href="%2$s">Stay Updated</a></strong>', 'admin-footer-version-rebranded' ), get_bloginfo( 'version', 'display' ), admin_url( 'update-core.php' ) );

				case 'upgrade':
//					return '<strong><a href="' . network_admin_url( 'update-core.php' ) . '">' . sprintf( __( 'Get Version %s' ), $cur->current ) . '</a></strong>'; # Original core code on /wp-admin/includes/update.php
					return sprintf( __( 'You are using a <span title="An updated version %s of WordPress is available"><font style="cursor:help"; color="red"><strong><u>not up to date</u></strong></font></span> Version %1$s', 'admin-footer-version-rebranded' ), $cur->current, get_bloginfo( 'version', 'display' ), admin_url( 'update-core.php' ) ) . ' - ' . '<strong><a href="' . admin_url( 'update-core.php' ) . '">' . sprintf( __( 'Get Version %s', 'admin-footer-version-rebranded' ), $cur->current ) . '</a></strong>';

				case 'latest':
				default:
//					return sprintf( __( 'Version %s' ), get_bloginfo( 'version', 'display' ) ); # Original core code on /wp-admin/includes/update.php
					return sprintf( __( 'You are using a <span title="You have the latest version %1$s of WordPress"><font style="cursor:help"><strong><u>Latest Available</u><strong></font></span>', 'admin-footer-version-rebranded' ) . ' ' . __( 'Version %s', 'admin-footer-version-rebranded' ), get_bloginfo( 'version', 'display' ) );
			}
		}

		if ( version_compare( $version, '3.0', '>=' ) ) {
			switch ( $cur->response ) {
				case 'development':
					/* Translators - 1: WordPress version number 2: WordPress updates admin screen URL */
//					return sprintf( __( 'You are using a development version (%1$s). Cool! Please <a href="%2$s">stay updated</a>.' ), get_bloginfo( 'version', 'display' ), network_admin_url( 'update-core.php' ) ); # Original core code on /wp-admin/includes/update.php
					return sprintf( __( 'You are using a <span title="You are using a development version %s of WordPress"><font style="cursor:help"; color="orange"><strong><u>Development Version</u></strong></font></span> %1$s', 'admin-footer-version-rebranded' ) . ' - ' . __( '<strong><a href="%2$s">Stay Updated</a></strong>', 'admin-footer-version-rebranded' ), get_bloginfo( 'version', 'display' ), network_admin_url( 'update-core.php' ) );

				case 'upgrade':
//					return '<strong><a href="' . network_admin_url( 'update-core.php' ) . '">' . sprintf( __( 'Get Version %s' ), $cur->current ) . '</a></strong>'; # Original core code on /wp-admin/includes/update.php
					return sprintf( __( 'You are using a <span title="An updated version %s of WordPress is available"><font style="cursor:help"; color="red"><strong><u>not up to date</u></strong></font></span> Version %1$s', 'admin-footer-version-rebranded' ), $cur->current, get_bloginfo( 'version', 'display' ), network_admin_url( 'update-core.php' ) ) . ' - ' . '<strong><a href="' . network_admin_url( 'update-core.php' ) . '">' . sprintf( __( 'Get Version %s', 'admin-footer-version-rebranded' ), $cur->current ) . '</a></strong>';

				case 'latest':
				default:
//					return sprintf( __( 'Version %s' ), get_bloginfo( 'version', 'display' ) ); # Original core code on /wp-admin/includes/update.php
					return sprintf( __( 'You are using a <span title="You have the latest version %1$s of WordPress"><font style="cursor:help"; color="black"><strong><u>Latest Available</u></strong></font></span>', 'admin-footer-version-rebranded' ) . ' ' . __( 'Version %s', 'admin-footer-version-rebranded' ), get_bloginfo( 'version', 'display' ) );
			}
		}
	}
}
