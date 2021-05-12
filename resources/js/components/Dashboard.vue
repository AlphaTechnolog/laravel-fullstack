<template>
  <div>
    <h1>Hi {{ env.user.name }}</h1>
  </div>
</template>

<script>
import { globalMixins } from "../mixins/global";
export default {
  name: "Dashboard",

  mixins: [globalMixins]
}
</script>
