<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Galaxis
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<div class="columns__md-4">
	<div class="sidebar__inner">
		<?php do_action( 'galaxis_before_main_sidebar' ); ?>

		<aside id="secondary" class="widget-area sidebar-1 h-center-upto-md" aria-label="<?php esc_attr_e( 'Sidebar', 'galaxis' ); ?>">
			<?php 
			$this_page_url = home_url($wp -> request);
			$sidebar_values = array();
			foreach ( $GLOBALS['wp_registered_sidebars'] as $this_sidebar ) {
				array_push($sidebar_values, substr(ucwords($this_sidebar['id']), strpos(ucwords($this_sidebar['id']), '-')+1));
			}
			$which = explode('/',substr($this_page_url,strpos($this_page_url, get_site_url())+strlen(get_site_url())+1))[0];
			if ($which == 'dr18') {  // if it's a second-level page under dr18 (e.g. VAC page)
				$which = explode('/',substr($this_page_url,strpos($this_page_url, get_site_url())+strlen(get_site_url())+1))[1];
			}
			if (preg_match('/(dr\d|data)/i',$which)) {
				$which = explode("/",substr($this_page_url,strpos($this_page_url, get_site_url())+strlen(get_site_url())+1))[1];
			}

			if (in_array($which, $sidebar_values)) {
				$sidebar_to_load = 'sidebar-'.$which;
				// show dr19 sidebar if one exists and user is logged in
				$dr19_sidebar_options = array('mwm', 'bhm', 'data_access', 'software', 'targeting');
				if ( (in_array($which, $dr19_sidebar_options)) & (is_user_logged_in()) ) {
					$sidebar_to_load .= '-dr19';
				}
			} else {
				dynamic_sidebar( 'science-sidebar' );
				$sidebar_to_load = 'sidebar-1';
			}

			if ((strpos($this_page_url, 'value-added-catalogs') > 0) & (!strpos($_SERVER['REQUEST_URI'], 'vac_id'))) {  // if this is the VACs index page, show the search widget as a sidebar
				dynamic_sidebar( 'sidebar-vac-search' );
			}
			dynamic_sidebar( $sidebar_to_load ); 

			
			/*if (array_reverse(explode('/',$this_page_url))[0] == 'science') { */ ?>
				<!--<div class='sidebar-toc'>-->
				<?php /*dynamic_sidebar( 'science-results-sidebar' );*/ ?>
				<!--</div>-->
			<?php /*}*/ ?>
		</aside><!-- #secondary -->

		<?php do_action( 'galaxis_after_main_sidebar' ); ?>
	</div><!-- .sidebar__inner -->
</div><!-- .columns__md-4 -->
