var gulp = require('gulp');
var autoprefixer = require('gulp-autoprefixer');
var bourbon = require('bourbon').includePaths;
var sass = require('gulp-sass');
var watch = require('gulp-watch');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var notify = require('gulp-notify');
var cleanDest = require('gulp-clean-dest');
var pump	= require('pump');

// PATH objects
var paths = {
	js: ['_source/js/*.js'],
	scss: ['./_source/scss/**/*.scss'],
	po: ['./languages/*.po'],
	inc: [bourbon, 'node_modules/susy/sass', 'node_modules/breakpoint-sass/stylesheets', 'node_modules/breakpoint-slicer/stylesheets']
};

// Minify JS
gulp.task('js', function(e) {
	pump([
			gulp.src(paths.js)
			.pipe(cleanDest('assets/js/')),
			concat('scripts.js'),
			uglify(),
			gulp.dest('assets/js/')
		],e)
		.pipe(notify({ message: 'JS complete!' }));
});

// Compile SASS files
gulp.task('sass', function() {
	gulp.src(paths.scss)
		.pipe(cleanDest('assets/css/'))
		.pipe(sass({
			outputStyle: 'compressed',
			includePaths: paths.inc
		}).on('error', sass.logError))
		.pipe(autoprefixer({
			browsers: ['last 2 versions'],
			cascade: false
		}))
		.pipe(gulp.dest("assets/css/"))
		.pipe(notify({ message: 'CSS complete!' }));
});

// Watch
gulp.task("watch", function() {
	watch('_source/scss/**/*.scss', function() { gulp.start('sass'); });
	watch('_source/js/**/*.js', function() { gulp.start('js'); });
});

// Compile all gulp tasks
gulp.task('default', ['js', 'sass', 'watch']);