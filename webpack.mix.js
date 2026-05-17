const mix = require('laravel-mix');

mix.override(config => {
    if (config && Array.isArray(config.plugins)) {
        config.plugins = config.plugins.filter(p => {
            const name = p && p.constructor && p.constructor.name;
            return !(name && name.toLowerCase().includes('webpackbar'));
        });
    }
});
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
