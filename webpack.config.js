const path = require('path');
const MiniCssExtractPlugin = require("mini-css-extract-plugin")

module.exports = {
    entry: [
        path.resolve(__dirname, 'assets/styles/app.css'),
        path.resolve(__dirname, 'assets/app.js') 
    ],
    output: {
        path: path.resolve(__dirname, 'public/build'),
    },
    module: {
        rules: [
          {
            test: /\.css$/,
            use: [
              MiniCssExtractPlugin.loader,
              'css-loader'
            ]
          }
        ]
    },
    plugins: [new MiniCssExtractPlugin()]

}
