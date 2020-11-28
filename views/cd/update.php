<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Cd */

$this->title = 'Actualizar Cd: ' . $model->fabricante;
$this->params['breadcrumbs'][] = ['label' => 'Cd', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->fabricante, 'url' => ['view', 'id' => $model->idCD]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="cd-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
