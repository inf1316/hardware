<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use app\models\Local;
use kartik\date\DatePicker;
use kartik\widgets\SwitchInput;
use kartik\daterange\DateRangePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Computadora */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="computadora-form">

    <?php
        $form = ActiveForm::begin([
                'enableAjaxValidation' => true,
            ]
        );
    ?>

    <!-- Lista Desplegable -->
    <?=
        $form->field($model, 'id_local')->widget(Select2::className(), [
            'data' => ArrayHelper::map(Local::find()->where('character_length(ubicacion)!=0 and character_length(departamento)!=0')->orderBy('departamento')->all(), 'id_local', 'departamento'),
            'language' => 'es',
            'options' => ['placeholder' => 'Selecione el Departamento'],
            'pluginOptions' => [
                'allowClear' => true,
            ],
        ]);
    ?>

    <?=
        $form->field($model, 'fecha', [
        ])->widget(DateRangePicker::classname(), [
            'model' => $model,
            'attribute' => 'fecha',
            'convertFormat' => true,
            'startInputOptions' => ['value' => '2017-06-09'],
            'endInputOptions' => ['value' => '2017-06-09'],
            'pluginOptions' => [
                // 'single'=>true,
                // 'timePickerIncrement'=>30,
                'locale' => [
                    'format' => 'd-m-Y'
                ]
            ]
        ]);
    ?>


    <!-- Campos de la base de datos  -->
    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'numeroLicenciaSistOperativo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sistOperativo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'numeroInventario')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'autorizado')->widget(SwitchInput::classname(), ['type' => SwitchInput::CHECKBOX]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
<?php


