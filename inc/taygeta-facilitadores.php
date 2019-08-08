<?php

/**
* TABLE OF CONTENTS
*
* Thumbnail Size
* Limit media library access
* Add new user profile fields
* Enable Visual Biography Editor
* Change Author permalink
*
*
*
*
*
*/



//Register a thumbnail size
/**
 * Mini list
 */

add_image_size( 'mini-list-thumb', 80, 65, true );



// Adicionar CSS ao admin
add_action('admin_head', 'custom_css');

function custom_css() {
  echo '<style>
   
   #fieldset-billing,
	#fieldset-shipping,
	.user-language-wrap,
	.user-admin-color-wrap,
	.user-rich-editing-wrap,
	.user-comment-shortcuts-wrap,
	.user-syntax-highlighting-wrap,
	.user-last-name-wrap,
	.user-admin-bar-front-wrap {
		display:none;
	}
	.user-nickname-wrap .description::after {
    	content: "(Será utilizado em seu endereço URL, por exemplo, www.jogodatransformacao.com.br/facilitadores/apelido)";
    	display: inline-block;
	}
  </style>';
}


// Limit media library access
  
add_filter( 'ajax_query_attachments_args', 'branode_show_current_user_attachments' );
 
function branode_show_current_user_attachments( $query ) {
    $user_id = get_current_user_id();
    if ( $user_id && !current_user_can('activate_plugins') && !current_user_can('edit_others_posts ') ) {
        $query['author'] = $user_id;
    }
    return $query;
} 


/**
 * Add new user profile fields
 * Para a Página de Author.php e os Profissionais 
 *
 */
if ( ! function_exists( 'ld_modify_contact_methods' ) ) :

    function ld_modify_contact_methods( $contactmethods ) {
        $contactmethods['telefone'] = __( 'Telefone/Celular <span class="description">(DDD) XXXX XXXX</span>' );
        $contactmethods['linkedin'] = __( 'Linkedin <span class="description">(Digite o endereço completo)</span>' );
        $contactmethods['instagram'] = __( 'Instagram <span class="description">(Digite apenas o nome de usuário)</span>' );
        $contactmethods['facebook'] = __( 'Facebook <span class="description">(Digite o endereço completo)</span>' );
        $contactmethods['youtube'] = __( 'YouTube <span class="description">(Digite o endereço completo)</span>' );
		//$contactmethods['endereco'] = __( 'Logradouro <span class="description">(Digite seu endereço, endereço, bairro, cidade e estado.)</span>' );

        return $contactmethods;
    }
    add_filter('user_contactmethods','ld_modify_contact_methods', 10, 1);

endif;



//Novos campos
add_action( 'show_user_profile', 'extra_user_profile_fields' );
add_action( 'edit_user_profile', 'extra_user_profile_fields' );

