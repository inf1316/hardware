<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Board */

$this->title = 'Actualizar Board: ' . $model->fabricante;
$this->params['breadcrumbs'][] = ['label' => 'Boards', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->fabricante, 'url' => ['view', 'id' => $model->idBoard]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="board-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
