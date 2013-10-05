<?php
/**
 * Plugin Name: Sliding Panel
 * Plugin URI: http://justintadlock.com/archives/2009/06/25/sliding-panel-wordpress-plugin
 * Description: Creates a jQuery-based, fully-widgetized sliding panel.
 * Version: 0.2.0-alpha-1
 * Author: Justin Tadlock
 * Author URI: http://justintadlock.com
 *
 * Creates a sliding panel for use on any WordPress site. This has been tested
 * and auto-inserts itself for a few themes.  Other themes need to manually
 * call the sliding panel within the content.
 * @link http://themehybrid.com/themes/hybrid
 * @link http://themeshaper.com/thematic
 *
 * The original idea for this plugin came from Web Kreation, but the plugin has been 
 * coded from the ground up to work with many themes, handle widgets, and work 
 * along with the version of jQuery packaged with WordPress.
 * @link http://web-kreation.com/index.php/wordpress/implement-a-nice-clean-jquery-sliding-panel-in-wordpress-27
 *
 * @copyright 2009
 * @version 0.2.0
 * @author Justin Tadlock
 * @link http://justintadlock.com/archives/2009/06/25/sliding-panel-wordpress-plugin
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @package SlidingPanel
 */

/**
 * Yes, we're localizing the plugin.  This partly makes sure non-English
 * users can use it too.  To translate into your language use the
 * en_EN.po file as as guide.  Poedit is a good tool to for translating.
 * @link http://poedit.net
 *
 * @since 0.1
 */
load_plugin_textdomain( 'sliding-panel', false, '/sliding-panel' );

/**
 * Make sure we get the correct directory.
 * @since 0.1
 */
if ( !defined('WP_CONTENT_URL' ) )
	define( 'WP_CONTENT_URL', get_option( 'siteurl' ) . '/wp-content' );
if ( !defined( 'WP_CONTENT_DIR' ) )
	define( 'WP_CONTENT_DIR', ABSPATH . 'wp-content' );
if ( !defined( 'WP_PLUGIN_URL' ) )
	define( 'WP_PLUGIN_URL', WP_CONTENT_URL. '/plugins' );
if ( !defined( 'WP_PLUGIN_DIR' ) )
	define( 'WP_PLUGIN_DIR', WP_CONTENT_DIR . '/plugins' );

/**
 * Define constant paths to the plugin folder.
 * @since 0.1
 */
define( SLIDING_PANEL, WP_PLUGIN_DIR . '/sliding-panel' );
define( SLIDING_PANEL_URL, WP_PLUGIN_URL . '/sliding-panel' );

/**
 * Add actions
 * @since 0.1
 */
add_action( 'init', 'sliding_panel_register_sidebars' );
add_action( 'template_redirect', 'load_sliding_panel' );

/**
 * Loads JS and CSS if the sidebar is active and not in admin.
 * @since 0.1
 */
if ( !is_admin() && is_active_sidebar( 'sliding-panel' ) ) :
	wp_enqueue_style( 'sliding-panel', SLIDING_PANEL_URL . '/panel.css', false, 0.1, 'screen' );
	wp_enqueue_script( 'sliding-panel-js', SLIDING_PANEL_URL . '/panel.js', array( 'jquery' ), '0.1', true );
endif;

/**
 * Registers the sliding panel widget area.
 * @uses register_sidebar()
 *
 * @since 0.1
 */
function sliding_panel_register_sidebars() {
	register_sidebar( array( 'name' => __('Sliding Panel', 'sliding-panel'), 'id' => 'sliding-panel', 'before_widget' => '<div id="%1$s" class="widget %2$s widget-%2$s"><div class="widget-inside">', 'after_widget' => '</div></div>', 'before_title' => '<h3 class="widget-title">', 'after_title' => '</h3>' ) );
}

/**
 * Hooks the sliding panel into one of the available action hooks.
 * This works with the Hybrid, Thematic, and Prodigy theme.
 * @uses hybrid_before_html()
 * @uses thematic_before()
 * @uses prodigy_before()
 *
 * @since 0.1
 */
function load_sliding_panel() {
	if ( is_admin() )
		return '';

	add_action( 'hybrid_before_html', 'get_sliding_panel' );
	add_action( 'thematic_before', 'get_sliding_panel' );
	add_action( 'prodigy_before', 'get_sliding_panel' );
}

/**
 * Displays the sliding panel if the widget area is active.
 * This can be manually called in the templates with:
 *	<?php if ( function_exists( 'sliding_panel' ) ) sliding_panel(); ?>
 *
 * @uses is_active_sidebar()
 * @since 0.1
 */
function get_sliding_panel() {

	if ( is_active_sidebar( 'sliding-panel' ) ) : ?>

	<div id="sliding-panel-container"><div id="sliding-panel">

		<div class="panel">
			<div class="panel-content">
				<?php dynamic_sidebar( 'sliding-panel' ); ?>
			</div>
		</div>

		<div class="tab">
			<div class="toggle">
				<a class="open" title="<?php _e('Open panel', 'sliding-panel'); ?>"><?php _e('Open <span class="arrow">&darr;</span>', 'sliding-panel'); ?></a>
				<a class="close" title="<?php _e('Close panel', 'sliding-panel'); ?>" style="display: none;"><?php _e('Close <span class="arrow">&uarr;</span>', 'sliding-panel'); ?></a>
			</div>
		</div>

	</div></div>

	<?php endif;
}

?>