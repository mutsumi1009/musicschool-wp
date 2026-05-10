<div class="p-fixed-buttons js-fixed-buttons">
    <a href="#" class="js-to-top page-top-btn" id="page-top-btn">
        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/common/icon_page-top-btn.svg" alt="TOPへ戻る">
    </a>

    <?php if (!is_page(array('contact', 'contact-send'))) : ?>
        <div class="p-contact-banner">
            <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="c-button c-button--footer">お問い合わせ</a>
        </div>
    <?php endif; ?>
</div>