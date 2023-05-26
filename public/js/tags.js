/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!******************************!*\
  !*** ./resources/js/tags.js ***!
  \******************************/
addtag.addEventListener('click', function () {
  if (document.getElementById('nombre').value != '') {
    var container = document.createElement('div');
    var tag = document.createElement('input');
    tag.type = 'text';
    tag.readOnly = true;
    tag.border = 0;
    tag.name = 'tags[]';
    tag.value = document.getElementById('nombre').value;
    tag.size = document.getElementById('nombre').value.length;
    var cruzeta = document.createElement('button');
    cruzeta.textContent = 'X';
    cruzeta.addEventListener('click', function () {
      container.remove();
    });
    container.appendChild(tag);
    container.appendChild(cruzeta);
    var contenedortag = document.getElementById('contenedor-tags');
    contenedortag.appendChild(container);
    document.getElementById('nombre').value = "";
  }
});
/******/ })()
;