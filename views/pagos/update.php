<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Pagos $model */

$this->title = Yii::t('app', 'Update Pagos: {name}', [
    'name' => $model->idpagos,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pagos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idpagos, 'url' => ['view', 'idpagos' => $model->idpagos]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="pagos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
