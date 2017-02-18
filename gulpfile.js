// chosen to comment out wp_enqueue_scripts in function php
// direct hook up to dist folder to get assets
// using MAMP so no need for express server

var gulp = require('gulp'),
	autoprefixer = require('autoprefixer'),
	cssnano = require('cssnano'),
	jshint = require('gulp-jshint'),
	livereload = require('gulp-livereload'),
	postcss = require('gulp-postcss'),
	rename = require('gulp-rename'),
	sass = require('gulp-sass'),
	sourcemaps = require('gulp-sourcemaps'),
	babel = require('gulp-babel'),
	uglify = require('gulp-uglify');


// JAVASCRIPT

// catch mistakes in custom js file
gulp.task('jshint', function() {
	return gulp.src('wp-content/themes/myblog/js/main.js')
		.pipe(jshint())
		.pipe(jshint.reporter('jshint-stylish'));
});

// minify custom js script and place in dist folder
gulp.task('scripts', function() {
	return gulp.src('wp-content/themes/myblog/js/main.js')
		.pipe(sourcemaps.init())
		.pipe(babel({
			presets: ['es2015']
		}).on('error', function(e) {
			console.log(e.message);
			return this.end();
		}))
		.pipe(uglify().on('error', function(e) {
			console.log(e.message);
			return this.end();
		}))
		.pipe(rename('main.min.js'))
		.pipe(sourcemaps.write('./'))
		.pipe(gulp.dest('wp-content/themes/myblog/dist/js/'))
		.pipe(livereload());
});


// SASS / CSS

// compile sass into one css file, minify and place in dist folder
gulp.task('styles', function() {
	var processors = [
		autoprefixer({browsers: ['last 3 versions']}),
		cssnano
	];
	return gulp.src('wp-content/themes/myblog/sass/main.scss')
		.pipe(sass({ outputStyle: 'expanded' })
			.on('error', sass.logError)
		)
		.pipe(sourcemaps.init())
		.pipe(postcss(processors))
		.pipe(rename('main.min.css'))
		.pipe(sourcemaps.write('./'))
		.pipe(gulp.dest('wp-content/themes/myblog/dist/css'))
		.pipe(livereload());
});


// COMMANDS

// currently each task is independent so each type of file will need to be saved once to perform actions
gulp.task('watch', function() {
	livereload.listen({ quiet: true }); // disable console log of reloaded files
	gulp.watch('wp-content/themes/myblog/sass/**', ['styles']);
	gulp.watch('wp-content/themes/myblog/js/main.js', ['jshint', 'scripts']);
});

// register default tasks
gulp.task('default', ['watch'], function() {
	console.log('gulp is watching and will rebuild when changes are made...');
});