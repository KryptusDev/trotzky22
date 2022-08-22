const gulp = require("gulp"),
  fancylog = require("fancy-log"),
  browserSync = require("browser-sync"),
  server = browserSync.create(),
  dev_url = "http://trotzkistisches-archiv.test/";

/**
 * Define all source paths
 */

var paths = {
  styles: {
    src: "./assets/*.scss",
    dest: "./assets/css",
  },
  scripts: {
    src: ["./assets/*.js", './assets/gutenberg/*'],
    dest: "./assets/js",
  },
};

/**
 * Webpack compilation: http://webpack.js.org, https://github.com/shama/webpack-stream#usage-with-gulp-watch
 *
 * build_js()
 */

function build_js() {
  const compiler = require("webpack"),
    webpackStream = require("webpack-stream");

  return gulp
    .src(paths.scripts.src)
    .pipe(
      webpackStream(
        {
          config: require("./webpack.config.js"),
        },
        compiler
      )
    )
    .pipe(gulp.dest(paths.scripts.dest))
    .pipe(
      server.stream() // Browser Reload
    );
}

/**
 * SASS-CSS compilation: https://www.npmjs.com/package/gulp-sass
 *
 * build_css()
 */

function build_css() {
  const sass = require("gulp-sass")(require("sass")),
    postcss = require("gulp-postcss"),
    sourcemaps = require("gulp-sourcemaps"),
    autoprefixer = require("autoprefixer"),
    cssnano = require("cssnano");

  const plugins = [autoprefixer(), cssnano()];

  return gulp
    .src(paths.styles.src)
    .pipe(sourcemaps.init())
    .pipe(sass().on("error", sass.logError))
    .pipe(postcss(plugins))
    .pipe(sourcemaps.write("./"))
    .pipe(gulp.dest(paths.styles.dest))
    .pipe(
      server.stream() // Browser Reload
    );
}

function reload_php() {
  server.reload();
}

/**
 * Move bootstrao fonts form /node_modules to /assets/fonts/bootstrap-icons
 */
gulp.task("bootstrap-fonts", function () {
  return gulp
    .src([
      "./node_modules/bootstrap-icons/**/*",
      "!./node_modules/bootstrap-icons/package.json",
      "!./node_modules/bootstrap-icons/README.md",
    ])
    .pipe(gulp.dest("./assets/bootstrap-icons"));
});

gulp.task(
  "watch",
  gulp.series("bootstrap-fonts", function () {
    // Modify "dev_url" constant and uncomment "server.init()" to use browser sync
    server.init({
      proxy: dev_url,
    });

    gulp.watch(paths.scripts.src, build_js);
    gulp.watch([paths.styles.src, "./assets/scss/*.scss", "./assets/scss/modules/*.scss"], build_css);
    gulp.watch("**/*.php", reload_php);
  })
);
