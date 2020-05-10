<?php

/* -------------------------------------------------------
 Enqueue CSS from child theme style.css
-------------------------------------------------------- */


function crum_child_css()
{
    wp_enqueue_style('child-style', get_stylesheet_uri());

}


add_action('wp_enqueue_scripts', 'crum_child_css', 99);


/* -------------------------------------------------------
 You can add your custom functions below
-------------------------------------------------------- */

function register_login()
{

    $html = '
                
                <a href="#" 
                class="get-started btn btn-md" 
                data-toggle="modal" 
                data-target="#registration-login-form-popup">
               Demarrer avec Bojelo</a>
                 <!-- <a id="get-started" href="" class="vc_general vc_btn3 vc_btn3-size-btn-md
                vc_btn3-shape-rounded vc_btn3-style-flat btn-md vc_btn3-color-grey"></a> -!>';
    //    if (is_user_logged_in() === false) {
    echo $html;
    //    }

}

add_shortcode('register-login-link', 'register_login');

function get_started_button()
{

    $html = '
                <a href="#" 
                class="get-started get-started-2 btn btn-md" 
                data-toggle="modal" 
                data-target="#registration-login-form-popup">
               Demarrer avec Bojelo</a>
                 <!-- <a id="get-started" href="" class="vc_general vc_btn3 vc_btn3-size-btn-md
                vc_btn3-shape-rounded vc_btn3-style-flat btn-md vc_btn3-color-grey"></a> -!>';
    if (is_user_logged_in() === false) {
        echo $html;
        //    }

    }

    add_shortcode('get-started-link', 'get_started_button');

    add_filter('bp_email_set_reply_to', function ($retval, $email_address) {
        // Wipe out Reply-to email header if it matches the admin email address.
        if (bp_get_option('admin_email') === $email_address) {
            $retval = new BP_Email_Recipient('');
        }

        return $retval;
    }, 10, 2);

}

//Referal link

//refferer field to the registration form using register_form hook
add_action('register_form', 'show_reff_field');
function show_reff_field()
{ ?>
    <input id="ref" type="text" tabindex="20" size="25" value="<?php if (isset($_GET['ref'])) {
        echo $_GET['ref'];
    } ?>" name="ref" readonly="readonly"/>
    <?php
}

