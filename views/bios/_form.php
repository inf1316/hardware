<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use kartik\widgets\SwitchInput;
use yii\helpers\ArrayHelper;
use app\models\Computadora;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Bios */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bios-form">

    <!-- Habilitar validacion Ajax -->
    <?php
        $form = ActiveForm::begin([
                'enableAjaxValidation' =>true ,
            ]
        );
    ?>

    <!-- Lista Desplegable -->
    <?=
        $form->field($model, 'idComputadora')->widget(Select2::className(),[
            'data'=>ArrayHelper::map(Computadora::find()->where('referecia isnull')->orderBy('nombre')->all(),'idComputadora','nombre'),
            'language' => 'es',
            'options' => ['placeholder' => 'Selecione la Computadora'],
            'pluginOptions' => [
                'allowClear' => true,
            ],
        ]);
    ?>

    <!-- Campo fecha -->
    <?=
        $form->field($model, 'fecha_bios', [
                    ])->widget(DatePicker::classname(),[
                        'options' => ['placeholder' => ''],
                        'value' => date('D-M-Y'),
                        'type' => DatePicker::TYPE_COMPONENT_APPEND,

                        'pluginOptions' => [
                            'autoclose'=>true,
                            'format' => 'dd/mm/yyyy',
                            'todayHighlight' => true,
                        ]
                ]);
    ?>

    <!-- Campos de la base de datos  -->
    <?= $form->field($model, 'fabricante')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'numeroSerie')->textInput(['maxlength' => true]) ?>

    <!-- Campo boolean  -->
    <?= $form->field($model, 'autorizado')->widget(SwitchInput::classname(), ['type' => SwitchInput::CHECKBOX]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
