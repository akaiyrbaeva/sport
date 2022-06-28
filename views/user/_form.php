<?php

use app\rbac\RoleEnum;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fio')->textInput() ?>

    <?= $form->field($model, 'username')->textInput() ?>

    <?= $form->field($model, 'email')->textInput() ?>

    <?= $form->field($model, 'password')->passwordInput([
        'autocomplete' => 'new-password',
    ]) ?>

    <?php if (Yii::$app->user->can(RoleEnum::ADMIN)): ?>
        <?= $form->field($model, 'is_admin')->checkbox() ?>
    <?php endif; ?>

    <?= $form->field($model, 'avatar_file')->fileInput() ?>

    <?php if (Yii::$app->user->can(RoleEnum::ADMIN)): ?>
        <?= $form->field($model, 'status')->dropDownList([1 => 'Белсенді', 0 => 'Белсенді емес',]) ?>
    <?php endif; ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Қосу' : 'Сақтау',
            ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']); ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
