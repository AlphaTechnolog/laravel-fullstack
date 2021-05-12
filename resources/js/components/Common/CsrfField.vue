<template>
  <span v-html="field"></span>
</template>

<script>
export default {
  name: "CsrfField",

  computed: {
    field() {
      return window.env.csrfField;
    }
  }
}
</script>
