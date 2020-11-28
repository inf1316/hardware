<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Monitor */

$this->title = $model->tipoMonitor;
$this->params['breadcrumbs'][] = ['label' => 'Monitor', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="monitor-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->idMonitor], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->idMonitor], [
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

            #Para mostrar datos de la relacion
            [
                'label' => 'Computadora',
                'value' =>  $model->getData($model->idComputadora)->nombre,
            ],

            'fecha_monitor',
            'autorizado:boolean',

            'fabricante',
            'identificadorMonitor',
            'tipoMonitor',

            #Campo que no se muestran en el DetailView
            #'idMonitor',
            #'idComputadora',
        ],
    ]) ?>

</div>
