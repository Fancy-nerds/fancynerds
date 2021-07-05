const gulp = require("gulp");
const { blockScripts, reactBlockScripts, commonScripts } = require("./base");

function prodBlockScripts() {
  return blockScripts();
}
function prodReactBlockScripts() {
  return reactBlockScripts();
}
function prodCommonScripts() {
  return commonScripts();
}

function prodScripts() {
  return gulp.series(prodCommonScripts, prodBlockScripts, prodReactBlockScripts);
}

module.exports.prodCommonScripts = prodCommonScripts;
module.exports.prodBlockScripts = prodBlockScripts;
module.exports.prodReactBlockScripts = prodReactBlockScripts;
module.exports.prodScripts = prodScripts();
