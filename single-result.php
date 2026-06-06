<?php get_header(); ?>

<main class="l-main">

    <?php get_template_part('template-parts/breadcrumbs'); ?>

    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>

            <section class="p-result-details">
                <div class="p-result-details__content">
                    <div class="l-inner">

                        <div class="p-result-detail__head">
                            <div class="c-result-card__img">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('large'); ?>
                                <?php else : ?>
                                    <img class="p-result-details__no-image" src="<?php echo esc_url(get_template_directory_uri()); ?>/images/common/no-image.png" alt="No image">
                                <?php endif; ?>

                                <?php
                                $terms = get_the_terms(get_the_ID(), 'genre');
                                if (!empty($terms) && !is_wp_error($terms)) :
                                ?>
                                    <span class="c-tag c-tag--lg"><?php echo esc_html($terms[0]->name); ?></span>
                                <?php endif; ?>
                            </div>

                            <div class="c-result-card__body">
                                <h1 class="p-article-title">
                                    <?php the_title(); ?>
                                </h1>

                                <time datetime="<?php echo esc_attr(get_the_date('Y-m-d')); ?>" class="c-result-card__date">
                                    <?php echo esc_html(get_the_date('Y.m.d')); ?>
                                </time>
                            </div>
                        </div>

                        <div class="p-result-details__wrap">
                            <div class="p-result-details__table">
                                <table>
                                    <tr>
                                        <th>名前</th>
                                        <td><?php the_field('name'); ?></td>
                                    </tr>

                                    <tr>
                                        <th>職業</th>
                                        <td><?php the_field('job'); ?></td>
                                    </tr>

                                    <tr>
                                        <th>ジャンル</th>
                                        <td>
                                            <?php
                                            $terms = get_the_terms(get_the_ID(), 'genre');
                                            if (!empty($terms) && !is_wp_error($terms)) {
                                                echo esc_html($terms[0]->name);
                                            }
                                            ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>実績</th>
                                        <td><?php the_field('achievements'); ?></td>
                                    </tr>

                                    <tr>
                                        <th>SNS</th>
                                        <td><?php the_field('sns'); ?></td>
                                    </tr>
                                </table>
                            </div>

                            <div class="p-result-details__text">
                                <div class="p-result-details__description">
                                    <?php the_content(); ?>
                                </div>
                            </div>
                        </div>

                        <?php get_template_part('template-parts/single-pagination'); ?>

                        <?php get_template_part('template-parts/related-articles'); ?>

                    </div>
                </div>
            </section>

        <?php endwhile; ?>
    <?php endif; ?>

</main>

<?php get_template_part('template-parts/fix-area'); ?>

<?php get_footer(); ?>