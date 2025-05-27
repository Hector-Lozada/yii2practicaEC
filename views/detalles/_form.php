<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Pedidos;
use app\models\Productos;

/** @var yii\web\View $this */
/** @var app\models\Detalles $model */
/** @var yii\widgets\ActiveForm $form */

// Obtener los pedidos y productos para los dropdowns
$listaPedidos = ArrayHelper::map(Pedidos::find()->all(), 'id_pedido', function($pedido) {
    return 'Pedido #' . $pedido->id_pedido . ' (' . Yii::$app->formatter->asDate($pedido->fecha_pedido) . ')';
});
$listaProductos = ArrayHelper::map(Productos::find()->all(), 'id_producto', 'nombre');

?>

<div class="detalles-form">

    <?php $form = ActiveForm::begin([
        'options' => ['class' => 'p-4 shadow-sm border rounded bg-light'],
    ]); ?>

    <div class="row align-items-end mb-3">
        <div class="col-8">
            <?= $form->field($model, 'id_pedido', [
                'template' => "{label}\n<div class='input-group'>{input}</div>\n{hint}\n{error}"
            ])->dropDownList(
                $listaPedidos,
                [
                    'prompt' => 'Selecciona un pedido',
                    'class' => 'form-select',
                    'required' => true
                ]
            )->label('Pedido <span class="text-danger">*</span>', ['encode' => false]) ?>
        </div>
        <div class="col-4">
            <label style="visibility:hidden;">botón</label>
            <?= Html::a(
                '<i class="fas fa-plus"></i> Crear pedido',
                ['pedidos/create'],
                ['class' => 'btn btn-outline-primary w-100']
            ) ?>
        </div>
    </div>

    <div class="row align-items-end mb-3">
        <div class="col-8">
            <?= $form->field($model, 'id_producto', [
                'template' => "{label}\n<div class='input-group'>{input}</div>\n{hint}\n{error}"
            ])->dropDownList(
                $listaProductos,
                [
                    'prompt' => 'Selecciona un producto',
                    'class' => 'form-select',
                    'required' => true
                ]
            )->label('Producto <span class="text-danger">*</span>', ['encode' => false]) ?>
        </div>
        <div class="col-4">
            <label style="visibility:hidden;">botón</label>
            <?= Html::a(
                '<i class="fas fa-plus"></i> Crear producto',
                ['productos/create'],
                ['class' => 'btn btn-outline-primary w-100']
            ) ?>
        </div>
    </div>

    <?= $form->field($model, 'cantidad', [
        'inputOptions' => [
            'class' => 'form-control',
            'placeholder' => 'Ejemplo: 1',
            'min' => 1,
            'type' => 'number',
            'required' => true
        ]
    ])->label('Cantidad <span class="text-danger">*</span>', ['encode' => false]) ?>

    <?= $form->field($model, 'precio_unitario', [
        'inputOptions' => [
            'class' => 'form-control',
            'placeholder' => 'Ejemplo: 99.99',
            'type' => 'number',
            'step' => '0.01',
            'required' => true
        ]
    ])->label('Precio unitario <span class="text-danger">*</span>', ['encode' => false]) ?>

    <div class="form-group mt-4">
        <?= Html::submitButton(
            '<i class="fas fa-save"></i> Guardar',
            ['class' => 'btn btn-success btn-lg px-4']
        ) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>