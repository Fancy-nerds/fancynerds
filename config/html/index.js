"use strict";

const { serveHtml } = require("./serve");
const { devHtml } = require("./dev");
const { prodHtml } = require("./prod");

module.exports.serveHtml = serveHtml;
module.exports.devHtml = devHtml;
module.exports.prodHtml = prodHtml;
