/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!***********************************!*\
  !*** ./resources/js/localdata.js ***!
  \***********************************/
var valorRecuperado = localStorage.getItem('clave_logeado');
if (valorRecuperado === 'true') {
  window.location.href = '/publicaciones';
}
/******/ })()
;