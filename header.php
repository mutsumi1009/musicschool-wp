<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="音楽教室,ギター,ピアノ,ベース,沖縄,宜野湾市">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&display=swap" rel="stylesheet">
    <?php wp_head(); ?>
</head>

<body <?php body_class(is_front_page() ? 'p-top-page' : ''); ?> style="display: none;">
    <?php wp_body_open(); ?>

    <div class="l-wrapper">
        <header class="l-header">
            <div class="p-header">
                <div class="p-header__inner l-inner">
                    <div class="p-header__logo">
                        <h1 class="p-header__site-title">
                            <a href="<?php echo esc_url(home_url('/')); ?>" class="logo">
                                <span class="logo__img">
                                    <img src="<?php echo get_template_directory_uri(); ?>/images/common/icon-pc.svg" alt="きたむらミュージックスクールロゴ" width="32" height="50">
                                </span>
                                <span class="p-header__logo-text">
                                    <span class="logo__main">きたむら</span>
                                    <span class="logo__sub">ミュージックスクール</span>
                                </span>
                            </a>
                        </h1>
                    </div>

                    <button id="js-hamburger" class="c-hamburger" aria-label="メニューを開く">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>

                    <nav id="js-navigation" class="p-header__nav">
                        <?php
                        wp_nav_menu(
                            array(
                                'menu_class'     => 'p-header__nav-list',
                                'theme_location' => 'primary',
                                'container'      => false,
                            )
                        );
                        ?>
                    </nav>
                </div>
            </div>
        </header>