<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\MaintenanceSchedule $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="maintenance-schedule-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ship_id')->textInput() ?>

    <?= $form->field($model, 'schedule_date')->textInput() ?>

    <?= $form->field($model, 'status')->dropDownList([ 'pending' => 'Pending', 'completed' => 'Completed', 'overdue' => 'Overdue', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
