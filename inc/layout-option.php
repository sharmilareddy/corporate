<?php
/**
 * Functions related to customizer and options.
 *
 * @package Dikka Business
 */

if ( ! function_exists( 'dikka_business_get_page_layout_options' ) ) :

	/**
	 * Returns Page or Post layout and pagination options.
	 *
	 * @since 1.0
	 *
	 * @return array Options array.
	 */
	function dikka_business_get_page_layout_options() {

		$choices = array(
			'left-sidebar'  => esc_html__( 'Primary Sidebar - Content', 'dikka-business' ),
			'right-sidebar' => esc_html__( 'Content - Primary Sidebar', 'dikka-business' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'dikka-business' ),
		);
		$output = apply_filters( 'dikka_business_filter_layout_options', $choices );
		return $output;

	}

endif;

if ( ! function_exists( 'dikka_business_get_pagination_type_options' ) ) :

	/**
	 * Returns pagination type options.
	 *
	 * @since 1.0
	 *
	 * @return array Options array.
	 */
	function dikka_business_get_pagination_type_options() {

		$choices = array(
			'default' => esc_html__( 'Older/Newer Post', 'dikka-business' ),
			'numeric' => esc_html__( 'Numeric Pagination', 'dikka-business' ),
		);
		return $choices;

	}

endif;

