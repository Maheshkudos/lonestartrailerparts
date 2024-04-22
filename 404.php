<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package lonestartrailerparts
 */

get_header();

$option_fields      = get_fields( 'option' );
$home_link_404      = isset( $option_fields['lstp_404_home_link'] ) ? $option_fields['lstp_404_home_link'] : null;
$content_title_404  = isset( $option_fields['lstp_404_content_title'] ) ? $option_fields['lstp_404_content_title'] : null;
$content_404        = isset( $option_fields['lstp_404_content'] ) ? $option_fields['lstp_404_content'] : null;
?>
<main id="primary" class="site-main">
    <div class="glide-spacer space-80"></div>
        <section class="error-404 not-found text-center">
			<?php if ($content_title_404) { ?>
				<h2 class="page-title">
					<?php echo esc_html($content_title_404); ?>
				</h2>
			<?php } else { ?>
				<h2 class="page-title">
					<?php esc_html_e('Oops! That page can&rsquo;t be found.', 'lonestartrailerparts'); ?>
				</h2>
			<?php } ?>
            <div class="page-content">
                <?php if ( $content_404 ) { ?>
                    <?php echo $content_404; ?>
                <?php } else { ?>
                    <p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'lonestartrailerparts' ); ?></p>
                <?php } ?>
                <div class="search-box mb-20"><?php get_search_form(); ?></div>
                <?php if ( $home_link_404 ) { ?>
                    <div class="back-to-site">
                        <?php echo lonestartrailerparts_acf_button( $home_link_404, 'site-btn btn-bright-red' ); ?>
                    </div>
                <?php } else { ?>
                    <div class="back-to-site"><?php esc_html_e( 'Better Luck', 'lonestartrailerparts' ); ?></div>
                <?php } ?>
            </div><!-- .page-content -->
        </section><!-- .error-404 -->
    <div class="glide-spacer space-80"></div>
</main><!-- #main -->
<?php
get_footer();