<?php
/**
 * Block Name: Gallery
 *
 * The template for displaying the custom gutenberg block
 *
 * @link https://www.advancedcustomfields.com/resources/blocks/
 *
 * @package lonestartrailerparts
 * @since 1.0.0
 */
// create id attribute for specific styling
$id = 'gellery' . $block['id'];
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

// Block variables
$gl_title    = ( isset( $block_fields['lstp_gallery_title'] ) ) ? $block_fields['lstp_gallery_title'] : null;
$gl_subtitle = ( isset( $block_fields['lstp_gallery_sub_title'] ) ) ? $block_fields['lstp_gallery_sub_title'] : null;
$gl_desc     = ( isset( $block_fields['lstp_gallery_description'] ) ) ? $block_fields['lstp_gallery_description'] : null;
$gl_images   = ( isset( $block_fields['lstp_gallery_images_lists'] ) ) ? $block_fields['lstp_gallery_images_lists'] : null;

if(!empty($gl_title) || !empty($gl_subtitle) || !empty($gl_dsc) || !empty($gl_images)){
?>
<section class="gallery-block full-width-layout <?php echo $align_class . '' . $class_name . '' . $name; ?>">
    <div class="container">
        <?php if (!empty($gl_subtitle)){ ?>
            <div class="info-text flex justify-center mb-30 lg:mb-15">
                <div class="tag-item flex items-center gap-13">
                    <span class="tag-icon-round rounded-full w-20 h-20 flex items-center justify-center bg-white"></span>
                    <div class="tag-title"><?php echo $gl_subtitle; ?></div>
                </div>
            </div>
        <?php } ?>
        <?php if (!empty($gl_title)|| !empty($gl_desc)){ ?>
            <div class="slider-inner-content text-center mb-115 lg:mb-80 mx:mb-30">
                <?php if (!empty($gl_title)){ ?>
                    <h2 class="heading-title mb-35 mxl:mb-20">
                        <?php echo $gl_title; ?>
                    </h2>
                <?php } ?>
                <?php if (!empty($gl_desc)){ ?>
                    <div class="text-28 mxl:text-22 md:text-20 mb-10">
                        <?php echo $gl_desc; ?>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>
    </div>
    <?php if(!empty($gl_images)){ ?>
        <div class="gallery-grid-layout grid grid-cols-3 gap-8 mx:grid-cols-2 sm:grid-cols-1">
            <?php
                foreach($gl_images as $gl_image){
                    $image_id = $gl_image['images'];
                    $image_url = wp_get_attachment_image_url( $image_id , 'thumb_500' );
            ?>
                <div class="gallery-images">
                    <a class="image-popup-fit" href="<?php echo $image_url; ?>">
                        <?php /// print_r($image_url);?>
                        <?php echo wp_get_attachment_image($image_id , 'thumb_500' );  ?>
                    </a>
                </div>
            <?php } ?>
        </div>
    <?php } ?>
</section>
<?php }