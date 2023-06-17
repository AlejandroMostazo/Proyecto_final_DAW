import { niveles } from './niveles.js';

var nivel = document.getElementById("nivel");

var parrafo = document.getElementsByClassName('nivel_publicacion');

nivel.addEventListener('change', function () { 
    switch (nivel.value) {
        case '1':
            tres.removeAttribute('selected');
            dos.removeAttribute('selected');
            uno.setAttribute("selected", "");
            parrafo[0].innerHTML = "Principiante";

            var levels = document.getElementsByClassName('levels');
            var levelsArray = Array.from(levels);

            levelsArray.forEach(function(element) {
            element.parentNode.removeChild(element);
            });

            break;
        case '2':
            tres.removeAttribute('selected');
            dos.removeAttribute('selected');
            dos.setAttribute("selected", "");
            parrafo[0].innerHTML = "Intermedio";

            var levels = document.getElementsByClassName('levels');
            var levelsArray = Array.from(levels);

            levelsArray.forEach(function(element) {
            element.parentNode.removeChild(element);
            });
            break;
        case '3':
            uno.removeAttribute('selected');
            dos.removeAttribute('selected');
            tres.setAttribute("selected", "");
            parrafo[0].innerHTML = "Profesional";

            var levels = document.getElementsByClassName('levels');
            var levelsArray = Array.from(levels);

            levelsArray.forEach(function(element) {
            element.parentNode.removeChild(element);
            });
            break;
        }
    niveles();
});