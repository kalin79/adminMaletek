const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .vue()
    .sass('resources/sass/frontend/main.sass', 'public/frontend/css')
    .options({
		terser: {
			terserOptions: {
				keep_fnames: true,
			},
		},
	})
    .postCss('resources/css/fonts.css', 'public/css', [
        //
    ])