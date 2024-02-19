<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Commision $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="commision-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'priority')->textInput() ?>

    <?= $form->field($model, 'date')->textInput() ?>

    <?= $form->field($model, 'gadget_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'malfunction')->textInput() ?>

    <?= $form->field($model, 'gadget_info')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'client')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'date_complete')->textInput() ?>

    <?= $form->field($model, 'date_add')->textInput() ?>

    <?= $form->field($model, 'comments')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
