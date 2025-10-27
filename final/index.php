<?php

// index.php - Página principal de Acai Life
$menu = [
    ["id"=>1,"categoria"=>"Postres","nombre"=>"Fresas con crema clásica","descripcion"=>"Fresas frescas con crema batida.","precio"=>"15 Bs","img"=>"assets/img/menu/fresasconcremadeluxe.png"],
    ["id"=>2,"categoria"=>"Postres","nombre"=>"Fresas con crema especial","descripcion"=>"Con galleta y trozos crocantes.","precio"=>"18 Bs","img"=>"assets/img/menu/fresasconcremaclasica.jpg"],
    ["id"=>3,"categoria"=>"Malteadas","nombre"=>"Malteada fresa crema","descripcion"=>"Leche, helado de fresa, crema batida.","precio"=>"20 Bs","img"=>"assets/img/menu/malteadadeluxe.png"],
    ["id"=>4,"categoria"=>"Malteadas","nombre"=>"Malteada deluxe","descripcion"=>"Malteada de fresa con crema y cereza.","precio"=>"22 Bs","img"=>"assets/img/menu/malteadafresaconcrema.png"],
];

// Imágenes del carrusel
$carouselImages = [
    "assets/img/menu/frutasconcremanutella.jpg",
    "assets/img/menu/fresasconcremadeluxe.png",
    "assets/img/menu/duraznoconcremanutella.jpg",
    "assets/img/menu/arrozconlechenutella.jpg"
];

$whatsapp = "59171234567";
?><!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>ACAI LIFE - Inicio</title>
  <meta name="description" content="Acai Life - Snacks saludables en Sacaba" />
  <link rel="stylesheet" href="assets/css/common.css" />
  <link rel="stylesheet" href="assets/css/index.css" />
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
    <section id="inicio" class="hero">
      <video class="hero-video" autoplay muted loop playsinline>
        <source src="assets/img/videos/fresasnegocio.mp4" type="video/mp4">
        Tu navegador no soporta videos HTML5.
      </video>
      <div class="container hero-content">
        <!-- CARRUSEL DE IMÁGENES -->
        <div class="carousel-container">
          <div class="carousel-wrapper">
            <?php foreach($carouselImages as $index => $img): ?>
            <div class="carousel-slide <?= $index === 0 ? 'active' : '' ?>">
              <img src="<?= htmlspecialchars($img) ?>" alt="Producto <?= $index + 1 ?>">
            </div>
            <?php endforeach; ?>
          </div>
          <div class="carousel-indicators">
            <?php foreach($carouselImages as $index => $img): ?>
            <span class="indicator <?= $index === 0 ? 'active' : '' ?>" data-slide="<?= $index ?>"></span>
            <?php endforeach; ?>
          </div>
        </div>

        <!-- TEXTO CENTRAL -->
        <div class="hero-copy">
          <h2>Dulzura que gira alrededor de ti</h2>
          <p>Refresca tu día con nuestra malteada estrella.</p>
          <a href="menu.php" class="btn">Ver menú</a>
          
          <!-- REDES SOCIALES -->
          <div class="social-links-hero">
            <a href="https://wa.me/<?=$whatsapp?>?text=Hola%20Acai%20Life" target="_blank" rel="noopener" class="social-link whatsapp" title="WhatsApp">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
              </svg>
            </a>
            <a href="https://www.instagram.com/acailife.bo" target="_blank" rel="noopener" class="social-link instagram" title="Instagram">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
              </svg>
            </a>
            <a href="https://www.facebook.com/share/1LvEs6gRKg/" target="_blank" rel="noopener" class="social-link facebook" title="Facebook">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
              </svg>
            </a>
          </div>
        </div>

        <!-- MODELO 3D -->
        <figure class="hero-figure" aria-hidden="true">
          <div id="scene-container" class="scene-3d"></div>
        </figure>
      </div>
    </section>

    <section id="estrellas" class="container estrellas">
      <h3>Productos estrella</h3>
      <div class="estrellas-grid">
        <?php foreach(array_slice($menu,0,4) as $m): ?>
        <article class="estrella-card">
          <img src="<?=htmlspecialchars($m['img'])?>" alt="<?=htmlspecialchars($m['nombre'])?>">
          <div class="estrella-info">
            <h4><?=htmlspecialchars($m['nombre'])?></h4>
            <p><?=htmlspecialchars($m['descripcion'])?></p>
            <div class="meta">
              <span class="price"><?=htmlspecialchars($m['precio'])?></span>
              <a href="https://wa.me/<?=$whatsapp?>?text=Hola,%20quiero%20pedir:%20<?=urlencode($m['nombre'])?>" target="_blank" class="btn small">Pedir</a>
            </div>
          </div>
        </article>
        <?php endforeach; ?>
      </div>
    </section>
  </main>

  <footer class="site-footer">
    <div class="container">
      <p>© <?=date('Y')?> Acai Life · Hecho por Liz & Aracely</p>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/three@0.128.0/build/three.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/three@0.128.0/examples/js/loaders/GLTFLoader.js"></script>
  
  <script src="assets/js/scripts.js"></script>
  <script src="assets/js/scene.js"></script>
  <script src="assets/js/carousel.js"></script>
</body>
</html>