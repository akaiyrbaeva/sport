<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use yii\helpers\ArrayHelper;
use app\models\Sport;
use app\models\Rang;

/* @var $this yii\web\View */
/* @var $model app\models\Sovernovaniya */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sovernovaniya-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'data_nachala')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Жарыстың басталу күнін көрсетіңіз'],
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'dd.mm.yyyy',
        ]
    ]) ?>

    <?= $form->field($model, 'data_okonchaniya')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Жарыстың аяқталу күнін көрсетіңіз'],
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'dd.mm.yyyy',
        ]
    ]) ?>

    <?= $form->field($model, 'naimenovanie')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mesto_provedeniya')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kolichestvo_uchastnikov')->textInput() ?>

    <?= $form->field($model, 'vid_sporta')->dropDownList(ArrayHelper::map(Sport::find()->andWhere('id')->orderBy('name')->all(), 'name', 'name'), array('prompt'=>' ')) ?>

    <?= $form->field($model, 'rang_sorevnovaniya')->dropDownList(ArrayHelper::map(Rang::find()->andWhere('id')->orderBy('name')->all(), 'name', 'name'), array('prompt'=>' ')) ?>

    <?= $form->field($model, 'primechanie')->textArea(['rows' => '6'], ['style' => 'display:inline']) ?>

    <div class="form-group">
        <?= Html::submitButton('Сақтау', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
