<?php

use app\models\Teclado;
use kartik\date\DatePicker;
use kartik\grid\GridView;
use kartik\widgets\Growl;
use yii\helpers\Html;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TecladoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Teclados';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="teclado-index">

    <h1><?php #echo Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php #echo Html::a('<i class="glyphicon glyphicon-plus"></i> Crear Teclado', ['create'], ['class' => 'btn btn-success']) ?>
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

    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'filterRowOptions' => ['class' => 'kartik-sheet-style'],
        'tableOptions' => ['class' => 'table  table-bordered table-hover'],
        'containerOptions' => ['style' => 'overflow: auto'],
        'condensed' => 'true',
        'id' => 'teclado',
        'pjax' => true,
        'pjaxSettings' => [
            'neverTimeout' => true,
            'options' => [
                'id' => 'w0',
            ]
        ],
        'panel' => [
            'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-th-list"></i> Teclados</h3>',
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
                        'title' => 'Agregar Teclado'
                    ]) . ' ' .
                    Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['index'], [
                        'class' => 'btn btn-default',
                        'title' => 'Reset Grid'
                    ]),
            ],
            #Menú para exportar los elemento a uno de los formatos provistos
            '{export}',
            '{toggleData}',
        ],
        'rowOptions' => function ($model) {
            $sql = 'select * from teclado where referencia =:referencia';
            if (count(Teclado::findBySql($sql, [':referencia' => $model->idTeclado])->all()) > 0) {
                return ['class' => GridView::TYPE_DANGER];
            } else {
                list($dia, $mes, $año) = split('[/.-]', $model->fecha_teclado);
                $actual = new DateTime(date('Y/m/d'));
                $real = new DateTime($año . '/' . $mes . '/' . $dia);
                $intervalo = date_diff($actual, $real);
                if ((int)$intervalo->format('%m') >= 1) {
                    return ['class' => GridView::TYPE_WARNING];
                }
            }
        },

        #ExpandRowColumn
        'columns' => [
            [
                'class' => '\kartik\grid\ExpandRowColumn',
                'value' => function ($model, $key, $index, $column) {
                    return GridView::ROW_COLLAPSED;
                },

                'detail' => function ($model, $key, $index, $column) {
                    $searchModel = new \app\models\_TecladoSearch();
                    $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $model->idTeclado);

                    return Yii::$app->controller->renderPartial('_index', ['searchModel' => $searchModel,
                        'dataProvider' => $dataProvider,
                    ]);
                },
            ],

            #Para mostrar una columna de numeros consecutivos
            ['class' => 'kartik\grid\SerialColumn'],

            #Para mostrar una columna de CheckboxColumn consecutivas
            [
                'class' => '\kartik\grid\CheckboxColumn',
                'pageSummary' => true,
                'rowSelectedClass' => GridView::TYPE_INFO,
                'contentOptions' => ['style' => 'width: 0.5%'],
            ],

            #dato de la tabla Computadora
            [
                'attribute' => 'idComputadora',
                'value' => 'idComputadora0.nombre'
            ],
            'descripcion',
            'identificadorTeclado',

            #'fecha',
            [
                'attribute' => 'fecha_teclado',
                'value' => 'fecha_teclado',
                'format' => 'raw',

                'filter' => DatePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'fecha_teclado',
                    'pluginOptions' => [
                        'autoclose' => true,
                        'format' => 'dd/mm/yyyy',
                        'todayHighlight' => TRUE,
                    ],
                ])
            ],

            //'identificadorTeclado',
            //'idTeclado',
            //'idComputadora',
            //'referencia',

            [
                'class' => 'yii\grid\ActionColumn',
                'headerOptions' => ['width' => '67'],
                'template' => '{view} {update} {delete}',
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>

    <!--Script que permite eliminar vía Ajax -->
    <?php
    $js = "$('#deleteSelected').on('click', function () {
                pks = $('#teclado').yiiGridView('getSelectedRows');
                if (pks.length != 0) {
                    if (window.confirm('¿Está seguro que desea eliminar estos elementos' + ' ' + pks.length + '?')) {
                        $.post('remove', {
                            pk: pks
                        }, function (data) {
                               $.pjax.reload({container:'#w0'});
                        });
                    }
                }
            });";
    $this->registerJs($js);
    ?>
</div>
