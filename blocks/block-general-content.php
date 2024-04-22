<?php
/**
 * Block Name: General Content
 * The template for displaying the custom gutenberg block
 * @link https://www.advancedcustomfields.com/resources/blocks/
 * @package Pinecotractor
 * @since 1.0.0
 */
// create id attribute for specific styling
$id = 'general-content' . $block['id'];
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
$gc_title         = isset($block_fields['lstp_gc_title'])?$block_fields['lstp_gc_title']:null;
$gc_sub_title     = isset($block_fields['lstp_gc_sub_title'])?$block_fields['lstp_gc_sub_title']:null;
$gc_description   = isset($block_fields['lstp_gc_discription'])?$block_fields['lstp_gc_discription']:null;
?>
<section class="full-width-layout bg-white lg:pb-80 mx:pb-65 block-acf-general-content <?php echo $align_class . '' . $class_name . '' . $name; ?>">
    <div class="container">
        <div class="relative z-10">
            <?php if (!empty($gc_sub_title)){ ?>
                <div class="info-text flex justify-start mb-30 lg:mb-15">
                    <div class="tag-item flex items-center gap-13">
                        <span class="tag-icon-round rounded-full w-20 h-20 flex items-center justify-center bg-white"></span>
                        <div class="tag-title"><?php echo $gc_sub_title; ?></div>
                    </div>
                </div>
            <?php } ?>
            <?php if (!empty($gc_title) || !empty($gc_description)){ ?>
                <div class=" ">
                    <h2 class="heading-title mb-35 mxl:mb-20"><?php echo $gc_title; ?></h2>
                    <?php if (!empty($gc_description) ){ ?>
                        <div class="text-16 mxl:text-22 md:text-20 mb-10">
                            <?php echo $gc_description; ?>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    </div>
</section>