<?php

use app\models\UserSearch;
use kartik\daterange\DateRangePicker;
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Қолданушылар тізімі';
$this->params['breadcrumbs'][] = 'Қолданушылар тізімі';
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
                    'rowOptions' => function ($model, $key, $index, $grid) {
                        if ($model->status == 0) {
                            return ['style' => 'background-color:#EEDFCC;'];
                        }
                        if ($model->status == 1) {
                            return ['style' => 'background-color:#C1FFC1;'];
                        }
                    },
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn', 'options' => ['width' => 10]],


                        [
                            'attribute' => 'username',
                            'options' => [
                                'width' => 150,
                            ],
                        ],

                        [
                            'attribute' => 'email',
                            'options' => [
                                'width' => 150,
                            ],
                        ],

                        [
                            'attribute' => 'status',
                            'filter' => [1 => 'Белсенді', 0 => 'Белсенді емес'],
                            'value' => function ($model) {
                                $status = 'Белсенді';
                                if ($model->status == 0) {
                                    $status = 'Белсенді емес';
                                }
                                return $status;
                            },
                            'options' => ['width' => 200],
                        ],
                        [
                            'attribute' => 'created_at',
                            'options' => ['width' => 220],
                            'format' => 'datetime',
                            'filter' => DateRangePicker::widget([
                                'attribute' => 'created_at_range',
                                'defaultPresetValueOptions' => ['style' => 'display:none'],
                                'model' => $searchModel,
                                'presetDropdown' => true,
                                'pluginOptions' => [
                                    'showDropdowns' => true,
                                    'alwaysShowCalendars' => true,
                                    'locale' => [
                                        'format' => 'DD.MM.YYYY',
                                    ],
                                ],
                            ]),
                        ],

                        [
                            'attribute' => 'updated_at',
                            'options' => ['width' => 220],
                            'format' => 'datetime',
                            'filter' => DateRangePicker::widget([
                                'attribute' => 'updated_at_range',
                                'defaultPresetValueOptions' => ['style' => 'display:none'],
                                'model' => $searchModel,
                                'presetDropdown' => true,
                                'pluginOptions' => [
                                    'showDropdowns' => true,
                                    'alwaysShowCalendars' => true,
                                    'locale' => [
                                        'format' => 'DD.MM.YYYY',
                                    ],
                                ],
                            ]),
                        ],

                        [
                            'class' => 'yii\grid\ActionColumn',
                            'header' => 'Әрекеттер',
                            'headerOptions' => ['class' => 'text-center'],
                            'options' => ['width' => 90],
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
                                            'data-confirm' => 'Сіз шынымен ағымдағы қолданушыны өшіргіңіз келе ме?',
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
