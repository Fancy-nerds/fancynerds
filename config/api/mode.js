module.exports.isProd = () => {
  return process.env.NODE_ENV === "production";
};

module.exports.isDev = () => {
  return process.env.NODE_ENV === "development";
};

module.exports.setDevEnv = (cb) => {
  process.env.NODE_ENV = "development";
  cb();
};

module.exports.setProdEnv = (cb) => {
  process.env.NODE_ENV = "production";
  cb();
};
