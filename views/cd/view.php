<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Cd */

$this->title = $model->fabricante;
$this->params['breadcrumbs'][] = ['label' => 'CD', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cd-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->idCD], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->idCD], [
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
            'fecha_cd',

            #Para mostrar datos de la relacion
            [
                'label' => 'Computadora',
                'value' =>  $model->getData($model->idComputadora)->nombre,
            ],

            'fabricante',
            'numeroSerie',
            #'idComputadora',
            #'idCD',
            #'referencia',
            #'autorizado',
        ],
    ]) ?>

</div>
