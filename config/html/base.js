const gulp = require("gulp");
const rigger = require("gulp-rigger");

function html() {
  return gulp
    .src("src/templates/pages/*.html")
    .pipe(rigger())
    .pipe(gulp.dest("assets/templates"));
}

module.exports.html = html;
