var elixir = require('laravel-elixir');

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
        .browserSync({
            proxy: '27colours.local'
        });
});
