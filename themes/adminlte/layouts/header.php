<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this \yii\web\View */
/* @var $content string */
?>

<header class="main-header">

    <?= Html::a('<span class="logo-mini">КЕ</span><span class="logo-lg">' . Yii::$app->name . '</span>',
        Yii::$app->homeUrl, ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span> </a>

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">

                <?php if (!Yii::$app->user->isGuest): ?>
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="<?= Yii::$app->user->identity->avatar_path ? Yii::$app->user->identity->avatar_path : '/img/imgpsh_fullsize.png' ?>"
                                 class="user-image"
                                 alt="User Image"/>
                            <span class="hidden-xs"><?= Yii::$app->user->identity->username ?></span> </a>
                        <ul class="dropdown-menu">
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="<?= Url::to(['/user/view', 'id' => Yii::$app->user->id]) ?>"
                                       class="btn btn-default btn-flat">Профиль</a>
                                </div>
                                <div class="pull-right">
                                    <?= Html::a(
                                        'Шығу',
                                        ['/site/logout'],
                                        ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
                                    ) ?>
                                </div>
                            </li>
                        </ul>
                    </li>
                <?php endif; ?>

            </ul>
        </div>
    </nav>
</header>
