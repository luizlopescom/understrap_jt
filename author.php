<?php
/**
 * The template for displaying the author pages.
 *
 * Learn more: https://codex.wordpress.org/Author_Templates
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<?php
	// Set the Current Author Variable $curauth
	$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));

	//variables
	$display_name 		= $curauth->display_name;
	$id					= $curauth->id;
	$avatar_size 		= 300;
	$avatar 			= get_avatar($id, $avatar_size);
	$author_profile_url = get_author_posts_url($id);
	$country			= get_the_author_meta( 'country', $id );
	$cidade 			= get_the_author_meta( 'city', $id );
	$estado 			= get_the_author_meta( 'state', $id );
	$ffc				= get_the_author_meta( 'ffc', $id );
	$fcp				= get_the_author_meta( 'fcp', $id );
	$jt_solo			= get_the_author_meta( 'jt_solo', $id );
	$jt_adv				= get_the_author_meta( 'jt_adv', $id );
	$jt_grupo			= get_the_author_meta( 'jt_grupo', $id );
?>

<div id="page-wrapper" class="wrapper">

	<div id="content" class="container-fluid <?php //echo esc_attr( $container ); ?>" tabindex="-1">

		<div class="row">

			<!-- Do the left sidebar check -->
			<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

			<main class="site-main" id="main">

				<div class="profile-header" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/fac-placeholder.jpg')">
					<div class="container">
						<div class="row">
							<div class="col-md-3 photo-area">
								<div class="author-photo"><?php echo get_avatar( $curauth->user_email , '300 '); ?></div>
							</div>
							<div class="col-md-9 name-area">
								<h1><?php echo $display_name; ?></h1>
							</div>
						</div>
					</div>
				</div>

				<div class="profile-content">
					<div class="container">
						<div class="row">
							<div class="col-md-3 contact-area">
								<h4 class="uppercase"><?php _e('Contato','frameworks') ?></h4>
								<ul class="contact-info">
									<?php
									//telefone
									if ( !empty ( $curauth->telefone ) )
									{ 
									  echo '<li class="telefone"><a href="tel:' . ($curauth->telefone) . '">' . ($curauth->telefone) . ' </a></li>';
									}
									//email
									if ( !empty ( $curauth->user_email ) )
									{ 
									  echo '<li class="email"><a href="mailto:' . ($curauth->user_email) . '">' . ($curauth->user_email) . ' </a></li>';
									}
									//site
									$search = array('https://', 'http://', '"');
									if ( !empty ( $curauth->user_url ) )
									{ 
									  echo '<li class="site"><a target="_blank" href="' . ($curauth->user_url) . '">' . str_replace($search, '', $curauth->user_url ) . '</a></li>';
									}?>
								</ul>
								<address>
									<?php
									//address
									//check if is Brasil or not
									if($country == 'brasil') {
										if(!empty($cidade)) { echo '<span class="city">' . $cidade . '</span> - '; };
										echo '<span class="state">' . $estado . '</span>';
									}
									else {
										echo '<span class="country">' . $country . '</span>';
										if(!empty($cidade)) { echo ' - <span class="city">' . $cidade . '</span>'; };
									}
									?>
								</address>
								<ul class="social-icons">
									<?php 
									if ( !empty ( $curauth->linkedin ) )
									{ 
									    echo '<li><a class="icon fa fa-linkedin" target="_blank" href="' . ($curauth->linkedin) . '"><br></a></li>';
									}
									if ( !empty ( $curauth->facebook ) )
									{ 
									    echo '<li><a class="icon fa fa-facebook-official" target="_blank" href="' . ($curauth->facebook) . '"><br></a></li>';
									}
									if ( !empty ( $curauth->instagram ) )
									{ 
									    echo '<li><a class="icon fa fa-instagram" target="_blank" href="' . ($curauth->instagram) . '"><br></a></li>';
									}
									if ( !empty ( $curauth->youtube ) )
									{ 
									    echo '<li><a class="icon fa fa-youtube-play" target="_blank" href="' . ($curauth->youtube) . '"><br></a></li>';
									}
									?>
								</ul>
							</div>
							
							<div class="col-md-9 description-area">
								<?php 
								//Certificados
								?>
								<script>
									//Initialize tooltip
									jQuery(document).ready(function( $ ) {
										$(function () {
											$('[data-toggle="tooltip"]').tooltip();
										})
									});
								</script>
								<h4 class="">
									<?php _e('Facilitador Credenciado:','jogodatransformacao'); ?>
								</h4>
								<?php
								//certificacoes
								echo '<ul class="certificacoes">';
									if(!empty($jt_solo))	{ echo '<li>
									<span data-toggle="tooltip" data-placement="right" title="' . get_theme_mod('jt_solo_description') . '">Versão Solo</span>
									</li>'; };
									if(!empty($jt_adv))		{ echo '<li>
									<span data-toggle="tooltip" data-placement="right" title="' . get_theme_mod('jt_adv_description') . '">Versão Avançada</span>
									</li>'; };
									if(!empty($jt_grupo))	{ echo '<li>
									<span data-toggle="tooltip" data-placement="right" title="' . get_theme_mod('jt_grupo_description') . '">Versão de Grupo</span>
									</li>'; };
									if(!empty($ffc))		{ echo '<li>
									<span data-toggle="tooltip" data-placement="right" title="' . get_theme_mod('ffc_description') . '">Frameworks® for Change</span>
									</li>'; };
									if(!empty($fcp))		{ echo '<li>
									<span data-toggle="tooltip" data-placement="right" title="' . get_theme_mod('fcp_description') . '">Frameworks® Coaching Process</span>
									</li>'; };
								echo '</ul>';
								?>
								<?php
								//Descrição
								if ( !empty ( $curauth->user_description ) ) {
									echo '<h4 class="pt-4">Sobre o Facilitador</h4>';
									//echo '<p class="author-bio">' . ($curauth->user_description) . '</p>';
									echo '<div class="author-bio">' . wpautop($curauth->description, false) . '</div>';
								} ?>
							</div>
						</div>
					</div>
					
				</div>

			</main><!-- #main -->

		<!-- Do the right sidebar check -->
		<?php //get_template_part( 'global-templates/right-sidebar-check' ); ?>

	</div><!-- .row -->

</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>