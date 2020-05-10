<?php

if ( !defined( 'ABSPATH' ) ) {
    die( 'Direct access forbidden.' );
}

/**
 * Autoload function, that include all theme classes.
 */
load_template( get_template_directory() . '/inc/classes/olympus-class-autoload.php' );

Olympus_Core::get_instance()->init();

function my_function_admin_bar($content) {
    return ( current_user_can("administrator") ) ? $content : false;
}
add_filter( 'show_admin_bar' , 'my_function_admin_bar');

