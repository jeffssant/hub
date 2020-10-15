<?php
/**
 * The main template file
 *
*/

get_header();
?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		if ( have_posts() ) {

			// Load posts loop.
			while ( have_posts() ) {
				the_post();
				
			}

		

		} 
		?>
		
		</main><!-- .site-main -->
	</section><!-- .content-area -->

<?php
get_footer();
