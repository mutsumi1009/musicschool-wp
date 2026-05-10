<?php get_header(); ?>


<main class="l-main p-blog-list-page">

    <div class="c-hero c-hero--with-border">
        <div class="c-hero__img">
            <picture>
                <source media="(min-width: 768px)" srcset="<?php echo esc_url(get_template_directory_uri()); ?>/images/blog/blog-list_pc.jpg">
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/blog/blog-list_sp.jpg" alt="ブログ" width="375" height="300">
            </picture>
        </div>
        <h1 class="c-hero__text">ブログ</h1>
    </div>

    <?php get_template_part('template-parts/breadcrumbs'); ?>

    <div class="p-blog-list__content">
        <div class="l-inner">
            <?php
            $term = get_queried_object();
            $term_name = isset($term->name) ? $term->name : 'カテゴリー名不明';
            ?>
            <h2 class="c-page-title c-page-title--blog">
                <?php echo esc_html($term_name); ?>
            </h2>
            <div class="p-blog-list">
                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post(); ?>

                        <article class="c-blog-card">
                            <a href="<?php the_permalink(); ?>" class="c-blog-card__link">
                                <div class="c-blog-card__img p-blog-list__img">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <?php the_post_thumbnail('full'); ?>
                                    <?php else : ?>
                                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/common/no-image.png" alt="No image">
                                    <?php endif; ?>

                                    <?php
                                    $terms = get_the_terms(get_the_ID(), 'blog_cate');
                                    if (!empty($terms) && !is_wp_error($terms)) :
                                    ?>
                                        <span class="c-tag">
                                            <?php echo esc_html($terms[0]->name); ?>
                                        </span>
                                    <?php endif; ?>
                                </div>

                                <div class="c-blog-card__body">
                                    <div class="c-blog-card__meta">
                                        <h3 class="c-blog-card__title">
                                            <?php echo esc_html(wp_trim_words(get_the_title(), 26, '...')); ?>
                                        </h3>

                                        <time datetime="<?php echo esc_attr(get_the_date('Y-m-d')); ?>" class="c-blog-card__date">
                                            <?php echo esc_html(get_the_date('Y.m.d')); ?>
                                        </time>
                                    </div>

                                    <p class="c-blog-card__text">
                                        <?php echo esc_html(wp_trim_words(get_the_content(), 120, '...')); ?>
                                    </p>
                                </div>
                            </a>
                        </article>

                    <?php endwhile; ?>
                <?php endif; ?>
            </div>

            <!-- ページネーション -->
            <div class="c-pagination">
                <?php if (function_exists('wp_pagenavi')) : ?>
                    <?php wp_pagenavi(); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</main>

<?php get_template_part('template-parts/fix-area'); ?>

<?php get_footer(); ?>