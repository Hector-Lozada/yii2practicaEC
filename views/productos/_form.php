<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Categorias;

/** @var yii\web\View $this */
/** @var app\models\Productos $model */
/** @var yii\widgets\ActiveForm $form */

// Obtener lista de categorías para el dropdown
$listaCategorias = ArrayHelper::map(Categorias::find()->all(), 'id_categoria', 'nombre');

?>

<div class="productos-form">

    <?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data', 'class' => 'p-4 shadow-sm border rounded bg-light'],
    ]); ?>

    <?= $form->field($model, 'nombre', [
        'inputOptions' => [
            'class' => 'form-control',
            'placeholder' => 'Ejemplo: Laptop HP',
            'required' => true
        ]
    ])->label('Nombre del producto <span class="text-danger">*</span>', ['encode' => false]) ?>

    <?= $form->field($model, 'descripcion', [
        'inputOptions' => [
            'class' => 'form-control',
            'placeholder' => 'Describe el producto',
            'required' => true
        ]
    ])->textarea(['rows' => 4, 'placeholder' => 'Describe el producto', 'required' => true])
      ->label('Descripción <span class="text-danger">*</span>', ['encode' => false]) ?>

    <?= $form->field($model, 'precio', [
        'inputOptions' => [
            'class' => 'form-control',
            'placeholder' => 'Ejemplo: 1500.00',
            'type' => 'number',
            'step' => '0.01',
            'required' => true
        ]
    ])->label('Precio <span class="text-danger">*</span>', ['encode' => false]) ?>

    <?= $form->field($model, 'stock', [
        'inputOptions' => [
            'class' => 'form-control',
            'placeholder' => 'Ejemplo: 20',
            'type' => 'number',
            'min' => 0,
            'required' => true
        ]
    ])->label('Stock <span class="text-danger">*</span>', ['encode' => false]) ?>

    <div class="row align-items-end mb-3">
        <div class="col-9">
            <?= $form->field($model, 'id_categoria', [
                'template' => "{label}\n<div class='input-group'>{input}</div>\n{hint}\n{error}"
            ])->dropDownList(
                $listaCategorias,
                [
                    'prompt' => 'Selecciona una categoría',
                    'class' => 'form-select',
                    'required' => true
                ]
            )->label('Categoría <span class="text-danger">*</span>', ['encode' => false]) ?>
        </div>
        <div class="col-3">
            <label style="visibility:hidden;">botón</label>
            <?= Html::a(
                '<i class="fas fa-plus"></i> Crear categoría',
                ['categorias/create'],
                ['class' => 'btn btn-outline-primary w-100']
            ) ?>
        </div>
    </div>

    <?= $form->field($model, 'imagenFile')->fileInput([
        'accept' => 'image/*',
        'class' => 'form-control',
        'required' => $model->isNewRecord
    ])->label('Imagen del producto' . ($model->isNewRecord ? ' <span class="text-danger">*</span>' : ''), ['encode' => false]) ?>

    <div class="form-group mt-4">
        <?= Html::submitButton(
            '<i class="fas fa-save"></i> Guardar',
            ['class' => 'btn btn-success btn-lg px-4']
        ) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>