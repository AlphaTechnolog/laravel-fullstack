<template>
  <div class="navbar navbar-dark bg-dark container-fluid fixed-top navbar-expand-lg">
    <a :href="env.appUrl" class="navbar-brand">
      {{ env.appName }}
    </a>
    <button
      type="button"
      class="navbar-toggler"
      data-toggle="collapse"
      data-target="#nav-links"
      aria-controls="nav-links"
      aria-expanded="false"
      aria-label="Toggle navigation menu"
    >
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="nav-links">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 mr-auto">
        <LoggedLinks v-if="logged"></LoggedLinks>
        <UnloggedLinks v-else></UnloggedLinks>
      </ul>
    </div>
  </div>
</template>

<script>
import { globalMixins } from "../mixins/global";
import LoggedLinks from "./Navbar/LoggedLinks";
import UnloggedLinks from "./Navbar/UnloggedLinks";
export default {
  name: "Navbar",

  props: ["logged"],

  mixins: [globalMixins],

  components: {
    LoggedLinks,
    UnloggedLinks
  },
}
</script>
