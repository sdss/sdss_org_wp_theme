<?php
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

// Connect to parent theme (Galaxies)
function my_theme_enqueue_styles() {
    if (WP_DEBUG) {    // if this is a dev site, get the full stylesheet, else get the minified stylesheet
        $link_to_stylesheet = get_stylesheet_directory_uri()."/style.css";
    } else {
        $link_to_stylesheet = get_stylesheet_directory_uri()."/style-min.css";
    }

    wp_enqueue_style( 'child-style', $link_to_stylesheet, 
        array( 'galaxis-style' ), 
        wp_get_theme()->get('Version') // this only works if you have Version in the style header
    );
}

function register_secondary_menu() {
    register_nav_menu('menu-2',__( 'Secondary Menu' ));
}
add_action( 'init', 'register_secondary_menu' );


function sdss5_register_sidebar(){
     register_sidebar(array(
         'name' => esc_html__( 'Collaboration Sidebar', 'galaxis' ),
         'id' => 'sidebar-collaboration',
         'description' => esc_html__( 'Collaboration sidebar: Add widgets here.', 'galaxis' ),
         'before_widget' => '<section id="%1$s" class="widget gx-card-content u-b-margin %2$s">',
         'after_widget' => '</aside>',
         'before_title' => '<h3 class="widget-title">',
         'after_title' => '</h3>',
     ));
    register_sidebar(array(
             'name' => esc_html__( 'Instruments Sidebar', 'galaxis' ),
             'id' => 'sidebar-instruments',
             'description' => esc_html__( 'Instruments sidebar: Add widgets here.', 'galaxis' ),
             'before_widget' => '<section id="%1$s" class="widget gx-card-content u-b-margin %2$s">',
             'after_widget' => '</aside>',
             'before_title' => '<h3 class="widget-title">',
             'after_title' => '</h3>',
         ));
    register_sidebar(array(
             'name' => esc_html__( 'Mappers Sidebar', 'galaxis' ),
             'id' => 'sidebar-mappers',
             'description' => esc_html__( 'Mappers sidebar: Add widgets here.', 'galaxis' ),
             'before_widget' => '<section id="%1$s" class="widget gx-card-content u-b-margin %2$s">',
             'after_widget' => '</aside>',
             'before_title' => '<h3 class="widget-title">',
             'after_title' => '</h3>',
         ));
    register_sidebar(array(
             'name' => esc_html__( 'Science Sidebar', 'galaxis' ),
             'id' => 'sidebar-science',
             'description' => esc_html__( 'Science sidebar: Add widgets here.', 'galaxis' ),
             'before_widget' => '<section id="%1$s" class="widget gx-card-content u-b-margin %2$s">',
             'after_widget' => '</aside>',
             'before_title' => '<h3 class="widget-title">',
             'after_title' => '</h3>',
         ));
   register_sidebar(array(
             'name' => esc_html__( 'Data Access Sidebar', 'galaxis' ),
             'id' => 'sidebar-data_access',
             'description' => esc_html__( 'Data Access sidebar: Add widgets here.', 'galaxis' ),
             'before_widget' => '<section id="%1$s" class="widget gx-card-content u-b-margin %2$s">',
             'after_widget' => '</aside>',
             'before_title' => '<h3 class="widget-title">',
             'after_title' => '</h3>',
         ));
   register_sidebar(array(
             'name' => esc_html__( 'MWM Data Sidebar', 'galaxis' ),
             'id' => 'sidebar-mwm',
             'description' => esc_html__( 'MWM Data sidebar: Add widgets here.', 'galaxis' ),
             'before_widget' => '<section id="%1$s" class="widget gx-card-content u-b-margin %2$s">',
             'after_widget' => '</aside>',
             'before_title' => '<h3 class="widget-title">',
             'after_title' => '</h3>',
         ));
   register_sidebar(array(
             'name' => esc_html__( 'LVM Data Sidebar', 'galaxis' ),
             'id' => 'sidebar-lvm',
             'description' => esc_html__( 'LVM Data sidebar: Add widgets here.', 'galaxis' ),
             'before_widget' => '<section id="%1$s" class="widget gx-card-content u-b-margin %2$s">',
             'after_widget' => '</aside>',
             'before_title' => '<h3 class="widget-title">',
             'after_title' => '</h3>',
         ));
   register_sidebar(array(
             'name' => esc_html__( 'BHM Data Sidebar', 'galaxis' ),
             'id' => 'sidebar-bhm',
             'description' => esc_html__( 'BHM Data sidebar: Add widgets here.', 'galaxis' ),
             'before_widget' => '<section id="%1$s" class="widget gx-card-content u-b-margin %2$s">',
             'after_widget' => '</aside>',
             'before_title' => '<h3 class="widget-title">',
             'after_title' => '</h3>',
         ));
   register_sidebar(array(
             'name' => esc_html__( 'Targeting Sidebar', 'galaxis' ),
             'id' => 'sidebar-targeting',
             'description' => esc_html__( 'Software sidebar: Add widgets here.', 'galaxis' ),
             'before_widget' => '<section id="%1$s" class="widget gx-card-content u-b-margin %2$s">',
             'after_widget' => '</aside>',
             'before_title' => '<h3 class="widget-title">',
             'after_title' => '</h3>',
         ));
   register_sidebar(array(
             'name' => esc_html__( 'Software Sidebar', 'galaxis' ),
             'id' => 'sidebar-software',
             'description' => esc_html__( 'Software sidebar: Add widgets here.', 'galaxis' ),
             'before_widget' => '<section id="%1$s" class="widget gx-card-content u-b-margin %2$s">',
             'after_widget' => '</aside>',
             'before_title' => '<h3 class="widget-title">',
             'after_title' => '</h3>',
         ));
   register_sidebar(array(
             'name' => esc_html__( 'Tutorials Sidebar', 'galaxis' ),
             'id' => 'sidebar-tutorials',
             'description' => esc_html__( 'Tutorials sidebar: Add widgets here.', 'galaxis' ),
             'before_widget' => '<section id="%1$s" class="widget gx-card-content u-b-margin %2$s">',
             'after_widget' => '</aside>',
             'before_title' => '<h3 class="widget-title">',
             'after_title' => '</h3>',
         ));
   register_sidebar(array(
             'name' => esc_html__( 'Help Sidebar', 'galaxis' ),
             'id' => 'sidebar-help',
             'description' => esc_html__( 'Help sidebar: Add widgets here.', 'galaxis' ),
             'before_widget' => '<section id="%1$s" class="widget gx-card-content u-b-margin %2$s">',
             'after_widget' => '</aside>',
             'before_title' => '<h3 class="widget-title">',
             'after_title' => '</h3>',
         ));
    register_sidebar(array(
             'name' => esc_html__( 'Science Results Sidebar', 'galaxis' ),
             'id' => 'sidebar-science-results',
             'description' => esc_html__( 'Science Results sidebar: Add widgets here.', 'galaxis' ),
             'before_widget' => '<section id="%1$s" class="sidebar-science-results widget gx-card-content u-b-margin %2$s">',
             'after_widget' => '</aside>',
             'before_title' => '<h3 class="widget-title">',
             'after_title' => '</h3>',
         ));

    register_sidebar(array(
             'name' => esc_html__( 'VAC Search Form', 'galaxis' ),
             'id' => 'sidebar-vac-search',
             'description' => esc_html__( 'VAC Search Form: Add widgets here.', 'galaxis' ),
             'before_widget' => '<section id="%1$s" class="sidebar-vac widget gx-card-content u-b-margin %2$s">',
             'after_widget' => '</aside>',
             'before_title' => '<h3 class="widget-title">',
             'after_title' => '</h3>',
         ));    

    register_sidebar(array(
             'name' => esc_html__( 'Search widget', 'galaxis' ),
             'id' => 'search-widget',
             'description' => esc_html__( 'Search widget: Add widgets here.', 'galaxis' ),
             //'before_widget' => '<section id="%1$s" class="widget gx-card-content u-b-margin %2$s">',
             'before_widget' => '<section id="%1$s" class="widget %2$s">',
             'after_widget' => '</aside>',
             'before_title' => '<h3 class="widget-title">',
             'after_title' => '</h3>',
         ));

}

