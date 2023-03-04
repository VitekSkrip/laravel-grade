const mix = require('laravel-mix');
const config = require('./webpack.config');

mix.js('resources/js/app.js', 'public/js')
    .vue()
    .sass('resources/css/app.scss', 'public/css', [
        //
]);
