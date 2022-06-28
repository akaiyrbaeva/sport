<?php

use app\modules\hr\models\Order;
use app\modules\hr\models\OrderSearch;
use app\modules\hr\Module;
use app\themes\gentelella\widgets\Panel;
use app\widgets\ActionColumn;
use app\widgets\GridView;
use kartik\date\DatePicker;
use kartik\daterange\DateRangePicker;
use kartik\export\ExportMenu;
use yii\bootstrap\ButtonDropdown;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;

/* @var $this View */
/* @var $searchModel OrderSearch */
/* @var $dataProvider ActiveDataProvider */

$this->title = Module::t('order', 'MODEL_NAME_PLURAL');
$this->params['breadcrumbs'][] = 'Отдел кадров';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="hr-order-index">

    <?php Panel::begin([
        'header' => $this->title,
    ]); ?>

    <div>
        <div class="pull-left">
            <?= ButtonDropdown::widget([
                'label' => Module::t('order', 'CREATE___LINK__LABEL'),
                'options' => ['class' => 'btn btn-success'],
                'dropdown' => [
                    'items' => call_user_func(function () {
                        $items = [];
                        foreach (Order::typesLabels() as $type => $label) {
                            $items[] = [
                                'label' => $label,
                                'url' => ['/hr/order/create', 'type' => $type],
                            ];
                        }
                        return $items;
                    }),
                ],
            ]) ?>

        </div>

        <div class="pull-right">
            <?= ExportMenu::widget([
                'dataProvider' => $dataProvider,
                'columns' => call_user_func(function () {
                    /** @var Order $model */
                    $columns = Order::exportColumnsConfig();
                    foreach (Order::getEmbeddedModelsConfig() as $embeddedModelConfig) {
                        $emc = $embeddedModelConfig;
                        if (method_exists($emc['className'], 'exportColumnsConfig')) {
                            $columns = ArrayHelper::merge(
                                $columns,
                                $emc['className']::exportColumnsConfig($emc['modelAttribute'])
                            );
                        }
                    }
                    return $columns;
                }),
                'target' => ExportMenu::TARGET_SELF,
                'showConfirmAlert' => false,
                'exportConfig' => [
                    ExportMenu::FORMAT_TEXT => false,
                    ExportMenu::FORMAT_PDF => false,
                    ExportMenu::FORMAT_HTML => false,
                    ExportMenu::FORMAT_CSV => false,
                ],
            ]); ?>
        </div>

        <div class="clearfix"></div>
    </div>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions' => function ($model, $key, $index, $grid) {
            return [
                'data-url' => Url::to(['view', 'id' => (string)$model->_id])
            ];
        },
        'hover' => true,
        'columns' => [
            [
                'attribute' => 'type',
                'value' => function ($model) {
                    /** @var Order $model */
                    return $model->getTypeLabel();
                },
                'filter' => Html::activeDropDownList($searchModel, 'type', Order::typesLabels(), [
                    'class' => 'form-control',
                    'prompt' => '',
                ]),
                'width' => '150px',
            ],
            [
                'attribute' => '_employees',
                'format' => 'raw',
                'value' => function ($model) {
                    /** @var Order $model */
                    return $this->render('_employees', ['model' => $model]);
                },
            ],
            [
                'attribute' => 'structure_department',
                'label' => \app\modules\structure\Module::t('department', 'MODEL_NAME'),
                'filter' => \app\modules\structure\widgets\DepartmentInputWidget::widget([
                    'model' => $searchModel,
                    'attribute' => 'structure_department',
                ]),
                'format' => 'raw',
                'value' => function ($model) {
                    /** @var Order $model */
                    $items = [];
                    foreach ($model->employees as $employee) {
                        $employee->companyCard->getStructureDepartment(true, true);
                        $items[(string)$employee->companyCard->_structure_department] = $employee->companyCard->getStructureDepartment(true, true);
                    }
                    if ($items > 0) {
                        return implode('<br>', $items);
                    }
                    return null;
                },
            ],
            'number',
            [
                'attribute' => 'date',
                'format' => 'date',
                'filter' => DateRangePicker::widget([
                    'attribute' => 'date_range',
                    'model' => $searchModel,
                    'presetDropdown' => true,
                    'pluginOptions' => [
                        'showDropdowns' => true,
                        'alwaysShowCalendars' => true,
                        'locale' => [
                            'format' => 'DD.MM.YYYY',
                        ],
                        'opens'=>'left',
                    ],
                ]),
                'width' => '200px',
            ],
            [
                'class' => ActionColumn::class,
                'width' => '150px',
            ],
        ],
    ]); ?>

    <?php Panel::end(); ?>

</div>
