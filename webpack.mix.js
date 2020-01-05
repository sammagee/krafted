const mix = require('laravel-mix');
require('laravel-mix-alias');
require('laravel-mix-purgecss');

mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        require('precss')(),
        require('postcss-each')(),
        require('tailwindcss')
    ])
    .purgeCss({
        whitelistPatterns: [/theme/]
    })
    .alias({
        '@': '/resources/js'
    });
