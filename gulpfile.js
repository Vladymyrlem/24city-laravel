const gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const cleanCSS = require('gulp-clean-css');
const concat = require('gulp-concat');
const uglify = require('gulp-uglify');

// Compile SASS to CSS and minify it
gulp.task('styles', function () {
    return gulp.src('resources/sass/**/*.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(cleanCSS())
        .pipe(gulp.dest('public/css'));
});

// Concatenate and minify JavaScript files
gulp.task('scripts', function () {
    return gulp.src('resources/js/admin.js')
        .pipe(concat('admin.js'))
        .pipe(uglify())
        .pipe(gulp.dest('public/js'));
});

// Watch for changes and run tasks automatically
gulp.task('watch', function () {
    gulp.watch('resources/sass/**/*.scss', gulp.series('styles'));
    gulp.watch('resources/js/**/*.js', gulp.series('scripts'));
});

// Default task: run 'watch' when you run 'gulp' command
gulp.task('default', gulp.series('styles', 'scripts', 'watch'));
