/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*********************************!*\
  !*** ./resources/js/leftnav.js ***!
  \*********************************/
function mediaQuery(x) {
  if (x.matches) {
    // If media query matches
    btnleftnav.click();
  } else {
    burger.click();
  }
}
var x = window.matchMedia("(max-width: 610px)");
function handleResize() {
  mediaQuery(x);
}

// Agrega el evento de redimensionamiento para llamar a handleResize solo cuando se redimensiona la ventana
window.addEventListener('resize', handleResize);
btnleftnav.addEventListener('click', function () {
  localStorage.setItem('navhidden', 'true');
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
  localStorage.setItem('navhidden', 'false');
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
if (localStorage.getItem('navhidden') === 'true') {
  burger.style.transform = 'scale(1, 1)';
  leftnav.style.width = '0vw';
  footer.style.width = '0vw';
} else {
  burger.style.visibility = '0';
  leftnav.style.width = '23vw';
  footer.style.width = '23vw';
}
/******/ })()
;