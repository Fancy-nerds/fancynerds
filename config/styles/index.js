"use strict";

const { serveStyles } = require("./serve");
const { devStyles } = require("./dev");
const { prodStyles } = require("./prod");

module.exports.serveStyles = serveStyles;
module.exports.devStyles = devStyles;
module.exports.prodStyles = prodStyles;
