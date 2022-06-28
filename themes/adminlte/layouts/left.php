<?php

use app\rbac\RoleEnum;

?>

<aside class="main-sidebar">

    <section class="sidebar">

        <?php if (!Yii::$app->user->isGuest): ?>
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="<?= Yii::$app->user->identity->avatar_path ? Yii::$app->user->identity->avatar_path : '/img/imgpsh_fullsize.png' ?>"
                         class="img-circle"
                         alt="User Image"/>
                </div>
                <div class="pull-left info">
                    <p><?= Yii::$app->user->identity->username ?></p>
                </div>
            </div>
        <?php endif; ?>

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget' => 'tree'],

                'items' => [
                    [
                        'label' => 'Қатысушылар',
                        'visible' => !Yii::$app->user->isGuest,
                        'icon' => 'id-card',
                        'url' => ['/sostav/index']
                    ],

                    [
                        'label' => 'Тренерлер',
                        'visible' => !Yii::$app->user->isGuest,
                        'icon' => 'address-book',
                        'url' => ['/trener/index']
                    ],

                    [
                        'label' => 'Жарыстар',
                        'visible' => !Yii::$app->user->isGuest,
                        'icon' => 'trophy',
                        'url' => ['/sovernovaniya/index']
                    ],

                    [
                        'label' => 'Анықтамалықтар',
                        'visible' => !Yii::$app->user->isGuest,
                        'icon' => 'folder-open',
                        'items' => [
                            ['label' => 'Спорт түрі', 'visible' => Yii::$app->user->can(RoleEnum::ADMIN), 'url' => ['sport/index'], 'icon' => 'star'],
                            ['label' => 'Қызметтер', 'visible' => Yii::$app->user->can(RoleEnum::ADMIN), 'url' => ['dolzhnost/index'], 'icon' => 'bookmark'],
                            ['label' => 'Спорттық дәрежелер', 'visible' => Yii::$app->user->can(RoleEnum::ADMIN), 'url' => ['razryad/index'], 'icon' => 'signal'],
                            ['label' => 'Тренер типі', 'visible' => Yii::$app->user->can(RoleEnum::ADMIN), 'url' => ['tiptrenera/index'], 'icon' => 'asterisk'],
                            ['label' => 'Жарыс дәрежесі', 'visible' => Yii::$app->user->can(RoleEnum::ADMIN), 'url' => ['rang/index'], 'icon' => 'eject'],
                        ],
                        'url' => ['#']
                    ],

                    [
                        'label' => 'Қолданушылар',
                        'visible' => Yii::$app->user->can(RoleEnum::ADMIN),
                        'icon' => 'users',
                        'url' => ['/user/index']
                    ],

                    [
                        'label' => 'Тарих',
                        'visible' => Yii::$app->user->can(RoleEnum::ADMIN),
                        'icon' => 'history',
                        'url' => ['/history/index']
                    ],

                    [
                        'label' => 'Бағдарлама туралы',
                        'icon' => 'info-circle',
                        'url' => ['site/about']
                    ],

                    [
                        'label' => 'Жүйеге кіру',
                        'icon' => 'sign-in',
                        'visible' => Yii::$app->user->isGuest,
                        'url' => ['site/login'],
                    ],
                ],
            ]
        ) ?>

    </section>

</aside>
