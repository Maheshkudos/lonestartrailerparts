<?php
/**
 * Block Name: Image Along Side About Description
 *
 * The template for displaying the custom Gutenberg block.
 *
 * @link https://www.advancedcustomfields.com/resources/blocks/
 *
 * @package lonestartrailerparts
 * @since 1.0.0
 */

// Create id attribute for specific styling.
$id = 'image-along-side-about-description' . $block['id'];

// Create align class ("alignwide") from block setting ("wide").
$align_class = $block['align'] ? 'align' . $block['align'] : '';

// Get the class name for the block to be used for it.
$class_name = isset($block['className']) ? $block['className'] : null;

// Meta fields related to the current block.
$block_fields = get_fields($block['id']);

// Making the unique ID for the block.
if ($block['name']) {
    $block_name = str_replace('/', '-', $block['name']);
    $name = 'block-' . $block_name;
}

// Block Fields.
$iasad_title              = isset($block_fields['lstp_iasad_title']) ? $block_fields['lstp_iasad_title'] : null;
$iasad_choose_variation   = isset($block_fields['lstp_iasad_choose_variation']) ? $block_fields['lstp_iasad_choose_variation'] : null;
$iasad_full_width_content = isset($block_fields['lstp_iasad_full_width_content']) ? $block_fields['lstp_iasad_full_width_content'] : null;
$iasad_sub_title          = isset($block_fields['lstp_iasad_sub_title']) ? $block_fields['lstp_iasad_sub_title'] : null;
$iasad_description_one    = isset($block_fields['lstp_iasad_description_one']) ? $block_fields['lstp_iasad_description_one'] : null;
$iasad_description_two    = isset($block_fields['lstp_iasad_description_two']) ? $block_fields['lstp_iasad_description_two'] : null;
$iasad_image_leftright    = isset($block_fields['lstp_iasad_image_leftright']) ? $block_fields['lstp_iasad_image_leftright'] : null;
$iasad_lf_rt              = $iasad_image_leftright == 'left' ? 'lft-block' : 'rft-block';
$iasad_image              = isset($block_fields['lstp_iasad_image']) ? $block_fields['lstp_iasad_image'] : null;
$iasad_map_show           = isset($block_fields['lstp_iasad_map_show']) ? $block_fields['lstp_iasad_map_show'] : null;
$map_show_class           = $iasad_map_show ? 'map-div' : '';
$iasad_map_leftright      = isset($block_fields['lstp_iasad_map_leftright']) ? $block_fields['lstp_iasad_map_leftright'] : null;
$iasad_map                = isset($block_fields['lstp_iasad_map']) ? $block_fields['lstp_iasad_map'] : null;
?>

<?php if ($iasad_choose_variation == 'variation1'){ ?>
    <!-- Variation 1 -->
    <section class="full-width-layout slider-logo-block bg-white lg:pb-80 mx:pb-65 line-pattern <?php echo $align_class . '' . $class_name . '' . $name; ?>">
        <div class="container">
            <div class="relative z-10 <?php echo $iasad_choose_variation; ?>">
                <?php if (!empty($iasad_sub_title)){ ?>
                    <div class="info-text flex justify-center mb-30 lg:mb-15">
                        <div class="tag-item flex items-center gap-13">
                            <span class="tag-icon-round rounded-full w-20 h-20 flex items-center justify-center bg-white"></span>
                            <div class="tag-title"><?php echo $iasad_sub_title; ?></div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (!empty($iasad_title) || !empty($iasad_description_one) || !empty($iasad_description_two)){ ?>
                    <div class="slider-inner-content text-center mb-115 lg:mb-80 mx:mb-30">
                        <?php if (!empty($iasad_title)){ ?>
                            <h2 class="heading-title mb-35 mxl:mb-20">
                                <?php echo $iasad_title; ?>
                            </h2>
                        <?php } ?>
                        <?php if (!empty($iasad_description_one) || !empty($iasad_description_two)){ ?>
                            <div class="text-28  mxl:text-22 md:text-20  mb-10">
                                <?php echo $iasad_description_one; ?>
                            </div>
                            <div class="info-desc light-para">
                                <?php echo $iasad_description_two; ?>
                            </div>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
<?php } else { ?>
    <!-- Variation 2 -->
    <section class="desc-wrap-v2 image-with-text-block full-width-layout line-pattern <?php echo $align_class . '' . $class_name . '' . $name; ?>">
        <div class="container">
            <div class="desc-section-row <?php echo $map_show_class; ?> flex flex-wrap md:justify-center gap-x-70 lg:gap-x-50 mx:gap-x-25 <?php echo $iasad_choose_variation . ' ' . $iasad_lf_rt; ?>">
                <?php if (!empty($iasad_image) || !empty($iasad_map)){ ?>
                <div class="cl-left">
                    <?php if (!empty($iasad_image)){ ?>
                        <div class="item-img">
                            <?php echo wp_get_attachment_image($iasad_image, 'thumb_500'); ?>
                        </div>
                    <?php } ?>
                    <?php if (!empty($iasad_map)){ ?>
                        <div class="item-map">
                            <?php echo $iasad_map ; ?>
                        </div>
                    <?php } ?>
                </div>
               <?php } ?>
                <div class="cl-right">
                    <?php if (!empty($iasad_sub_title)){ ?>
                        <div class="info-text flex mb-25 xl:mb-20 md:mb-15">
                            <div class="tag-item flex items-center gap-13">
                                <span class="tag-icon-round rounded-full w-20 h-20 flex items-center justify-center bg-white"></span>
                                <div class="tag-title"><?php echo $iasad_sub_title; ?></div>
                            </div>
                        </div>
                    <?php } ?>
                    <?php if (!empty($iasad_title)){ ?>
                        <h2 class="desc-title font-bold lg:mb-20">
                            <?php echo $iasad_title; ?>
                        </h2>
                    <?php } ?>
                    <?php if (!empty($iasad_description_one) || !empty($iasad_description_two)){ ?>
                        <?php if (!empty($iasad_description_one)){ ?>
                            <div class="info-desc text-28 mxl:text-22 md:text-20 mb-10">
                                <?php echo $iasad_description_one; ?>
                            </div>
                        <?php } ?>
                        <?php if (!empty($iasad_description_two)){ ?>
                            <div class="info-desc light-para">
                                <?php echo $iasad_description_two; ?>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
<?php } ?>