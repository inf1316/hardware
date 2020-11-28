<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Memoria */

$this->title = 'Actualizar Memoria: ' . $model->numeroSerie;
$this->params['breadcrumbs'][] = ['label' => 'Memorias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->numeroSerie, 'url' => ['view', 'id' => $model->idmemoria]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="memoria-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
