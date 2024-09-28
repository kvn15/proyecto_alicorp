
const gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const autoprefixer = require('autoprefixer');
const postcss = require('gulp-postcss')

function css(){
    return gulp
        .src('resources/sass/style.scss')
        .pipe(postcss([autoprefixer()]))
        .pipe(sass({outputStyle: 'expanded'})) //nested, compact, expanded, compresed
        .pipe(gulp.dest('public/css'))
}

function watchArchivos(){
    gulp.watch('resources/sass/*.scss', css);
    gulp.watch('index.html');
}

//tareas
gulp.task('css',css);
gulp.task('watch',gulp.parallel(watchArchivos));
