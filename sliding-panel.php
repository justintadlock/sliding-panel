<?php
/**
 * Plugin Name: Sliding Panel
 * Plugin URI: http://themehybrid.com/plugins/sliding-panel
 * Description: A fully-widgetized and responsive sliding panel for your site.
 * Version: 0.2.0
 * Author: Justin Tadlock
 * Author URI: http://justintadlock.com
 *
 * This program is free software; you can redistribute it and/or modify it under the terms of the GNU 
 * General Public License as published by the Free Software Foundation; either version 2 of the License, 
 * or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without 
 * even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * You should have received a copy of the GNU General Public License along with this program; if not, write 
 * to the Free Software Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA
 *
 * @package   SlidingPanel
 * @version   0.2.0
 * @since     0.1.0
 * @author    Justin Tadlock <justin@justintadlock.com>
 * @copyright Copyright (c) 2009 - 2013, Justin Tadlock
 * @link      http://themehybrid.com/plugins/sliding-panel
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

final class Sliding_Panel_Plugin {

	/**
	 * Holds the instance of this class.
	 *
	 * @since  0.2.0
	 * @access private
	 * @var    object
	 */
	private static $instance;

	/**
	 * Stores the directory path for this plugin.
	 *
	 * @since  0.2.0
	 * @access private
	 * @var    string
	 */
	private $directory_path;

	/**
	 * Stores the directory URI for this plugin.
	 *
	 * @since  0.2.0
	 * @access private
	 * @var    string
	 */
	private $directory_uri;

	/**
	 * Plugin setup.
	 *
	 * @since  0.2.0
	 * @access public
	 * @return void
	 */
	public function __construct() {

		/* Set the properties needed by the plugin. */
		add_action( 'plugins_loaded', array( $this, 'setup' ), 1 );

		/* Internationalize the text strings used. */
		add_action( 'plugins_loaded', array( $this, 'i18n' ), 2 );

		/* Load the admin files. */
		add_action( 'plugins_loaded', array( $this, 'admin' ), 4 );

		/* Register sidebars late so ours come after theme sidebars. */
		add_action( 'widgets_init', array( $this, 'register_sidebars' ), 95 );

		/* Load scripts and styles. */
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ), 5 );

		/* Load the sliding panel sidebar in the footer. */
		add_action( 'wp_footer', array( $this, 'sliding_panel' ), 0 );
	}

	/**
	 * Defines the directory path and URI for the plugin.
	 *
	 * @since  0.2.0
	 * @access public
	 * @return void
	 */
	public function setup() {

		$this->directory_path = trailingslashit( plugin_dir_path( __FILE__ ) );
		$this->directory_uri  = trailingslashit( plugin_dir_url(  __FILE__ ) );
	}

	/**
	 * Loads the translation files.
	 *
	 * @since  0.2.0
	 * @access public
	 * @return void
	 */
	public function i18n() {

		/* Load the translation of the plugin. */
		load_plugin_textdomain( 'sliding-panel', false, 'sliding-panel/languages' );
	}

	/**
	 * Loads the admin functions and files.
	 *
	 * @since  0.2.0
	 * @access public
	 * @return void
	 */
	public function admin() {

		if ( is_admin() )
			require_once( "{$this->directory_path}admin/admin.php" );
	}

	/**
	 * Registers sidebars.
	 *
	 * @since  0.2.0
	 * @access public
	 * @return void
	 */
	public function register_sidebars() {

		register_sidebar( 
			array(
				'id'            => 'sliding-panel',
				'name'          => __( 'Sliding Panel', 'sliding-panel' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s widget-%2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>'
			)
		);
	}

	/**
	 * Loads scripts and styles.
	 *
	 * @since  0.2.0
	 * @access public
	 * @return void
	 */
	public function enqueue_scripts() {

		/* Only load scripts if the sliding panel sidebar is active. */
		if ( is_active_sidebar( 'sliding-panel' ) ) {

			/* Register the sliding panel script. */
			wp_register_script( 'sliding-panel', "{$this->directory_uri}js/sliding-panel.js", array( 'jquery' ), '', true );

			/* Get the plugin options. */
			$settings = get_option(
				'plugin_sliding_panel', 
				array(
					'label_open'  => __( 'Open',  'sliding-panel' ),
					'label_close' => __( 'Close', 'sliding-panel' )
				)
			);

			/* Localize the text strings to pass to the script. */
			wp_localize_script(
				'sliding-panel',
				'sp_l10n',
				array(
					'open'  => esc_js( $settings['label_open']  ),
					'close' => esc_js( $settings['label_close'] )
				)
			);

			/* Enqueue the sliding panel script. */
			wp_enqueue_script( 'sliding-panel' );

			/* Enqueue the sliding panel stylesheet. */
			wp_enqueue_style( 'sliding-panel', "{$this->directory_uri}css/sliding-panel.css" );
		}
	}

	/**
	 * Loads the sliding panel sidebar.
	 *
	 * @since  0.2.0
	 * @access public
	 * @return void
	 */
	public function sliding_panel() {
		require_once( "{$this->directory_path}inc/sidebar-sliding-panel.php" );
	}

	/**
	 * Returns the instance.
	 *
	 * @since  0.2.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		if ( !self::$instance )
			self::$instance = new self;

		return self::$instance;
	}
}

Sliding_Panel_Plugin::get_instance();

/**
 * @since      0.1.0
 * @deprecated 0.2.0
 */
function sliding_panel_register_sidebars() {
	_deprecated_function( __FUNCTION__, '0.2.0', 'Sliding_Panel_Plugin::register_sidebars()' );
}

/**
 * @since      0.1.0
 * @deprecated 0.2.0
 */
function load_sliding_panel() {
	_deprecated_function( __FUNCTION__, '0.2.0', '' );
}

/**
 * @since      0.1.0
 * @deprecated 0.2.0
 */
function get_sliding_panel() {
	_deprecated_function( __FUNCTION__, '0.2.0', 'Sliding_Panel_Plugin::sliding_panel()' );
}

?>