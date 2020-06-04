let mix = require('webpack-mix');

// mix.config.fileLoaderDirs.fonts = 'public/css/fonts';

mix.autoload({
    jquery: ['$', 'window.jQuery']
});

mix.js('src/js/app.js', 'public/js')
    .sass('src/scss/app.scss', 'public/css');

mix.js([
    'node_modules/@popperjs/core/dist/umd/popper.min.js',
    'node_modules/bootstrap/dist/js/bootstrap.bundle.min.js',
    'src/js/libs/toastr.js'
], 'public/js/libs/libs.js');

