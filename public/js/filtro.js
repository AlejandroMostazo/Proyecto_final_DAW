/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/verApuntados.js":
/*!**************************************!*\
  !*** ./resources/js/verApuntados.js ***!
  \**************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "verApuntados": () => (/* binding */ verApuntados)
/* harmony export */ });
function verApuntados() {
  var elements = document.getElementsByClassName("border-publicaciones");
  var clickauto = function clickauto() {
    var link = this.querySelector('.verapuntados');
    if (link) {
      window.location.href = link.href;
    }
    console.log("click");
  };
  for (var i = 0; i < elements.length; i++) {
    elements[i].addEventListener('click', clickauto);
  }
}
verApuntados();


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
/*!********************************!*\
  !*** ./resources/js/filtro.js ***!
  \********************************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _verApuntados_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./verApuntados.js */ "./resources/js/verApuntados.js");

activefilters.addEventListener('click', function () {
  var formulario = document.getElementById('formfiltro');
  if (formulario.style.display == 'none' || formulario.style.display == '') {
    formulario.style.display = 'inline';
    filtros.style.background = "#3f3f3f";
  } else {
    formulario.style.display = 'none';
    filtros.style.background = "#151826";
  }
});
$(document).ready(function () {
  var deportes = [];
  var ubicaciones = [];
  var nivel = [];
  var fecha;
  $('input[type="checkbox"], input[type="date"]').on('change', function (e) {
    e.preventDefault();
    deportes = [];
    ubicaciones = [];
    nivel = [];
    fecha = $('#fecha').val();
    $('input[name="deportes[]"]:checked').each(function () {
      deportes.push($(this).val());
    });
    $('input[name="ubicaciones[]"]:checked').each(function () {
      ubicaciones.push($(this).val());
    });
    $('input[name="nivel[]"]:checked').each(function () {
      nivel.push($(this).val());
    });
    filtrar(deportes, ubicaciones, nivel);
  });
  function filtrar(deportes, ubicaciones, nivel) {
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
      url: $('#formfiltro').attr('action'),
      type: 'POST',
      data: {
        _token: csrfToken,
        deportes: deportes,
        ubicaciones: ubicaciones,
        nivel: nivel,
        fecha: fecha
      },
      success: function success(response) {
        var publicaciones = response.publicaciones;
        var user = response.user;
        var tabla = $('#tablaPublicaciones');
        var filas = tabla.find("tr");
        filas.remove();
        publicaciones.forEach(function (publicacion) {
          var apuntarse = "";
          if (user.publicacion_id == null && publicacion.user_id != user.id) {
            apuntarse = '<td ">' + '<form method="POST" action="publicaciones/' + publicacion.id + '/apuntarse">' + '<input type="hidden" name="_token" value="' + csrfToken + '">' + '<button class="icons iconoapuntarse" type="submit"><i style="font-size: xx-large;" class="fa-solid fa-plus"></i></button>' + '</form>' + '</td>';
          }
          var fecha = new Date(publicacion.fecha_hora).toLocaleDateString('es-ES', {
            day: "numeric",
            month: "short",
            year: "numeric",
            hour: "numeric",
            minute: "numeric"
          });
          var row = '<tr class="border-publicaciones">' + '<td class="tdpublicaciones">' + '<i class="' + publicacion.deporte.icono + ' iconosDeportes"></i>' + '<div>' + '<p class="title-publicacion">' + publicacion.deporte.nombre + '</p>' + '<a class="verapuntados" href="publicacion/apuntados' + publicacion.id + '"></a>' + '<p class="text-publicacion"><i class="fa-solid fa-location-dot"></i> ' + publicacion.ubicacion.calle + ', ' + publicacion.ubicacion.localidad + '</p>' + '<p class="text-publicacion"><i class="fa-regular fa-clock"></i> ' + fecha + '</p>' + '</div>' + '</td>' + '<td style="text-align: center;">' + '<div class="principiante inline-flex"></div>' + '<div class="intermedio inline-flex"></div>' + '<div class="profesional inline-block"></div>' + '<p>' + publicacion.nivel + '</p>' + '</td>' + '<td ">' + publicacion.ac_apuntados + '/' + publicacion.num_max_apuntados + '</td>' + apuntarse + +'</tr>';
          tabla.append(row);
        });
        (0,_verApuntados_js__WEBPACK_IMPORTED_MODULE_0__.verApuntados)();
      },
      error: function error(xhr, status, _error) {
        console.log(_error);
      }
    });
  }
});
})();

/******/ })()
;