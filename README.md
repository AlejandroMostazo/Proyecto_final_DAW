# Proyecto_final_DAW

### Título: SportMeetUp

### Temática
Es una web de deportes enfocada en crear posts donde anuncian una
reunión con una fecha, lugar y deporte previamente escogidos para
reunir nuevas personas para jugar juntos.

### Como funciona la página de SportMeetUp:

 * Los usuarios registrados podran apuntarse o desapuntarse de una única publicacione o crear una unica publicación donde podran elegir el tipo de deporte, el nivel que se busca en los jugadores, la ubicación donde se realizará, la fecha, la hora y la cantidad de personas que se buscan y que ya iran previamente, el creador de esta podrá editar o eliminar posteriormente la publicación. Además el creador de la publicación se apuntará automáticamente a esta.
 * Como administrador este podrá crear nuevos deportes para que esten acesibles para escoger para crear publicaciones, de foma similar con las ubicaciones.
 * Las vistas a las que todos pueden acceder incluso como invitados son publicaciones, deportes, ubicaciones y noticias.
 * Este poyecto también cuenta con la posibilidad de que cada usuario pueda editar la información de su cuenta.

### Objetivos
 * Login y registro de usuarios.
 * Perfil para los usuarios con sus datos y capacidad de editarlo.
 * Página con todos los posts, para buscarlos y poder apuntarte.
 * Página donde se podrán crear de forma personalizada
    los posts para las quedadad depottivas.
 * Buscador y menú de filtros para los posts.
 * Página de interes deportivo con API.
 * Desplegar la pagina a AWS.

### Back-End
 * JS API Web que rellene datos.
 * Larabel y PHP como MVC.
 * MySQL 
 * Despliegue de la aplicación en AWS
### Front-end
 * CSS3
 * HTML5
 * JS con interacciones con la página.
 * Imágenes SVG
### Mockup
  * [Figma](https://www.figma.com/file/dGRJeVoflwP4UJdbVSi5re/Proyecto-TM1?t=0vOpSHlQzwZyoJ01-0)

### Esquema Entidad Relación
   ![imaen](https://github.com/AlejandroMostazo/Proyecto_final_DAW/blob/main/esquemaEntidadRelacion.png)

### WEB:

    [SportMeetUp](http://3.208.195.87)

### Revisión (checkpoint)
 - Realizado hasta ahora:

 * Creación de migrates, junto con la estructura de la base de datos.
 * Crear y vincular con instancia de base de datos RDS en AWS.
 * Creación de instancia EC2 en AWS configurada con php, composer y Apache2 (no soy capaz de hacer que una vez subido el proyecto este se pueda visualizar).
 * Creación de lógica para login, formularios, para crear publicaciones y añadir Deportes y Ubicaciones (haciendo que solo sea el administrador el que pueda añadir en estad dos últimas) ademas de mostrar el contenido de estas tablas con sus respectivas vistas y rutas.
 * Creación de los controladores y modelos correspondientes.

### Entrega final del Proyecto:

- Todo lo que incluye:

 * Landing page como login que cuenta con un **video, un canvas y un efecto de sonido** que se reproduce al pulsar en "mantener la sesión iniciada".
 * Dentro de la vista para registrarse la página cuenta con un boton que **genera de forma automática** una contraseña segua usando carácteres **aleatorios**.
 * El proyecto cuenta con un **almacenamiento local** donde si pulsas en mantener la sesión se guarda una variable que hace que hasta que no se cierre la sesión cuando accedes a la landing page pase se te redirigira a la página de publicaciones con tu cuenta iniciada. Además hay otra variable más para guardar la preferencia del estado del nav izquierdo (plegado o desplegado).
 * Diferentes vistas para **invitados, administrador y usuarios registrados**, controlados por **middlewares**.
 * Las diferentes vistas tienen sus correspondientes **grupos de rutas**, existe **una plantilla** genérica aplicada a todas las páginas, **componentes dinámicos** como algunos inputs, labels o los links del nav y en todas las páginas donde se muestan datos existe una **paginación**.
 * La pagina cuenta con 2 **animaciones** una que aparece solo cuando se espera a que se reciban los datos del Fetch de una **API** de noticias deportivas y la propia animación del nav vertical.
 * Cada función de **js esta dividida en diferentes archivos** para sus respectivas vistas.
 * Los filtros de las publicaciones funcionan con js haciendo uso de **AJAX**, donde también se integran nuevos objetos en el **DOM** con **appendChild**, al igual que en la página de noticias.
 * Cuenta con un buscador donde podrás buscar por el nombre de deportes o ubicaciones.
 * Para almacenar los dato se utiliza un **RDS** con **MySQL** que esta conectado a la **instancia EC2 donde está desplegado el proyecto**.
 * Para crear las tablas y sus relaciones se han creado sus respectivas **migraciones** y modelos.
 * El diseño fue creado desde 0 en **CSS3** usando la referencia del Figma que hay publicado.
 * Este proyecto cuenta con distintos tipos de **funcionavilidades/interactividades** creadas en js como el efecto del despliegue de los filtros, **drag and drop** para las fotos de usuarios y ubicaciones, etc.
 * Todo el proyecto cuenta con sus respectivas **media querys** para hacer que sea 100% **responsive**. También se emplea el uso de **flexbox** y **grid**.
 * Para el proyecto también se diseñó y creó un icono **SVG** como logo o marca de la página.
 * Por último menciono que la página esta totalmente traducida, con la posibilidad cambiar entre inglés o español. (Los datos de la base de datos he dedidico no traducirlos ya que una vez que creas más no se podran traducir).

 * Tutoriales:
- Desplegar la pagina: https://medium.com/nerd-for-tech/how-to-deploy-laravel-project-on-ec2-aws-6d004a57bb1f

- Para que funcionen las rutas: https://laracasts.com/discuss/channels/servers/laravel-routing-not-working-after-upgrade-of-lamp


