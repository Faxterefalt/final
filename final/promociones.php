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
      <div class="brand">
        <img src="assets/img/logo-acai.jpg" alt="Acai Life logo" class="logo">
        <div>
          <h1>ACAI LIFE</h1>
          <p class="tag">Snacks saludables · Sacaba</p>
        </div>
      </div>
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
        <article class="promo-card">
          <img src="assets/img/promos/promo3.jpg" alt="Promo 1">
          <div class="promo-content">
            <h4>Super promo - Día especial</h4>
            <p>3x80 Bs - ¡Aprovecha!</p>
            <a href="https://wa.me/<?=$whatsapp?>?text=Hola,%20quiero%20la%20promo%203x80" target="_blank" class="btn small">Pedir ahora</a>
          </div>
        </article>
        <article class="promo-card">
          <img src="assets/img/promos/promo1.jpg" alt="Promo 2">
          <div class="promo-content">
            <h4>2x60 Bs Fresas + Helado</h4>
            <p>Solo por tiempo limitado.</p>
            <a href="https://wa.me/<?=$whatsapp?>?text=Hola,%20quiero%20la%20promo%202x60" target="_blank" class="btn small">Pedir ahora</a>
          </div>
        </article>
      </div>

  </main>

  <footer class="site-footer">
    <div class="container">
      <p>© <?=date('Y')?> Acai Life · Hecho por Liz & Aracely</p>
    </div>
  </footer>
</body>
</html>