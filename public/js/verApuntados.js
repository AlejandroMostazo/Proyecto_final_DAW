/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!**************************************!*\
  !*** ./resources/js/verApuntados.js ***!
  \**************************************/
var elements = document.getElementsByClassName("border-publicaciones");
var myFunction = function myFunction() {
  var link = this.querySelector('.verapuntados');
  if (link) {
    window.location.href = link.href;
  }
  console.log("click");
};
for (var i = 0; i < elements.length; i++) {
  elements[i].addEventListener('click', myFunction);
}
/******/ })()
;