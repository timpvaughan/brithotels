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
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content" title="Link to Screen Reader"><?php esc_html_e( 'Skip to content', 'brithotels' ); ?></a>

	<header id="masthead" class="site-header">
		<?php
			$telephone = get_field('brithotels_telephone',  'option');
		?>
        <div class="call-btn">
            <a href="tel:<?php echo $telephone; ?>" title="Call Brit Hotels London Court"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon/call.svg" alt=""></a>
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
						<h4><?php esc_html_e('London Court', 'brithotels'); ?></h4>
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
                                <h1><?php esc_html_e('London Court', 'brithotels'); ?></h1>
                            <?php else: ?>
                                <h4><a href="<?php echo esc_url(network_site_url('/london-court')) ?>"><?php esc_html_e('London Court', 'brithotels'); ?></a></h4>
                            <?php endif; ?>
	                        <?php
	                        $current_post_id = intval(get_the_ID());
	                        $book_now_url = get_field('_book_now', $current_post_id);
	                        ?>
                            <a href="<?php echo $book_now_url; ?>" class="btn hotel-list-book-now" title="Book a Brit Hotels Room">Book Now <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon/book.svg" alt=""></a>
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
                <a href="#" class="toggle-menu"><i class="las la-angle-up"></i> Hotels <i class="las la-star"></i><i class="las la-star"></i><i class="las la-star"></i> <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon/hotel.svg" alt=""></a>
                <ul class="hotel-dropdown-menu" aria-label="Main menu">
					<li><a href="<?php echo get_home_url(2); ?>" title="Go to Brit Hotels London Court"><span><?php esc_html_e('London Court', 'brithotels'); ?></span></a></li>
					<li><a href="<?php echo get_home_url(3); ?>" title="Go to Brit Hotels Elephant Castle"><span><?php esc_html_e('Elephant Castle', 'brithotels'); ?></span></a></li>
					<li><a href="#" title="Brit Hotels Earls Court Opens 2021"><span><?php esc_html_e('Earls Court', 'brithotels'); ?> <br><span>(opening 2021)</span></span></a></li>
                </ul>
            </div>
            <div class="fixed-menu contact-menu">
                <a href="<?php echo esc_url($contact_page_url); ?>" title="Get in touch with Brit Hotels"><?php esc_html_e('Contact Us', 'brithotels'); ?> <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon/contact.svg" alt=""></a>
            </div>
        </div>


	<div id="content" class="site-content" role="main">