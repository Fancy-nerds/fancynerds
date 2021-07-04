const gulp = require("gulp");
const { browserSyncReload } = require("../api/broweserSync");
const { devHtml } = require("./dev");

function serveAssets() {
  gulp.watch(
    "src/templates/pages/*.html",
    gulp.series(devHtml, browserSyncReload)
  );
}

module.exports.serveAssets = serveAssets;
