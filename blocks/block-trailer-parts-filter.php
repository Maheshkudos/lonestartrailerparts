<?php
/**
 * Block Name: Trailer Parts Filter
 *
 * The template for displaying the custom gutenberg block
 *
 * @link https://www.advancedcustomfields.com/resources/blocks/
 *
 * @package lonestartrailerparts
 *
 * @since 1.0.0
**/
// create id attribute for specific styling
$id = 'trailer-parts-filter' . $block['id'];
// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';
// Get the class name for the block to be used for it.
$class_name = isset($block['className']) ? $block['className'] : '';
// Meta fields related to current block
$block_fields = get_fields( $block['id'] );

// Making the unique ID for the block.
if ( $block['name'] ) {
	$block_name = $block['name'];
	$block_name = str_replace( '/', '-', $block_name );
	$name       = 'block-' . $block_name;
}

//Blocks Fields
$tpf_title            = isset($block_fields['lstp_tpf_title']) ? $block_fields['lstp_tpf_title'] : null;
$tpf_sub_title        = isset($block_fields['lstp_tpf_sub_title']) ? $block_fields['lstp_tpf_sub_title'] : null;
$tpf_desc             = isset($block_fields['lstp_tpf_desc']) ? $block_fields['lstp_tpf_desc'] : null;
$tpf_prd_parts_filter = isset($block_fields['lstp_tpf_part_shortcode']) ? $block_fields['lstp_tpf_part_shortcode'] : null;
if($tpf_title || $tpf_sub_title || $tpf_desc || $tpf_prd_parts_filter){
?>
<section class="trailer-block line-pattern full-width-layout <?php echo $align_class . '' . $class_name . '' . $name; ?>">
    <div class="container">
		<?php if(!empty($tpf_sub_title)) { ?>
			<div class="info-text flex justify-center mb-30 md:mb-15">
				<div class="tag-item flex items-center gap-13">
					<span class="tag-icon-round rounded-full w-20 h-20 flex items-center justify-center bg-white"></span>
					<p class="tag-title"><?php echo ($tpf_sub_title); ?></p>
				</div>
			</div>
        <?php } ?>
		<?php if(!empty($tpf_title) || !empty($tpf_desc) ) { ?>
			<div class="trailer-cnt-wraps">
				<?php if(!empty($tpf_title) || !empty($tpf_desc)){ ?>
					<div class="trailer-content-block text-center">
						<?php if(!empty($tpf_title)){ ?>
							<h2 class="heading-title"><?php echo ($tpf_title); ?></h2>
						<?php } ?>
						<?php if(!empty($tpf_desc)){ ?>
							<div class="sub-title"><?php echo ($tpf_desc); ?></div>
						<?php } ?>
					</div>
				<?php } ?>
				<?php// if(!empty($tpf_prd_parts_filter))?>
					<?php //echo $tpf_prd_parts_filter; ?>
				<?php  ?>
              
            <div class="trailer-select-field trailer-dropdown mb-100 xl:mb-85 lg:mb-60 sm:mb-45">
              <div class="category-field">
                  <?php
                      $trailer_part = 110;
                      $parts_ex_id = array();
                      $part_terms = get_terms( array(
                          'taxonomy' => 'product_cat',
                          'hide_empty' => false,
                          'orderby' => 'name',
                          'order' => 'ASC',
                          'parent' => $trailer_part
                      ) );
                  ?>
                  <?php if(!empty($part_terms)){ ?>
                      <select name="parts" class="trailer-parts prd-dropdwon" id="prd_trailer_parts">
                          <option value="">View Parts</option>
                          <?php
                              foreach($part_terms as $part)
                              {
                                  $parts_ex_id[] = $part->term_id;
                          ?>
                          <option value="<?php echo esc_html( $part->slug ); ?>"><?php echo esc_html( $part->name ); ?></option>
                          <?php } ?>
                      </select>
                  <?php } ?>
                  <?php
                      $parts_ex_id[] = strval($trailer_part);
                      $cat_terms = get_terms( array(
                          'taxonomy' => 'product_cat',
                          'hide_empty' => false,
                          'exclude' => $parts_ex_id,
                          'orderby' => 'name',
                          'order' => 'ASC',
                      ) );
                  ?>
                  <?php if(!empty($cat_terms)){ ?>
                      <select name="prd_category" class="prd-category prd-dropdwon" id="prd_category">
                          <option value="">View Categories</option>
                          <?php foreach($cat_terms as $category){ ?>
                              <option value="<?php echo esc_html( $category->slug ); ?>"><?php echo esc_html( $category->name ); ?></option>
                          <?php } ?>
                      </select>
                  <?php } ?>
              </div>
          </div>

           <div class="trailer-grid-layout product-grid flex gap-54 lx:gap-40 lg:gap-25 flex-wrap">
               <p class="w-full text-center font-semibold trailer-loader" style="display:none">Loading...</p>
                  <?php
                      $args = array(
                          'post_type'     =>'product',
                          'post_status'   =>'publish',
                          'posts_per_page'=> 3
                      );
                      $prd_query = new WP_Query( $args );
                          if( $prd_query->have_posts() ){
                              while( $prd_query->have_posts()){
                                  $prd_query->the_post();
                                  $prd_id         = get_the_ID();
                                  $prd_title      = get_the_title( $prd_id );
                                  $product        = wc_get_product( $prd_id );
                                  $link           = get_permalink( $prd_id );
                                  $prd_image_url  = get_the_post_thumbnail_url( $prd_id, 'thumb_400' );
                                  $prd_categories = get_the_terms( $prd_id, 'product_cat');
                                  $product        = wc_get_product( $prd_id );
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
                              <img src="<?php echo esc_url($prd_image_url); ?>" alt="<?php echo esc_attr($prd_title); ?>">
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
                      <?php if(!empty($link)){ ?>
                          <div class="view-details">
                              <a href="<?php echo $link; ?>" class="site-btn btn-air-force-blue btn-view"><span><?php echo esc_html( 'View More Details' ); ?></span></a>
                          </div>
                      </div>
                      <?php } ?>
                  <?php
                              }
                          }
                      wp_reset_query();
                  ?>
              </div>

   
                 
			</div>
		<?php } ?>
    </div>
</section>
<?php } ?>