<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package lonestartrailerparts
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="robots" content="index, follow">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<?php
	$option_fields              = get_fields( 'option' );
	$header_logo 		        = ( isset( $option_fields['lstp_header_logo'] ) ) ? $option_fields['lstp_header_logo'] : null;
	$header_address_information = ( isset( $option_fields['lstp_header_address_information'] ) ) ? $option_fields['lstp_header_address_information'] : null;
?>
<div id="page" class="site">
	<header id="masthead" class="site-header">
		<div class="top-bar relative bg-bright-red">
			<div class="container">
				<div class="header-top flex items-center">
					<?php if(!empty($header_address_information)){ ?>
						<div class="cl-left">
							<ul class="flex">
								<?php
									foreach($header_address_information as $address_list){
										$top_header_title       = $address_list['top_header_title'];
										$top_header_icon        = $address_list['top_header_icon'];
										$top_header_link_text   = $address_list['top_header_link_text'];
										$top_header_links       = $address_list['top_header_links'];
										$top_header_text        = $address_list['top_header_text'];
								?>
								<li>
									<?php if($top_header_link_text == 'text'){ ?>
										<?php if( !empty($top_header_link_text) || !empty($top_header_icon) ){ ?>
											<?php echo wp_get_attachment_image( $top_header_icon, "address-square"); ?>
											<span><?php echo $top_header_text; ?></span>
										<?php } ?>
									<?php } else { ?>
										<?php if (!empty($top_header_icon)) { ?>
											<?php echo wp_get_attachment_image($top_header_icon, "address-square"); ?>
										<?php } ?>
										<?php if(!empty($top_header_title)){ ?>
											<span><?php echo $top_header_title; ?></span>
										<?php } ?>
										<?php if(!empty($top_header_title)){ ?>
											<?php echo lonestartrailerparts_acf_button($top_header_links, ''); ?>
										<?php } ?>
									<?php } ?>
								</li>
								<?php } ?>
							</ul>
						</div>
					<?php } ?>
					<?php
						$menu_exists = wp_nav_menu(array('theme_location' => 'topheader', 'menu_class'  => 'flex items-center top-rft-side', 'menu_id' => 'topheader', 'echo' => false));
						if ($menu_exists) {
					?>
						<div class="cl-right"> <?php echo $menu_exists; ?> </div>
					<?php } ?>
				</div>
			</div>
		</div>
		<div class="bottom-header bg-light-white">
			<div class="container">
				<div class="header-row flex flex-wrap justify-between">
					<?php if (!empty($header_logo) || has_custom_logo()) { ?>
						<div class="header-left site-branding">
							<div class="site-logo">
								<?php if (!empty($header_logo)) { ?>
									<a href="<?php echo esc_url(home_url('/')); ?>">
										<?php echo wp_get_attachment_image($header_logo, 'thumb_200'); ?>
									</a>
								<?php } elseif (has_custom_logo()) { ?>
									<?php the_custom_logo(); ?>
								<?php } ?>
							</div><!-- .site-branding -->
						</div>
					<?php } ?>
					<div class="header-right">
                        <div class="cl-right">
						<div class="responsive-block-menu">
                                <div class="mobile-navigation-icon" id="mobile-menu-trigger">
                                    <i></i>
                                </div>
                                <!--====================  mobile menu overlay ====================-->
                                <div class="mobile-menu-overlay" id="mobile-menu-overlay">
                                    <div class="mobile-menu-overlay__inner">
                                        <div class="mobile-menu-overlay__header">
                                            <div class="mobile-menu-content text-right">
                                                <span class="mobile-navigation-close-icon"
                                                    id="mobile-menu-close-trigger"></span>
                                            </div>
                                        </div>
                                        <div class="mobile-menu-overlay__body">
                                            <nav class="offcanvas-navigation">
                                                <div class="menu-main-navigation-container 123">
													<?php wp_nav_menu(array('theme_location' => "header", 'menu_class' => "site-navigation menu", 'menu_id' => "primary-menu", 'container' => "div", 'container_class' => "", 'container_id' => "", ) ); ?>
                                                </div>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                                <!--====================  End of mobile menu overlay  ====================-->
                            </div>
                            <nav id="site-navigation" class="main-navigation 456">
                                <div class="menu-main-navigation-container">
									<?php wp_nav_menu(array('theme_location' => 'header', 'menu_id' => 'header', ) ); ?>
                                </div>
                            </nav>
                        </div>
						<?php if(!is_product()) { ?>
						<?php if (is_active_sidebar('header-sidebar')) { ?>
                        <div class="search-filter-header bg-air-force-blue md:hidden">
                            <div class="search-form-inside mxl:pl-20">
                                <div class="filter-drop home-search">
									<?php dynamic_sidebar( 'header-sidebar' ); ?>
                                </div>
                            </div>
                        </div>
						<?php } } ?>
                    </div>
				</div>
			</div>
		</div>
	</header><!-- #masthead -->
	<div id="content" class="site-content">
		<div class="container">
		<!-- site-content-inner -->
		<?php if(!is_front_page()){
			// innerbanner fields
			$block_fields           = get_fields( $block['id'] );
			$lbd_banner_sub_title   = isset($block_fields['lbd_banner_sub_title']) ? $block_fields['lbd_banner_sub_title'] : null;
			$lbd_banner_cta         = isset($block_fields['lbd_banner_cta']) ? $block_fields['lbd_banner_cta'] : null;
			$lbd_banner_cta_red     = isset($block_fields['lbd_banner_cta_red']) ? $block_fields['lbd_banner_cta_red'] : null;

			// options fields
			$option_fields          = get_fields( 'option' );
			$banner                 = isset( $option_fields['lstp_inner_banner'] ) ? $option_fields['lstp_inner_banner'] : null;
			$inner_banner_title     = isset( $option_fields['lstp_inner_banner_title'] ) ? $option_fields['lstp_inner_banner_title'] : null;
			$inner_banner_sub_title = isset( $option_fields['lstp_inner_banner_sub_title'] ) ? $option_fields['lstp_inner_banner_sub_title'] : null;
			$inner_banner_cta       = isset( $option_fields['lstp_inner_banner_cta_outline'] ) ? $option_fields['lstp_inner_banner_cta_outline'] : null;
			$inner_banner_cta_red   = isset( $option_fields['lstp_inner_banner_cta_red'] ) ? $option_fields['lstp_inner_banner_cta_red'] : null;

			$page_title_404  = isset( $option_fields['lstp_404_page_title'] ) ? $option_fields['lstp_404_page_title'] : null;

			/*inner_page_banner*/
			$image    = wp_get_attachment_image_src(get_post_thumbnail_id( get_the_ID() ), 'thumb_2000' );
			$thumb    = wp_get_attachment_image_src(get_post_thumbnail_id(wc_get_page_id('shop')), 'thumb_2000');

			global $wp_query;
			$cat = $wp_query->get_queried_object();
			$thumbnail_id = get_term_meta($cat->term_id, 'thumbnail_id', true);
			$catimage = wp_get_attachment_url($thumbnail_id);
			$image = empty($image) ? $banner['url'] : $image[0];
			$thumb = empty($thumb) ? $banner['url'] : $thumb[0];
			$catimage = empty($catimage) ? $banner['url'] : $catimage;
		?>
		<?php if (is_404() || is_search()) { ?>
			<section class="banner-section inner-banner bg-blue-overlay bg-no-repeat bg-center bg-cover relative full-width-layout" style="background-image: url('<?php echo $banner['url']; ?>');">
		<?php } elseif (is_shop()) { ?>
			<section class="banner-section inner-banner bg-blue-overlay bg-no-repeat bg-center bg-cover relative full-width-layout" style="background-image: url('<?php echo $thumb; ?>');">
		<?php } elseif (is_product_category()) { ?>
			<section class="banner-section inner-banner bg-blue-overlay bg-no-repeat bg-center bg-cover relative full-width-layout" style="background-image: url('<?php echo $catimage; ?>');">
		<?php } else { ?>
			<section class="banner-section inner-banner bg-blue-overlay bg-no-repeat bg-center bg-cover relative full-width-layout" style="background-image: url('<?php echo $image; ?>');">
		<?php } ?>
			<div class="container">
				<div class="banner-info relative md:flex-wrap md:gap-y-25">
					<?php if(is_404()){ ?>
						<h1 class="text-white"><?php echo $page_title_404; ?></h1>
					<?php } elseif((is_page() && !empty($image)) || is_single()){ ?>
						<div class="inr-banner-cnt">
							<h1 class="heading-title h2 uppercase font-black text-white"><?php echo the_title(); ?></h1>
							<?php if(!empty($lbd_banner_sub_title)) {?>
								<span class="sub-title text-28 mx:text-24 md:text-18 font-medium text-white"><?php echo $lbd_banner_sub_title; ?></span>
							<?php } ?>
						</div>
						<?php if(!empty($lbd_banner_cta || $lbd_banner_cta_red || $inner_banner_cta || $inner_banner_cta_red)) { ?>
							<div class="banner-btn flex gap-x-12 justify-end md:justify-start">
								<?php
									if ( $lbd_banner_cta ) {
										echo lonestartrailerparts_acf_button( $lbd_banner_cta, 'site-btn outline-btn');
									}else{
										echo lonestartrailerparts_acf_button( $inner_banner_cta, 'site-btn outline-btn');
									}
									if ( $lbd_banner_cta_red ) {
										echo lonestartrailerparts_acf_button( $lbd_banner_cta_red, 'site-btn btn-bright-red');
									}
									else{
										echo lonestartrailerparts_acf_button( $inner_banner_cta_red, 'site-btn btn-bright-red');
									}
								?>
							</div>
						<?php } ?>
					<?php } elseif(is_search() ){ ?>
					<?php
						printf( esc_html__( ' %s', 'lonestartrailerparts' ), '<h1 class="text-white">' . get_search_query() . '</h1>' );
					?>
					<?php } elseif(is_shop()){ ?>
						<?php
							$post_id               = get_option( 'woocommerce_shop_page_id' );
							$shop_banner_sub_title = get_field('lbd_banner_sub_title',$post_id);
							$shop_banner_cta       = get_field('lbd_banner_cta',$post_id);
							$shop_banner_cta_red   = get_field('lbd_banner_cta_red',$post_id);
						?>
						<div class="inr-banner-cnt">
							<h1 class="text-white"><?php echo woocommerce_page_title(); ?></h1>
							<?php if(!empty($shop_banner_sub_title)) {?>
								<span class="sub-title text-28 mx:text-24 md:text-18 font-medium text-white"><?php echo $shop_banner_sub_title; ?></span>
							<?php } ?>
						</div>
						<?php if(!empty($shop_banner_cta || $shop_banner_cta_red)) { ?>
							<div class="banner-btn flex gap-x-12 justify-end md:justify-start">
								<?php
									if ( $shop_banner_cta ) {
										echo lonestartrailerparts_acf_button( $shop_banner_cta, 'site-btn outline-btn');
									}else{
										echo lonestartrailerparts_acf_button( $inner_banner_cta, 'site-btn outline-btn');
									}
									if ( $shop_banner_cta_red ) {
										echo lonestartrailerparts_acf_button( $shop_banner_cta_red, 'site-btn btn-bright-red');
									}
									else{
										echo lonestartrailerparts_acf_button( $inner_banner_cta_red, 'site-btn btn-bright-red');
									}
								?>
							</div>
						<?php } ?>
					<?php } elseif(is_category() || is_product_category()){ ?>
						<div class="inr-banner-cnt">
							<h1 class="text-white"><?php echo $cat->name; ?></h1>
							<?php if(!empty($lbd_banner_sub_title)) { ?>
								<span class="sub-title text-28 mx:text-24 md:text-18 font-medium text-white"><?php echo $lbd_banner_sub_title; ?></span>
							<?php } ?>
						</div>
						<?php if(!empty($lbd_banner_cta || $lbd_banner_cta_red || $inner_banner_cta || $inner_banner_cta_red)) { ?>
							<div class="banner-btn flex gap-x-12 justify-end md:justify-start">
								<?php
									if ( $lbd_banner_cta ) {
										echo lonestartrailerparts_acf_button( $lbd_banner_cta, 'site-btn outline-btn');
									}else{
										echo lonestartrailerparts_acf_button( $inner_banner_cta, 'site-btn outline-btn');
									}
									if ( $lbd_banner_cta_red ) {
										echo lonestartrailerparts_acf_button( $lbd_banner_cta_red, 'site-btn btn-bright-red');
									}
									else{
										echo lonestartrailerparts_acf_button( $inner_banner_cta_red, 'site-btn btn-bright-red');
									}
								?>
							</div>
						<?php } ?>
					<?php } else { ?>
						<div class="inr-banner-cnt">
							<h1 class="text-white"><?php the_title(); ?></h1>
							<?php if(!empty($lbd_banner_sub_title)) {?>
								<span class="sub-title text-28 mx:text-24 md:text-18 font-medium text-white"><?php echo $lbd_banner_sub_title; ?></span>
							<?php } ?>
						</div>
						<?php if(!empty($lbd_banner_cta || $lbd_banner_cta_red)) { ?>
							<div class="banner-btn flex gap-x-12 justify-end md:justify-start">
								<?php
									if ( $lbd_banner_cta ) {
										echo lonestartrailerparts_acf_button( $lbd_banner_cta, 'site-btn outline-btn');
									}else{
										echo lonestartrailerparts_acf_button( $inner_banner_cta, 'site-btn outline-btn');
									}
									if ( $lbd_banner_cta_red ) {
										echo lonestartrailerparts_acf_button( $lbd_banner_cta_red, 'site-btn btn-bright-red');
									}
									else{
										echo lonestartrailerparts_acf_button( $inner_banner_cta_red, 'site-btn btn-bright-red');
									}
								?>
							</div>
						<?php } ?>
					<?php } ?>
				</div>
			</div>
		</section>
		<?php } ?>