<?php
use yii\helpers\Url;
use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\widgets\Pjax;
use kartik\widgets\Growl;
use app\controllers\SiteController;

/* @var $this yii\web\View */
$this->title = 'Hardware/Registrer';
?>
<div class="site-index">

    <!-- Ventana modal que se muestra en el About Hardware/Registrer -->
    <center>
        <h1>Hardware/Registrer...</h1>

        <p class="lead">Departamento de Administración de Redes: Universidad de Ciencias Médicas de Cienfuegos</p>
        <?php echo Html::button('About Hardware/Registrer', ['value' => Url::to(['site/about']), 'class' => 'btn btn-lg btn-success', 'id' => 'modalButton']) ?>
        <?php
        Modal::begin([
            'header' => '<h4>About Hardware/Registrer</h4>',
            'id' => 'modal',
            'size' => 'modal-lg',
        ]);
        echo '<div id="modalContent"></div>';
        Modal::end();
        ?>
    </center>
    <br> <br>
    <!--fin de la ventana modal -->

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Inventario Computadora</h2>

                <p>Aquí podrá Insertar, Eliminar y Actualizar los datos de: Inventario Computadora :</p>

                <p><a class="btn btn-default" href='<?php echo Url::to(['computadora/index']) ?>'>Inventario
                        Computadora &raquo;</a></p>
            </div>

            <div class="col-lg-4">
                <h2>Inventario Monitor</h2>

                <p>Aquí podrá Insertar, Eliminar y Actualizar los datos de: Inventario Monitor :</p>

                <p><a class="btn btn-default" href='<?php echo Url::to(['monitor/index']) ?>'>Inventario
                        Monitor &raquo;</a></p>
            </div>

            <div class="col-lg-4">
                <h2>Inventario Disco</h2>

                <p>Aquí podrá Insertar, Eliminar y Actualizar los datos de: Inventario Disco :</p>

                <p><a class="btn btn-default" href='<?php echo Url::to(['disco/index']) ?>'>Inventario Disco &raquo;</a>
                </p>
            </div>

            <div class="col-lg-4">
                <h2>Inventario CD</h2>

                <p>Aquí podrá Insertar, Eliminar y Actualizar los datos de: Inventario CD :</p>

                <p><a class="btn btn-default" href='<?php echo Url::to(['cd/index']) ?>'>Inventario CD &raquo;</a></p>
            </div>

            <div class="col-lg-4">
                <h2>Inventario Bios</h2>

                <p>Aquí podrá Insertar, Eliminar y Actualizar los datos de: Inventario Bios :</p>

                <p><a class="btn btn-default" href='<?php echo Url::to(['bios/index']) ?>'>Inventario Bios &raquo;</a>
                </p>
            </div>

            <div class="col-lg-4">
                <h2>Inventario Red</h2>

                <p>Aquí podrá Insertar, Eliminar y Actualizar los datos de: Inventario Red :</p>

                <p><a class="btn btn-default" href='<?php echo Url::to(['red/index']) ?>'>Inventario Red &raquo;</a></p>
            </div>

            <div class="col-lg-4">
                <h2>Local</h2>

                <p>Aquí podrá Insertar, Eliminar y Actualizar los datos de: Local :</p>

                <p><a class="btn btn-default" href='<?php echo Url::to(['local/index']) ?>'>Inventario Local &raquo;</a>
                </p>
            </div>

            <div class="col-lg-4">
                <h2>Inventario Board,Memoria, Cpu</h2>

                <p>Aquí podrá Insertar, Eliminar y Actualizar los datos de: Inventario Board, Memoria ,Cpu :</p>

                <div class="btn-group">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        Inventario Board ,Memoria, Cpu &raquo; <span class="caret"></span>
                    </button>

                    <ul class="dropdown-menu" role="menu">
                        <li><a href='<?php echo Url::to(['memoria/index']) ?>'>Inventario Memoria </a></li>
                        <li><a href='<?php echo Url::to(['board/index']) ?>'>Inventario Board </a></li>
                        <li><a href='<?php echo Url::to(['cpu/index']) ?>'>Inventario Cpu </a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-4">
                <h2>Inventario Teclado,Sonido, Mouse</h2>

                <p>Aquí podrá Insertar, Eliminar y Actualizar los datos de: Inventario Teclado, Sonido, Mouse :</p>

                <div class="btn-group">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        Inventario Teclado,Sonido, Mouse &raquo; <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href='<?php echo Url::to(['teclado/index']) ?>'>Inventario Teclado </a></li>
                        <li><a href='<?php echo Url::to(['mouse/index']) ?>'>Inventario Mouse </a></li>
                        <li><a href='<?php echo Url::to(['sonido/index']) ?>'>Inventario Sonido </a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <?php Pjax::begin(['id' => 'pjax-windows']); ?>
        <?php
            if (strlen(SiteController::verified()) > 0 && Yii::$app->user->can('administrador')) {
            echo Growl::widget([
                'type' => Growl::TYPE_DANGER,
                'icon' => 'glyphicon glyphicon-ok-sign',
                'title' => 'Verifique el Inventario por favor....',
                'showSeparator' => true,
                'body' => 'Hubo cambio en la tabla ' . SiteController::verified() . '....'
            ]);
        }
        ?>
    <?php Pjax::end(); ?>

    <!-- Script que permite verificar via ajax los cambios hechos en la base de datos -->
    <?php
    $js = "setInterval(
                    function refresh() {
                        $.get('site/windows', function (data) {
                            if (data == 'windows') {
                                $.pjax.reload({
                                    container: '#pjax-windows'
                                });
                            }
                        })
                    }, 50000);
        ";
    $this->registerJs($js);
    ?>
</div>