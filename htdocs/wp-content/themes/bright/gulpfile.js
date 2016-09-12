var gulp        = require('gulp');
var browserSync = require('browser-sync').create();
var sass        = require('gulp-sass');
var plumber = require('gulp-plumber');
var autoprefixer = require('gulp-autoprefixer');
var webpack = require('webpack-stream');

// Static Server + watching scss/html files
gulp.task('serve', ['sass', 'scripts'], function() {

    browserSync.init({
        proxy: "http://bright.dev"
    });

    gulp.watch("./src/styles/**/*.scss", ['sass']);
    gulp.watch("./src/js/**/*.js", ['scripts']);
    gulp.watch("./**/*.php").on('change', browserSync.reload);
});

// Compile sass into CSS & auto-inject into browsers
gulp.task('sass', function() {
    return gulp.src("./src/styles/style.scss")
    	.pipe(plumber())
        .pipe(sass())
		.pipe(autoprefixer({
			browsers: ['last 2 versions'],
			cascade: false
		}))
        .pipe(gulp.dest("./"))
        .pipe(browserSync.stream());
});

gulp.task('scripts', function() {
  return gulp.src('./src/js/app.js')
    .pipe(webpack({
      watch: false,
      output: {
        filename: 'app.js',
      },
      module: {
      	loaders: [{
      		test: /\.js?$/,
      		loader: 'babel-loader',
      		exclude: /(node_modules|bower_components)/,
      		query: {
      			presets: ['es2015', 'stage-0']
      		}
      	}]
      }
    }))
    .pipe(gulp.dest('./js'))
    .pipe(browserSync.stream());
});

gulp.task('default', ['serve']);