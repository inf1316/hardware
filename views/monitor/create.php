<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Monitor */

$this->title = 'Crear Monitor';
$this->params['breadcrumbs'][] = ['label' => 'Monitores', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="monitor-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
