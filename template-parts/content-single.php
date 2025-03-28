<?php
if (have_posts()) :
    while (have_posts()) : the_post();
?>
    <article class="post">
        <header class="post__header">
            <h1 class="post__title"><?php the_title(); ?></h1>
            <div class="post__meta">
                <span class="post__date"><?php echo get_the_date(); ?></span>
                <span class="post__author"><?php the_author(); ?></span>
            </div>
        </header>

        <?php if (has_post_thumbnail()) : ?>
            <div class="post__thumbnail">
                <?php the_post_thumbnail('large'); ?>
            </div>
        <?php endif; ?>

        <div class="post__content">
            <?php the_content(); ?>
        </div>

        <footer class="post__footer">
            <?php
            $categories = get_the_category();
            if ($categories) : ?>
                <div class="post__categories">
                    <span>Categorías:</span>
                    <?php the_category(', '); ?>
                </div>
            <?php endif; ?>
            
            <?php
            $tags = get_the_tags();
            if ($tags) : ?>
                <div class="post__tags">
                    <span>Etiquetas:</span>
                    <?php the_tags('', ', '); ?>
                </div>
            <?php endif; ?>
        </footer>
    </article>
<?php
    endwhile;
endif;
?> 