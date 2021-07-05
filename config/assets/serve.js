const gulp = require("gulp");
const { browserSyncReload } = require("../api/broweserSync");
const { devImageAssets, devFontAssets } = require("./dev");

function serveAssets() {
    //gulp.watch("src/assets/images/**/*", gulp.series(devImageAssets, browserSyncReload));
    gulp.watch("src/fonts/**/*", gulp.series(devFontAssets, browserSyncReload));
}

module.exports.serveAssets = serveAssets