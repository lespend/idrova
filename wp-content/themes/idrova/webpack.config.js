const path = require('path');
const HtmlWebpackPlugin = require('html-webpack-plugin');
const { CleanWebpackPlugin } = require('clean-webpack-plugin');
const webpack = require('webpack');
const CopyPlugin = require('copy-webpack-plugin');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');

module.exports = {
    entry: {
        main: path.join(__dirname, 'src/js/main.js'),
    },
    output: {
        path: path.join(__dirname, 'dist'),
        filename: '[name].bundle.js',
        assetModuleFilename: 'assets/[name][ext]',
    },
    plugins: [
        // new HtmlWebpackPlugin({
        //     template: path.join(__dirname, 'src/index.html'),
        //     filename: 'index.html',
        // }),
        new CleanWebpackPlugin(),
        //new webpack.HotModuleReplacementPlugin(),
        new CopyPlugin({
            patterns: [
                {from: 'src/assets', to: 'assets'},
                {from: 'includes/*.php', to: '[path][name].php'},
                {from: '*.php', to: '[name].php'},
            ]
        }),
        new MiniCssExtractPlugin({
            filename: 'style.css',
        }), 
    ],
    mode: 'development',
    module: {
        rules: [
            {
                test: /\.(scss|css)$/,
                use: [MiniCssExtractPlugin.loader, 'css-loader', 'postcss-loader', 'sass-loader'],
            },
            {
                test: /\.(?:ico|gif|png|jpg|jpeg)$/i,
                type: 'asset/resource',
            },
            {
                test: /\.(woff(2)?|eot|ttf|otf|svg|)$/,
                type: 'asset/inline',
            }
        ],
    }
}