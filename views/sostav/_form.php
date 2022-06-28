<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use yii\helpers\ArrayHelper;
use app\models\Pol;
use app\models\Razryad;
use app\models\Sport;

/* @var $this yii\web\View */
/* @var $model app\models\Sostav */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sostav-form">

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

    <?= $form->field($model, 'telefon')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'adres')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'shkola')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'klass')->textInput() ?>

    <?= $form->field($model, 'pol')->dropDownList(ArrayHelper::map(Pol::find()->andWhere('id')->all(), 'name', 'name'), array('prompt'=>' ')) ?>

    <?= $form->field($model, 'ves')->textInput() ?>

    <?= $form->field($model, 'data_zachisleniya')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Тіркелу күнін көрсетіңіз'],
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'dd.mm.yyyy',
        ]
    ]) ?>

    <?= $form->field($model, 'sport')->dropDownList(ArrayHelper::map(Sport::find()->andWhere('id')->orderBy('name')->all(), 'name', 'name'), array('prompt'=>' ')) ?>

    <?= $form->field($model, 'razryad')->dropDownList(ArrayHelper::map(Razryad::find()->andWhere('id')->orderBy('name')->all(), 'name', 'name'), array('prompt'=>' ')) ?>

    <?= $form->field($model, 'medosmostr')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Медициналық тексеру күнін көрсетіңіз'],
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'dd.mm.yyyy',
        ]
    ]) ?>

    <?= $form->field($model, 'primechanie')->textArea(['rows' => '6'], ['style' => 'display:inline']) ?>

    <div class="form-group">
        <?= Html::submitButton('Сақтау', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
