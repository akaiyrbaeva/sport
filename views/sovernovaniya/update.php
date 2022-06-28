<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Sovernovaniya */

$this->title = 'Жарыс туралы деректерді өзгерту - ' . $model->naimenovanie;
$this->params['breadcrumbs'][] = ['label' => 'Жарыстар тізімі', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->naimenovanie;
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