<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Pedidos $model */

$this->title = Yii::t('app', 'Create Pedidos');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pedidos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pedidos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
