<?php
$whatsapp = "59171234567";

$response = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim($_POST['nombre'] ?? '');
    $telefono = trim($_POST['telefono'] ?? '');
    $mensaje = trim($_POST['mensaje'] ?? '');
    $producto = strip_tags($_POST['producto'] ?? '');
    
    $errores = [];
    
    // Validar nombre: solo letras y espacios
    if (!preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/", $nombre)) {
        $errores[] = "El nombre solo puede contener letras.";
    }
    
    // Validar teléfono: exactamente 8 dígitos
    if (!preg_match("/^\d{8}$/", $telefono)) {
        $errores[] = "El teléfono debe tener exactamente 8 dígitos.";
    }
    
    // Validar mensaje: máximo 400 caracteres
    if (strlen($mensaje) > 400) {
        $errores[] = "El mensaje no puede exceder los 400 caracteres.";
    }
    
    if (empty($errores)) {
        $fecha = date('Y-m-d H:i:s');
        $log = "[$fecha] Nombre: $nombre | Tel: +591$telefono | Producto: $producto | Mensaje: $mensaje" . PHP_EOL;
        file_put_contents(__DIR__ . '/orders.txt', $log, FILE_APPEND);
        $response = 'Gracias por contactarnos. Te responderemos pronto.';
    } else {
        $error = implode(' ', $errores);
    }
}
?><!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Contacto - ACAI LIFE</title>
  <link rel="stylesheet" href="assets/css/common.css" />
  <link rel="stylesheet" href="assets/css/contacto.css" />
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
    <section class="container contacto">
      <h3>Contacto y Pedidos</h3>
      
      <?php if($response): ?>
        <div class="server-response success">
          <?=htmlspecialchars($response)?>
        </div>
      <?php endif; ?>
      
      <?php if($error): ?>
        <div class="server-response error">
          <?=htmlspecialchars($error)?>
        </div>
      <?php endif; ?>
      
      <div class="contact-grid">
        <form method="post" class="form" id="contactForm">
          <label>Nombre
            <input 
              type="text" 
              name="nombre" 
              id="nombre"
              pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+"
              title="Solo se permiten letras"
              maxlength="50"
              required
            >
            <span class="error-msg" id="nombreError"></span>
          </label>
          
          <label>Teléfono / WhatsApp
            <div class="phone-input">
              <span class="phone-prefix">
                <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 3 2'%3E%3Crect width='3' height='0.666' fill='%23d52b1e'/%3E%3Crect y='0.666' width='3' height='0.666' fill='%23fcd116'/%3E%3Crect y='1.333' width='3' height='0.666' fill='%23007a3d'/%3E%3C/svg%3E" alt="Bolivia" class="flag-icon">
                +591
              </span>
              <input 
                type="tel" 
                name="telefono" 
                id="telefono"
                pattern="\d{8}"
                title="Debe contener exactamente 8 dígitos"
                maxlength="8"
                placeholder="71234567"
                required
              >
            </div>
            <span class="error-msg" id="telefonoError"></span>
          </label>
          
          <label>Producto (opcional)
            <input 
              type="text" 
              name="producto"
              maxlength="100"
            >
          </label>
          
          <label>Mensaje
            <textarea 
              name="mensaje" 
              id="mensaje"
              maxlength="400"
              placeholder="Escribe tu mensaje aquí..."
            ></textarea>
            <div class="char-counter">
              <span id="charCount">0</span>/400 caracteres
            </div>
            <span class="error-msg" id="mensajeError"></span>
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

  <script>
    // Validación en tiempo real para Nombre
    const nombreInput = document.getElementById('nombre');
    const nombreError = document.getElementById('nombreError');

    nombreInput.addEventListener('input', function(e) {
      // Solo permite letras y espacios
      this.value = this.value.replace(/[^a-zA-ZáéíóúÁÉÍÓÚñÑ\s]/g, '');
      
      if (this.value.length > 0 && !/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/.test(this.value)) {
        nombreError.textContent = 'Solo se permiten letras';
        this.classList.add('invalid');
      } else {
        nombreError.textContent = '';
        this.classList.remove('invalid');
      }
    });

    // Validación en tiempo real para Teléfono
    const telefonoInput = document.getElementById('telefono');
    const telefonoError = document.getElementById('telefonoError');

    telefonoInput.addEventListener('input', function(e) {
      // Solo permite números
      this.value = this.value.replace(/\D/g, '');
      
      if (this.value.length > 8) {
        this.value = this.value.slice(0, 8);
      }
      
      if (this.value.length > 0 && this.value.length < 8) {
        telefonoError.textContent = `Faltan ${8 - this.value.length} dígitos`;
        this.classList.add('invalid');
      } else {
        telefonoError.textContent = '';
        this.classList.remove('invalid');
      }
    });

    // Contador de caracteres para Mensaje
    const mensajeTextarea = document.getElementById('mensaje');
    const charCount = document.getElementById('charCount');

    mensajeTextarea.addEventListener('input', function(e) {
      const count = this.value.length;
      charCount.textContent = count;
      
      if (count > 400) {
        this.value = this.value.substring(0, 400);
        charCount.textContent = 400;
      }
      
      // Cambiar color cuando se acerca al límite
      if (count >= 380) {
        charCount.style.color = '#d32f2f';
        charCount.style.fontWeight = 'bold';
      } else if (count >= 350) {
        charCount.style.color = '#ff9800';
      } else {
        charCount.style.color = '#666';
        charCount.style.fontWeight = 'normal';
      }
    });

    // Validación al enviar el formulario
    document.getElementById('contactForm').addEventListener('submit', function(e) {
      let valid = true;
      
      // Validar nombre
      if (!/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/.test(nombreInput.value)) {
        nombreError.textContent = 'El nombre solo puede contener letras';
        nombreInput.classList.add('invalid');
        valid = false;
      }
      
      // Validar teléfono
      if (!/^\d{8}$/.test(telefonoInput.value)) {
        telefonoError.textContent = 'El teléfono debe tener exactamente 8 dígitos';
        telefonoInput.classList.add('invalid');
        valid = false;
      }
      
      // Validar mensaje
      if (mensajeTextarea.value.length > 400) {
        valid = false;
      }
      
      if (!valid) {
        e.preventDefault();
      }
    });
  </script>
</body>
</html>