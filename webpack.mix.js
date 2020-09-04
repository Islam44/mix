const mix = require('laravel-mix');
require('./laravel-mix-tailwind')
//require('./laravel-mix-example');
/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

// mix.js('resources/js/app.js', 'public/js')
// mix.babel(['resources/js/one.js','resources/js/two.js'], 'public/js/all.js')
// mix.postCss('resources/assets/css/app.css', 'public/css',[
//     require('postcss-sorting')({
//         'properties-order':'alphabetical'
//     }),
//     require('postcss-cssnext')
// ]).browserSync({
//     'proxy':'http://127.0.0.1:8000/'
// }).version();
// mix.extend('foo', function(webpackConfig, ...args) {
//   //  console.log(webpackConfig);
//     // the compiled webpack configuration object.
//     console.log(args);
//     // the values passed to mix.foo(); - ['some-value']
// });
// mix.foo('islam-emam')
// mix.extend('foo', new Example());
mix.js('resources/js/app.js', 'public/js')
mix.babel(['resources/js/one.js','resources/js/two.js'], 'public/js/all.js')
mix.postCss('resources/assets/css/app.css', 'public/css',[
    require('postcss-sorting')({
        'properties-order':'alphabetical'
    }),
    require('postcss-cssnext')
]).browserSync({
    'proxy':'http://127.0.0.1:8000/'
}).version().tailwind();

