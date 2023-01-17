'use strict';

// helpers
// https://github.com/gulpjs/gulp
// https://www.webstoemp.com/blog/switching-to-gulp4/

var autoprefixer = require('gulp-autoprefixer'),
		bourbon = require('bourbon').includePaths,
		breakpoint = 'node_modules/breakpoint-sass/stylesheets',
		concat = require('gulp-concat'),
		del = require("del"),
		gracefulFs = require('graceful-fs'),
		gulp = require('gulp'),
		mapStream  = require('map-stream'),
		remtopx  = require('gulp-rem-to-px'),
		notify = require('gulp-notify'),
		plumber = require("gulp-plumber"),
		sass = require('gulp-sass'),
		terser = require('gulp-terser');

var paths = {
	styles: {
		src: [
			'_source/scss/styles.scss',
			'_source/scss/print-qmi.scss',
			'_source/scss/_core/**/*.scss',
			'_source/scss/_elements/**/*.scss',
			'_source/scss/_site/**/*.scss'
		],
		dest: ['assets/css/'],
		inc: [bourbon,breakpoint]
	},
	scripts: {
		src: ['_source/js/_functions.js','_source/js/_plugins.js','_source/js/scripts.js'],
		dest: ['assets/js/']
	}
};

// modified version of https://www.npmjs.com/package/gulp-touch
const updateTimestamp = function (options) {
	return mapStream(function (file, cb) {
		if (file.isNull()) {
			return cb(null, file);
		}
		return gracefulFs.utimes(file.path, new Date(), new Date(), cb.bind(null, null, file));
	});
};

// Clean assets
function clean() {
	return del(paths.scripts.dest,paths.styles.dest);
}

// css
function css() {
	return gulp.src(paths.styles.src)
		.pipe(plumber())
		.pipe(sass({
			outputStyle: 'compressed',
			includePaths: paths.styles.inc
		}).on('error', sass.logError))
		.pipe(autoprefixer())
		.pipe(remtopx({
				fontSize: 10
		 }))
		.pipe(gulp.dest(paths.styles.dest))
		.pipe(updateTimestamp())
		.pipe(notify({ message: 'CSS complete!' }));
}

// js
function scripts() {
	return gulp.src(paths.scripts.src)
		.pipe(plumber())
		.pipe(concat('scripts.js'))
		.pipe(terser())
		.pipe(gulp.dest(paths.scripts.dest))
		.pipe(notify({ message: 'JS complete!' }))
}

// watch
function watch() {
	gulp.watch(paths.styles.src, css);
	gulp.watch(paths.scripts.src, scripts);
}

var build = gulp.series(clean, gulp.parallel(watch, css, scripts));

// declare tasks
exports.clean = clean;
exports.styles = css;
exports.scripts = scripts;
exports.watch = watch;
exports.build = build;

// run 'gulp' cli command
exports.default = build;
