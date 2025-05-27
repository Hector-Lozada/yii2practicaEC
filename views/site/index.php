<?php

/** @var yii\web\View $this */

$this->title = 'E-Commerce UTELVT';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent mt-5 mb-5">
        <img src="<?= Yii::getAlias('@web/images/logo.png') ?>" alt="E-Commerce UTELVT Logo" class="mb-3" style="height:100px; border-radius:50%; box-shadow:0 2px 12px #0002;">
        <h1 class="display-4" style="font-weight:700; letter-spacing:2px; color:#0d6efd;">Bienvenido a E-Commerce UTELVT</h1>
        <h3 class="text-success">Tu tienda virtual universitaria</h3>
        <p class="lead">Explora, compra y gestiona tus productos de manera sencilla y segura.</p>
        <p>
            <a class="btn btn-lg btn-primary" href="/productos/index" style="margin-right:10px;">Ver Productos</a>
            <a class="btn btn-lg btn-outline-success" href="/site/about">¿Quiénes somos?</a>
        </p>
    </div>

    <div class="body-content">
        <div class="row text-center">
            <div class="col-lg-4 mb-4">
                <div class="card shadow-sm h-100">
                    <img src="<?= Yii::getAlias('@web/images/oferta.png') ?>" class="card-img-top" alt="Ofertas" style="height:160px; object-fit:cover;">
                    <div class="card-body">
                        <h5 class="card-title text-primary">Ofertas y Promociones</h5>
                        <p class="card-text">No te pierdas los mejores precios y descuentos exclusivos para la comunidad UTELVT.</p>
                        <a class="btn btn-outline-primary" href="/productos/ofertas">Ver Ofertas</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="card shadow-sm h-100">
                    <img src="<?= Yii::getAlias('@web/images/envios.png') ?>" class="card-img-top" alt="Envíos rápidos" style="height:160px; object-fit:cover;">
                    <div class="card-body">
                        <h5 class="card-title text-primary">Envíos Rápidos</h5>
                        <p class="card-text">Recibe tus productos en tiempo récord con nuestro sistema de entregas eficiente y seguro.</p>
                        <a class="btn btn-outline-primary" href="/pedidos/index">Seguimiento de pedidos</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="card shadow-sm h-100">
                    <img src="<?= Yii::getAlias('@web/images/soporte.png') ?>" class="card-img-top" alt="Soporte" style="height:160px; object-fit:cover;">
                    <div class="card-body">
                        <h5 class="card-title text-primary">Soporte y Ayuda</h5>
                        <p class="card-text">¿Tienes dudas? Nuestro equipo de soporte está listo para ayudarte en cada paso de tu compra.</p>
                        <a class="btn btn-outline-primary" href="/site/contact">Contactar Soporte</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>