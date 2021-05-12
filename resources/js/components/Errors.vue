<template>
  <div class="alert alert-danger">
    <span
      v-for="(error, idx) of errors"
      :idx="idx"
    >
      {{ error }} <br>
    </span>
  </div>
</template>

<script>
export default {
  name: "Errors",

  props: ["errors"]
}
</script>
