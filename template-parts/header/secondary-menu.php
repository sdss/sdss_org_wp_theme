
<?php if ( preg_match('/(dr\d|data)/i',home_url(add_query_arg(array(),$wp->request)))  ) {  ?>

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
		<div class="secondary-menu-container previous-dr">
			<ul id="menu-data-release" class="secondary-menu">
				<li id="menu-item-4296" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-4296"><a href="/dr<?php echo $this_dr; ?>/"><strong>Data Release <?php echo $this_dr; ?></strong></a>
				</li>
				<li id="menu-item-4288" class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-3579 current_page_item menu-item-4288"><a href="/dr<?php echo $this_dr; ?>/data_access/" aria-current="page">Data Access</a></li>
				<li id="menu-item-4289" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4289"><a href="/dr<?php echo $this_dr; ?>/bhm/">BHM</a></li>
				<li id="menu-item-4291" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4291"><a href="/dr<?php echo $this_dr; ?>/mwm/">MWM</a></li>
				<li id="menu-item-4549" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4549"><a href="/dr<?php echo $this_dr; ?>/lvm/about/">LVM</a></li>
				<li id="menu-item-4293" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4293"><a href="/dr<?php echo $this_dr; ?>/imaging/">Imaging</a></li>
				<li id="menu-item-4294" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4294"><a href="/dr<?php echo $this_dr; ?>/completed_surveys/"><span class="tooltip"><span class="anchortext">Completed Surveys</span><div class="tooltiptext" id="completed">APOGEE, (e)BOSS,<br />MaNGA, SDSS-I/-II</div></span></a></li>
				<li id="menu-item-4290" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4290"><a href="/dr<?php echo $this_dr; ?>/targeting/">Targeting</a></li>
				<li id="menu-item-4295" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4295"><a href="/dr<?php echo $this_dr; ?>/software/">Software</a></li>
				<li id="menu-item-4287" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4287"><a href="/dr<?php echo $this_dr; ?>/tutorials/">Tutorials</a></li>
				<li id="menu-item-4286" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4286"><a href="/dr<?php echo $this_dr; ?>/help/">Help</a></li>
			</ul>
		</div>	
<?php } ?>
	</nav><!-- #site-navigation -->
<?php } ?>