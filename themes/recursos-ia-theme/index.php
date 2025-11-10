<?php get_header(); ?>

<div class="container">
    <!-- Search -->
    <div class="search-container">
        <form class="search-form" id="searchForm" role="search">
            <input type="text" class="search-box" id="searchBox" placeholder="Cerca per nom, descripció o URL..." name="s">
            <button type="submit" class="search-button">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="11" cy="11" r="8"></circle>
                    <path d="m21 21-4.35-4.35"></path>
                </svg>
                <span>Cercar</span>
            </button>
        </form>
    </div>

    <!-- Index -->
    <div class="index" id="index">
        <h2>📑 Índex de Categories</h2>
        <div class="index-grid" id="indexGrid">
            <?php
            $categories = get_terms(array(
                'taxonomy' => 'categoria_ia',
                'hide_empty' => true
            ));
            
            foreach ($categories as $category):
                $count = $category->count;
                $slug = $category->slug;
            ?>
            <div class="index-item" onclick="scrollToSection('<?php echo $slug; ?>')">
                <span class="index-item-title"><?php echo esc_html($category->name); ?></span>
                <span class="count-badge"><?php echo $count; ?></span>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Categories Content -->
    <div id="content">
        <?php
        foreach ($categories as $category):
            $cat_slug = $category->slug;
            
            $subcategories = get_terms(array(
                'taxonomy' => 'subcategoria_ia',
                'hide_empty' => true
            ));
            
            $args = array(
                'post_type' => 'recurs_ia',
                'posts_per_page' => -1,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'categoria_ia',
                        'field' => 'term_id',
                        'terms' => $category->term_id
                    )
                )
            );
            
            $recursos = new WP_Query($args);
            
            if ($recursos->have_posts()):
        ?>
        <div class="category-section" id="<?php echo $cat_slug; ?>">
            <div class="category-header">
                <div>
                    <div class="category-title"><?php echo esc_html($category->name); ?></div>
                    <div class="category-description"><?php echo esc_html($category->description); ?></div>
                </div>
            </div>

            <?php
            foreach ($subcategories as $subcat):
                $subcat_args = array(
                    'post_type' => 'recurs_ia',
                    'posts_per_page' => -1,
                    'tax_query' => array(
                        'relation' => 'AND',
                        array(
                            'taxonomy' => 'categoria_ia',
                            'field' => 'term_id',
                            'terms' => $category->term_id
                        ),
                        array(
                            'taxonomy' => 'subcategoria_ia',
                            'field' => 'term_id',
                            'terms' => $subcat->term_id
                        )
                    )
                );
                
                $subcat_recursos = new WP_Query($subcat_args);
                
                if ($subcat_recursos->have_posts()):
            ?>
            <div class="subcategory">
                <h3 class="subcategory-title"><?php echo esc_html($subcat->name); ?></h3>
                <div class="links-grid">
                    <?php while ($subcat_recursos->have_posts()): $subcat_recursos->the_post(); 
                        $url = get_post_meta(get_the_ID(), '_recurs_url', true);
                        $domain = parse_url($url, PHP_URL_HOST);
                    ?>
                    <div class="link-card">
                        <div class="link-header">
                            <img src="https://www.google.com/s2/favicons?domain=<?php echo $domain; ?>&sz=32" 
                                 alt="" class="link-favicon" onerror="this.style.display='none'">
                            <a href="<?php echo esc_url($url); ?>" target="_blank" rel="noopener noreferrer" class="link-title">
                                <?php the_title(); ?>
                            </a>
                            <span class="external-icon">↗</span>
                        </div>
                        <div class="link-description"><?php echo wp_trim_words(get_the_content(), 20); ?></div>
                        <div class="link-url"><?php echo esc_html($url); ?></div>
                    </div>
                    <?php endwhile; ?>
                </div>
            </div>
            <?php
                endif;
                wp_reset_postdata();
            endforeach;
            ?>

            <a href="#index" class="back-to-top">↑ Tornar a l'índex</a>
        </div>
        <?php
            endif;
            wp_reset_postdata();
        endforeach;
        ?>
    </div>
</div>

<?php get_footer(); ?>
