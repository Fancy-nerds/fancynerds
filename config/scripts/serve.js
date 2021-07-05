const gulp = require("gulp");
const { browserSyncReload } = require("../api/broweserSync");
const {
  prodCommonScripts,
  prodBlockScripts,
  prodReactBlockScripts,
} = require("./prod");

function serveScripts() {
  gulp.watch(
    "src/scripts/**/*.js",
    gulp.series(
      prodCommonScripts,
      prodBlockScripts,
      prodReactBlockScripts,
      browserSyncReload
    )
  );
}


module.exports.serveScripts = serveScripts
