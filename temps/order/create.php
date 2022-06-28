<?php

use app\modules\hr\models\Order;
use app\modules\hr\Module;
use app\themes\gentelella\widgets\Panel;
use yii\web\View;

/* @var $this View */
/* @var $model Order */

$this->title = Module::t('order', 'CREATE__PAGE__TITLE') . ' - ' . $model->getTypeLabel();
$this->params['breadcrumbs'][] = 'Отдел кадров';
$this->params['breadcrumbs'][] = ['label' => Module::t('order', 'MODEL_NAME_PLURAL'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?php Panel::begin([
    'header' => $this->title,
]); ?>

<?= $this->render('_form', [
    'model' => $model,
]) ?>

<?php Panel::end(); ?>
