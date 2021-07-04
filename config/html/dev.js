const gulp = require("gulp");
const { html } = require("./base");

function devHtml() {
  return gulp.series(html);
}

module.exports.devHtml = devHtml();
