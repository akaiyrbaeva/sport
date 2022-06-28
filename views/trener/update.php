<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Trener */

$this->title = 'Тренер туралы деректерді өзгерту - ' . $model->fio;
$this->params['breadcrumbs'][] = ['label' => 'Тренерлер тізімі', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->fio;
$this->params['breadcrumbs'][] = 'Өзгерту';
?>

<div class="box box-default color-palette-box">
    <div class="box-body">
        <div class="row">
            <div class="col-md-12">

                <?= $this->render('_form', [
                    'model' => $model,
                ]);
                ?>
            </div>
        </div>
    </div>
</div>