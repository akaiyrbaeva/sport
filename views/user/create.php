<?php

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = 'Жаңа қолданушыны қосу';
$this->params['breadcrumbs'][] = ['label' => 'Қолданушылар тізімі', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Жаңа қолданушыны қосу';

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