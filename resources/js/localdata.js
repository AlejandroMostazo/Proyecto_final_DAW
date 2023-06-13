if (localStorage.getItem('clave_logeado') === 'true') {
    window.location.href = '/publicaciones'; 
}


recuerdame.addEventListener('change', function () {
    var audio = new Audio('Sounds/sound.mp3');
    audio.play();
    if(localStorage.getItem('clave_logeado') === 'false') {
        iconrecuerda.classList.remove('fa-regular');
        iconrecuerda.classList.add('fa-solid');
        localStorage.setItem('clave_logeado', 'true');
        
    } else {
        localStorage.setItem('clave_logeado', 'false');
        iconrecuerda.classList.remove('fa-solid');
        iconrecuerda.classList.add('fa-regular');
    }
});

entrarComoInvitado.addEventListener('click', function () { 
    localStorage.clear();
});


