"use strict";

const gulp = require("gulp");
const plumber = require("gulp-plumber");
const sass = require("gulp-sass");
const cssnano = require("gulp-cssnano");
const sourcemaps = require("gulp-sourcemaps");
const shorthand = require("gulp-shorthand");
const autoprefixer = require("gulp-autoprefixer");
const rigger = require("gulp-rigger");
const browsersync = require("browser-sync").create();
const gulpif = require("gulp-if");
const rename = require("gulp-rename");
const cssConfig = {
  preset: 'default'
}
// BrowserSync
function browserSync(done) {
  browsersync.init({
    server: {
      baseDir: "assets/templates",
      index: "index.html",
    },
    port: 3000,
  });
  done();
}

// BrowserSync Reload
function browserSyncReload(done) {
  browsersync.reload();
  done();
}

function stylesCommon() {
  return gulp
    .src("src/sass/*.scss")
    .pipe(plumber())
    .pipe(gulpif(isDev, sourcemaps.init()))
    .pipe(
      sass({
        includePaths: ["node_modules"],
      })
    )
    .pipe(
      autoprefixer({
        cascade: false,
      })
    )
    .pipe(cssnano(cssConfig))
    .pipe(gulpif(isDev, sourcemaps.write()))
    .pipe(gulp.dest("assets/styles/"));
}

function stylesACFBlocks() {
  return gulp
    .src("src/sass/blocks/*.scss")
    .pipe(plumber())
    .pipe(gulpif(isDev, sourcemaps.init()))
    .pipe(
      sass({
        includePaths: ["node_modules"],
      })
    )
    .pipe(
      autoprefixer({
        cascade: false,
      })
    )
    .pipe(cssnano(cssConfig))
    .pipe(gulpif(isDev, sourcemaps.write()))
    .pipe(
      rename(function (file) {
        file.dirname = file.basename;
      })
    )
    .pipe(gulp.dest("components/blocks"));
}

function stylesReactBlocks() {
  return gulp
    .src("src/sass/react-blocks/*.scss")
    .pipe(plumber())
    .pipe(gulpif(isDev, sourcemaps.init()))
    .pipe(
      sass({
        includePaths: ["node_modules"],
      })
    )
    .pipe(
      autoprefixer({
        cascade: false,
      })
    )
    .pipe(cssnano(cssConfig))
    .pipe(gulpif(isDev, sourcemaps.write()))
    .pipe(
      rename(function (file) {
        file.dirname = file.basename.replace(".component", "");
      })
    )
    .pipe(gulp.dest("components/react-blocks"));
}

function stylesPages() {
  return (
    gulp
      .src("src/sass/pages/*.scss")
      .pipe(plumber())
      .pipe(gulpif(isDev, sourcemaps.init()))
      .pipe(
        sass({
          includePaths: ["node_modules"],
        })
      )
      .pipe(
        autoprefixer({
          cascade: false,
        })
      )
      .pipe(cssnano(cssConfig))
      .pipe(gulpif(isDev, sourcemaps.write()))
      .pipe(gulp.dest("assets/styles/pages/"))
  );
}

function stylesShortcodes() {
  return gulp
    .src("src/sass/shortcodes/*.scss")
    .pipe(plumber())
    .pipe(gulpif(isDev, sourcemaps.init()))
    .pipe(
      sass({
        includePaths: ["node_modules"],
      })
    )
    .pipe(
      autoprefixer({
        cascade: false,
      })
    )
    .pipe(cssnano(cssConfig))
    .pipe(gulpif(isDev, sourcemaps.write()))
    .pipe(
      rename(function (file) {
        file.dirname = file.basename;
      })
    )
    .pipe(gulp.dest("components/shortcodes"));
}

function template() {
  return gulp
    .src("src/templates/pages/*.html")
    .pipe(rigger())
    .pipe(gulp.dest("assets/templates"));
}

// Watch files
function watchFiles() {
  gulp.watch(
    "src/sass/blocks/*.scss",
    gulp.series(stylesACFBlocks, browserSyncReload)
  );
  gulp.watch(
    "src/sass/react-blocks/*.scss",
    gulp.series(stylesReactBlocks, browserSyncReload)
  );
  gulp.watch(
    "src/sass/pages/*.scss",
    gulp.series(stylesPages, browserSyncReload)
  );
  gulp.watch(
    "src/sass/shortcodes/*.scss",
    gulp.series(stylesShortcodes, browserSyncReload)
  );
  gulp.watch(
    [
      "src/sass/*.scss",
      "src/sass/mixin/*.scss",
      "src/sass/components/*.scss",
      "src/sass/utils/*.scss",
    ],
    gulp.series(stylesCommon, browserSyncReload)
  );
  gulp.watch(
    "src/templates/pages/*.html",
    gulp.series(template, browserSyncReload)
  );
  // gulp.watch("src/assets/images/**/*", gulp.series(images, browserSyncReload));
  gulp.watch(
    "src/scripts/**/*.js",
    gulp.series(
      commonScripts,
      blockScripts,
      reactBlockScripts,
      browserSyncReload
    )
  );
}

//Images
function images() {
  return gulp.src("src/assets/images/**/*").pipe(gulp.dest("assets/images/"));
}

//Scripts
function blockScripts() {
  return gulp
    .src("src/scripts/blocks/*.js")
    .pipe(rigger())

    .pipe(
      rename(function (file) {
        file.dirname = file.basename;
      })
    )

    .pipe(gulp.dest("components/blocks"));
}

function reactBlockScripts() {
  return gulp
    .src("src/scripts/react-blocks/**/*.js")
    .pipe(rigger())
    .pipe(gulp.dest("components/react-blocks"));
}

function commonScripts() {
  return gulp
    .src("src/scripts/*.js")
    .pipe(rigger())
    .pipe(gulp.dest("assets/scripts/"));
}

//Fonts
function fonts() {
  return gulp.src("src/fonts/**/*").pipe(gulp.dest("assets/fonts/"));
}

//Modes
function setDevEnv(cb) {
  process.env.NODE_ENV = "development";
  cb();
}

function setProdEnv(cb) {
  process.env.NODE_ENV = "production";
  cb();
}

function isProd() {
  return process.env.NODE_ENV === "production";
}

function isDev() {
  return process.env.NODE_ENV === "development";
}

module.exports.dev = gulp.series(
  setDevEnv,
  stylesACFBlocks,
  stylesReactBlocks,
  stylesPages,
  stylesCommon,
  stylesShortcodes,
  template,
  blockScripts,
  reactBlockScripts,
  commonScripts,
  fonts
);

module.exports.build = gulp.series(
  setProdEnv,
  stylesACFBlocks,
  stylesReactBlocks,
  stylesPages,
  stylesCommon,
  stylesShortcodes,
  template,
  blockScripts,
  reactBlockScripts,
  commonScripts,
  fonts
);

module.exports.watch = gulp.parallel(setDevEnv, watchFiles, browserSync);
