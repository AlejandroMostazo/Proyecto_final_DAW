var valorRecuperado = localStorage.getItem('clave_logeado');

if (valorRecuperado === 'true') {
    window.location.href = '/publicaciones'; 
}


