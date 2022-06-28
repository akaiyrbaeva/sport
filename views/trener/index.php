<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\daterange\DateRangePicker;
use kartik\export\ExportMenu;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TrenerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Тренерлер тізімі';
$this->params['breadcrumbs'][] = 'Тренерлер тізімі';
?>

<div class="box box-default color-palette-box">
    <div class="box-body">
        <div class="row">
            <div class="col-md-12">

                <?= Html::a('Қосу', ['create'], ['class' => 'btn btn-success']) ?>

                <?= ExportMenu::widget([
                    'dataProvider' => $dataProvider,
                    // 'columns' => $columns,
                    'target' => ExportMenu::TARGET_SELF,
                    'showConfirmAlert' => false,
                    'fontAwesome' => true,
                    'exportConfig' => [
                        ExportMenu::FORMAT_TEXT => false,
                        ExportMenu::FORMAT_PDF => false,
                        ExportMenu::FORMAT_HTML => false,
                        ExportMenu::FORMAT_CSV => false,
                    ],
                    'columnSelectorOptions' => [
                        'class' => 'btn btn-default',

                    ],
                    'dropdownOptions' => [
                        'class' => 'btn btn-default',
                        'menuOptions' => [
                            'class' => 'pull-right',
                        ],
                    ],
                ]); ?>


                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,

                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn', 'options' => ['width' => 10]],

                        [
                            'attribute' => 'fio',
                            'options' => [
                                'width' => 450,
                            ],
                        ],

                        'telefon',
                        'dolzhnost',
                        'sport',
                        'razryad',

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
                                            'data-confirm' => 'Сіз шынымен ағымдағы тренерді өшіргіңіз келе ме?',
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