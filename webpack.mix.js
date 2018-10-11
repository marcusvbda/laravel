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
	.js('resources/js/app.js', 'public/js')
   	.sass('resources/sass/app.scss', 'public/css')
   	.sass('resources/sass/backend.scss', 'public/backend/css')
   	.extract(
    [
        'jquery',
        'vue'
    ]).autoload(
    {
        jquery: ['$', 'window.jQuery', 'jQuery'],
    });
