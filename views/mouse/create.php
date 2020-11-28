<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Mouse */

$this->title = 'Crear Mouse';
$this->params['breadcrumbs'][] = ['label' => 'Mouse', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mouse-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
