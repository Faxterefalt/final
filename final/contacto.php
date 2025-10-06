<?php
$whatsapp = "59171234567";

$response = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = strip_tags($_POST['nombre'] ?? '');
    $telefono = strip_tags($_POST['telefono'] ?? '');
    $mensaje = strip_tags($_POST['mensaje'] ?? '');
    $producto = strip_tags($_POST['producto'] ?? '');
    $fecha = date('Y-m-d H:i:s');

    $log = "[$fecha] Nombre: $nombre | Tel: $telefono | Producto: $producto | Mensaje: $mensaje" . PHP_EOL;
    file_put_contents(__DIR__ . '/orders.txt', $log, FILE_APPEND);

    $response = 'Gracias por contactarnos. Te responderemos pronto.';
}
?><!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Contacto - ACAI LIFE</title>
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
    <section class="container contacto">
      <h3>Contacto y Pedidos</h3>
      <?php if($response): ?>
        <div class="server-response" style="background:#d4edda;padding:1rem;border-radius:8px;margin-bottom:1rem;color:#155724">
          <?=htmlspecialchars($response)?>
        </div>
      <?php endif; ?>
      
      <div class="contact-grid">
        <form method="post" class="form">
          <label>Nombre
            <input name="nombre" required>
          </label>
          <label>Teléfono / WhatsApp
            <input name="telefono" required>
          </label>
          <label>Producto (opcional)
            <input name="producto">
          </label>
          <label>Mensaje
            <textarea name="mensaje"></textarea>
          </label>
          <button type="submit" class="btn">Enviar mensaje</button>
        </form>

        <div class="contact-info">
          <h4>Contacto Directo</h4>
          <p>Haz clic para enviarnos un mensaje por WhatsApp:</p>
          <a class="btn whatsapp-large" href="https://wa.me/<?=$whatsapp?>?text=Hola%20Acai%20Life%2C%20quiero%20hacer%20un%20pedido" target="_blank">
            Escribir por WhatsApp
          </a>
          
          <h4 style="margin-top:1.5rem">Pago por Transferencia</h4>
          <p>Escanea el código QR para transferir:</p>
          <div class="qr-payment">
            <!-- Acá el QR-->
            <img src="assets/img/qr-pago.png" alt="QR para pago" style="max-width:220px;border:2px solid #ddd;border-radius:8px;padding:8px">
            <p style="font-size:0.9rem;margin-top:0.5rem"><strong>Banco:</strong> Tu banco<br>
            <strong>Cuenta:</strong> 123456789<br>
            <strong>Titular:</strong> Acai Life</p>
          </div>

          <h4 style="margin-top:1.5rem">Horario de Atención</h4>
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
</body>
</html>