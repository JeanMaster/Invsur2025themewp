<?php get_header(); ?>

<main class="main-content">
    <h1>Bienvenido a Inversur, repuestos para tu hogar</h1>
    
    <?php get_template_part('template-parts/content', 'carousel'); ?>

    <h2>Todo para tu hogar</h2>
    <?php get_template_part('template-parts/content', 'products'); ?>

    <section class="latest-posts">
        <h2>Últimas Noticias</h2>
        <div class="posts-grid">
            <?php 
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => 3,
                'orderby' => 'date',
                'order' => 'DESC'
            );
            
            $latest_posts = new WP_Query($args);
            
            if ($latest_posts->have_posts()) :
                while ($latest_posts->have_posts()) : $latest_posts->the_post();
            ?>
                <article class="post-card">
                    <div class="post-card__image">
                        <?php 
                        if (has_post_thumbnail()) {
                            the_post_thumbnail('medium');
                        }
                        ?>
                    </div>
                    <div class="post-card__content">
                        <h3 class="post-card__title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h3>
                        <div class="post-card__excerpt">
                            <?php the_excerpt(); ?>
                        </div>
                        <a href="<?php the_permalink(); ?>" class="btn btn--secondary">Leer más</a>
                    </div>
                </article>
            <?php 
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>