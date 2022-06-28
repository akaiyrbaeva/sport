<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Trener */

$this->title = 'Тренер деректері - ' . ' ' .  $model->fio;
$this->params['breadcrumbs'][] = ['label' => 'Тренерлер тізімі', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->fio;
?>

<div class="draftee-view">
    <p>
        <?= Html::a('Өзгерту', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Өшіру', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Сіз шынымен ағымдағы тренерді өшіргіңіз келе ме?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [

            'fio',
            'inn',
            'data_rozhdenia',
            'stazh',
            'telefon',
            'adres',
            'tip_trenera',
            'dolzhnost',
            'sport',
            'razryad',
            'primechanie',
            'created_at:datetime',
            'updated_at:datetime',

        ],
        'template' => "<tr><th width=\"225\">{label}</th><td>{value}</td></tr>",
    ]) ?>
</div>