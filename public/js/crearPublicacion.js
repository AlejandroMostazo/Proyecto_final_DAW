/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/niveles.js":
/*!*********************************!*\
  !*** ./resources/js/niveles.js ***!
  \*********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

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

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
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
// This entry need to be wrapped in an IIFE because it need to be isolated against other modules in the chunk.
(() => {
/*!******************************************!*\
  !*** ./resources/js/crearPublicacion.js ***!
  \******************************************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _niveles_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./niveles.js */ "./resources/js/niveles.js");

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
      levelsArray.forEach(function (element) {
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
      levelsArray.forEach(function (element) {
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
      levelsArray.forEach(function (element) {
        element.parentNode.removeChild(element);
      });
      break;
  }
  (0,_niveles_js__WEBPACK_IMPORTED_MODULE_0__.niveles)();
});
})();

/******/ })()
;