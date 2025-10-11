<?php
// index.php - Página principal de Acai Life
$menu = [
    ["id"=>1,"categoria"=>"Postres","nombre"=>"Fresas con crema clásica","descripcion"=>"Fresas frescas con crema batida.","precio"=>"15 Bs","img"=>"assets/img/fresas-copa.jpg"],
    ["id"=>2,"categoria"=>"Postres","nombre"=>"Fresas con crema especial","descripcion"=>"Con galleta y trozos crocantes.","precio"=>"18 Bs","img"=>"assets/img/fresas-galleta.jpg"],
    ["id"=>3,"categoria"=>"Malteadas","nombre"=>"Malteada fresa crema","descripcion"=>"Leche, helado de fresa, crema batida.","precio"=>"20 Bs","img"=>"assets/img/malteada1.jpg"],
    ["id"=>4,"categoria"=>"Malteadas","nombre"=>"Malteada deluxe","descripcion"=>"Malteada de fresa con crema y cereza.","precio"=>"22 Bs","img"=>"assets/img/malteada2.jpg"],
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
    <section id="inicio" class="hero" style="background-image: url('assets/img/fresas-bg.jpg');">
      <div class="container hero-content">
        <div class="hero-copy">
          <h2>Dulzura que gira alrededor de ti</h2>
          <p>Refresca tu día con nuestra malteada estrella.</p>
          <a href="menu.php" class="btn">Ver menú</a>
        </div>
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
</body>
</html>