let mix = require('webpack-mix');

// mix.config.fileLoaderDirs.fonts = 'public/css/fonts';

mix.js('src/js/app.js', 'public/js')
    .sass('src/scss/app.scss', 'public/css');

mix.js([
    'node_modules/@popperjs/core/dist/umd/popper.min.js',
    'node_modules/bootstrap/dist/js/bootstrap.bundle.min.js'
], 'public/js/libs/libs.js');