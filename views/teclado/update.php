<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Teclado */

$this->title = 'Actualizar Teclado: ' . $model->descripcion;
$this->params['breadcrumbs'][] = ['label' => 'Teclados', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->descripcion, 'url' => ['view', 'id' => $model->idTeclado]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="teclado-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
