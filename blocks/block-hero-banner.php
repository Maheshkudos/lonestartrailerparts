<?php
/**
 * Block Name: Hero Banner
 *
 * The template for displaying the custom gutenberg block
 *
 * @link https://www.advancedcustomfields.com/resources/blocks/
 *
 * @package lonestartrailerparts
 * @since 1.0.0
 */

// create id attribute for specific styling
$id = 'hero-banner' . $block['id'];
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
$choose_banner_style       = ( isset( $block_fields['lstp_banner_slider_image'] ) ) ? $block_fields['lstp_banner_slider_image'] : null;
$banner_sliders            = ( isset( $block_fields['lstp_banner_slider'] ) ) ? $block_fields['lstp_banner_slider'] : null;
$banner_title              = ( isset( $block_fields['lstp_banner_title'] ) ) ? $block_fields['lstp_banner_title'] : null;
$banner_subtitle           = ( isset( $block_fields['lstp_banner_subtitle'] ) ) ? $block_fields['lstp_banner_subtitle'] : null;
$banner_content            = ( isset( $block_fields['lstp_banner_content'] ) ) ? $block_fields['lstp_banner_content'] : null;
$banner_cta                = ( isset( $block_fields['lstp_banner_cta'] ) ) ? $block_fields['lstp_banner_cta'] : null;
$banner_cta_red            = ( isset( $block_fields['lstp_banner_cta_red'] ) ) ? $block_fields['lstp_banner_cta_red'] : null;
$banner_background_image   = ( isset( $block_fields['lstp_banner_bg_image'] ) ) ? $block_fields['lstp_banner_bg_image'] : null;
?>
<?php
    if($choose_banner_style == 'slider'){
        if($banner_sliders) {
?>
<section class="full-width-layout site-banner lg-banner <?php echo $align_class . '' . $class_name . '' . $name; ?>">
    <?php if(!is_product()) { ?>
    <?php if (is_active_sidebar('header-sidebar')) { ?>
        <div class="search-filter-header bg-air-force-blue banner-div-search hidden md:block">
            <div class="search-form-inside px-20">
                <div class="filter-drop"> <?php dynamic_sidebar( 'header-sidebar' ); ?> </div>
            </div>
        </div>
    <?php } } ?>
    <div class="slick-banner-slider">
        <?php
            $banner_sliders_count = 0;
            foreach($banner_sliders as $banner_slider) {
                $slider_title          = $banner_slider['lstp_slider_title'];
                $slider_subtitle       = $banner_slider['lstp_slider_subtitle'];
                $slider_content        = $banner_slider['lstp_slider_content'];
                $slider_cta            = $banner_slider['lstp_slider_cta'];
                $slider_cta_red        = $banner_slider['lstp_slider_cta_red'];
                $slider_background_img = $banner_slider['lstp_slider_bg_image'];
              
              if( !empty($slider_title) || !empty($slider_subtitle) || !empty($slider_content) || !empty($slider_cta) || !empty($slider_cta_red) || !empty($slider_cta_red) ){
        ?> 
        <div class="banner-img bg-no-repeat bg-cover" style="background-image: url(<?php echo wp_get_attachment_image_url($slider_background_img,'full'); ?>);">
            <div class="container">
                <div class="banner-info relative">
                    <?php if(!empty($slider_subtitle)) {?>
                    <div class="info-text flex mb-48 xl:mb-30 md:mb-20">
                        <div class="tag-item flex items-center gap-13">
                            <span class="tag-icon-round rounded-full w-20 h-20 flex items-center justify-center bg-white"></span>
                            <p class="tag-title"><?php echo $slider_subtitle; ?></p>
                        </div>
                    </div>
                    <?php } ?>
                    <?php
                        if(!empty($slider_title)) {
                            if ($banner_sliders_count == 0) {
                    ?>
                        <h1 class="page-title"> <?php echo $slider_title;?> </h1>
                    <?php } else { ?>
                        <div class="page-title h1"> <?php echo $slider_title;?></div>
                    <?php } } ?>
                    <?php if(!empty($slider_content)) {?>
                        <div class="banner-desc">
                            <span><?php echo $slider_content; ?></span>
                        </div>
                    <?php } ?>
                    <?php if(!empty($slider_cta || $slider_cta_red)) {?>
                        <div class="banner-btn">
                            <?php
                                if ( $slider_cta ) {
                                    echo lonestartrailerparts_acf_button( $slider_cta, 'site-btn outline-btn');
                                }

                                if ( $slider_cta_red ) {
                                    echo lonestartrailerparts_acf_button( $slider_cta_red, 'site-btn btn-bright-red');
                                }
                            ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
          <?php } ?>
        </div>
        <?php $banner_sliders_count++; } ?>
    </div>
</section>
<?php } } else { ?>
<?php if($banner_title || $banner_subtitle || $banner_content || $banner_background_image || $banner_cta || $banner_cta_red ) { ?>
<section class="full-width-layout site-banner lg-banner <?php echo $align_class . '' . $class_name . '' . $name; ?>">
    <div class="banner-img bg-no-repeat bg-cover" style="background-image: url(<?php echo wp_get_attachment_image_url($banner_background_image,'full'); ?>);">
        <div class="container">
            <div class="banner-info relative">
                <?php if(!empty($banner_subtitle)) {?>
                    <div class="info-text flex mb-48 xl:mb-30 md:mb-20">
                        <div class="tag-item flex items-center gap-13">
                            <span class="tag-icon-round rounded-full w-20 h-20 flex items-center justify-center bg-white"></span>
                            <p class="tag-title"><?php echo $banner_subtitle; ?></p>
                        </div>
                    </div>
                <?php } ?>
                <?php if(!empty($banner_title)) {?>
                    <h1 class="page-title"><?php echo $banner_title; ?></h1>
                <?php } ?>
                <?php if(!empty($banner_content)) {?>
                    <div class="banner-desc">
                        <span><?php echo $banner_content; ?></span>
                    </div>
                <?php } ?>
                <?php if(!empty($banner_cta || $banner_cta_red)) {?>
                    <div class="banner-btn">
                        <?php
                            if ( $banner_cta ) {
                                echo lonestartrailerparts_acf_button( $banner_cta, 'site-btn outline-btn');
                            }

                            if ( $banner_cta_red ) {
                                echo lonestartrailerparts_acf_button( $banner_cta_red, 'site-btn btn-bright-red');
                            }
                        ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>
<?php  }  } ?>
