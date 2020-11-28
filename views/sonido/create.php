<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Sonido */

$this->title = 'Crear Sonido';
$this->params['breadcrumbs'][] = ['label' => 'Sonido', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sonido-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
