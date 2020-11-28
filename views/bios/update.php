<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Bios */

$this->title = 'Actualizar Bios: ' . $model->fabricante;
$this->params['breadcrumbs'][] = ['label' => 'Bios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->fabricante, 'url' => ['view', 'id' => $model->idBios]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="bios-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
