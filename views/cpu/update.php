<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Cpu */

$this->title = 'Actualizar Cpu: ' . $model->fabricante;
$this->params['breadcrumbs'][] = ['label' => 'Cpu', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->fabricante, 'url' => ['view', 'id' => $model->idCpu]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="cpu-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
