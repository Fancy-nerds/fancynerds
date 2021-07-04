"use strict";

const { serveStyles } = require("./styles");
const { serveScripts } = require("./scripts");
const { serveAssets } = require("./assets");

function serve() {
  serveStyles();
  serveScripts();
  serveAssets();
}

module.exports.serve = serve;
