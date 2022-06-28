<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Sovernovaniya */

$this->title = 'Жаңа жарысты қосу';
$this->params['breadcrumbs'][] = ['label' => 'Жарыстар тізімі', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Жаңа жарысты қосу';
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