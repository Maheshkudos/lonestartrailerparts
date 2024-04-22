<?php
/**
 * Block Name: Content Along Side Slider
 *
 * The template for displaying the custom gutenberg block
 *
 * @link https://www.advancedcustomfields.com/resources/blocks/
 *
 * @package lonestartrailerparts
 * @since 1.0.0
 */
// create id attribute for specific styling
$id = 'content-along-side-slider' . $block['id'];
// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';
// Get the class name for the block to be used for it.
$class_name = ( isset( $block['className'] ) ) ? $block['className'] : null;
// Meta fields related to current block
$block_fields = get_fields( $block['id'] );

// Making the unique ID for the block.
if ( $block['name'] ) {
	$block_name = $block['name'];
	$block_name = str_replace( '/', '-', $block_name );
	$name       = 'block-' . $block_name;
}

//Block Fields
$cass_info_slider  = ( isset( $block_fields['lstp_cass_content_information'] ) ) ? $block_fields['lstp_cass_content_information'] : null;
$cass_bg_image     = ( isset( $block_fields['lstp_cass_background_image'] ) ) ? $block_fields['lstp_cass_background_image'] : null;
if(!empty($cass_info_slider) || !empty($cass_bg_image)){
?>
    <section class="content-along-side-slider full-width-layout bg-blue-overlay <?php echo $align_class . '' . $class_name . '' . $name; ?>" style="background-image: url('<?php echo wp_get_attachment_image_url($cass_bg_image,'full'); ?>');">
        <div class="container relative z-10">
            <?php if(!empty($cass_info_slider)){ ?>
                <div class="custom-slider-arrows">
                    <button class="prev-btn arrow-btn"></button>
                    <button class="next-btn arrow-btn"></button>
                </div>
            <?php } ?>
            <?php if(!empty($cass_info_slider)){ ?>
                <div class="content-slider">
                    <?php
                        foreach($cass_info_slider as $cass_info){
                            $cass_info_title    = $cass_info['lstp_cass_title'];
                            $cass_info_subtitle = $cass_info['lstp_cass_sub_title'];
                            $cass_info_desc     = $cass_info['lstp_cass_description'];
                            $cass_info_lists    = $cass_info['lstp_cass_content_lists'];
                            $cass_info_link     = $cass_info['lstp_cass_link'];
                            $cass_info_img      = $cass_info['lstp_cass_image'];
                            $left_class = !empty($cass_info_img) ? 'cl-left' : 'w-full';
                    ?>
                    <div class="content-slider-item">
                        <?php if(!empty($cass_info_title) || !empty($cass_info_subtitle) || !empty($cass_info_desc) || !empty($cass_info_lists)){ ?>
                            <div class="<?php echo $left_class; ?>">
                                <?php if(!empty($cass_info_subtitle)){ ?>
                                    <div class="info-text flex mb-25 md:mb-15">
                                        <div class="tag-item flex items-center gap-13">
                                            <span class="tag-icon-round rounded-full w-20 h-20 flex items-center justify-center bg-white"></span>
                                            <div class="tag-title"><?php echo $cass_info_subtitle; ?></div>
                                        </div>
                                    </div>
                                <?php } ?>
                                <?php if(!empty($cass_info_title)){ ?>
                                    <h3 class="heading-title text-white h2-size mb-40 xl:mb-25"><?php echo $cass_info_title; ?></h3>
                                <?php } ?>
                                <?php if(!empty($cass_info_desc)){ ?>
                                    <p class="sub-heading text-white text-28 mb-40 xl:text-24 xl:mb-30 lg:text-19"><?php echo $cass_info_desc; ?></p>
                                <?php } ?>
                                <?php if(!empty($cass_info_lists)){ ?>
                                    <ul class="content-details-list">
                                        <?php
                                            foreach($cass_info_lists as $cass_info_list){
                                                $textlink = $cass_info_list['lstp_cass_textlink'];
                                                $list_link = $cass_info_list['lstp_cass_list_link'];
                                                $list_text = $cass_info_list['lstp_cass_text'];
                                                if(!empty($list_link) || !empty($list_text)){
                                        ?>
                                            <li class="text-white content-lists">
                                                <?php
                                                    if($textlink['value'] == 'text'){
                                                        echo $list_text;
                                                    } else {
                                                ?>
                                                    <a href="<?php echo esc_url($list_link['url']); ?>" class="blue-hover" target="<?php echo ($list_link['target']); ?>"><?php echo $list_link['title']; ?></a>
                                                <?php } ?>
                                            </li>
                                        <?php } } ?>
                                    </ul>
                                <?php } ?>
                            </div>
                        <?php } ?>
                        <?php if(!empty($cass_info_img) || !empty($cass_info_link) ){ ?>
                            <div class="cl-right">
                                <a href="<?php echo esc_url($cass_info_link['url']);?>" target="<?php echo $cass_info_link['target']; ?>">
                                    <?php if(empty($cass_info_title) || empty($cass_info_subtitle) || empty($cass_info_desc) || empty($cass_info_lists)){ ?>
                                        <?php echo wp_get_attachment_image($cass_info_img,'full'); ?>
                                    <?php } else { ?>
                                        <?php if(!empty($cass_info_img) ){ ?>
                                            <?php echo wp_get_attachment_image($cass_info_img,'thumb_650'); ?>
                                        <?php } ?>
                                    <?php } ?>
                                </a>
                            </div>
                        <?php } ?>
                    </div>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    </section>
<?php }