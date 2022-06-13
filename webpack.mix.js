const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

// versioning individual app js files
mix.webpackConfig({
    output: { chunkFilename: "js/app/[name].js?id=[chunkhash]" }
});

mix.js('resources/js/app.js', 'public/js')
    .extract()
    .vue(3)
    .postCss('resources/css/app.css', 'public/css', [
        //
    ])
    .version();
