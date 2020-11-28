<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Cd */

$this->title = 'Crear CD';
$this->params['breadcrumbs'][] = ['label' => 'CD', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cd-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
