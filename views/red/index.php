<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use kartik\grid\GridView;
use app\models\Red;
use kartik\date\DatePicker;
use kartik\widgets\Growl;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RedSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Redes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="red-index">

    <h1><?php #echo Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php #echo Html::a('<i class="glyphicon glyphicon-plus"></i> Crear Red', ['create'], ['class' => 'btn btn-success']) ?>
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
        'id' => 'red',
        'pjax' => true,
        'pjaxSettings' => [
            'neverTimeout' => true,
            'options' => [
                'id' => 'w0',
            ]
        ],
        'panel' => [
            'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-th-list"></i> Tarjetas de Redes</h3>',
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
                        'title' => 'Agregar Red'
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
            $sql = 'select * from red where referencia =:referencia';
            if (count(Red::findBySql($sql, [':referencia' => $model->idTarjeta])->all()) > 0) {
                return ['class' => GridView::TYPE_DANGER];
            } else {
                list($dia, $mes, $año) = split('[/.-]', $model->fecha_red);
                $actual = new DateTime(date('Y/m/d'));
                $real = new DateTime($año . '/' . $mes . '/' . $dia);

                $intervalo = date_diff($actual, $real);
                if ((int)$intervalo->format('%m') >= 3) {
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
                    $searchModel = new \app\models\_RedSearch();
                    $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $model->idTarjeta);

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

            'fabricante',
            'mac',

            #'fecha',
            [
                'attribute' => 'fecha_red',
                'value' => 'fecha_red',
                'format' => 'raw',

                'filter' => DatePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'fecha_red',
                    'pluginOptions' => [
                        'autoclose' => true,
                        'format' => 'dd/mm/yyyy',
                        'todayHighlight' => TRUE,
                    ],
                ])
            ],

            //'mac',
            //'idTarjeta',
            //'referencia',
            //'autorizado',

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
                pks = $('#red').yiiGridView('getSelectedRows');
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
