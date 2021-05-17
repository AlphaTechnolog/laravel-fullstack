<template>
  <tr>
    <td>{{ task.name }}</td>
    <td>{{ task.description }}</td>
    <td>{{ task.completed | boolVal }}</td>
    <td><TaskActions :task="task"></TaskActions></td>
  </tr>  
</template>

<script>
import TaskActions from "./TaskActions";
import { filtersMixins } from "../../mixins/filters";
export default {
  name: "Task",

  props: ["task"],

  mixins: [filtersMixins],

  components: {
    TaskActions
  }
}
</script>
