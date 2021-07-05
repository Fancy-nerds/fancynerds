const gulp = require("gulp");
const { imageAssets, fontAssets } = require("./base");

function devImageAssets() {
  return imageAssets();
}
function devFontAssets() {
  return fontAssets();
}

function devAssets() {
  return gulp.series(devFontAssets);
}

module.exports.devImageAssets = devImageAssets;
module.exports.devFontAssets = devFontAssets;
module.exports.devAssets = devAssets();
