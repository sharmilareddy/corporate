<?php
/**
 * Theme Customizer.
 *
 * @package Dikka Business
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @since 1.0
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function dikka_business_customize_register( $wp_customize ) {

	// Load custom control function.
	require get_template_directory() . '/inc/customizer/controls.php';

	// Register custom section types.
	$wp_customize->register_section_type( 'dikka_business_Customize_Section_Upsell' );

	// Register section.
	$wp_customize->add_section(
		new dikka_business_Customize_Section_Upsell(
			$wp_customize,
			'theme_upsell',
			array(
				'title'    => esc_html__( 'Dikka Business Pro', 'dikka-business' ),
				'pro_text' => esc_html__( 'Buy Pro', 'dikka-business' ),
				'pro_url'  => 'http://www.creativthemes.com/downloads/dikka-business-pro/',
				'priority'  => 10,
			)
		)
	);

	// Load customize helpers.
	require get_template_directory() . '/inc/layout-option.php';

	// Load customize sanitize.
	require get_template_directory() . '/inc/customizer/sanitize.php';

	// Load customize callback.
	require get_template_directory() . '/inc/customizer/callback.php';

	// Load customize option.
	require get_template_directory() . '/inc/customizer/option.php';

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

}
add_action( 'customize_register', 'dikka_business_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 *
 * @since 1.0
 */
function dikka_business_customize_preview_js() {

	$min = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

	wp_enqueue_script( 'dikka-business-customizer', get_template_directory_uri() . '/assets/js/customizer' . $min . '.js', array( 'customize-preview' ), '1.1', true );

}
add_action( 'customize_preview_init', 'dikka_business_customize_preview_js' );

/**
 * Enqueue styles on customizer preview.
 */
function dikka_business_customizer_styles() {
	$min = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
	if ( is_customize_preview() ) {
		// Add custom css for customizer
		wp_enqueue_style( 'dikka-business-customizer', get_template_directory_uri() . '/assets/css/customizer'. $min .'.css' );
	}
}
add_action( 'customize_controls_print_styles', 'dikka_business_customizer_styles' );


/**
 * Add update to pro button
 */
function dikka_business_update_button() {
	$min = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
	wp_register_script( 'dikka-business-update-button-scripts', get_template_directory_uri() . '/assets/js/update-pro'. $min .'.js', array("jquery"), '20120206', true  );

	wp_localize_script( 'dikka-business-update-button-scripts', 'updateButtonObj', array(

		'pro' => __('Update to PRO version','dikka-business')

	) );

	wp_enqueue_script( 'dikka-business-update-button-scripts' );
}
add_action( 'customize_controls_enqueue_scripts', 'dikka_business_update_button' );


