<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Productos $model */

$this->title = Yii::t('app', 'Update Productos: {name}', [
    'name' => $model->idproductos,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Productos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idproductos, 'url' => ['view', 'idproductos' => $model->idproductos]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="productos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
