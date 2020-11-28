<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Computadora */

$this->title = 'Actualizar Computadora: ' . $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Computadoras', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nombre, 'url' => ['view', 'id' => $model->idComputadora]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="computadora-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
