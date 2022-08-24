

const gulp = require('gulp');
const fileinclude = require('gulp-file-include');
const sass = require('gulp-sass');
const formatHtml = require('gulp-format-html');
const through2 = require( 'through2' );    

const touch = () => through2.obj( function( file, enc, cb ) {
    if ( file.stat ) {
        file.stat.atime = file.stat.mtime = file.stat.ctime = new Date();
    }
    cb( null, file );
});

gulp.task('fileinclude', function() {
	//gulp.src(['./html/**/*.html', '!**/_*/**'])
  return gulp.src(['./html/*.html', './html/**/*.html', '!**/_*/**'])
    .pipe(fileinclude({
      prefix: '@@',
      basepath: '@file'
    }))
    .pipe(formatHtml())
    //.pipe( touch() )
    .pipe(gulp.dest('./'));
});

gulp.task('sass', function() {
	//gulp.src(['./html/**/*.html', '!**/_*/**'])
  return gulp.src(['./scss/*.scss'])
    .pipe(sass())
    .pipe(gulp.dest('./css'));
});


gulp.task('watch', function () {
    gulp.watch(['./html/*.html', './html/**/*.html'], gulp.series('fileinclude'));
    gulp.watch(['./scss/*.scss'], gulp.series('sass'));
});

// Default Task
gulp.task('default', gulp.series('fileinclude', 'sass'));
