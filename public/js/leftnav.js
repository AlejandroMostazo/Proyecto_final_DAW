/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*********************************!*\
  !*** ./resources/js/leftnav.js ***!
  \*********************************/
btnleftnav.addEventListener('click', function () {
  leftnav.style.animation = 'ocultarnav 1s ease';
  footer.style.animation = 'ocultarnav 1s ease';
  burger.style.visibility = '1';
  leftnav.addEventListener('animationend', function () {
    burger.style.transition = 'transform 0.5s';
    burger.style.transform = 'scale(1, 1)';
    leftnav.style.width = '0vw';
    footer.style.width = '0vw';
  });
});
burger.addEventListener('click', function () {
  burger.style.visibility = '1';
  burger.style.transform = 'scale(1, 0.001)';
  burger.style.transition = 'transform 0.5s';
  leftnav.style.animation = 'vernav 1s ease';
  footer.style.animation = 'vernav 1s ease';
  leftnav.addEventListener('animationend', function () {
    burger.style.visibility = '0';
    burger.style.transform = 'scale(1, 0.001)';
    leftnav.style.width = '23vw';
    footer.style.width = '23vw';
  });
});
/******/ })()
;