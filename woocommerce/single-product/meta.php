<?php
/**
 * Single Product Meta
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/meta.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://woo.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;
?>
<div class="product_meta">
	<?php do_action( 'woocommerce_product_meta_start' ); ?>
	<?php if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>
		<span class="sku_wrapper"><?php esc_html_e( 'SKU:', 'woocommerce' ); ?> <span class="sku"><?php echo ( $sku = $product->get_sku() ) ? $sku : esc_html__( 'N/A', 'woocommerce' ); ?></span></span>
	<?php endif; ?>
	<div class="info-text flex mb-25 xl:mb-20 md:mb-15">
		<div class="tag-item flex items-center gap-13">
			<span class="tag-icon-round rounded-full w-20 h-20 flex items-center justify-center bg-white"></span>
			<div class="tag-title"><?php echo wc_get_product_category_list( $product->get_id(), ', ', '<span class="posted_in">' . _n( 'Category:', 'Categories:', count( $product->get_category_ids() ), 'woocommerce' ) . ' ', '</span>' ); ?></div>
		</div>
	</div>
	<?php echo wc_get_product_tag_list( $product->get_id(), ', ', '<span class="tagged_as">' . _n( 'Tag:', 'Tags:', count( $product->get_tag_ids() ), 'woocommerce' ) . ' ', '</span>' ); ?>
	<?php do_action( 'woocommerce_product_meta_end' ); ?>
</div>
<div class="product-attributes">
<?php
	$attributes = $product->get_attributes();
	if(!empty($attributes)){
?>
    <div class="attributes-models">
		<?php
			$model_count = 0;
			foreach ($attributes as $attribute) {
				if ($attribute['name'] == 'pa_model') {
					$product_model_attributes = wc_get_product_terms(get_the_ID(), $attribute['name']);
					echo '<strong>Models Available:</strong>';
					echo '<div class="models-block">';
					foreach ($product_model_attributes as $pr_model_attribute) {
						if ($model_count % 2 == 0) {
							echo '<div class="model_row">';
						}
						echo '<div class="model_column">';
                    
                        $explode_model = explode('–', $pr_model_attribute->name);
                        $first_model = $explode_model[0];
                        $second_model = $explode_model[1];
     
						echo '<div class="pr-model-attr"><span>'.$first_model.'</span> – '.$second_model.'</div>';
						echo '</div>';
						if ($model_count % 2 != 0 || $model_count == count($product_model_attributes) - 1) {
							echo '</div>';
						}
						$model_count++;
					}
					echo '</div>';
				}
			}
		?>
	</div>
	<div class="attributes-gvwr">
		<?php
		foreach ($attributes as $attribute) {
			if ($attribute['name'] == 'pa_gvwr') {
				$product_attributes = wc_get_product_terms(get_the_ID(), $attribute['name']);
				echo '<strong>GVWR:</strong>';
				echo '<div class="gvwr-block">';
				foreach ($product_attributes as $pr_model_attribute) {
					echo '<span>' . $pr_model_attribute->name . '</span>';
				}
				echo '</div>';
			}
		}
		?>
	</div>
<?php } ?>
</div>