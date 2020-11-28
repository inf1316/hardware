<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MouseSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mouse-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idMouse') ?>

    <?= $form->field($model, 'fecha') ?>

    <?= $form->field($model, 'referencia') ?>

    <?= $form->field($model, 'autorizado') ?>

    <?= $form->field($model, 'tipoMouse') ?>

    <?php // echo $form->field($model, 'identificadorMouse') ?>

    <?php // echo $form->field($model, 'fabricante') ?>

    <?php // echo $form->field($model, 'idComputadora') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
