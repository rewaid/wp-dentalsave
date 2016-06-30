<?php

function dentalsave_child_styles() {
    wp_enqueue_style( 'dentalsave-fa', '//maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css' );
}
add_action( 'wp_enqueue_scripts', 'dentalsave_child_styles', 20 );

add_action( 'init', 'dental_rewrite_rule' );
function dental_rewrite_rule()
{
    // Remember to flush the rules once manually after you added this code!
    add_rewrite_rule(
        // The regex to match the incoming URL
        'dentist-info/([^/]+)/?',
        // The resulting internal URL: `index.php` because we still use WordPress
        // `pagename` because we use this WordPress page
        // `designer_slug` because we assign the first captured regex part to this variable
        'index.php?pagename=dentist-info&dentist_info=$matches[1]',
        // This is a rather specific URL, so we add it to the top of the list
        // Otherwise, the "catch-all" rules at the bottom (for pages and attachments) will "win"
        'top' );
}

add_filter( 'query_vars', 'dental_query_vars' );
function dental_query_vars( $query_vars )
{
    $query_vars[] = 'dentist_info';
    return $query_vars;
}