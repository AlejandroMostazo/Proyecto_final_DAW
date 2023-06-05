activefilters.addEventListener('click', function () { 
    var formulario = document.getElementById('formfiltro');
    if(formulario.style.display == 'none' || formulario.style.display == '' ) {
        formulario.style.display = 'inline';
    } else {
        formulario.style.display = 'none';
    }
});

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
                fecha: fecha,
            },
            success: function(response) {

                var publicaciones = response.publicaciones;
                var user = response.user;
                var tabla = $('#tablaPublicaciones');
            
                var filas = tabla.find("tr");
                filas.remove();
            
                publicaciones.forEach(function(publicacion) {

                    var apuntarse = "";

                    if(user.publicacion_id == null && publicacion.user_id != user.id) {
                        apuntarse = '<td ">' +
                                        '<form method="POST" action="publicaciones/'+publicacion.id+'/apuntarse">' +
                                            '<input type="hidden" name="_token" value="' + csrfToken + '">' +
                                            '<button type="submit"><i class="fa-solid fa-plus"></i></button>' +
                                        '</form>'+ 
                                    '</td>'
                    }
                    
                    var row = '<tr class="border-publicaciones">' +
                            '<td ">' +
                                '<a href="publicacion/apuntados/' + publicacion.id + '">VER</a>' +
                            '</td>' +
                            '<td class="title-publicacion">' +
                                '<a href="{{ route(\'apuntados\', [\'id\' => ' + publicacion.id + ']) }}">'
                                + publicacion.deporte.nombre +
                                '</a>' +
                                '<p class="text-publicacion">' + publicacion.ubicacion.nombre + '</p>' +
                                '<p class="text-publicacion">' + publicacion.fecha_hora + '</p>' +
                            '</td>' +
                            '<td style="text-align: center;">' +
                                '<div class="principiante inline-flex"></div>' +
                                '<div class="intermedio inline-flex"></div>' +
                                '<div class="profesional inline-block"></div>' +
                                '<p>' + publicacion.nivel + '</p>' +
                            '</td>' +
                            '<td ">' + publicacion.ac_apuntados + '</td>' +
                            '<td ">' + publicacion.num_max_apuntados + '</td>' +
                            apuntarse +
                            +'</tr>';
            
                    tabla.append(row);
                });
            },
            error: function(xhr, status, error) {
                console.log(error);
                
            }
        });
    }
    
});

            