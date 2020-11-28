<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Teclado */

$this->title = $model->descripcion;
$this->params['breadcrumbs'][] = ['label' => 'Teclados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="teclado-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->idTeclado], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->idTeclado], [
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
            'fecha_teclado',

            #Para mostrar datos de la relacion
            [
                'label' => 'Computadora',
                'value' => $model->getData($model->idComputadora)->nombre,
            ],

            'autorizado:boolean',
            'descripcion',
            'identificadorTeclado',
            #'idTeclado',
            #'idComputadora',
            #'referencia',
        ],
    ]) ?>

</div>
