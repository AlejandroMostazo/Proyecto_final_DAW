/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!********************************!*\
  !*** ./resources/js/canvas.js ***!
  \********************************/
var canvas = document.getElementById('canvas');
var ctx = canvas.getContext('2d');
function drawShapes() {
  canvas.height = window.innerHeight;
  ctx.fillStyle = '#151826';
  ctx.beginPath();
  ctx.moveTo(0, canvas.height);
  ctx.lineTo(canvas.width, canvas.height);
  ctx.lineTo(canvas.width, 0);
  ctx.closePath();
  ctx.fill();

  // Agregar borde a la línea izquierda
  ctx.lineWidth = 4;
  ctx.strokeStyle = '#F2B705';
  ctx.beginPath();
  ctx.moveTo(0, canvas.height);
  ctx.lineTo(canvas.width, 0);
  ctx.closePath();
  ctx.stroke();
}
window.addEventListener('load', drawShapes);
window.addEventListener('resize', drawShapes);
/******/ })()
;