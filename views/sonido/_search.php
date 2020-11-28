<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SonidoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sonido-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idSonido') ?>

    <?= $form->field($model, 'fecha') ?>

    <?= $form->field($model, 'referencia') ?>

    <?= $form->field($model, 'autorizado') ?>

    <?= $form->field($model, 'fabricante') ?>

    <?php // echo $form->field($model, 'descripcion') ?>

    <?php // echo $form->field($model, 'identificadorSonido') ?>

    <?php // echo $form->field($model, 'idComputadora') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
