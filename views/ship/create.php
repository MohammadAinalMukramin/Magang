<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Ship $model */

$this->title = 'Create Ship';
$this->params['breadcrumbs'][] = ['label' => 'Ships', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ship-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
