<?php
/**
 * Recursos IA Theme Functions
 */

// Register Custom Post Type for AI Resources
function recursos_ia_register_post_type() {
    $labels = array(
        'name'                  => 'Recursos IA',
        'singular_name'         => 'Recurs',
        'menu_name'             => 'Recursos IA',
        'add_new'               => 'Afegir Nou',
        'add_new_item'          => 'Afegir Nou Recurs',
        'edit_item'             => 'Editar Recurs',
        'new_item'              => 'Nou Recurs',
        'view_item'             => 'Veure Recurs',
        'search_items'          => 'Cercar Recursos',
        'not_found'             => 'No s\'han trobat recursos',
        'not_found_in_trash'    => 'No hi ha recursos a la paperera'
    );

    $args = array(
        'labels'                => $labels,
        'public'                => true,
        'has_archive'           => true,
        'publicly_queryable'    => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'query_var'             => true,
        'rewrite'               => array('slug' => 'recurs'),
        'capability_type'       => 'post',
        'has_archive'           => true,
        'hierarchical'          => false,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-networking',
        'supports'              => array('title', 'editor', 'thumbnail'),
        'show_in_rest'          => true,
    );

    register_post_type('recurs_ia', $args);
}
add_action('init', 'recursos_ia_register_post_type');

// Register Taxonomies (Categories and Subcategories)
function recursos_ia_register_taxonomies() {
    // Main Category
    $category_labels = array(
        'name'              => 'Categories',
        'singular_name'     => 'Categoria',
        'search_items'      => 'Cercar Categories',
        'all_items'         => 'Totes les Categories',
        'parent_item'       => 'Categoria Principal',
        'parent_item_colon' => 'Categoria Principal:',
        'edit_item'         => 'Editar Categoria',
        'update_item'       => 'Actualitzar Categoria',
        'add_new_item'      => 'Afegir Nova Categoria',
        'new_item_name'     => 'Nom de Nova Categoria',
        'menu_name'         => 'Categories'
    );

    register_taxonomy('categoria_ia', array('recurs_ia'), array(
        'hierarchical'      => true,
        'labels'            => $category_labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'categoria'),
        'show_in_rest'      => true,
    ));

    // Subcategory
    $subcategory_labels = array(
        'name'              => 'Subcategories',
        'singular_name'     => 'Subcategoria',
        'search_items'      => 'Cercar Subcategories',
        'all_items'         => 'Totes les Subcategories',
        'parent_item'       => 'Subcategoria Principal',
        'parent_item_colon' => 'Subcategoria Principal:',
        'edit_item'         => 'Editar Subcategoria',
        'update_item'       => 'Actualitzar Subcategoria',
        'add_new_item'      => 'Afegir Nova Subcategoria',
        'new_item_name'     => 'Nom de Nova Subcategoria',
        'menu_name'         => 'Subcategories'
    );

    register_taxonomy('subcategoria_ia', array('recurs_ia'), array(
        'hierarchical'      => true,
        'labels'            => $subcategory_labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'subcategoria'),
        'show_in_rest'      => true,
    ));
}
add_action('init', 'recursos_ia_register_taxonomies');

// Add custom meta boxes for URL
function recursos_ia_add_meta_boxes() {
    add_meta_box(
        'recurs_url',
        'URL del Recurs',
        'recursos_ia_url_meta_box',
        'recurs_ia',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'recursos_ia_add_meta_boxes');

function recursos_ia_url_meta_box($post) {
    wp_nonce_field('recursos_ia_save_url', 'recursos_ia_url_nonce');
    $url = get_post_meta($post->ID, '_recurs_url', true);
    echo '<input type="url" name="recurs_url" value="' . esc_attr($url) . '" class="widefat" placeholder="https://..." required>';
}

function recursos_ia_save_url($post_id) {
    if (!isset($_POST['recursos_ia_url_nonce']) || !wp_verify_nonce($_POST['recursos_ia_url_nonce'], 'recursos_ia_save_url')) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    if (isset($_POST['recurs_url'])) {
        update_post_meta($post_id, '_recurs_url', sanitize_text_field($_POST['recurs_url']));
    }
}
add_action('save_post', 'recursos_ia_save_url');

// Enqueue styles and scripts
function recursos_ia_enqueue_assets() {
    wp_enqueue_style('recursos-ia-style', get_template_directory_uri() . '/assets/css/style.css', array(), '1.0');
    wp_enqueue_script('recursos-ia-script', get_template_directory_uri() . '/assets/js/main.js', array(), '1.0', true);

    // Pass data to JavaScript
    wp_localize_script('recursos-ia-script', 'recursosIA', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('recursos_ia_nonce')
    ));
}
add_action('wp_enqueue_scripts', 'recursos_ia_enqueue_assets');

// AJAX handler for search
function recursos_ia_ajax_search() {
    check_ajax_referer('recursos_ia_nonce', 'nonce');

    $search_term = sanitize_text_field($_POST['search']);

    $args = array(
        'post_type' => 'recurs_ia',
        'posts_per_page' => -1,
        's' => $search_term
    );

    $query = new WP_Query($args);
    $results = array();

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $results[] = array(
                'id' => get_the_ID(),
                'title' => get_the_title(),
                'url' => get_post_meta(get_the_ID(), '_recurs_url', true),
                'description' => get_the_content(),
            );
        }
    }

    wp_reset_postdata();
    wp_send_json_success($results);
}
add_action('wp_ajax_recursos_ia_search', 'recursos_ia_ajax_search');
add_action('wp_ajax_nopriv_recursos_ia_search', 'recursos_ia_ajax_search');

// Theme setup
function recursos_ia_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'recursos_ia_setup');
