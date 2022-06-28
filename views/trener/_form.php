<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use yii\helpers\ArrayHelper;
use app\models\Tiptrenera;
use app\models\Dolzhnost;
use app\models\Sport;
use app\models\Razryad;

/* @var $this yii\web\View */
/* @var $model app\models\Trener */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="trener-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'inn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'data_rozhdenia')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Туған күнді көрсетіңіз'],
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'dd.mm.yyyy',
        ]
    ]) ?>

    <?= $form->field($model, 'stazh')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Педагог стаждың басталу күнін көрсетіңіз'],
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'dd.mm.yyyy',
        ]
    ]) ?>

    <?= $form->field($model, 'telefon')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'adres')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tip_trenera')->dropDownList(ArrayHelper::map(Tiptrenera::find()->andWhere('id')->orderBy('name')->all(), 'name', 'name'), array('prompt'=>' ')) ?>

    <?= $form->field($model, 'dolzhnost')->dropDownList(ArrayHelper::map(Dolzhnost::find()->andWhere('id')->orderBy('name')->all(), 'name', 'name'), array('prompt'=>' ')) ?>

    <?= $form->field($model, 'sport')->dropDownList(ArrayHelper::map(Sport::find()->andWhere('id')->orderBy('name')->all(), 'name', 'name'), array('prompt'=>' ')) ?>

    <?= $form->field($model, 'razryad')->dropDownList(ArrayHelper::map(Razryad::find()->andWhere('id')->orderBy('name')->all(), 'name', 'name'), array('prompt'=>' ')) ?>

    <?= $form->field($model, 'primechanie')->textArea(['rows' => '6'], ['style' => 'display:inline']) ?>

    <div class="form-group">
        <?= Html::submitButton('Сақтау', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
