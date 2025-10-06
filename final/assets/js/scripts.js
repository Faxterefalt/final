// scripts.js
document.addEventListener('DOMContentLoaded', function(){
  const filtro = document.getElementById('filtro-categoria');
  const search = document.getElementById('search');
  const items = Array.from(document.querySelectorAll('.menu-item'));
  const productoField = document.getElementById('productoField');
  const openOrderBtns = document.querySelectorAll('.open-order');

  function filterItems(){
    const cat = filtro ? filtro.value.toLowerCase() : 'all';
    const term = search ? search.value.toLowerCase().trim() : '';
    items.forEach(it=>{
      const categoria = it.dataset.categoria.toLowerCase();
      const nombre = it.querySelector('h4').innerText.toLowerCase();
      const matchCat = cat === 'all' || categoria === cat;
      const matchTerm = term === '' || nombre.includes(term);
      it.style.display = (matchCat && matchTerm) ? '' : 'none';
    });
  }
  if(filtro) filtro.addEventListener('change', filterItems);
  if(search) search.addEventListener('input', filterItems);

  openOrderBtns.forEach(b=>{
    b.addEventListener('click', function(e){
      const p = this.dataset.product || '';
      if(productoField) productoField.value = p;
      document.getElementById('contacto').scrollIntoView({behavior:'smooth'});
    });
  });

  const form = document.getElementById('contactForm');
  if(form){
    form.addEventListener('submit', function(e){
      e.preventDefault();
      const data = new FormData(form);
      fetch(location.href, {
        method: 'POST',
        body: data,
        headers: {'X-Requested-With':'XMLHttpRequest'}
      })
      .then(r=>r.json())
      .then(j=>{
        alert(j.message || 'Enviado');
        form.reset();
      })
      .catch(err=>{
        console.error(err);
        alert('Error al enviar. Intentaremos guardar localmente.');
      });
    });
  }
});