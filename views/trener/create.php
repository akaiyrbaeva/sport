<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Trener */

$this->title = 'Жаңа тренерді қосу';
$this->params['breadcrumbs'][] = ['label' => 'Тренерлер тізімі', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Жаңа тренерді қосу';
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