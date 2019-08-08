<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();

$container   = get_theme_mod( 'understrap_container_type' );

?>

<div class="wrapper" id="page-wrapper">

	<div id="content" class="container-fluid <?php //echo esc_attr( $container ); ?>" tabindex="-1">

		<div class="row">

			<main class="site-main" id="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<!-- echo builder -->
				<?php get_template_part( 'loop-templates/content', 'empty' ); ?>
				<!-- end builder -->


				<?php 
					$blogusers = get_users( [ 'role__in' => [ 'facilitadores' ] ] );
					// Array of WP_User objects.

					
					$unique_state = array();
					$meta_key = 'state';
    				$order_by  = 'meta_value';
    				$order = 'ASC';

    				$blogusers = get_users('exclude='.$exclude.'&orderby='.$order_by.'&meta_key='.$meta_key.'&order='.$order.'&role='.$role);

    				?>

				<div class="container">
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
									

									echo '<ul id="consultores" class="consultores-list row">';
									foreach($authors as $author) {
										$display_name = $author['data']->display_name;
										$avatar = get_avatar($author['ID'], $avatar_size);
										$author_profile_url = get_author_posts_url($author['ID']);
										$cidade = get_the_author_meta( 'city', $author['ID'] );
										$estado = get_the_author_meta( 'state', $author['ID'] );
										$ffc = get_the_author_meta( 'ffc', $author['ID'] );
										$fcp = get_the_author_meta( 'fcp', $author['ID'] );

										echo '<li class="col-md-3 consultor ' . $cidade . ' ' . $estado . ' ' . $ffc . ' ' . $fcp . '">';
										echo '<div class="consultor-avatar"><a href="', $author_profile_url, '">', $avatar , '</a></div>';
										echo '<h4 class="consultor-name"><a href="', $author_profile_url, '" class="contributor-link">', $display_name, '</a></h4>';
										echo '<h5 class="consultor-local"><a href="', $author_profile_url, '" class="contributor-link">'. $cidade . '/' . $estado . '</a></h5>';
										echo '</li>';
										}
									echo '</ul>';
								?>

							<?php endif; ?>

							</article> <!-- .et_pb_post -->

						</div>
					</div>
				</div>



			<?php endwhile; ?>




			

			</main><!-- #main -->

		<!-- Do the right sidebar check -->
		<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>

	</div><!-- .row -->

</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>

