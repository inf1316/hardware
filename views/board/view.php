<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Board */

$this->title = $model->fabricante;
$this->params['breadcrumbs'][] = ['label' => 'Board', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="board-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actulizar', ['update', 'id' => $model->idBoard], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->idBoard], [
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
            'fecha_board',

            #Para mostrar datos de la relacion
            [
                'label' => 'Computadora',
                'value' =>  $model->getData($model->idComputadora)->nombre,
            ],

            'autorizado:boolean',
            'numeroSerie',
            'fabricante',
            // 'referencia',
            // 'idBoard',
            // 'idComputadora',
        ],
    ]) ?>

</div>
