<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Tiptrenera */

$this->title = 'Жазбаны көру';
$this->params['breadcrumbs'][] = ['label' => 'Тренер типі', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->name;
?>

<div class="discipline-view">
    <p>
        <?= Html::a('Өзгерту', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Өшіру', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Сіз шынымен ағымдағы жазбаны өшіргіңіз келе ме?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
        ],
        'template' => "<tr><th width=\"225\">{label}</th><td>{value}</td></tr>",
    ]) ?>
</div>