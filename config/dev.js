"use strict";

const { series } = require("gulp");
const { devStyles } = require("./styles");
const { devScripts } = require("./scripts");
const { devAssets } = require("./assets");

function dev() {
  return series(devStyles, devScripts, devAssets);
}

module.exports.dev = dev();
