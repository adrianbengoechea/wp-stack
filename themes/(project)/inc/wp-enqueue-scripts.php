<?php

function load_scripts(){

    if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {

        wp_register_script('aos', get_template_directory_uri() . '/vendor/js/aos.min.js', array('jquery'), _SITE_VERSION); // Custom scripts
        wp_enqueue_script('aos'); // Enqueue it!

        wp_register_script('lity', get_template_directory_uri() . '/vendor/js/lity.min.js', array(), _SITE_VERSION); // Custom scripts
        wp_enqueue_script('lity'); // Enqueue it!

        wp_register_script('matchHeight', get_template_directory_uri() . '/vendor/js/matchHeight.min.js', array(), _SITE_VERSION); // Custom scripts
        wp_enqueue_script('matchHeight'); // Enqueue it!

        // wp_register_script('micromodal', get_template_directory_uri() . '/vendor/js/micromodal.min.js', array(), _SITE_VERSION); // Custom scripts
        // wp_enqueue_script('micromodal'); // Enqueue it!

        wp_register_script('popper', get_template_directory_uri() . '/vendor/js/popper.min.js', array(), _SITE_VERSION); // Custom scripts
        wp_enqueue_script('popper'); // Enqueue it!

        // wp_register_script('simplebar', get_template_directory_uri() . '/vendor/js/simplebar.min.js', array(), _SITE_VERSION); // Custom scripts
        // wp_enqueue_script('simplebar'); // Enqueue it!

        wp_register_script('slick-slider', get_template_directory_uri() . '/vendor/js/slick.min.js', array(), _SITE_VERSION); // Custom scripts
        wp_enqueue_script('slick-slider'); // Enqueue it!

        wp_register_script('parallax', get_template_directory_uri() . '/vendor/js/parallax.min.js', array(), _SITE_VERSION); // Custom scripts
        wp_enqueue_script('parallax'); // Enqueue it!

        wp_register_script('svg-loader', get_template_directory_uri() . '/vendor/js/svg-loader.min.js', array(), _SITE_VERSION); // Custom scripts
        wp_enqueue_script('svg-loader'); // Enqueue it!

        wp_register_script('bootstrap', get_template_directory_uri() . '/vendor/js/bootstrap.min.js', array(), _SITE_VERSION); // Custom scripts
        wp_enqueue_script('bootstrap'); // Enqueue it!

        wp_register_script('jquery-validate', get_template_directory_uri() . '/vendor/js/jquery.validate.min.js', array('jquery'), _SITE_VERSION); // Custom scripts
        wp_enqueue_script('jquery-validate'); // Enqueue it!


        wp_register_script('main', get_template_directory_uri() . '/assets/js/main.js', array(), _SITE_VERSION); // Custom scripts
        wp_enqueue_script('main'); // Enqueue it!

        wp_register_script('custom', get_template_directory_uri() . '/assets/js/custom.js', array(), _SITE_VERSION); // Custom scripts
        wp_enqueue_script('custom'); // Enqueue it!

    }

}

function load_styles(){
    
    wp_register_style('normalize', get_template_directory_uri() . '/vendor/css/normalize.min.css', array(), _SITE_VERSION, 'all');
    wp_enqueue_style('normalize'); // Enqueue it!

    // wp_register_style('micromodal', get_template_directory_uri() . '/vendor/css/micromodal.min.css', array(), _SITE_VERSION, 'all');
    // wp_enqueue_style('micromodal'); // Enqueue it!

    wp_register_style('aos', get_template_directory_uri() . '/vendor/css/aos.min.css', array(), _SITE_VERSION, 'all');
    wp_enqueue_style('aos'); // Enqueue it!

    wp_register_style('lity', get_template_directory_uri() . '/vendor/css/lity.min.css', array(), _SITE_VERSION, 'all');
    wp_enqueue_style('lity'); // Enqueue it!

    wp_register_style('slick-slider', get_template_directory_uri() . '/vendor/css/slick.min.css', array(), _SITE_VERSION, 'all');
    wp_enqueue_style('slick-slider'); // Enqueue it!

    // wp_register_style('simplebar', get_template_directory_uri() . '/vendor/css/simplebar.min.css', array(), _SITE_VERSION, 'all');
    // wp_enqueue_style('simplebar'); // Enqueue it!

    // wp_register_style('bulma', get_template_directory_uri() . '/vendor/css/bulma.min.css', array(), _SITE_VERSION, 'all');
    // wp_enqueue_style('bulma'); // Enqueue it!

    wp_register_style('bootstrap', get_template_directory_uri() . '/vendor/css/bootstrap.min.css', array(), null, 'all');
    wp_enqueue_style('bootstrap'); // Enqueue it!

    
    
    wp_register_style('main', get_template_directory_uri() . '/assets/css/main.css', array(), _SITE_VERSION, 'all');
    wp_enqueue_style('main'); // Enqueue it!

    wp_register_style('custom', get_template_directory_uri() . '/assets/css/custom.css', array(), _SITE_VERSION, 'all');
    wp_enqueue_style('custom'); // Enqueue it!

}

add_action('init', 'load_scripts'); // Add Custom Scripts to wp_head
add_action('wp_enqueue_scripts', 'load_styles'); // Add Theme Stylesheet