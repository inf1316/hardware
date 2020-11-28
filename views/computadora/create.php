<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Computadora */

$this->title = 'Crear Computadora';
$this->params['breadcrumbs'][] = ['label' => 'Computadoras', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="computadora-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
