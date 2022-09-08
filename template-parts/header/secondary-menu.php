
<?php if ( has_nav_menu( 'menu-2' ) ) { ?>
		<nav id="secondary-navigation" class="main-navigation secondary-menu">

			<?php if ( has_nav_menu( 'menu-2' ) ) { ?>
				<button type="button" class="menu-button menu-toggle" aria-controls="secondary-menu" aria-expanded="false">
					<span class="screen-reader-text"><?php esc_html_e( 'Secondary Menu', 'galaxis' ); ?></span>
					<span class="main-navigation__icon">
						<span class="main-navigation__icon__middle"></span>
					</span>
				</button>
				<?php
				wp_nav_menu(
					array(
						'theme_location'  => 'menu-2',
						'depth'           => 3,
						'menu_id'         => 'secondary-menu',
						'container_class' => 'secondary-menu-container',
						//'walker'          => new Galaxis_Primary_Walker_Nav_Menu(),
					)
				);
				?>
			<?php } ?>

		</nav><!-- #site-navigation -->
		<?php } ?>