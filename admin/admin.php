<?php
/**
 * Sliding Panel plugin settings page.  This page is added to the themes page ("Appearance") in the 
 * WordPress admin rather than as a sub-item for another section in the admin.  It deals with the 
 * appearance of the site.
 *
 * @package   SlidingPanel
 * @author    Justin Tadlock <justin@justintadlock.com>
 * @copyright Copyright (c) 2009 - 2013, Justin Tadlock
 * @link      http://themehybrid.com/plugins/sliding-panel
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

final class Sliding_Panel_Settings_Page {

	/**
	 * Holds the instance of this class.
	 *
	 * @since  0.2.0
	 * @access private
	 * @var    object
	 */
	private static $instance;

	/**
	 * Holds an array the plugin settings.
	 *
	 * @since  0.2.0
	 * @access public
	 * @var    array
	 */
	public $settings = array();

	/**
	 * Settings page name.
	 *
	 * @since  0.2.0
	 * @access public
	 * @var    string
	 */
	public $settings_page = '';

	/**
	 * Sets up the plugin admin.
	 *
	 * @since  0.2.0
	 * @access public
	 * @return void
	 */
	public function __construct() {
		add_action( 'admin_menu', array( $this, 'admin_menu' ) );
	}

	/**
	 * Adds the settings page to the admin menu.
	 *
	 * @since  0.2.0
	 * @access public
	 * @return void
	 */
	public function admin_menu() {

		$this->settings_page = add_theme_page( 
			__( 'Sliding Panel', 'sliding-panel' ), 
			__( 'Sliding Panel', 'sliding-panel' ), 
			'edit_theme_options', 
			'sliding-panel', 
			array( $this, 'settings_page' )
		);

		if ( !empty( $this->settings_page ) )
			add_action( 'admin_init', array( $this, 'register_settings' ) );
	}

	/**
	 * Registers the plugin settings and sets up the settings sections and fields.
	 *
	 * @since  0.2.0
	 * @access public
	 * @return void
	 */
	public function register_settings() {

		/* Get the plugin settings from the database. */
		$this->settings = get_option(
			'plugin_sliding_panel', 
			array(
				'label_open'  => __( 'Open',  'sliding-panel' ),
				'label_close' => __( 'Close', 'sliding-panel' )
			)
		);

		/* Register the plugin settings. */
		register_setting(
			'plugin_sliding_panel',
			'plugin_sliding_panel', 
			array( $this, 'validate_settings' )
		);

		/* === Labels section === */

		/* Adds the labels section. */
		add_settings_section( 
			'sp_section_labels', 
			__( 'Labels', 'sliding-panel' ), 
			array( $this, 'section_labels' ),
			$this->settings_page
		);

		/* Adds the 'open' label field. */
		add_settings_field(
			'sp_field_label_open',
			__( 'Open Label', 'sliding-panel' ),
			array( $this, 'field_label_open' ),
			$this->settings_page,
			'sp_section_labels',
			array(
				'label_for' => 'sp-label-open'
			)
		);

		/* Adds the 'close' label field. */
		add_settings_field(
			'sp_field_label_close',
			__( 'Close Label', 'sliding-panel' ),
			array( $this, 'field_label_close' ),
			$this->settings_page,
			'sp_section_labels',
			array(
				'label_for' => 'sp-label-close'
			)
		);

		/* === Like this plugin? section. === */

		/* Adds the 'like this plugin' section. */
		add_settings_section( 
			'sp_section_like_plugin', 
			__( 'Like this plugin?', 'sliding-panel' ), 
			array( $this, 'section_like_plugin' ),
			$this->settings_page
		);

		/* Adds the 'give back' field. */
		add_settings_field(
			'sp_field_give_back',
			__( 'Give Back', 'sliding-panel' ),
			array( $this, 'field_give_back' ),
			$this->settings_page,
			'sp_section_like_plugin'
		);
	}

	/**
	 * Validates the plugin settings once the form has been submitted.
	 *
	 * @since  0.2.0
	 * @access public
	 * @return void
	 */
	public function validate_settings( $settings ) {

		$settings['label_open']  = strip_tags( $settings['label_open']  );
		$settings['label_close'] = strip_tags( $settings['label_close'] );

		return $settings;
	}

	/**
	 * Displays the HTML for the 'labels' section.
	 *
	 * @since  0.2.0
	 * @access public
	 * @return void
	 */
	public function section_labels() { ?>

		<p class="description">
			<?php _e( 'Input custom "open" and "close" labels for your sliding panel.', 'sliding-panel' ); ?>
		</p>
	<?php }

	/**
	 * Displays the HTML for the 'like this plugin' section.
	 *
	 * @since  0.2.0
	 * @access public
	 * @return void
	 */
	public function section_like_plugin() { ?>

		<p class="description">
			<?php _e( 'Here are some ways you can give back:', 'sliding-panel' ); ?>
		</p>

	<?php }

	/**
	 * Displays the HTML for the 'open' label field.
	 *
	 * @since  0.2.0
	 * @access public
	 * @return void
	 */
	public function field_label_open() { ?>

		<input class="regular-text" type="text" id="sp-label-open" name="plugin_sliding_panel[label_open]" value="<?php echo esc_attr( $this->settings['label_open'] ); ?>" />
		<p class="description"><?php _e( 'Label displayed when the panel is in a closed state.', 'sliding-panel' ); ?></p>
	<?php }

	/**
	 * Displays the HTML for the 'close' label field.
	 *
	 * @since  0.2.0
	 * @access public
	 * @return void
	 */
	public function field_label_close() { ?>

		<input class="regular-text" type="text" id="sp-label-close" name="plugin_sliding_panel[label_close]" value="<?php echo esc_attr( $this->settings['label_close'] ); ?>" />
		<p class="description"><?php _e( 'Label displayed when the panel is in an open state.', 'sliding-panel' ); ?></p>
	<?php }

	/**
	 * Displays the HTML for the 'give back' field.
	 *
	 * @since  0.2.0
	 * @access public
	 * @return void
	 */
	public function field_give_back() { ?>

		<ul>
			<li><a href="http://wordpress.org/support/view/plugin-reviews/sliding-panel"><?php _e( 'Rate this plugin 5 &star;.', 'sliding-panel' ); ?></a></li>
			<li><?php printf( __( "Link to %s in a blog post, tweet, or post on a social network.", 'sliding-panel' ), '<a href="http://themehybrid.com/plugins/sliding-panel">'. __( 'Sliding Panel', 'sliding-panel' ) . '</a>' ); ?></li>
			<li><a href="http://themehybrid.com/donate"><?php _e( 'Make a donation.', 'sliding-panel' ); ?></a></li>
		</ul>
	<?php }

	/**
	 * Displays the HTML and uses the required functions for creating the plugin settings page.
	 *
	 * @since  0.2.0
	 * @access public
	 * @return void
	 */
	public function settings_page() { ?>

		<div class="wrap">
			<?php screen_icon(); ?>
			<h2><?php _e( 'Sliding Panel Settings', 'sliding-panel' ); ?></h2>

			<?php settings_errors(); ?>

			<form method="post" action="options.php">
				<?php settings_fields( 'plugin_sliding_panel' ); ?>
				<?php do_settings_sections( $this->settings_page ); ?>
				<?php submit_button( esc_attr__( 'Update Settings', 'sliding-panel' ), 'primary' ); ?>
			</form>

		</div><!-- wrap -->
	<?php }

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

Sliding_Panel_Settings_Page::get_instance();

?>