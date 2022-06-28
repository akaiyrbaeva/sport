<?php

use app\modules\hr\models\Order;
use app\modules\hr\Module;
use app\themes\gentelella\widgets\Panel;
use yii\web\View;

/* @var $this View */
/* @var $model Order */

$this->title = Module::t('order', 'UPDATE__PAGE__TITLE');
$this->params['breadcrumbs'][] = 'Отдел кадров';
$this->params['breadcrumbs'][] = ['label' => Module::t('order', 'MODEL_NAME_PLURAL'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->getTitle(), 'url' => $model->getViewRoute()];
$this->params['breadcrumbs'][] = $this->title;
?>
<?php Panel::begin([
    'header' => $this->title,
]); ?>

<?= $this->render('_form', [
    'model' => $model,
]) ?>

<?php Panel::end(); ?>
