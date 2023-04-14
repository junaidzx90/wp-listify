<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.fiverr.com/junaidzx90
 * @since      1.0.0
 *
 * @package    Wp_Listify
 * @subpackage Wp_Listify/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wp_Listify
 * @subpackage Wp_Listify/admin
 * @author     Developer Junayed <admin@developerjunayed.com>
 */
class Wp_Listify_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wp_Listify_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_Listify_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( 'wp-color-picker');
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wp-listify-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wp_Listify_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_Listify_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		
		wp_enqueue_script( 'wp-color-picker');
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wp-listify-admin.js', array( 'jquery' ), microtime(), true );
		if(isset($_GET['page']) && $_GET['page'] === "wplistify"){
			wp_enqueue_script( "wpl-vue@2.7.14", 'https://cdn.jsdelivr.net/npm/vue@2.7.14', array(), $this->version, false );
			wp_enqueue_script( "wpl-uuid.min", 'https://cdn.jsdelivr.net/npm/uuid@8.3.2/dist/umd/uuidv4.min.js', array(), $this->version, false );
			wp_enqueue_script( $this->plugin_name."-editor", plugin_dir_url( __FILE__ ) . 'js/wp-listify-editor.js', array( 'jquery', 'wpl-vue@2.7.14', 'wpl-uuid.min' ), microtime(), true );
			wp_enqueue_media(  );
			wp_localize_script( $this->plugin_name."-editor", "wplObj", array(
				'ajaxurl' => admin_url("admin-ajax.php")
			) );
		}
	}

	function admin_menu_page(){
		add_menu_page( "WP Listify", "WP Listify", "manage_options", "wplistify", [$this, "wplistify_callback"], "dashicons-editor-table", 45 );
		add_submenu_page( "wplistify", "Settings", "Settings", "manage_options", "wplistify-setting", [$this, "wplistify_settings"], null );

		add_settings_section( 'wpl_setting_section', '', '', 'wpl_setting_page' );

		add_settings_field( 'wpl_shortcode', 'Shortcode ', [$this, 'wpl_shortcode_cb'], 'wpl_setting_page','wpl_setting_section' );
		//Section font-size
		add_settings_field( 'wpl_section_title_fontsize', 'Section title font-size ', [$this, 'wpl_section_title_fontsize_cb'], 'wpl_setting_page','wpl_setting_section' );
		register_setting( 'wpl_setting_section', 'wpl_section_title_fontsize' );
		//Column titles font-size
		add_settings_field( 'wpl_column_title_fontsize', 'Column titles font-size ', [$this, 'wpl_column_title_fontsize_cb'], 'wpl_setting_page','wpl_setting_section' );
		register_setting( 'wpl_setting_section', 'wpl_column_title_fontsize' );
		//Button text font-size
		add_settings_field( 'wpl_btn_text_fontsize', 'Button text font-size ', [$this, 'wpl_btn_text_fontsize_cb'], 'wpl_setting_page','wpl_setting_section' );
		register_setting( 'wpl_setting_section', 'wpl_btn_text_fontsize' );
		//Score title
		add_settings_field( 'wpl_score_title', 'Score title ', [$this, 'wpl_score_title_cb'], 'wpl_setting_page','wpl_setting_section' );
		register_setting( 'wpl_setting_section', 'wpl_score_title' );
		//Bonus title
		add_settings_field( 'wpl_bonus_title', 'Bonus title ', [$this, 'wpl_bonus_title_cb'], 'wpl_setting_page','wpl_setting_section' );
		register_setting( 'wpl_setting_section', 'wpl_bonus_title' );
		//Button text
		add_settings_field( 'wpl_button_text', 'Button text ', [$this, 'wpl_button_text_cb'], 'wpl_setting_page','wpl_setting_section' );
		register_setting( 'wpl_setting_section', 'wpl_button_text' );
		// Primary color
		add_settings_field( 'wpl_primary_color', 'Primary color ', [$this, 'wpl_primary_color_cb'], 'wpl_setting_page','wpl_setting_section' );
		register_setting( 'wpl_setting_section', 'wpl_primary_color' );
		// Secondary color
		add_settings_field( 'wpl_secondary_color', 'Secondary color ', [$this, 'wpl_secondary_color_cb'], 'wpl_setting_page','wpl_setting_section' );
		register_setting( 'wpl_setting_section', 'wpl_secondary_color' );
		// text color
		add_settings_field( 'wpl_text_color', 'Text color ', [$this, 'wpl_text_color_cb'], 'wpl_setting_page','wpl_setting_section' );
		register_setting( 'wpl_setting_section', 'wpl_text_color' );
		
	}

	function wpl_shortcode_cb(){
		echo '<input type="text" style="border: 1px solid #ddd; outline: 0; box-shadow: none; width: 100px; text-align: center" readonly value=\'[wplistify]\'>';
	}
	function wpl_section_title_fontsize_cb(){
		echo '<input type="number" style="width: 60px; text-align: center" placeholder="16px" name="wpl_section_title_fontsize" value="'.get_option('wpl_section_title_fontsize').'">';
	}
	function wpl_column_title_fontsize_cb(){
		echo '<input type="number" style="width: 60px; text-align: center" placeholder="14px" name="wpl_column_title_fontsize" value="'.get_option('wpl_column_title_fontsize').'">';
	}
	function wpl_btn_text_fontsize_cb(){
		echo '<input type="number" style="width: 60px; text-align: center" placeholder="12px" name="wpl_btn_text_fontsize" value="'.get_option('wpl_btn_text_fontsize').'">';
	}
	function wpl_score_title_cb(){
		echo '<input type="text" placeholder="Site score" name="wpl_score_title" value="'.get_option('wpl_score_title').'">';
	}
	function wpl_bonus_title_cb(){
		echo '<input type="text" placeholder="Site bonus" name="wpl_bonus_title" value="'.get_option('wpl_bonus_title').'">';
	}
	function wpl_button_text_cb(){
		echo '<input type="text" placeholder="Get bonus" name="wpl_button_text" value="'.get_option('wpl_button_text').'">';
	}
	function wpl_primary_color_cb(){
		echo '<input type="text" data-default-color="#1e90ff" id="wpl_primary_color" name="wpl_primary_color" value="'.(get_option('wpl_primary_color') ? get_option('wpl_primary_color') : '#1e90ff').'">';
	}
	function wpl_secondary_color_cb(){
		echo '<input type="text" data-default-color="#bb4444" id="wpl_secondary_color" name="wpl_secondary_color" value="'.(get_option('wpl_secondary_color')?get_option('wpl_secondary_color'):'#bb4444').'">';
	}
	function wpl_text_color_cb(){
		echo '<input type="text" data-default-color="#333333" id="wpl_text_color" name="wpl_text_color" value="'.(get_option('wpl_text_color')?get_option('wpl_text_color'):'#333333').'">';
	}

	function wplistify_callback(){
		require_once plugin_dir_path( __FILE__ )."partials/wp-listify-editor.php";
	}

	function wplistify_settings(){
		require_once plugin_dir_path( __FILE__ )."partials/wp-listify-settings.php";
	}

	function get_editor_data(){
		$results = get_option("wplistify_data");
		if(!is_array($results)) $results = [];
		
		$results = array_map(function($items) {
			$items['title'] = stripslashes($items['title']);

			$items['fields'] = array_map(function($item){
				$item['bonusTxt'] = stripslashes($item['bonusTxt']);
				$item['stars'] = intval($item['stars']);
				$item['logoUrl'] = esc_url($item['logoUrl']);
				$item['buttonLink'] = esc_url($item['buttonLink']);

				return $item;
			}, $items['fields']);

			return $items;
		}, $results);
		
		echo json_encode(array("success" => $results));
		die;
	}

	function update_editor_data(){
		if(isset($_POST['sections'])){
			$sections = $_POST['sections'];
			if(!is_array($sections)) $sections = [];

			$sections = array_map(function($items) {
				$items['title'] = stripslashes($items['title']);

				$items['fields'] = array_map(function($item){
					$item['bonusTxt'] = stripslashes($item['bonusTxt']);
					$item['stars'] = intval($item['stars']);
					$item['logoUrl'] = esc_url($item['logoUrl']);
					$item['buttonLink'] = esc_url($item['buttonLink']);

					return $item;
				}, $items['fields']);

				return $items;
			}, $sections);

			update_option( "wplistify_data", $sections );
		}
		echo json_encode(["success" => ""]);
		die;
	}

}
