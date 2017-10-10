var Encore = require('@symfony/webpack-encore');

var publicPath = Encore.isProduction() ? '/build' : 'http://localhost/rytis/build';

Encore
    // Directory where all compiled assets will be stored
    .setOutputPath('web/build/')

    // Relative path to build directory
    .setPublicPath(publicPath)
    .setManifestKeyPrefix('build/')

    // Empty outputPath dir before each build
    .cleanupOutputBeforeBuild()

    // Will output as web/build/app.js
    .addEntry('app', './assets/js/app.js')
    .addEntry('default/index', './app/Resources/views/default/index.js')

    // Will output as web/build/style.css
    .addStyleEntry('style', './assets/scss/style.scss')

    // Allow scss to be processed
    .enableSassLoader(function(sassOptions) {}, {
        resolveUrlLoader: false
    })

    // Allow legacy apps to use jQuery as a global variable
    .autoProvidejQuery()

    .enableSourceMaps(!Encore.isProduction())

    // Create hashed filenames
    .enableVersioning()
;

var config = Encore.getWebpackConfig();

config.watchOptions = { poll: true, ignored: /node_modules/ };

module.exports = config;