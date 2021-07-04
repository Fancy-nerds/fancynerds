const gulp = require("gulp");
const rigger = require("gulp-rigger");
const rename = require("gulp-rename");

function createScriptTask(src, out, renameFunc = () => {}) {
  return gulp
    .src(src)
    .pipe(rigger())

    .pipe(rename(renameFunc))
    .pipe(gulp.dest(out));
}

function blockScripts() {
  return createScriptTask(
    "src/scripts/blocks/*.js",
    "components/blocks",
    function (file) {
      file.dirname = file.basename;
    }
  );
}

function reactBlockScripts() {
  return createScriptTask(
    "src/scripts/react-blocks/**/*.js",
    "components/react-blocks"
  );
}

function commonScripts() {
  return createScriptTask("src/scripts/*.js", "assets/scripts/");
}

module.exports.blockScripts = blockScripts;
module.exports.reactBlockScripts = reactBlockScripts;
module.exports.commonScripts = commonScripts;