function extra_user_profile_fields( $user ) { ?>

<h3><?php _e("Localização", "frameworks"); ?></h3>

<table class="form-table localizacao">
    <tr>
        <th><label for="country"><?php _e("País"); ?></label></th>
        <td>
            <select name="country" id="country">
                <option value="brasil" <?php selected( 'brasil', get_the_author_meta( 'country', $user->ID ) ); ?>>Brasil</option>
                <option value="argentina" <?php selected( 'argentina', get_the_author_meta( 'country', $user->ID ) ); ?>>Argentina</option>
                <option value="bolivia" <?php selected( 'bolivia', get_the_author_meta( 'country', $user->ID ) ); ?>>Bolívia</option>
                <option value="chile" <?php selected( 'chile', get_the_author_meta( 'country', $user->ID ) ); ?>>Chile</option>
                <option value="colombia" <?php selected( 'colombia', get_the_author_meta( 'country', $user->ID ) ); ?>>Colômbia</option>
                <option value="peru" <?php selected( 'peru', get_the_author_meta( 'country', $user->ID ) ); ?>>Peru</option>
                <option value="uruguai" <?php selected( 'uruguai', get_the_author_meta( 'country', $user->ID ) ); ?>>Uruguai</option>
                <option value="portugal" <?php selected( 'portugal', get_the_author_meta( 'country', $user->ID ) ); ?>>Portugal</option>
                <option value="espanha" <?php selected( 'espanha', get_the_author_meta( 'country', $user->ID ) ); ?>>Espanha</option>
                <option value="escocia" <?php selected( 'escocia', get_the_author_meta( 'country', $user->ID ) ); ?>>Escócia</option>
                <option value="suica" <?php selected( 'suica', get_the_author_meta( 'country', $user->ID ) ); ?>>Suíca</option>
            </select>
            <br />
        <span class="description"><?php _e("Selecione o País."); ?></span>
        </td>
    </tr>
    <tr>
        <th><label for="state"><?php _e("Estado"); ?></label></th>
        <td>
            <select name="state" id="state">
                <optgroup label="no Brasil">
                    <option value="AC" <?php selected( 'AC', get_the_author_meta( 'state', $user->ID ) ); ?>>AC</option>
                    <option value="AL" <?php selected( 'AL', get_the_author_meta( 'state', $user->ID ) ); ?>>AL</option>
                    <option value="AP" <?php selected( 'AP', get_the_author_meta( 'state', $user->ID ) ); ?>>AP</option>
                    <option value="AM" <?php selected( 'AM', get_the_author_meta( 'state', $user->ID ) ); ?>>AM</option>
                    <option value="BA" <?php selected( 'BA', get_the_author_meta( 'state', $user->ID ) ); ?>>BA</option>
                    <option value="CE" <?php selected( 'CE', get_the_author_meta( 'state', $user->ID ) ); ?>>CE</option>
                    <option value="DF" <?php selected( 'DF', get_the_author_meta( 'state', $user->ID ) ); ?>>DF</option>
                    <option value="ES" <?php selected( 'ES', get_the_author_meta( 'state', $user->ID ) ); ?>>ES</option>
                    <option value="GO" <?php selected( 'GO', get_the_author_meta( 'state', $user->ID ) ); ?>>GO</option>
                    <option value="MA" <?php selected( 'MA', get_the_author_meta( 'state', $user->ID ) ); ?>>MA</option>
                    <option value="MT" <?php selected( 'MT', get_the_author_meta( 'state', $user->ID ) ); ?>>MT</option>
                    <option value="MS" <?php selected( 'MS', get_the_author_meta( 'state', $user->ID ) ); ?>>MS</option>
                    <option value="MG" <?php selected( 'MG', get_the_author_meta( 'state', $user->ID ) ); ?>>MG</option>
                    <option value="PA" <?php selected( 'PA', get_the_author_meta( 'state', $user->ID ) ); ?>>PA</option>
                    <option value="PB" <?php selected( 'PB', get_the_author_meta( 'state', $user->ID ) ); ?>>PB</option>
                    <option value="PR" <?php selected( 'PR', get_the_author_meta( 'state', $user->ID ) ); ?>>PR</option>
                    <option value="PE" <?php selected( 'PE', get_the_author_meta( 'state', $user->ID ) ); ?>>PE</option>
                    <option value="PI" <?php selected( 'PI', get_the_author_meta( 'state', $user->ID ) ); ?>>PI</option>
                    <option value="RJ" <?php selected( 'RJ', get_the_author_meta( 'state', $user->ID ) ); ?>>RJ</option>
                    <option value="RN" <?php selected( 'RN', get_the_author_meta( 'state', $user->ID ) ); ?>>RN</option>
                    <option value="RS" <?php selected( 'RS', get_the_author_meta( 'state', $user->ID ) ); ?>>RS</option>
                    <option value="RO" <?php selected( 'RO', get_the_author_meta( 'state', $user->ID ) ); ?>>RO</option>
                    <option value="RR" <?php selected( 'RR', get_the_author_meta( 'state', $user->ID ) ); ?>>RR</option>
                    <option value="SC" <?php selected( 'SC', get_the_author_meta( 'state', $user->ID ) ); ?>>SC</option>
                    <option value="SP" <?php selected( 'SP', get_the_author_meta( 'state', $user->ID ) ); ?>>SP</option>
                    <option value="SE" <?php selected( 'SE', get_the_author_meta( 'state', $user->ID ) ); ?>>SE</option>
                    <option value="TO" <?php selected( 'TO', get_the_author_meta( 'state', $user->ID ) ); ?>>TO</option>
                </optgroup>
                <optgroup label="Internacional">
                    <option value="internacional" <?php selected( 'internacional', get_the_author_meta( 'state', $user->ID ) ); ?>>Internacional</option>
                </optgroup>
            </select>
            <br />
        <span class="description"><?php _e("Selecione seu Estado (somente Brasil)."); ?></span>
        </td>
    </tr>
    <tr>
        <th><label for="city"><?php _e("Cidade"); ?></label></th>
        <td>
        <input type="text" name="city" id="city" value="<?php echo esc_attr( get_the_author_meta( 'city', $user->ID ) ); ?>" class="regular-text" /><br />
        <span class="description"><?php _e("Informe sua cidade."); ?></span>
        </td>
    </tr>
</table>
<hr>
<h3><?php _e("Certificação"); ?></h3>

<table class="form-table certificao">
    <h4><?php _e("FCP"); ?></h4>
    <tr>
        <th>
            <label for="fcp"><?php _e("Frameworks® Coaching Proccess"); ?></label>
        </th>
        <td>
        <input type="checkbox" id="fcp" name="fcp" value="fcp" <?php if ( get_the_author_meta( 'fcp', $user->ID) == 'fcp' ) { ?>checked="checked"<?php }?>>
          <label for="fcp">Frameworks® Coaching Proccess</label>
          <br />
        <span class="description"><?php _e("Assinale em caso positivo."); ?></span>
        </td>
    </tr>
    <tr>
        <th>
            <label for="ffc"><?php _e("Frameworks® for Change"); ?></label>
        </th>
        <td>
        <input type="checkbox" id="ffc" name="ffc" value="ffc" <?php if ( get_the_author_meta( 'ffc', $user->ID) == 'ffc' ) { ?>checked="checked"<?php }?>>
          <label for="ffc">Frameworks® for Change</label>
          <br />
        <span class="description"><?php _e("Assinale em caso positivo."); ?></span>
        </td>
    </tr>
</table>
<hr>
<table class="form-table certificao">    
    <h4><?php _e("Jogo da Transformação®"); ?></h4>
    <tr>
        <th>
            <label for="jt_solo"><?php _e("Versão Solo"); ?></label>
        </th>
        <td>
        <input type="checkbox" id="jt_solo" name="jt_solo" value="jt_solo" <?php if ( get_the_author_meta( 'jt_solo', $user->ID) == 'jt_solo' ) { ?>checked="checked"<?php }?>>
          <label for="jt_solo">Versão Solo</label>
          <br />
        <span class="description"><?php _e("Assinale em caso positivo."); ?></span>
        </td>
    </tr>
    <tr>
        <th>
            <label for="jt_adv"><?php _e("Versão Avançada"); ?></label>
        </th>
        <td>
        <input type="checkbox" id="jt_adv" name="jt_adv" value="jt_adv" <?php if ( get_the_author_meta( 'jt_adv', $user->ID) == 'jt_adv' ) { ?>checked="checked"<?php }?>>
          <label for="jt_adv">Versão Avançada (2 a 6 pessoas)</label>
          <br />
        <span class="description"><?php _e("Assinale em caso positivo."); ?></span>
        </td>
    </tr>
    <tr>
        <th>
            <label for="jt_grupo"><?php _e("Versão de Grupo"); ?></label>
        </th>
        <td>
        <input type="checkbox" id="jt_grupo" name="jt_grupo" value="jt_grupo" <?php if ( get_the_author_meta( 'jt_grupo', $user->ID) == 'jt_grupo' ) { ?>checked="checked"<?php }?>>
          <label for="jt_grupo">Versão de Grupo (6 a 24 pessoas)</label>
          <br />
        <span class="description"><?php _e("Assinale em caso positivo."); ?></span>
        </td>
    </tr>
</table>
<hr>

<?php }

