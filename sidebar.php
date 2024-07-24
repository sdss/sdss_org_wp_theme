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
			$this_dr = intval(substr(explode("/",$this_page_url)[3],2));
			
			
			if ($this_dr == CURRENT_DR) {    // if latest data release, load menus defined in Appearance -> Menus...
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
			} else {   // if not current DR, load static menus
				$this_section = explode('/',$this_page_url)[4];
				//echo "<h1 style='color:orange;'>|||".$this_section."</h1>";
				switch ($this_section) {     // display menu for this section
					case "data_access": ?>
						<section id="nav_menu-45" class="widget gx-card-content u-b-margin widget_nav_menu">
							<h3 class="widget-title">DR<?php echo $this_dr; ?> Data Access</h3>
							<nav class="menu-datasets-container" aria-label="Data Access">
								<ul id="menu-datasets" class="menu">
									<li id="menu-item-1303" class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-38 current_page_item menu-item-1303"><a href="/dr<?php echo $this_dr; ?>/data_access/" aria-current="page">Overview</a></li>
									<li id="menu-item-1317" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1317"><a href="/dr<?php echo $this_dr; ?>/data_access/get_data/">Get Data</a></li>
									<li id="menu-item-1305" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1305"><a href="/dr<?php echo $this_dr; ?>/data_access/bulk/">Bulk Data Downloads</a></li>
									<li id="menu-item-1304" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1304"><a href="/dr<?php echo $this_dr; ?>/data_access/value-added-catalogs/">Value Added Catalogs</a></li>
									<li id="menu-item-1318" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1318"><a href="/dr<?php echo $this_dr; ?>/data_access/bitmasks/">Bitmasks</a></li>
									<li id="menu-item-1306" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1306"><a href="/dr<?php echo $this_dr; ?>/data_access/volume/">Data Volume for DR<?php echo $this_dr; ?></a></li>
									<li id="menu-item-1307" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1307"><a href="/dr<?php echo $this_dr; ?>/data_access/status/">Status</a></li>
								</ul>
							</nav>
						</section>
					<?php 
						break;
					case 'bhm': ?>
						<section id="nav_menu-37" class="widget gx-card-content u-b-margin widget_nav_menu">
							<h3 class="widget-title">DR<?php echo $this_dr; ?> Black Hole Mapper</h3>
							<nav class="menu-black-hole-mapper-container" aria-label="Black Hole Mapper">
								<ul id="menu-black-hole-mapper" class="menu">
									<li id="menu-item-1324" class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-51 current_page_item menu-item-1324"><a href="/dr<?php echo $this_dr; ?>/bhm/" aria-current="page">BHM Overview</a></li>
									<li id="menu-item-1320" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1320"><a href="/dr<?php echo $this_dr; ?>/bhm/about/">About Black Hole Mapper</a></li>
									<li id="menu-item-1321" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1321"><a href="/dr<?php echo $this_dr; ?>/bhm/getting_started/">Getting Started</a></li>
									<li id="menu-item-1323" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1323"><a href="/dr<?php echo $this_dr; ?>/bhm/caveats/">BHM Caveats</a></li>
									<li id="menu-item-1322" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-1322"><a href="/dr<?php echo $this_dr; ?>/bhm/programs/">Science Programs</a>
										<ul class="sub-menu">
											<li id="menu-item-1364" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1364"><a href="/dr<?php echo $this_dr; ?>/bhm/programs/aqmes/">AQMES</a></li>
											<li id="menu-item-1363" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1363"><a href="/dr<?php echo $this_dr; ?>/bhm/programs/rm/">Reverberation Mapping</a></li>
											<li id="menu-item-1366" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1366"><a href="/dr<?php echo $this_dr; ?>/bhm/programs/spiders/">SPIDERS</a></li>
											<li id="menu-item-1365" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1365"><a href="/dr<?php echo $this_dr; ?>/bhm/programs/csc/">CSC</a></li>
											<li id="menu-item-1367" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1367"><a href="/dr<?php echo $this_dr; ?>/bhm/programs/ancillary/">Ancillary Programs</a></li>
											<li id="menu-item-1368" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1368"><a href="/dr<?php echo $this_dr; ?>/bhm/programs/cartons/">BHM Targeting Cartons</a></li>
										</ul>
									</li>
								</ul>
							</nav>
						</section>
					<?php 
						break;
					case "mwm": ?>
						<section id="nav_menu-35" class="widget gx-card-content u-b-margin widget_nav_menu">
							<h3 class="widget-title">DR<?php echo $this_dr; ?> Milky Way Mapper</h3>
							<nav class="menu-milky-way-mapper-container" aria-label="Milky Way Mapper">
								<ul id="menu-milky-way-mapper" class="menu">
									<li id="menu-item-1308" class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-46 current_page_item menu-item-1308"><a href="/dr<?php echo $this_dr;?>/mwm/" aria-current="page">DR<?php echo $this_dr;?> MWM Overview</a></li>
									<li id="menu-item-1315" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1315"><a href="/dr<?php echo $this_dr;?>/mwm/about/">About Milky Way Mapper</a></li>
									<li id="menu-item-1310" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1310"><a href="/dr<?php echo $this_dr;?>/mwm/getting_started/">Getting Started</a></li>
									<li id="menu-item-1312" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1312"><a href="/dr<?php echo $this_dr;?>/mwm/caveats/">MWM Caveats</a></li>
									<li id="menu-item-1311" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-1311"><a href="/dr<?php echo $this_dr;?>/mwm/programs/">Science Programs</a>
										<ul class="sub-menu">
											<li id="menu-item-1336" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1336"><a href="/dr<?php echo $this_dr;?>/mwm/programs/cartons/">List of Programs</a></li>
											<li id="menu-item-1342" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1342"><a href="/dr<?php echo $this_dr;?>/mwm/programs/gg/">Galactic Genesis</a></li>
											<li id="menu-item-1337" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1337"><a href="/dr<?php echo $this_dr;?>/mwm/programs/wd/">White Dwarfs</a></li>
											<li id="menu-item-1348" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1348"><a href="/dr<?php echo $this_dr;?>/mwm/programs/snc/">Solar Neighborhood Census</a></li>
											<li id="menu-item-1340" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1340"><a href="/dr<?php echo $this_dr;?>/mwm/programs/yso/">Young Stellar Objects</a></li>
											<li id="menu-item-1343" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1343"><a href="/dr<?php echo $this_dr;?>/mwm/programs/ob/">OB Stars</a></li>
											<li id="menu-item-1347" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1347"><a href="/dr<?php echo $this_dr;?>/mwm/programs/erosita/">Galactic eROSITA Sources</a></li>
											<li id="menu-item-1344" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1344"><a href="/dr<?php echo $this_dr;?>/mwm/programs/cc/">Massive Eclipsing Binaries</a></li>
											<li id="menu-item-1339" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1339"><a href="/dr<?php echo $this_dr;?>/mwm/programs/binary/">Binary Systems</a></li>
											<li id="menu-item-1338" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1338"><a href="/dr<?php echo $this_dr;?>/mwm/programs/cb/">Compact Binaries</a></li>
											<li id="menu-item-1345" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1345"><a href="/dr<?php echo $this_dr;?>/mwm/programs/planet/">Planet Hosts</a></li>
											<li id="menu-item-1341" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1341"><a href="/dr<?php echo $this_dr;?>/mwm/programs/asteroseismic/">Asteroseismic Red Giants</a></li>
											<li id="menu-item-1346" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1346"><a href="/dr<?php echo $this_dr;?>/mwm/programs/dust/">Dust</a></li>
											<li id="menu-item-1417" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1417"><a href="/dr<?php echo $this_dr;?>/mwm/programs/other/">Science Validation</a></li>
										</ul>
									</li>
								</ul>
							</nav>
						</section>
					<?php
						break;
					case "lvm": ?>
						<section id="nav_menu-46" class="widget gx-card-content u-b-margin widget_nav_menu">
							<h3 class="widget-title">DR<?php echo $this_dr; ?> Local Volume Mapper</h3>
							<nav class="menu-local-volume-mapper-container" aria-label="Local Volume Mapper">
								<ul id="menu-local-volume-mapper" class="menu">
									<li id="menu-item-1314" class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-815 current_page_item menu-item-1314"><a href="/dr<?php echo $this_dr; ?>/lvm/about/" aria-current="page">About Local Volume Mapper</a></li>
								</ul>
							</nav>
						</section>
					<?php
						break;
					case "targeting": ?>
						<section id="nav_menu-54" class="widget gx-card-content u-b-margin widget_nav_menu">
							<h3 class="widget-title">DR<?php echo $this_dr; ?> Targeting</h3>
							<nav class="menu-targeting-container" aria-label="Targeting">
								<ul id="menu-targeting" class="menu">
									<li id="menu-item-3758" class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-517 current_page_item menu-item-3758"><a href="/dr<?php echo $this_dr; ?>/targeting/" aria-current="page">Overview</a></li>
									<li id="menu-item-2770" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2770"><a href="/dr<?php echo $this_dr; ?>/bhm/programs/">Black Hole Mapper <i class="fa-solid fa-arrow-up-right-from-square"></i></a></li>
									<li id="menu-item-2769" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2769"><a href="/dr<?php echo $this_dr; ?>/mwm/programs/">Milky Way Mapper <i class="fa-solid fa-arrow-up-right-from-square"></i></a></li>
									<li id="menu-item-2420" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2420"><a href="/dr<?php echo $this_dr; ?>/targeting/open_fiber_programs/">Open Fiber Programs</a></li>
									<li id="menu-item-1327" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-1327"><a href="/dr<?php echo $this_dr; ?>/targeting/fps/">FPS</a>
										<ul class="sub-menu">
											<li id="menu-item-2417" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2417"><a href="/dr<?php echo $this_dr; ?>/targeting/fps/sky/">Sky Calibration</a></li>
											<li id="menu-item-2416" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2416"><a href="/dr<?php echo $this_dr; ?>/targeting/fps/std/">Standards Calibration</a></li>
										</ul>
									</li>
									<li id="menu-item-1328" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1328"><a href="/dr<?php echo $this_dr; ?>/targeting/plates/">Plates</a></li>
								</ul>
							</nav>
						</section>
					<?php 
						break;
					case "software": ?>
						<section id="nav_menu-39" class="widget gx-card-content u-b-margin widget_nav_menu">
							<h3 class="widget-title">DR<?php echo $this_dr; ?> Software</h3>
							<nav class="menu-software-container" aria-label="Software">
								<ul id="menu-software" class="menu">
									<li id="menu-item-1326" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-1326"><a href="/dr<?php echo $this_dr; ?>/software/pipelines/">Software Pipelines</a>
										<ul class="sub-menu">
											<li id="menu-item-1465" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1465"><a href="/dr<?php echo $this_dr; ?>/software/pipelines/boss/">BOSS Pipeline</a></li>
										</ul>
									</li>
									<li id="menu-item-1325" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-1325"><a href="/dr<?php echo $this_dr; ?>/software/packages/">Software Packages</a>
										<ul class="sub-menu">
											<li id="menu-item-1466" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1466"><a href="/dr<?php echo $this_dr; ?>/software/packages/idlutils/">idlutils</a></li>
											<li id="menu-item-1472" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1472"><a href="/dr<?php echo $this_dr; ?>/software/packages/kaiju/">Kaiju</a></li>
											<li id="menu-item-1468" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1468"><a href="/dr<?php echo $this_dr; ?>/software/packages/sdss-access/">sdss-access</a></li>
											<li id="menu-item-1469" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1469"><a href="/dr<?php echo $this_dr; ?>/software/packages/sdssdb/">sdssdb</a></li>
											<li id="menu-item-1470" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1470"><a href="/dr<?php echo $this_dr; ?>/software/packages/sdss-python-template/">SDSS Python template</a></li>
											<li id="menu-item-1467" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1467"><a href="/dr<?php echo $this_dr; ?>/software/packages/sdss-tree/">sdss-tree</a></li>
											<li id="menu-item-1473" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1473"><a href="/dr<?php echo $this_dr; ?>/software/packages/svn/">SVN</a></li>
										</ul>
									</li>
								</ul>
							</nav>
						</section>
					<?php
						break;
					case "tutorials": ?>
						<section id="nav_menu-40" class="widget gx-card-content u-b-margin widget_nav_menu">
							<h3 class="widget-title">DR<?php echo $this_dr; ?> Tutorials</h3>
							<nav class="menu-tutorials-container" aria-label="Tutorials">
								<ul id="menu-tutorials" class="menu">
									<li id="menu-item-1329" class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-519 current_page_item menu-item-1329"><a href="/dr<?php echo $this_dr; ?>/tutorials/" aria-current="page">Tutorials Overview</a></li>
									<li id="menu-item-1421" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1421"><a href="/dr<?php echo $this_dr; ?>/tutorials/par/">Parameter Files</a></li>
									<li id="menu-item-1420" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1420"><a href="/dr<?php echo $this_dr; ?>/tutorials/fitsfiles/">FITS Files</a></li>
									<li id="menu-item-1330" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1330"><a href="/dr<?php echo $this_dr; ?>/tutorials/using_bitmasks/">Using Bitmasks</a></li>
									<li id="menu-item-3123" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-3123"><a href="/dr<?php echo $this_dr; ?>/tutorials/conversions/">Wavelength and Magnitude Conversions</a></li>
								</ul>
							</nav>
						</section>
					<?php
						break;
					case "help":?>
						<section id="nav_menu-41" class="widget gx-card-content u-b-margin widget_nav_menu">
							<h3 class="widget-title">DR<?php echo $this_dr; ?> Help</h3>
							<nav class="menu-help-container" aria-label="Help">
								<ul id="menu-help" class="menu">
									<li id="menu-item-551" class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-55 current_page_item menu-item-551"><a href="/dr<?php echo $this_dr; ?>/help/" aria-current="page">Help Index</a></li>
									<li id="menu-item-552" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-552"><a href="/dr<?php echo $this_dr; ?>/help/glossary/">Glossary</a></li>
									<li id="menu-item-3297" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-3297"><a href="/dr<?php echo $this_dr; ?>/help/faq/">Frequently Asked Questions</a></li>
									<li id="menu-item-1277" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1277"><a href="/dr<?php echo $this_dr; ?>/tutorials/">Tutorials</a></li>
								</ul>
							</nav>
						</section>
					<?php
						break;
					default: 
				}
			}


			
			/*if (array_reverse(explode('/',$this_page_url))[0] == 'science') { */ ?>
				<!--<div class='sidebar-toc'>-->
				<?php /*dynamic_sidebar( 'science-results-sidebar' );*/ ?>
				<!--</div>-->
			<?php /*}*/ ?>
		</aside><!-- #secondary -->

		<?php do_action( 'galaxis_after_main_sidebar' ); ?>
	</div><!-- .sidebar__inner -->
</div><!-- .columns__md-4 -->
