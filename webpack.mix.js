let mix = require('laravel-mix');

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

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');
//    .copy('node_modules/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css', 'public/datePicker/css')
//    .copy('node_modules/bootstrap-datepicker/dist/css/bootstrap-datepicker3.standalone.css', 'public/datePicker/css')
//    .copy('node_modules/bootstrap-datepicker/dist/js/bootstrap-datepicker.js', 'public/datePicker/js')
//    .copy('node_modules/bootstrap-datepicker/dist/locales/bootstrap-datepicker.es.min.js', 'public/datePicker/locales');
   