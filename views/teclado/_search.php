<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TecladoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="teclado-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idTeclado') ?>

    <?= $form->field($model, 'fecha') ?>

    <?= $form->field($model, 'referencia') ?>

    <?= $form->field($model, 'autorizado') ?>

    <?= $form->field($model, 'descripcion') ?>

    <?php // echo $form->field($model, 'identificadorTeclado') ?>

    <?php // echo $form->field($model, 'idComputadora') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
