<?php
/**
 * Block Name: Content Grid
 *
 * The template for displaying the custom gutenberg block
 *
 * @link https://www.advancedcustomfields.com/resources/blocks/
 *
 * @package lonestartrailerparts
 * @since 1.0.0
 */
// create id attribute for specific styling
$id = 'content-grid' . $block['id'];
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

// Bl0ock Fields.
$cg_choose_variation = isset($block_fields['lstp_cg_choose_variation']) ? $block_fields['lstp_cg_choose_variation'] : null;
$location_grid_list  = isset($block_fields['lstp_location_grid_list']) ? $block_fields['lstp_location_grid_list'] : null;
$ig_list             = isset($block_fields['lstp_ig_list']) ? $block_fields['lstp_ig_list'] : null;
?>
<?php if ($cg_choose_variation == 'grid-variation1'){ ?>
    <!-- Variation 1 -->
    <?php if ($location_grid_list){ ?>
        <section class="loaction-wrap-gv1 <?php echo $align_class . '' . $class_name . '' . $name; ?>">
            <div class="loaction-section <?php echo $cg_choose_variation; ?>">
                <?php
                    foreach($location_grid_list as $lg_list){
                        $lgl_first_image   = $lg_list['lstp_lgl_first_image'];
                        $lgl_second_image  = $lg_list['lstp_lgl_second_image'];
                        $lgl_title         = $lg_list['lstp_lgl_title'];
                        $lgl_phoneno       = $lg_list['lstp_lgl_phoneno'];
                        $lgl_address_link  = $lg_list['lstp_lgl_address_link'];
                            if(!empty($lgl_first_image) || !empty($lgl_second_image) || !empty($lgl_title) || !empty($lgl_phoneno)) {
                ?>
                    <div class="loc-parts">
                        <?php if (!empty($lgl_first_image) || !empty($lgl_second_image)){ ?>
                            <div class="<?php echo (!empty($lgl_first_image) && !empty($lgl_second_image)) ? 'do-part' : 'do-part-single'; ?>">
                                <?php if (!empty($lgl_first_image)){ ?>
                                    <div class="location-img1 location-image">
                                        <?php echo wp_get_attachment_image($lgl_first_image, 'thumb_400'); ?>
                                    </div>
                                <?php } ?>
                                <?php if (!empty($lgl_second_image)){ ?>
                                    <div class="location-img2 location-image">
                                        <?php echo wp_get_attachment_image($lgl_second_image, 'thumb_400'); ?>
                                    </div>
                                <?php } ?>
                            </div>
                        <?php } ?>
                        <?php if (!empty($lgl_title) || !empty($lgl_phoneno) || !empty($lgl_address_link) ) { ?>
                            <div class="location-info">
                                <?php if (!empty($lgl_title)){ ?>
                                    <?php if (!empty($lgl_address_link)){ ?>
                                        <a class="outline-btn" target="<?php echo $lgl_address_link['target'];?>" href="<?php echo $lgl_address_link['url'];?>">
                                        <?php } ?>
                                            <div class="location-title">
                                                <h4 class="title">
                                                    <?php echo $lgl_title;?>
                                                </h4>
                                            </div>
                                        <?php if (!empty($lgl_address_link)){ ?>
                                        </a>
                                    <?php } ?>
                                <?php } ?>
                                <?php if(!empty($lgl_phoneno)) {?>
                                    <div class="location-btn"><?php echo lonestartrailerparts_acf_button( $lgl_phoneno, 'button link-btn');  ?></div>
                                <?php } ?>
                            </div>
                        <?php } ?>
                    </div>
                <?php } } ?>
            </div>
        </section>
    <?php } ?>
<?php } else { ?>
    <?php if ( !empty($ig_list) ){  ?>
    <!-- Variation 2 -->
    <section class="loaction-wrap-gv2 <?php echo $align_class . '' . $class_name . '' . $name; ?>">
        <div class="loaction-section <?php echo $cg_choose_variation; ?>">
            <?php
                foreach($ig_list as $list_des){
                    $ig_icon      = $list_des['lstp_ig_icon'];
                    $ig_title     = $list_des['lstp_ig_title'];
                    $ig_sub_title = $list_des['lstp_ig_sub_title'];
                    $ig_content   = $list_des['lstp_ig_content'];
                    if (!empty($ig_icon) || !empty($ig_title) || !empty($ig_sub_title) || !empty($ig_content)){
            ?>
                <div class="icon-parts">
                    <?php if (!empty($ig_icon)){ ?>
                        <div class="icon-img">
                            <?php echo wp_get_attachment_image($ig_icon, 'thumb_100'); ?>
                        </div>
                    <?php } ?>
                    <?php if (!empty($ig_title)){ ?>
                        <div class="icon-sub-title">
                            <h3 class="heading-title"><?php echo $ig_title; ?></h3>
                        </div>
                    <?php } ?>
                    <?php if (!empty($ig_sub_title)){ ?>
                        <div class="icon-title">
                            <?php echo $ig_sub_title; ?>
                        </div>
                    <?php } ?>
                    <div class="hr-line-sm"></div>
                    <?php if (!empty($ig_content)){ ?>
                        <div class="icon-desc">
                            <?php echo $ig_content; ?>
                        </div>
                    <?php } ?>
                </div>
            <?php } } ?>
        </div>
    </section>
    <?php } ?>
<?php } ?>