// gulpfile.js
const gulp = require("gulp");
const browserSync = require("browser-sync");
const postcss = require("gulp-postcss");
const php = require('gulp-connect-php');

const paths = [
    "site/**/*.css",
    "tailwind.config.json",
    "site/**/*.php"
]

// -------------------------------------
//   Task for compiling our CSS files using PostCSS
// -------------------------------------
gulp.task('reload', function (cb) {
    browserSync.reload();
    return cb();
});

gulp.task('postcss', function (cb) {
    return gulp.src("./site/tailwind/*.css") // read .css files from ./src/ folder
        .pipe(postcss()) // compile using postcss
        .pipe(gulp.dest("./assets/css")) // paste them in ./assets/css folder
        .pipe(browserSync.stream());
    return cb();
});

// -------------------------------------
//   Task for minifying images
// -------------------------------------
gulp.task('reload', function (cb) {
    browserSync.reload();
    return cb();
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
        port: 8989,
        router: 'kirby/router.php',
    }, function () {
        browserSync({
            proxy: 'localhost:8989',
            open: false,
            notify: false,
        });
    });
    gulp.watch(paths, { usePolling: true }, gulp.series(gulp.parallel('postcss'), 'reload'))
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
gulp.task('default', gulp.series(gulp.parallel('postcss' /*, 'images'*/), 'connect'));


// -------------------------------------
//   Task: build
// -------------------------------------
gulp.task('build', gulp.series('clean', gulp.parallel('postcss' /*, 'images'*/)));
