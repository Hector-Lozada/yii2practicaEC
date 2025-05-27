<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Detalles $model */

$this->title = $model->id_detalle;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Detalles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="detalles-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id_detalle' => $model->id_detalle], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id_detalle' => $model->id_detalle], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_detalle',
            [
                'attribute' => 'id_pedido',
                'label' => 'Pedido',
                'value' => $model->pedido
                    ? ('Pedido #' . $model->pedido->id_pedido . ' (' . Yii::$app->formatter->asDate($model->pedido->fecha_pedido) . ')')
                    : '(Sin pedido)',
            ],
            [
                'attribute' => 'id_producto',
                'label' => 'Producto',
                'value' => $model->producto
                    ? $model->producto->nombre
                    : '(Sin producto)',
            ],
            'cantidad',
            'precio_unitario',
        ],
    ]) ?>

</div>