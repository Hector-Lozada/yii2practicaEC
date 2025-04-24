<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Detalles $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="detalles-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'venta_id')->textInput() ?>

    <?= $form->field($model, 'producto_id')->textInput() ?>

    <?= $form->field($model, 'cantidad')->textInput() ?>

    <?= $form->field($model, 'precio_unitario')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
