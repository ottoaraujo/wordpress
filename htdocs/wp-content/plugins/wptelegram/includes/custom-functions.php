<?php
if ( ! defined( 'ABSPATH' ) ) { 
    exit; // Exit if accessed directly
}

/**
 * This file contains the hooks and callback functions
 * That require higher higher PHP version
 * than what is supported by WordPress
 */

/**
 * Prevent double posting by WP Telegram
 * triggered by other plugin(s)
 *
 * @since 1.9.1
 */
add_action( 'wptelegram_post_finish', function ( $post ) {
	add_filter( 'wptelegram_filter_post', function ( $next_post ) use ( $post ) {
		if ( $post->ID === $next_post->ID ) {
			return false;
		}
		return $next_post;
	}, 10, 1 );
}, 10, 1 );