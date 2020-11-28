<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Computadora */

$this->title = $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Computadoras', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="computadora-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->idComputadora], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->idComputadora], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Esta seguro que desea eliminar este elemento ?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            'fecha',

            #Para poder setear el valor del atributo a boolean
            'autorizado:boolean',

            #Para mostrar datos de la relacion
            [
                'label' => 'Departamento',
                'value' => $model->getData($model->id_local)->departamento,
            ],

            #Para mostrar datos de la relación
            [
                'label' => 'Ubicación',
                'value' => $model->getData($model->id_local)->ubicacion,
            ],

            'numeroInventario',
            'numeroLicenciaSistOperativo',
            'nombre',
            'sistOperativo',

            #no se muestra este elemento (descomentar para mostrar)
            #'referecia',
            #'idComputadora',
            #'id_local',
        ],
    ]);
    ?>
</div>
