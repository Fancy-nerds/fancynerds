const gulp = require("gulp");
const { blockScripts, reactBlockScripts, commonScripts } = require("./base");

function devBlockScripts() {
  return blockScripts();
}
function devReactBlockScripts() {
  return reactBlockScripts();
}
function devCommonScripts() {
  return commonScripts();
}

function devScripts() {
  return gulp.series(devCommonScripts, devBlockScripts, devReactBlockScripts);
}

module.exports.devCommonScripts = devCommonScripts;
module.exports.devBlockScripts = devBlockScripts;
module.exports.devReactBlockScripts = devReactBlockScripts;
module.exports.devScripts = devScripts();
