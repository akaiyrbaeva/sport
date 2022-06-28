<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TrenerSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="trener-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'fio') ?>

    <?= $form->field($model, 'inn') ?>

    <?= $form->field($model, 'data_rozhdenia') ?>

    <?= $form->field($model, 'stazh') ?>

    <?php // echo $form->field($model, 'telefon') ?>

    <?php // echo $form->field($model, 'adres') ?>

    <?php // echo $form->field($model, 'tip_trenera') ?>

    <?php // echo $form->field($model, 'dolzhnost') ?>

    <?php // echo $form->field($model, 'sport') ?>

    <?php // echo $form->field($model, 'razryad') ?>

    <?php // echo $form->field($model, 'primechanie') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Поиск', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Обновить', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
