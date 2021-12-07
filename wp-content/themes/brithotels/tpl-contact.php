<?php
/**
 * The template for displaying all pages
 *
 * Template Name: Network Contact Page
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
                                <h2><?php esc_html_e('Enquiry form', 'brithotels'); ?></h2>
                                <!--<form action="#">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="FIRST NAME">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="SURNAME">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="EMAIL">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="NUMBER">
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" placeholder="MESSAGE"></textarea>
                                    </div>
                                    <div class="custom-control custom-checkbox mr-sm-2">
                                        <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                                        <label class="custom-control-label" for="customControlAutosizing">Tick the box if you are happy for Brit Hotels to send you news and offers</label>
                                    </div>
                                    <button class="btn btn-100">Submit</button>
                                </form>-->
	                            <?php
		                            //$contact_form = intval(get_theme_mod('brithotels_contact_form', '1'));
		                            $contact_form = get_field('brithotels_contact_form', 'option');
		                            //write_log($contact_form);
		                           // echo do_shortcode('[contact-form-7 id="'.intval($contact_form).'"]');
									echo $contact_form;
	                            ?>
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
                                <a href="<?php echo esc_url(home_url()); ?>"><?php esc_html_e('Click Here', 'brithotels'); ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();