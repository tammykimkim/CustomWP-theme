<?php
/**
 * MN Flow compat functionality.
 */

/**
 * Prevent switching to MN Flow old versions of WordPress. Switches
 * to the default theme.
 */
function mn_flow_switch_theme() {
	switch_theme( WP_DEFAULT_THEME, WP_DEFAULT_THEME );
	unset( $_GET['activated'] );
	add_action( 'admin_notices', 'mn_flow_upgrade_notice' );
}
add_action( 'after_switch_theme', 'mn_flow_switch_theme' );

/**
 * Prints an update nag after an unsuccessful attempt to switch to
 * MN Flow WordPress versions prior to 3.6.
 */
function mn_flow_upgrade_notice() {
	$message = sprintf( __( 'MN Flow requires at least WordPress version 3.6. You are running version %s. Please upgrade and try again.', 'mn_flow' ), $GLOBALS['wp_version'] );
	printf( '<div class="error"><p>%s</p></div>', $message );
}

/**
 * Prevents the Customizer from being loaded on WordPress versions prior to 3.6.
 */
function mn_flow_customize() {
	wp_die( sprintf( __( 'MN Flow requires at least WordPress version 3.6. You are running version %s. Please upgrade and try again.', 'mn_flow' ), $GLOBALS['wp_version'] ), '', array(
		'back_link' => true,
	) );
}
add_action( 'load-customize.php', 'mn_flow_customize' );

/**
 * Prevents the Theme Preview from being loaded on WordPress versions prior to 3.4.
 */
function mn_flow_preview() {
	if ( isset( $_GET['preview'] ) ) {
		wp_die( sprintf( __( 'MN Flow requires at least WordPress version 3.6. You are running version %s. Please upgrade and try again.', 'mn_flow' ), $GLOBALS['wp_version'] ) );
	}
}
add_action( 'template_redirect', 'mn_flow_preview' );