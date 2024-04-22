<?php
/*** Current Year Copyright Section ***/
function current_year() {
    $year = date('Y');
    return $year;
}
add_shortcode('year', 'current_year');

/*** Allow SVG files upload in WordPress Media panel ***/
function fix_svg_upload_error($mimes) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter('upload_mimes', 'fix_svg_upload_error');

/*remove purchase facility*/
//add_filter( 'woocommerce_is_purchasable', '__return_false' );

/*remove related product facility*/
//remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

/*remove tabs product facility*/
//remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);

/*** call for price zero empty ***/
add_filter( 'woocommerce_get_price_html', 'call_for_price_zero_empty', 9999, 2 );
function call_for_price_zero_empty( $price, $product ){
    if ( '' === $product->get_price() || 0 == $product->get_price() ) {
        $price = '<span class="woocommerce-Price-amount amount call-price" data-tel="9035720288">Call for Price</span>';
    }
    return $price;
}

/*** Helper foe acf link button ***/
function lonestartrailerparts_acf_button($object, $classes="") {
    $link = "";
    $link = "<a href='".$object['url']."' target='".$object['target']."' class='".$classes."'>".$object['title']."</a>";
    return $link;
}


// ajax trailer part
add_action('wp_ajax_trailer_parts_filter','trailer_parts_filter_callback');
add_action('wp_ajax_nopriv_trailer_parts_filter','trailer_parts_filter_callback');

function trailer_parts_filter_callback(){
    $prd_cat     = $_POST['select_cat'];
    $prd_trailer = $_POST['select_trailer'];
    if ($prd_cat !== '' || $prd_trailer !== '' ) {
        if( isset($prd_cat) &&  $prd_trailer == '' ){
            $tax_query= array(
				array(
					'taxonomy' => 'product_cat',
					'field' => 'slug',
					'terms' => $prd_cat,
				)
            );
        }elseif( $prd_cat == '' &&  isset($prd_trailer) ){
            $tax_query= array(
                array(
					'taxonomy' => 'product_cat',
					'field' => 'slug',
					'terms' => $prd_trailer,
                )
            );
        }elseif( isset($prd_cat) && isset($prd_trailer) ){
            $tax_query= array(
            'relation'=> 'OR',
                array(
					'taxonomy' => 'product_cat',
					'field' => 'slug',
					'terms' => $prd_cat,
                ),
				array(
					'taxonomy' => 'product_cat',
					'field' => 'slug',
					'terms' => $prd_trailer,
                )
            );
        }
        $args = array(
            'post_type' => 'product',
            'posts_per_page' => 3,
            'tax_query' => $tax_query
        );
		}else{
			$args = array(
				'post_type'      => 'product',
				'posts_per_page' => 3,
			);
		} ?>
        	<p class="w-full text-center font-semibold trailer-loader" style="display:none">Loading...</p>
        <?php
    	$filter_query = new WP_Query( $args );
			if( $filter_query->have_posts() ){
				while( $filter_query->have_posts()){
					$filter_query->the_post();
					$prd_id         = get_the_ID();
					$prd_title      = get_the_title( $prd_id );
					$product        = wc_get_product( $prd_id );
					$link           = get_permalink( $prd_id );
					$prd_categories = get_the_terms($prd_id, 'product_cat');
					$prd_image_url  = get_the_post_thumbnail_url( $prd_id, 'thumb_400' );
					$prd_thumb_id   = get_post_thumbnail_id(get_the_ID());
					$prd_alt        = get_post_meta($prd_thumb_id, '_wp_attachment_image_alt', true);
					$product        = wc_get_product($prd_id);
					$attributes     = $product->get_attributes();
		?>
		<div class="product-item trailer-col text-center">
			<?php if(!empty($prd_categories) || !empty($prd_title)){ ?>
				<div class="trailer-item-content pt-45 mx:pt-30">
					<div class="sub-title mb-20 mx:mb-10 font-fs-lt font-semibold">
						<?php
							if (!empty($prd_categories)) {
								$term_count = count($prd_categories);
								foreach ($prd_categories as $key=>$category) {
									echo $category->name;
									if($key < $term_count - 1 ){
										echo ', ' ;
									}
								}
							}
						?>
					</div>
					<?php if(!empty($prd_title)){ ?>
						<h3 class="heading-title mb-20 uppercase font-black"><?php echo $prd_title; ?></h3>
					<?php } ?>
				</div>
			<?php } ?>
			<?php if(!empty($prd_image_url)){ ?>
				<div class="image-item">
					<img class="prd-image" decoding="async" src="<?php echo $prd_image_url; ?>" alt="<?php echo $prd_alt; ?>">
				</div>
			<?php } ?>
			<?php if(!empty($attributes)){ ?>
				<div class="trailer-size-item">
					<?php
						foreach ($attributes as $attribute) {
							if($attribute['name'] == 'pa_model'){
								$product_attributes = wc_get_product_terms( get_the_ID(), $attribute['name'] );
					?>
						<ul>
							<?php foreach ($product_attributes as $pr_attribute) { ?>
								<li class="size-title tpf-attr"><?php echo $pr_attribute->name; ?></li>
							<?php } ?>
						</ul>
					<?php
                          	}
                      	}
					?>
				</div>
			<?php } ?>
			<div class="view-details">
				<a href="<?php echo $link; ?>" class="site-btn btn-air-force-blue btn-view"><?php echo esc_html( 'View More Details' ); ?></a>
			</div>
		</div>
	<?php
        		}
    		} else {
	?>
        <p class="no-product w-full text-center font-semibold">No Product Found.</p>
	<?php
    }
    wp_reset_query();
    die();
}

add_filter( 'body_class', function( $classes ) {
    if ( is_page( 'my-account' ) ) {
      $classes[] = 'wpmy-account';
    }
  	return $classes;
} );
?>