<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Contenidos $model */

$this->title = Yii::t('app', 'Create Contenidos');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Contenidos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contenidos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
