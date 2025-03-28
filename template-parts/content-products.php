<section class="product-grid">
    <?php
    $args = array(
        'post_type' => 'producto',
        'posts_per_page' => 6,
        'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
        'orderby' => 'date',
        'order' => 'DESC'
    );

    $productos = new WP_Query($args);

    if ($productos->have_posts()) :
        while ($productos->have_posts()) : $productos->the_post();
            $precio = get_post_meta(get_the_ID(), '_precio_producto', true);
    ?>
        <div class="product-card">
            <figure class="product-card__image">
                <?php 
                if (has_post_thumbnail()) {
                    the_post_thumbnail('medium', array('class' => 'product-card__img'));
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
    ?>
        <div class="pagination">
            <?php 
            echo paginate_links(array(
                'base' => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
                'format' => '?paged=%#%',
                'current' => max(1, get_query_var('paged')),
                'total' => $productos->max_num_pages,
                'prev_text' => '&laquo; Anterior',
                'next_text' => 'Siguiente &raquo;',
                'type' => 'list'
            ));
            ?>
        </div>
    <?php
        wp_reset_postdata();
    else :
    ?>
        <p class="no-products">No hay productos disponibles.</p>
    <?php endif; ?>
</section> 