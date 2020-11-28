<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use kartik\widgets\SwitchInput;
use kartik\select2\Select2;
use app\models\Computadora;
use kartik\date\DatePicker;
use kartik\form\ActiveField;
use kartik\form\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Red */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="red-form">

    <!-- Para habilitar validacion Ajax -->
    <?php $form = ActiveForm::begin([
                'enableAjaxValidation'=>true,
            ]
    ); ?>

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
        $form->field($model, 'fecha_red', [
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

    <!-- Campos de la base de datos -->
    <?= $form->field($model, 'fabricante')->textInput(['maxlength' => true]) ?>

    <!-- Campo que muestra una nota al pasar el mouse por arriba-->
    <?php
        echo $form->field($model, 'mac', [
                'hintType' => ActiveField::HINT_SPECIAL,
                'hintSettings' => [
                    'showIcon' => false,
                    'title' => '<i class="glyphicon glyphicon-info-sign"></i> Nota'
                ]
            ])->hint('Dirección MAC <b>está compuesta de la siguiente forma xx-xx-xx-xx-xx-xx</b> tenga en cuenta esto sino sera inválida la entrada.');
    ?>

    <!-- Campo boolean  -->
    <?= $form->field($model, 'autorizado')->widget(SwitchInput::classname(), ['type' => SwitchInput::CHECKBOX]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
