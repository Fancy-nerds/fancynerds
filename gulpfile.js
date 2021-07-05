"use strict";

const { series, parallel } = require("gulp");

const { dev } = require("./config/dev");
const { prod } = require("./config/prod");
const { serve } = require("./config/serve");
const { setDevEnv, setProdEnv } = require("./config/api/mode");

module.exports.dev = series(setDevEnv, dev);
module.exports.build = series(setProdEnv, prod);
module.exports.serve = parallel(setDevEnv, serve);
