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
			$which_section = strtolower(trim(explode('/',substr($this_page_url,strpos($this_page_url, get_site_url())+strlen(get_site_url())+1))[0]));
			if ($which_section == 'data') {
				$which_section = 'dr'.CURRENT_DR;
			}

			// If this is the tutorial index page, load the tutorial search sidebar
			if ((strpos($this_page_url, 'tutorials') > 0) & (strpos($this_page_url, 'python') > 0) & (!strpos($_SERVER['REQUEST_URI'], 'id'))) {  // if this is the Python tutorials index page, show the tutorial search widget as a sidebar
				dynamic_sidebar( 'sidebar-tutorial-search' );
			}

			
			if (preg_match('/(dr\d)/i',$which_section)) {
				$which_subsection = strtolower(trim(explode('/',substr($this_page_url,strpos($this_page_url, get_site_url())+strlen(get_site_url())+1))[1]));
				$which_sidebar = 'sidebar-'.$which_subsection;
				if ($which_subsection == 'software') {   // software section has multiple possible menus depending on which set of pages
					$navigate_to_page_array = explode('/',substr($this_page_url,strpos($this_page_url, get_site_url())+strlen(get_site_url())+1));
					if (count($navigate_to_page_array) > 2) {
						$which_set_of_pages = strtolower(trim(explode('/',substr($this_page_url,strpos($this_page_url, get_site_url())+strlen(get_site_url())+1))[2]));
						$possible_pagesets = array("pipelines", "packages", "resources");
						if (in_array($which_set_of_pages, $possible_pagesets)) {
							$which_sidebar .= '-'.$which_set_of_pages;
						}
					}
				}

				
				if (intval(substr($which_section,2,4)) < CURRENT_DR) {
					$which_sidebar .= '-dr'.intval(substr($which_section,2,4));
				} 
				
			} else {
				$which_sidebar = 'sidebar-'.$which_section;
			}
			// check to see if sidebar is found
			$found_sidebar = false;
			foreach ($GLOBALS['wp_registered_sidebars'] as $possible_sidebar) {
				if ($which_sidebar == $possible_sidebar['id']) {
					$found_sidebar = true;
					dynamic_sidebar($which_sidebar);
					break;
				}
			}
			if (!$found_sidebar) {
				//dynamic_sidebar( 'science-sidebar' );
				dynamic_sidebar('sidebar-news');
			}

			// ADDITIONALLY: if this is the VAC index page, load the VAC search sidebar
			if ((strpos($this_page_url, 'value-added-catalogs') > 0) & (!strpos($_SERVER['REQUEST_URI'], 'vac_id'))) {  // if this is the VACs index page, show the search widget as a sidebar
				dynamic_sidebar( 'sidebar-vac-search' );
			}

 ?>
		</aside><!-- #secondary -->

		<?php do_action( 'galaxis_after_main_sidebar' ); ?>
	</div><!-- .sidebar__inner -->
</div><!-- .columns__md-4 -->
