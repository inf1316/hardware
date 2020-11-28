<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Cpu */

$this->title = 'Crear Cpu';
$this->params['breadcrumbs'][] = ['label' => 'Cpu', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cpu-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
