<?php
// --------------------------------------------------
// 最初の設定
// --------------------------------------------------
function custom_theme_setup()
{
    add_theme_support('title-tag');
    add_theme_support('automatic-feed-links');
    add_theme_support('post-thumbnails');
    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script'
        )
    );
    add_theme_support('wp-block-styles');
    add_theme_support('responsive-embeds');
}
add_action('after_setup_theme', 'custom_theme_setup');

// --------------------------------------------------
// ファイル読み込み
// --------------------------------------------------
function add_files()
{
    $now = date('YmdHis');

    // CSS読み込み
    wp_enqueue_style(
        'splide-style',
        '//cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css',
        array(),
        null
    );

    wp_enqueue_style(
        'common-style',
        get_theme_file_uri('/css/style.css'),
        array('splide-style'),
        $now
    );

    // WordPress標準のjQueryを解除
    wp_deregister_script('jquery');

    // jQuery読み込み
    wp_enqueue_script(
        'jquery',
        '//code.jquery.com/jquery-3.7.1.min.js',
        array(),
        null,
        false
    );

    // Splide読み込み
    wp_enqueue_script(
        'splide-script',
        '//cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js',
        array(),
        null,
        true
    );

    // 共通JS読み込み
    wp_enqueue_script(
        'common-script',
        get_theme_file_uri('/js/script.js'),
        array('jquery', 'splide-script'),
        $now,
        true
    );

    // トップページ用JS読み込み
    if (is_front_page()) {
        wp_enqueue_script(
            'top-script',
            get_theme_file_uri('/js/top.js'),
            array('jquery', 'splide-script'),
            $now,
            true
        );
    }
}
add_action('wp_enqueue_scripts', 'add_files');

// --------------------------------------------------
// 一覧・検索ページの表示条件
// --------------------------------------------------
function my_page_conditions($query)
{
    if (!is_admin() && $query->is_main_query()) {

        // blog / result の一覧ページは10件表示
        if (is_post_type_archive(array('blog', 'result'))) {
            $query->set('posts_per_page', 10);
        }

        // 検索結果は blog のみ表示
        if ($query->is_search()) {
            $query->set('post_type', 'blog');
        }
    }
}
add_action('pre_get_posts', 'my_page_conditions');

// --------------------------------------------------
// 管理画面「外観 ＞ メニュー」を表示
// --------------------------------------------------
function register_my_menus()
{
    register_nav_menus(array(
        'primary' => 'Primary Menu',
        'footer'  => 'Footer Menu',
    ));
}
add_action('after_setup_theme', 'register_my_menus');
