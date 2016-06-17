var elixir = require('laravel-elixir');
var gulp = require('gulp');
var cssnano = require('gulp-cssnano');
var autoprefixer = require('gulp-autoprefixer');
var uglify = require('gulp-uglify');
var imagemin = require('gulp-imagemin');

 /*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.styles([
    		'bootstrap.css',
			'responsive.css',
			'fileinput.min.css',
			'jackedup.css',
			'frontend/style.css',
			'frontend/custom.css',
			'frontend/selectize.css',
			'frontend/selectize.css',
			'frontend/cropper.css',			
			'backend/sb-admin-2.css',
			'backend/timeline.css'
		], 'public/css/all.min.css', 'resources/assets/css/')
    	.sass([
    		'app.scss'
		], 'public/css/allsass.min.css', 'resources/assets/sass/')
        .browserSync({
            proxy: '27colours.local'
        });
});
// optimize js & css and copy to prod
// gulp.task('useref', function() {
//   return gulp.src('index.php')
//         .pipe(useref())
//         .pipe(gulpIf('*.js', uglify()))
//         .pipe(gulpIf('*.css', cssnano()))
//         .pipe(gulpIf('*.css', autoprefixer({
//           browsers: ['last 2 versions']
//         })))
//         .pipe(gulp.dest('prod'))
// })
