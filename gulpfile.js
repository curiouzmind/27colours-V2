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
			'style.css',
			'custom.css',
			'selectize.css',
			'fileinput.min.css',
			'/themes/jackedup.css',
			'selectize.css',
			'cropper.css'
		], 'public/css/all.min.css')
    	.browserify()
        .browserSync({
            proxy: '27colours.local'
        });
});
