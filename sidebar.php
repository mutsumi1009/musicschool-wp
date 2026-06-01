<!-- 右サイドバー -->
<div class="p-blog_details__sidebar-area">
    <aside class="p-blog_details__sidebar">

        <!-- 無料メールマガジン -->
        <div class="p-sidebar-box">
            <div class="p-sidebar-title">無料メールマガジン</div>
            <div class="p-sidebar-banner">
                <a href="#" class="p-sidebar-banner__link">
                    <div class="p-sidebar-banner__inner">バナー広告</div>
                </a>
            </div>
        </div>
        <!-- ブログ内検索 -->
        <div class="p-sidebar-box">
            <div class="p-sidebar-title">ブログ内を検索</div>
            <?php get_search_form(); ?>
        </div>

        <!-- おすすめの記事 -->
        <div class="p-sidebar-box">
            <div class="p-sidebar-title">おすすめの記事</div>
        </div>

        <div class="p-sidebar-list">
            <div class="p-sidebar-recommend">
                <?php
                $args = [
                    'posts_per_page' => 3,
                    'post_type' => 'blog',
                    'post__not_in' => [get_queried_object_id()],
                    'tax_query' => [
                        [
                            'taxonomy' => 'blog_recommend',
                            'field' => 'slug',
                            'terms' => 'recommend',
                        ],
                    ],
                    'orderby' => 'date',
                    'order' => 'DESC',
                ];

                $the_query = new WP_Query($args);

                if ($the_query->have_posts()) :
                    while ($the_query->have_posts()) : $the_query->the_post();
                ?>
                        <a href="<?php the_permalink(); ?>" class="p-sidebar-recommend__link">
                            <div class="p-sidebar-recommend__img">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('full'); ?>
                                <?php else : ?>
                                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/common/no-image.png" alt="No image">
                                <?php endif; ?>
                            </div>

                            <p class="p-sidebar-recommend__text">
                                <?php echo esc_html(wp_trim_words(get_the_title(), 15, '...')); ?>
                            </p>
                        </a>
                <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>
        </div>

        <!-- カテゴリー -->
        <div class="p-sidebar-group p-sidebar-group--tight">
            <div class="p-sidebar-box">
                <div class="p-sidebar-title">カテゴリー</div>
            </div>
            <ul class="p-sidebar-category">
                <?php
                $terms = get_terms([
                    'taxonomy' => 'blog_cate',
                    'hide_empty' => true,
                ]);
                if (!is_wp_error($terms) && !empty($terms)) :
                    foreach ($terms as $term):
                        $term_link = get_term_link($term->term_id);
                ?>
                        <li>
                            <a href="<?php echo esc_url($term_link); ?>" class="c-blog-section__category-link">
                                <?php echo esc_html($term->name); ?>
                            </a>
                        </li>
                <?php
                    endforeach;
                endif;
                ?>
            </ul>
        </div>
    </aside>
</div>