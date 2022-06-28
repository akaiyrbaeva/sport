<?php

use app\models\History;
use app\models\search\HistorySearch;
use app\models\User;
use kartik\daterange\DateRangePicker;
use kartik\export\ExportMenu;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel HistorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Тарих';
$this->params['breadcrumbs'][] = 'Тарих';

$columns = [
    [
        'attribute' => 'user_id',
        'format' => 'raw',
        'value' => 'user.username',
        'width' => '150px',
    ],
    [
        'attribute' => 'created_at',
        'format' => 'datetime',
        'width' => '150px',
    ],
    'action',
    'comment',
];

?>

<div class="box box-default color-palette-box">
    <div class="box-body">
        <div class="row">
            <div class="col-md-12">

                <div class="pull-right">
                    <?= ExportMenu::widget([
                        'dataProvider' => $dataProvider,
                        'columns' => $columns,
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

                    <div class="btn-group" role="group">
                        <?= Html::a('Жазбаларды өшіру', ['clear'], [
                            'class' => 'btn btn-primary',
                            'data' => [
                                'confirm' => 'Сіз шынымен барлық кесте жазбаларын өшіргіңіз келе ме??',
                                'method' => 'post',
                            ]
                        ]) ?>
                    </div>
                </div>

                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,

                    'columns' => [
//                        [
//                            'attribute' => 'id',
//                            'options' => [
//                                'width' => 10,
//                            ],
//                        ],

                        [
                            'attribute' => 'user_id',
                            'filter' => Select2::widget([
                                'name' => 'user_id',
                                'model' => $searchModel,
                                'data' => ArrayHelper::map(User::find()->orderBy(['username' => SORT_ASC])->all(), 'id',
                                    'username'),
                                'value' => $searchModel->user_id,
                                'options' => [
                                    'multiple' => false,
                                    'prompt' => 'Қолданушыны таңдаңыз',
                                ],
                                'showToggleAll' => false,
                                'pluginOptions' => [
                                    'allowClear' => true,
                                    'minimumInputLength' => 0,
                                ],
                            ]),
                            'value' => 'user.username',
                            'options' => [
                                'width' => 300
                            ],
                        ],

                        [
                            'attribute' => 'created_at',
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
                            'options' => [
                                'width' => 220
                            ],
                        ],

                        [
                            'attribute' => 'action',
                            'value' => function (History $historyModel) {
                                return ArrayHelper::getValue(History::actionLabels(), $historyModel->action);
                            }
                        ],
                        'comment',
                    ],
                ]); ?>

            </div>
        </div>
    </div>
</div>
