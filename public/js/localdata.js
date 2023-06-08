/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!***********************************!*\
  !*** ./resources/js/localdata.js ***!
  \***********************************/
if (localStorage.getItem('clave_logeado') === 'true') {
  window.location.href = '/publicaciones';
}
recuerdame.addEventListener('change', function () {
  if (localStorage.getItem('clave_logeado') === 'false') {
    localStorage.setItem('clave_logeado', 'true');
  } else {
    localStorage.setItem('clave_logeado', 'false');
  }
});
entrarComoInvitado.addEventListener('click', function () {
  localStorage.clear();
});
/******/ })()
;