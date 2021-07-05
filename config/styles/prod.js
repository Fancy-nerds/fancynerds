const gulp = require("gulp");
const {
  commonStyles,
  acfBlockStyles,
  reactBlockStyles,
  pageStyles,
  shortcodeStyles,
} = require("./base");

function prodCommonStyles() {
  return commonStyles();
}
function prodAcfBlockStyles() {
  return acfBlockStyles();
}
function prodReactBlockStyles() {
  return reactBlockStyles();
}
function prodPageStyles() {
  return pageStyles();
}
function prodShortcodeStyles() {
  return shortcodeStyles();
}

function prodStyles() {
  return gulp.series(
    prodCommonStyles,
    prodAcfBlockStyles,
    prodReactBlockStyles,
    prodPageStyles,
    prodShortcodeStyles
  );
}

module.exports.prodCommonStyles = prodCommonStyles;
module.exports.prodAcfBlockStyles = prodAcfBlockStyles;
module.exports.prodReactBlockStyles = prodReactBlockStyles;
module.exports.prodPageStyles = prodPageStyles;
module.exports.prodShortcodeStyles = prodShortcodeStyles;

module.exports.prodStyles = prodStyles();
