let carrito = [];

function agregarAlCarrito(producto, precio) {
    carrito.push({ producto, precio });
    actualizarCarrito();
}

function eliminarDelCarrito(index) {
    carrito.splice(index, 1);
    actualizarCarrito();
}

function actualizarCarrito() {
    const carritoLista = document.getElementById('carrito-lista');
    carritoLista.innerHTML = '';

    carrito.forEach((item, index) => {
        const li = document.createElement('li');
        li.innerHTML = `${item.producto} - $${item.precio} <button onclick="eliminarDelCarrito(${index})">Eliminar</button>`;
        carritoLista.appendChild(li);
    });
}

function vaciarCarrito() {
    carrito = [];
    actualizarCarrito();
}
