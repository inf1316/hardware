<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Red */

$this->title = 'Crear Red';
$this->params['breadcrumbs'][] = ['label' => 'Redes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="red-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
