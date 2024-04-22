<?php
/**
 * Block Name: Why Choose
 *
 * The template for displaying the custom gutenberg block
 *
 * @link https://www.advancedcustomfields.com/resources/blocks/
 *
 * @package lonestartrailerparts
 * @since 1.0.0
 */

// create id attribute for specific styling
$id = 'why-choose' . $block['id'];
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
$wc_title            = ( isset( $block_fields['lstp_wc_title'] ) ) ? $block_fields['lstp_wc_title'] : null;
$wc_sub_title        = ( isset( $block_fields['lstp_wc_sub_title'] ) ) ? $block_fields['lstp_wc_sub_title'] : null;
$wc_description_one  = ( isset( $block_fields['lstp_wc_description_one'] ) ) ? $block_fields['lstp_wc_description_one'] : null;
$wc_description_two  = ( isset( $block_fields['lstp_wc_description_two'] ) ) ? $block_fields['lstp_wc_description_two'] : null;
$wc_content_list     = ( isset( $block_fields['lstp_wc_content_list'] ) ) ? $block_fields['lstp_wc_content_list'] : null;
$wc_cta              = ( isset( $block_fields['lstp_wc_cta'] ) ) ? $block_fields['lstp_wc_cta'] : null;
$wc_cta_red          = ( isset( $block_fields['lstp_wc_cta_red'] ) ) ? $block_fields['lstp_wc_cta_red'] : null;
$wc_bg_image         = ( isset( $block_fields['lstp_wc_bg_image'] ) ) ? $block_fields['lstp_wc_bg_image'] : null;

if(!empty($wc_title) || !empty($wc_sub_title) || !empty($wc_description_one) || !empty($wc_description_two) || !empty($wc_content_list) || !empty($wc_bg_image || !empty($wc_cta) || !empty($wc_cta_red))){
?>
<section class="full-width-layout why-choose-block py-125 lg:py-80 mx:py-65 bg-no-repeat bg-cover bg-center <?php echo $align_class . '' . $class_name . '' . $name; ?>" style="background-image: url('<?php echo wp_get_attachment_image_url($wc_bg_image,'full'); ?>');">
    <div class="container">
        <div class="block-inner-detail relative z-10">
            <div class="grid grid-cols-2 mx:grid-cols-1 gap-50 mb-95 mxl:gap-50 mxl:mb-50">
                <?php if(!empty($wc_sub_title) || !empty($wc_title) || !empty($wc_description_one) || !empty($wc_description_two) ){ ?>
                    <div class="cl-left">
                        <?php if(!empty($wc_sub_title)){ ?>
                            <div class="info-text flex sm:justify-center mb-37 lg:mb-15">
                                <div class="tag-item flex items-center gap-13">
                                    <span class="tag-icon-round rounded-full w-20 h-20 flex items-center justify-center bg-white"></span>
                                    <p class="tag-title"><?php echo $wc_sub_title; ?></p>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="block-inner-content pr-15 sm:text-center">
                            <?php if(!empty($wc_title)){ ?>
                                <h2 class="heading-title text-white mb-35 mxl:mb-20 "><?php echo $wc_title; ?></h2>
                            <?php } ?>
                            <?php if(!empty($wc_description_one) || !empty($wc_description_two) ){ ?>
                                <div class="text-28 mxl:text-22 md:text-20 text-white mb-10"><?php if(!empty($wc_description_one)){ echo $wc_description_one; } ?></div>
                                <div class="text-white"><?php if(!empty($wc_description_two)){ echo $wc_description_two; } ?></div>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
                <?php if(!empty($wc_content_list)){ ?>
                    <div class="cl-right">
                        <div class="icon-list grid grid-cols-3 sm:grid-cols-2 xs:grid-cols-1 gap-y-60 mxl:gap-y-30 mxl:gap-x-20 gap-x-25">
                            <?php
                                foreach($wc_content_list as $wc_list){
                                    $wc_list_icon    = $wc_list['lstp_wc_list_icon'];
                                    $wc_list_title   = $wc_list['lstp_wc_list_title'];
                                    $wc_list_content = $wc_list['lstp_wc_list_content'];
                            ?>
                            <div class="icon-list-box flex flex-col sm:items-center">
                                <?php if(!empty($wc_list_icon)){ ?>
                                    <div class="icon-img mb-30 mxl:mb-10">
                                        <?php echo wp_get_attachment_image( $wc_list_icon ,'thumb_80'); ?>
                                    </div>
                                <?php } ?>
                                <?php if(!empty($wc_list_title) || !empty($wc_list_content)){ ?>
                                    <div class="wc-list-info sm:text-center">
                                        <?php if(!empty($wc_list_title)){ ?>
                                            <div class="h6 wc-col-txt text-17 uppercase text-white mb-15 mxl:mb-10"><?php echo $wc_list_title; ?></div>
                                        <?php } ?>
                                        <?php if(!empty($wc_list_content)){ ?>
                                            <p class="text-16 text-white sm:text-center">
                                                <?php echo $wc_list_content; ?>
                                            </p>
                                        <?php } ?>
                                    </div>
                                <?php } ?>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <?php if(!empty($wc_cta || $wc_cta_red)) {?>
                <div class="bottom-btn flex justify-center gap-15 sm:flex-col sm:items-center">
                    <?php
                        if ( $wc_cta ) {
                            echo lonestartrailerparts_acf_button( $wc_cta, 'site-btn outline-btn');
                        }
                        if ( $wc_cta_red ) {
                            echo lonestartrailerparts_acf_button( $wc_cta_red, 'site-btn btn-bright-red');
                        }
                    ?>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<?php } ?>