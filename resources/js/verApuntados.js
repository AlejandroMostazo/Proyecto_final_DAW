function verApuntados() {

    var elements = document.getElementsByClassName("border-publicaciones");
    
    var clickauto = function() {
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

export { verApuntados };
