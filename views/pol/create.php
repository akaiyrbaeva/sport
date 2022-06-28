<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pol */

$this->title = 'Create Pol';
$this->params['breadcrumbs'][] = ['label' => 'Pols', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pol-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
