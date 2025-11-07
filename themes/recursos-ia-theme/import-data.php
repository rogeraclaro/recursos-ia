<?php
/**
 * Import Initial Data Script
 * Run this once after theme activation to import the initial resources
 * Access via: /wp-content/themes/recursos-ia-theme/import-data.php
 */

require_once('../../../wp-load.php');

if (!current_user_can('manage_options')) {
    die('Access denied');
}

// Initial data structure
$initial_data = array(
    array(
        'category' => '💬 Xats i Assistents IA',
        'category_description' => 'Plataformes conversacionals amb models de llenguatge avançats per a tasques generals',
        'subcategory' => 'Assistents Principals',
        'resources' => array(
            array('title' => 'ChatGPT', 'url' => 'https://chatgpt.com/', 'description' => 'Model GPT-4 d\'OpenAI per a conversació, generació de text i assistència general'),
            array('title' => 'Claude AI', 'url' => 'https://claude.ai/new', 'description' => 'Assistant d\'Anthropic amb capacitats avançades de raonament i context llarg'),
            array('title' => 'Google Gemini', 'url' => 'https://gemini.google.com/app', 'description' => 'Model multimodal de Google integrat amb els seus serveis'),
            array('title' => 'Perplexity AI', 'url' => 'https://www.perplexity.ai/', 'description' => 'Motor de cerca amb IA que proporciona respostes amb fonts verificades'),
        )
    ),
    array(
        'category' => '🛠️ Eines de Desenvolupament amb IA',
        'category_description' => 'Plataformes que utilitzen IA per crear aplicacions, webs i codi automàticament',
        'subcategory' => 'Builders No-Code/Low-Code',
        'resources' => array(
            array('title' => 'Bolt.new', 'url' => 'https://bolt.new/', 'description' => 'Crea aplicacions web completes mitjançant prompts de text'),
            array('title' => 'v0 by Vercel', 'url' => 'https://v0.app/', 'description' => 'Genera components React i UI amb IA des de descripcions'),
            array('title' => 'Lovable', 'url' => 'https://lovable.dev/', 'description' => 'Construeix apps i webs conversant amb IA'),
        )
    ),
);

echo '<h1>Importació de Dades Inicials</h1>';
echo '<p>Començant importació...</p>';

$imported = 0;

foreach ($initial_data as $data) {
    // Create or get category
    $category = term_exists($data['category'], 'categoria_ia');
    if (!$category) {
        $category = wp_insert_term($data['category'], 'categoria_ia', array(
            'description' => $data['category_description']
        ));
    }
    $category_id = is_array($category) ? $category['term_id'] : $category;

    // Create or get subcategory
    $subcategory = term_exists($data['subcategory'], 'subcategoria_ia');
    if (!$subcategory) {
        $subcategory = wp_insert_term($data['subcategory'], 'subcategoria_ia');
    }
    $subcategory_id = is_array($subcategory) ? $subcategory['term_id'] : $subcategory;

    // Create resources
    foreach ($data['resources'] as $resource) {
        $post_id = wp_insert_post(array(
            'post_title' => $resource['title'],
            'post_content' => $resource['description'],
            'post_status' => 'publish',
            'post_type' => 'recurs_ia'
        ));

        if ($post_id) {
            // Add URL meta
            update_post_meta($post_id, '_recurs_url', $resource['url']);

            // Assign terms
            wp_set_object_terms($post_id, $category_id, 'categoria_ia');
            wp_set_object_terms($post_id, $subcategory_id, 'subcategoria_ia');

            $imported++;
            echo "<p>✓ Importat: {$resource['title']}</p>";
        }
    }
}

echo "<h2>Importació completada!</h2>";
echo "<p>Total recursos importats: $imported</p>";
echo '<p><a href="' . home_url() . '">Veure el lloc</a></p>';
