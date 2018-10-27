<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @subpackage fBachFlowers
 * @author tishonator
 * @since fBachFlowers 1.0.0
 *
 */

 get_header(); ?>

	<?php if ( have_posts() ) :
			
			while ( have_posts() ) :
			
				the_post();
	?>
				<section id="page-header">
					<div id="page-header-content">
						<h1 class="entry-title"><?php the_title(); ?></h1>
						<div class="clear">
						</div>
					</div>
				</section>

				<div id="main-content-wrapper">
					<div id="main-content">
						<?php
							// includes the single page content templata here
							get_template_part( 'template-parts/content', 'page' );

							// if comments are open or there's at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) {
								comments_template();
							}
						?>
					</div><!-- #main-content -->
					<?php get_sidebar(); ?>
				</div><!-- #main-content-wrapper -->
			
		<?php
			endwhile;
			
			wp_link_pages( array(
							'link_before'      => '<li>',
							'link_after'       => '</li>',
						 ) );
				
		  else : ?>

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