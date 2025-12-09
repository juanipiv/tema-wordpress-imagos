<?php

    add_theme_support('post-thumbnails');

    //------------------------------------------------- ATTACH SCRIPTS --------------------------------------------//
    function attach_scripts(){
        //------------------------------------------ CSS Stylesheet ----------------------------------//
        
        wp_enqueue_style('main-css', get_stylesheet_uri());
        wp_enqueue_style('theme-css', get_template_directory_uri().'/assets/css/style.css');
        wp_enqueue_style('bootstrap.min.css', get_template_directory_uri().'/assets/lib/bootstrap/dist/css/bootstrap.min.css');
        wp_enqueue_style('color-scheme', get_template_directory_uri().'/assets/css/colors/default.css');
        wp_enqueue_style('animate-css', get_template_directory_uri().'/assets/lib/animate.css/animate.css');
        wp_enqueue_style('font-awesome', get_template_directory_uri().'/assets/lib/components-font-awesome/css/font-awesome.min.css');
        wp_enqueue_style('line-font', get_template_directory_uri().'/assets/lib/et-line-font/et-line-font.css');
        wp_enqueue_style('flexslider', get_template_directory_uri().'/assets/lib/flexslider/flexslider.css');
        wp_enqueue_style('carousel-min', get_template_directory_uri().'/assets/lib/owl.carousel/dist/assets/owl.carousel.min.css');
        wp_enqueue_style('carousel', get_template_directory_uri().'/assets/lib/owl.carousel/dist/assets/owl.theme.default.min.css');
        wp_enqueue_style('magnific-popup', get_template_directory_uri().'/assets/lib/magnific-popup/dist/magnific-popup.css');
        wp_enqueue_style('simple-text-rotator', get_template_directory_uri().'/assets/lib/simple-text-rotator/simpletextrotator.css');

       //---------------------------------------  JS Scripts -----------------------------------------//
    
        wp_register_script('jquery', get_template_directory_uri().'/assets/js/jquery.js', null, null, true);
        wp_enqueue_script('jquery');
    
        wp_register_script('bootstrap', get_template_directory_uri().'/assets/lib/bootstrap/dist/js/bootstrap.min.js', null, null, true);
        wp_enqueue_script('booststrap');

        wp_register_script('wow', get_template_directory_uri().'/assets/lib/wow/dist/wow.js', null, null, true);
        wp_enqueue_script('wow');

        wp_register_script('jquery.mb.ytplayer', get_template_directory_uri().'/assets/lib/jquery.mb.ytplayer/dist/jquery.mb.YTPlayer.js', null, null, true);
        wp_enqueue_script('jquery.mb.ytplayer');

        wp_register_script('isotope', get_template_directory_uri().'/assets/lib/isotope/dist/isotope.pkgd.js', null, null, true);
        wp_enqueue_script('isotope');

        wp_register_script('imagesloaded', get_template_directory_uri().'/assets/lib/imagesloaded/imagesloaded.pkgd.js', null, null, true);
        wp_enqueue_script('imagesloaded');

        wp_register_script('flexslider', get_template_directory_uri().'/assets/lib/flexslider/jquery.flexslider.js', null, null, true);
        wp_enqueue_script('flexslider');

        wp_register_script('owl.carousel', get_template_directory_uri().'/assets/lib/owl.carousel/dist/owl.carousel.min.js', null, null, true);
        wp_enqueue_script('owl.carousel');

        wp_register_script('smoothscroll', get_template_directory_uri().'/assets/lib/smoothscroll.js', null, null, true);
        wp_enqueue_script('smoothscroll');

        wp_register_script('magnific-popup', get_template_directory_uri().'/assets/lib/magnific-popup/dist/jquery.magnific-popup.js', null, null, true);
        wp_enqueue_script('magnific-popup');

        wp_register_script('simple-text-rotator', get_template_directory_uri().'/assets/lib/simple-text-rotator/jquery.simple-text-rotator.min.js', null, null, true);
        wp_enqueue_script('simple-text-rotator');

        wp_register_script('plugins', get_template_directory_uri().'/assets/js/plugins.js', null, null, true);
        wp_enqueue_script('plugins');

        wp_register_script('main', get_template_directory_uri().'/assets/js/main.js', null, null, true);
        wp_enqueue_script('main');


    
    }
    /**
     * Retrieves a page object based on the title of a page
     * @param $title String Page Title
     * @return $page Object Page
     */

    add_action("wp_enqueue_scripts", "attach_scripts");

    function get_page_object( $title ) {

        $args = array(
            'post_type' => 'page', /* Solo queremos post tipo página */
            'title' => $title, /* Título de la página suministrado como parametro de entrada */
            'posts_per_page' => 1, /* Solo queremos una tupla, la que coincida con el titulo de la pagina */
            'post_status' => 'publish', /* La pagina debe estar publicada */
        );

        $query = new WP_Query( $args );

        if ( !empty( $query->post) ) {
            $page = $query->post;
        } else {
            $page = null;
        }
        return $page;   
    }

    /**
     * Retrieves a page object based on the title of a page
     * @return $lenght Number Number of words displayed in a post
     */

    function my_excerpt_length() {
        
        if (is_home() && !is_front_page()){ /* si estoy en index.php */
            $lenght = 25;
        }

        return $lenght;
    }

    add_filter('excerpt_lenght', 'my_excerpt_length');

    /**
     * Sidebar Widgets Zone
     */

    function register_widgets_zone() {
        $args = array(
            'name' => 'Sidebar Widgets',
            'id' => 'sidebar-widgets',
            'description' => 'Sidebar Widgets Zone',            
        );
        register_sidebar( $args );
    }
    add_action('widgets_init', 'register_widgets_zone');