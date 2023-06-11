    var dropZone = document.getElementById('dropZone');
    var fotoInput = document.getElementById('fotoInput');
    
    dropZone.addEventListener('dragover', function(e) {
        e.preventDefault();
        dropZone.classList.add('dragover');
    });
    
    dropZone.addEventListener('dragleave', function(e) {
        e.preventDefault();
        dropZone.classList.remove('dragover');
    });
    
    dropZone.addEventListener('drop', function(e) {
        e.preventDefault();
        dropZone.classList.remove('dragover');
        
        var files = e.dataTransfer.files;
        if (files.length > 0) {
            fotoInput.files = files;
            dropZone.classList.add('drop');
            if(fotoPerfil) {
                fotoPerfil.submit();
            }
        }
    });

    

    dropZone.addEventListener('click', function () { 
        fotoInput.click();
    });

    fotoInput.addEventListener('change', function() {
        dropZone.classList.add('drop');
        if(fotoPerfil) {
            fotoPerfil.submit();
        }
      });
      
