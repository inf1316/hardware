<?php
use app\models\Computadora;
use kartik\date\DatePicker;
use kartik\grid\GridView;
use kartik\widgets\Growl;
use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\widgets\Menu;


/* @var $this yii\web\View */
/* @var $searchModel app\models\ComputadoraSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Computadoras';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="computadora-index">

    <h1><?php #echo Html::encode($this->title) ?></h1>
    <?php #echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php # echo  Html::a('<i class="glyphicon glyphicon-plus"></i> Crear Computadora', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <!-- Para lanzar una ventana de notificacion cuando se elimina un elemento -->
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

    <?php Pjax::begin(['id' => 'pjax-container', 'clientOptions' => ['method' => 'POST']]); ?>
    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'condensed' => 'true',
        'pjax' => true,
        'striped'=>true,
        'responsive' => true,
        'bootstrap' => true,
        'responsiveWrap' => true,
        'id' => 'computadora',
        'pjaxSettings' => [
            'neverTimeout' => true,
            'loadingCssClass' => 'kv-grid-loading',
            'options' => [
                'id' => 'w0',
            ],
        ],
        'containerOptions' => ['style' => 'overflow: auto'],
        'filterRowOptions' => ['class' => 'kartik-sheet-style'],
        'tableOptions' => ['class' => 'table  table-bordered table-hover'],
        'panel' => [
            'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-th-list"></i> Computadoras</h3>',
            'type' => GridView:: TYPE_PRIMARY,
            'after' => '<div class="pull-right"><button type="button" class="btn btn-danger" id="deleteSelected"><i class="glyphicon glyphicon-trash"></i> Delete Selected</button></div><div style="padding-top: 28px;"><em></em></div>',
            'footer' => $dataProvider->totalCount > 7 ? '' : false
        ],
        'toolbar' => [
            [
                'content' =>
                    Html::a('<i class="glyphicon glyphicon-plus"></i>', ['create'], [
                        'class' => 'btn btn-success',
                        'data-pjax' => 0,
                        'title' => 'Agregar Computadora'
                    ]) . ' ' .

                    Html::button('<i class="glyphicon glyphicon-download-alt"></i>', [
                        'class' => 'btn btn-default',
                        'id' => 'download',
                        'title' => 'Descargar Elementos seleccionados'
                    ]) . ' ' .

                    Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['index'], [
                        'class' => 'btn btn-default',
                        'title' => 'Refrescar Grid',
                        'data-pjax' => 1,
                    ]),
            ],
            #Menú para exportar los elemento a uno de los formatos provistos
            '{export}',
            '{toggleData}',
        ],

        #Por si hay algun cambio en el elemento
        'rowOptions' => function ($model) {
            $sql = 'select * from computadora where referecia =:referecia';
            if (count(Computadora::findBySql($sql, [':referecia' => $model->idComputadora])->all()) > 0) {
                return ['class' => GridView::TYPE_DANGER];
            } else {
                #para saber si la diferencia de fechas es mayor e igual a 1 mes en caso de que se cumpla
                #se dibujara warning.
                list($dia, $mes, $año) = split('[/.-]', $model->fecha);
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
                    $searchModel = new \app\models\_ComputadoraSearch();
                    $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $model->idComputadora);

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

            'nombre',
            'sistOperativo',

            #'id_local',
            #para acceder a un campo que no esta en esta modelo
            # hay que tener los rules a safe en ambas search y models
            [
                'attribute' => 'id_local',
                'value' => 'idLocal.departamento',
            ],

            #numeroInventario
            [
                'attribute' => 'numeroInventario',
                'label' => 'Ubicación',
                'value' => 'idLocal.ubicacion',
            ],

            #'fecha',
            [
                'attribute' => 'fecha',
                'value' => 'fecha',
                'format' => 'raw',

                'filter' => DatePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'fecha',
                    'pluginOptions' => [
                        'autoclose' => true,
                        'format' => 'dd/mm/yyyy',
                        'todayHighlight' => TRUE,
                    ],
                ])
            ],

            //'autorizado',
            //'referecia',
            //'idComputadora',
            //'numeroInventario',
            //'numeroLicenciaSistOperativo',

            [
                'class' => 'yii\grid\ActionColumn',
                'headerOptions' => ['width' => '67'],
                'buttons' => [
                    'delete' => function($url){
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>','delete',[
                            'title' => 'Eliminar',
                            'aria-label' => 'Eliminar',
                            'onclick' => "
                                if (confirm('¿Está seguro que desea eliminar este elemento?')) {
                                    $.ajax('$url', {
                                        type: 'POST'
                                    }).done(function(data) {
                                        $.pjax.reload({container:'#w0'});
                                    });
                                }
                            ",
                        ]);
                    }
                ],
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>

    <!--Script que permite eliminar vía Ajax -->
    <?php
        $js = "$('#deleteSelected').on('click', function () {
                    pks = $('#computadora').yiiGridView('getSelectedRows');
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

    <!-- Script que permite cambiar el color de la fila cuando se presiona el checkbox -->
    <?php
        $js = "$('tr').on('click', function () {
                var chk = $(this).find('input:checkbox');
                if (chk[0].checked) {
                    // console.log($(this).removeClass('danger warning'));
                }
            });";
        $this->registerJs($js);
    ?>
</div>
