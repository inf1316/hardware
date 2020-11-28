<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Disco */

$this->title = $model->fabricante;
$this->params['breadcrumbs'][] = ['label' => 'Discos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="disco-view">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->iddisco], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->iddisco], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Esta seguro que desea elminar este elmento?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                    'fecha_disco',

                    #Para mostrar datos de la relacion
                    [
                        'label' => 'Computadora',
                        'value' =>  $model->getData($model->idComputadora)->nombre,
                    ],

                    'numeroSerie',
                    'fabricante',

                    'autorizado:boolean',
                    #'iddisco',
                    #'referencia',
                    #'idComputadora',
            ],
    ]) ?>

</div>
