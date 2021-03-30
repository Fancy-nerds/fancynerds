'use strict';

const gulp = require('gulp');
const plumber = require('gulp-plumber');
const sass = require('gulp-sass');
const cleanCSS = require('gulp-clean-css');
const sourcemaps = require('gulp-sourcemaps');
const shorthand = require('gulp-shorthand');
const autoprefixer = require('gulp-autoprefixer');
const rigger = require('gulp-rigger');
const browsersync = require('browser-sync').create();
const rename = require('gulp-rename');

// BrowserSync
function browserSync(done) {
    browsersync.init({
      server: {
        baseDir: "assets/templates",
        index: "index.html"
      },
      port: 3000
    });
    done();
}
  
// BrowserSync Reload
function browserSyncReload(done) {
    browsersync.reload();
    done();
}

function stylesCommon() {
    return gulp.src('src/sass/*.scss')
        .pipe(plumber())
        .pipe(sourcemaps.init())
        .pipe(sass({
            includePaths: ['node_modules']
        }))
        .pipe(autoprefixer({
            cascade: false
        }))
        .pipe(shorthand())
        .pipe(sourcemaps.write())
        .pipe(gulp.dest('assets/styles/'))
}
    
function styles() {
    return gulp.src('src/sass/blocks/*.scss')
        .pipe(plumber())
        .pipe(sourcemaps.init())
        .pipe(sass({
            includePaths: ['node_modules']
        }))
        .pipe(autoprefixer({
            cascade: false
        }))
        .pipe(shorthand())
        .pipe(sourcemaps.write())
        .pipe(rename( function(file) {
            file.dirname = file.basename;
        }))
        .pipe(gulp.dest('components/blocks'))
}

function stylesPages() {
    return gulp.src('src/sass/pages/*.scss')
        .pipe(plumber())
        .pipe(sourcemaps.init())
        .pipe(sass({
            includePaths: ['node_modules']
        }))
        .pipe(autoprefixer({
            cascade: false
        }))
        .pipe(shorthand())
        // .pipe(cleanCSS({
        //     debug: true,
        //     compatibility: '*'
        // }, details => {
        //     console.log(`${details.name}: Original size:${details.stats.originalSize} - Minified size: ${details.stats.minifiedSize}`)
        // }))
        .pipe(sourcemaps.write())
        .pipe(gulp.dest('assets/styles/pages/'))
}

function template() {
    return gulp.src('src/templates/pages/*.html')
        .pipe(rigger())
        .pipe(gulp.dest('assets/templates'))
}

// Watch files
function watchFiles() {
    gulp.watch("src/sass/blocks/*.scss", gulp.series(styles, browserSyncReload));
    gulp.watch("src/sass/pages/*.scss", gulp.series(stylesPages, browserSyncReload));
    gulp.watch("src/sass/*.scss", gulp.series(stylesCommon, browserSyncReload));
    gulp.watch("src/templates/pages/*.html", gulp.series(template, browserSyncReload));
    // gulp.watch("src/assets/images/**/*", gulp.series(images, browserSyncReload));
    gulp.watch("src/scripts/**/*.js", gulp.series(scripts, browserSyncReload));
}

//Images
function images() {
    return gulp.src('src/assets/images/**/*')
        .pipe(gulp.dest('assets/images/'))
}

//Scripts
function scripts() {
    return gulp.src('src/scripts/*.js')
        .pipe(rigger())

        .pipe(rename( function(file) {
            file.dirname = file.basename;
        }))

        .pipe(gulp.dest('components/blocks'))
}

//Fonts
function fonts() {
    return gulp.src('src/fonts/**/*')
        .pipe(gulp.dest('assets/fonts/'))
}

module.exports.dev = gulp.series(styles, stylesPages, stylesCommon, template, scripts, fonts);
module.exports.watch = gulp.parallel(watchFiles, browserSync);