add_action( 'personal_options_update', 'save_extra_user_profile_fields' );
add_action( 'edit_user_profile_update', 'save_extra_user_profile_fields' );

function save_extra_user_profile_fields( $user_id ) {

if ( !current_user_can( 'edit_user', $user_id ) ) { return false; }

//localizacao
update_user_meta( $user_id, 'country', $_POST['country'] );
update_user_meta( $user_id, 'city', $_POST['city'] );
update_user_meta( $user_id, 'state', $_POST['state'] );
//certificacao FCP
update_user_meta( $user_id, 'fcp', $_POST['fcp'] );
update_user_meta( $user_id, 'ffc', $_POST['ffc'] );
//Certificação JT
update_user_meta( $user_id, 'jt_solo', $_POST['jt_solo'] );
update_user_meta( $user_id, 'jt_adv', $_POST['jt_adv'] );
update_user_meta( $user_id, 'jt_grupo', $_POST['jt_grupo'] );

}


/*
Plugin Name: Visual Biography Editor
Version: 1.4
Plugin URI: http://www.kevinleary.net/
Description: Replace the "Biographical Info" profile field with a TinyMCE visual, rich text editor. Requires WordPress 3.3 or higher.
Author: Kevin Leary
Author URI: http://www.kevinleary.net
License: GPL2

Copyright 2012  Kevin Leary  (email : info@kevinleary.net)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as 
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

class KLVisualBiographyEditor {
    private $name = 'Visual Biography Editor';
    
    /**
     * Setup WP hooks
     */
    public function __construct() {
        // Add a visual editor if the current user is an Author role or above and WordPress is v3.3+
        if ( function_exists('wp_editor') ) {

            // Add the WP_Editor
            add_action( 'show_user_profile', array($this, 'visual_editor') );
            add_action( 'edit_user_profile', array($this, 'visual_editor') );
            
            // Don't sanitize the data for display in a textarea
            add_action( 'admin_init', array($this, 'save_filters') );

            // Load required JS
            add_action( 'admin_enqueue_scripts', array($this, 'load_javascript'), 10, 1 );
            
            // Add content filters to the output of the description
            add_filter( 'get_the_author_description', 'wptexturize' );
            add_filter( 'get_the_author_description', 'convert_chars' );
            add_filter( 'get_the_author_description', 'wpautop' );
            add_filter( 'get_the_author_description', 'shortcode_unautop' );
        }
        // Display a message if the requires aren't met
        else {
            add_action( 'admin_notices', array($this, 'update_notice') );
        }
    }
    
    /**
     * Friendly notice if WP is out of date
     */
    public function update_notice() {
    
        // Notification is for administrators only
        if ( !current_user_can('administrator') )
            return;
        
        ?>
        <div class="updated">
            <p>The <strong><?php echo $this->name; ?></strong> plugin requires WordPress 3.3 or higher. Update WordPress or <a href="<?php echo get_admin_url(null, 'plugins.php'); ?>">de-activate the plugin</a>.</p>
        </div>
        <?php
    }
    
    
    /**
     *  Create Visual Editor
     *
     *  Add TinyMCE editor to replace the "Biographical Info" field in a user profile
     *
     * @uses wp_editor() http://codex.wordpress.org/Function_Reference/wp_editor
     * @param $user An object with details about the current logged in user
     */
    public function visual_editor( $user ) {
        
        // Contributor level user or higher required
        if ( !current_user_can('edit_posts') )
            return;
        ?>
        <h3><?php _e("Informações sobre o Facilitador", "frameworks"); ?></h3>
        <span class="description">Escreva uma minibiografia para constar no seu perfil.<br>Você também pode informar sua formação acadêmica e experiências profissionais.</span>
        <table class="form-table">
            <tr>
                <th><label for="description"><?php _e('Biographical Info'); ?></label></th>
                <td>
                    <?php 
                    $description = get_user_meta( $user->ID, 'description', true);
                    wp_editor( $description, 'description' ); 
                    ?>
                    <p class="description"><?php _e('Share a little biographical information to fill out your profile. This may be shown publicly.'); ?></p>
                </td>
            </tr>
        </table>
        <?php
    }
    
    /**
     * Admin JS customizations to the footer
     *
     * @uses wp_enqueue_script() http://codex.wordpress.org/Function_Reference/wp_enqueue_script
     * @uses plugin_dir_path() http://codex.wordpress.org/Function_Reference/plugin_dir_path
     */
    public function load_javascript( $hook ) {
        
        // Contributor level user or higher required
        if ( !current_user_can('edit_posts') )
            return;
        
        // Load JavaScript only on the profile and user edit pages 
        if ( $hook == 'profile.php' || $hook == 'user-edit.php' ) {
            wp_enqueue_script(
                'visual-editor-biography', 
                get_template_directory_uri() . '/js/user-area.js', 
                array('jquery'), 
                false, 
                true
            );
        }
    }
    
    /**
     * Remove textarea filters from description field
     */
    public function save_filters() {
        
        // Contributor level user or higher required
        if ( !current_user_can('edit_posts') )
            return;

        remove_all_filters('pre_user_description');
    }
}

$kpl_visual_editor_biography = new KLVisualBiographyEditor();



/**
 * Register custom query vars
 *
 * @param array $vars The array of available query variables
 * 
 * @link https://codex.wordpress.org/Plugin_API/Filter_Reference/query_vars
 */
function consultores_state_register_query_vars( $vars ) {
    $vars[] = 'state';
    return $vars;
}
add_filter( 'query_vars', 'consultores_state_register_query_vars' );







//Change Author Base URL in WordPress Permalinks
add_action('init','change_author_permalinks');
function change_author_permalinks() {
    global $wp_rewrite;

    //$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
    //$state = $curauth->state;

    $wp_rewrite->author_base = 'facilitador'; // Change 'member' to be the base URL you wish to use  
    $wp_rewrite->author_structure = '/' . $wp_rewrite->author_base. '/%author%';
}  





