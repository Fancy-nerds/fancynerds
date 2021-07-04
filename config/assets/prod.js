const gulp = require("gulp");
const { imageAssets, fontAssets } = require("./base");

function prodImageAssets() {
  return imageAssets();
}
function prodFontAssets() {
  return fontAssets();
}

function prodAssests() {
  return gulp.series(prodFontAssets);
}

module.exports.prodImageAssets = prodImageAssets;
module.exports.prodFontAssets = prodFontAssets;

module.exports.prodAssests = prodAssests();
