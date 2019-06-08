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

mix.js('resources/assets/js/bootstrap.js', 'public/js')
    .js('resources/assets/js/app.js', 'public/js')
    .sass('resources/assets/sass/app.scss', 'public/css')
    .js('resources/assets/js/admin.js', 'public/admin/js')
    .sass('resources/assets/sass/admin.scss', 'public/admin/css')
    .sass('resources/assets/sass/loader.scss', 'public/css');

mix.copyDirectory('resources/assets/css', 'public/css');
mix.copyDirectory('resources/assets/js/plugins', 'public/js/plugins');
mix.copyDirectory('resources/assets/fonts', 'public/fonts');
mix.copyDirectory('resources/assets/images', 'public/images');

mix.copy('resources/assets/js/inspinia.js', 'public/js/inspinia.js');

mix.copyDirectory('resources/themes', 'public/themes');


