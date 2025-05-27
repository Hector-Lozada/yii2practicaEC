<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Usuarios $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="usuarios-form">

    <?php $form = ActiveForm::begin([
        'options' => ['class' => 'p-4 shadow-sm border rounded bg-light'],
    ]); ?>

    <?= $form->field($model, 'nombre', [
        'inputOptions' => [
            'class' => 'form-control',
            'placeholder' => 'Ejemplo: Juan Pérez',
            'required' => true
        ]
    ])->label('Nombre completo <span class="text-danger">*</span>', ['encode' => false]) ?>

    <?= $form->field($model, 'correo', [
        'inputOptions' => [
            'class' => 'form-control',
            'placeholder' => 'Ejemplo: correo@ejemplo.com',
            'required' => true,
            'type' => 'email'
        ]
    ])->label('Correo electrónico <span class="text-danger">*</span>', ['encode' => false]) ?>

    <?= $form->field($model, 'contraseña', [
        'inputOptions' => [
            'class' => 'form-control',
            'placeholder' => 'Escribe tu contraseña',
            'required' => true,
            'type' => 'password'
        ]
    ])->label('Contraseña <span class="text-danger">*</span>', ['encode' => false]) ?>

    <?= $form->field($model, 'fecha_registro', [
        'inputOptions' => [
            'class' => 'form-control',
            'placeholder' => 'AAAA-MM-DD',
            'required' => true,
            'type' => 'date'
        ]
    ])->label('Fecha de registro <span class="text-danger">*</span>', ['encode' => false]) ?>

    <div class="form-group mt-4">
        <?= Html::submitButton(
            '<i class="fas fa-save"></i> Guardar',
            ['class' => 'btn btn-success btn-lg px-4']
        ) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>