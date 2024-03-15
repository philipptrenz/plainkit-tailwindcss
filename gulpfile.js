// gulpfile.js
const gulp = require("gulp");
const browserSync = require("browser-sync");
const postcss = require("gulp-postcss");
const php = require('gulp-connect-php');

const minify = require('gulp-minify');

const paths = [
    "site/**/*.php",
    "site/**/*.css",
    "site/**/*.js",
    "tailwind.config.json",
    "content/**/*.txt",
]


// -------------------------------------
//   Task for compiling our CSS files using PostCSS
// -------------------------------------
gulp.task('postcss', function (cb) {
    return gulp.src("./site/tailwind/*.css") // read .css files from ./src/ folder
        .pipe(postcss()) // compile using postcss
        .pipe(gulp.dest("./public/assets/css")) // paste them in ./assets/css folder
        .pipe(browserSync.stream());
    return cb();
});


// -------------------------------------
//   Bundle JavaScript
// -------------------------------------
gulp.task('js-compress', function() {
    return gulp.src('site/js/*.js')
        .pipe(minify({
            ext: {
                // src:'-debug.js',
                min:'.min.js'
            },
            noSource: true,
            exclude: ['d3'],
            ignoreFiles: ['d3.js', '-min.js']
      }))
      .pipe(gulp.dest('./public/assets/js/dist'))
  });


// -------------------------------------
//   Reloading in Browser
// -------------------------------------
gulp.task('reload', function (cb) {
    browserSync.reload();
    return cb();
});


// -------------------------------------
//   PHP Server
// -------------------------------------
gulp.task('connect', function (done) {
    php.server({
        base: './public/',
        keepalive: true,
        port: 8989,
        router: 'kirby/router.php',
    }, function () {
        browserSync({
            proxy: '127.0.0.1:8989',
            open: false,
            notify: false,
        });
    });
    gulp.watch(paths, { usePolling: true }, gulp.series(gulp.parallel('postcss', 'js-compress'), 'reload'))
    return done();
});

gulp.task('disconnect', function(done) {
    php.closeServer();
    return done();
});

// -------------------------------------
//   Task: clean
// -------------------------------------
gulp.task('clean', function () {
	return del(paths.dist);
});


// -------------------------------------
//   Task: default
// -------------------------------------
gulp.task('default', gulp.series(gulp.parallel('postcss', 'js-compress'), 'connect'));


// -------------------------------------
//   Task: build
// -------------------------------------
gulp.task('build', gulp.series('clean', gulp.parallel('postcss', 'js-compress')));
