const mix = require('laravel-mix');
require('laravel-mix-purgecss');

mix.js('resources/js/app/app.js', 'public/js/app.js')
  .js('resources/js/admin/app.js', 'public/js/admin.js')
  .sass('resources/sass/app/app.scss', 'public/css/app.css')
  .sass('resources/sass/admin/app.scss', 'public/css/admin.css');
  // .purgeCss({
  //   extensions: ['php', 'html']
  // });

