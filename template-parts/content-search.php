<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package lonestartrailerparts
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
		$option_fields       = get_fields( 'option' );
		$place_holder_image  = isset( $option_fields['lstp_place_holder_image'] ) ? $option_fields['lstp_place_holder_image'] : null;
		if (has_post_thumbnail()) {
			$image_url = wp_get_attachment_image(get_post_thumbnail_id(), 'thumb_500');
			echo $image_url;
		}
		else
		{
			 echo wp_get_attachment_image($place_holder_image, 'thumb_500');
		}
	?>
	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php
				lonestartrailerparts_posted_on();
				lonestartrailerparts_posted_by();
			?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<footer class="entry-footer">
		<?php lonestartrailerparts_entry_footer(); ?>
	</footer><!-- .entry-footer -->
	<?php// the_posts_navigation(); ?>
</article><!-- #post-<?php the_ID(); ?> -->