<?php
/**
 * Import Script - 47 Recursos d'IA
 * Dades extretes de recursos-ia.html
 * 
 * Aquest script importa:
 * - 6 categories
 * - 12 subcategories
 * - 47 recursos amb títol, URL i descripció completa
 */

require_once('../../../wp-load.php');

if (!current_user_can('manage_options')) {
    die('Access denied - Necessites permisos d\'administrador');
}

// Complete data extracted from recursos-ia.html JavaScript
$complete_data = array(
    array(
        'category' => '💬 Xats i Assistents IA',
        'category_description' => 'Plataformes conversacionals amb models de llenguatge avançats per a tasques generals',
        'subcategories' => array(
            array(
                'name' => 'Assistents Principals',
                'resources' => array(
                    array('title' => 'ChatGPT', 'url' => 'https://chatgpt.com/', 'description' => 'Model GPT-4 d\'OpenAI per a conversació, generació de text i assistència general'),
                    array('title' => 'Claude AI', 'url' => 'https://claude.ai/new', 'description' => 'Assistant d\'Anthropic amb capacitats avançades de raonament i context llarg'),
                    array('title' => 'Claude Chat', 'url' => 'https://claude.ai/chat/c39ebb67-ce54-4cdf-9859-68e1a5bb8e8c', 'description' => 'Interfície de conversa directa amb Claude per a tasques complexes'),
                    array('title' => 'Google Gemini', 'url' => 'https://gemini.google.com/app/da575d460eb9f1d9?hl=es', 'description' => 'Model multimodal de Google integrat amb els seus serveis'),
                    array('title' => 'Google AI Studio', 'url' => 'https://aistudio.google.com/prompts/new_chat', 'description' => 'Plataforma de Google per experimentar amb models Gemini i crear prompts'),
                    array('title' => 'Perplexity AI', 'url' => 'https://www.perplexity.ai/', 'description' => 'Motor de cerca amb IA que proporciona respostes amb fonts verificades'),
                    array('title' => 'Qwen Chat', 'url' => 'https://chat.qwen.ai/', 'description' => 'Model de llenguatge d\'Alibaba amb capacitats multilingües'),
                    array('title' => 'DeepSeek Chat', 'url' => 'https://chat.deepseek.com/', 'description' => 'Model xinès especialitzat en programació i raonament matemàtic'),
                    array('title' => 'DeepSeek Sessió', 'url' => 'https://chat.deepseek.com/a/chat/s/ff78187c-d808-4a21-91d4-2dbbda490cc4', 'description' => 'Sessió específica de conversa amb DeepSeek'),
                    array('title' => 'Kimi AI', 'url' => 'https://www.kimi.com/', 'description' => 'Assistant xinès amb context ultra llarg (200K tokens)'),
                    array('title' => 'NotebookLM', 'url' => 'https://notebooklm.google/', 'description' => 'Eina de Google per analitzar i generar resums de documents llargs'),
                )
            ),
        )
    ),
    array(
        'category' => '🛠️ Eines de Desenvolupament amb IA',
        'category_description' => 'Plataformes que utilitzen IA per crear aplicacions, webs i codi automàticament',
        'subcategories' => array(
            array(
                'name' => 'Builders No-Code/Low-Code',
                'resources' => array(
                    array('title' => 'Bolt.new', 'url' => 'https://bolt.new/', 'description' => 'Crea aplicacions web completes mitjançant prompts de text'),
                    array('title' => 'v0 by Vercel', 'url' => 'https://v0.app/', 'description' => 'Genera components React i UI amb IA des de descripcions'),
                    array('title' => 'Lovable', 'url' => 'https://lovable.dev/', 'description' => 'Construeix apps i webs conversant amb IA, amb integració Shopify'),
                    array('title' => 'B12', 'url' => 'https://www.b12.io/', 'description' => 'Constructor de webs professionals amb IA per a negocis'),
                    array('title' => '10Web', 'url' => 'https://10web.io/', 'description' => 'Creador de webs WordPress amb IA i hosting optimitzat'),
                    array('title' => 'Locofy', 'url' => 'https://www.locofy.ai/', 'description' => 'Converteix dissenys de Figma/Adobe XD en codi production-ready'),
                )
            ),
            array(
                'name' => 'Assistents de Programació',
                'resources' => array(
                    array('title' => 'Cline', 'url' => 'https://cline.bot/', 'description' => 'Agent de programació autònom amb context de projecte complet i execució transparent'),
                    array('title' => 'Claude Code', 'url' => 'https://code.claude.com/docs/en/overview#install-and-authenticate', 'description' => 'Documentació oficial de Claude per a desenvolupament de codi'),
                    array('title' => 'Supermaven', 'url' => 'https://supermaven.com/download', 'description' => 'Autocompletat de codi amb context ultra ràpid i precís'),
                    array('title' => 'GitHub Spark', 'url' => 'https://github.com/features/spark', 'description' => 'Generador de codi directament integrat a GitHub'),
                    array('title' => 'OpenAI Codex', 'url' => 'https://openai.com/codex/', 'description' => 'Model d\'OpenAI especialitzat en comprensió i generació de codi'),
                    array('title' => 'Replit Collaboration', 'url' => 'https://replit.com/collaboration', 'description' => 'Editor col·laboratiu amb IA integrada per programar en equip'),
                    array('title' => 'Jan AI', 'url' => 'https://jan.ai/', 'description' => 'Client de codi obert per executar LLMs localment'),
                )
            ),
            array(
                'name' => 'Automatització i Workflows',
                'resources' => array(
                    array('title' => 'n8n', 'url' => 'https://n8n.io/', 'description' => 'Plataforma d\'automatització de workflows amb nodes d\'IA'),
                    array('title' => 'Superflex AI', 'url' => 'https://www.superflex.ai/', 'description' => 'Automatització intel·ligent de processos empresarials'),
                    array('title' => 'Jules by Google', 'url' => 'https://jules.google/', 'description' => 'Assistant d\'IA per automatitzar tasques de desenvolupament'),
                )
            ),
        )
    ),
    array(
        'category' => '📚 Aprenentatge i Formació',
        'category_description' => 'Cursos, tutorials i recursos educatius sobre intel·ligència artificial',
        'subcategories' => array(
            array(
                'name' => 'Cursos Oficials i Certificacions',
                'resources' => array(
                    array('title' => 'DeepLearning.AI', 'url' => 'https://learn.deeplearning.ai/', 'description' => 'Cursos oficials d\'Andrew Ng sobre deep learning i IA aplicada'),
                    array('title' => 'NVIDIA Academy', 'url' => 'https://academy.nvidia.com/en/', 'description' => 'Formació oficial de NVIDIA en IA, deep learning i GPUs'),
                    array('title' => 'Codecademy AI', 'url' => 'https://www.codecademy.com/catalog/subject/artificial-intelligence', 'description' => 'Cursos interactius de programació amb IA'),
                    array('title' => 'DataCamp', 'url' => 'https://www.datacamp.com/', 'description' => 'Plataforma de cursos de data science i machine learning'),
                )
            ),
            array(
                'name' => 'Cursos en Català/Espanyol',
                'resources' => array(
                    array('title' => 'Cibernàrium - IA Generativa', 'url' => 'https://cibernarium.barcelonactiva.cat/ca/formacio?activityId=1474225', 'description' => 'Introducció a la IA generativa (Barcelona Activa)'),
                    array('title' => 'Cibernàrium - ChatGPT', 'url' => 'https://cibernarium.barcelonactiva.cat/ca/formacio?activityId=1473722', 'description' => 'Curs d\'ús de ChatGPT per a professionals'),
                    array('title' => 'Barcelona Activa', 'url' => 'https://www.barcelonactiva.cat/formacio', 'description' => 'Catàleg complet de formació de Barcelona Activa'),
                )
            ),
            array(
                'name' => 'Tutorials i Recursos',
                'resources' => array(
                    array('title' => 'OpenAI Cookbook', 'url' => 'https://github.com/openai/openai-cookbook', 'description' => 'Receptes i exemples pràctics per usar APIs d\'OpenAI'),
                    array('title' => 'Claude Code for PMs', 'url' => 'https://ccforpms.com/', 'description' => 'Guia per product managers sobre ús de Claude Code'),
                )
            ),
        )
    ),
    array(
        'category' => '🎨 IA Creativa',
        'category_description' => 'Eines d\'intel·ligència artificial per a disseny, imatges, vídeo i creativitat',
        'subcategories' => array(
            array(
                'name' => 'Generació d\'Imatges',
                'resources' => array(
                    array('title' => 'Freepik AI', 'url' => 'https://www.freepik.com/', 'description' => 'Plataforma amb eines d\'IA per generar i editar imatges'),
                    array('title' => 'Sketch to Image', 'url' => 'https://www.freepik.com/ai/sketch-to-image', 'description' => 'Converteix esbossos en imatges realistes amb IA'),
                    array('title' => 'Adobe Firefly', 'url' => 'https://firefly.adobe.com/', 'description' => 'Suite d\'eines d\'IA d\'Adobe per a creatius'),
                )
            ),
            array(
                'name' => 'IA per a Àudio',
                'resources' => array(
                    array('title' => 'Typecast TTS', 'url' => 'https://typecast.ai/text-to-speech/68d02a7d8246dea44d55ea42', 'description' => 'Generació de veu sintètica realista des de text'),
                    array('title' => 'Fadr', 'url' => 'https://fadr.com/', 'description' => 'Separació de pistes musicals i remixing amb IA'),
                )
            ),
        )
    ),
    array(
        'category' => '🔧 Recursos per Desenvolupadors',
        'category_description' => 'Repositories, plantilles i eines tècniques per implementar IA en projectes',
        'subcategories' => array(
            array(
                'name' => 'Templates i Starters',
                'resources' => array(
                    array('title' => 'MindWork AI Studio', 'url' => 'https://github.com/MindWorkAI/AI-Studio', 'description' => 'Framework de codi obert per construir aplicacions IA'),
                    array('title' => 'GitHub Codespaces', 'url' => 'https://github.com/codespaces', 'description' => 'Entorns de desenvolupament en el núvol amb IA'),
                )
            ),
            array(
                'name' => 'Comunitats i Recursos',
                'resources' => array(
                    array('title' => 'a16z Gen AI Apps', 'url' => 'https://a16z.com/100-gen-ai-apps-3/', 'description' => 'Llista de les 100 millors aplicacions d\'IA generativa segons Andreessen Horowitz'),
                    array('title' => 'Reddit IA (ES)', 'url' => 'https://www.reddit.com/r/InteligenciArtificial/', 'description' => 'Comunitat en espanyol sobre intel·ligència artificial'),
                )
            ),
        )
    ),
    array(
        'category' => '🌐 Aplicacions i Serveis Diversos',
        'category_description' => 'Altres aplicacions i serveis que utilitzen IA en diferents àmbits',
        'subcategories' => array(
            array(
                'name' => 'Productivitat i Negocis',
                'resources' => array(
                    array('title' => 'Justicio', 'url' => 'https://justicio.es/', 'description' => 'Plataforma legal amb assistència d\'IA per a consultes jurídiques'),
                    array('title' => 'ConveyThis', 'url' => 'https://www.conveythis.com/pricing', 'description' => 'Traducció automàtica de webs amb IA'),
                )
            ),
        )
    ),
);

