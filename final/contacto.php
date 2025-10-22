<?php

$whatsapp = "59171234567";

// Definir productos (igual que en menu.php)
$menu = [
    // Fresas con crema - Leche condensada
    ["id"=>1,"categoria"=>"Fresas con Crema","nombre"=>"Fresas con crema (250ml)","precio"=>12,"variante"=>"leche condensada","tamaño"=>"250ml"],
    ["id"=>2,"categoria"=>"Fresas con Crema","nombre"=>"Fresas con crema (350ml)","precio"=>15,"variante"=>"leche condensada","tamaño"=>"350ml"],
    ["id"=>3,"categoria"=>"Fresas con Crema","nombre"=>"Fresas con crema (500ml)","precio"=>20,"variante"=>"leche condensada","tamaño"=>"500ml"],
    ["id"=>4,"categoria"=>"Fresas con Crema","nombre"=>"Fresas con crema (750ml)","precio"=>30,"variante"=>"leche condensada","tamaño"=>"750ml"],

    // Fresas con crema - Nutella
    ["id"=>5,"categoria"=>"Fresas con Crema","nombre"=>"Fresas con crema Nutella (250ml)","precio"=>15,"variante"=>"nutella","tamaño"=>"250ml"],
    ["id"=>6,"categoria"=>"Fresas con Crema","nombre"=>"Fresas con crema Nutella (350ml)","precio"=>18,"variante"=>"nutella","tamaño"=>"350ml"],
    ["id"=>7,"categoria"=>"Fresas con Crema","nombre"=>"Fresas con crema Nutella (500ml)","precio"=>25,"variante"=>"nutella","tamaño"=>"500ml"],
    ["id"=>8,"categoria"=>"Fresas con Crema","nombre"=>"Fresas con crema Nutella (750ml)","precio"=>36,"variante"=>"nutella","tamaño"=>"750ml"],

    // Durazno con crema - Leche condensada
    ["id"=>9,"categoria"=>"Durazno con Crema","nombre"=>"Durazno con crema (250ml)","precio"=>15,"variante"=>"leche condensada","tamaño"=>"250ml"],
    ["id"=>10,"categoria"=>"Durazno con Crema","nombre"=>"Durazno con crema (350ml)","precio"=>18,"variante"=>"leche condensada","tamaño"=>"350ml"],
    ["id"=>11,"categoria"=>"Durazno con Crema","nombre"=>"Durazno con crema (500ml)","precio"=>25,"variante"=>"leche condensada","tamaño"=>"500ml"],
    ["id"=>12,"categoria"=>"Durazno con Crema","nombre"=>"Durazno con crema (750ml)","precio"=>35,"variante"=>"leche condensada","tamaño"=>"750ml"],
    
    // Durazno con crema - Nutella
    ["id"=>13,"categoria"=>"Durazno con Crema","nombre"=>"Durazno con crema Nutella (250ml)","precio"=>18,"variante"=>"nutella","tamaño"=>"250ml"],
    ["id"=>14,"categoria"=>"Durazno con Crema","nombre"=>"Durazno con crema Nutella (350ml)","precio"=>22,"variante"=>"nutella","tamaño"=>"350ml"],
    ["id"=>15,"categoria"=>"Durazno con Crema","nombre"=>"Durazno con crema Nutella (500ml)","precio"=>30,"variante"=>"nutella","tamaño"=>"500ml"],
    ["id"=>16,"categoria"=>"Durazno con Crema","nombre"=>"Durazno con crema Nutella (750ml)","precio"=>40,"variante"=>"nutella","tamaño"=>"750ml"],

    // Fresas con crema + helado - Leche condensada
    ["id"=>17,"categoria"=>"Fresas con Crema + Helado","nombre"=>"Fresas con crema + helado (250ml)","precio"=>15,"variante"=>"leche condensada","tamaño"=>"250ml"],
    ["id"=>18,"categoria"=>"Fresas con Crema + Helado","nombre"=>"Fresas con crema + helado (350ml)","precio"=>20,"variante"=>"leche condensada","tamaño"=>"350ml"],

    // Fresas con crema + helado - Nutella
    ["id"=>19,"categoria"=>"Fresas con Crema + Helado","nombre"=>"Fresas con crema + helado Nutella (250ml)","precio"=>20,"variante"=>"nutella","tamaño"=>"250ml"],
    ["id"=>20,"categoria"=>"Fresas con Crema + Helado","nombre"=>"Fresas con crema + helado Nutella (350ml)","precio"=>25,"variante"=>"nutella","tamaño"=>"350ml"],

    // Arroz con leche - Leche condensada o Dulce de leche
    ["id"=>21,"categoria"=>"Arroz con Leche","nombre"=>"Arroz con leche (250ml)","precio"=>10,"variante"=>"leche condensada/dulce","tamaño"=>"250ml"],
    ["id"=>22,"categoria"=>"Arroz con Leche","nombre"=>"Arroz con leche (350ml)","precio"=>15,"variante"=>"leche condensada/dulce","tamaño"=>"350ml"],
    ["id"=>23,"categoria"=>"Arroz con Leche","nombre"=>"Arroz con leche (500ml)","precio"=>20,"variante"=>"leche condensada/dulce","tamaño"=>"500ml"],
    ["id"=>24,"categoria"=>"Arroz con Leche","nombre"=>"Arroz con leche (750ml)","precio"=>30,"variante"=>"leche condensada/dulce","tamaño"=>"750ml"],

    // Arroz con leche - Nutella
    ["id"=>25,"categoria"=>"Arroz con Leche","nombre"=>"Arroz con leche Nutella (250ml)","precio"=>12,"variante"=>"nutella","tamaño"=>"250ml"],
    ["id"=>26,"categoria"=>"Arroz con Leche","nombre"=>"Arroz con leche Nutella (350ml)","precio"=>17,"variante"=>"nutella","tamaño"=>"350ml"],
    ["id"=>27,"categoria"=>"Arroz con Leche","nombre"=>"Arroz con leche Nutella (500ml)","precio"=>22,"variante"=>"nutella","tamaño"=>"500ml"],
    ["id"=>28,"categoria"=>"Arroz con Leche","nombre"=>"Arroz con leche Nutella (750ml)","precio"=>32,"variante"=>"nutella","tamaño"=>"750ml"],
];

