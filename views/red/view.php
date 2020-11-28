<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Red */

$this->title = $model->fabricante;
$this->params['breadcrumbs'][] = ['label' => 'Red', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="red-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->idTarjeta], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->idTarjeta], [
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
            'fecha_red',

            #Para mostrar datos de la relacion
            [
                'label' => 'Computadora',
                'value' =>  $model->getData($model->idComputadora)->nombre,
            ],

            'autorizado:boolean',
            'fabricante',
            'mac',

            #'referencia',
            #'idTarjeta',
            #'idComputadora',
        ],
    ]) ?>

</div>
