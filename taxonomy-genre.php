<?php get_header(); ?>

<main class="l-main p-result-list">

    <div class="c-hero c-hero--with-border">
        <div class="c-hero__img">
            <picture>
                <source media="(min-width: 768px)" srcset="<?php echo get_template_directory_uri(); ?>/images/result/result-list_pc.jpg">
                <img src="<?php echo get_template_directory_uri(); ?>/images/result/result-list_pc.jpg" alt="ピアノ演奏" width="375" height="300">
            </picture>
        </div>
        <h1 class="c-hero__text">卒業実績</h1>
    </div>

    <?php get_template_part('template-parts/breadcrumbs'); ?>


    <section class="p-result-list__content">
        <div class="l-inner">
            <?php
            $term = get_queried_object();
            $term_name = isset($term->name) ? $term->name : 'ジャンル名不明';
            ?>
            <h2 class="c-page-title c-page-title--result">
                <?php echo esc_html($term_name); ?>
            </h2>

            <div class="p-result-list__grid">

                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post(); ?>

                        <article class="c-result-card">
                            <a href="<?php the_permalink(); ?>" class="c-result-card__link">
                                <div class="c-result-card__img">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <?php the_post_thumbnail('large'); ?>
                                    <?php else : ?>
                                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/common/no-image.png" alt="No image">
                                    <?php endif; ?>

                                    <?php
                                    $terms = get_the_terms(get_the_ID(), 'genre');
                                    if (!empty($terms) && !is_wp_error($terms)) :
                                    ?>
                                        <span class="c-tag c-tag--lg"><?php echo esc_html($terms[0]->name); ?></span>
                                    <?php endif; ?>
                                </div>

                                <div class="c-result-card__body">
                                    <h3 class="c-result-card__title">
                                        <?php echo esc_html(wp_trim_words(get_the_title(), 32, '...')); ?>
                                    </h3>

                                    <time datetime="<?php echo esc_attr(get_the_date('Y-m-d')); ?>" class="c-result-card__date">
                                        <?php echo esc_html(get_the_date('Y.m.d')); ?>
                                    </time>
                                </div>
                            </a>
                        </article>

                    <?php endwhile; ?>
                <?php endif; ?>
            </div>

            <?php get_template_part('template-parts/pagination'); ?>
        </div>
    </section>
</main>

<?php get_template_part('template-parts/fix-area'); ?>

<?php get_footer(); ?>