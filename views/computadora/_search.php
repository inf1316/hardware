<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ComputadoraSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="computadora-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idComputadora') ?>

    <?= $form->field($model, 'fecha') ?>

    <?= $form->field($model, 'autorizado') ?>

    <?= $form->field($model, 'referecia') ?>

    <?= $form->field($model, 'id_local') ?>

    <?php // echo $form->field($model, 'numeroInventario') ?>

    <?php // echo $form->field($model, 'numeroLicenciaSistOperativo') ?>

    <?php // echo $form->field($model, 'nombre') ?>

    <?php // echo $form->field($model, 'sistOperativo') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
