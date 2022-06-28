<?php

use app\modules\hr\models\Employee;
use app\modules\hr\Module;
use app\themes\gentelella\widgets\Panel;
use yii\web\View;

/* @var $this View */
/* @var $model Employee */

$this->title = Module::t('employee', 'CREATE__PAGE__TITLE');
$this->params['breadcrumbs'][] = 'Отдел кадров';
$this->params['breadcrumbs'][] = ['label' => Module::t('employee', 'MODEL_NAME_PLURAL'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?php Panel::begin([
    'header' => $this->title,
]); ?>

<?= $this->render('_form', [
    'model' => $model,
]) ?>

<?php Panel::end(); ?>
