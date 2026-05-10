<?php get_header(); ?>

<main class="l-main p-contact-form">

    <div class="c-hero c-hero--with-border">
        <div class="c-hero__img">
            <picture>
                <source media="(min-width: 768px)" srcset="<?php echo get_template_directory_uri(); ?>/images/contact/contact-pc.jpg">
                <img src="<?php echo get_template_directory_uri(); ?>/images/contact/contact-sp.jpg" alt="お問い合わせ" width="375" height="300">
            </picture>
        </div>
        <h1 class="c-hero__text">お問い合わせ</h1>
    </div>

    <?php get_template_part('template-parts/breadcrumbs'); ?>

    <div class="p-contact-form__content">
        <div class="l-inner">
            <p class="c-page-message">
                当校に関するご質問・ご相談・資料請求は下記のフォームからお気軽にお問い合わせください。
                <br>通常３営業日以内にメールにてご連絡させていただきます。
            </p>
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <?php the_content(); ?>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</main>

<?php get_template_part('template-parts/fix-area'); ?>

<?php get_footer(); ?>