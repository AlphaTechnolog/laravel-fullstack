<template>
  <table class="table table-striped table-bordered">
    <thead>
      <tr>
        <th
          v-for="(item, idx) of head"
          :key="idx"
        >
          {{ item }}
        </th>
      </tr>
    </thead>
    <tbody>
      <tr v-if="loading">
        <td :colspan="head.length">
          <slot name="loader"></slot>
        </td>
      </tr>
      <tr v-else-if="tasks.length === 0">
        <td :colspan="head.length">
          <slot name="noItems"></slot>
        </td>
      </tr>
      <Task
        v-else
        v-for="(task, idx) of tasks"
        :key="idx"
        :task="task"
      ></Task>
    </tbody>
  </table>  
</template>

<script>
import Task from "./Task";
export default {
  name: "Tasks",

  props: ["loading", "tasks"],

  components: {
    Task
  },

  data() {
    return {
      head: [
        "Name",
        "Description",
        "Completed",
        "Actions"
      ]
    }
  }
}
</script>
