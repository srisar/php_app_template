let mix = require('webpack-mix');

// mix.autoload({
//     jquery: ['$', 'window.jQuery']
// });

mix.js('src/js/app.js', 'public/js')
    .sass('src/scss/app.scss', 'public/css').sourceMaps();


mix.combine([
    'src/js/libs/jquery-3.5.1.min.js',
    'src/js/libs/bootstrap.min.js',
    'src/js/libs/moment.min.js',
    'src/js/libs/datatables.min.js',
    'src/js/libs/daterangepicker.min.js',
    'src/js/libs/popper.min.js',
    'src/js/libs/toastr.min.js'
], 'public/js/libs/all.js');