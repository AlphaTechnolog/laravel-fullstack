<template>
  <li class="nav-item">
    <a
      :href="link.path"
      class="nav-link"
      role="button"
    >
      {{ link.name }}
    </a>
  </li>
</template>

<script>
export default {
  name: "Link",

  props: ["link"]
}
</script>
