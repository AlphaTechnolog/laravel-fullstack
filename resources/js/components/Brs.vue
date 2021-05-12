<template>
  <span v-html="brs"></span>
</template>

<script>
export default {
  props: ['n'],

  created() {
    if (isNaN(this.n)) {
      throw `Invalid br's number`;
    }
  },

  computed: {
    brs() {
      let brs = '';
      let i = 0;
      while (i < this.n) {
        brs += '<br>\n';
        i++;
      }
      return brs;
    }
  }
}
</script>
