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
    mix.sass('app.scss');
    
    mix.scripts([
        'bootstrap.min.js'
    ], 'public/js/bootstrap.js', 'node_modules/bootstrap-sass/assets/javascripts/');
    
    mix.scripts(
    ['switch.js', 'upvote.js'],
    'public/js/addons.js'
);

});
