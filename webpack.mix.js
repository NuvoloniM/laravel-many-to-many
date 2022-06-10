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
    // file nuovo in cui separo front end js
    .js('resources/js/front.js', 'public/js')
    // nuovo file in cui ho messo la logica dell'allert per deletare i msg
    .js('resources/js/deleteMessage.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')    
    .options({processCssUrls: false});
