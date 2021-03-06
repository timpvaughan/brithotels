<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Brit_Hotels
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

    <!-- Fonts -->
    <!--<link href="https://fonts.googleapis.com/css?family=Baskervville%7CLibre+Baskerville%7CMontserrat:200,400,500&display=swap" rel="stylesheet">-->
	<link href="https://fonts.googleapis.com/css2?family=Libre+Caslon+Text:wght@400&family=Montserrat:wght@200;400;500&display=swap" rel="stylesheet">
	<?php wp_head(); ?>

	<?php if (has_post_thumbnail() ):
		$url = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) );?>
		<meta property="og:image" content="<?php echo $url ?>"/>
	<?php endif;?>

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-NQW2P3X186"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'G-NQW2P3X186');
	</script>

	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-173907043-1"></script>
<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());

	gtag('config', 'UA-173907043-1');
</script>

</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'brithotels' ); ?></a>

	<header id="masthead" class="site-header">
		<?php
			$telephone = get_field('brithotels_telephone',  'option');
		?>
        <div class="call-btn">
            <a href="<?php echo $telephone; ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon/call.svg" alt=""></a>
        </div>
        <div class="hamburger-menu">
            <div class="navigation">
                <input type="checkbox" />
                <div id="menuToggle">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
				<div id="offcanvas-menu-wrapper">
					<div class="menu-logo">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/text-logo.svg" alt="" />
						<h4><?php esc_html_e('Earls Court', 'brithotels'); ?></h4>
					</div>
		            <?php
			            wp_nav_menu( array(
				            'theme_location' => 'offcanvas-menu',
				            'menu_id'        => 'offcanvas-menu',
				            'menu_class'     => 'offcanvas-menu',
			            ) );
		            ?>
				</div>
            </div>
        </div>

        <div class="banner banner-bg">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="banner-content london-court">
	                        <?php
		                        the_custom_logo();
	                        ?>
                            <?php if(is_front_page()): ?>
                                <h1><?php esc_html_e('Earls Court', 'brithotels'); ?></h1>
                            <?php else: ?>
                                <h4><a href="<?php echo esc_url(network_site_url('/earls-court/')) ?>"><?php esc_html_e('Earls Court', 'brithotels'); ?></a></h4>
                            <?php endif; ?>
	                        <?php
	                        $current_post_id = intval(get_the_ID());
	                        $book_now_url = get_field('_book_now', $current_post_id);
	                        ?>
                            <a href="<?php echo $book_now_url; ?>" class="btn hotel-list-book-now">Book Now <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon/book.svg" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<?php
		$contact_page = intval(get_field('brithotels_page_contact', 'option'));
		$contact_page_url = ($contact_page > 0) ? get_permalink($contact_page) : '#';
		?>

        <div class="shortcut-menu">
            <div class="fixed-menu hotel-dropdown">
                <a href="#" class="toggle-menu"><i class="las la-angle-up"></i> Hotels<i class="las la-star"></i><i class="las la-star"></i><i class="las la-star"></i> <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon/hotel.svg" alt=""></a>
                <ul class="hotel-dropdown-menu">
                    <li><a href="<?php echo get_home_url(3); ?>"><span><?php esc_html_e('Elephant Castle', 'brithotels'); ?> <!--<br><span>(opening Aug 2019)</span>--></span></a></li>
										<li><a href="#"><span><?php esc_html_e('Earls Court', 'brithotels'); ?> <br><span>(Coming Soon)</span></span></a></li>
                </ul>
            </div>
            <div class="fixed-menu contact-menu">
                <a href="<?php echo esc_url($contact_page_url); ?>"><?php esc_html_e('Contact Us', 'brithotels'); ?> <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon/contact.svg" alt=""></a>
            </div>
        </div>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
