<?php
$post_type = get_post_type(); // 投稿タイプを取得
$post_id = get_the_ID();

// 投稿タイプに応じて使うタクソノミーを定義（必要に応じて追加可能）
$taxonomy_map = [
    'blog' => 'blog_cate',
    'result' => 'genre',
];

// 投稿タイプに対応するタクソノミーが定義されているか確認
if (!isset($taxonomy_map[$post_type])) {
    return;
}

$taxonomy = $taxonomy_map[$post_type];
$terms = get_the_terms($post_id, $taxonomy);

if (!empty($terms)) :
    $term_ids = wp_list_pluck($terms, 'term_id');

    $args = [
        'posts_per_page' => 3,
        'post_type' => $post_type,
        'post__not_in' => [$post_id],
        'orderby' => 'date',
        'order' => 'DESC',
        'tax_query' => [
            [
                'taxonomy' => $taxonomy,
                'field' => 'term_id',
                'terms' => $term_ids,
            ],
        ],
    ];

    $the_query = new WP_Query($args);

    if ($the_query->have_posts()) :
?>


        <section class="c-article-related">
            <h2 class="c-article-related__title">関連記事</h2>

            <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                <?php
                $post_terms = get_the_terms(get_the_ID(), $taxonomy);
                $term_name = (!empty($post_terms) && !is_wp_error($post_terms)) ? $post_terms[0]->name : '';
                ?>

                <article class="c-result-card">
                    <a href="<?php the_permalink(); ?>" class="c-result-card__link">
                        <div class="c-result-card__img">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('full'); ?>
                            <?php else : ?>
                                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/common/no-image.png" alt="No image">
                            <?php endif; ?>

                            <?php if (!empty($term_name)) : ?>
                                <span class="c-tag c-tag--lg"><?php echo esc_html($term_name); ?></span>
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

        </section>

<?php
        wp_reset_postdata();
    endif;
endif;
?>