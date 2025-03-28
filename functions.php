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

/**
 * Registrar los menús de navegación
 */
function inv_register_menus() {
    register_nav_menus(array(
        'menu-principal' => __('Menú Principal', 'inversur'),
        'menu-mobile'    => __('Menú Mobile', 'inversur')
    ));
}
add_action('init', 'inv_register_menus');

/**
 * Custom Walker Class para el menú de navegación
 */
class Inversur_Nav_Walker extends Walker_Nav_Menu {
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
        $output .= '<li class="nav__item">';
        
        $attributes = '';
        
        if (!empty($item->url)) {
            $attributes .= ' href="' . esc_attr($item->url) . '"';
        }
        
        $item_output = $args->before;
        $item_output .= '<a class="nav__link"' . $attributes . '>';
        $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;
        
        $output .= $item_output;
    }
}

/**
 * Registrar Custom Post Type para Productos
 */
function inv_register_producto_post_type() {
    $labels = array(
        'name'                  => _x('Productos', 'Post type general name', 'inversur'),
        'singular_name'         => _x('Producto', 'Post type singular name', 'inversur'),
        'menu_name'            => _x('Productos', 'Admin Menu text', 'inversur'),
        'name_admin_bar'       => _x('Producto', 'Add New on Toolbar', 'inversur'),
        'add_new'              => __('Agregar Nuevo', 'inversur'),
        'add_new_item'         => __('Agregar Nuevo Producto', 'inversur'),
        'new_item'             => __('Nuevo Producto', 'inversur'),
        'edit_item'            => __('Editar Producto', 'inversur'),
        'view_item'            => __('Ver Producto', 'inversur'),
        'all_items'            => __('Todos los Productos', 'inversur'),
        'search_items'         => __('Buscar Productos', 'inversur'),
        'parent_item_colon'    => __('Producto Padre:', 'inversur'),
        'not_found'            => __('No se encontraron productos.', 'inversur'),
        'not_found_in_trash'   => __('No se encontraron productos en la papelera.', 'inversur'),
        'featured_image'       => _x('Imagen del Producto', 'Overrides the "Featured Image" phrase', 'inversur'),
        'set_featured_image'   => _x('Establecer imagen del producto', 'Overrides the "Set featured image" phrase', 'inversur'),
        'remove_featured_image'=> _x('Remover imagen del producto', 'Overrides the "Remove featured image" phrase', 'inversur'),
        'use_featured_image'   => _x('Usar como imagen del producto', 'Overrides the "Use as featured image" phrase', 'inversur'),
        'archives'             => _x('Archivo de productos', 'The post type archive label used in nav menus', 'inversur'),
        'insert_into_item'     => _x('Insertar en producto', 'Overrides the "Insert into post" phrase', 'inversur'),
        'uploaded_to_this_item'=> _x('Subido a este producto', 'Overrides the "Uploaded to this post" phrase', 'inversur'),
        'filter_items_list'    => _x('Filtrar lista de productos', 'Screen reader text for filter links', 'inversur'),
        'items_list_navigation'=> _x('Navegación de lista de productos', 'Screen reader text for pagination', 'inversur'),
        'items_list'           => _x('Lista de productos', 'Screen reader text for list of items', 'inversur'),
    );

    $args = array(
        'labels'              => $labels,
        'public'              => true,
        'publicly_queryable'  => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'productos'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-cart',
        'supports'           => array(
            'title',
            'editor',
            'thumbnail',
            'excerpt',
            'custom-fields',
            'revisions'
        ),
        'show_in_rest'       => true, // Habilita Gutenberg
        'taxonomies'         => array('category', 'post_tag'), // Opcional: si quieres usar categorías y etiquetas
    );

    register_post_type('producto', $args);

    // Limpia las reglas de reescritura después de registrar el CPT
    flush_rewrite_rules();
}
add_action('init', 'inv_register_producto_post_type');

/**
 * Agregar campos personalizados para productos
 */
function inv_add_producto_meta_boxes() {
    add_meta_box(
        'producto_detalles',
        __('Detalles del Producto', 'inversur'),
        'inv_producto_detalles_callback',
        'producto',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'inv_add_producto_meta_boxes');

/**
 * Callback para mostrar los campos personalizados
 */
function inv_producto_detalles_callback($post) {
    // Agregar nonce para verificación
    wp_nonce_field('inv_producto_meta_box', 'inv_producto_meta_box_nonce');

    // Obtener valores existentes
    $precio = get_post_meta($post->ID, '_precio_producto', true);
    $sku = get_post_meta($post->ID, '_sku_producto', true);
    $stock = get_post_meta($post->ID, '_stock_producto', true);

    ?>
    <div class="producto-campos">
        <p>
            <label for="precio_producto"><?php _e('Precio:', 'inversur'); ?></label>
            <input type="number" step="0.01" id="precio_producto" name="precio_producto" value="<?php echo esc_attr($precio); ?>" class="widefat">
        </p>
        <p>
            <label for="sku_producto"><?php _e('SKU:', 'inversur'); ?></label>
            <input type="text" id="sku_producto" name="sku_producto" value="<?php echo esc_attr($sku); ?>" class="widefat">
        </p>
        <p>
            <label for="stock_producto"><?php _e('Stock:', 'inversur'); ?></label>
            <input type="number" id="stock_producto" name="stock_producto" value="<?php echo esc_attr($stock); ?>" class="widefat">
        </p>
    </div>
    <?php
}

/**
 * Guardar los campos personalizados
 */
function inv_save_producto_meta($post_id) {
    // Verificar nonce
    if (!isset($_POST['inv_producto_meta_box_nonce'])) {
        return;
    }
    if (!wp_verify_nonce($_POST['inv_producto_meta_box_nonce'], 'inv_producto_meta_box')) {
        return;
    }
    // Verificar autoguardado
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    // Guardar campos
    if (isset($_POST['precio_producto'])) {
        update_post_meta($post_id, '_precio_producto', sanitize_text_field($_POST['precio_producto']));
    }
    if (isset($_POST['sku_producto'])) {
        update_post_meta($post_id, '_sku_producto', sanitize_text_field($_POST['sku_producto']));
    }
    if (isset($_POST['stock_producto'])) {
        update_post_meta($post_id, '_stock_producto', sanitize_text_field($_POST['stock_producto']));
    }
}
add_action('save_post_producto', 'inv_save_producto_meta');

/**
 * Agregar tamaño de imagen personalizado para el carrusel
 */
function inv_add_image_sizes() {
    add_image_size('carousel-size', 1024, 900, false);
}
add_action('after_setup_theme', 'inv_add_image_sizes'); 