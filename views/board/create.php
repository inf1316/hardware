<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Board */

$this->title = 'Crear Board';
$this->params['breadcrumbs'][] = ['label' => 'Board', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="board-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
