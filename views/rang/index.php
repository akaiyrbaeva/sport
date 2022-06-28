<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\RangSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Жарыс дәрежесі';
$this->params['breadcrumbs'][] = 'Жарыс дәрежесі';
?>

<div class="box box-default color-palette-box">
    <div class="box-body">
        <div class="row">
            <div class="col-md-12">

                <p>
                    <?= Html::a('Қосу', ['create'], ['class' => 'btn btn-success']) ?>
                </p>

                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,

                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn', 'options' => ['width' => 10]],

                        'name',

                        [
                            'class' => 'yii\grid\ActionColumn',
                            'header' => 'Әрекеттер',
                            'headerOptions' => ['class' => 'text-center'],
                            'options' => ['width' => 127],
                            'template' => '{view} {update} {delete}',
                            'buttons' => [
                                'view' => function ($url, $model, $key) {
                                    return Html::a('<button type="button" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-eye-open" style="color:white;"></span></button>',
                                        $url, [
                                            'title' => 'Көру',
                                            'data-pjax' => '0',
                                        ]);
                                },
                                'update' => function ($url, $model, $key) {
                                    return Html::a('<button type="button" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-pencil" style="color:white;"></span></button>',
                                        $url, [
                                            'title' => 'Өзгерту',
                                            'data-pjax' => '0',
                                        ]);
                                },
                                'delete' => function ($url, $model, $key) {
                                    return Html::a('<button type="button" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" style="color:white;"></span></button>',
                                        $url, [
                                            'title' => 'Өшіру',
                                            'data-confirm' => 'Сіз шынымен ағымдағы жазбаны өшіргіңіз келе ме?',
                                            'data-method' => 'post',
                                            'data-pjax' => '0',
                                        ]);
                                },
                            ],
                        ],
                    ],
                ]); ?>
            </div>
        </div>
    </div>
</div>