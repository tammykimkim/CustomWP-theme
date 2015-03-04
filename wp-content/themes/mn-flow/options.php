<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet
	$themename = wp_get_theme();
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option( 'optionsframework' );
	$optionsframework_settings['id'] = $themename;
	update_option( 'optionsframework', $optionsframework_settings );
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'options_framework_theme'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {

	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/images/';

	$options = array();

	// Appearance
	$options[] = array(
		'name' => __('Appearance', 'mn_flow'),
		'type' => 'heading');

		$options[] = array(
			'name' => __('Colorpicker', 'mn_flow'),
			'desc' => __('Select the predominant color of website', 'mn_flow'),
			'id' => 'mn_flow_basic_color_theme',
			'std' => '#a50e43',
			'type' => 'color' );

		$options[] = array(
			'name' => __('Title background color', 'mn_flow'),
			'desc' => __('Apply the predominant color as the background of the title of the site', 'mn_flow'),
			'id' => 'mn_flow_title_background_color',
			'type' => 'checkbox' );

		$options[] = array(
			'name' => __('Select a Number', 'mn_flow'),
			'desc' => __('Number of recent posts featured on Home Page', 'mn_flow'),
			'id' => 'mn_flow_featured_number_posts',
			'std' => '6',
			'type' => 'select',
			'options' => array( '0' => '0', '3' => '3', '6' => '6', '9' => '9', '12' => '12', ));

	// Content	
	$options[] = array(
		'name' => __('Content', 'mn_flow'),
		'type' => 'heading');

		$options[] = array(
			'name' => __('Archives content mode', 'mn_flow'),
			'desc' => __('Select the archive content mode', 'mn_flow'),
			'id' => 'mn_flow_archive_content_mode',
			'std' => '0',
			'type' => 'radio',
			'options' => array( '0' => __('Show content excerpt','mn_flow'), '1' => __('Show full content','mn_flow') ));

	return $options;
}