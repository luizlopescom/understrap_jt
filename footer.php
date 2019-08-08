<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$container = get_theme_mod( 'understrap_container_type' );
?>

<!-- TOP Footer banner - WIDGET -->
<?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>

<div class="wrapper wrapper-footer" id="wrapper-footer">		

	<div class="<?php echo esc_attr( $container ); ?>">

		<div class="row no-gutters">

			<div class="col-md-3">

				<?php dynamic_sidebar( 'footer_col1' ); ?>

			</div>
			<div class="col-md-8 offset-md-1">
				<div class="row">
					<div class="col-md-4 px-0">

						<?php dynamic_sidebar( 'footer_col2' ); ?>

					</div>
					<div class="col-md-4 px-0">

						<?php dynamic_sidebar( 'footer_col3' ); ?>

					</div>
					<div class="col-md-4 px-0">

						<?php dynamic_sidebar( 'footer_col4' ); ?>

					</div>
				</div>
			</div>

			<?php
				//Texto de direitos autorais
				//div já inclui as tags de col-md-xx
				dynamic_sidebar( 'footer_main_bottom' );
			?>

		</div><!-- row end -->

	</div><!-- container end -->

</div><!-- wrapper end -->

<div class="wrapper wrapper-footer-bottom" id="wrapper-footer-bottom">

	<div class="<?php echo esc_attr( $container ); ?>">

		<div class="row">

			<div class="col-md-8">
				<!-- Widget TOS -->
				<?php dynamic_sidebar( 'footer_bottom' ); ?>

			</div><!--col end -->

			<div class="col-md-4 social-links">
				<!-- Social -->
				<?php if( !empty( get_theme_mod('instagram_site') ) ) : ?>
					<a href="<?php echo get_theme_mod('instagram_site'); ?>" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
				<?php endif ?>

				<?php if( !empty( get_theme_mod('facebook_site') ) ) : ?>
					<a href="<?php echo get_theme_mod('facebook_site'); ?>"  target="_blank"><i class="fa fa-facebook-official" aria-hidden="true"></i></a>
				<?php endif ?>

				<?php if( !empty( get_theme_mod('linkedin_site') ) ) : ?>
					<a href="<?php echo get_theme_mod('linkedin_site'); ?>" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
				<?php endif ?>

				<?php if( !empty( get_theme_mod('youtube_site') ) ) : ?>
					<a href="<?php echo get_theme_mod('youtube_site'); ?>" target="_blank"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
				<?php endif ?>

				<?php if( !empty( get_theme_mod('twitter_site') ) ) : ?>
					<a href="<?php echo get_theme_mod('twitter_site'); ?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
				<?php endif ?>

			</div><!--col end -->

		</div><!-- row end -->

	</div><!-- container end -->

</div><!-- wrapper end -->

<?php 
	//Check if have footer credits
	if ( !empty ( get_theme_mod( 'footer_credits') ) ) : ?>
<div class="wrapper wrapper-footer-credits" id="wrapper-footer-credits">

	<div class="<?php echo esc_attr( $container ); ?>">

		<div class="row">

			<div class="col-md-12">

				<footer class="site-footer row" id="colophon">

					<div class="site-info col-10">

						<?php echo do_shortcode( get_theme_mod( 'footer_credits') ); ?>

					</div><!-- .site-info -->

					<div class="developer col-2 text-right">
						<a href="https://www.pantanaldigital.com.br" target="_blank" title="desenvolvido por Pantanal Digital">
							<img style="height:100%;max-height: 28px; width:auto" src="<?php echo get_template_directory_uri(); ?>/img/pantanal-digital-logo.svg">
						</a>
					</div>

				</footer><!-- #colophon -->

			</div><!--col end -->

		</div><!-- row end -->

	</div><!-- container end -->

</div><!-- wrapper footer end -->
<?php endif; ?>

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>

