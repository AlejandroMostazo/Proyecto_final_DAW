const deportesFavoritos = document.getElementById('deportes-favoritos');

let draggedItem = null;

deportesFavoritos.addEventListener('dragstart', function (event) {
    draggedItem = event.target;
    event.dataTransfer.effectAllowed = 'move';
    event.dataTransfer.setData('text/html', draggedItem.innerHTML);
});

deportesFavoritos.addEventListener('dragover', function (event) {
    event.preventDefault();
});

deportesFavoritos.addEventListener('dragenter', function (event) {
    if (event.target.tagName === 'LI') {
        event.target.classList.add('dragover');
    }
});

deportesFavoritos.addEventListener('dragleave', function (event) {
    if (event.target.tagName === 'LI') {
        event.target.classList.remove('dragover');
    }
});

deportesFavoritos.addEventListener('drop', function (event) {
    event.preventDefault();
    if (event.target.tagName === 'LI') {
        event.target.classList.remove('dragover');
        draggedItem.innerHTML = event.target.innerHTML;
        event.target.innerHTML = event.dataTransfer.getData('text/html');

        // Obtener el ID del deporte movido
        const deporteId = draggedItem.getAttribute('data-id');
        
        // Obtener el nuevo orden de los deportes favoritos
        const deportesOrdenados = Array.from(deportesFavoritos.children).map(function (deporte) {
            return deporte.getAttribute('data-id');
        });

        // Realizar una solicitud AJAX para actualizar el orden en el servidor
        axios.post('/actualizar-orden-deportes-fav', {
            deporteId: deporteId,
            deportesOrdenados: deportesOrdenados
        })
        .then(function (response) {
            // Actualizar la interfaz o mostrar un mensaje de éxito si es necesario
        })
        .catch(function (error) {
            // Mostrar un mensaje de error o realizar alguna acción en caso de error
        });
    }
});
