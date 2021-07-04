const gulp = require("gulp");

function imageAssets() {
  return gulp.src("src/assets/images/**/*").pipe(gulp.dest("assets/images/"));
}

function fontAssets() {
  return gulp.src("src/fonts/**/*").pipe(gulp.dest("assets/fonts/"));
}

//Images
module.exports.imageAssets = imageAssets;
//Fonts
module.exports.fontAssets = fontAssets;