function sdss5_load_sidebar_as_page_toc( $attrs = '' ) {

    global $wp_registered_sidebars;
    $args = shortcode_atts( array(
        'thesidebar' => 1
    ), $attrs );
    $output = '<div class="page-toc">';

    if ( is_int( $attrs['thesidebar'] ) ) {
        $sidebar_name = "sidebar-$thesidebar";
    } else {
        $sidebar_name = sanitize_title( $attrs['thesidebar'] );
        foreach ( (array) $wp_registered_sidebars as $key => $value ) {
            if ( sanitize_title( $value['name'] ) === $attrs['thesidebar'] ) {
                $sidebar_name = $key;
                break;
            }
        }
    }
    //print_r(get_option(sidebars_widgets));
    ob_start();
    dynamic_sidebar($sidebar_name);
    $sidebar_html = htmlentities(ob_get_contents());
    ob_end_clean();
/*
    $headerstartpos = strpos($sidebar_html, htmlentities("<h"));
    $headerendpos = strpos(substr($sidebar_html, $headerstartpos), htmlentities("</aside>"));

    $output .= html_entity_decode(substr($sidebar_html, $headerstartpos, $headerendpos));

    $ulstartpos = strpos($sidebar_html, htmlentities("<ul>"));

    $ulendpos = strpos(substr($sidebar_html, $ulstartpos), htmlentities("</aside>"));

    $output .= html_entity_decode(substr($sidebar_html, $ulstartpos, $ulendpos));
    */
    //$listendpos = strpos($sidebar_html, htmlentities("</aside>"));

    //$ulbefore = substr($sidebar_html, 0, $ulpos);
    //$ulbeyond = substr($sidebar_html, $ulpos);

    //$listasidepos = $headerstartpos + strpos($ulbeyond, htmlentities("</aside>"));

    //$output .= substr($sidebar_html, $headerstartpos, $listasidepos);
    $output .= $sidebar_html;
    $output .= "</div>";
    return $output;
}


add_action( 'widgets_init', 'sdss5_register_sidebar' );
add_shortcode('load_sidebar_as_page_toc', 'sdss5_load_sidebar_as_page_toc');