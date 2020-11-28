<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Bios */

$this->title = 'Crear Bios';
$this->params['breadcrumbs'][] = ['label' => 'Bios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bios-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
