<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Productos $model */

$this->title = $model->id_producto;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Productos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="productos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id_producto' => $model->id_producto], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id_producto' => $model->id_producto], [
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
            'id_producto',
            'nombre',
            'descripcion:ntext',
            'precio',
            'stock',
            [
                'attribute' => 'id_categoria',
                'label' => 'Categoría',
                'value' => $model->categoria ? $model->categoria->nombre : '(Sin categoría)',
            ],
            [
                'attribute' => 'imagen_url',
                'format' => 'raw',
                'value' => function ($model) {
                    return $model->imagen_url
                        ? Html::img($model->imagen_url, ['alt' => $model->nombre, 'style' => 'max-width:200px;'])
                        : '(Sin imagen)';
                },
            ],
        ],
    ]) ?>

</div>