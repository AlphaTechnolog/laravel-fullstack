export const globalMixins = {
  methods: {
    url(path) {
      return util.path(`$BASEURL/${path}`);
    }
  },

  computed: {
    env() {
      return window.env;
    }
  }
}
