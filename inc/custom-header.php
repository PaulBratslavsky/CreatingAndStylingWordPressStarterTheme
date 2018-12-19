<?php
/**
 * Sample implementation of the Custom Header feature
 *
 * You can add an optional custom header image to header.php like so ...
 *
	<?php the_header_image_tag(); ?>
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package Starter_Theme
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses underscoresass_header_style()
 */
function underscoresass_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'underscoresass_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => '000000',
		'width'                  => 2000,
		'height'                 => 800,
		'flex-height'            => true,
		'wp-head-callback'       => 'underscoresass_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'underscoresass_custom_header_setup' );

