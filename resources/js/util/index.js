class PathUtils {
  join(...paths) {
    return paths.join('/');
  }
}

module.exports = class {
  constructor() {
    this.pathUtils = new PathUtils()
  }

  path(path) {
    return path.replace(
      /\$BASEURL/g,
      window.env.APP_URL
    )
  }

  redirect(...paths) {
    window.location = this.path(this.pathUtils.join(...paths))
  }

  baseMessage(thisIns, varName, msg, interval=3000) {
    thisIns[varName] = msg;

    setTimeout(() => {
      thisIns[varName] = '';
    }, interval);
  }
}