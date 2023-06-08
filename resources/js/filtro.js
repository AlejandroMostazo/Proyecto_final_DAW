import { verApuntados } from './verApuntados.js';
import { niveles } from './niveles.js';

activefilters.addEventListener('click', function () { 
    var formulario = document.getElementById('formfiltro');
    if(formulario.style.display == 'none' || formulario.style.display == '' ) {
        formulario.style.display = 'inline';
        filtros.style.background = "#3f3f3f";
    } else {
        formulario.style.display = 'none';
        filtros.style.background = "#151826";
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

                    if(user.publicacion_id == null && publicacion.user_id != user.id && publicacion.ac_apuntados < publicacion.num_max_apuntados) {
                        apuntarse = '<td ">' +
                                        '<form method="POST" action="publicaciones/'+publicacion.id+'/apuntarse">' +
                                            '<input type="hidden" name="_token" value="' + csrfToken + '">' +
                                            '<button class="icons iconoapuntarse" type="submit"><i style="font-size: xx-large;" class="fa-solid fa-plus"></i></button>' +
                                        '</form>'+ 
                                    '</td>'
                    }
                    
                    var fecha = new Date(publicacion.fecha_hora).toLocaleDateString('es-ES', { day:"numeric", month:"short", year:"numeric", hour: "numeric", minute: "numeric"}) 

                    var row = '<tr class="border-publicaciones">' +
                            '<td class="tdpublicaciones">' + 
                                '<i style="color:' +  publicacion.deporte.color + '" class="' + publicacion.deporte.icono + ' iconosDeportes"></i>' +
                                '<div>' +
                                    '<p class="title-publicacion">' + publicacion.deporte.nombre + '</p>' +
                                    '<a class="verapuntados" href="publicacion/apuntados' + publicacion.id + '"></a>' +
                                    '<p class="text-publicacion"><i class="fa-solid fa-location-dot"></i> ' + publicacion.ubicacion.calle + ', ' + publicacion.ubicacion.localidad + '</p>' +
                                    '<p class="text-publicacion"><i class="fa-regular fa-clock"></i> ' + fecha + '</p>' +
                                '</div>' +
                            '</td>' +
                            '<td class="contentnivel" style="text-align: center;">' +
                                '<p class="nivel_publicacion">' + publicacion.nivel + '</p>' +
                            '</td>' +
                            '<td ">' + 
                                publicacion.ac_apuntados +
                                '/' +
                                publicacion.num_max_apuntados + 
                            '</td>' +
                            apuntarse +
                            +'</tr>';
            
                    tabla.append(row);
                });
                niveles();
                verApuntados();
            },
            error: function(xhr, status, error) {
                console.log(error);
                
            }
        });
    }
    
});

            