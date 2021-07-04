const gulp = require("gulp");
const { browserSyncReload } = require("../api/broweserSync");
const {
  devCommonStyles,
  devAcfBlockStyles,
  devReactBlockStyles,
  devPageStyles,
  devShortcodeStyles,
} = require("./dev");

function serveStyles() {
  gulp.watch(
    "src/sass/blocks/*.scss",
    gulp.series(devAcfBlockStyles, browserSyncReload)
  );
  gulp.watch(
    "src/sass/react-blocks/*.scss",
    gulp.series(devReactBlockStyles, browserSyncReload)
  );
  gulp.watch(
    "src/sass/pages/*.scss",
    gulp.series(devPageStyles, browserSyncReload)
  );
  gulp.watch(
    "src/sass/shortcodes/*.scss",
    gulp.series(devShortcodeStyles, browserSyncReload)
  );
  gulp.watch(
    [
      "src/sass/*.scss",
      "src/sass/mixin/*.scss",
      "src/sass/components/*.scss",
      "src/sass/utils/*.scss",
    ],
    gulp.series(devCommonStyles, browserSyncReload)
  );
};


module.exports.serveStyles = serveStyles
