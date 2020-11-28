<?php
use yii\widgets\Pjax;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LocalSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
?>

<div class="local-index">
    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'pjax'=>true,
        'tableOptions' => ['class' => 'table  table-bordered table-hover'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'serialNumber',
            'cpuDetalles',
            'fabricante',

            #Para solamente dejar el icono de eliminar
            ['class' => 'yii\grid\ActionColumn','template' => '{delete}'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
