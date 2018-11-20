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

 mix.js('resources/js/backend.js', 'public/backend/js')
 .js('resources/js/frontend.js', 'public/js')
 .js('resources/js/app.js', 'public/js')
 .sass('resources/sass/app.scss', 'public/css')
 .sass('resources/sass/backend.scss', 'public/backend/css')
 .sass('resources/sass/frontend.scss', 'public/frontend/css')
 .extract(
  [
    'jquery',
    "element-ui",
    'vue',
    'datatables.net/js/jquery.dataTables.js',
    'datatables.net-bs4/js/dataTables.bootstrap4.js',
  ]).autoload(
  {
    jquery: ['$', 'window.jQuery', 'jQuery'],
  });
