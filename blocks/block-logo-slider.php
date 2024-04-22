<?php
/**
 * Block Name: Logo Slider
 *
 * The template for displaying the custom gutenberg block
 *
 * @link https://www.advancedcustomfields.com/resources/blocks/
 *
 * @package lonestartrailerparts
 * @since 1.0.0
 */
// create id attribute for specific styling
$id = 'logo-slider' . $block['id'];
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
$logo_slider = ( isset( $block_fields['lstp_logo_images_lists'] ) ) ? $block_fields['lstp_logo_images_lists'] : null;
if(!empty($logo_slider)){
?>
<section class="full-width-layout slider-logo-block bg-white pb-125 lg:pb-80 mx:pb-65 <?php echo $align_class . '' . $class_name . '' . $name; ?>">
    <div class="container">
        <div class="relative z-10">
            <div class="logo-slides logo-slider flex items-center justify-center">
                <?php
                    foreach($logo_slider as $imglist)
                    {
                        $image = $imglist['images'];
                        $link  = $imglist['link'];
                       if($image){
                ?>
                <div class="logo-slide-inner">
                    <a href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>">
                        <?php if(!empty($image)){ ?>
                            <?php echo wp_get_attachment_image( $image , 'thumb_200' ); ?>
                        <?php } ?>
                    </a>
                </div>
                <?php } } ?>
            </div>
        </div>
    </div>
</section>
<?php } ?>
