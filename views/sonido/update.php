<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Sonido */

$this->title = 'Actualizar Sonido: ' . $model->fabricante;
$this->params['breadcrumbs'][] = ['label' => 'Sonidos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->fabricante, 'url' => ['view', 'id' => $model->idSonido]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="sonido-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
