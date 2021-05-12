<template>
  <fragment>
    <Link
      v-for="(link, idx) of links"
      :key="idx"
      :link="link"
    ></Link>
  </fragment>
</template>

<script>
import Link from "./Link";
export default {
  name: "LoggedLinks",

  components: {
    Link
  },

  data() {
    return {
      links: [
        { name: "Dashboard", path: '/dashboard' },
        { name: "Logout", path: '/logout' },
      ],
    }
  }
}
</script>
