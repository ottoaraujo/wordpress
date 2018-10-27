<?php
/**
 * The template for displaying search results pages.
 *
 * @subpackage fBachFlowers
 * @author tishonator
 * @since fBachFlowers 1.0.0
 *
 */

 get_header(); ?>

 <?php
	$pageTitle = fbachflowers_get_page_title();
	
	  if ($pageTitle != '') : ?>
	
		<section id="page-header">
			<div id="page-header-content">
				<h1 class="entry-title"><?php echo $pageTitle; ?></h1>
				<div class="clear">
				</div>
			</div>
		</section>

<?php endif; ?>

<div id="main-content-wrapper">

	<div id="main-content">

		<div id="infoTxt">
			<?php printf( esc_html__( 'You searched for "%s". Here are the results:', 'fbachflowers' ),
						get_search_query() );
			?>
		</div><!-- #infoTxt -->

	<?php if ( have_posts() ) :

				// starts the loop
				while ( have_posts() ) :

					the_post();

					/*
					 * include the post format-specific template for the content.
					 */
					get_template_part( 'template-parts/content', get_post_format() );

				endwhile;
	
				the_posts_pagination( array(
		                        'prev_next' => '',
		                    ) );

		else :

				// if no content is loaded, show the 'no found' template
				get_template_part( 'template-parts/content', 'none' );
			
		  endif;
	?>

	</div><!-- #main-content -->

	<?php get_sidebar(); ?>

</div><!-- #main-content-wrapper -->

<?php get_footer(); ?>