<?php
	/**
	 * The template for displaying all pages
	 *
	 * Template Name: London Facilities Page
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
								<!--<p>We at Brit Hotels are proud of our helpful and knowledgeable staff who are always at hand should you need advice on where to go and what to do within easy reach of our small boutique hotel.</p>-->
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
								<a href="<?php echo $book_now_url; ?>" class="btn mt70 btn-100">Book Now <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon/book.svg" alt=""></a>

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
								<p>Enjoy free WIFI in your room!</p>
							</div>
							<div class="feature-2">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon/air.svg" class="img-fluid" alt="">
								<h5>Air Conditioning</h5>
								<p>All rooms fitted with air conditioning systems</p>
							</div>
							<div class="feature-2">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon/beverage.svg" class="img-fluid" alt="">
								<h5>Beverages</h5>
								<p>Tea and Coffee making facilities</p>
							</div>
							<div class="feature-2">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon/fridge.svg" class="img-fluid" alt="">
								<h5>Mini Fridges</h5>
								<p>Mini fridges with complementary miniral water</p>
							</div>
							<div class="feature-2">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon/toiletry.svg" class="img-fluid" alt="">
								<h5>Toiletry</h5>
								<p>Complementary Verdi hair & body wash</p>
							</div>
						</div>
					</div>
				</div>
			</div>

			<?php
				$lbarg = array(
					'post_type'      => 'facility',
					'post_status'    => 'publish',
					//'paged'          => $paged,
					'posts_per_page' => - 1,

				);

				$posts_array = get_posts( $lbarg );
				// The Loop
				if ( sizeof( $posts_array ) == 0 ): ?>
				<?php
				else:

					$i = 1;
					foreach ( $posts_array as $post ) : setup_postdata( $post );
						$id             = $post->ID;
						$facility_title = get_the_title( $id );
						//$facility_link  = get_permalink( $id );
						$alternate_class = ( $i % 2 == 0 ) ? 'reverse' : '';
						$content_class   = ( $i % 2 == 0 ) ? 'col-xl-5 col-lg-6' : 'col-xl-5 offset-xl-7 col-lg-6 offset-lg-6';
						$i ++;
						?>
						<div class="pt200 grey-bg hotel-facility-wrap <?php echo esc_attr( $alternate_class ); ?>">
							<div class="hotel-thumb">
								<?php
									$featured_image = get_the_post_thumbnail_url( $id, 'full' );
									if ( $featured_image !== false ) {
										?>
										<img src="<?php echo $featured_image; ?>" class="img-fluid" alt="London hotel facility" />
										<?php
									} else {
										?>
										<img src="<?php echo get_template_directory_uri(); ?>/assets/images/hotel/3.jpg" class="img-fluid" alt="" />
										<?php
									}
								?>

							</div>
							<div class="container">
								<div class="row">
									<div class="<?php echo esc_attr( $content_class ); ?>">
										<div class="facility-2">
											<h3><?php echo esc_html( $facility_title ); ?></h3>
											<?php
												the_content();
											?>
										</div>
									</div>
								</div>
							</div>
						</div>

					<?php
					endforeach;
					wp_reset_postdata();

				endif;
			?>

			<div class="pt170 pb170 grey-bg">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="room-book-btn">
								<?php
									$book_now_url = get_field('_book_now', $current_post_id);
								?>
								<a href="<?php echo $book_now_url; ?>" class="btn btn-100"><?php esc_html_e( 'Book Now', 'brithotels' ); ?> <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon/book.svg" alt=""></a>
							</div>
						</div>
					</div>
				</div>
			</div>

			<//?php get_template_part( 'template-parts/news-section', 'page' ); ?>

			<?php

			$home_info_box1 = get_field( '_home_info_box1', 'option' );
			$home_info_box2 = get_field( '_home_info_box2', 'option' );
			$home_info_box3 = get_field( '_home_info_box3', 'option' );

			$heading1     = isset( $home_info_box1['heading'] ) ? $home_info_box1['heading'] : '';
			$sub_heading1 = isset( $home_info_box1['sub_heading'] ) ? $home_info_box1['sub_heading'] : '';

			$heading2     = isset( $home_info_box2['heading'] ) ? $home_info_box2['heading'] : '';
			$sub_heading2 = isset( $home_info_box2['sub_heading'] ) ? $home_info_box2['sub_heading'] : '';

			$heading3     = isset( $home_info_box3['heading'] ) ? $home_info_box3['heading'] : '';
			$sub_heading3 = isset( $home_info_box3['sub_heading'] ) ? $home_info_box3['sub_heading'] : '';

			//write_log($london_hotel);
			?>



		<div class="black-bg pt100 pb100">
			<div class="container">
				<div class="row justify-content-md-center">
					<div class="col">
						<div class="next-page">
							<h2>Offers</h2>
							<p>BOOK NOW and enjoy complimentary early check-in*</p><p>* Subject to availability </p>
						</div>

								<?php
									$book_now_url = get_field('_book_now', $current_post_id);
								?>
								<a href="<?php echo $book_now_url; ?>" class="btn centered" target="_blank">Book Now <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon/book.svg" alt=""></a>

					</div>
				</div>
			</div>
		</div>

		<div class="black-bg pt15 pb170">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-4">
						<div class="info-box color1">
							<?php if($heading1 != ''): ?>
								<h3><?php echo $heading1; ?></h3>
							<?php endif; ?>
							<?php if($sub_heading1 != ''): ?>
								<p><?php echo $sub_heading1; ?></p>
							<?php endif; ?>

								<?php
									$book_now_url = get_field('_book_now', $current_post_id);
								?>
								<a href="<?php echo $book_now_url; ?>" class="btn" target="_blank">Book Now <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon/book.svg" alt=""></a>

						</div>
					</div>
					<div class="col-lg-4">
						<div class="info-box color2">
							<?php if($heading2 != ''): ?>
								<h3><?php echo $heading2; ?></h3>
							<?php endif; ?>
							<?php if($sub_heading2 != ''): ?>
								<p><?php echo $sub_heading2; ?></p>
							<?php endif; ?>

								<?php
									$book_now_url = get_field('_book_now', $current_post_id);
								?>
								<a href="<?php echo $book_now_url; ?>" class="btn" target="_blank">Book Now <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon/book.svg" alt=""></a>

						</div>
					</div>
					<div class="col-lg-4">
						<div class="info-box color3">
							<?php if($heading3 != ''): ?>
								<h3><?php echo $heading3; ?></h3>
							<?php endif; ?>
							<?php if($sub_heading3 != ''): ?>
								<p><?php echo $sub_heading3; ?></p>
							<?php endif; ?>

								<?php
									$book_now_url = get_field('_book_now', $current_post_id);
								?>
								<a href="<?php echo $book_now_url; ?>" class="btn" target="_blank">Book Now <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon/book.svg" alt=""></a>

						</div>
					</div>
				</div>
			</div>
		</div>


			<?php
				$gallery_page     = intval( get_field( 'brithotels_page_gallery', 'option' ) );
				$gallery_page_url = ( $gallery_page > 0 ) ? get_permalink( $gallery_page ) : '#';
			?>
			<div class="black-bg pt100 pb100">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="next-page">
								<h2><?php esc_html_e( 'See the gallery', 'brithotels' ); ?></h2>
								<a href="<?php echo esc_url( $gallery_page_url ); ?>">Click Here</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
	get_footer();
