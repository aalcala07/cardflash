const mix = require('laravel-mix');
const {GenerateSW} = require('workbox-webpack-plugin');

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

mix.setPublicPath('public/')
    .setResourceRoot('../')
    .js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .version()
    .webpackConfig(webpack => {
        return {
            plugins: [
                new GenerateSW({
                    swDest: './service-worker.js',
                    directoryIndex: '/cardflash',
                    // include: [
                    //     '/cardflash'
                    // ],
                    modifyURLPrefix: {
                        '/': ''
                    },
                    // navigateFallback: '/offline.html',
                    // runtimeCaching: [
                    //     {
                    //         handler: 'StaleWhileRevalidate' ,
                    //         urlPattern: '/offline.html'
                    //     }
                    // ]
                })
            ]
        };
    });