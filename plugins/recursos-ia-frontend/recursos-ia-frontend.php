<?php
/**
 * Plugin Name: Recursos IA Frontend Editor
 * Plugin URI: https://example.com
 * Description: Permet afegir i gestionar recursos d'IA des del frontend amb modal elegant
 * Version: 1.0
 * Author: Tu
 * Text Domain: recursos-ia-frontend
 */

if (!defined('ABSPATH')) exit;

class Recursos_IA_Frontend {

    public function __construct() {
        add_action('wp_enqueue_scripts', array($this, 'enqueue_assets'));
        add_action('wp_footer', array($this, 'render_modal'));
        add_action('wp_ajax_save_recurs_ia', array($this, 'ajax_save_recurs'));
        add_action('wp_ajax_nopriv_save_recurs_ia', array($this, 'ajax_save_recurs'));
        add_action('wp_ajax_get_categories_ia', array($this, 'ajax_get_categories'));
        add_action('wp_ajax_nopriv_get_categories_ia', array($this, 'ajax_get_categories'));
        add_action('wp_ajax_create_category_ia', array($this, 'ajax_create_category'));
        add_action('wp_ajax_create_subcategory_ia', array($this, 'ajax_create_subcategory'));
    }

    public function enqueue_assets() {
        wp_enqueue_style('recursos-ia-frontend', plugin_dir_url(__FILE__) . 'assets/css/frontend.css', array(), '1.0');
        wp_enqueue_script('recursos-ia-frontend', plugin_dir_url(__FILE__) . 'assets/js/frontend.js', array('jquery'), '1.0', true);

        wp_localize_script('recursos-ia-frontend', 'recursosIAFrontend', array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('recursos_ia_frontend_nonce'),
            'user_logged_in' => is_user_logged_in(),
            'user_can_edit' => current_user_can('edit_posts')
        ));
    }

    public function render_modal() {
        if (!is_user_logged_in() || !current_user_can('edit_posts')) {
            return;
        }

        include plugin_dir_path(__FILE__) . 'templates/modal.php';
    }

    public function ajax_save_recurs() {
        check_ajax_referer('recursos_ia_frontend_nonce', 'nonce');

        if (!current_user_can('edit_posts')) {
            wp_send_json_error(array('message' => 'No tens permisos per afegir recursos'));
        }

        $title = sanitize_text_field($_POST['title']);
        $url = esc_url_raw($_POST['url']);
        $description = sanitize_textarea_field($_POST['description']);
        $category_id = intval($_POST['category']);
        $subcategory_id = intval($_POST['subcategory']);

        // Validation
        if (empty($title) || empty($url) || empty($description)) {
            wp_send_json_error(array('message' => 'Tots els camps són obligatoris'));
        }

        // Create post
        $post_id = wp_insert_post(array(
            'post_title' => $title,
            'post_content' => $description,
            'post_status' => 'publish',
            'post_type' => 'recurs_ia',
            'post_author' => get_current_user_id()
        ));

        if (is_wp_error($post_id)) {
            wp_send_json_error(array('message' => 'Error al crear el recurs'));
        }

        // Add URL meta
        update_post_meta($post_id, '_recurs_url', $url);

        // Assign terms
        if ($category_id) {
            wp_set_object_terms($post_id, $category_id, 'categoria_ia');
        }
        if ($subcategory_id) {
            wp_set_object_terms($post_id, $subcategory_id, 'subcategoria_ia');
        }

        wp_send_json_success(array(
            'message' => 'Recurs afegit correctament!',
            'post_id' => $post_id,
            'reload' => true
        ));
    }

    public function ajax_get_categories() {
        check_ajax_referer('recursos_ia_frontend_nonce', 'nonce');

        $categories = get_terms(array(
            'taxonomy' => 'categoria_ia',
            'hide_empty' => false
        ));

        $subcategories = get_terms(array(
            'taxonomy' => 'subcategoria_ia',
            'hide_empty' => false
        ));

        wp_send_json_success(array(
            'categories' => $categories,
            'subcategories' => $subcategories
        ));
    }

    public function ajax_create_category() {
        check_ajax_referer('recursos_ia_frontend_nonce', 'nonce');

        if (!current_user_can('manage_categories')) {
            wp_send_json_error(array('message' => 'No tens permisos per crear categories'));
        }

        $name = sanitize_text_field($_POST['name']);
        $description = sanitize_textarea_field($_POST['description']);

        if (empty($name)) {
            wp_send_json_error(array('message' => 'El nom de la categoria és obligatori'));
        }

        $term = wp_insert_term($name, 'categoria_ia', array(
            'description' => $description
        ));

        if (is_wp_error($term)) {
            wp_send_json_error(array('message' => $term->get_error_message()));
        }

        wp_send_json_success(array(
            'message' => 'Categoria creada correctament!',
            'term_id' => $term['term_id'],
            'name' => $name
        ));
    }

    public function ajax_create_subcategory() {
        check_ajax_referer('recursos_ia_frontend_nonce', 'nonce');

        if (!current_user_can('manage_categories')) {
            wp_send_json_error(array('message' => 'No tens permisos per crear subcategories'));
        }

        $name = sanitize_text_field($_POST['name']);

        if (empty($name)) {
            wp_send_json_error(array('message' => 'El nom de la subcategoria és obligatori'));
        }

        $term = wp_insert_term($name, 'subcategoria_ia');

        if (is_wp_error($term)) {
            wp_send_json_error(array('message' => $term->get_error_message()));
        }

        wp_send_json_success(array(
            'message' => 'Subcategoria creada correctament!',
            'term_id' => $term['term_id'],
            'name' => $name
        ));
    }
}

new Recursos_IA_Frontend();
