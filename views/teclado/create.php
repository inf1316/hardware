<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Teclado */

$this->title = 'Crear Teclado';
$this->params['breadcrumbs'][] = ['label' => 'Teclados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="teclado-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
