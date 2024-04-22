<?php
/**
 * Block Name: Custom Spacer
 * The template for displaying the custom gutenberg block
 * @link https://www.advancedcustomfields.com/resources/blocks/
 * @package lonestartrailerparts
 * @since 1.0.0
 */
// create id attribute for specific styling
$id = 'custom-spacer' . $block['id'];
// Meta fields related to current block
$block_fields = get_fields( $block['id'] );
// Get the class name for the block to be used for it.
$class_name = isset($block['className']) ? $block['className'] : '';

$spacer = $block_fields['lstp_cs_spacer'];

if($spacer == 'Select Value') { $spacer = ''; } else { $spacer = 'space-'.$spacer; }

if(!empty($spacer)){
?>
<div class="flcustom-spacer <?php echo $spacer; ?>"></div>
<?php } ?>