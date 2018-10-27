<?php
/*

Template Name: No Sidebars Page

*/

?>
<?php get_header(); ?>


	<?php if ( have_posts() ) :
			
			while ( have_posts() ) :
			
				the_post(); ?>
				
				<section id="page-header">
					<div id="page-header-content">
						<h1 class="entry-title"><?php the_title(); ?></h1>
						<div class="clear">
						</div>
					</div>
				</section>

				<div id="main-content-wrapper">
					<div id="main-content-full">
						<div class="wide-content">
						
							<?php
							// includes the single page content templata here
							get_template_part( 'template-parts/content', 'page' );

							// if comments are open or there's at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) {
								comments_template();
							} ?>
						
						</div>
					</div><!-- #main-content -->
				</div><!-- #main-content-wrapper -->
				
	<?php   endwhile;
				
		  else : ?>

			<div id="main-content-wrapper">
				<div id="main-content">
					<?php
						// if no content is loaded, show the 'no found' template
						get_template_part( 'template-parts/content', 'none' );
					?>
				</div><!-- #main-content -->
			</div><!-- #main-content-wrapper -->

	<?php  endif; ?>

<?php get_footer(); ?>