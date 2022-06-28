<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$this->title = 'Спорт мектебінің контингентін есепке алу';
$this->params['breadcrumbs'][] = $this->title;

$fieldOptions1 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-envelope form-control-feedback'></span>"
];
?>

<div class="login-box">
    <div class="login-logo">
        <a href="#"><b>Спорт мектебінің контингентін есепке алу</b></a>
    </div>
    <div class="login-box-body">
        <p class="login-box-msg">Парольді қалпына келтіру</p>

        <?php $form = ActiveForm::begin(['id' => 'login-form', 'enableClientValidation' => false]); ?>

        <?= $form
            ->field($model, 'email', $fieldOptions1)
            ->label(false)
            ->textInput(['placeholder' => $model->getAttributeLabel('Электрондық пошта')]) ?>

        <div class="row">
            <div class="col-xs-8">
                <?= Html::submitButton('Парольді қалпына келтіру',
                    ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>

    </div>


</div>