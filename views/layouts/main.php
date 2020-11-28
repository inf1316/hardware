<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'UCM Cienfuegos',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Home', 'url' => ['/']],

            #submenu
            ['label' => 'Inventario', 'url' => ['/'], 'items' => [
                ['label' => 'Computadora', 'url' => ['/computadora/index', 'tag' => 'computadora']],
                ['label' => 'Monitor', 'url' => ['/monitor/index', 'tag' => 'monitor']],
                ['label' => 'Disco', 'url' => ['/disco/index', 'tag' => 'disco']],

                ['label' => 'CD', 'url' => ['/cd/index', 'tag' => 'cd']],
                ['label' => 'Bios', 'url' => ['/bios/index', 'tag' => 'bios']],
                ['label' => 'Mouse', 'url' => ['/mouse/index', 'tag' => 'mouse']],

                ['label' => 'Cpu', 'url' => ['/cpu/index', 'tag' => 'cpu']],
                ['label' => 'Teclado', 'url' => ['/teclado/index', 'tag' => 'teclado']],
                ['label' => 'Sonido', 'url' => ['/sonido/index', 'tag' => 'sonido']],


                ['label' => 'Red', 'url' => ['/red/index', 'tag' => 'red']],
                ['label' => 'Board', 'url' => ['/board/index', 'tag' => 'board']],
                ['label' => 'Memoria', 'url' => ['/memoria/index', 'tag' => 'memoria']],
            ]],
            #fin del submenu
            ['label' => 'Local', 'url' => ['/local/index', 'tag' => 'local']],

            #Opcion que esta presente solamente cuando el usuario con el rol de administrador esta logueado
            ['label' => 'Gestion Usuarios', 'url' => ['//admin'],'visible' => Yii::$app->user->can('administrador')],

            #['label' => 'Contact', 'url' => ['/site/about']],

            Yii::$app->user->isGuest ? (
            ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Estudiante de Ing.Informática:José Manuel Mclanghlin Matienzo <?= date('Y') ?></p>
        <p class="pull-right"><strong>Desarrollado con :</strong> <a href="">Yii Framework</a></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
