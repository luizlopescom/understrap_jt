<?php
/**
 * Content empty partial template.
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?>
<main class="site-main" id="main">

	<?php if ( ! is_front_page() ) { //SEO ?>
		<h1 class="visuallyhidden"><?php echo get_the_title(); ?></h1>
	<?php } ?>

	<?php

the_content();

?>

	<!-- Lista FAC -->
	<?php //while ( have_posts() ) : the_post(); ?>

				<?php 
					$blogusers = get_users( [ 'role__in' => [ 'facilitadores' ] ] );
					// Array of WP_User objects.

					
					$unique_state = array();
					$meta_key = 'state';
    				$order_by  = 'meta_value';
    				$order = 'ASC';

    				$blogusers = get_users('exclude='.$exclude.'&orderby='.$order_by.'&meta_key='.$meta_key.'&order='.$order.'&role='.$role);

    				?>

				<div class="container d-none">
					<div class="row">
						<div class="col-md-12 select-estado">
							<h4 class="custom-h4">Encontre um Facilitador Credenciado em </h4>
						
							<select name="state" id="state"><?php

    				
					//If URL doesn´t have 'estado=XX' add this to the select list
					if ( empty($_GET["estado"]) ) { echo '<option value=' . 'aa' . ' ' . selected( 'aa', $url_get_state ) . '>seu estado</option>'; }

					//Echo user 'state'
					foreach ( $blogusers as $user ) {
						$state = esc_html( $user->state );
						$order_by = 'display_name';

						//Echo page permalink
						$page_link = esc_url( get_permalink(50) );

						//Remove duplciated states
						if( ! in_array( $state, $unique_state ) ) :
            				// add state to array so it doesn't repeat
            				$unique_state[] = $state;
            				$current_state = strtolower( esc_html( $user->state ) );
            				$url_get_state = htmlspecialchars($_GET["estado"]);

            				if ( $current_state == 'ac' ) { echo '<option value=' . $page_link . '?estado=' . $current_state . ' ' . selected( 'ac', $url_get_state ) . '>Acre</option>'; }
            				if ( $current_state == 'al' ) { echo '<option value=' . $page_link . '?estado=' . $current_state . ' ' . selected( 'al', $url_get_state ) . '>Alagoas</option>'; }
            				if ( $current_state == 'ap' ) { echo '<option value=' . $page_link . '?estado=' . $current_state . ' ' . selected( 'ap', $url_get_state ) . '>Amapá</option>'; }
            				if ( $current_state == 'am' ) { echo '<option value=' . $page_link . '?estado=' . $current_state . ' ' . selected( 'am', $url_get_state ) . '>Amazonas</option>'; }
            				if ( $current_state == 'ba' ) { echo '<option value=' . $page_link . '?estado=' . $current_state . ' ' . selected( 'ba', $url_get_state ) . '>Bahia</option>'; }
            				if ( $current_state == 'ce' ) { echo '<option value=' . $page_link . '?estado=' . $current_state . ' ' . selected( 'ce', $url_get_state ) . '>Ceará</option>'; }
            				if ( $current_state == 'df' ) { echo '<option value=' . $page_link . '?estado=' . $current_state . ' ' . selected( 'df', $url_get_state ) . '>Distrito Federal</option>'; }
            				if ( $current_state == 'es' ) { echo '<option value=' . $page_link . '?estado=' . $current_state . ' ' . selected( 'es', $url_get_state ) . '>Espírito Santo</option>'; }
            				if ( $current_state == 'go' ) { echo '<option value=' . $page_link . '?estado=' . $current_state . ' ' . selected( 'go', $url_get_state ) . '>Goiás</option>'; }
            				if ( $current_state == 'ma' ) { echo '<option value=' . $page_link . '?estado=' . $current_state . ' ' . selected( 'ma', $url_get_state ) . '>Maranhão</option>'; }
            				if ( $current_state == 'mt' ) { echo '<option value=' . $page_link . '?estado=' . $current_state . ' ' . selected( 'mt', $url_get_state ) . '>Mato Grosso</option>'; }
            				if ( $current_state == 'ms' ) { echo '<option value=' . $page_link . '?estado=' . $current_state . ' ' . selected( 'ms', $url_get_state ) . '>Mato Grosso do Sul</option>'; }
            				if ( $current_state == 'mg' ) { echo '<option value=' . $page_link . '?estado=' . $current_state . ' ' . selected( 'mg', $url_get_state ) . '>Minas Gerais</option>'; }
            				if ( $current_state == 'pa' ) { echo '<option value=' . $page_link . '?estado=' . $current_state . ' ' . selected( 'pa', $url_get_state ) . '>Pará</option>'; }
            				if ( $current_state == 'pb' ) { echo '<option value=' . $page_link . '?estado=' . $current_state . ' ' . selected( 'pb', $url_get_state ) . '>Paraíba</option>'; }
            				if ( $current_state == 'pr' ) { echo '<option value=' . $page_link . '?estado=' . $current_state . ' ' . selected( 'pr', $url_get_state ) . '>Paraná</option>'; }
            				if ( $current_state == 'pe' ) { echo '<option value=' . $page_link . '?estado=' . $current_state . ' ' . selected( 'pe', $url_get_state ) . '>Pernambuco</option>'; }
            				if ( $current_state == 'pi' ) { echo '<option value=' . $page_link . '?estado=' . $current_state . ' ' . selected( 'pi', $url_get_state ) . '>Piauí</option>'; }
            				if ( $current_state == 'rj' ) { echo '<option value=' . $page_link . '?estado=' . $current_state . ' ' . selected( 'rj', $url_get_state ) . '>Rio de Janeiro</option>'; }
            				if ( $current_state == 'rn' ) { echo '<option value=' . $page_link . '?estado=' . $current_state . ' ' . selected( 'rn', $url_get_state ) . '>Rio Grande do Norte</option>'; }
            				if ( $current_state == 'rs' ) { echo '<option value=' . $page_link . '?estado=' . $current_state . ' ' . selected( 'rs', $url_get_state ) . '>Rio Grande do Sul</option>'; }
            				if ( $current_state == 'ro' ) { echo '<option value=' . $page_link . '?estado=' . $current_state . ' ' . selected( 'ro', $url_get_state ) . '>Rondônia</option>'; }
            				if ( $current_state == 'rr' ) { echo '<option value=' . $page_link . '?estado=' . $current_state . ' ' . selected( 'rr', $url_get_state ) . '>Roraima</option>'; }
            				if ( $current_state == 'sc' ) { echo '<option value=' . $page_link . '?estado=' . $current_state . ' ' . selected( 'sc', $url_get_state ) . '>Santa Catarina</option>'; }
            				if ( $current_state == 'sp' ) { echo '<option value=' . $page_link . '?estado=' . $current_state . ' ' . selected( 'sp', $url_get_state ) . '>São Paulo</option>'; }
            				if ( $current_state == 'se' ) { echo '<option value=' . $page_link . '?estado=' . $current_state . ' ' . selected( 'se', $url_get_state ) . '>Sergipe</option>'; }
            				if ( $current_state == 'to' ) { echo '<option value=' . $page_link . '?estado=' . $current_state . ' ' . selected( 'to', $url_get_state ) . '>Tocantins</option>'; }

							
            			endif;
					}
					?></select>

						</div>
					</div>
				</div>

				<div class="container">
					<div class="row">
						<div class="col-md-12">
							
							<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

							<?php if ( ! $is_page_builder_used ) : ?>

								<?php
								     $display_admins = false;
								     //ESTADO
								     //$meta_value = 'sp';
								     if ( !empty ( htmlspecialchars ( $_GET["estado"]) ) ) {
								     	$estado = htmlspecialchars($_GET["estado"]);
								     	$meta_value_state = '&meta_key=state&meta_value='.$estado;
								     } else {
								     	$meta_value_state = '';
								     } 
								     //FFC
								     //'&meta_key=ffc&meta_value=ffc'
								     if ( !empty ( htmlspecialchars ( $_GET["ffc"]) ) ) {
								     	$ffc = htmlspecialchars($_GET["ffc"]);
								     	$meta_value_ffc = '&meta_key=ffc&meta_value='.$ffc;
								     } else {
								     	$meta_value_ffc = '';
								     }
								     //FCP
								     //'&meta_key=ffc&meta_value=ffc'
								     if ( !empty ( htmlspecialchars ( $_GET["fcp"]) ) ) {
								     	$fcp = htmlspecialchars($_GET["fcp"]);
								     	$meta_value_fcp = '&meta_key=fcp&meta_value='.$fcp;
								     } else {
								     	$meta_value_fcp = '';
								     }
    								 //$order_by  = 'meta_value';
								     $order_by = 'display_name'; // 'nicename', 'email', 'url', 'registered', 'display_name', or 'post_count'
								     $order = 'ASC';
								     $role = 'facilitadores'; // 'subscriber', 'contributor', 'editor', 'author' - leave blank for 'all'
								     $avatar_size = 300;
								     $hide_empty = false; // hides authors with zero posts

								     if(!empty($display_admins)) {
								          $blogusers = get_users('orderby='.$order_by.'&role='.$role);
								          
								     } else {

								     $admins = get_users('role=administrator');
								     $exclude = array();
								     
								     foreach($admins as $ad) {
								          $exclude[] = $ad->ID;
								     }

								     $exclude = implode(',', $exclude);
								     $blogusers = get_users('exclude='.$exclude.'&orderby='.$order_by.$meta_value_state.$meta_value_ffc.$meta_value_fcp.'&relation=and'.'&order='.$order.'&role='.$role);
								     }
									
								     $authors = array();
								     foreach ($blogusers as $bloguser) {
								     $user = get_userdata($bloguser->ID);

								     if(!empty($hide_empty)) {
										$numposts = count_user_posts($user->ID);
										if($numposts < 1) continue;
										}
										$authors[] = (array) $user;
								     }
									

								echo '<ul id="facilitadores" class="facilitadores-list row">';

								?>
								<script>
									jQuery(document).ready(function( $ ) {
									//Filter JT Certs
										$(document).on('click', '#jt_filter span:not(".selected")', function () {
											var classSelected = $(this).attr('class'); // get selected class

											//Hide all except selected
											$('.facilitadores-list>li').hide();
											$('.facilitadores-list>li.'+classSelected).show();

											//Add class to selected
											$('#jt_filter span').removeClass('selected');
											$('#jt_filter span.'+classSelected).addClass('selected');
											
										});

										//Show all if click on SELECTED
										$(document).on('click', '#jt_filter span.selected', function () {
											$('.facilitadores-list>li').show();
											$('#jt_filter span').removeClass('selected');
										});

									//Initialize tooltip
										$(function () {
											$('[data-toggle="tooltip"]').tooltip();
										})

									});
								</script>
								<?php

								foreach($authors as $author) {
									//variables
									$display_name = $author['data']->display_name;
									$avatar 	= get_avatar($author['ID'], $avatar_size);
									$author_profile_url = get_author_posts_url($author['ID']);
									$country	= get_the_author_meta( 'country', $author['ID'] );
									$cidade 	= get_the_author_meta( 'city', $author['ID'] );
									$estado 	= get_the_author_meta( 'state', $author['ID'] );
									$ffc		= get_the_author_meta( 'ffc', $author['ID'] );
									$fcp		= get_the_author_meta( 'fcp', $author['ID'] );
									$jt_solo	= get_the_author_meta( 'jt_solo', $author['ID'] );
									$jt_adv		= get_the_author_meta( 'jt_adv', $author['ID'] );
									$jt_grupo	= get_the_author_meta( 'jt_grupo', $author['ID'] );

									echo '<li class="col-md-3 facilitador ' . $cidade . ' ' . $estado . ' ' . $ffc . ' ' . $fcp . ' ' . $jt_solo . ' ' . $jt_adv . ' ' . $jt_grupo . '">';
									//card
									echo '<div class="card bg-light text-center">';
									
									//avatar
									echo '<div class="avatar"><a class="rounded-circle" href="', $author_profile_url, '">', $avatar , '</a></div>';
									//name
									echo '<h5 class="name"><a href="', $author_profile_url, '" class="contributor-link">', $display_name, '</a></h5>';
									//certificacoes
									echo '<ul class="certificacoes">';
										if(!empty($jt_solo))	{ echo '<li data-toggle="tooltip" data-placement="top" title="' . get_theme_mod('jt_solo_description') . '">Versão Solo</li>'; };
										if(!empty($jt_adv))		{ echo '<li data-toggle="tooltip" data-placement="top" title="' . get_theme_mod('jt_adv_description') . '">Versão Avançada</li>'; };
										if(!empty($jt_grupo))	{ echo '<li data-toggle="tooltip" data-placement="top" title="' . get_theme_mod('jt_grupo_description') . '">Versão de Grupo</li>'; };
										if(!empty($ffc))		{ echo '<li data-toggle="tooltip" data-placement="top" title="' . get_theme_mod('ffc_description') . '">Frameworks® for Change</li>'; };
										if(!empty($fcp))		{ echo '<li data-toggle="tooltip" data-placement="top" title="' . get_theme_mod('fcp_description') . '">Frameworks® Coaching Process</li>'; };
									echo '</ul>';
									//address
									//check if is Brasil or not
									if($country == 'brasil') {
										echo '<address>';
										if(!empty($cidade)) { echo '<span class="city">' . $cidade . '</span> - '; };
										echo '<span class="state">' . $estado . '</span>';
										echo '</address>';
									}
									else {
										echo '<address><span class="country">' . $country . '</span>';
										if(!empty($cidade)) { echo ' - <span class="city">' . $cidade . '</span>'; };
										echo '</address>';
									}
									//button
									echo '<a class="btn btn-link" href="', $author_profile_url, '">Saiba mais</a>';
									//unit link
									//echo '<a class="unit-link" href="' . $author_profile_url . '"></a>';
									//card end
									echo '</div>';
									echo '</li>';
									}

								echo '</ul>';
								?>

							<?php endif; ?>

							</article> <!-- .et_pb_post -->

						</div>
					</div>
				</div>



			<?php //endwhile; ?>
	<!-- END Lista FAC-->
</main>
<?php