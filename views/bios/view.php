<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Bios */

$this->title = $model->fabricante;
$this->params['breadcrumbs'][] = ['label' => 'Bios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bios-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->idBios], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->idBios], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Esta seguro que desea eliminar este elmento?',
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

            'fecha_bios',
            'autorizado:boolean',
            'fabricante',
            'numeroSerie',

            #'referencia',
            #'idComputadora',
            #'idBios',
        ],
    ]) ?>

</div>
