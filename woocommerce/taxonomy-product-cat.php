<?php
/**
 * The Template for displaying products in a product category. Simply includes the archive template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/taxonomy-product-cat.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://woo.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     4.7.0
 */

if (!defined('ABSPATH')) {
    exit;
}
get_header('shop');
?>
<div class="woocommerce container">
    <?php do_action('woocommerce_before_main_content'); ?>
    <header class="woocommerce-products-header">
        <?php if (apply_filters('woocommerce_show_page_title', true)) : ?>
            <h2 class="woocommerce-products-header__title page-title"><?php// woocommerce_page_title(); ?></h2>
        <?php endif; ?>
        <?php do_action('woocommerce_archive_description'); ?>
    </header>
    <div class="product-category-list block-category-listing wah">
        <?php
        if (woocommerce_product_loop()) {
            do_action('woocommerce_before_shop_loop');
            $current_category_id = get_queried_object_id();
            //echo "Current Category ID: " . $current_category_id;
            $subcategories = get_terms(array(
                'taxonomy' => 'product_cat',
                'parent' => $current_category_id,
                'hide_empty' => true,
            ));
            // echo "<pre>";
            // print_r($subcategories);
            // echo "</pre>";
            if ($subcategories) {
                echo '<ul class="product columns-3 custom-woo-listing jh">';
                $count = count($subcategories);
                $index = 0;
                foreach ($subcategories as $subcategory) {
                    $index++;
                    // Get category count
                    $category_count = $subcategory->count;
                    ?>
                    <li class="product-category product">
                        <a aria-label="visit product category <?php echo esc_attr($subcategory->name); ?>" href="<?php echo esc_url(get_term_link($subcategory)); ?>">
                            <?php
                                $thumbnail_id = get_term_meta($subcategory->term_id, 'thumbnail_id', true);
                                if ($thumbnail_id) {
                                    $image_url = wp_get_attachment_image($thumbnail_id, 'thumb_400');
                                    echo $image_url;
                                } else {
                                    echo '<img src="' . esc_url(wc_placeholder_img_src()) . '" alt="' . esc_attr($subcategory->name) . '">';
                                }
                            ?>
                            <h2 class="woocommerce-loop-category__title">
                                <?php echo $subcategory->name; ?>
                                <div class="count">(<?php echo $category_count; ?>)</div>
                            </h2>
                        </a>
                    </li>
                <?php
                }
                echo '</ul>';
            } else {
                woocommerce_product_loop_start();
                if (wc_get_loop_prop('total')) {
                    while (have_posts()) {
                        the_post();
                        do_action('woocommerce_shop_loop');
                        wc_get_template_part('content', 'product');
                    }
                }
                woocommerce_product_loop_end();
            }
        } else {
            do_action('woocommerce_no_products_found');
        }
        do_action('woocommerce_after_main_content');
        ?>
    </div>
</div>
<?php get_footer('shop'); ?>