<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <style>
        .navbar-brand img {
            height: 40px;
            margin-right: 10px;
            border-radius: 50%;
            background: #fff;
            box-shadow: 0 2px 8px #0002;
            padding: 2px;
        }
        .navbar {
            box-shadow: 0 4px 18px -5px #0003;
        }
        body {
            background: #f5f7fa;
        }
        footer#footer {
            border-top: 1px solid #ddd;
            background: #f8f9fa;
        }
    </style>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header id="header">
    <?php
    NavBar::begin([
        'brandLabel' =>
            Html::img(Yii::getAlias('@web/images/logo.png'), [
                'alt' => 'Logo',
                'style' => 'height:40px; display:inline-block; vertical-align:middle;'
            ]) .
            '<span style="vertical-align:middle; font-weight:700; letter-spacing:1px; font-size:1.2rem; color:#fff;"> E-Commerce UTELVT</span>',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => ['class' => 'navbar-expand-md navbar-dark bg-dark fixed-top']
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav'],
        'items' => [
            ['label' => 'Inicio', 'url' => ['/site/index']],
            [
                'label' => 'E-Commerce',
                'items' => [
                    ['label' => 'Categorías', 'url' => ['/categorias/index']],
                    ['label' => 'Productos', 'url' => ['/productos/index']],
                    ['label' => 'Pedidos', 'url' => ['/pedidos/index']],
                    ['label' => 'Usuarios', 'url' => ['/usuarios/index']],
                    ['label' => 'Detalles Ventas', 'url' => ['/detalles/index']],
                ],
            ],
            Yii::$app->user->isGuest
                ? ['label' => 'Iniciar Sesión', 'url' => ['/site/login']]
                : '<li class="nav-item">'
                    . Html::beginForm(['/site/logout'])
                    . Html::submitButton(
                      'Salir (' . Html::encode(Yii::$app->user->identity->nombre) . ')',
                        ['class' => 'nav-link btn btn-link logout', 'style' => 'color:#fff;text-decoration:none;']
                    )
                    . Html::endForm()
                    . '</li>'
        ]
    ]);
    NavBar::end();
    ?>
</header>

<main id="main" class="flex-shrink-0" role="main" style="padding-top:80px;">
    <div class="container">
        <?php if (!empty($this->params['breadcrumbs'])): ?>
            <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
        <?php endif ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<footer id="footer" class="mt-auto py-3 bg-light">
    <div class="container">
        <div class="row text-muted">
            <div class="col-md-6 text-center text-md-start">&copy; E-Commerce UTELVT <?= date('Y') ?></div>
            <div class="col-md-6 text-center text-md-end"><?= Yii::powered() ?></div>
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>