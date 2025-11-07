<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- Header -->
<div class="header">
    <div class="container">
        <h1>🤖 <?php bloginfo('name'); ?></h1>
        <p><?php bloginfo('description'); ?></p>
        <div class="stats">
            <?php
            $total_recursos = wp_count_posts('recurs_ia')->publish;
            $total_categories = wp_count_terms(array('taxonomy' => 'categoria_ia'));
            $total_subcategories = wp_count_terms(array('taxonomy' => 'subcategoria_ia'));
            ?>
            <div class="stat-item">
                <span class="stat-number"><?php echo $total_recursos; ?></span>
                <span class="stat-label">Recursos</span>
            </div>
            <div class="stat-item">
                <span class="stat-number"><?php echo $total_categories; ?></span>
                <span class="stat-label">Categories</span>
            </div>
            <div class="stat-item">
                <span class="stat-number"><?php echo $total_subcategories; ?></span>
                <span class="stat-label">Subcategories</span>
            </div>
        </div>
    </div>
</div>
