<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Қолданушылар тізімі', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->username;
?>

<div class="box box-default color-palette-box">
    <div class="box-body">
        <div class="row">
            <div class="col-md-12">

                <p>
                    <?= Html::a('Өзгерту', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                    <?= Html::a('Өшіру', ['delete', 'id' => $model->id], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => 'Сіз шынымен ағымдағы қолданушыны өшіргіңіз келе ме?',
                            'method' => 'post',
                        ],
                    ]) ?>
                </p>

                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'fio',
                        'username',
                        'email',
                        [
                            'attribute' => 'status',
                            'filter' => [1 => 'Белсенді', 0 => 'Белсенді емес',],
                            'value' => function ($model) {
                                $status = 'Белсенді';
                                if ($model->status == 0) {
                                    $status = 'Белсенді емес';
                                }
                                return $status;
                            }
                        ],
                        'created_at:datetime',
                        'updated_at:datetime',
                    ],
                    'template' => "<tr><th width=\"225\">{label}</th><td>{value}</td></tr>",
                ]) ?>

            </div>
        </div>
    </div>
</div>
