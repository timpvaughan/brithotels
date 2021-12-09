<?php
/**
 * The template for displaying all pages
 *
 * Template Name: Network Home Page
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
	$post_id = intval(get_the_ID());
	//$tripadv_url = get_theme_mod('brithotels_tripadv_url', '#');

	$trip_block = get_field('_home_trip_block', $post_id);

	$title           = isset( $trip_block['title'] ) ? $trip_block['title'] : '';
	$tripadv_url     = isset( $trip_block['tripadv_url'] ) ? $trip_block['tripadv_url'] : '';
	$backgroundphoto = isset( $trip_block['backgroundphoto'] ) ? $trip_block['backgroundphoto'] : array();
	$backgroundphoto_url = isset($backgroundphoto['url']) ? $backgroundphoto['url'] : get_template_directory_uri().'/assets/images/bg/customer-bg.jpg';

?>
	<div class="customer-comment-block">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="customer-comment-wrap">
						<!--<h2>“The nicest Staff! <span>Lovely place to stay”</span></h2>-->
						<h2><?php echo $title; ?></h2>
						<div class="bottom-content">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon/owl.png" alt="">
							<a href="<?php echo esc_url($tripadv_url); ?>"><?php esc_html_e('More customer comments', 'brithotels'); ?></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php
	$london_hotel = get_field('_london_hotel_info', $post_id);
	$london_hotel_title = isset( $london_hotel['title'] ) ? $london_hotel['title'] : 'London Court';
	$london_hotel_address = isset( $london_hotel['address'] ) ? $london_hotel['address'] : '';
	$london_hotel_photo = isset( $london_hotel['photo'] ) ? $london_hotel['photo'] : array();
	$london_hotel_photo_url = isset($london_hotel_photo['url']) ? $london_hotel_photo['url'] : get_template_directory_uri().'/assets/images/hotel/1.jpg';
	$london_hotel_book_url = isset( $london_hotel['book_url'] ) ? $london_hotel['book_url'] : '';

	$elephant_hotel = get_field('_elephant_hotel_info', $post_id);
	$elephant_hotel_title = isset($elephant_hotel['title'])? $elephant_hotel['title'] : '';
	$elephant_hotel_address = isset($elephant_hotel['address'])? $elephant_hotel['address'] : '';
	$elephant_hotel_photo = isset( $elephant_hotel['photo'] ) ? $elephant_hotel['photo'] : array();
	$elephant_hotel_photo_url = isset($elephant_hotel_photo['url']) ? $elephant_hotel_photo['url'] : get_template_directory_uri().'/assets/images/hotel/2.jpg';
	$elephant_hotel_book_url = isset( $elephant_hotel['book_url'] ) ? $elephant_hotel['book_url'] : '';
	$elephant_hotel_open_info = isset($elephant_hotel['open_info'])? esc_html($elephant_hotel['open_info']) : '';

	$earlscourt_hotel = get_field('_earlscourt_hotel_info', $post_id);
	$earlscourt_hotel_title = isset($elephant_hotel['title'])? $earlscourt_hotel['title'] : '';
	$earlscourt_hotel_address = isset($elephant_hotel['address'])? $earlscourt_hotel['address'] : '';
	$earlscourt_hotel_photo = isset( $elephant_hotel['photo'] ) ? $earlscourt_hotel['photo'] : array();
	$earlscourt_hotel_photo_url = isset($earlscourt_hotel_photo['url']) ? $earlscourt_hotel_photo['url'] : get_template_directory_uri().'/assets/images/hotel/2.jpg';
	$earlscourt_hotel_book_url = isset( $earlscourt_hotel['book_url'] ) ? $earlscourt_hotel['book_url'] : '';
	$earlscourt_hotel_open_info = isset($earlscourt_hotel['open_info'])? esc_html($earlscourt_hotel['open_info']) : '';

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

	<div class="hotels pt100 pb100 grey-bg" id="hotel-list-wrap">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="section-header">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/text-logo.svg" alt="">
					</div>

				</div>
				<div class="col-12">
					<div class="hotel-list">
						<div class="thumb">
							<img src="<?php echo esc_url($elephant_hotel_photo_url); ?>" class="img-fluid" alt="">
							<?php if($elephant_hotel_open_info != ''): ?>
							<div class="overlay">
								<p><?php echo $elephant_hotel_open_info; ?></p>
							</div>
							<?php endif; ?>
						</div>
						<div class="body">
							<h4><?php echo $elephant_hotel_title; ?></h4>
							<?php
							echo $elephant_hotel_address;
							?>
							<div class="buttons">
								<a href="<?php echo home_url('/elephant-castle'); ?>" class="btn">More Info <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon/hotel.svg" alt=""></a>
								<a href="<?php echo esc_url($elephant_hotel_book_url); ?>" class="btn">Book Now <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon/book.svg" alt=""></a>
							</div>
						</div>
					</div>
					<div class="hotel-list">
						<div class="thumb">
							<img src="<?php echo esc_url($earlscourt_hotel_photo_url); ?>" class="img-fluid" alt="" />
							<?php if($earlscourt_hotel_open_info != ''): ?>
							<div class="overlay">
								<p><?php echo $earlscourt_hotel_open_info; ?></p>
							</div>
							<?php endif; ?>
						</div>
						<div class="body">
							<h4><?php echo $earlscourt_hotel_title; ?></h4>
							<?php
							echo $earlscourt_hotel_address;
							?>
							<!--div class="buttons">
								<a href="<?php echo home_url('/earls-court'); ?>" class="btn">More Info <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon/hotel.svg" alt=""></a>
								<a href="<?php echo esc_url($earlscourt_hotel_book_url); ?>" class="btn">Book Now <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon/book.svg" alt=""></a>
							</div-->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="features-block black-bg pt170 pb150">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<div class="feature">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon/wifi.svg" class="img-fluid" alt="">
						<h5>FREE WIFI</h5>
						<p>Enjoy free WIFI throughout the hotel</p>
					</div>
				</div>
				<div class="col-md-4">
					<div class="feature">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon/building.svg" class="img-fluid" alt="">
						<h5>London</h5>
						<p>Conveniently located to everything London has to offer</p>
					</div>
				</div>
				<div class="col-md-4">
					<div class="feature">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon/thumbsup.svg" class="img-fluid" alt="" />
						<h5>Recommended</h5>
						<p>Your reviews are important to us</p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="map">
		<!--<img src="<?php /*echo get_template_directory_uri(); */?>/assets/images/map.jpg" class="img-fluid" alt="" />-->
		<?php
			$map_id = intval(get_field('brithotels_map_id', 'option'));
			echo do_shortcode('[wpgmza id="'.intval($map_id).'"]');
		?>
		<p>&nbsp;</p>
	</div>


	<div class="gallery-slider-wrap black-bg pb170">
		<div class="gallery-slider">
			<?php
				$images = get_field('_homegallery_photos', $post_id);
				$size = 'full'; // (thumbnail, medium, large, full or custom size)
			?>
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
	</div>

		<?php
		while ( have_posts() ) :
			the_post();
			//get_template_part( 'template-parts/content', 'page' );
		endwhile; // End of the loop.
		?>
<?php
get_footer();
