<?php

use app\modules\hr\models\embedded\Contact;
use app\modules\hr\models\Employee;
use app\modules\hr\Module;
use app\themes\gentelella\widgets\Panel;
use app\widgets\ActionColumn;
use app\widgets\GridView;
use kartik\export\ExportMenu;
use kartik\file\FileInput;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\hr\models\EmployeeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Module::t('employee', 'MODEL_NAME_PLURAL');
$this->params['breadcrumbs'][] = 'Отдел кадров';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="hr-employee-index">

    <?php Panel::begin([
        'header' => $this->title,
    ]); ?>

    <div>
        <div class="pull-left">
            <?= Html::a(Module::t('employee', 'CREATE___LINK__LABEL'), ['create'], ['class' => 'btn btn-success']) ?>
        </div>

        <div class="pull-right">

            <?= ExportMenu::widget([
                'dataProvider' => $dataProvider,
                'columns' => call_user_func(function () {
                    /** @var Employee $model */
                    $columns = Employee::exportColumnsConfig();
                    foreach (Employee::getEmbeddedModelsConfig() as $attribute => $className) {
                        if (method_exists($className, 'exportColumnsConfig')) {
                            $columns = ArrayHelper::merge(
                                $columns,
                                $className::exportColumnsConfig($attribute)
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

        <div class="pull-right">
            <?= Html::beginForm(['import'], 'post', [
                'enctype' => 'multipart/form-data',
            ]) ?>

            <?= FileInput::widget([
                'id' => 'file-users',
                'name' => 'file',
                'pluginOptions' => [
                    'showPreview' => false,
                    'showCaption' => false,
                    'browseLabel' => 'Импорт',
                    'allowedFileExtensions' => ['xls', 'xlsx'],
                ],
            ]); ?>

            <?= Html::endForm() ?>
        </div>

        <div class="pull-right">

            <?php if (file_exists(Yii::getAlias('@root/modules/hr/data/example-employee.xlsx'))): ?>
                <?= Html::a('Скачать образец', ['download-example-employee'], ['class' => 'btn btn-primary']) ?>
            <?php endif; ?>

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
                'attribute' => 'full_name',
                'label' => $searchModel->getAttributeLabel('full_name'),
                //'filter' => false,
                'value' => function ($model) {
                    /** @var Employee $model */
                    return $model->getFullName(true);
                },
                'width' => '150px;',
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
                    /** @var Employee $model */
                    if ($model->companyCard) {
                        return $model->companyCard->getStructureDepartment(true, true);
                    }
                    return null;
                }
            ],
            [
                'attribute' => 'position',
                'label' => $searchModel->getAttributeLabel('position'),
                //'filter' => false,
                'value' => function ($model) {
                    /** @var Employee $model */
                    return $model->position;
                }
            ],
            [
                'attribute' => 'contacts',
                'label' => $searchModel->getAttributeLabel('contacts'),
                //'filter' => false,
                'format' => 'raw',
                'value' => function ($model) {
                    /** @var Employee $model */
                    return \yii\widgets\Menu::widget([
                        'items' => array_map(function ($contact) {
                            /** @var Contact $contact */
                            return [
                                'label' => implode(': ', [
                                    $contact->getType(),
                                    $contact->value,
                                ]),
                            ];
                        }, $model->getMainContacts()),
                    ]);
                }
            ],

            [
                'attribute' => 'employee_id',
                'label' => $searchModel->getAttributeLabel('employee_id'),
                //'filter' => false,
                'value' => function ($model) {
                    /** @var Employee $model */
                    if ($model->companyCard) {
                        return $model->companyCard->employee_id;
                    }
                    return null;
                }
            ],

            [
                'class' => ActionColumn::className(),
                'width' => '150px;',
            ],
        ],
    ]); ?>
    <?php Panel::end(); ?>
</div>
