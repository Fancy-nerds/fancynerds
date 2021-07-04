const gulp = require("gulp");
const { html } = require("./base");

function prodHtml() {
  return gulp.series(html);
}

module.exports.prodHtml = prodHtml();
