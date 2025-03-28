<?php
/**
 * InverSur Theme Functions
 *
 * @package InverSur
 */

if (!defined('ABSPATH')) {
    exit; // Salir si se accede directamente
}

/**
 * Registrar y cargar los assets del tema
 */
function inv_assets() {
    // Registrar y encolar estilos
    wp_register_style(
        'inv-styles', 
        get_template_directory_uri() . '/style.css',
        array(),
        '1.0.0',
        'all'
    );
    
    wp_register_style(
        'inv-custom-styles', 
        get_template_directory_uri() . '/assets/css/styles.css',
        array(),
        '1.0.0',
        'all'
    );

    // Registrar y encolar scripts
    wp_register_script(
        'inv-carousel',
        get_template_directory_uri() . '/assets/js/carousel.js',
        array('jquery'),
        '1.0.0',
        true
    );

    // Agregar Font Awesome
    wp_register_style(
        'font-awesome',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css',
        array(),
        '5.15.3',
        'all'
    );

    // Encolar los estilos
    wp_enqueue_style('inv-styles');
    wp_enqueue_style('inv-custom-styles');
    wp_enqueue_style('font-awesome');

    // Encolar los scripts
    wp_enqueue_script('inv-carousel');
}

// Agregar la función al hook de WordPress
add_action('wp_enqueue_scripts', 'inv_assets');

function inv_theme_support() {
    // Añadir soporte para títulos dinámicos
    add_theme_support('title-tag');
    
    // Otros soportes que puedas necesitar
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo', array(
        'height'      => 60,
        'width'       => 180,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array('site-title', 'site-description'),
    ));
    add_theme_support('automatic-feed-links');
}

add_action('after_setup_theme', 'inv_theme_support'); 