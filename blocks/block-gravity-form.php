<?php
/**
 * Block Name: Gravity Form
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
$gf_title     = isset($block_fields['ke_gf_title']) ? $block_fields['ke_gf_title'] : null;
$gf_sub_title = isset($block_fields['ke_gf_sub_title']) ? $block_fields['ke_gf_sub_title'] : null;
$gf_form      = isset($block_fields['ke_gf_form']) ? $block_fields['ke_gf_form'] : null;
if($ke_logo_slider || $gf_sub_title || $gf_form ){
?>
<section class="contact-form <?php echo $align_class . '' . $class_name . '' . $name; ?>">
    <div class="container">
        <?php if(!empty($gf_sub_title)) { ?>
            <h4><?php echo $gf_sub_title; ?></h4>
        <?php } ?>
        <?php if(!empty($gf_title)) { ?>
            <h3><?php echo $gf_title; ?></h3>
        <?php } ?>
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