<?php

use app\models\Detalles;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
use app\models\Pedidos;
use app\models\Productos;

/** @var yii\web\View $this */
/** @var app\models\DetallesSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Detalles');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detalles-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Detalles'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_detalle',
            [
                'attribute' => 'id_pedido',
                'label' => 'Pedido',
                'value' => function ($model) {
                    return $model->pedido
                        ? ('Pedido #' . $model->pedido->id_pedido . ' (' . Yii::$app->formatter->asDate($model->pedido->fecha_pedido) . ')')
                        : '(Sin pedido)';
                },
                'filter' => ArrayHelper::map(
                    Pedidos::find()->all(),
                    'id_pedido',
                    function($pedido) {
                        return 'Pedido #' . $pedido->id_pedido . ' (' . Yii::$app->formatter->asDate($pedido->fecha_pedido) . ')';
                    }
                ),
            ],
            [
                'attribute' => 'id_producto',
                'label' => 'Producto',
                'value' => function ($model) {
                    return $model->producto
                        ? $model->producto->nombre
                        : '(Sin producto)';
                },
                'filter' => ArrayHelper::map(Productos::find()->all(), 'id_producto', 'nombre'),
            ],
            'cantidad',
            'precio_unitario',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Detalles $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_detalle' => $model->id_detalle]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>