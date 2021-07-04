const browsersync = require("browser-sync").create();

module.exports.browserSync = (done) => {
  browsersync.init({
    server: {
      baseDir: "assets/templates",
      index: "index.html",
    },
    port: 3000,
  });
  done();
}

module.exports.browserSyncReload = (done) => {
  browsersync.reload();
  done();
}
