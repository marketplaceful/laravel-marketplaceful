const mix = require('laravel-mix');
const src = 'resources';
const dest = 'resources/dist';

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

mix.setPublicPath('./resources/dist');

mix.postCss(`${src}/css/dashboard.css`, `${dest}/css`, [
    require('postcss-import'),
    require('tailwindcss'),
    require('autoprefixer'),
]);

if (mix.inProduction()) {
    mix.version();
}
