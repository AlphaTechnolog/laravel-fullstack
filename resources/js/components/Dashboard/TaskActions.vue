<template>
  <fragment>
    <a class="btn btn-danger" :href="url(`api/tasks/delete/${task.id}`)">
      Delete
    </a>

    <a class="btn btn-warning" :href="url(`tasks/edit/${task.id}`)">
      Edit
    </a>
  </fragment>
</template>

<script>
import { globalMixins } from "../../mixins/global";
export default {
  name: "TaskActions",

  props: ["task"],

  mixins: [globalMixins],
}
</script>
