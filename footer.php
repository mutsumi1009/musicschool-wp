<footer class="l-footer p-footer">
    <div class="p-footer__inner">
        <nav class="p-footer__nav">
            <?php
            wp_nav_menu(
                array(
                    'menu_class'     => 'p-footer__nav-list',
                    'theme_location' => 'footer',
                    'container'      => false,
                )
            );
            ?>
        </nav>

        <div class="p-footer__content">
            <div class="p-footer__logo">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="p-footer__logo-link">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/common/footer-icon.svg" alt="きたむらミュージックスクールロゴ" width="32" height="50">
                </a>
            </div>

            <div class="p-footer__copyright">
                <p>Copyright © 0000 KITAMURA music school Inc.
                    <span class="u-center-block"> All Rights</span>
                </p>
            </div>

            <div class="p-footer__sns">
                <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/common/icon-twitter.svg" alt="Twitter"></a>
                <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/common/icon-facebook.svg" alt="Facebook"></a>
                <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/common/icon-youtube.svg" alt="YouTube"></a>
                <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/common/icon-instagram.svg" alt="Instagram"></a>
            </div>
        </div>
    </div>
</footer>
</div><!-- /.l-wrapper -->
<?php wp_footer(); ?>

</body>

</html>