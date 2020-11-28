<?php
use kartik\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CpuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
<div class="cpu-index">

    <?php Pjax::begin(); ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'pjax'=>true,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'tipoMonitor',
                'fabricante',
                'identificadorMonitor',

                #Para solamente dejar el icono de eliminar
                ['class' => 'yii\grid\ActionColumn','template' => '{delete}'],
            ],
        ]); ?>
    <?php Pjax::end(); ?></div>
