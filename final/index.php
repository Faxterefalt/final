<?php
// index.php - Acai Life website (ready to use)
// Replace contact phone and Google Maps iframe as needed.

$menu = [
    ["id"=>1,"categoria"=>"Postres","nombre"=>"Fresas con crema clásica","descripcion"=>"Fresas frescas con crema batida.","precio"=>"15 Bs","img"=>"assets/img/fresas-copa.jpg"],
    ["id"=>2,"categoria"=>"Postres","nombre"=>"Fresas con crema especial","descripcion"=>"Con galleta y trozos crocantes.","precio"=>"18 Bs","img"=>"assets/img/fresas-galleta.jpg"],
    ["id"=>3,"categoria"=>"Malteadas","nombre"=>"Malteada fresa crema","descripcion"=>"Leche, helado de fresa, crema batida.","precio"=>"20 Bs","img"=>"assets/img/malteada1.jpg"],
    ["id"=>4,"categoria"=>"Malteadas","nombre"=>"Malteada deluxe","descripcion"=>"Malteada de fresa con crema y cereza.","precio"=>"22 Bs","img"=>"assets/img/malteada2.jpg"],
];

$response = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['form_type'])) {
    $form_type = strip_tags($_POST['form_type']);
    $nombre = strip_tags($_POST['nombre'] ?? '');
    $telefono = strip_tags($_POST['telefono'] ?? '');
    $mensaje = strip_tags($_POST['mensaje'] ?? '');
    $producto = strip_tags($_POST['producto'] ?? '');
    $fecha = date('Y-m-d H:i:s');

    $log = "[$fecha] Tipo: $form_type | Nombre: $nombre | Tel: $telefono | Producto: $producto | Mensaje: $mensaje" . PHP_EOL;
    file_put_contents(__DIR__ . '/orders.txt', $log, FILE_APPEND);

    $response = 'Gracias, tu mensaje ha sido recibido. Pronto te contactaremos.';
    if (!empty($_SERVER['HTTP_X_REQUESTED_WITH'])) {
        header('Content-Type: application/json');
        echo json_encode(['status'=>'ok','message'=>$response]);
        exit;
    }
}
?><!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>ACAI LIFE</title>
  <meta name="description" content="Acai Life  Menú, promos y contacto." />
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
        <a href="#inicio">Inicio</a>
        <a href="menu.html">Menú</a>
        <a href="#promos">Promociones</a>
        <a href="#galeria">Galería</a>
        <a href="#ubicacion">Ubicación</a>
        <a href="#contacto">Contacto</a>
      </nav>
     
    </div>
  </header>

  <main>
    <section id="inicio" class="hero" style="background-image: url('assets/img/fresas-bg.jpg');">
      
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
            <div class="meta"><span class="price"><?=htmlspecialchars($m['precio'])?></span>
            <button class="btn small open-order" data-product="<?=htmlspecialchars($m['nombre'])?>">Pedir</button></div>
          </div>
        </article>
        <?php endforeach; ?>
      </div>
    </section>

    <section id="promos" class="container promos">
      <h3>Promociones</h3>
      <div class="promo-grid">
        <article class="promo-card">
          <img src="assets/img/promo3.jpg" alt="Promo 1">
          <div class="promo-content">
            <h4>Super promo - Día especial</h4>
            <p>3x80 Bs - ¡Aprovecha!</p>
          </div>
        </article>
        <article class="promo-card">
          <img src="assets/img/promo1.jpg" alt="Promo 2">
          <div class="promo-content">
            <h4>2x60 Bs Fresas + Helado</h4>
            <p>Solo por tiempo limitado.</p>
          </div>
        </article>
      </div>
    </section>

    <section id="menu" class="container menu-section">
      <h3>Menú</h3>
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
                <button class="btn small open-order" data-product="<?=htmlspecialchars($item['nombre'])?>">Pedir / Consultar</button>
              </div>
            </div>
          </article>
        <?php endforeach; ?>
      </div>
    </section>

    <section id="galeria" class="container gallery">
      <h3>Galería</h3>
      <div class="gallery-grid">
        <img src="assets/img/fresas-copa.jpg" alt="">
        <img src="assets/img/fresas-galleta.jpg" alt="">
        <img src="assets/img/malteada1.jpg" alt="">
        <img src="assets/img/malteada2.jpg" alt="">
        <img src="assets/img/fresas-bg.jpg" alt="">
      </div>
    </section>

    <section id="ubicacion" class="container ubicacion">
      <h3>Ubicación</h3>
      <div class="ubicacion-grid">
        <div class="map">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3807.167413826202!2d-66.0416999!3d-17.4037516!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x93e37b007f15c7af%3A0x25a18570b32b4deb!2sA%C3%A7ai%20Life!5e0!3m2!1ses!2sbo!4v1758229757545!5m2!1ses!2sbo" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
        <div class="info">
          <h4>Acai Life - Sacaba</h4>
          <p>Calle Monseñor Roberto Nicoli, entre Padilla y Aroma.</p>
          <p><strong>Horarios:</strong> Lun-Dom 09:00 - 21:00</p>
          <p><strong>Tel:</strong> +591 XXXXXXXXX</p>
          <p><strong>Redes:</strong>
            <a href="#" target="_blank">Instagram</a> · <a href="#" target="_blank">Facebook</a>
          </p>
        </div>
      </div>
    </section>

    

    <section id="contacto" class="container contacto">
      <h3>Contacto / Pedidos</h3>
      <?php if($response): ?>
        <div class="server-response"><?=htmlspecialchars($response)?></div>
      <?php endif; ?>
      <div class="contact-grid">
        <form id="contactForm" method="post" class="form">
          <input type="hidden" name="form_type" value="pedido" />
          <label>Nombre
            <input name="nombre" required>
          </label>
          <label>Teléfono / WhatsApp
            <input name="telefono" required>
          </label>
          <label>Producto (si aplica)
            <input name="producto" id="productoField">
          </label>
          <label>Mensaje
            <textarea name="mensaje"></textarea>
          </label>
          <button type="submit" class="btn">Enviar</button>
        </form>

        <div class="contact-info">
          <h4>Contacta por WhatsApp</h4>
          <p>Haz click en el botón para enviar un mensaje directo.</p>
          <a class="btn whatsapp-large" href="https://wa.me/591XXXXXXXXX?text=Hola%20Acai%20Life%2C%20quiero%20hacer%20un%20pedido" target="_blank">WhatsApp</a>
          <h4>Horario</h4>
          <p>Lun-Dom 09:00 - 21:00</p>
          <h4>Dirección</h4>
          <p>Calle Monseñor Roberto Nicoli, Sacaba</p>
        </div>
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

