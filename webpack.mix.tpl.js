
const mix = require('laravel-mix');
const platform = "schoki";
//const webpack = require('webpack');
mix.webpackConfig({
    target: 'node',
    resolve: {
        alias: {
            jquery: "jquery/src/jquery"
        }
    },
    externals: {
        canvas: "commonjs canvas" // Important (2)
    }
});

mix.autoload({
    'jquery': ['jQuery', '$']
})
    .setPublicPath('public_html')
    .js('resources/js/app.js', 'js/app.js')
    .js('resources/js/app-admin.js', 'js/app-admin.js')
    .sass('resources/sass/app-admin.scss', 'css/app-admin.css')
    .sass('resources/sass/red.scss', 'css/red.css')
    .sass('resources/sass/dark.scss', 'css/dark.css')
    .copy('resources/js/admin.js', 'public_html/js')
    .copy('resources/vendor/calendar/zabuto_calendar.min.css', 'public_html/vendor/calendar/css')
    .copy('resources/vendor/calendar/zabuto_calendar.min.js', 'public_html/vendor/calendar/js')
    //    .copy('node_modules/bootstrap-datepicker/dist/css/bootstrap-datepicker.css.map', 'resources/vendor/bootstrap-datepicker/sass')
    .copy('node_modules/bootstrap-datepicker/dist', 'public_html/vendor/bootstrap-datepicker')
    .copy('node_modules/dropzone/dist/min/dropzone.min.js', 'public_html/vendor/dropzone/js')
    .copy('node_modules/dropzone/dist/min/dropzone.min.css', 'public_html/vendor/dropzone/css')
    .copy('node_modules/jstree/dist/jstree.min.js', 'public_html/vendor/jstree/js')
    .copy('node_modules/jstree/dist/jstree.js', 'public_html/vendor/jstree/js')
    .copy('node_modules/jstree/dist/themes', 'public_html/vendor/jstree/css')
    .copy('node_modules/tinymce', 'public_html/vendor/tinymce')
    .copy('node_modules/cropperjs/dist/cropper.css', 'public_html/vendor/cropperjs/css')
    .copy('resources/vendor/tinymce/plugins/responsivefilemanager', 'public_html/vendor/tinymce/plugins/responsivefilemanager')
    .copy('resources/vendor/tinymce/filemanager', 'public_html/vendor/filemanager')
    //    .copy('vendor/recca0120/terminal/public', 'public_html/vendor/terminal')
    .copy('node_modules/leaflet/dist', 'public_html/vendor/leaflet')
;
