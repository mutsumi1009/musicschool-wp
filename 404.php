<?php get_header(); ?>

        <main class="l-main p-404">
            <div class="c-hero">
                <div class="c-hero__img">
                  <picture>
                    <source media="(min-width: 768px)" srcset="<?php echo get_template_directory_uri(); ?>/images/common/404-hero_pc.jpg">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/common/404-hero_sp.jpg" alt="404 not found キービジュアル" width="375" height="300">
                  </picture>
                </div>
                <h1 class="c-hero__text">404 not found</h1>
              </div>

            <div class="p-404__content">
                <div class="l-inner">
                    <p class="c-page-message">
                        申し訳ございませんが、お探しのページが見つかりませんでした。
                        <br>お探しのページは一時的に表示ができない状態にあるか、移動または削除された可能性があります。
                    </p>

                    <div class="p-page-btn">
                        <a href="index.html" class="c-button c-button--back">ホームへ戻る</a>
                    </div>
                </div>
            </div>
        </main>

        <?php get_footer(); ?>
       