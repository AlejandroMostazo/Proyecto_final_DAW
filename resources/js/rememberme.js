recuerdame.addEventListener('change', function () {
    if(valorRecuperado == 'false') {
        localStorage.setItem('clave_logeado', 'true');
    } else {
        localStorage.setItem('clave_logeado', 'false');
    }
});

entrarComoInvitado.addEventListener('change', function () { 
    localStorage.clear();
});