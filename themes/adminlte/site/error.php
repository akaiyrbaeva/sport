<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = 'Спорт мектебінің контингентін есепке алу';
?>
<div class="site-error">

    <div class="site-index">
        <div class="container">

            <div class="jumbotron">
                <h4> <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i></h4>

                <h2 class="headline text-info">404 қатесі</h2>

            </div>

            <div class="jumbotron">

                <h2>
                <?php
                if(!Yii::$app->user->isGuest)
                    echo 'Құрметті, ' . Yii::$app->user->identity->fio . '!<br/>Кешіріңіз, Сіз сұрастырған ресурс табылған жоқ!';
                else
                    echo 'Құрметті, қонақ!<br/>Кешіріңіз, Сіз сұрастырған ресурс табылған жоқ!';?>
                </h2>

            </div>

        </div>
    </div>

</div>
