<?php get_header(); ?>

<main class="l-main p-blog_details">

    <?php get_template_part('template-parts/breadcrumbs'); ?>

    <div class="p-blog_details__content">
        <div class="l-inner">
            <div class="p-blog_details__wrapper">
                <!-- 左：記事本体 -->
                <article class="p-blog_details__main">
                    <?php if (have_posts()) : ?>
                        <?php while (have_posts()) : the_post(); ?>
                            <?php
                            $url = urlencode(get_permalink());
                            $title = urlencode(get_the_title());
                            ?>
                            <div class="p-blog-detail__head-area">
                                <div class="p-blog-detail__head-main">
                                    <div class="c-hero c-hero--with-border c-hero--result-detail">
                                        <div class="c-result-card__img">
                                            <?php if (has_post_thumbnail()) : ?>
                                                <?php the_post_thumbnail('large'); ?>
                                            <?php else : ?>
                                                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/common/no-image.png" alt="No image">
                                            <?php endif; ?>

                                            <span class="c-tag">
                                                <?php
                                                $terms = get_the_terms(get_the_ID(), 'blog_cate');
                                                if (!empty($terms) && !is_wp_error($terms)) {
                                                    echo esc_html($terms[0]->name);
                                                }
                                                ?>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="c-result-card__body">
                                        <h1 class="p-article-title"><?php the_title(); ?></h1>
                                        <time datetime="<?php echo esc_attr(get_the_date('Y-m-d')); ?>" class="c-result-card__date">
                                            <?php echo esc_html(get_the_date('Y.m.d')); ?>
                                        </time>
                                    </div>
                                </div>

                                <ul class="p-blog-detail__sns">
                                    <li>
                                        <a href="<?php echo esc_url('https://www.facebook.com/share.php?u=' . $url); ?>" target="_blank" rel="noopener noreferrer">
                                            <picture>
                                                <source media="(min-width: 768px)" srcset="<?php echo esc_url(get_template_directory_uri()); ?>/images/blog/facebook_pc.svg">
                                                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/blog/facebook_sp.svg" alt="Facebook" width="65" height="40">
                                            </picture>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="<?php echo esc_url('https://twitter.com/share?url=' . $url . '&text=' . $title); ?>" target="_blank" rel="noopener noreferrer">
                                            <picture>
                                                <source media="(min-width: 768px)" srcset="<?php echo esc_url(get_template_directory_uri()); ?>/images/blog/twitter_pc.svg">
                                                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/blog/twitter_sp.svg" alt="Twitter" width="65" height="40">
                                            </picture>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="<?php echo esc_url('https://b.hatena.ne.jp/add?mode=confirm&url=' . $url . '&title=' . $title); ?>" target="_blank" rel="noopener noreferrer">
                                            <picture>
                                                <source media="(min-width: 768px)" srcset="<?php echo esc_url(get_template_directory_uri()); ?>/images/blog/hatena_pc.svg">
                                                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/blog/hatena_sp.svg" alt="はてブ" width="65" height="40">
                                            </picture>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="<?php echo esc_url('https://social-plugins.line.me/lineit/share?url=' . $url); ?>" target="_blank" rel="noopener noreferrer">
                                            <picture>
                                                <source media="(min-width: 768px)" srcset="<?php echo esc_url(get_template_directory_uri()); ?>/images/blog/line_pc.svg">
                                                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/blog/line_sp.svg" alt="LINE" width="65" height="40">
                                            </picture>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="<?php echo esc_url('https://getpocket.com/edit?url=' . $url . '&title=' . $title); ?>" target="_blank" rel="noopener noreferrer">
                                            <picture>
                                                <source media="(min-width: 768px)" srcset="<?php echo esc_url(get_template_directory_uri()); ?>/images/blog/pocket_pc.svg">
                                                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/blog/pocket_sp.svg" alt="Pocket" width="65" height="40">
                                            </picture>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <div class="p-blog-detail__wp-editor">
                                <?php the_content(); ?>
                            </div>

                            <?php get_template_part('template-parts/single-pagination'); ?>
                            <?php get_template_part('template-parts/related-articles'); ?>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </article>

                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</main>

<?php get_template_part('template-parts/fix-area'); ?>

<?php get_footer(); ?>