<?php
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
  <title>Menú - ACAI LIFE</title>
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
      </nav>
    </div>
  </header>

  <main>
    <section class="container menu-section">
      <h3>Nuestro Menú</h3>
      <div class="menu-controls">
        <label>Filtrar:
          <select id="filtro-categoria">
            <option value="all">Todos</option>
            <?php
              $cats = array_unique(array_map(fn($m)=>$m['categoria'],$menu));
              foreach ($cats as $c) echo "<option value=\"" . htmlspecialchars($c) . "\">" . htmlspecialchars($c) . "</option>";
            ?>
          </select>
        </label>
        <input id="search" placeholder="Buscar producto..." />
      </div>

      <div id="menu-grid" class="menu-grid">
        <?php foreach($menu as $item): ?>
          <article class="menu-item" data-categoria="<?=htmlspecialchars($item['categoria'])?>">
            <img src="<?=htmlspecialchars($item['img'])?>" alt="<?=htmlspecialchars($item['nombre'])?>">
            <div class="menu-info">
              <h4><?=htmlspecialchars($item['nombre'])?></h4>
              <p class="desc"><?=htmlspecialchars($item['descripcion'])?></p>
              <div class="meta">
                <span class="price"><?=htmlspecialchars($item['precio'])?></span>
                <a href="https://wa.me/<?=$whatsapp?>?text=Hola,%20quiero%20pedir:%20<?=urlencode($item['nombre'])?>" target="_blank" class="btn small">Pedir</a>
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

  <script src="assets/js/scripts.js"></script>
</body>
</html>