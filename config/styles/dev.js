const gulp = require("gulp");
const {
  commonStyles,
  acfBlockStyles,
  reactBlockStyles,
  pageStyles,
  shortcodeStyles,
} = require("./base");

function devCommonStyles() {
  return commonStyles();
}
function devAcfBlockStyles() {
  return acfBlockStyles();
}
function devReactBlockStyles() {
  return reactBlockStyles();
}
function devPageStyles() {
  return pageStyles();
}
function devShortcodeStyles() {
  return shortcodeStyles();
}

function devStyles() {
  return gulp.series(
    devCommonStyles,
    devAcfBlockStyles,
    devReactBlockStyles,
    devPageStyles,
    devShortcodeStyles
  );
}

module.exports.devCommonStyles = devCommonStyles;
module.exports.devAcfBlockStyles = devAcfBlockStyles;
module.exports.devReactBlockStyles = devReactBlockStyles;
module.exports.devPageStyles = devPageStyles;
module.exports.devShortcodeStyles = devShortcodeStyles;

module.exports.devStyles = devStyles();
