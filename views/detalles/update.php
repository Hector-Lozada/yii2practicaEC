<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Detalles $model */

$this->title = Yii::t('app', 'Update Detalles: {name}', [
    'name' => $model->id_detalle,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Detalles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_detalle, 'url' => ['view', 'id_detalle' => $model->id_detalle]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="detalles-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
