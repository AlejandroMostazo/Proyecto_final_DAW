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

/***/ }),

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
/* harmony import */ var _niveles_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./niveles.js */ "./resources/js/niveles.js");


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
document.addEventListener('click', function (event) {
  var formularioUbicaciones = document.getElementById('contentUbicaciones');
  var formularioDeportes = document.getElementById('contentDeportes');
  var formularioDestrezas = document.getElementById('contentDestrezas');
  if (formularioUbicaciones.style.transform == 'scaleY(1)' && !formularioUbicaciones.contains(event.target) && !selctUbicaciones.contains(event.target)) {
    formularioUbicaciones.style.transform = 'scaleY(0)';
  }
  if (!formularioDeportes.contains(event.target) && formularioDeportes.style.transform == 'scaleY(1)' && !selctDeportes.contains(event.target)) {
    formularioDeportes.style.transform = 'scaleY(0)';
  }
  if (!formularioDestrezas.contains(event.target) && formularioDestrezas.style.transform == 'scaleY(1)' && !selctDestreza.contains(event.target)) {
    formularioDestrezas.style.transform = 'scaleY(0)';
  }
});
selctUbicaciones.addEventListener('click', function () {
  var formulario = document.getElementById('contentUbicaciones');
  if (formulario.style.transform == 'scaleY(0)' || formulario.style.transform == '') {
    formulario.style.transform = 'scaleY(1)';
  } else {
    formulario.style.transform = 'scaleY(0)';
  }
});
selctDeportes.addEventListener('click', function () {
  var formulario = document.getElementById('contentDeportes');
  if (formulario.style.transform == 'scaleY(0)' || formulario.style.transform == '') {
    formulario.style.transform = 'scaleY(1)';
  } else {
    formulario.style.transform = 'scaleY(0)';
  }
});
selctDestreza.addEventListener('click', function () {
  var formulario = document.getElementById('contentDestrezas');
  if (formulario.style.transform == 'scaleY(0)' || formulario.style.transform == '') {
    formulario.style.transform = 'scaleY(1)';
  } else {
    formulario.style.transform = 'scaleY(0)';
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
    var isChecked = $(this).is(':checked');
    var label = $('label[for="' + $(this).attr('id') + '"]');
    if (isChecked) {
      label.addClass('active');
    } else {
      label.removeClass('active');
    }
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
  $('button').on('click', function () {
    var checkboxes = $('input[type="checkbox"]');
    checkboxes.each(function () {
      if ($(this).is(':checked')) {
        $(this).trigger('click');
      }
    });
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
          if (user.publicacion_id == null && publicacion.user_id != user.id && publicacion.ac_apuntados < publicacion.num_max_apuntados) {
            apuntarse = '<td ">' + '<form method="POST" action="publicaciones/' + publicacion.id + '/apuntarse">' + '<input type="hidden" name="_token" value="' + csrfToken + '">' + '<button class="icons iconoapuntarse" type="submit"><i style="font-size: xx-large;" class="fa-solid fa-plus"></i></button>' + '</form>' + '</td>';
          }
          var fecha = new Date(publicacion.fecha_hora).toLocaleDateString('es-ES', {
            day: "numeric",
            month: "short",
            year: "numeric",
            hour: "numeric",
            minute: "numeric"
          });
          var row = '<tr class="border-publicaciones">' + '<td class="tdpublicaciones">' + '<i style="color:' + publicacion.deporte.color + '" class="' + publicacion.deporte.icono + ' iconosDeportes"></i>' + '<div>' + '<p class="title-publicacion">' + publicacion.deporte.nombre + '</p>' + '<a class="verapuntados" href="publicacion/apuntados' + publicacion.id + '"></a>' + '<p class="text-publicacion"><i class="fa-solid fa-location-dot"></i> ' + publicacion.ubicacion.calle + ', ' + publicacion.ubicacion.localidad + '</p>' + '<p class="text-publicacion"><i class="fa-regular fa-clock"></i> ' + fecha + '</p>' + '</div>' + '</td>' + '<td class="contentnivel" style="text-align: center;">' + '<p class="nivel_publicacion">' + publicacion.nivel + '</p>' + '</td>' + '<td ">' + publicacion.ac_apuntados + '/' + publicacion.num_max_apuntados + '</td>' + apuntarse + +'</tr>';
          tabla.append(row);
        });
        (0,_niveles_js__WEBPACK_IMPORTED_MODULE_1__.niveles)();
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