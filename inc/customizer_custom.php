<?php
/**
 * Understrap Theme Customizer
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

//Informações da Empresa
function custom_theme_customize_register($wp_customize) {

	//SECTION - title_tagline - use native Identity section	
	//Logo alt - transparent header logo
	$wp_customize->add_setting( 'alt_custom_logo', array(
	'default' => '',
	'capability' => 'edit_theme_options'
	) );
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'alt_custom_logo', array(
	'label' => __( 'Logo alternativo', 'understrap' ),
	'description' => __( 'Logo utilizado para o cabeçalho transparente.', 'understrap' ),
	'section' => 'title_tagline',
	'settings' => 'alt_custom_logo',
	'priority'    => 8, //below the Logo
	) ) );



	// SECTION - INFO DA EMPRESA.
	$wp_customize->add_section( 'corp_info_layout_options', array(
		'title'       => __( 'Informações da Empresa', 'understrap' ),
		'capability'  => 'edit_theme_options',
		'description' => __( 'Informações institucionais (endereço, telefones, redes sociais etc).', 'understrap' ),
		'priority'    => 170,
	) );

	//Endereço Linha1
	$wp_customize->add_setting( 'endereco_site', array(
	'default' => '',
	'capability' => 'edit_theme_options'
	) );

	$wp_customize->add_control( 'endereco_site', array(
	'label' => 'Endereço - Linha 1 (Rua, número e bairro)',
	'section' => 'corp_info_layout_options',
	'type' => 'text'
	) );

	//Endereço Linha2
	$wp_customize->add_setting( 'endereco2_site', array(
	'default' => '',
	'capability' => 'edit_theme_options'
	) );

	$wp_customize->add_control( 'endereco2_site', array(
	'label' => 'Endereço - Linha 2 (CEP, Cidade e Estado)',
	'section' => 'corp_info_layout_options',
	'type' => 'text'
	) );

	//Telefone
	$wp_customize->add_setting( 'telefone_site', array(
	'default' => '',
	'capability' => 'edit_theme_options'
	) );

	$wp_customize->add_control( 'telefone_site', array(
	'label' => 'Telefone (incluir DDD)',
	'section' => 'corp_info_layout_options',
	'type' => 'text'
	) );

	//Whatsapp
	$wp_customize->add_setting( 'whatsapp_site', array(
	'default' => '',
	'capability' => 'edit_theme_options'
	) );

	$wp_customize->add_control( 'whatsapp_site', array(
	'label' => 'Whatsapp (incluir DDD)',
	'section' => 'corp_info_layout_options',
	'type' => 'text'
	) );

	//Email
	$wp_customize->add_setting( 'email_site', array(
	'default' => '',
	'capability' => 'edit_theme_options'
	) );

	$wp_customize->add_control( 'email_site', array(
	'label' => 'E-mail para contato',
	'section' => 'corp_info_layout_options',
	'type' => 'text'
	) );

	//Email2
	$wp_customize->add_setting( 'email2_site', array(
	'default' => '',
	'capability' => 'edit_theme_options'
	) );

	$wp_customize->add_control( 'email2_site', array(
	'label' => 'E-mail 2 para contato',
	'section' => 'corp_info_layout_options',
	'type' => 'text'
	) );

	
	// SECTION - RODAPÉ
	$wp_customize->add_section( 'custom_footer_layout_options', array(
		'title'       => __( 'Rodapé', 'understrap' ),
		'capability'  => 'edit_theme_options',
		'description' => __( 'Informações para o rodapé.', 'understrap' ),
		'priority'    => 160,
	) );

	//Footer Credits
	$wp_customize->add_setting( 'footer_credits', array(
	'default' => '',
	'capability' => 'edit_theme_options'
	) );

	$wp_customize->add_control( 'footer_credits', array(
	'label' => 'Créditos do rodapé (aceita shortcodes)',
	'description' => 'Sugestão: [copyright] [sitename] [year] - Todos os direitos reservados',
	'section' => 'custom_footer_layout_options',
	'type' => 'text'
	) );


	//SEÇÃO - REDES SOCIAIS
	//REDES SOCIAIS
	$wp_customize->add_section( 'custom_social_layout_options', array(
		'title'       => __( 'Redes Sociais', 'understrap' ),
		'capability'  => 'edit_theme_options',
		'description' => __( 'Endereços das Redes Sociais.', 'understrap' ),
		'priority'    => 160,
	) );

	//Facebook
	$wp_customize->add_setting( 'facebook_site', array(
	'default' => '',
	'capability' => 'edit_theme_options'
	) );

	$wp_customize->add_control( 'facebook_site', array(
	'label' => 'Endereço Facebook (incluir https://)',
	'section' => 'custom_social_layout_options',
	'type' => 'text'
	) );

	//Instagram
	$wp_customize->add_setting( 'instagram_site', array(
	'default' => '',
	'capability' => 'edit_theme_options'
	) );

	$wp_customize->add_control( 'instagram_site', array(
	'label' => 'Endereço Instagram (incluir https://)',
	'section' => 'custom_social_layout_options',
	'type' => 'text'
	) );

	//Linkedin
	$wp_customize->add_setting( 'linkedin_site', array(
	'default' => '',
	'capability' => 'edit_theme_options'
	) );

	$wp_customize->add_control( 'linkedin_site', array(
	'label' => 'Endereço Linkedin (incluir https://)',
	'section' => 'custom_social_layout_options',
	'type' => 'text'
	) );

	//Twitter
	$wp_customize->add_setting( 'twitter_site', array(
	'default' => '',
	'capability' => 'edit_theme_options'
	) );

	$wp_customize->add_control( 'twitter_site', array(
	'label' => 'Endereço Twitter (incluir https://)',
	'section' => 'custom_social_layout_options',
	'type' => 'text'
	) );

	//Youtube
	$wp_customize->add_setting( 'youtube_site', array(
	'default' => '',
	'capability' => 'edit_theme_options'
	) );

	$wp_customize->add_control( 'youtube_site', array(
	'label' => 'Endereço Youtube (incluir https://)',
	'section' => 'custom_social_layout_options',
	'type' => 'text'
	) );

	//SEÇÃO - JOGO DA TRANSFORMACAO
	//Certificações
	$wp_customize->add_section( 'custom_jogodatransformacao_layout_options', array(
		'title'       => __( 'Jogo da Transformação', 'understrap' ),
		'capability'  => 'edit_theme_options',
		'description' => __( 'Informações do Jogo.', 'understrap' ),
		'priority'    => 160,
	) );

	//SOLO
	$wp_customize->add_setting( 'jt_solo_description', array(
	'default' => '',
	'capability' => 'edit_theme_options'
	) );

	$wp_customize->add_control( 'jt_solo_description', array(
	'label' => 'Descrição da certificação da Versão Solo:',
	'section' => 'custom_jogodatransformacao_layout_options',
	'type' => 'text'
	) );

	//ADV
	$wp_customize->add_setting( 'jt_adv_description', array(
	'default' => '',
	'capability' => 'edit_theme_options'
	) );

	$wp_customize->add_control( 'jt_adv_description', array(
	'label' => 'Descrição da certificação da Versão Avançada:',
	'section' => 'custom_jogodatransformacao_layout_options',
	'type' => 'text'
	) );

	//GRUPO
	$wp_customize->add_setting( 'jt_grupo_description', array(
	'default' => '',
	'capability' => 'edit_theme_options'
	) );

	$wp_customize->add_control( 'jt_grupo_description', array(
	'label' => 'Descrição da certificação da Versão de Grupo:',
	'section' => 'custom_jogodatransformacao_layout_options',
	'type' => 'text'
	) );

	//FFC
	$wp_customize->add_setting( 'ffc_description', array(
	'default' => '',
	'capability' => 'edit_theme_options'
	) );

	$wp_customize->add_control( 'ffc_description', array(
	'label' => 'Descrição da certificação do FFC:',
	'section' => 'custom_jogodatransformacao_layout_options',
	'type' => 'text'
	) );

	//FCP
	$wp_customize->add_setting( 'fcp_description', array(
	'default' => '',
	'capability' => 'edit_theme_options'
	) );

	$wp_customize->add_control( 'fcp_description', array(
	'label' => 'Descrição da certificação do FCP:',
	'section' => 'custom_jogodatransformacao_layout_options',
	'type' => 'text'
	) );

}

add_action( 'customize_register', 'custom_theme_customize_register' );
