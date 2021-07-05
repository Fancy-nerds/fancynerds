"use strict";

const { serveScripts } = require("./serve");
const { devScripts } = require("./dev");
const { prodScripts } = require("./prod");

module.exports.serveScripts = serveScripts;
module.exports.devScripts = devScripts;
module.exports.prodScripts = prodScripts;
