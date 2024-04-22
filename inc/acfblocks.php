<?php

/**

 * Functions for custom Gutenberg blocks

 * @link https://developer.wordpress.org/themes/functionality/acfblocks/

 * @package lonestartrailerparts

 */
/**
 * Register Custom Block Categories
 */
function lonestar_acf_block_categories( $categories, $post ) {
	return array_merge(
		$categories,
		array(
			array(
				'slug'  => 'lonestar-blocks',
				'title' => __( 'lonestar Blocks', 'puck' ),
				'icon'  => 'admin-generic',
			),
		)
	);
}

add_filter( 'block_categories', 'lonestar_acf_block_categories', 10, 2 );
/**
* Register Custom Blocks
*/
add_action( 'acf/init', 'lonestar_acf_init' );
function lonestar_acf_init() {
	// check function exists
	if ( function_exists( 'acf_register_block' ) ) {
		//register a Block Hero Banner
        acf_register_block(
            array(
                'name'            => 'hero-banner',
                'title'           => __( 'Hero Banner' ),
                'description'     => __( 'Hero Banner' ),
                'render_callback' => 'lonestar_acf_block_render_callback',
                'category'        => 'lonestar-blocks',
                'icon'            => 'slides',
                'mode'            => 'edit',
                'keywords'        => array( 'Hero Banner', 'banner'),
            )
        );
        //register a Block Trailer Parts Filter
        acf_register_block(
            array(
                'name'            => 'trailer-parts-filter',
                'title'           => __( 'Trailer Parts Filter' ),
                'description'     => __( 'Trailer Parts Filter' ),
                'render_callback' => 'lonestar_acf_block_render_callback',
                'category'        => 'lonestar-blocks',
                'icon'            => 'image-filter',
                'mode'            => 'edit',
                'keywords'        => array( 'Trailer Parts' ,'Filter' ),
            )
        );
        //register a Block Why Choose
        acf_register_block(
            array(
                'name'            => 'why-choose',
                'title'           => __( 'Why Choose' ),
                'description'     => __( 'Why Choose' ),
                'render_callback' => 'lonestar_acf_block_render_callback',
                'category'        => 'lonestar-blocks',
                'icon'            => 'index-card',
                'mode'            => 'edit',
                'keywords'        => array( 'Why' ,'Choose' ),
            )
        );
        //register a Block Image Along Side About Description
        acf_register_block(
            array(
                'name'            => 'image-along-side-about-description',
                'title'           => __( 'Image Along Side About Description' ),
                'description'     => __( 'Image Along Side About Description' ),
                'render_callback' => 'lonestar_acf_block_render_callback',
                'category'        => 'lonestar-blocks',
                'icon'            => 'table-col-before',
                'mode'            => 'edit',
                'keywords'        => array( 'Image Along Side' ,'About Description' ),
            )
        );
		//register a Block Logo Slider
        acf_register_block(
            array(
                'name'            => 'logo-slider',
                'title'           => __( 'Logo Slider' ),
                'description'     => __( 'Logo Slider' ),
                'render_callback' => 'lonestar_acf_block_render_callback',
                'category'        => 'lonestar-blocks',
                'icon'            => 'slides',
                'mode'            => 'edit',
                'keywords'        => array( 'Logo', 'Slider'),
            )
        );
        //register a Block Content Grid
        acf_register_block(
            array(
                'name'            => 'content-grid',
                'title'           => __( 'Content Grid' ),
                'description'     => __( 'Content Grid' ),
                'render_callback' => 'lonestar_acf_block_render_callback',
                'category'        => 'lonestar-blocks',
                'icon'            => 'grid-view',
                'mode'            => 'edit',
                'keywords'        => array( 'Content', 'Grid' ),
            )
        );
        //register a Block Content Along Side Slider
        acf_register_block(
            array(
                'name'            => 'content-along-side-slider',
                'title'           => __( 'Content Along Side Slider' ),
                'description'     => __( 'Content Along Side Slider' ),
                'render_callback' => 'lonestar_acf_block_render_callback',
                'category'        => 'lonestar-blocks',
                'icon'            => 'table-col-after',
                'mode'            => 'edit',
                'keywords'        => array( 'Content Along', 'Side Slider' ),
            )
        );
        //register a Block gallery
        acf_register_block(
            array(
                'name'            => 'gallery',
                'title'           => __( 'Gallery' ),
                'description'     => __( 'Gallery' ),
                'render_callback' => 'lonestar_acf_block_render_callback',
                'category'        => 'lonestar-blocks',
                'icon'            => 'images-alt',
                'mode'            => 'edit',
                'keywords'        => array( 'Gallery' ),
            )
        );
        //register a Block Contact Detail
        acf_register_block(
            array(
                'name'            => 'form',
                'title'           => __( 'Form' ),
                'description'     => __( 'Form' ),
                'render_callback' => 'lonestar_acf_block_render_callback',
                'category'        => 'lonestar-blocks',
                'icon'            => 'list-view',
                'mode'            => 'edit',
                'keywords'        => array( 'Form', 'form'),
            )
        );
        //register a Block Map Section
        //register a Block General Content
        acf_register_block(
            array(
                'name'            => 'general-content',
                'title'           => __( 'General Content' ),
                'description'     => __( 'General Content' ),
                'render_callback' => 'lonestar_acf_block_render_callback',
                'category'        => 'lonestar-blocks',
                'icon'            => 'media-text',
                'mode'            => 'edit',
                'keywords'        => array( 'General', 'Content'),
            )
        );
        //register a Block Custom Spacer
        acf_register_block(
            array(
                'name'            => 'custom-spacer',
                'title'           => __( 'Custom Spacer' ),
                'description'     => __( 'Custom Spacer' ),
                'render_callback' => 'lonestar_acf_block_render_callback',
                'category'        => 'lonestar-blocks',
                'icon'            => 'ellipsis',
                'mode'            => 'edit',
                'keywords'        => array( 'Custom', 'Spacer'),
            )
        );
	}
}

function lonestar_acf_block_render_callback( $block ) {
	$slug = str_replace( 'acf/', '', $block['name'] );
	if ( file_exists( get_theme_file_path( "/blocks/block-{$slug}.php" ) ) ) {
		include get_theme_file_path( "/blocks/block-{$slug}.php" );
	}
}

function acffunc(){
    echo "hello123";
}
add_action( 'init', 'acffunc' );