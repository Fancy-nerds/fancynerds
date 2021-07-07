function isProd() {
  return process.env.NODE_ENV === "production";
}

function isDev() {
  return process.env.NODE_ENV === "development";
}

function setDevEnv(cb) {
  process.env.NODE_ENV = "development";
  cb();
}

function setProdEnv(cb) {
  process.env.NODE_ENV = "production";
  cb();
}

module.exports.isProd = isProd;

module.exports.isDev = isDev;

module.exports.setDevEnv = setDevEnv;

module.exports.setProdEnv = setProdEnv;
