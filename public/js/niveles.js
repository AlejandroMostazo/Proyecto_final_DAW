/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	// The require scope
/******/ 	var __webpack_require__ = {};
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
/*!*********************************!*\
  !*** ./resources/js/niveles.js ***!
  \*********************************/
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "niveles": () => (/* binding */ niveles)
/* harmony export */ });
function niveles() {
  var elementosNivel = document.getElementsByClassName('nivel_publicacion');
  for (var i = 0; i < elementosNivel.length; i++) {
    var elemento = elementosNivel[i];
    var nivel = elemento.textContent;
    console.log(nivel);
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
/******/ })()
;