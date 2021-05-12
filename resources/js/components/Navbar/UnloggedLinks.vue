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
export default {
  name: "UnloggedLinks",

  data() {
    return {
      links: [
        { name: "Login", path: '/' },
        { name: "Signup", path: '/signup' },
      ]
    }
  }
}
</script>
