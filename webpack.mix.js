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
    .extract(['vue', 'jquery', 'bootstrap', 'axios', 'lodash', 'popper.js']);


mix.sass('resources/sass/app.sass', 'public/css');


mix.browserSync({
    proxy: 'archive.l',
    notify: false,
});



if (mix.inProduction()) {
    mix.version();
}