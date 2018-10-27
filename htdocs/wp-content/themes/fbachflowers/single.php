<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @subpackage fBachFlowers
 * @author tishonator
 * @since fBachFlowers 1.0.0
 *
 */

 get_header(); ?>

	<?php if (have_posts()) :

			while (have_posts()) :
			
				the_post();
				
				if ( is_single() ) : ?>
				
						<section id="page-header">
							<div id="page-header-content">
								<h1 class="entry-title"><?php the_title(); ?></h1>
								<div class="clear">
								</div>
							</div>
						</section>

		<?php	endif; ?>
		
				<div id="main-content-wrapper">
					<div id="main-content">
	<?php
						/*
						 * includes a post format-specific template for single content
						 */
						get_template_part( 'template-parts/content', get_post_format() );
						
						// if comments are open or there's at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) {
							comments_template();
						}

							wp_link_pages( array(
								'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'fbachflowers' ) . '</span>',
								'after'       => '</div>',
								'link_before' => '<span>',
								'link_after'  => '</span>',
							) );


							the_post_navigation( array(

								'prev_text' => __( 'Previous Post: %title', 'fbachflowers' ),
								'next_text' => __( 'Next Post: %title', 'fbachflowers' ),
							) );
						
						endwhile;
	?>
					</div><!-- #main-content -->
					<?php get_sidebar(); ?>
				</div><!-- #main-content-wrapper -->

	<?php else : ?>

			<div id="main-content-wrapper">
				<div id="main-content">
					<?php
						// if no content is loaded, show the 'no found' template
						get_template_part( 'template-parts/content', 'none' );
					?>
				</div><!-- #main-content -->
				<?php get_sidebar(); ?>
			</div><!-- #main-content-wrapper -->

	<?php  endif; ?>

	

<?php get_footer(); ?>