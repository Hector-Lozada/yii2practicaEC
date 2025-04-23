<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Perfiles $model */

$this->title = Yii::t('app', 'Create Perfiles');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Perfiles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="perfiles-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
