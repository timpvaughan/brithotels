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
	<!--<link href="https://fonts.googleapis.com/css2?family=Libre+Caslon+Text:wght@400&family=Montserrat:wght@200;400;500&display=swap" rel="stylesheet">-->
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville+Text:wght@400&family=Montserrat:wght@200;400;500&display=swap" rel="stylesheet">
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
			<a href="tel:<?php echo $telephone; ?>" title="Call Brit Hotels Dashboard"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon/call.svg" alt=""></a>
		</div>

		<?php
			$header_title = get_field('brithotels_header_title', 'option');
		?>
        <div class="banner banner-bg">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="banner-content">
							<?php
								the_custom_logo();
							?>

							<div class="home-ratings">
								<i class="las la-star"></i>
								<i class="las la-star"></i>
								<i class="las la-star"></i>
							</div>


                            <h1><?php echo $header_title; ?></h1>
                            <a href="#hotels" class="btn hotel-list-book-now" id="hotel-list-book-now" title="Book a Brit Hotels Room">Book Now <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon/book.svg" alt="Book now"/></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php

	        $contact_page = get_field('brithotels_page_contact', 'option');
	        //write_log($contact_page);
            $contact_page_url = ($contact_page > 0) ? get_permalink($contact_page) : '#';
        ?>

		<div class="shortcut-menu">
			<div class="fixed-menu hotel-dropdown">
				<a href="#" class="toggle-menu" title="Toggle Brit Hotels Locations"><i class="las la-angle-up"></i> <?php esc_html_e('Hotels ', 'brithotels'); ?><i class="las la-star"></i><i class="las la-star"></i><i class="las la-star"></i> <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon/hotel.svg" alt=""></a>
				<ul class="hotel-dropdown-menu" role="navigation" aria-label="Main menu">
					<li><a href="<?php echo get_home_url(3); ?>" title="Go to Brit Hotels Elephant Castle"><span><?php esc_html_e('Elephant Castle', 'brithotels'); ?> <!--<br><span>(opening Aug 2019)</span>--></span></a></li>
					<li><a href="#" title="Brit Hotels Earls Court Opens 2021"><span><?php esc_html_e('Earls Court', 'brithotels'); ?> <br><span>(opening 2021)</span></span></a></li>

				</ul>
			</div>
			<div class="fixed-menu contact-menu">
				<a href="<?php echo esc_url($contact_page_url); ?>" title="Get in touch with Brit Hotels"><?php esc_html_e('Contact Us', 'brithotels'); ?> <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon/contact.svg" alt=""></a>
			</div>
		</div>

	</header><!-- #masthead -->

	<div id="content" class="site-content" role="main">
