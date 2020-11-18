const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/app-ie8.scss', 'public/css')
    .copyDirectory('resources/js/html5shiv/html5shiv.min.js', 'public/html5shiv')
    .copyDirectory('node_modules/govuk-frontend/govuk/assets', 'public/assets').version();
