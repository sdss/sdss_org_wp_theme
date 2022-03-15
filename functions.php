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

//    echo $ancestor_array[count($ancestor_array)];
/*    foreach ($ancestor_array as $this_ancestor) {
        echo "<p>".get_the_title($this_ancestor)."</p>";
        //echo "<p>".get_the_title($this_ancestor)."</p>";
    } */
/*    echo '<a href="'.home_url().'" rel="nofollow">Home</a>';
    if (is_category() || is_single()) {
        echo '>>';
        the_title();
    } elseif (is_page()) {
        echo " >> ";
        echo the_title();
    } */
}