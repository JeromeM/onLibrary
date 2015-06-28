var elixir = require('laravel-elixir');
elixir.config.sourcemaps = false;

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {

    // Compilation CSS en SASS
    mix.sass([
        'onlibrary.scss'
    ]);

    // Compilation CoffeeScript
    mix.coffee([
        'authors.coffee',
        'books.coffee'
    ]);

    // 1 seul fichier CSS
    mix.styles([
        'bootstrap.min.css'
    ], 'public/css', 'resources/assets/css');

    // 1 seul fichier JS
    mix.scripts([
        'jquery.min.js',
        'jquery.autocomplete.min.js',
        'bootstrap.min.js'
    ], 'public/js', 'resources/assets/js');

});
