<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Galaxis
 */

$galaxis_blog_has_right_sidebar = galaxis_blog_has_right_sidebar();

get_header();
?>

	<div class="wrapper u-t-margin<?php echo esc_attr( galaxis_blog_left_sidebar_wrapper_class( $galaxis_blog_has_right_sidebar ) ); ?>">
		<div class="columns columns--gutters">

			<?php
			if ( ! $galaxis_blog_has_right_sidebar ) {
				get_sidebar();
			}
			?>

			<div id="primary" class="content-area columns__md-8 u-b-margin">
				<main id="main" class="site-main">

					<?php
					$people_options = array(
										'post_type' => 'people',
										'orderby' => 'title',
										'order' => 'ASC'
									);


					query_posts($people_options);

					if ( have_posts() ) {
						?>

						<header class="page-header gx-card-content gx-card-content--same-md-y u-b-margin">
							<h1 class='page-title archive-title'>Get to know SDSS people</h1>
							<div class='archive-description'>In this space, you can meet the great people of the Sloan Digital Sky Survey (SDSS)</div>
						</header><!-- .page-header -->
						<div id='people-flex-container'>
						<?php
						while ( have_posts()  ) {
							the_post();
							get_template_part( 'template-parts/content-archive-people' );
						}

						the_posts_pagination();
						?> </div> <?php 
					} else {
						get_template_part( 'template-parts/content', 'none' );
					}
					?>

				</main><!-- #main -->
			</div><!-- #primary -->

			<?php
			if ( $galaxis_blog_has_right_sidebar ) {
				get_sidebar();
			}
			?>

		</div><!-- .columns -->
	</div><!-- .wrapper -->

<?php
get_footer();
