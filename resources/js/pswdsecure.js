generarpwd.addEventListener('click', function () { 

var pwd = '';

    for (var i = 0; i < 8; i++) {
        caracter = Math.floor(Math.random() * 94) + 33;
        caracter = String.fromCharCode(caracter);
        pwd += caracter;
      }

    password.value = pwd;
    password_confirmation.value = pwd;

    password.type = "text";
    password_confirmation.type = "text";


    if (typeof recordatorio === 'undefined') {
        const p = document.createElement('p');
        p.id = "recordatorio";
        p.textContent = 'Recuerda anotar tu nueva contraseña.';
        document.getElementById("divpwd").appendChild(p);
    }

});