<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Mouse */

$this->title = 'Actualizar Mouse: ' . $model->tipoMouse;
$this->params['breadcrumbs'][] = ['label' => 'Mouse', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->tipoMouse, 'url' => ['view', 'id' => $model->idMouse]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="mouse-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
