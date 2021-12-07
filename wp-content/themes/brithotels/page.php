<?php
/**
 * The template for displaying all pages
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
				                <?php
				                while ( have_posts() ) :
					                the_post();

					                get_template_part( 'template-parts/content', 'page' );

					                // If comments are open or we have at least one comment, load up the comment template.
					                if ( comments_open() || get_comments_number() ) :
						                comments_template();
					                endif;

				                endwhile; // End of the loop.
				                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();