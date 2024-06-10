
<?php if ( preg_match('/(dr\d|data)/i',get_permalink())  ) {  ?>

	<nav id="secondary-navigation" class="wrapper">
	<?php 
		$this_dr = intval(substr(explode("/",home_url( $wp->request ))[3],2));
		if (($this_dr == CURRENT_DR) & ( has_nav_menu( 'menu-2' ) )) {
			wp_nav_menu(
				array(
					'theme_location'  => 'menu-2',
					'depth'           => 3,
					//'menu_id'         => 'secondary-menu',
					'menu_class'	  => 'secondary-menu',
					'container_class' => 'secondary-menu-container'
					//'walker'          => new Galaxis_Primary_Walker_Nav_Menu(),
				)
			);
		} else {
	?>
		<div class="secondary-menu-container">
			<ul id="menu-data-release-19" class="secondary-menu">
				<li id="menu-item-4010" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item menu-item-4010">
					<a href="/dr19/" aria-current="page"><strong>DR<?php echo $this_dr; ?></strong></a>
				</li>
				<li id="menu-item-550" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-550">
					<a href="https://dev.sdss.org/dr18/data_access/">Data Access</a>
				</li>
				<li id="menu-item-543" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-543">
					<a href="https://dev.sdss.org/dr18/bhm/">BHM</a>
				</li>
				<li id="menu-item-541" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-541">
					<a href="https://dev.sdss.org/dr18/mwm/">MWM</a>
				</li>
				<li id="menu-item-2403" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2403">
					<a href="https://dev.sdss.org/dr18/lvm/about/">LVM</a>
				</li>
				<li id="menu-item-548" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-548">
					<a href="https://dev.sdss.org/dr18/imaging/">Imaging</a>
				</li>
				<li id="menu-item-549" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-549">
					<a href="https://dev.sdss.org/dr18/completed_surveys/"><span class="tooltip"><span class="anchortext">Completed Surveys</span><div class="tooltiptext" id="completed">APOGEE, (e)BOSS,<br>MaNGA, SDSS-I/-II</div></span></a>
				</li>
				<li id="menu-item-544" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-544">
					<a href="https://dev.sdss.org/dr18/targeting/">Targeting</a>
				</li>
				<li id="menu-item-545" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-545">
					<a href="https://dev.sdss.org/dr18/software/">Software</a>
				</li>
				<li id="menu-item-547" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-547">
					<a href="https://dev.sdss.org/dr18/tutorials/">Tutorials</a>
				</li>
				<li id="menu-item-546" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-546">
					<a href="https://dev.sdss.org/dr18/help/">Help</a>
				</li>
			</ul>
		</div>	
	<?php } ?>
	</nav><!-- #site-navigation -->
<?php } ?>