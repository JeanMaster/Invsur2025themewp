<?php get_header(); ?>

<main class="main-content">
    <div class="container">
        <h1 class="page-title"><?php _e('Nuestros Productos', 'inversur'); ?></h1>
        
        <div class="product-grid">
            <?php
            if (have_posts()) :
                while (have_posts()) : the_post();
                    $precio = get_post_meta(get_the_ID(), '_precio_producto', true);
                    ?>
                    <div class="product-card">
                        <figure class="product-card__image">
                            <?php 
                            if (has_post_thumbnail()) {
                                the_post_thumbnail('medium');
                            }
                            ?>
                        </figure>
                        <div class="product-card__content">
                            <h3 class="product-card__title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h3>
                            <?php if ($precio) : ?>
                                <p class="product-card__price">$<?php echo esc_html($precio); ?></p>
                            <?php endif; ?>
                            <button class="btn btn--primary">Agregar al carrito</button>
                        </div>
                    </div>
                <?php
                endwhile;
            endif;
            ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>