echo '<html><head><meta charset="UTF-8"><title>Importació 47 Recursos IA</title>';
echo '<style>
    body { font-family: Arial, sans-serif; max-width: 900px; margin: 50px auto; padding: 20px; background: #f5f5f5; }
    h1 { color: #1da1f2; }
    .success { background: #d4edda; color: #155724; padding: 8px 12px; margin: 8px 0; border-radius: 5px; font-size: 0.9em; }
    .info { background: #d1ecf1; color: #0c5460; padding: 8px 12px; margin: 8px 0; border-radius: 5px; font-size: 0.9em; }
    .warning { background: #fff3cd; color: #856404; padding: 8px 12px; margin: 8px 0; border-radius: 5px; font-size: 0.9em; }
    .category { background: white; padding: 20px; margin: 20px 0; border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); }
    .stats { background: linear-gradient(135deg, #1da1f2, #0d8bd9); color: white; padding: 25px; border-radius: 10px; text-align: center; margin: 20px 0; }
    .stats h2 { margin: 0 0 15px 0; }
    .stat-row { display: flex; justify-content: center; gap: 40px; flex-wrap: wrap; }
    .stat-item { text-align: center; }
    .stat-number { font-size: 2.5em; font-weight: bold; display: block; }
    .stat-label { font-size: 1em; opacity: 0.9; }
    .btn { display: inline-block; background: #1da1f2; color: white; padding: 12px 24px; text-decoration: none; border-radius: 8px; margin-top: 20px; font-weight: 600; }
    .btn:hover { background: #0d8bd9; }
    h2 { color: #1da1f2; margin-top: 0; }
    h3 { color: #14171a; margin: 15px 0 10px 0; font-size: 1.1em; }
</style></head><body>';

echo '<h1>🚀 Importació Completa de Recursos d\'IA</h1>';
echo '<p>Aquest script importarà tots els recursos del fitxer <code>recursos-ia.html</code></p>';

$imported = 0;
$skipped = 0;
$categories_created = 0;
$subcategories_created = 0;

foreach ($complete_data as $data) {
    echo '<div class="category">';
    echo '<h2>' . esc_html($data['category']) . '</h2>';

    // Create or get category
    $category = term_exists($data['category'], 'categoria_ia');
    if (!$category) {
        $category = wp_insert_term($data['category'], 'categoria_ia', array(
            'description' => $data['category_description']
        ));
        if (!is_wp_error($category)) {
            $categories_created++;
            echo '<p class="info">✓ Categoria creada</p>';
        }
    }
    $category_id = is_array($category) ? $category['term_id'] : $category;

    // Process each subcategory
    foreach ($data['subcategories'] as $subcat_data) {
        echo '<h3>' . esc_html($subcat_data['name']) . '</h3>';

        // Create or get subcategory
        $subcategory = term_exists($subcat_data['name'], 'subcategoria_ia');
        if (!$subcategory) {
            $subcategory = wp_insert_term($subcat_data['name'], 'subcategoria_ia');
            if (!is_wp_error($subcategory)) {
                $subcategories_created++;
            }
        }
        $subcategory_id = is_array($subcategory) ? $subcategory['term_id'] : $subcategory;

        // Create resources
        foreach ($subcat_data['resources'] as $resource) {
            // Check if resource already exists by URL
            $existing = get_posts(array(
                'post_type' => 'recurs_ia',
                'meta_key' => '_recurs_url',
                'meta_value' => $resource['url'],
                'posts_per_page' => 1
            ));

            if (empty($existing)) {
                $post_id = wp_insert_post(array(
                    'post_title' => $resource['title'],
                    'post_content' => $resource['description'],
                    'post_status' => 'publish',
                    'post_type' => 'recurs_ia'
                ));

                if ($post_id && !is_wp_error($post_id)) {
                    update_post_meta($post_id, '_recurs_url', $resource['url']);
                    wp_set_object_terms($post_id, $category_id, 'categoria_ia');
                    wp_set_object_terms($post_id, $subcategory_id, 'subcategoria_ia');
                    $imported++;
                    echo '<p class="success">✓ ' . esc_html($resource['title']) . '</p>';
                }
            } else {
                $skipped++;
                echo '<p class="warning">⊙ ' . esc_html($resource['title']) . ' (ja existeix)</p>';
            }
        }
    }

    echo '</div>';
}

echo '<div class="stats">';
echo '<h2>📊 Importació Completada!</h2>';
echo '<div class="stat-row">';
echo '<div class="stat-item"><span class="stat-number">' . $imported . '</span><span class="stat-label">Nous recursos</span></div>';
echo '<div class="stat-item"><span class="stat-number">' . $skipped . '</span><span class="stat-label">Ja existien</span></div>';
echo '<div class="stat-item"><span class="stat-number">' . $categories_created . '</span><span class="stat-label">Categories creades</span></div>';
echo '<div class="stat-item"><span class="stat-number">' . $subcategories_created . '</span><span class="stat-label">Subcategories creades</span></div>';
echo '</div>';
echo '</div>';

echo '<p style="text-align: center;"><a href="' . home_url() . '" class="btn">→ Veure el Lloc Web</a></p>';

echo '</body></html>';
