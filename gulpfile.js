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
    mix.sass('app.scss')// leraya xoi ; anusret balam ema lai abain bo away ba concatenate(.) methodi styles() u scripts() blkenin bam methodawa 

/* wata am nawanay ka la xwarawa nusewmana u hamu aw css anaya ka amanawet bikaina yak 
file u law patha  ./public/css/libs.css daibnein ./ wata root, am xoi teagat ka path akayan
la resource/assets/css nusrawa chunka am methoda .styles() nusrawa u bo filekani js ish 
azanet ka la resource/assets/js dan chunka methodi .scripts() bakarahenin  */
    .styles([
    		'libs/blog-post.css',
    		'libs/bootstrap.css',
    		'libs/font-awesome.css',
    		'libs/metisMenu.css',
    		'libs/sb-admin-2.css'

    	   ], './public/css/libs.css')	


    .scripts([

			'libs/jquery.js',
			'libs/bootstrap.js',
			'libs/metisMenu.js',
			'libs/sb-admin-2.js',
			'libs/scripts.js'


    		], './public/js/libs.js')


});
