<section class="carousel">
    <div class="carousel__container">
        <div class="carousel__track">
            <?php
            $args_carousel = array(
                'post_type' => 'producto',
                'posts_per_page' => 6,
                'orderby' => 'date',
                'order' => 'DESC'
            );

            $productos_carousel = new WP_Query($args_carousel);

            if ($productos_carousel->have_posts()) :
                while ($productos_carousel->have_posts()) : $productos_carousel->the_post();
            ?>
                <div class="carousel__slide">
                    <a href="<?php the_permalink(); ?>" class="carousel__link">
                        <?php 
                        if (has_post_thumbnail()) {
                            the_post_thumbnail('medium', array('class' => 'carousel__image'));
                        }
                        ?>
                        <div class="carousel__content">
                            <h3 class="carousel__title"><?php the_title(); ?></h3>
                            <?php 
                            $precio = get_post_meta(get_the_ID(), '_precio_producto', true);
                            if ($precio) : 
                            ?>
                                <p class="carousel__price">$<?php echo esc_html($precio); ?></p>
                            <?php endif; ?>
                        </div>
                    </a>
                </div>
            <?php
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>
        <button class="carousel__button carousel__button--prev">
            <i class="fas fa-chevron-left"></i>
        </button>
        <button class="carousel__button carousel__button--next">
            <i class="fas fa-chevron-right"></i>
        </button>
    </div>
</section> 