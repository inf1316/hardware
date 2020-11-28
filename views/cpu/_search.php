<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CpuSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cpu-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idCpu') ?>

    <?= $form->field($model, 'fecha') ?>

    <?= $form->field($model, 'referencia') ?>

    <?= $form->field($model, 'autorizado')->checkbox() ?>

    <?= $form->field($model, 'fabricante') ?>

    <?php // echo $form->field($model, 'idComputadora') ?>

    <?php // echo $form->field($model, 'cpuDetalles') ?>

    <?php // echo $form->field($model, 'serialNumber') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
