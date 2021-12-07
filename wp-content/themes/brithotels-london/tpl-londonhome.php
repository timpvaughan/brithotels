<?php
/**
 * The template for displaying all pages
 *
 * Template Name: London Home Page
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
    <div class="gallery-slider-wrap">
        <div class="gallery-text">
			<?php
				$gallery_head_note = get_field('_gallery_head_note', $current_post_id);
			?>
            <!--<h2>“The nicest Staff! <span>Lovely place to stay”</span></h2>-->
            <?php if($gallery_head_note  != ''): ?>
			<h2><?php echo $gallery_head_note; ?></h2>
			<?php endif; ?>
        </div>
        <div class="gallery-slider-2">
	        <?php
		        $images = get_field('_homegallery_photos', $current_post_id);
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

    <div class="pt200 pb200 grey-bg hotel-thumb-wrap">
        <div class="hotel-thumb">
			<?php

				$featured_image = get_the_post_thumbnail_url( $current_post_id, 'full' );
				if($featured_image !== false){

					?>
					<img src="<?php echo $featured_image; ?>" class="img-fluid" alt="London hotel" />
					<?php
				}
				else{
					?>
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/hotel/1.jpg" class="img-fluid" alt="London hotel" />
					<?php
				}

			?>

        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="about-hotel">
                        <h3><?php esc_html_e('London Court', 'brithotels' ); ?></h3>
                        <!--<p>London Court Hotel boasts 22 tastefully furnished stylish ensuite bedrooms which are fully equipped with all the amenities making them an ideal choice for accommodation for leisure and business travellers.</p>
                        <p class="p-small">Here at the London Court Hotel, we are proud of our helpful and knowledgeable staff who are always on hand should you need advice on where to go and what to do within easy reach of our small boutique hotel.</p>-->
	                    <?php
		                    while ( have_posts() ) :
			                    the_post();
			                    //get_template_part( 'template-parts/content', 'page' );
								the_content();
		                    endwhile; // End of the loop.
	                    ?>
						<?php
							$book_now_url = get_field('_book_now', $current_post_id);
						?>
                        <a href="<?php echo $book_now_url; ?>" class="btn">Book Now <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon/book.svg" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

		

<?php get_template_part( 'template-parts/news-section', 'page' ); ?>

<?php
$rooms_page = intval(get_field('brithotels_page_rooms', 'option'));
$rooms_page_url = ($rooms_page > 0) ? get_permalink($rooms_page) : '#';
?>
    <div class="black-bg pt100 pb100">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="next-page">
                        <h2><?php esc_html_e('See the Rooms', 'brithotels'); ?></h2>
                        <a href="<?php echo esc_url($rooms_page_url); ?>"><?php esc_html_e('Click Here', 'brithotels'); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
		
	
	
<?php
get_footer();