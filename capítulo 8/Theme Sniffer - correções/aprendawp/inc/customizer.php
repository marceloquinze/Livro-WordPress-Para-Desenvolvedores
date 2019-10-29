<?php 

function aprendawp_customizer( $wp_customize ){	

	$wp_customize->add_section(
		'sec_copyright', array(
			'title'			=> __( 'Copyright Settings', 'aprendawp' ),
			'description'	=> __( 'Copyright Section', 'aprendawp' ),
			'priority' 		=> 160,
		)
	);

	$wp_customize->add_setting(
		'set_copyright', array(
			'type'					=> 'theme_mod',
			'default'				=> '',
			'sanitize_callback'		=> 'sanitize_text_field'
		)
	);

	$wp_customize->add_control(
		'set_copyright', array(
			'label'			=> __( 'Copyright', 'aprendawp' ),
			'description'	=> __( 'Please, add your copyright information here', 'aprendawp' ),
			'section'		=> 'sec_copyright',
			'type'			=> 'text'
		)
	);


	$wp_customize->add_section(
		'sec_slider', array(
			'title'			=> __( 'Slider Settings', 'aprendawp' ),
			'description'	=> __( 'Slider Section', 'aprendawp' ),
		)
	);

	$wp_customize->add_setting(
		'set_slider_page1', array(
			'type'					=> 'theme_mod',
			'default'				=> '',
			'sanitize_callback'		=> 'absint'
		)
	);

	$wp_customize->add_control(
		'set_slider_page1', array(
			'label'			=> __( 'Set slider page 1', 'aprendawp' ),
			'description'	=> __( 'Set slider page 1', 'aprendawp' ),
			'section'		=> 'sec_slider',
			'type'			=> 'dropdown-pages'
		)
	);

	$wp_customize->add_setting(
		'set_slider_button_text1', array(
			'type'					=> 'theme_mod',
			'default'				=> '',
			'sanitize_callback'		=> 'sanitize_text_field'
		)
	);

	$wp_customize->add_control(
		'set_slider_button_text1', array(
			'label'			=> __( 'Button Text for Page 1', 'aprendawp' ),
			'description'	=> __( 'Button Text for Page 1', 'aprendawp' ),
			'section'		=> 'sec_slider',
			'type'			=> 'text'
		)
	);

	$wp_customize->add_setting(
		'set_slider_button_url1', array(
			'type'					=> 'theme_mod',
			'default'				=> '',
			'sanitize_callback'		=> 'esc_url_raw'
		)
	);

	$wp_customize->add_control(
		'set_slider_button_url1', array(
			'label'			=> __( 'URL for Page 1', 'aprendawp' ),
			'description'	=> __( 'URL for Page 1', 'aprendawp' ),
			'section'		=> 'sec_slider',
			'type'			=> 'url'
		)
	);

	$wp_customize->add_setting(
		'set_slider_page2', array(
			'type'					=> 'theme_mod',
			'default'				=> '',
			'sanitize_callback'		=> 'absint'
		)
	);

	$wp_customize->add_control(
		'set_slider_page2', array(
			'label'			=> __( 'Set slider page 2', 'aprendawp' ),
			'description'	=> __( 'Set slider page 2', 'aprendawp' ),
			'section'		=> 'sec_slider',
			'type'			=> 'dropdown-pages'
		)
	);			

	$wp_customize->add_setting(
		'set_slider_button_text2', array(
			'type'					=> 'theme_mod',
			'default'				=> '',
			'sanitize_callback'		=> 'sanitize_text_field'
		)
	);

	$wp_customize->add_control(
		'set_slider_button_text2', array(
			'label'			=> __( 'Button Text for Page 2', 'aprendawp' ),
			'description'	=> __( 'Button Text for Page 2', 'aprendawp' ),
			'section'		=> 'sec_slider',
			'type'			=> 'text'
		)
	);

	$wp_customize->add_setting(
		'set_slider_button_url2', array(
			'type'					=> 'theme_mod',
			'default'				=> '',
			'sanitize_callback'		=> 'esc_url_raw'
		)
	);

	$wp_customize->add_control(
		'set_slider_button_url2', array(
			'label'			=> __( 'URL for Page 2', 'aprendawp' ),
			'description'	=> __( 'URL for Page 2', 'aprendawp' ),
			'section'		=> 'sec_slider',
			'type'			=> 'url'
		)
	);			

	$wp_customize->add_setting(
		'set_slider_page3', array(
			'type'					=> 'theme_mod',
			'default'				=> '',
			'sanitize_callback'		=> 'absint'
		)
	);

	$wp_customize->add_control(
		'set_slider_page3', array(
			'label'			=> __( 'Set slider page 3', 'aprendawp' ),
			'description'	=> __( 'Set slider page 3', 'aprendawp' ),
			'section'		=> 'sec_slider',
			'type'			=> 'dropdown-pages'
		)
	);			

	$wp_customize->add_setting(
		'set_slider_button_text3', array(
			'type'					=> 'theme_mod',
			'default'				=> '',
			'sanitize_callback'		=> 'sanitize_text_field'
		)
	);

	$wp_customize->add_control(
		'set_slider_button_text3', array(
			'label'			=> __( 'Button Text for Page 3', 'aprendawp' ),
			'description'	=> __( 'Button Text for Page 3', 'aprendawp' ),
			'section'		=> 'sec_slider',
			'type'			=> 'text'
		)
	);

	$wp_customize->add_setting(
		'set_slider_button_url3', array(
			'type'					=> 'theme_mod',
			'default'				=> '',
			'sanitize_callback'		=> 'esc_url_raw'
		)
	);

	$wp_customize->add_control(
		'set_slider_button_url3', array(
			'label'			=> __( 'URL for Page 3', 'aprendawp' ),
			'description'	=> __( 'URL for Page 3', 'aprendawp' ),
			'section'		=> 'sec_slider',
			'type'			=> 'url'
		)
	);


	/*------------------*/
	// Home Page Settings

	$wp_customize->add_section(
		'sec_home_page', array(
			'title'			=> __( 'Home Page Products and Blog Settings', 'aprendawp' ),
			'description'	=> __( 'Home Page Section', 'aprendawp' ),
		)
	);	

	if( class_exists( 'WooCommerce' )):

		$wp_customize->add_setting(
			'set_popular_title', array(
				'type' 				=> 'theme_mod',
				'default' 			=> '',
				'sanitize_callback' => 'sanitize_text_field'
			)
		);

		$wp_customize->add_control(
			'set_popular_title', array(
				'label' 		=> __( 'Popular Products Title', 'aprendawp' ),
				'description' 	=> __( 'Popular Products Title', 'aprendawp' ),
				'section' 		=> 'sec_home_page',
				'type' 			=> 'text'
			)
		);

		$wp_customize->add_setting(
			'set_popular_max_num', array(
				'type'					=> 'theme_mod',
				'default'				=> '',
				'sanitize_callback'		=> 'absint'
			)
		);

		$wp_customize->add_control(
			'set_popular_max_num', array(
				'label'			=> __( 'Popular Products Max Number', 'aprendawp' ),
				'description'	=> __( 'Popular Products Max Number', 'aprendawp' ),
				'section'		=> 'sec_home_page',
				'type'			=> 'number'
			)
		);

		$wp_customize->add_setting(
			'set_popular_max_col', array(
				'type'					=> 'theme_mod',
				'default'				=> '',
				'sanitize_callback'		=> 'absint'
			)
		);

		$wp_customize->add_control(
			'set_popular_max_col', array(
				'label'			=> __( 'Popular Products Max Columns', 'aprendawp' ),
				'description'	=> __( 'Popular Products Max Columns', 'aprendawp' ),
				'section'		=> 'sec_home_page',
				'type'			=> 'number'
			)
		);

		$wp_customize->add_setting(
			'set_new_arrivals_title', array(
				'type' 				=> 'theme_mod',
				'default' 			=> '',
				'sanitize_callback' => 'sanitize_text_field'
			)
		);

		$wp_customize->add_control(
			'set_new_arrivals_title', array(
				'label' 		=> __( 'New Arrivals Title', 'aprendawp' ), 
				'description' 	=> __( 'New Arrivals Title', 'aprendawp' ), 
				'section' 		=> 'sec_home_page',
				'type' 			=> 'text'
			)
		);

		$wp_customize->add_setting(
			'set_new_arrivals_max_num', array(
				'type'					=> 'theme_mod',
				'default'				=> '',
				'sanitize_callback'		=> 'absint'
			)
		);

		$wp_customize->add_control(
			'set_new_arrivals_max_num', array(
				'label'			=> __( 'New Arrivals Max Number', 'aprendawp' ), 
				'description'	=> __( 'New Arrivals Max Number', 'aprendawp' ),
				'section'		=> 'sec_home_page',
				'type'			=> 'number'
			)
		);

		$wp_customize->add_setting(
			'set_new_arrivals_max_col', array(
				'type'					=> 'theme_mod',
				'default'				=> '',
				'sanitize_callback'		=> 'absint'
			)
		);

		$wp_customize->add_control(
			'set_new_arrivals_max_col', array(
				'label'			=> __( 'New Arrivals Max Columns', 'aprendawp' ), 
				'description'	=> __( 'New Arrivals Max Columns', 'aprendawp' ),
				'section'		=> 'sec_home_page',
				'type'			=> 'number'
			)
		);

		$wp_customize->add_setting(
		'set_deal_show', array(
			'type'					=> 'theme_mod',
			'default'				=> '',
			'sanitize_callback'		=> 'aprendawp_sanitize_checkbox'
		)
		);

		$wp_customize->add_setting(
			'set_deal_title', array(
				'type' 				=> 'theme_mod',
				'default' 			=> '',
				'sanitize_callback' => 'sanitize_text_field'
			)
		);

		$wp_customize->add_control(
			'set_deal_title', array(
				'label' 		=> __( 'Deal of the Week Title', 'aprendawp' ),
				'description' 	=> __( 'Deal of the Week Title', 'aprendawp' ),
				'section' 		=> 'sec_home_page',
				'type' 			=> 'text'
			)
		);

		$wp_customize->add_control(
			'set_deal_show', array(
				'label'			=> __( 'Show Deal of the Week?', 'aprendawp' ),
				'section'		=> 'sec_home_page',
				'type'			=> 'checkbox'
			)
		);

		$wp_customize->add_setting(
			'set_deal', array(
				'type'					=> 'theme_mod',
				'default'				=> '',
				'sanitize_callback'		=> 'absint'
			)
		);

		$wp_customize->add_control(
			'set_deal', array(
				'label'			=> __( 'Deal of the Week Product ID', 'aprendawp' ),
				'description'	=> __( 'Product ID to Display', 'aprendawp' ),
				'section'		=> 'sec_home_page',
				'type'			=> 'number'
			)
		);

	endif;

	$wp_customize->add_setting(
		'set_blog_title', array(
			'type' 				=> 'theme_mod',
			'default' 			=> '',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);

	$wp_customize->add_control(
		'set_blog_title', array(
			'label' 		=> __( 'Blog Section Title', 'aprendawp' ),
			'description' 	=> __( 'Blog Section Title', 'aprendawp' ),
			'section' 		=> 'sec_home_page',
			'type' 			=> 'text'
		)
	);

}
add_action( 'customize_register', 'aprendawp_customizer' );

function aprendawp_sanitize_checkbox( $checked ){
	return ( ( isset ( $checked ) && true == $checked ) ? true : false );
}