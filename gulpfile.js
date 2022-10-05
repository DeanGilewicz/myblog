// chosen to comment out wp_enqueue_scripts in function php
// direct hook up to dist folder to get assets
// using MAMP so no need for express server

var gulp = require("gulp"),
	autoprefixer = require("autoprefixer"),
	cssnano = require("cssnano"),
	jshint = require("gulp-jshint"),
	postcss = require("gulp-postcss"),
	rename = require("gulp-rename"),
	sass = require("gulp-sass")(require("sass")),
	sourcemaps = require("gulp-sourcemaps"),
	babel = require("gulp-babel"),
	uglify = require("gulp-uglify");

// JAVASCRIPT

// catch mistakes in custom js file
function jsHint() {
	return gulp
		.src("wp-content/themes/thecodelog/js/main.js")
		.pipe(jshint())
		.pipe(jshint.reporter("jshint-stylish"));
}

// minify custom js script and place in dist folder
function minifyMainJs() {
	return gulp
		.src("wp-content/themes/thecodelog/js/main.js")
		.pipe(sourcemaps.init())
		.pipe(
			babel({
				presets: ["@babel/preset-env"],
			}).on("error", function (e) {
				console.log(e.message);
				return this.end();
			})
		)
		.pipe(
			uglify().on("error", function (e) {
				console.log(e.message);
				return this.end();
			})
		)
		.pipe(rename("main.min.js"))
		.pipe(sourcemaps.write("./"))
		.pipe(gulp.dest("wp-content/themes/thecodelog/dist/js/"));
}

// SASS / CSS

// compile sass into one css file, minify and place in dist folder
function minifyCss() {
	var processors = [autoprefixer(), cssnano];
	return gulp
		.src("wp-content/themes/thecodelog/sass/main.scss")
		.pipe(sass({ outputStyle: "expanded" }).on("error", sass.logError))
		.pipe(sourcemaps.init())
		.pipe(postcss(processors))
		.pipe(rename("main.min.css"))
		.pipe(sourcemaps.write("./"))
		.pipe(gulp.dest("wp-content/themes/thecodelog/dist/css"));
}

// COMMANDS

// currently each task is independent so each type of file will need to be saved once to perform actions
function watchFiles() {
	gulp.watch(
		["wp-content/themes/thecodelog/sass/**"],
		gulp.series(["minifyCss"])
	);
	gulp.watch(
		["wp-content/themes/thecodelog/js/main.js"],
		gulp.series(["jsHint", "minifyMainJs"])
	);
}

// register default tasks
exports.default = gulp.parallel(
	watchFiles,
	minifyCss,
	gulp.series(jsHint, minifyMainJs, function logMessage() {
		console.log("gulp is watching and will rebuild when changes are made...");
	})
);

exports.jsHint = jsHint;
exports.minifyMainJs = minifyMainJs;
exports.minifyCss = minifyCss;
exports.watchFiles = watchFiles;
