<?php
/**
 * Plugin Name: Ss share
 * Plugin URI: http://wordpress.org/plugins/ss-share/
 * Description: Super simple social share buttons plugin. Most popular social media platforms: facebook, twitter, reddit, linkedin, pinterest, tumblr.
 * Author: shifu
 * Version: 1.1.0
 * Author URI: http://stackflow.cc/
 * Text Domain: ss-share
 */

define( 'SS_SHARE_NAME', 'Ss share' );
define( 'SS_SHARE_DIR', __DIR__ );
define( 'SS_SHARE_URL', plugins_url( '', __FILE__ ) );
define( 'SS_SHARE_TEXT_DOMAIN', 'ss-share' );

function ssShareAutoloader( $class ) {
	if ( strpos( $class, 'ssShare' ) !== false ) {
		$class = str_replace( '\\', '/', str_replace( 'ssShare', null, $class ) );
		$path  = __DIR__ . '/' . $class . '.php';
		if ( is_file( $path ) ) {
			require_once $path;
		}
	}
}

spl_autoload_register( 'ssShareAutoloader' );

( new ssShare\Bootstrap() )->run();