<template>
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">
        Edit task {{ task.name }} -> {{ copiedTask.name }}
      </h5>

      <form :action="url(`api/tasks/edit/${task.id}`)" method='POST'>
        <CsrfField></CsrfField>
        <div class="row">
          <div class="col-sm-12 col-md-4 my-2">
            <div class="form-group">
              <input
                type="text"
                name="name"
                placeholder="Enter name"
                required
                class="form-control"
                v-model='copiedTask.name'
              >
            </div>
          </div>
          <div class="col-sm-12 col-md-4 my-2">
            <div class="form-group">
              <input
                type="text"
                name="description"
                placeholder="Enter description"
                required
                class="form-control"
                v-model='copiedTask.description'
              >
            </div>
          </div>
          <div class="col-sm-12 col-md-4 my-2">
            <div class="form-check form-switch">
              <input
                type="checkbox"
                class="form-check-input"
                name='completed'
                id="completed"
                v-model="completed"
              >
              <label for="completed">
                Completed
              </label>
            </div>
          </div>
          <div class="col-sm-12 d-grid gap-2 my-2">
            <button class="btn btn-success">
              Send
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import { globalMixins } from "../../mixins/global";
import CsrfField from '../Common/CsrfField.vue';
export default {
  name: "EditTask",

  props: ["task"],

  mixins: [globalMixins],

  components: {
    CsrfField
  },

  data() {
    return {
      copiedTask: Object.assign({}, this.task),
    }
  },

  computed: {
    completed: {
      get() {
        const valids = [
          true,
          1
        ];

        return valids.includes(this.copiedTask.completed);
      },

      set(v) {
        this.copiedTask.completed = !!v ? 1 : 0;
      }
    }
  }
}
</script>
