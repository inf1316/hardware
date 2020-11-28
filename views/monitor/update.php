<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Monitor */

$this->title = 'Actualizar Monitor: ' . $model->tipoMonitor;
$this->params['breadcrumbs'][] = ['label' => 'Monitor', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->tipoMonitor, 'url' => ['view', 'id' => $model->idMonitor]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="monitor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
