const gulp = require("gulp");
const plumber = require("gulp-plumber");
const rename = require("gulp-rename");
const sass = require("gulp-sass");
const cssnano = require("gulp-cssnano");
const sourcemaps = require("gulp-sourcemaps");
const autoprefixer = require("gulp-autoprefixer");
const gulpif = require("gulp-if");
const { isDev } = require("../api/mode");
const cssConfig = {
  preset: "default",
  discardUnused: {fontFace: false}
};

function createStyleTask(src, out, renameFunc = () => {}) {
  return gulp
    .src(src)
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
    .pipe(rename(renameFunc))
    .pipe(gulp.dest(out));
}

function commonStyles() {
  return createStyleTask("src/sass/*.scss", "assets/styles/");
}

function acfBlockStyles() {
  return createStyleTask(
    "src/sass/blocks/*.scss",
    "components/blocks",
    function (file) {
      file.dirname = file.basename;
    }
  );
}

function reactBlockStyles() {
  return createStyleTask(
    "src/sass/react-blocks/*.scss",
    "components/react-blocks",
    function (file) {
      file.dirname = file.basename.replace(".component", "");
    }
  );
}

function pageStyles() {
  return createStyleTask("src/sass/pages/*.scss", "assets/styles/pages/");
}

function shortcodeStyles() {
  return createStyleTask(
    "src/sass/shortcodes/*.scss",
    "components/shortcodes",
    function (file) {
      file.dirname = file.basename;
    }
  );
}

module.exports.commonStyles = commonStyles;
module.exports.acfBlockStyles = acfBlockStyles;
module.exports.reactBlockStyles = reactBlockStyles;
module.exports.pageStyles = pageStyles;
module.exports.shortcodeStyles = shortcodeStyles;
