"use strict";

const { serveAssets } = require("./serve");
const { devAssets } = require("./dev");
const { prodAssests } = require("./prod");

module.exports.serveAssets = serveAssets;
module.exports.devAssets = devAssets;
module.exports.prodAssests = prodAssests;
