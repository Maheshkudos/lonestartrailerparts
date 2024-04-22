<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package lonestartrailerparts
 */

get_header();
?>
<div class="glide-spacer space-80"></div>
<main id="primary" class="site-main">
	<section class="search-inner">
		<div class="text-center">
			<?php if ( have_posts() ) : ?>
				<header class="page-header">
					<h3 class="page-title mb-40 md:mb-20">
						<?php
							/* translators: %s: search query. */
							printf( esc_html__( 'Search Results for: %s', 'lonestartrailerparts' ), '<span>' . get_search_query() . '</span>' );
						?>
					</h3>
				</header><!-- .page-header -->
				<div class="search-article">
					<?php
						/* Start the Loop */
						while ( have_posts() ) :
							the_post();
							/**
							 * Run the loop for the search to output the results.
							 * If you want to overload this in a child theme then include a file
							 * called content-search.php and that will be used instead.
							 */
						get_template_part( 'template-parts/content', 'search' );
						endwhile;
					?>
					<div class="nav-blocks"><?php echo the_posts_navigation(); ?></div>
					<?php
					else :
						get_template_part( 'template-parts/content', 'none' );
					?>
				</div>
			<?php endif; ?>
		</div>
	</section>
</main><!-- #main -->
<div class="glide-spacer space-80"></div>
<?php
get_footer();