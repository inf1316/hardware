<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Sonido */

$this->title = $model->fabricante;
$this->params['breadcrumbs'][] = ['label' => 'Sonidos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sonido-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idSonido], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idSonido], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Esta seguro qeu desea elminar este item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'fecha_sonido',

            #Para mostrar datos de la relacion
            [
                'label' => 'Computadora',
                'value' =>  $model->getData($model->idComputadora)->nombre,
            ],

            'autorizado:boolean',
            'fabricante',
            'descripcion',
            'identificadorSonido',
            #'idComputadora',
            #'idSonido',
            #'referencia',
        ],
    ]) ?>

</div>
