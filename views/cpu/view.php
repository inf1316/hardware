<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Cpu */

$this->title = $model->fabricante;
$this->params['breadcrumbs'][] = ['label' => 'Cpu', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cpu-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->idCpu], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->idCpu], [
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
            'fecha_cpu',
            #Para mostrar datos de la relacion
            [
                'label' => 'Computadora',
                'value' =>  $model->getData($model->idComputadora)->nombre,
            ],
            'fabricante',
            'cpuDetalles',
            'serialNumber',
            'autorizado:boolean',
            #'referencia',
            #'idCpu',
            #'idComputadora',
        ],
    ]) ?>

</div>
