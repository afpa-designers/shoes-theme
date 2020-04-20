// Chargement des plugins
var gulp = require('gulp');
var sass = require('gulp-sass'); // => Pour pouvoir charger 'gulp-sass' il faut l'installer via la console
// installer gulp-sass via la console : npm install --save-dev gulp-sass

var minify = require('gulp-minify'); // Minify JS files
var cleanCSS = require('gulp-clean-css'); // Crée un fichier minifié CSS


// Warning ! Cette installation est à réaliser pour chaque plugin supplémentaire (voir doc du plugin en question) !!! 





// Notre script : la liste et la définition des tâches que l'on veut effectuer

// Tache 1 : 'scss' => compiler le SCSS en CSS :
gulp.task('scss', (done) => {
    gulp.src('./penstyle-dev/style.css')
    .pipe(gulp.dest('./penstyle-theme/'));
    gulp.src('./penstyle-dev/assets/scss/main.scss') // Source du fichier que nous voulons traduire en css
    .pipe(sass()) // passer en CSS
    .pipe(cleanCSS({debug: true}, (details) => { //minifier le CSS
      console.log(`${details.name}: ${details.stats.originalSize}`);
      console.log(`${details.name}: ${details.stats.minifiedSize}`);
    }))                      // Appelle de du module sass, qui s'occupe de traduire notre scss en css
    .pipe(gulp.dest('./penstyle-theme/assets/css/'))   // Chemin de destination du fichier une fois compilé en css
    // .pipe(livereload())
    done();
});
gulp.task('php', (done) => {
    gulp.src('./penstyle-dev/**/*.php').pipe(gulp.dest('./penstyle-theme/'));
    done();
    
});
gulp.task('minifyJS', (done) => { // gérer les fichiers JS
  gulp.src('./penstyle-dev/assets/js/*.js')
    .pipe(minify())
    .pipe(gulp.dest('./penstyle-theme/assets/js/'))
    done();
});
// Fonctions de lancement qui execute nos tâches dans un précis
gulp.task('default', gulp.series('scss', 'minifyJS', 'php'));