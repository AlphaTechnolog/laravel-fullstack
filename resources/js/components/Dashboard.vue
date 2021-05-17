<template>
  <div class='container-fluid'>
    <div class="alert alert-danger" v-if="error !== ''">
      {{ error }}
    </div>

    <div class="row">
      <div class="col">
        <h3>Registered tasks</h3>
      </div>
      <div class="col" :style="{ textAlign: 'right' }">
        <a
          class="btn btn-success"
          :href="url('tasks/add')"
        >
          Add task
        </a>
      </div>
    </div>

    <Tasks
      :tasks="tasks"
      :loading="loading"
    >
      <template v-slot:loader>
        <span>Loading...</span>
      </template>
      <template v-slot:noItems>
        <span>Don't have items to show</span>
      </template>
    </Tasks>
  </div>
</template>

<script>
import Tasks from "./Dashboard/Tasks";
import { globalMixins } from "../mixins/global";
export default {
  name: "Dashboard",

  data() {
    return {
      loading: false,
      tasks: [],
      error: ''
    }
  },

  components: {
    Tasks,
  },

  mixins: [globalMixins],

  methods: {
    async getTasks() {
      this.loading = true;

      const req = await axios.get(util.path(util.pathUtils.join(
        "$BASEURL", "api", "tasks",
        "fetchall", this.env.user.id
      )));

      if (!req.ok) {
        util.baseError(
          this, 'error',
          'Error at get your tasks',
        );

        return console.error(req);
      }

      this.tasks = req.data.tasks;
      this.loading = false;
    }
  },

  async created() {
    await this.getTasks();
  }
}
</script>
