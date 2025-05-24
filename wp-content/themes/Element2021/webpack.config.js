const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');
const path = require('path');
const webpack = require('webpack');
const {CleanWebpackPlugin} = require('clean-webpack-plugin'); // for deleting all files in output directory

const jsConfig = 'assets/js-webpack';

const outputPath = 'dist';

const localDomain = 'http://local.local/';

let conf = {
    entry: {
        'site': [
            // separate options in "site" entry point's array - for styles and JS
            // if Browsersync is launched with css-only mode (npm run dev:watch-css-only:bs) - webpack will delete second entry point (app-js.js) and will be watching for changes only in .scss files
            path.resolve(__dirname, jsConfig + '/app-styles.js'),
            path.resolve(__dirname, jsConfig + '/app-js.js')
        ]
    },
    output: {
        path: path.resolve(__dirname, outputPath),
        filename: '[name]-bundle.js', // [name] is a feature of webpack to insert entry point name
    },
    plugins: [
        new MiniCssExtractPlugin({ // takes css code from compiled bundle.js code and copies it to separate css file
            filename: '[name]-styles.css',
        }),
        new webpack.ProvidePlugin({
            $: 'jquery',
            jQuery: 'jquery',
        })
    ],
    module: {
        rules: [
            {
                test: /\.s?[c]ss$/i, // regexp for css and scss files
                use: [
                    // css loaders will be launched in reverse order, so first will be sass-loader, after it - css-loader and after that - loader of MiniCssExtractPlugin
                    MiniCssExtractPlugin.loader,
                    {
                        loader: "css-loader",
                        options: {
                            sourceMap: true,
                            url: false // url=false - to tell webpack to not handle URLs and files under URLs in css files (so we can build paths as usually in css - with referring to /dist/site-styles.css as the place where compiled css files are being stored)
                        },
                    },
                    {
                        loader: "sass-loader",
                        options: {
                            sourceMap: true,
                        },
                    },
                ]
            },
            {
                // js loaders to compile js to old format
                test: /\.js$/,
                use: {
                    loader: 'babel-loader',
                    options: {
                        presets: [
                            ['@babel/preset-env', {targets: "defaults"}]
                        ],
                        plugins: ["@babel/plugin-proposal-optional-chaining"]
                    }
                }
            }
        ],
    }
}

module.exports = function (env, options) {

    if (typeof env.useBs !== "undefined") {
        checkBrowserSyncParam(env.useBs);
    }
    if (typeof env.cssOnly !== "undefined") {
        checkCssOnlyParam(env.cssOnly);
    }

    // if (options.mode === 'production' || (options.mode === 'development' && typeof options.watch === "undefined")) {
    //     // rebuilding admin styles only in production or in development + non-watch mode
    //     conf.entry['admin'] = [path.resolve(__dirname, jsConfig + '/admin-app.js')];
    // }

    if (options.mode === 'production') {
        conf.plugins.push(
            new CleanWebpackPlugin() // deletes all files in output directory
        )
        //conf.entry['foundation'] = [path.resolve(__dirname, foundationCssPath + '/style.scss')];
    }

    conf.devtool = options.mode === 'production' ? false : 'source-map'; // disabling source-maps if making production build

    return conf;
};

function checkBrowserSyncParam(param) {
    if (param === 'on') {
        // enabling BrowserSync by adding its instance to plugin's array
        conf.plugins.push(
            new BrowserSyncPlugin({
                proxy: localDomain,
                files: [outputPath + '/*.css', outputPath + '/*.js', '*.php'], // files that BrowserSync will watch updates for
                injectCss: true,
            }, {reload: false}) // pages will not be reloaded to update css (but will be reloaded after update of html/php/js)
        )
    }
}

function checkCssOnlyParam(param) {
    if (param === 'on') {
        // just a note in console for css-only mode
        console.log('\n\n\n-------------- IMPORTANT NOTE! -------------- \n\n ----- NOW ONLY STYLES (.scss FILES) ARE BEING COMPILED (dev:watch-css-only:bs script is running...) ----- \n\n-------------- IMPORTANT NOTE! --------------\n\n\n');
        // making webpack to compile only styles (watch changes for assets ONLY from app-styles.js) by deleting app-js.js from entry array
        conf.entry['site'].splice(1, 1);
    }
}