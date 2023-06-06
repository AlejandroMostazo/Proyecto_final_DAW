var valorRecuperado = localStorage.getItem('clave_logeado');

if (valorRecuperado === 'true') {
    window.location.href = '/publicaciones'; 
}


remember.addEventListener('change', function () {
    if(valorRecuperado == 'false') {
        localStorage.setItem('clave_logeado', 'true');
    } else {
        localStorage.setItem('clave_logeado', 'false');
    }
});