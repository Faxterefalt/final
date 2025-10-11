(function() {
  console.log('Iniciando carga de escena 3D...');

  if (typeof THREE === 'undefined') {
    console.error('THREE.js no está cargado. Esperando...');
    setTimeout(arguments.callee, 100);
    return;
  }

  const container = document.getElementById('scene-container');
  if (!container) {
    console.warn('Contenedor scene-container no encontrado');
    return;
  }

  console.log('THREE.js disponible, inicializando escena...');

  const scene = new THREE.Scene();
  
  const camera = new THREE.PerspectiveCamera(
    45, 
    container.clientWidth / container.clientHeight, 
    0.1, 
    1000
  );
  camera.position.set(0, 1, 5);
  camera.lookAt(0, 0, 0);

  const renderer = new THREE.WebGLRenderer({ 
    antialias: true,
    alpha: true
  });
  renderer.setSize(container.clientWidth, container.clientHeight);
  renderer.setPixelRatio(window.devicePixelRatio);
  renderer.setClearColor(0x000000, 0);
  container.appendChild(renderer.domElement);

  console.log('Renderer creado:', container.clientWidth, 'x', container.clientHeight);

  const ambientLight = new THREE.AmbientLight(0xffffff, 0.8);
  scene.add(ambientLight);

  const directionalLight1 = new THREE.DirectionalLight(0xffffff, 1.0);
  directionalLight1.position.set(5, 10, 7);
  scene.add(directionalLight1);

  const directionalLight2 = new THREE.DirectionalLight(0xffffff, 0.6);
  directionalLight2.position.set(-5, 5, -5);
  scene.add(directionalLight2);

  const hemisphereLight = new THREE.HemisphereLight(0xffffff, 0x444444, 0.6);
  hemisphereLight.position.set(0, 20, 0);
  scene.add(hemisphereLight);

  const tempGeometry = new THREE.BoxGeometry(1.5, 1.5, 1.5);
  const tempMaterial = new THREE.MeshStandardMaterial({ 
    color: 0xff1493,
    metalness: 0.5,
    roughness: 0.3
  });
  const tempCube = new THREE.Mesh(tempGeometry, tempMaterial);
  tempCube.position.set(0, 0, 0);
  scene.add(tempCube);
  console.log(' Cubo temporal añadido');


  let model = null;
  let isLoading = true;

  const loader = new THREE.GLTFLoader();
  
  console.log('Cargando modelo desde: assets/img/x.glb');
  
  loader.load(
    'assets/img/modelos3d/fresas_con_crema.glb',
    function (gltf) {
      console.log('Modelo cargado exitosamente');
      model = gltf.scene;
      
      scene.remove(tempCube);
      isLoading = false;
      
      const box = new THREE.Box3().setFromObject(model);
      const size = box.getSize(new THREE.Vector3());
      const center = box.getCenter(new THREE.Vector3());
      
      console.log('Tamaño del modelo:', size);
      console.log('Centro del modelo:', center);
      
      const maxDim = Math.max(size.x, size.y, size.z);
      const scale = 2.5 / maxDim;
      model.scale.setScalar(scale);
      
      console.log('Escala aplicada:', scale);
      
      model.position.x = -center.x * scale;
      model.position.y = -center.y * scale;
      model.position.z = -center.z * scale;
      
      scene.add(model);
      console.log('Modelo añadido y centrado en la escena');
      
      const distance = maxDim * scale * 2;
      camera.position.set(0, distance * 0.3, distance);
      camera.lookAt(0, 0, 0);
    },
    function (xhr) {
      const percent = (xhr.loaded / xhr.total * 100).toFixed(0);
      console.log(`Progreso: ${percent}%`);
    },
    function (error) {
      console.error('Error al cargar el modelo:', error);
      isLoading = false;
    }
  );

  function animate() {
    requestAnimationFrame(animate);
    
    if (model) {
      model.rotation.y += 0.01;
    } else if (isLoading && tempCube) {
      tempCube.rotation.x += 0.01;
      tempCube.rotation.y += 0.02;
    }
    
    renderer.render(scene, camera);
  }
  
  animate();
  console.log('Animación iniciada');

  window.addEventListener('resize', function() {
    const width = container.clientWidth;
    const height = container.clientHeight;
    
    camera.aspect = width / height;
    camera.updateProjectionMatrix();
    renderer.setSize(width, height);
  });
})();