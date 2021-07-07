const browsersync = require("browser-sync").create();

function browserSync(done) {
  browsersync.init({
    server: {
      baseDir: "assets/templates",
      index: "index.html",
    },
    port: 3000,
  });
  done();
}

function browserSyncReload(done) {
  browsersync.reload();
  done();
}

module.exports.browserSync = browserSync;

module.exports.browserSyncReload = browserSyncReload;
