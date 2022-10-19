const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .sourceMaps();

mix.js('resources/js/laravelmix.js','public/js')
    .postCss('resources/css/laravelmix.css','public/css');

    //multiple files in same public file
mix.js(['resources/js/laravelmix.js','resources/js/laravelmix2.js'],'public/js/commom.js');

// mix.js('resources/admin/js/trashedvideo.js','public/admin/js');
  

   