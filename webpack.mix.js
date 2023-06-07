const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

 

mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        //
    ]);

mix.js('resources/js/filtro.js', 'public/js');

mix.js('resources/js/tags.js', 'public/js');

mix.js('resources/js/newsapi.js', 'public/js');

mix.js('resources/js/verApuntados.js', 'public/js');

mix.js('resources/js/pswdsecure.js', 'public/js');

mix.js('resources/js/localdata.js', 'public/js');

mix.js('resources/js/rememberme.js', 'public/js');

mix.js('resources/js/niveles.js', 'public/js');

mix.js('resources/js/leftnav.js', 'public/js');