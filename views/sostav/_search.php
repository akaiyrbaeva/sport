<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SostavSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sostav-search">

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

    <?= $form->field($model, 'telefon') ?>

    <?php // echo $form->field($model, 'adres') ?>

    <?php // echo $form->field($model, 'shkola') ?>

    <?php // echo $form->field($model, 'klass') ?>

    <?php // echo $form->field($model, 'pol') ?>

    <?php // echo $form->field($model, 'ves') ?>

    <?php // echo $form->field($model, 'data_zachisleniya') ?>

    <?php // echo $form->field($model, 'razryad') ?>

    <?php // echo $form->field($model, 'medosmostr') ?>

    <?php // echo $form->field($model, 'primechanie') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Поиск', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Обновить', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
