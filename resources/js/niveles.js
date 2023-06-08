export function niveles() {

    var elementosNivel = document.getElementsByClassName('nivel_publicacion');
    
    for (var i = 0; i < elementosNivel.length; i++) {
        var elemento = elementosNivel[i];
        var nivel = elemento.textContent;

        console.log(nivel)
    
        var divPrincipiante = document.createElement('div');
        var divIntermedio = document.createElement('div');
        var divProfesional = document.createElement('div');

        switch (nivel) {
            case 'Principiante':
                divPrincipiante.className = 'levels inline-flex principiante';
                divIntermedio.className = 'levels inline-flex';
                divIntermedio.style.height = '40px';
                divProfesional.className = 'levels inline-flex';
                divProfesional.style.height = '60px';
    
                elemento.parentNode.insertBefore(divPrincipiante, elemento);
                elemento.parentNode.insertBefore(divIntermedio, elemento);
                elemento.parentNode.insertBefore(divProfesional, elemento);
                break;
            case 'Intermedio':
                divPrincipiante.className = 'levels inline-flex principiante';
                divIntermedio.className = 'levels inline-flex intermedio';
                divProfesional.className = 'levels inline-flex';
                divProfesional.style.height = '60px';
    
                elemento.parentNode.insertBefore(divPrincipiante, elemento);
                elemento.parentNode.insertBefore(divIntermedio, elemento);
                elemento.parentNode.insertBefore(divProfesional, elemento);
                break;
            case 'Profesional':
                divPrincipiante.className = 'levels inline-flex principiante';
                divIntermedio.className = 'levels inline-flex intermedio';
                divProfesional.className = 'levels inline-flex profesional';
    
                elemento.parentNode.insertBefore(divPrincipiante, elemento);
                elemento.parentNode.insertBefore(divIntermedio, elemento);
                elemento.parentNode.insertBefore(divProfesional, elemento);
                break;
        }
    }
}

niveles();

