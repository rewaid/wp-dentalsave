<?php

function dentalsave_child_styles() {
    wp_enqueue_style( 'dentalsave-fa', '//maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css' );
    wp_enqueue_script( 'dentalsave-inputmask', get_stylesheet_directory_uri() . '/js/jquery.inputmask.bundle.js', array('jquery'), '1.0', true );
    wp_enqueue_script( 'dentalsave-script', get_stylesheet_directory_uri() . '/js/custom.js', array('jquery'), '1.0', true );
    
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

function login_redirect()
{
    $cookie_name = 'user';
    if( isset($_COOKIE[$cookie_name]) ) //&& !is_page('User Dashboard')
    {
        if ( !is_page('User Dashboard') ) {
            wp_redirect( home_url( '/user-dashboard/' ) );
            exit();
        }
    } else {
        if (is_page('User Dashboard')) {
            wp_redirect( home_url( '/dental-plans-member-login/' ) );
        }
    }
}
add_action( 'template_redirect', 'login_redirect' );

/*------------------------------------------------------------*/
/* Dental Saving Fee Table
/*------------------------------------------------------------*/

function dentalsave_fee_table_func() {
    $html = '<table class="blue-table">
            <tr>
                <th>Code</th>
                <th>Procedure</th>
                <th class="vc_hidden-sm vc_hidden-xs">Avg Fee</th>
                <th class="vc_hidden-sm vc_hidden-xs">Member Fee</th>
                <th class="vc_hidden-sm vc_hidden-xs">Your Savings</th>
            </tr>
            <tr>
                <td>D0120</td>
                <td>periodic oral evaluation</td>
                <td class="vc_hidden-sm vc_hidden-xs">$52.00</td>
                <td class="vc_hidden-sm vc_hidden-xs">$28.50</td>
                <td class="vc_hidden-sm vc_hidden-xs">$23.50</td>
            </tr>
            <tr>
                <td>D0210</td>
                <td>x rays, intraoral complete series (including bitewings)</td>
                <td class="vc_hidden-sm vc_hidden-xs">$137.00</td>
                <td class="vc_hidden-sm vc_hidden-xs">$75.50</td>
                <td class="vc_hidden-sm vc_hidden-xs">$61.50</td>
            </tr>
            <tr>
                <td>D1110</td>
                <td>prophylaxis, adult (cleaning)</td>
                <td class="vc_hidden-sm vc_hidden-xs">$93.00</td>
                <td class="vc_hidden-sm vc_hidden-xs">$51.00</td>
                <td class="vc_hidden-sm vc_hidden-xs">$42.00</td>
            </tr>
            <tr>
                <td>D2332</td>
                <td>resin filling  (anterior, 3 surfaces)</td>
                <td class="vc_hidden-sm vc_hidden-xs">$255.00</td>
                <td class="vc_hidden-sm vc_hidden-xs">$140.50</td>
                <td class="vc_hidden-sm vc_hidden-xs">$114.50</td>
            </tr>
            <tr>
                <td>D2750</td>
                <td>crown - porcelain fused to high noble metal</td>
                <td class="vc_hidden-sm vc_hidden-xs">$1,170.00</td>
                <td class="vc_hidden-sm vc_hidden-xs">$643.50</td>
                <td class="vc_hidden-sm vc_hidden-xs">$526.50</td>
            </tr>
            <tr>
                <td>D2962</td>
                <td>labial veneer (porcelain laminate) - laboratory</td>
                <td class="vc_hidden-sm vc_hidden-xs">$1,191.00</td>
                <td class="vc_hidden-sm vc_hidden-xs">$655.00</td>
                <td class="vc_hidden-sm vc_hidden-xs">$536.00</td>
            </tr>
            <tr>
                <td>D3330</td>
                <td>endodontic therapy, molar (excluding final restoration)</td>
                <td class="vc_hidden-sm vc_hidden-xs">$1,050.00</td>
                <td class="vc_hidden-sm vc_hidden-xs">$577.50</td>
                <td class="vc_hidden-sm vc_hidden-xs">$472.50</td>
            </tr>
            <tr>
                <td>D6000-D6199</td>
                <td >implant services</td>
                <td class="vc_hidden-sm vc_hidden-xs" colspan="3">25% OFF</td>
            </tr>
            <tr>
                <td>D7210</td>
                <td>surgical removal of erupted tooth requiring removal of bone and/or sectioning of tooth, and including elevation of mucoperiosteal flap if indicated</td>
                <td class="vc_hidden-sm vc_hidden-xs">$285.00</td>
                <td class="vc_hidden-sm vc_hidden-xs">$157.00</td>
                <td class="vc_hidden-sm vc_hidden-xs">$128.00</td>
            </tr>
            <tr>
                <td>D8080</td>
                <td>comprehensive orthodontic treatment of the adolescent dentition</td>
                <td class="vc_hidden-sm vc_hidden-xs" colspan="3">25% OFF</td>
            </tr>
        </table>';

    return $html;
}
add_shortcode('dentalsave_fee_table', 'dentalsave_fee_table_func');