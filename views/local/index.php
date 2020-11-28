<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use kartik\grid\GridView;
use kartik\widgets\Growl;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LocalSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Locales';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="local-index">

    <h1><?php //echo Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php #echo Html::a('<i class="glyphicon glyphicon-plus"></i> Crear Local', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <!-- Para lanzar una ventana de notificación cunado se elimina un elemento -->
    <?php
    $a = Yii::$app->session->getFlash('success');
    if (isset($a)) {
        echo Growl::widget([
            'type' => Growl::TYPE_SUCCESS,
            'icon' => 'glyphicon glyphicon-ok-sign',
            'title' => '',
            'showSeparator' => true,
            'body' => Yii::$app->session->getFlash('success'),
        ]);
    }
    ?>

    <?php Pjax::begin(['id' => 'pjax-container']); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'id' => 'local',
        'bootstrap' => true,
        'condensed' => 'true',
        'tableOptions' => ['class' => 'table  table-bordered table-hover'],
        'filterRowOptions' => ['class' => 'kartik-sheet-style'],
        'containerOptions' => ['style' => 'overflow: auto'],
        'pjax' => true,
        'pjaxSettings' => [
            'neverTimeout' => true,
            'options' => [
                'id' => 'w0',
            ]
        ],
        'panel' => [
            'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-th-list"></i> Locales</h3>',
            'type' => GridView:: TYPE_PRIMARY,
            'after' => '<div class="pull-right"><button type="button" class="btn btn-danger" id="deleteSelected"><i class="glyphicon glyphicon-trash"></i> Deleted Selected</button></div><div style="padding-top: 28px;"><em></em></div>',
            'footer' => $dataProvider->totalCount > 7 ? '' : false
        ],
        #Menú para crear un elemeto al igual que exportarlo
        'toolbar' => [
            [
                'content' =>
                    Html::a('<i class="glyphicon glyphicon-plus"></i>', ['create'], [
                        'class' => 'btn btn-success',
                        'data-pjax' => 0,
                        'title' => 'Agregar Local'
                    ]) . ' ' .

                    Html::button('<i class="glyphicon glyphicon-download-alt"></i>', [
                        'class' => 'btn btn-default',
                        'id' => 'download',
                        'title' => 'Descargar Elementos seleccionados'
                    ]) . ' ' .

                    Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['index'], [
                        'class' => 'btn btn-default',
                        'title' => 'Reset Grid'
                    ])
            ],
            #Menú para exportar los elemento a uno de los formatos previstos
            '{export}',
            '{toggleData}',
        ],
        'columns' => [
            #Para mostar una columna de numeros consecutivos
            ['class' => 'yii\grid\SerialColumn'],

            #Para mostrar una columna de CheckboxColumn consecutivas
            [
                'class' => '\kartik\grid\CheckboxColumn',
                'pageSummary' => true,
                'rowSelectedClass' => GridView::TYPE_INFO,
                'contentOptions' => ['style' => 'width: 0.5%'],
            ],

            'departamento',
            'ubicacion',
            #'id_local', descomentar y saldra el id de local

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>

    <!--Script que permite eliminar vía Ajax -->
    <?php
    $js = "$('#deleteSelected').on('click', function () {
              var keys = $('#local').yiiGridView('getSelectedRows');
                if (keys.length != 0) {
                    if (window.confirm('¿Está seguro que desea eliminar estos elementos' + ' ' + keys.length + '?')) {
                        $.post('remove', {
                            pk: keys
                        }, function (data) {
                               $.pjax.reload({container:'#w0'});
                        });
                    }
                }
            });";
    $this->registerJs($js);
    ?>
</div>
