let mix = require('laravel-mix');

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css/vendor.css')
    .styles([
        'public/css/vendor.css',
        'node_modules/select2-bootstrap-theme/dist/select2-bootstrap.css'
    ], 'public/css/app.css').version();
