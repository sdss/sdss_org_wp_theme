<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Galaxis
 */

?>

<div class='people-flex'>
	<article id="post-<?php the_ID(); ?>" <?php post_class( 'gx-card u-b-margin' ); ?>>

		<div class="gx-card-content">

			<header class="entry-header">
			<?php galaxis_post_thumbnail(); ?>		
			</header><!-- .entry-header -->

			<div class="entry-content">
			<?php
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			?>
			</div><!-- .entry-content -->

			<?php if ( get_edit_post_link() ) { ?>
			<footer class="entry-footer">
				<?php galaxis_edit_post_link(); ?>
			</footer><!-- .entry-footer -->
			<?php } ?>

		</div><!-- .gx-card-content -->

	</article><!-- #post-<?php the_ID(); ?> -->
</div>