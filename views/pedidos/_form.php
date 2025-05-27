<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Usuarios;

/** @var yii\web\View $this */
/** @var app\models\Pedidos $model */
/** @var yii\widgets\ActiveForm $form */

// Obtener la lista de usuarios para el dropdown
$listaUsuarios = ArrayHelper::map(Usuarios::find()->all(), 'id_usuario', 'nombre');

?>

<div class="pedidos-form">

    <?php $form = ActiveForm::begin([
        'options' => ['class' => 'p-4 shadow-sm border rounded bg-light'],
    ]); ?>

    <div class="row align-items-end mb-3">
        <div class="col-9">
            <?= $form->field($model, 'id_usuario', [
                'template' => "{label}\n<div class='input-group'>{input}</div>\n{hint}\n{error}"
            ])->dropDownList(
                $listaUsuarios,
                [
                    'prompt' => 'Selecciona un usuario',
                    'class' => 'form-select',
                    'required' => true
                ]
            )->label('Usuario <span class="text-danger">*</span>', ['encode' => false]) ?>
        </div>
        <div class="col-3">
            <label style="visibility:hidden;">botón</label>
            <?= Html::a(
                '<i class="fas fa-user-plus"></i> Crear usuario',
                ['usuarios/create'],
                ['class' => 'btn btn-outline-primary w-100']
            ) ?>
        </div>
    </div>

    <?= $form->field($model, 'fecha_pedido', [
        'inputOptions' => [
            'class' => 'form-control',
            'placeholder' => 'AAAA-MM-DD',
            'type' => 'date',
            'required' => true
        ]
    ])->label('Fecha del pedido <span class="text-danger">*</span>', ['encode' => false]) ?>

    <?= $form->field($model, 'estado', [
        'inputOptions' => [
            'class' => 'form-control',
            'placeholder' => 'Ejemplo: Pendiente, Enviado, Cancelado',
            'maxlength' => true,
            'required' => true
        ]
    ])->label('Estado <span class="text-danger">*</span>', ['encode' => false]) ?>

    <?= $form->field($model, 'total', [
        'inputOptions' => [
            'class' => 'form-control',
            'placeholder' => 'Ejemplo: 150.00',
            'type' => 'number',
            'step' => '0.01',
            'required' => true
        ]
    ])->label('Total <span class="text-danger">*</span>', ['encode' => false]) ?>

    <div class="form-group mt-4">
        <?= Html::submitButton(
            '<i class="fas fa-save"></i> Guardar',
            ['class' => 'btn btn-success btn-lg px-4']
        ) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>