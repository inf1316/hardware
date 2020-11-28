<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Memoria */

$this->title = $model->numeroSerie;
$this->params['breadcrumbs'][] = ['label' => 'Memorias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="memoria-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->idmemoria], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->idmemoria], [
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
            'fecha_memoria',

            #Para mostrar datos de la relacion
            [
                'label' => 'Computadora',
                'value' =>  $model->getData($model->idComputadora)->nombre,
            ],

            'autorizado:boolean',
            'memoryRam',
            'slots',
            'numeroSerie',

            #'referencia',
            #'idmemoria',
            #'idComputadora',
        ],
    ]) ?>

</div>
