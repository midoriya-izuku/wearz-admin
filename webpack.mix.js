const mix = require('laravel-mix');
const UglifyJsPlugin = require('uglifyjs-webpack-plugin');
const webpack = require('webpack');
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
mix.options({
    optimization: {
        minimizer: [new UglifyJsPlugin({
            sourceMap:false,
            uglifyOptions: {

                warnings: false,
                parse: {},
                compress: {
                    warnings:false,
                },
                mangle: true, // Note `mangle.properties` is `false` by default.
                output: null,
                toplevel: false,
                nameCache: null,
                ie8: false,
                keep_fnames: false,
              },
        })
    ],
        
      },
    devtool:
    {
        eval: 'cheap-source-map'
      },
      processCssUrls: false,
      uglify:true
}).webpackConfig({
    
    plugins: [
        new webpack.DefinePlugin({
            'process.env': {
              'NODE_ENV': JSON.stringify('production')
            },
          }),
          new webpack.IgnorePlugin(/^\.\/locale$/, /moment$/)

      ]
      
}); 

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');
