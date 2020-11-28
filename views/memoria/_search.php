<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MemoriaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="memoria-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idmemoria') ?>

    <?= $form->field($model, 'fecha') ?>

    <?= $form->field($model, 'referencia') ?>

    <?= $form->field($model, 'autorizado') ?>

    <?= $form->field($model, 'idComputadora') ?>

    <?php // echo $form->field($model, 'memoryRam') ?>

    <?php // echo $form->field($model, 'slots') ?>

    <?php // echo $form->field($model, 'numeroSerie') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
