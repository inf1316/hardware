<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Mouse */

$this->title = $model->tipoMouse;
$this->params['breadcrumbs'][] = ['label' => 'Mouse', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mouse-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->idMouse], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Eliminar', ['delete', 'id' => $model->idMouse], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Esta seguro que desea eliminar este elemento?',
                    'method' => 'post',
                ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'fecha_mouse',

            #Para mostrar datos de la relacion
            [
                'label' => 'Computadora',
                'value' =>  $model->getData($model->idComputadora)->nombre,
            ],

            'autorizado:boolean',
            'tipoMouse',
            'identificadorMouse',
            'fabricante',

            //'idComputadora',
            //'referencia',
            //'idMouse',
        ],
    ]) ?>

</div>
