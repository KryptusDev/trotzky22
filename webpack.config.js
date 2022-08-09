const path = require("path"),
  webpack = require("webpack");

module.exports = {
  mode: 'development',
  context: path.resolve(__dirname, "assets"),
  entry: {
    main: ["./main.js"],
    blocks: ["./blocks.js"],
  },
  output: {
    path: path.resolve(__dirname, "assets/js"),
    filename: "[name].bundle.js",
  },
  module: {
		rules: [
			{
				test: /.jsx$/,
				loader: 'babel-loader',
				exclude: /node_modules/,
			},
		],
	},
  // Uncomment if jQuery support is needed
  /*externals: {
		jquery: 'jQuery'
	},
	plugins: [
		new webpack.ProvidePlugin( {
			$: 'jquery',
			jQuery: 'jquery',
			'window.jQuery': 'jquery',
		} ),
	],*/
  devtool: "source-map",
  watch: true,
};
