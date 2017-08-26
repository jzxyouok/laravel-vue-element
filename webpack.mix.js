const { mix } = require('laravel-mix');
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



/*
 * 后台
 */
 mix.styles([
    'node_modules/font-awesome/css/font-awesome.min.css'
], 'public/css/backend/vendor.css').version();

mix.sass('resources/assets/sass/app.scss', 'public/css/backend/app.css').version();
mix.js('resources/assets/js/app.js', 'public/js/backend').version();