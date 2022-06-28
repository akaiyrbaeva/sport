<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Sovernovaniya */

$this->title = 'Жарыс деректері - ' . ' ' .  $model->naimenovanie;
$this->params['breadcrumbs'][] = ['label' => 'Жарыстар тізімі', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->naimenovanie;
?>

<div class="draftee-view">
    <p>
        <?= Html::a('Өзгерту', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Өшіру', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Сіз шынымен ағымдағы жарысты өшіргіңіз келе ме?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [

            'data_nachala',
            'data_okonchaniya',
            'naimenovanie',
            'mesto_provedeniya',
            'kolichestvo_uchastnikov',
            'vid_sporta',
            'rang_sorevnovaniya',
            'primechanie',
            'created_at:datetime',
            'updated_at:datetime',
        ],
        'template' => "<tr><th width=\"225\">{label}</th><td>{value}</td></tr>",
    ]) ?>
</div>