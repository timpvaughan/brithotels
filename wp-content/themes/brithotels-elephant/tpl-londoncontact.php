<?php
/**
 * The template for displaying all pages
 *
 * Template Name: London Contact Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
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
		                        <?php if(function_exists('bcn_display'))
		                        {
			                        bcn_display();
		                        }?>
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
                                <p>Use the form below to send us your enquiry or book directly using our online booking facility.</p>
	                            <?php
		                            $book_now_url = get_field('_book_now', $current_post_id);
	                            ?>
                                <a href="<?php echo $book_now_url; ?>" class="btn mt70 btn-100">Book Now <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon/book.svg" alt=""></a>
				                <?php
				                while ( have_posts() ) :
					                the_post();

				                    //get_template_part( 'template-parts/content', 'page' );

					                // If comments are open or we have at least one comment, load up the comment template.
					               /* if ( comments_open() || get_comments_number() ) :
						                comments_template();
					                endif;*/
				                endwhile; // End of the loop.
				                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pt50 pb120 grey-bg">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="enquiry-form">
                                <h2>Enquiry form</h2>
								<?php
									$contact_form = get_field('brithotels_contact_form', 'option');
									//echo do_shortcode('[contact-form-7 id="'.intval($contact_form).'" title="London Hotel Contact"]');
									echo $contact_form;
								?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="black-bg pt100 pb100" id="hotellocation">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="hotel-address">
                                <h4>Elephant Castle</h4>
                                <p class="location">35 Hampton Street, London SE17 3AN<br/>
                                    <a href="+44 (0) 20 7703 0011">+44 (0) 20 7703 0011</a><br/>
                                   <a href="mailto:elephantcastle@brithotels.com">elephantcastle@brithotels.com</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="pt120 pb120 grey-bg">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="room-book-btn">
	                            <?php
		                            $book_now_url = get_field('_book_now', $current_post_id);
	                            ?>
                                <a href="<?php echo $book_now_url; ?>" class="btn btn-100"><?php esc_html_e('Book Now', 'brithotels'); ?> <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon/book.svg" alt=""></a>
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


            <div class="black-bg pt100 pb100">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="next-page">
                                <h2><?php esc_html_e('Brit Hotels', 'brithotels'); ?></h2>
                                <a href="<?php echo esc_url(get_site_url(1)); ?>"><?php esc_html_e('Click Here', 'brithotels'); ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
