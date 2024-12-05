
<?php if ( has_nav_menu( 'menu-2' ) & preg_match('/(dr\d|data)/i',get_permalink())  ) {  ?>

		<nav id="secondary-navigation" class="wrapper">

			<?php if ( has_nav_menu( 'menu-2' ) ) { ?>
				<?php
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
				?>
			<?php } ?>

		</nav><!-- #site-navigation -->
		<?php } ?>