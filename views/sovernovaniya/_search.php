<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SovernovaniyaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sovernovaniya-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'data_nachala') ?>

    <?= $form->field($model, 'data_okonchaniya') ?>

    <?= $form->field($model, 'naimenovanie') ?>

    <?= $form->field($model, 'mesto_provedeniya') ?>

    <?php // echo $form->field($model, 'kolichestvo_uchastnikov') ?>

    <?php // echo $form->field($model, 'vid_sporta') ?>

    <?php // echo $form->field($model, 'rang_sorevnovaniya') ?>

    <?php // echo $form->field($model, 'primechanie') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Поиск', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Обновить', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
