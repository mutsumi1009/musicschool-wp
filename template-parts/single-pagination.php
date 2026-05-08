<?php
$prev_post = get_previous_post();
$next_post = get_next_post();

$add_class_result = '';
$nav_class = '';

if (is_singular('result')) {
    $add_class_result = 'c-article-nav--result';
}

if (empty($prev_post) && !empty($next_post)) {
    $nav_class = 'c-article-nav--only-next';
} elseif (!empty($prev_post) && empty($next_post)) {
    $nav_class = 'c-article-nav--only-prev';
}
?>

<div class="c-article-nav <?php echo esc_attr(trim($add_class_result . ' ' . $nav_class)); ?>">
    <div class="c-article-nav__item c-article-nav__item--prev">
        <?php if (!empty($prev_post)) : ?>
            <a href="<?php echo esc_url(get_permalink($prev_post->ID)); ?>" class="c-article-nav__link">
                <span class="c-article-nav__label c-article-nav__label--prev">前の記事</span>

                <div class="c-article-nav__content">
                    <div class="c-article-nav__img">
                        <?php if (has_post_thumbnail($prev_post->ID)) : ?>
                            <?php echo get_the_post_thumbnail($prev_post->ID, 'full'); ?>
                        <?php else : ?>
                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/common/no-image.png" alt="No image">
                        <?php endif; ?>
                    </div>

                    <p class="c-article-nav__text">
                        <?php echo esc_html(get_the_title($prev_post->ID)); ?>
                    </p>
                </div>
            </a>
        <?php endif; ?>
    </div>

    <div class="c-article-nav__item c-article-nav__item--next">
        <?php if (!empty($next_post)) : ?>
            <a href="<?php echo esc_url(get_permalink($next_post->ID)); ?>" class="c-article-nav__link">
                <span class="c-article-nav__label c-article-nav__label--next">次の記事</span>

                <div class="c-article-nav__content">
                    <div class="c-article-nav__img">
                        <?php if (has_post_thumbnail($next_post->ID)) : ?>
                            <?php echo get_the_post_thumbnail($next_post->ID, 'full'); ?>
                        <?php else : ?>
                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/common/no-image.png" alt="No image">
                        <?php endif; ?>
                    </div>

                    <p class="c-article-nav__text">
                        <?php echo esc_html(get_the_title($next_post->ID)); ?>
                    </p>
                </div>
            </a>
        <?php endif; ?>
    </div>
</div>