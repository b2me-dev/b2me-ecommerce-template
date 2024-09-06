<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package b2me-master-theme
 */

get_header();
?>

	<div class="b2-ip-banner">
		<canvas width="1920" height="350"></canvas>
	</div>

	<main id="primary" class="site-main">

		<?php
			if ( function_exists('yoast_breadcrumb') && !is_front_page()) {
				yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
			}
		?>

		<section class="error-404 not-found">
			<div class="b2-row v-center">
				<div class="b2-col col-8 b2-text-center">
					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'b2me-master-theme' ); ?></h1>
					<p>It looks like nothing was found at this location.</p>
				</div>
				<div class="b2-col col-4">
					<img src="<?= get_stylesheet_directory_uri(); ?>/images/global/404-image.jpg" alt="404 Page illustration" class="b2-img-responsive">
				</div>
			</div>
		</section><!-- .error-404 -->

	</main><!-- #main -->

<?php
get_footer();
