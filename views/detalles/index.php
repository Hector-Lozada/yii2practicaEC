<?php

use app\models\Detalles;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
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

            'iddetalles',
            'venta_id',
            'producto_id',
            'cantidad',
            'precio_unitario',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Detalles $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'iddetalles' => $model->iddetalles]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
