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
   .sass('resources/assets/sass/app.scss', 'public/css')
   .sass('resources/assets/less/app.less', 'public/css')
   .sass('resources/assets/sass/sb-admin.scss', 'public/css')
   .js('node_modules/jquery/dist/jquery.js', 'public/js')
   .js('node_modules/jquery/dist/jquery.min.js', 'public/js')
   .less('node_modules/bootstrap-datepicker/build/build_standalone.less', 'public/css/bootstrap-datepicker.css')
   .js('node_modules/bootstrap-datepicker/js/bootstrap-datepicker.js', 'public/js');
   