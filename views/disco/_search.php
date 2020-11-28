<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DiscoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="disco-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'iddisco') ?>

    <?= $form->field($model, 'fecha') ?>

    <?= $form->field($model, 'idComputadora') ?>

    <?= $form->field($model, 'numeroSerie') ?>

    <?= $form->field($model, 'fabricante') ?>

    <?php // echo $form->field($model, 'referencia') ?>

    <?php // echo $form->field($model, 'autorizado') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
