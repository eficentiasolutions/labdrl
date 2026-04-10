<?php
/**
 * AI VetLab Theme Functions
 */

if ( ! defined( 'ABSPATH' ) ) exit;

/* ─── SETUP ─── */
function aivetlab_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', [ 'search-form','comment-form','comment-list','gallery','caption' ] );
    add_theme_support( 'custom-logo', [
        'height'      => 80,
        'width'       => 200,
        'flex-height' => true,
        'flex-width'  => true,
    ]);

    register_nav_menus([
        'primary' => __( 'Menú principal', 'aivetlab' ),
        'footer'  => __( 'Menú pie de página', 'aivetlab' ),
    ]);
}
add_action( 'after_setup_theme', 'aivetlab_setup' );

/* ─── ENQUEUE SCRIPTS & STYLES ─── */
function aivetlab_scripts() {
    // Google Fonts
    wp_enqueue_style(
        'aivetlab-fonts',
        'https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,400&display=swap',
        [], null
    );
    // Main stylesheet
    wp_enqueue_style( 'aivetlab-style', get_stylesheet_uri(), ['aivetlab-fonts'], '1.0.0' );
    // Main JS
    wp_enqueue_script( 'aivetlab-main', get_template_directory_uri() . '/assets/js/main.js', ['jquery'], '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'aivetlab_scripts' );

/* ─── CUSTOM IMAGE SIZES ─── */
add_image_size( 'aivetlab-hero',    1920, 900, true );
add_image_size( 'aivetlab-service', 800,  500, true );
add_image_size( 'aivetlab-step',    600,  400, true );
add_image_size( 'aivetlab-about',   700,  900, true );

/* ─── CUSTOM POST TYPE: SERVICIOS ─── */
function aivetlab_register_cpts() {
    register_post_type( 'servicio', [
        'labels' => [
            'name'          => __( 'Servicios', 'aivetlab' ),
            'singular_name' => __( 'Servicio', 'aivetlab' ),
            'add_new_item'  => __( 'Añadir nuevo servicio', 'aivetlab' ),
            'edit_item'     => __( 'Editar servicio', 'aivetlab' ),
        ],
        'public'        => true,
        'has_archive'   => false,
        'show_in_rest'  => true,
        'supports'      => ['title', 'editor', 'thumbnail', 'excerpt'],
        'menu_icon'     => 'dashicons-heart',
        'menu_position' => 5,
    ]);

    register_post_type( 'paso', [
        'labels' => [
            'name'          => __( 'Pasos del proceso', 'aivetlab' ),
            'singular_name' => __( 'Paso', 'aivetlab' ),
            'add_new_item'  => __( 'Añadir paso', 'aivetlab' ),
        ],
        'public'       => true,
        'has_archive'  => false,
        'show_in_rest' => true,
        'supports'     => ['title', 'editor', 'thumbnail', 'excerpt'],
        'menu_icon'    => 'dashicons-list-view',
        'menu_position'=> 6,
    ]);
}
add_action( 'init', 'aivetlab_register_cpts' );

/* ─── THEME OPTIONS (Customizer) ─── */
function aivetlab_customize_register( $wp_customize ) {

    // Panel general
    $wp_customize->add_panel( 'aivetlab_panel', [
        'title'    => __('AI VetLab: Opciones del tema', 'aivetlab'),
        'priority' => 10,
    ]);

    // --- SECCIÓN HERO ---
    $wp_customize->add_section( 'aivetlab_hero', [
        'title' => __('Hero / Portada', 'aivetlab'),
        'panel' => 'aivetlab_panel',
    ]);
    aivetlab_add_setting( $wp_customize, 'hero_label',    __('Etiqueta hero',   'aivetlab'), 'Laboratorio veterinario · Inteligencia Artificial', 'aivetlab_hero' );
    aivetlab_add_setting( $wp_customize, 'hero_title',    __('Título hero',     'aivetlab'), 'Gestión de muestras veterinarias', 'aivetlab_hero' );
    aivetlab_add_setting( $wp_customize, 'hero_subtitle', __('Subtítulo hero',  'aivetlab'), 'Rápido, eficaz y económico. Sin necesidad de visita al veterinario.', 'aivetlab_hero' );
    aivetlab_add_setting( $wp_customize, 'hero_btn1_text',__('Botón 1 texto',   'aivetlab'), 'Ver servicios', 'aivetlab_hero' );
    aivetlab_add_setting( $wp_customize, 'hero_btn1_url', __('Botón 1 enlace',  'aivetlab'), '#servicios', 'aivetlab_hero' );
    aivetlab_add_setting( $wp_customize, 'hero_btn2_text',__('Botón 2 texto',   'aivetlab'), 'Contactar', 'aivetlab_hero' );
    aivetlab_add_setting( $wp_customize, 'hero_btn2_url', __('Botón 2 enlace',  'aivetlab'), '#contacto', 'aivetlab_hero' );

    // Hero image
    $wp_customize->add_setting( 'aivetlab_hero_image', ['default'=>'','sanitize_callback'=>'esc_url_raw','transport'=>'refresh'] );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'aivetlab_hero_image', [
        'label'   => __('Imagen de fondo hero','aivetlab'),
        'section' => 'aivetlab_hero',
    ]));

    // --- SECCIÓN ABOUT ---
    $wp_customize->add_section( 'aivetlab_about', [
        'title' => __('Sección: Acerca de', 'aivetlab'),
        'panel' => 'aivetlab_panel',
    ]);
    aivetlab_add_setting( $wp_customize, 'about_label',    __('Etiqueta',   'aivetlab'), 'Acerca de nosotros', 'aivetlab_about' );
    aivetlab_add_setting( $wp_customize, 'about_title',    __('Título',     'aivetlab'), 'Innovación en análisis veterinarios', 'aivetlab_about' );
    aivetlab_add_setting( $wp_customize, 'about_subtitle', __('Subtítulo',  'aivetlab'), 'Gestión eficiente de muestras', 'aivetlab_about' );
    aivetlab_add_setting( $wp_customize, 'about_text1',    __('Párrafo 1',  'aivetlab'), 'En AI VetLab, transformamos la forma en que se gestionan las muestras biológicas de tus animales de compañía.', 'aivetlab_about', 'textarea' );
    aivetlab_add_setting( $wp_customize, 'about_text2',    __('Párrafo 2',  'aivetlab'), 'Nuestro sistema permite la recepción, gestión y envío de muestras como sangre y orina a laboratorios concertados.', 'aivetlab_about', 'textarea' );
    aivetlab_add_setting( $wp_customize, 'about_badge_num',__('Badge número','aivetlab'), '4', 'aivetlab_about' );
    aivetlab_add_setting( $wp_customize, 'about_badge_lbl',__('Badge texto', 'aivetlab'), 'Pasos simples', 'aivetlab_about' );

    $wp_customize->add_setting( 'aivetlab_about_image', ['default'=>'','sanitize_callback'=>'esc_url_raw','transport'=>'refresh'] );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'aivetlab_about_image', [
        'label'   => __('Imagen Acerca de','aivetlab'),
        'section' => 'aivetlab_about',
    ]));

    // --- SECCIÓN CONTACTO ---
    $wp_customize->add_section( 'aivetlab_contact', [
        'title' => __('Sección: Contacto', 'aivetlab'),
        'panel' => 'aivetlab_panel',
    ]);
    aivetlab_add_setting( $wp_customize, 'contact_email',   __('Email',      'aivetlab'), 'globalmusic.sl@gmail.com', 'aivetlab_contact' );
    aivetlab_add_setting( $wp_customize, 'contact_city',    __('Ciudad',     'aivetlab'), 'Almoradí', 'aivetlab_contact' );
    aivetlab_add_setting( $wp_customize, 'contact_state',   __('Provincia',  'aivetlab'), 'Valencia', 'aivetlab_contact' );
    aivetlab_add_setting( $wp_customize, 'contact_country', __('País',       'aivetlab'), 'España', 'aivetlab_contact' );
    aivetlab_add_setting( $wp_customize, 'contact_cf7_id',  __('ID del formulario CF7', 'aivetlab'), '', 'aivetlab_contact' );

    // --- FOOTER ---
    $wp_customize->add_section( 'aivetlab_footer', [
        'title' => __('Pie de página', 'aivetlab'),
        'panel' => 'aivetlab_panel',
    ]);
    aivetlab_add_setting( $wp_customize, 'footer_copy', __('Copyright', 'aivetlab'), '© 2025 AI VetLab · Almoradí, España', 'aivetlab_footer' );
}
add_action( 'customize_register', 'aivetlab_customize_register' );

/* Helper para añadir settings/controls de texto */
function aivetlab_add_setting( $wp_customize, $id, $label, $default, $section, $type = 'text' ) {
    $wp_customize->add_setting( 'aivetlab_' . $id, [
        'default'           => $default,
        'sanitize_callback' => $type === 'textarea' ? 'sanitize_textarea_field' : 'sanitize_text_field',
        'transport'         => 'refresh',
    ]);
    $wp_customize->add_control( 'aivetlab_' . $id, [
        'label'   => $label,
        'section' => 'aivetlab_' . $section,
        'type'    => $type,
    ]);
}

/* Helper para leer settings */
function aivetlab_get( $key, $fallback = '' ) {
    return get_theme_mod( 'aivetlab_' . $key, $fallback );
}

/* ─── EXCERPT LENGTH ─── */
function aivetlab_excerpt_length() { return 20; }
add_filter( 'excerpt_length', 'aivetlab_excerpt_length' );

/* ─── WIDGETS ─── */
function aivetlab_widgets_init() {
    register_sidebar([
        'name'          => __( 'Barra lateral', 'aivetlab' ),
        'id'            => 'sidebar-1',
        'before_widget' => '<div class="widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ]);
}
add_action( 'widgets_init', 'aivetlab_widgets_init' );
