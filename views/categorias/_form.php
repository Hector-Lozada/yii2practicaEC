<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Categorias $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="categorias-form">

    <?php $form = ActiveForm::begin([
        'options' => ['class' => 'p-4 shadow-sm border rounded bg-light'],
    ]); ?>

    <?= $form->field($model, 'nombre', [
        'inputOptions' => [
            'class' => 'form-control',
            'placeholder' => 'Ejemplo: Electrónica',
            'required' => true
        ]
    ])->label('Nombre de la categoría <span class="text-danger">*</span>', ['encode' => false]) ?>

    <?= $form->field($model, 'descripcion', [
        'inputOptions' => [
            'class' => 'form-control',
            'placeholder' => 'Describe esta categoría, por ejemplo: Productos electrónicos, gadgets, etc.',
            'required' => true
        ]
    ])->textarea(['rows' => 4, 'placeholder' => 'Describe esta categoría, por ejemplo: Productos electrónicos, gadgets, etc.', 'required' => true])
      ->label('Descripción <span class="text-danger">*</span>', ['encode' => false]) ?>

    <div class="form-group mt-4">
        <?= Html::submitButton(
            '<i class="fas fa-save"></i> Guardar',
            ['class' => 'btn btn-success btn-lg px-4']
        ) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>