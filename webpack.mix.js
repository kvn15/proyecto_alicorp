const mix = require('laravel-mix');

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

mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        //
    ])
    // .sass('resources/sass/style.scss', 'public/css')
    .copyDirectory('resources/fonts', 'public/fonts');

const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
    .sass('public/backend/sass/stylesp.scss', 'public/backend/css/stylesp.scss')
    .browserSync({
        proxy: '192.168.0.100', // Cambia 'tu-sitio.local' por tu URL local
        files: [
            'app/**/*.php',
            'resources/views/**/*.php',
            'public/js/**/*.js',
            'public/css/**/*.css'
        ]
    });
    