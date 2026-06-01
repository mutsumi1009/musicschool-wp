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

    // SimpleBar読み込み
    wp_enqueue_style(
        'simplebar-style',
        'https://unpkg.com/simplebar@latest/dist/simplebar.min.css',
        array(),
        null
    );

    wp_enqueue_style(
        'common-style',
        get_theme_file_uri('/css/style.css'),
        array('splide-style', 'simplebar-style'),
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

    // SimpleBar読み込み
    wp_enqueue_script(
        'simplebar-script',
        'https://unpkg.com/simplebar@latest/dist/simplebar.min.js',
        array(),
        null,
        true
    );

    // 共通JS読み込み
    wp_enqueue_script(
        'common-script',
        get_theme_file_uri('/js/script.js'),
        array('jquery', 'splide-script', 'simplebar-script'),
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
    // 管理画面ではなく、メインクエリの場合のみ実行
    if (!is_admin() && $query->is_main_query()) {

        // カスタム投稿タイプ 'blog' または 'result' のアーカイブページの場合
        if (is_post_type_archive(['blog', 'result'])) {
            // 表示件数を10件に設定
            $query->set('posts_per_page', 10);
        }

        // 検索結果ページの場合
        if ($query->is_search()) {
            // 検索対象をブログ投稿だけにする
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

// --------------------------------------------------
// 管理画面で「投稿」メニューを非表示
// --------------------------------------------------
function remove_menus()
{
    remove_menu_page('edit.php'); // 投稿
}
add_action('admin_menu', 'remove_menus');

// Snow Monkey Forms送信完了後、送信完了ページへリダイレクト
function redirect_smf_to_contact_send_page()
{
?>
    <script>
        window.addEventListener('load', function() {
            const form = document.getElementById('snow-monkey-form-172');

            if (!form) {
                return;
            }

            form.addEventListener('smf.complete', function() {
                window.location.href = '<?php echo esc_url(home_url('/contact-send/')); ?>';
            });
        });
    </script>
<?php
}
add_action('wp_footer', 'redirect_smf_to_contact_send_page');

// W3Cエラー対策：WordPressの画像自動 sizes="auto" 出力を無効化
add_filter('wp_img_tag_add_auto_sizes', '__return_false');

// --------------------------------------------------
// reCAPTCHAをお問い合わせページだけで読み込む
// --------------------------------------------------
function dequeue_recaptcha_except_contact()
{
    if (is_admin()) {
        return;
    }

    // お問い合わせページではreCAPTCHAを残す
    if (is_page('contact')) {
        return;
    }

    global $wp_scripts;

    if (empty($wp_scripts->registered)) {
        return;
    }

    foreach ($wp_scripts->registered as $handle => $script) {
        if (empty($script->src)) {
            continue;
        }

        if (
            strpos($script->src, 'recaptcha') !== false ||
            strpos($script->src, 'google.com/recaptcha') !== false ||
            strpos($script->src, 'gstatic.com/recaptcha') !== false
        ) {
            wp_dequeue_script($handle);
            wp_deregister_script($handle);
        }
    }
}
add_action('wp_enqueue_scripts', 'dequeue_recaptcha_except_contact', 100);

// --------------------------------------------------
// 404ページのメタディスクリプション
// --------------------------------------------------
function add_404_meta_description()
{
    if (is_404()) {
        echo '<meta name="description" content="きたむらミュージックスクールの404ページです。お探しのページは見つかりませんでした。">' . "\n";
    }
}
add_action('wp_head', 'add_404_meta_description', 1);