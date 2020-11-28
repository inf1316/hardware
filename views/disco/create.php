<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Disco */

$this->title = 'Crear Disco';
$this->params['breadcrumbs'][] = ['label' => 'Disco', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="disco-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
