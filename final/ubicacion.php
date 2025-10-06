<?php
$whatsapp = "59171234567";
?><!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Ubicación - ACAI LIFE</title>
  <link rel="stylesheet" href="assets/css/styles.css" />
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
        <a href="https://wa.me/<?=$whatsapp?>?text=Hola%20Acai%20Life" target="_blank" class="whatsapp-btn">WhatsApp</a>
      </nav>
    </div>
  </header>

  <main>
    <section class="container ubicacion">
      <h3>Encuéntranos</h3>
      <div class="ubicacion-grid">
        <div class="map">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3807.167413826202!2d-66.0416999!3d-17.4037516!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x93e37b007f15c7af%3A0x25a18570b32b4deb!2sA%C3%A7ai%20Life!5e0!3m2!1ses!2sbo!4v1758229757545!5m2!1ses!2sbo" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
        <div class="info">
          <h4>Acai Life - Sacaba</h4>
          <p><strong>Dirección:</strong> Calle Monseñor Roberto Nicoli, entre Padilla y Aroma.</p>
          <p><strong>Horarios:</strong> Lun-Dom 09:00 - 21:00</p>
          <p><strong>Teléfono:</strong> +591 <?=$whatsapp?></p>
          <p><strong>Redes sociales:</strong>
            <a href="#" target="_blank">Instagram</a> · 
            <a href="#" target="_blank">Facebook</a>
          </p>
          <a href="https://wa.me/<?=$whatsapp?>?text=Hola,%20necesito%20información" target="_blank" class="btn">Contactar por WhatsApp</a>
        </div>
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