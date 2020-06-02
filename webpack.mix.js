let mix = require('webpack-mix');

// mix.config.fileLoaderDirs.fonts = 'public/css/fonts';

mix.js('src/js/app.js', 'public/js')
    .sass('src/scss/app.scss', 'public/css');