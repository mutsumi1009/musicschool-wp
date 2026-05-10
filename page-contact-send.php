<?php get_header(); ?>

        <main class="l-main p-contact-send">
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

            <div class="p-contact-send__content">
                <div class="l-inner">
                    <p class="c-page-message">
                        お問い合わせいただきありがとうございました。
                        <br>内容確認後、担当者よりメールにてご連絡いたします。
                    </p>

                    <div class="p-page-btn">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="c-button c-button--back">ホームへ戻る</a>
                    </div>
                </div>
            </div>
        </main>

        <?php get_footer(); ?>