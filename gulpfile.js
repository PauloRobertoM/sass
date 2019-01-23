var gulp = require('gulp');
var sass = require('gulp-sass');
var rename = require('gulp-rename');

var scssFiles = './css/estilos.scss';
var cssDest = './css';
var sassProdOptions = {
  outputStyle: 'compressed'
}

gulp.task('sassprod', function() {
  return gulp.src(scssFiles)
    .pipe(sass(sassProdOptions).on('error', sass.logError))
    .pipe(rename('estilos.min.css'))
    .pipe(gulp.dest(cssDest));
});

gulp.task('watch', function() {
  gulp.watch(scssFiles, ['sassprod']);
});

gulp.task('default', ['sassprod', 'watch']);