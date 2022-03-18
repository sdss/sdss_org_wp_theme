<?php
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

// Connect to parent theme (Galaxies)
function my_theme_enqueue_styles() {
    wp_enqueue_style( 'child-style', get_stylesheet_uri(),
        array( 'galaxis-style' ), 
        wp_get_theme()->get('Version') // this only works if you have Version in the style header
    );
}

function get_breadcrumbs() {
   $this_page = get_post();
    

   //echo "<li><a href='".get_home_url()."'>Home</a></li>";

    $ancestor_array = get_post_ancestors($this_page);
    $ancestor_array = array_reverse($ancestor_array);

    if (count($ancestor_array) >= 1) {
       echo "<ul>";
        for ($i = 0; $i < count($ancestor_array); $i++) {
            echo "<li>";
            echo "<a href='".get_page_link($ancestor_array[$i])."'>";
            echo get_the_title($ancestor_array[$i]);
            echo "</a>";
            echo "</li>";
        }
        echo "<li><strong>";
        echo get_the_title();
        echo "</strong></li>";
        echo "</ul>";
    }
}

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
             'name' => esc_html__( 'Science Results Sidebar', 'galaxis' ),
             'id' => 'sidebar-science-results',
             'description' => esc_html__( 'Science Results sidebar: Add widgets here.', 'galaxis' ),
             'before_widget' => '<section id="%1$s" class="widget gx-card-content u-b-margin %2$s">',
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

add_action( 'widgets_init', 'sdss5_register_sidebar' );