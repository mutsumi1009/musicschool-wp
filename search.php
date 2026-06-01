<?php get_header(); ?>
<main class="l-main p-search">

    <?php get_template_part('template-parts/breadcrumbs'); ?>

    <div class="p-search__content">
        <div class="p-search">
            <div class="l-inner">
                <?php if (!empty(get_search_query())) : ?>

                    <?php if (have_posts()) : ?>
                        <?php $total_posts = $wp_query->found_posts; ?>

                        <div class="p-search__header">
                            <h1 class="p-search__title">
                                <span class="p-search__keyword">「<?php echo esc_html(get_search_query()); ?>」</span>の検索結果
                            </h1>
                            <p class="p-search__count"><?php echo esc_html($total_posts); ?>件</p>
                        </div>

                        <div class="p-search__list">
                            <?php while (have_posts()) : the_post(); ?>

                                <article class="c-blog-card">
                                    <a href="<?php the_permalink(); ?>" class="c-blog-card__link">

                                        <div class="c-blog-card__img">
                                            <?php if (has_post_thumbnail()) : ?>
                                                <?php the_post_thumbnail('full'); ?>
                                            <?php else : ?>
                                                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/common/no-image.png" alt="No image">
                                            <?php endif; ?>

                                            <?php
                                            $terms = get_the_terms(get_the_ID(), 'blog_cate');
                                            if (!empty($terms) && !is_wp_error($terms)) :
                                            ?>
                                                <span class="c-tag"><?php echo esc_html($terms[0]->name); ?></span>
                                            <?php endif; ?>
                                        </div>

                                        <div class="c-blog-card__body">
                                            <h2 class="c-blog-card__title">
                                                <?php echo esc_html(wp_trim_words(get_the_title(), 26, '...')); ?>
                                            </h2>

                                            <time datetime="<?php echo esc_attr(get_the_date('Y-m-d')); ?>" class="c-blog-card__date">
                                                <?php echo esc_html(get_the_date('Y.m.d')); ?>
                                            </time>

                                            <p class="c-blog-card__text">
                                                <?php
                                                $content = get_the_content();

                                                // 本文内のh1〜h6見出しを削除
                                                $content = preg_replace('/<h[1-6]\b[^>]*>.*?<\/h[1-6]>/is', '', $content);

                                                // HTMLタグを削除
                                                $content = wp_strip_all_tags($content);

                                                // 文字数を調整
                                                echo esc_html(wp_trim_words($content, 120, '...'));
                                                ?>
                                            </p>
                                        </div>
                                    </a>
                                </article>

                            <?php endwhile; ?>
                        </div>

                        <?php get_template_part('template-parts/pagination'); ?>

                    <?php else : ?>

                        <div class="p-search-result__no-result">
                            <h1 class="p-search__title">検索結果</h1>
                            <p>検索されたキーワードにマッチする記事はありませんでした。</p>
                            <a onclick="history.back()" class="c-button c-button--main">戻る</a>
                        </div>

                    <?php endif; ?>

                <?php else : ?>

                    <div class="p-search-result__no-result">
                        <h1 class="p-search__title">検索結果</h1>
                        <p>検索キーワードが未入力です。</p>
                        <a onclick="history.back()" class="c-button c-button--main">戻る</a>
                    </div>

                <?php endif; ?>
            </div>
        </div>
    </div>
</main>

<?php get_template_part('template-parts/fix-area'); ?>

<?php get_footer(); ?>