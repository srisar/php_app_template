let mix = require('webpack-mix');

// mix.config.fileLoaderDirs.fonts = 'public/css/fonts';

mix.autoload({
    jquery: ['$', 'window.jQuery']
});

mix.ts('src/js/app.ts', 'public/js')
    .sass('src/scss/app.scss', 'public/css').sourceMaps();

mix.js([
    'node_modules/@popperjs/core/dist/umd/popper.min.js',
    'node_modules/bootstrap/dist/js/bootstrap.bundle.min.js',
    'src/js/libs/toastr.js'
], 'public/js/libs/libs.js');


// mix.ts('src/js/app_test.ts', 'public/js');