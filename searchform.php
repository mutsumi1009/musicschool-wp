<form action="<?php echo esc_url(home_url('/')); ?>" method="get" class="p-sidebar-search">
                <div class="p-sidebar-search__inner">
                    <input type="text" name="s" class="p-sidebar-search__input" placeholder="検索ワード">
                    <input type="hidden" name="post_type" value="blog">
                </div>

                <button type="submit" class="p-sidebar-search__button">
                    <span class="p-sidebar-search__icon">
                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/blog/icon-search.svg" alt="検索">
                    </span>
                </button>
            </form>