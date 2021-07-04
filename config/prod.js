"use strict";

const { series } = require("gulp");
const { prodStyles } = require("./styles");
const { prodScripts } = require("./scripts");
const { prodAssests } = require("./assets");

function prod() {
  return series(prodStyles, prodScripts, prodAssests);
}

module.exports.prod = prod();
