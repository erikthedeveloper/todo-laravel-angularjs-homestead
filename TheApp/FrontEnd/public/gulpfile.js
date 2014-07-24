var gulp    = require('gulp'),
	jshint  = require('gulp-jshint'),
	concat  = require('gulp-concat'),
	uglify  = require('gulp-uglify'),
	rename  = require('gulp-rename'),
	less    = require('gulp-less'),
	htmlify = require('gulp-angular-htmlify'),
	watch   = require('gulp-watch');

gulp.task('js', function () {
	// Lint, minify, concat, rename
	return gulp.src('app/**/*.js')
		.pipe(jshint())
		.pipe(jshint.reporter('default'))
		.pipe(concat('angular_app.js'))
		.pipe(gulp.dest('dist/assets/js'))
		.pipe(rename({suffix: '.min'}))
		.pipe(uglify())
		.pipe(gulp.dest('dist/assets/js'));
});

gulp.task('css', function () {
	// Compile from less
	return gulp.src('less/**/*.less')
		.pipe(less())
		.pipe(gulp.dest('dist/assets/css'));
});

gulp.task('html', function () {
	// htmlify
	// Hold off on this one until we decide a build pattern for HTML
});

gulp.task('watch', function () {
	// Watch JS
	gulp.watch('app/**/*.js', ['js']);
	// Watch LESS
	gulp.watch('less/**/*.less', ['css']);
	// Watch HTML
});

gulp.task('default', [], function () {
	gulp.start('watch');
});