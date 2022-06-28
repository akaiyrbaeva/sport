<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Razryad */

$this->title = 'Спорттық дәрежелер (разрядтар)';
$this->params['breadcrumbs'][] = ['label' => 'Спорттық дәрежелер (разрядтар)', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Жаңа анықтамалық';
?>

<div class="box box-default color-palette-box">
    <div class="box-body">
        <div class="row">
            <div class="col-md-12">

                <?= $this->render('_form', [
                    'model' => $model,
                ]) ?>

            </div>
        </div>
    </div>
</div>