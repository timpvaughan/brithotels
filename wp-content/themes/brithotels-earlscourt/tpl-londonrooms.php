<?php
	/**
	 * The template for displaying all pages
	 *
	 * Template Name: London Rooms Page
	 *
	 * This is the template that displays all pages by default.
	 * Please note that this is the WordPress construct of pages
	 * and that other 'pages' on your WordPress site may use a
	 * different template.
	 *
	 * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/
	 *
	 * @package Brit_Hotels
	 */

	get_header();
?>

<?php
	$current_post_id = intval(get_the_ID());
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="breadcrumb" typeof="BreadcrumbList" vocab="http://schema.org/">
								<?php if ( function_exists( 'bcn_display' ) ) {
									bcn_display();
								} ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="pt70 pb100">
				<div class="container">
					<div class="row">
						<div class="col">
							<header class="entry-header">
								<?php the_title( '<h1 class="entry-title page-title">', '</h1>' ); ?>
							</header><!-- .entry-header -->
						</div>
					</div>
					<div class="row">
						<div class="col">
							<div class="page-content facilities">
								<!--<p>All our high specification furnished interior designed bedrooms are equipped with the following</p>
								<ul>
									<li>Free High Speed Fibre Optic Wi-Fi</li>
									<li>SMART 32” Internet Hospitality TVs with SKY</li>
									<li>iPod Dock with alarm clock and radio</li>
									<li>1200 Pocket Sprung Mattresses</li>
									<li>Mini Fridge with complementary mineral water</li>
									<li>Individually controlled Air Conditioning</li>
									<li>3 setting hair dryer with full length mirror</li>
									<li>Tea and coffee making facilities</li>
									<li>Electronic locking safe</li>
									<li>Satin chrome power sockets with USB Port</li>
									<li>Telephone</li>
								</ul>-->
								<?php
									while ( have_posts() ) :
										the_post();

										the_content();

										//get_template_part( 'template-parts/content', 'page' );

										// If comments are open or we have at least one comment, load up the comment template.
										/*if ( comments_open() || get_comments_number() ) :
											comments_template();
										endif;*/

									endwhile; // End of the loop.
								?>
								<?php
									$book_now_url = get_field('_book_now', $current_post_id);
								?>
								<a href="<?php echo $book_now_url; ?>" class="btn btn-100">Book Now <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon/book.svg" alt=""></a>

							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="features-block black-bg pt170 pb150">
				<div class="container">
					<div class="row">
						<div class="feature-2-wrap">
							<div class="feature-2">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon/wifi.svg" class="img-fluid" alt="">
								<h5>FREE WIFI</h5>
								<p>Enjoy free Wifi throughout the hotel</p>
							</div>
							<div class="feature-2">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon/air.svg" class="img-fluid" alt="">
								<h5>Air Conditioning</h5>
								<p>Fully air conditioned rooms and premises</p>
							</div>
							<div class="feature-2">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon/shower-icon.svg" class="img-fluid" alt="">
								<h5>Power Showers</h5>
								<p>All rooms fitted with 3 setting power showers</p>
							</div>
							<div class="feature-2">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon/fridge.svg" class="img-fluid" alt="">
								<h5>Mini Fridges</h5>
								<p>Mini fridges with complementary mineral water</p>
							</div>
							<div class="feature-2">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon/bed-icon.svg" class="img-fluid" alt="">
								<h5>Comfortable Beds</h5>
								<p>Custom made 1200 pocket sprung mattresses</p>
							</div>							

						</div>
					</div>
				</div>
			</div>

			<div class="pt170 pb170 grey-bg">
				<div class="container">
					<div class="row">
						<div class="col-lg-10 offset-lg-1">
							<?php

								$lbarg = array(
									'post_type'      => 'room',
									'post_status'    => 'publish',
									//'paged'          => $paged,
									'posts_per_page' => - 1,

								);

								$posts_array = get_posts( $lbarg );
								// The Loop
								if ( sizeof( $posts_array ) == 0 ): ?>
								<?php
								else:
									//$i = 1;

									foreach ( $posts_array as $post ) : setup_postdata( $post );
										$id        = $post->ID;
										$room_title = get_the_title( $id );
										$room_link  = get_permalink( $id );


										$images = get_field( '_hotel_room_photos', $id );
										$size   = 'full'; // (thumbnail, medium, large, full or custom size)

										?>
										<div class="room-item">
											<div class="room-thumb">
												<?php if( $images ): ?>
													<?php foreach( $images as $image_id ): ?>
														<div class="item">
															<?php
																$image_attributes = wp_get_attachment_image_src( $image_id['ID'], $size);
																if(is_array($image_attributes) & isset($image_attributes[0])){
																	echo '<img src="'.$image_attributes[0].'" class="img-fluid" alt="" />';
																}

															?>

														</div>
													<?php endforeach; ?>
												<?php endif; ?>
											</div>
											<div class="body">
												<h3><?php echo esc_html($room_title); ?></h3>
												<?php
												the_content();
												?>
												<?php
													$book_now_url = get_field('_book_now', $id);
												?>
												<a href="<?php echo $book_now_url; ?>" class="btn">Book Now <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon/book.svg" alt=""></a>
											</div>
										</div>
									<?php
									endforeach;
									wp_reset_postdata();
								endif;
							?>
						</div>
					</div>
				</div>
			</div>
			
			<?php get_template_part( 'template-parts/news-section', 'page' ); ?>			
			
			<?php
				$facility_page     = intval( get_field( 'brithotels_page_facility', 'option' ) );
				$facility_page_url = ( $facility_page > 0 ) ? get_permalink( $facility_page ) : '#';
			?>

			<div class="black-bg pt100 pb100">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="next-page">
								<h2><?php esc_html_e( 'See the facilities', 'brithotels' ); ?></h2>
								<a href="<?php echo esc_url( $facility_page_url ); ?>"><?php esc_html_e( 'Click Here', 'brithotels' ); ?></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
	get_footer();