<?php
/**
 * Block Name: Form
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
$id = 'gravity-form' . $block['id'];
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
$gf_title          = isset($block_fields['lstp_gf_title']) ? $block_fields['lstp_gf_title'] : null;
$gf_sub_title      = isset($block_fields['lstp_gf_sub_title']) ? $block_fields['lstp_gf_sub_title'] : null;
$gf_hours_section  = isset($block_fields['lstp_gf_hours_section'])?$block_fields['lstp_gf_hours_section']:null;
$sd_store_detail   = isset($block_fields['lstp_sd_store_detail'])?$block_fields['lstp_sd_store_detail']:null;
$gf_form           = isset($block_fields['lstp_gf_form']) ? $block_fields['lstp_gf_form'] : null;

if(!empty($gf_title) || !empty($gf_sub_title) || !empty($gf_hours_section) || !empty($sd_store_detail) || !empty($gf_form) ) {
?>
<section class="contact-form <?php echo $align_class . '' . $class_name . '' . $name; ?>">
    <?php if(!empty($gf_title)) { ?>
        <h3><?php echo $gf_title; ?></h3>
    <?php } ?>
    <div class="grid grid-cols-2 mx:grid-cols-1 gap-50 mx:gap-30 pt-50 mx:pt-20">
        <div class="location-content ">
            <div class="location-content-info">
                <div class="hours-presentation mx:mb-20">
                    <?php if(!empty($gf_sub_title)) { ?>
                        <h4 class="mb-10"><?php echo $gf_sub_title; ?></h4>
                    <?php } ?>
                    <?php if(!empty($gf_hours_section)) { ?>
                        <div class="item-col hours-block mxs:mb-20">
                            <?php
                                foreach($gf_hours_section as $hours_list){
                                    $gf_hours_comment  = $hours_list['lstp_gf_hours_comment'];
                                    $gf_hours_detail   = $hours_list['lstp_gf_hours_detail'];
                                        foreach ($gf_hours_detail as $key) {
                                            $gf_day   = $key['lstp_gf_day'];
                                            $gf_hours = $key['lstp_gf_hours'];
                                                if(!empty($gf_day) || !empty($gf_hours)){
                            ?>
                            <div class="hourslist">
                                <?php if(!empty($gf_day)){ ?>
                                    <h6 class="title"><?php echo $gf_day; ?></h6>
                                <?php } ?>
                                <?php if(!empty($gf_hours)){ ?>
                                    <span><?php echo $gf_hours; ?></span>
                                <?php } ?>
                            </div>
                            <?php } } ?>
                            <?php if(!empty($gf_hours_comment)) { ?>
                                <div class="closed-evryday hourslist"><h5 class="title mb-0"><?php echo $gf_hours_comment; ?></h5></div>
                            <?php } } ?>
                        </div>
                    <?php } ?>
                </div>
                <?php if(!empty($sd_store_detail)){ ?>
                    <div class="store-presentation pt-30 mx:pt-0">
                        <div class="item-col store-block">
                            <ul class="my-0">
                                <?php
                                    foreach($sd_store_detail as $store_list){
                                        $store_icon   = $store_list['lstp_sd_icon'];
                                        $store_link   = $store_list['lstp_sd_links'];
                                            if(!empty($store_icon) || !empty($store_link)){
                                ?>
                                    <li>
                                        <?php echo wp_get_attachment_image( $store_icon, "address-square"); ?>
                                        <?php if(!empty($store_link)){ ?>
                                            <a href="<?php echo $store_link['url']; ?>" target="<?php echo $store_link['target']; ?>"> <?php echo $store_link['title']; ?></a>
                                        <?php } ?>
                                    </li>
                                <?php } } ?>
                            </ul>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <?php if(!empty($gf_form)) { ?>
            <?php
                if($gf_form){
                    echo do_shortcode('[gravityform id="'.$gf_form.'" title="false" description="false" ajax="true"]');
                }
            ?>
        <?php } ?>
    </div>
</section>
<?php } ?>