<?php
$whatsapp = "59171234567";
?><!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Promociones - ACAI LIFE</title>
  <link rel="stylesheet" href="assets/css/common.css" />
  <link rel="stylesheet" href="assets/css/promociones.css" />
</head>
<body>
  <header class="site-header">
    <div class="container header-inner">
<a href="index.php" class="brand">
  <img src="assets/img/logo-acai.jpg" alt="Acai Life logo" class="logo">
  <div>
    <h1>ACAI LIFE</h1>
    <p class="tag">Snacks saludables · Sacaba</p>
  </div>
</a>
      <nav class="main-nav">
        <a href="index.php">Inicio</a>
        <a href="menu.php">Menú</a>
        <a href="promociones.php">Promociones</a>
        <a href="ubicacion.php">Ubicación</a>
        <a href="contacto.php">Contacto</a>
      </nav>
    </div>
  </header>

  <main>
    <section class="container promos">
      <h3>Promociones Especiales</h3>
      <div class="promo-grid">
        <!-- Promo Nocturna-->
        <article class="promo-card">
          <img src="assets/img/promos/promonocturna.jpeg" alt="Promo Nocturna" loading="lazy" onerror="this.src='assets/img/logo-acai.jpg'">
          <div class="promo-content">
            <h4>Promo Nocturna</h4>
            <p>2x20 Bs - ¡Aprovecha esta oferta increíble!</p>
            <a href="https://wa.me/<?=$whatsapp?>?text=Hola,%20quiero%20la%20promo%20Nocturna%202x20%20Bs" target="_blank" class="btn small">Pedir ahora</a>
          </div>
        </article>

        <!-- Jueves de Promo -->
        <article class="promo-card">
          <img src="assets/img/promos/juevesdepromo.jpeg" alt="2x35 Bs Jueves de Promo" loading="lazy" onerror="this.src='assets/img/logo-acai.jpg'">
          <div class="promo-content">
            <h4>Jueves de Promo</h4>
            <p>2x35 Bs - Deliciosas fresas con helado. </p>
            <a href="https://wa.me/<?=$whatsapp?>?text=Hola,%20quiero%20la%20promo%202x35%20Jueves%20de%20Promo" target="_blank" class="btn small">Pedir ahora</a>
          </div>
        </article>

        <!-- Promo Helado por Peso -->
        <article class="promo-card featured">
          <img src="assets/img/promos/promohelado.jpg" alt="Helado por peso" loading="lazy" onerror="this.src='assets/img/logo-acai.jpg'">
          <div class="promo-content">
            <h4>🍦 Helado por Peso</h4>
            <p><strong>1 Bs cada 20 gramos
              y 100 gramos por 5 Bs
            </strong></p>
            <a href="https://wa.me/<?=$whatsapp?>?text=Hola,%20quiero%20helado%20por%20peso" target="_blank" class="btn small">Consultar</a>
          </div>
        </article>

        <!-- Promo Día de la Mujer 1 -->
        <article class="promo-card special">
          <img src="assets/img/promos/promodiamujer1.jpeg" alt="Promo Día de la Mujer 1" loading="lazy" onerror="this.src='assets/img/logo-acai.jpg'">
          <div class="promo-content">
            <h4>💐 Día de la Mujer 1</h4>
            <p><strong>2x25 Bs</strong><br>Celebra con nosotras</p>
            <a href="https://wa.me/<?=$whatsapp?>?text=Hola,%20quiero%20la%20promo%20Día%20de%20la%20Mujer%202x25%20Bs" target="_blank" class="btn small">Pedir ahora</a>
          </div>
        </article>

        <!-- Promo Día de la Mujer 2 -->
        <article class="promo-card special">
          <img src="assets/img/promos/promodiamujer2.jpeg" alt="Promo Día de la Mujer 2" loading="lazy" onerror="this.src='assets/img/logo-acai.jpg'">
          <div class="promo-content">
            <h4>💐 Día de la Mujer 2</h4>
            <p><strong>2x20 Bs</strong><br>Oferta especial para ti</p>
            <a href="https://wa.me/<?=$whatsapp?>?text=Hola,%20quiero%20la%20promo%20Día%20de%20la%20Mujer%202x20%20Bs" target="_blank" class="btn small">Pedir ahora</a>
          </div>
        </article>
      </div>
    </section>
  </main>

  <footer class="site-footer">
    <div class="container">
      <p>© <?=date('Y')?> Acai Life · Hecho por Liz & Aracely</p>
    </div>
  </footer>
</body>
</html>