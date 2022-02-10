<?php
/**
 * Functions
 */

if (!function_exists('mytheme_setup')):
    function mytheme_setup(){
        add_theme_support('post-thumbnails');
        set_post_thumbnail_size(1200, 9999);
    }
endif;
add_action('after_setup_theme', 'mytheme_setup');

 // WP enqueue scripts
 add_action( 'wp_enqueue_scripts', 'add_enqueue_scripts', 25 );
 
function add_enqueue_scripts() {
 	wp_enqueue_style( 'true_stili', get_stylesheet_directory_uri() . '/stylesheet.css' );
	wp_enqueue_script('axios', 'https://unpkg.com/axios/dist/axios.min.js');
	wp_enqueue_script('newscript', get_template_directory_uri() . '/js/all_script.js');
}

//wp_enqueue_script('newscript', get_template_directory_uri() . '/js/all_script.js');


// Stick Admin Bar To The Top
if ( ! is_admin() ) {
	add_action( 'get_header', 'remove_topbar_bump' );

	function remove_topbar_bump() {
		remove_action( 'wp_head', '_admin_bar_bump_cb' );
	}

	function stick_admin_bar() {
		echo "
			<style type='text/css'>
				body.admin-bar {margin-top:32px !important}
				@media screen and (max-width: 782px) {
					body.admin-bar { margin-top:46px !important }
				}
			</style>
			";
	}

	add_action( 'admin_head', 'stick_admin_bar' );
	add_action( 'wp_head', 'stick_admin_bar' );
}

// ACF Pro Options Page

if ( function_exists( 'acf_add_options_page' ) ) {

	acf_add_options_page( array(
		'page_title' => 'Theme General Settings',
		'menu_title' => 'Theme Settings',
		'menu_slug'  => 'theme-general-settings',
		'capability' => 'edit_posts',
		'post_id' => 'options',
		'redirect'   => false
	) );

}

add_filter( 'tiny_mce_before_init', 'insert_custom_formats' );

add_editor_style();

/**
 * Add custom color to TinyMCE editor text color selector
 *
 * @param $init array
 *
 * @return mixed array
 */

function expand_default_editor_colors( $init ) {
	$default_colours = '"000000", "Black","993300", "Burnt orange","333300", "Dark olive","003300", "Dark green","003366", "Dark azure","000080", "Navy Blue","333399", "Indigo","333333", "Very dark gray","800000", "Maroon","FF6600", "Orange","808000", "Olive","008000", "Green","008080", "Teal","0000FF", "Blue","666699", "Grayish blue","808080", "Gray","FF0000", "Red","FF9900", "Amber","99CC00", "Yellow green","339966", "Sea green","33CCCC", "Turquoise","3366FF", "Royal blue","800080", "Purple","999999", "Medium gray","FF00FF", "Magenta","FFCC00", "Gold","FFFF00", "Yellow","00FF00", "Lime","00FFFF", "Aqua","00CCFF", "Sky blue","993366", "Brown","C0C0C0", "Silver","FF99CC", "Pink","FFCC99", "Peach","FFFF99", "Light yellow","CCFFCC", "Pale green","CCFFFF", "Pale cyan","99CCFF", "Light sky blue","CC99FF", "Plum","FFFFFF", "White"';

	$custom_colours  = '
		"123154", "Navy",
		"173a62", "Light Navy",
		"e21c54", "Red",
		"1d1d1d", "Black",
		"737373", "Gray",';

	$init['textcolor_map']  = '[' . $default_colours . ',' . $custom_colours . ']';
	$init['textcolor_rows'] = 6; // expand colour grid to 6 rows

	return $init;
}

add_filter( 'tiny_mce_before_init', 'expand_default_editor_colors' );



// Polylang Shortcode - https://wordpress.org/plugins/polylang/
// Add this code in your functions.php
// Put shortcode [polylang] to post/page for display flags

function polylang_shortcode() {
	ob_start();
	pll_the_languages(array('show_flags'=>1,'show_names'=>0));
	$flags = ob_get_clean();
	return $flags;
}
add_shortcode( 'polylang', 'polylang_shortcode' );
/*******************************************************************************/

if( function_exists('acf_add_options_page') ) {

  // Language Specific Options
  // Translatable options specific languages. e.g., social profiles links
  //
  //$languages = array( 'en', 'pl', 'uk', 'ru' );
  $languages = array( 'en' );

  foreach ( $languages as $lang ) {
    acf_add_options_page( array(
      'page_title' => 'Site Options (' . strtoupper( $lang ) . ')',
      'menu_title' => __('Site Options (' . strtoupper( $lang ) . ')', 'text-domain'),
      'menu_slug'  => "site-options-${lang}",
      'post_id'    => $lang
    ) );
  }
}