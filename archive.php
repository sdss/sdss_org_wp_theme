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
					if ( have_posts() ) {
						?>

						<header class="page-header gx-card-content gx-card-content--same-md-y u-b-margin">
							<?php
							the_archive_title( '<h1 class="page-title archive-title">', '</h1>' );
							//the_archive_description( '<div class="archive-description">', '</div>' );
							?>
							<p>This page shows our official press releases announcing discoveries during the current fifth phase of the SDSS. For more discoveries, see the press releases of the previous generations of the SDSS, <a href="#previous">listed at the bottom of this page</a>.</p>
						</header><!-- .page-header -->

						<?php
						while ( have_posts() ) {
							the_post();
							get_template_part( 'template-parts/content', get_post_type() );
						}

						the_posts_pagination();
					} else {
						get_template_part( 'template-parts/content', 'none' );
					}
					?>
					<div class="page-header gx-card-content gx-card-content--same-md-y u-b-margin" id="previous">
						<h2>Older Press Releases</h2>
						<p>For a list of press releases from previous generations of the SDSS, see the lists on their project websites:</p>
						<ul>
							<li><a href="https://press.sdss.org/" target="_blank">SDSS-IV Press Releases</a></li>
							<li><a href="https://www.sdss3.org/press/" target="_blank">SDSS-III Press Releases</a></li>
							<li><a href="https://classic.sdss.org/news/news.php" target="_blank">SDSS Classic Press Releases</a></li>
						</ul>
					</div>
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
