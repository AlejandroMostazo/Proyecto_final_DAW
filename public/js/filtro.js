/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!********************************!*\
  !*** ./resources/js/filtro.js ***!
  \********************************/
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
        var filas = tabla.find("tr:not(:first)");
        filas.remove();
        publicaciones.forEach(function (publicacion) {
          var apuntarse = "";
          if (user.publicacion_id == null && publicacion.user_id != user.id) {
            apuntarse = '<td class="border px-4 py-2">' + '<form method="POST" action="publicaciones/' + publicacion.id + '/apuntarse">' + '<input type="hidden" name="_token" value="' + csrfToken + '">' + '<button type="submit">Apuntarse</button>' + '</form>' + '</td>';
          }
          var row = '<tr>' + '<td class="border px-4 py-2">' + '<a href="publicacion/apuntados' + publicacion.id + '">VER</a>' + '</td>' + '<td class="border px-4 py-2">' + publicacion.deporte.nombre + '</td>' + '<td class="border px-4 py-2">' + publicacion.nivel + '</td>' + '<td class="border px-4 py-2">' + publicacion.fecha_hora + '</td>' + '<td class="border px-4 py-2">' + publicacion.ubicacion.nombre + '</td>' + '<td class="border px-4 py-2">' + publicacion.ac_apuntados + '</td>' + '<td class="border px-4 py-2">' + publicacion.num_max_apuntados + '</td>' + apuntarse + +'</tr>';
          tabla.append(row);
        });
      },
      error: function error(xhr, status, _error) {
        console.log(_error);
      }
    });
  }
});
/******/ })()
;