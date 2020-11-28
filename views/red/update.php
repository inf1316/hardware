<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Red */

$this->title = 'Actualizar Red: ' . $model->idTarjeta;
$this->params['breadcrumbs'][] = ['label' => 'Redes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idTarjeta, 'url' => ['view', 'id' => $model->idTarjeta]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="red-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
