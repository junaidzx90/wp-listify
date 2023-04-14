<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://www.fiverr.com/junaidzx90
 * @since      1.0.0
 *
 * @package    Wp_Listify
 * @subpackage Wp_Listify/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Wp_Listify
 * @subpackage Wp_Listify/public
 * @author     Developer Junayed <admin@developerjunayed.com>
 */
class Wp_Listify_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		add_shortcode( "wplistify", [$this, "list_table_html"] );
	}

	function enqueue_head_style(){
		?>
		@import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css');
		@import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap');
		
		:root{
			--section_title_fontsize: <?php echo (get_option('wpl_section_title_fontsize') ? get_option('wpl_section_title_fontsize').'px' :'16px') ?>;
			--column_title_fontsize: <?php echo (get_option('wpl_column_title_fontsize') ? get_option('wpl_column_title_fontsize').'px' :'14px') ?>;
			--btn_text_fontsize: <?php echo (get_option('wpl_btn_text_fontsize') ? get_option('wpl_btn_text_fontsize').'px' :'12px') ?>;
			--wpl_primary_color: <?php echo (get_option('wpl_primary_color') ? get_option('wpl_primary_color') : '#1e90ff') ?>;
			--wpl_secondary_color: <?php echo (get_option('wpl_secondary_color')?get_option('wpl_secondary_color'):'#bb4444') ?>;
			--wpl_text_color: <?php echo (get_option('wpl_text_color')?get_option('wpl_text_color'):'#333333') ?>;
		}

		div#wplistify {
			border: 1px solid #ddd;
			box-shadow: 0 0 8px -2px #cacaca;
		}

		.headerTitle {
			padding: 20px 20px 16px;
			border-bottom: 1px solid #ddd;
			display: flex;
			align-items: center;
		}
		
		.wplistifyContents {
			display: flex;
			flex-direction: column;
			gap: 8px;
			margin: 20px 0;
		}
		h3.listItemTitle {
			font-size: var(--section_title_fontsize);
			color: var(--wpl_text_color);
			font-weight: bold;
			margin: 0;
			text-transform: uppercase;
		}
		.listifySection .listItems {
			display: flex;
			flex-direction: column;
			margin-top: 10px;
		}

		.listItems .listItem {
			display: flex;
			background-image: linear-gradient(to right,#fff 0,#fff 67%,#9c9c9c 143%);
			margin-bottom: 0;
			border-bottom: 3px solid #e5e8ea;
			box-shadow: 0 0 11px -6px #888;
		}

		.listItem > div {
			padding: 10px;
			text-align: center;
			box-shadow: 0 0 4px -2px #888;
			display: flex;
			justify-content: center;
			align-items: center;
			flex-direction: column;
		}

		.wplLogo {
			width: 80%;
			overflow: hidden;
			height: 45px;
		}

		.wplLogo > img {
			width: 100%;
			height: 100%;
			object-fit: contain;
		}

		.wplLogo > img[src=""] {
			display: none;
		}

		.listItem > div > h3 {
			margin: 0;
			text-transform: uppercase;
			font-size: var(--column_title_fontsize);
			font-weight: bold;
			color: var(--wpl_primary_color);
		}
		.listItem > div > p {
			margin: 0;
			font-size: 14px;
			font-weight: 400;
			color: var(--wpl_text_color);
		}
		a.getBonusBtn {
			text-decoration: none !important;
			background: linear-gradient(90deg,var(--wpl_primary_color) 1.56%,var(--wpl_secondary_color) 100%);
			border: none !important;
			box-shadow: none !important;
			outline: none !important;
			color: #fff !important;
			border-radius: 10px 0;
			padding: 10px 20px;
			text-transform: uppercase;
			font-size: var(--btn_text_fontsize);
			font-weight: 600;
			animation: getBonusAnimation 2s ease infinite;
			-webkit-animation: getBonusAnimation 2s ease infinite;
			background-size: 400% 400%;
			display: inline-flex;
			line-height: 12px;
			justify-content: center;
		}
		a.getBonusBtn:hover{
			color: #ffffff;
		}

		@keyframes getBonusAnimation {
			0% {
				background-position: 0 50%;
			}
			50% {
				background-position: 100% 50%;
			}
			100% {
				background-position: 0 50%;
			}
		}

		.columnLogo, .columnScore {
			width: 20%;
		}
		.columnBonus {
			width: 40%;
		}
		.columnButton {
			width: 20%;
		}

		@media only screen and (max-width: 768px) {
			.listItem > div > h3, .listItem > div > p {
				font-size: 12px;
			}
			a.getBonusBtn{
				padding: 5px;
			}
			.wplStars {
				display: flex;
			}
		}
		@media only screen and (max-width: 580px) {
			h3.listItemTitle {
				font-size: 12px;
			}
			.columnScore {
				display: none !important;
			}
			.columnLogo, .columnButton {
				width: 25%;
			}
			.columnBonus {
				width: 50%;
			}
			.listItem > div {
				padding: 5px;
				box-shadow: none;
			}
			.wplLogo {
				width: 100%;
				height: 28px;
			}
			.listItem > div > p{
				font-size: 10px;
				line-height: 11px;
			}
			.listItem > div > h3 {
				display: none;
			}
			a.getBonusBtn {
				padding: 6px 8px;
				font-size: 10px;
				line-height: 11px;
				width: 100%;
			}
		}
		@media only screen and (max-width: 380px) {
			a.getBonusBtn {
				padding: 3px !important;
				font-size: 8px !important;
			}
		}
		<?php
	}

	function get_ratings($star){
		$fsize = ((get_option('wpl_column_title_fontsize')) ? get_option('wpl_column_title_fontsize').'px': '14px');

		$rating_html = '';
		for ($i = 1; $i <= 5; $i++) {
			if ($i <= $star) {
				$rating_html .= '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 1000 1000" enable-background="new 0 0 1000 1000" xml:space="preserve" width="'.$fsize.'" height="'.$fsize.'" fill="#fba608" style="disply: inline">

				<g><g><path d="M990,394.9c0,8.6-5.1,18.1-15.3,28.3L760.9,631.6l50.7,294.5c0.4,2.7,0.6,6.7,0.6,11.8c0,8.2-2.1,15.2-6.2,20.9s-10.1,8.5-18,8.5c-7.5,0-15.3-2.4-23.6-7.1L500,821.3l-264.4,139c-8.6,4.7-16.5,7.1-23.6,7.1c-8.2,0-14.4-2.8-18.6-8.5s-6.2-12.7-6.2-20.9c0-2.4,0.4-6.3,1.2-11.8l50.6-294.5L24.7,423.1c-9.8-10.6-14.7-20-14.7-28.3c0-14.5,11-23.6,33-27.1l295.6-43l132.5-268c7.5-16.1,17.1-24.1,28.9-24.1c11.8,0,21.4,8,28.9,24.1l132.5,268l295.6,43C979,371.3,990,380.3,990,394.9L990,394.9z"/></g></g>
				</svg>';
			} else {
				$rating_html .= '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 1000 1000" enable-background="new 0 0 1000 1000" xml:space="preserve" width="'.$fsize.'" height="'.$fsize.'" fill="#dddddd" style="disply: inline">

				<g><g><path d="M990,394.9c0,8.6-5.1,18.1-15.3,28.3L760.9,631.6l50.7,294.5c0.4,2.7,0.6,6.7,0.6,11.8c0,8.2-2.1,15.2-6.2,20.9s-10.1,8.5-18,8.5c-7.5,0-15.3-2.4-23.6-7.1L500,821.3l-264.4,139c-8.6,4.7-16.5,7.1-23.6,7.1c-8.2,0-14.4-2.8-18.6-8.5s-6.2-12.7-6.2-20.9c0-2.4,0.4-6.3,1.2-11.8l50.6-294.5L24.7,423.1c-9.8-10.6-14.7-20-14.7-28.3c0-14.5,11-23.6,33-27.1l295.6-43l132.5-268c7.5-16.1,17.1-24.1,28.9-24.1c11.8,0,21.4,8,28.9,24.1l132.5,268l295.6,43C979,371.3,990,380.3,990,394.9L990,394.9z"/></g></g>
				</svg>';
			}
		}
		return $rating_html;
	}

	function list_table_html(){
		// Set the cache-control headers
		header('Cache-Control: no-cache, no-store, must-revalidate');
		header('Pragma: no-cache');
		header('Expires: 0');

		ob_start();
		require_once plugin_dir_path( __FILE__ )."partials/wp-listify-public-display.php";
		return ob_get_clean();
	}

}