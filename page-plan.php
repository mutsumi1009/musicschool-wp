<?php get_header(); ?>

<main class="l-main p-plan">

    <div class="c-hero c-hero--with-border">
        <div class="c-hero__img">
            <picture>
            <source media="(min-width: 768px)" srcset="<?php echo esc_url(get_template_directory_uri()); ?>/images/plan/plan_pc.jpg">
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/plan/Plan_sp.jpg" alt="プラン・料金" width="375" height="300">
            </picture>
        </div>
        <h1 class="c-hero__text">プラン・料金</h1>
    </div>

    <?php get_template_part('template-parts/breadcrumbs'); ?>


    <section class="p-plan-system">
        <div class="l-inner">
            <h2 class="c-page-title c-page-title--plan">料金体系</h2>

            <div class="p-plan-price">
                <span class="p-plan-price__label">入会金 39,000円</span>
                <span class="p-plan-price__plus"></span>
                <span class="p-plan-price__label">月額料金</span>
            </div>

            <div class="p-plan__message">
                <p class="c-page-message">
                    きたむらミュージックスクールでは、個人に合わせたサポートを行う完全オーダーメイドのプランを用意しており、サポート内容により月額料金が異なります。担当者があなたに最適なプランを提案いたしますので、お気軽にお問い合わせください。※すべての料金は税込価格となります。
                </p>
            </div>
        </div>
    </section>

    <section class="p-plan-table">
        <div class="l-inner">
            <h2 class="c-page-title c-page-title--plan">プラン内容・月額料金</h2>

            <div class="p-plan-table__scroll" data-simplebar data-simplebar-auto-hide="false">
                <table class="p-plan-table__table">
                    <thead>
                        <tr>
                            <th></th>
                            <th class="p-plan-table__head-black">
                                <div class="p-plan-table__head-inner p-plan-table__head-inner--black">
                                    <p class="p-plan-table__head-title">
                                        ベーシック<br class="sp-only">プラン
                                    </p>
                                </div>
                            </th>
                            <th class="p-plan-table__head is-recommend">
                                <div class="p-plan-table__head-inner p-plan-table__head-inner--red">
                                    <p class="p-plan-table__head-title">
                                        <span class="p-plan-table__badge">おすすめ</span>
                                        <span class="p-plan-table__plan-name">スタンダード<br class="sp-br">プラン</span>
                                    </p>
                                </div>
                            </th>
                            <th class="p-plan-table__head-black">
                                <div class="p-plan-table__head-inner p-plan-table__head-inner--black">
                                    <p class="p-plan-table__head-title">
                                        プレミアム<br class="sp-only">プラン
                                    </p>
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>月額料金</th>
                            <td><span class="p-plan-table__num">39,000円</span></td>
                            <td class="is-recommend">
                                <span class="p-plan-table__price is-red">
                                    <span class="p-plan-table__num">59,000円</span>
                                </span>
                            </td>
                            <td><span class="p-plan-table__num">128,000円</span></td>
                        </tr>

                        <tr>
                            <th>マンツーマン授業</th>
                            <td>
                                <div class="p-plan-table__cell">
                                    <span class="p-plan-table__dot"></span>
                                    <span class="p-plan-table__text">週１回</span>
                                </div>
                            </td>
                            <td class="is-recommend">
                                <div class="p-plan-table__cell">
                                    <span class="p-plan-table__dot p-plan-table__dot--red"></span>
                                    <span class="p-plan-table__text is-red">週２回</span>
                                </div>
                            </td>
                            <td>
                                <div class="p-plan-table__cell">
                                    <span class="p-plan-table__dot"></span>
                                    <span class="p-plan-table__text">無制限</span>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <th>ビジネス基本講座</th>
                            <td><span class="p-plan-table__dot"></span></td>
                            <td class="is-recommend"><span
                                    class="p-plan-table__dot p-plan-table__dot--red"></span></td>
                            <td><span class="p-plan-table__dot"></span></td>
                        </tr>

                        <tr>
                            <th>練習ROOM利用</th>
                            <td>
                                <div class="p-plan-table__cell">
                                    <span class="p-plan-table__dot"></span>
                                    <span class="p-plan-table__text">月10時間</span>
                                </div>
                            </td>
                            <td class="is-recommend">
                                <div class="p-plan-table__cell">
                                    <span class="p-plan-table__dot p-plan-table__dot--red"></span>
                                    <span class="p-plan-table__text is-red">月20時間</span>
                                </div>
                            </td>
                            <td>
                                <div class="p-plan-table__cell">
                                    <span class="p-plan-table__dot"></span>
                                    <span class="p-plan-table__text">無制限</span>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <th>ビジネスコンサル</th>
                            <td><span class="p-plan-table__dash"></span></td>
                            <td class="is-recommend">
                                <div class="p-plan-table__cell">
                                    <span class="p-plan-table__dot p-plan-table__dot--red"></span>
                                    <span class="p-plan-table__text is-red">月２回</span>
                                </div>
                            </td>
                            <td>
                                <div class="p-plan-table__cell">
                                    <span class="p-plan-table__dot"></span>
                                    <span class="p-plan-table__text">月３回</span>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <th>
                                <span class="p-plan-table__row-title">コミュニティ<br class="sp-only">参加資格</span>
                            </th>
                            <td><span class="p-plan-table__dash"></span></td>
                            <td class="is-recommend"><span class="p-plan-table__dash"></span></td>
                            <td><span class="p-plan-table__dot"></span></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <p class="p-page-note">
                ※各サービスは１回ごとのオプション追加が可能です。詳しくは事務局までお問い合わせください。
            </p>
        </div>
    </section>
</main>

<?php get_template_part('template-parts/fix-area'); ?>

<?php get_footer(); ?>