$response = '';
$error = '';
$whatsappUrl = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim($_POST['nombre'] ?? '');
    $telefono = trim($_POST['telefono'] ?? '');
    $mensaje = trim($_POST['mensaje'] ?? '');
    $productos = $_POST['productos'] ?? [];
    
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
    
    // Validar que al menos un producto tenga cantidad > 0
    $productosValidos = array_filter($productos, function($cantidad) {
        return $cantidad > 0;
    });
    
    if (empty($productosValidos)) {
        $errores[] = "Debes seleccionar al menos un producto.";
    }
    
    if (empty($errores)) {
        $fecha = date('Y-m-d H:i:s');
        
        // Construir mensaje para WhatsApp
        $whatsappMessage = "Hola, soy *{$nombre}* y quiero hacer el siguiente pedido:\n\n";
        $whatsappMessage .= "📋 *Productos:*\n";
        
        // Calcular total
        $total = 0;
        $productosTexto = [];
        
        foreach ($productos as $id => $cantidad) {
            if ($cantidad > 0) {
                // Buscar el producto por ID
                foreach ($menu as $item) {
                    if ($item['id'] == $id) {
                        $subtotal = $item['precio'] * $cantidad;
                        $whatsappMessage .= "• {$item['nombre']} × {$cantidad} = {$subtotal} Bs\n";
                        $total += $subtotal;
                        $productosTexto[] = "{$item['nombre']} (×{$cantidad})";
                        break;
                    }
                }
            }
        }
        
        // Guardar en archivo
        $log = "[$fecha] Nombre: $nombre | Tel: +591$telefono | Productos: " . implode(', ', $productosTexto) . " | Total: {$total} Bs | Mensaje: $mensaje" . PHP_EOL;
        file_put_contents(__DIR__ . '/orders.txt', $log, FILE_APPEND);
        
        $whatsappMessage .= "\n💰 *Total: {$total} Bs*\n";
        $whatsappMessage .= "\n📱 *Mi teléfono:* +591{$telefono}\n";
        
        if (!empty($mensaje)) {
            $whatsappMessage .= "\n💬 *Mensaje adicional:*\n{$mensaje}";
        }
        
        // Codificar el mensaje para URL
        $whatsappMessageEncoded = urlencode($whatsappMessage);
        $whatsappUrl = "https://wa.me/{$whatsapp}?text={$whatsappMessageEncoded}";
        
        $response = 'Pedido registrado correctamente. Serás redirigido a WhatsApp en un momento...';
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
  <style>
    .productos-selector {
      margin: 1rem 0;
      padding: 1rem;
      background: #f9f9f9;
      border-radius: 8px;
    }
    .productos-filters {
      display: flex;
      gap: 0.75rem;
      margin-bottom: 1rem;
      flex-wrap: wrap;
    }
    .productos-filters select {
      padding: 0.5rem;
      border-radius: 6px;
      border: 2px solid #ddd;
      font-size: 0.9rem;
      flex: 1;
      min-width: 150px;
    }
    .productos-list {
      max-height: 300px;
      overflow-y: auto;
      border: 2px solid #ddd;
      border-radius: 8px;
      background: #fff;
      padding: 0.5rem;
    }
    .producto-item {
      display: flex;
      align-items: center;
      padding: 0.75rem;
      margin-bottom: 0.5rem;
      background: #fff;
      border: 2px solid #e0e0e0;
      border-radius: 6px;
      transition: all 0.3s ease;
    }
    .producto-item:hover {
      background: #f5f5f5;
      border-color: #667eea;
    }
    .producto-item.selected {
      background: #e3f2fd;
      border-color: #1976d2;
    }
    .producto-info {
      flex: 1;
      margin-right: 1rem;
    }
    .producto-nombre {
      font-weight: 600;
      color: #333;
      margin-bottom: 0.25rem;
    }
    .producto-meta {
      display: flex;
      gap: 0.5rem;
      font-size: 0.85rem;
    }
    .producto-badge {
      padding: 0.2rem 0.5rem;
      border-radius: 4px;
      font-size: 0.75rem;
      font-weight: 700;
    }
    .badge-tamaño {
      background: #fff3e0;
      color: #f57c00;
    }
    .producto-precio {
      font-weight: 700;
      color: #4CAF50;
      font-size: 1.1rem;
      margin-right: 1rem;
    }
    .cantidad-control {
      display: flex;
      align-items: center;
      gap: 0.5rem;
    }
    .cantidad-btn {
      width: 32px;
      height: 32px;
      border: 2px solid #ddd;
      background: #fff;
      border-radius: 6px;
      font-size: 1.2rem;
      font-weight: 700;
      cursor: pointer;
      transition: all 0.3s ease;
      display: flex;
      align-items: center;
      justify-content: center;
      color: #333;
    }
    .cantidad-btn:hover {
      background: #667eea;
      border-color: #667eea;
      color: #fff;
    }
    .cantidad-btn:disabled {
      opacity: 0.3;
      cursor: not-allowed;
    }
    .cantidad-btn:disabled:hover {
      background: #fff;
      border-color: #ddd;
      color: #333;
    }
    .cantidad-display {
      min-width: 40px;
      text-align: center;
      font-weight: 700;
      font-size: 1.1rem;
      color: #333;
    }
    .productos-seleccionados {
      margin-top: 1rem;
      padding: 0.75rem;
      background: #fff;
      border-radius: 6px;
      border: 2px solid #ddd;
    }
    .productos-seleccionados-header {
      font-weight: 700;
      color: #333;
      margin-bottom: 0.5rem;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    .productos-count {
      background: #4CAF50;
      color: #fff;
      padding: 0.25rem 0.75rem;
      border-radius: 12px;
      font-size: 0.85rem;
    }
    .producto-seleccionado-item {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 0.5rem;
      margin-bottom: 0.25rem;
      background: #f5f5f5;
      border-radius: 4px;
      color: #1a1a1a;
      font-weight: 600;
    }
    .producto-seleccionado-item span {
      color: #1a1a1a;
    }
    .btn-remove {
      background: #f44336;
      color: #fff;
      border: none;
      padding: 0.25rem 0.5rem;
      border-radius: 4px;
      cursor: pointer;
      font-size: 0.8rem;
      font-weight: 600;
    }
    .btn-remove:hover {
      background: #d32f2f;
    }
    .total-precio {
      margin-top: 0.75rem;
      padding-top: 0.75rem;
      border-top: 2px solid #ddd;
      text-align: right;
      font-size: 1.2rem;
      font-weight: 700;
      color: #333;
    }
    .empty-selection {
      text-align: center;
      color: #999;
      padding: 1rem;
      font-style: italic;
    }
  </style>
  
  <?php if($whatsappUrl): ?>
  <script>
    // Redirigir automáticamente a WhatsApp después de 2 segundos
    setTimeout(function() {
      window.location.href = '<?=$whatsappUrl?>';
    }, 2000);
  </script>
  <?php endif; ?>
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
    <section class="container contacto">
      <h3>Contacto y Pedidos</h3>
      
      <?php if($response): ?>
        <div class="server-response success">
          <?=htmlspecialchars($response)?>
          <?php if($whatsappUrl): ?>
            <br><br>
            <a href="<?=$whatsappUrl?>" class="btn whatsapp-large" style="display:inline-block;margin-top:0.5rem">
              Abrir WhatsApp ahora
            </a>
          <?php endif; ?>
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
          
          <label>Productos <span style="color:#d32f2f">*</span>
            <div class="productos-selector">
              <div class="productos-filters">
                <select id="filtro-categoria">
                  <option value="all">Todas las categorías</option>
                  <?php
                    $cats = array_unique(array_map(fn($m)=>$m['categoria'],$menu));
                    foreach ($cats as $c) echo "<option value=\"" . htmlspecialchars($c) . "\">" . htmlspecialchars($c) . "</option>";
                  ?>
                </select>
                <select id="filtro-tamaño">
                  <option value="all">Todos los tamaños</option>
                  <option value="250ml">250ml</option>
                  <option value="350ml">350ml</option>
                  <option value="500ml">500ml</option>
                  <option value="750ml">750ml</option>
                </select>
              </div>
              
              <div class="productos-list" id="productos-list">
                <?php foreach($menu as $item): ?>
                  <div class="producto-item" 
                       data-id="<?=$item['id']?>"
                       data-nombre="<?=htmlspecialchars($item['nombre'])?>"
                       data-categoria="<?=htmlspecialchars($item['categoria'])?>"
                       data-tamaño="<?=htmlspecialchars($item['tamaño'])?>"
                       data-precio="<?=$item['precio']?>">
                    <div class="producto-info">
                      <div class="producto-nombre"><?=htmlspecialchars($item['nombre'])?></div>
                      <div class="producto-meta">
                        <span class="producto-badge badge-tamaño"><?=htmlspecialchars($item['tamaño'])?></span>
                      </div>
                    </div>
                    <div class="producto-precio"><?=$item['precio']?> Bs</div>
                    <div class="cantidad-control">
                      <button type="button" class="cantidad-btn" onclick="changeCantidad(<?=$item['id']?>, -1)">−</button>
                      <span class="cantidad-display" id="cantidad-<?=$item['id']?>">0</span>
                      <button type="button" class="cantidad-btn" onclick="changeCantidad(<?=$item['id']?>, 1)">+</button>
                    </div>
                    <input type="hidden" name="productos[<?=$item['id']?>]" id="input-<?=$item['id']?>" value="0">
                  </div>
                <?php endforeach; ?>
              </div>
              
              <div class="productos-seleccionados">
                <div class="productos-seleccionados-header">
                  <span>Productos seleccionados</span>
                  <span class="productos-count" id="productos-count">0</span>
                </div>
                <div id="productos-seleccionados-list">
                  <div class="empty-selection">No has seleccionado ningún producto</div>
                </div>
                <div class="total-precio" id="total-precio" style="display:none;">
                  Total: <span id="total-amount">0</span> Bs
                </div>
              </div>
            </div>
            <span class="error-msg" id="productosError"></span>
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
          
          <button type="submit" class="btn">Enviar pedido</button>
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
    // Objeto para almacenar cantidades
    const cantidades = {};

    // Inicializar cantidades en 0
    document.querySelectorAll('.producto-item').forEach(item => {
      const id = item.getAttribute('data-id');
      cantidades[id] = 0;
    });

    // Función para cambiar cantidad
    function changeCantidad(id, delta) {
      cantidades[id] = Math.max(0, cantidades[id] + delta);
      
      // Actualizar display
      document.getElementById('cantidad-' + id).textContent = cantidades[id];
      
      // Actualizar input hidden
      document.getElementById('input-' + id).value = cantidades[id];
      
      // Actualizar clase selected
      const item = document.querySelector(`.producto-item[data-id="${id}"]`);
      if (cantidades[id] > 0) {
        item.classList.add('selected');
      } else {
        item.classList.remove('selected');
      }
      
      updateSeleccionados();
    }

    // Actualizar productos seleccionados
    function updateSeleccionados() {
      const listElement = document.getElementById('productos-seleccionados-list');
      const totalElement = document.getElementById('total-precio');
      const totalAmountElement = document.getElementById('total-amount');
      const countElement = document.getElementById('productos-count');
      const productosError = document.getElementById('productosError');

      let html = '';
      let total = 0;
      let totalItems = 0;

      Object.keys(cantidades).forEach(id => {
        const cantidad = cantidades[id];
        if (cantidad > 0) {
          const item = document.querySelector(`.producto-item[data-id="${id}"]`);
          const nombre = item.getAttribute('data-nombre');
          const precio = parseInt(item.getAttribute('data-precio'));
          const subtotal = precio * cantidad;
          total += subtotal;
          totalItems += cantidad;
          
          html += `
            <div class="producto-seleccionado-item">
              <span>${nombre} × ${cantidad} = ${subtotal} Bs</span>
              <button type="button" class="btn-remove" onclick="removeCantidad(${id})">✕</button>
            </div>
          `;
        }
      });

      countElement.textContent = totalItems;

      if (totalItems === 0) {
        listElement.innerHTML = '<div class="empty-selection">No has seleccionado ningún producto</div>';
        totalElement.style.display = 'none';
        productosError.textContent = 'Debes seleccionar al menos un producto';
      } else {
        listElement.innerHTML = html;
        totalAmountElement.textContent = total;
        totalElement.style.display = 'block';
        productosError.textContent = '';
      }
    }

    function removeCantidad(id) {
      cantidades[id] = 0;
      document.getElementById('cantidad-' + id).textContent = '0';
      document.getElementById('input-' + id).value = '0';
      const item = document.querySelector(`.producto-item[data-id="${id}"]`);
      item.classList.remove('selected');
      updateSeleccionados();
    }

    // Validación en tiempo real para Nombre
    const nombreInput = document.getElementById('nombre');
    const nombreError = document.getElementById('nombreError');

    nombreInput.addEventListener('input', function(e) {
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

    // Filtrado de productos
    const filtroCategoria = document.getElementById('filtro-categoria');
    const filtroTamaño = document.getElementById('filtro-tamaño');
    const productoItems = document.querySelectorAll('.producto-item');

    function filterProductos() {
      const categoriaSeleccionada = filtroCategoria.value;
      const tamañoSeleccionado = filtroTamaño.value;

      productoItems.forEach(item => {
        const categoria = item.getAttribute('data-categoria');
        const tamaño = item.getAttribute('data-tamaño');

        const matchCategoria = categoriaSeleccionada === 'all' || categoria === categoriaSeleccionada;
        const matchTamaño = tamañoSeleccionado === 'all' || tamaño === tamañoSeleccionado;

        if (matchCategoria && matchTamaño) {
          item.style.display = 'flex';
        } else {
          item.style.display = 'none';
        }
      });
    }

    filtroCategoria.addEventListener('change', filterProductos);
    filtroTamaño.addEventListener('change', filterProductos);

    // Validación al enviar el formulario
    document.getElementById('contactForm').addEventListener('submit', function(e) {
      let valid = true;
      
      if (!/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/.test(nombreInput.value)) {
        nombreError.textContent = 'El nombre solo puede contener letras';
        nombreInput.classList.add('invalid');
        valid = false;
      }
      
      if (!/^\d{8}$/.test(telefonoInput.value)) {
        telefonoError.textContent = 'El teléfono debe tener exactamente 8 dígitos';
        telefonoInput.classList.add('invalid');
        valid = false;
      }

      // Validar que al menos un producto tenga cantidad > 0
      const totalItems = Object.values(cantidades).reduce((sum, val) => sum + val, 0);
      if (totalItems === 0) {
        document.getElementById('productosError').textContent = 'Debes seleccionar al menos un producto';
        valid = false;
      }
      
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