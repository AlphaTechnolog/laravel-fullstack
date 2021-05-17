<template>
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">
        Add task
      </h5>

      <form :action="url('api/tasks/add')" method='POST'>
        <div class="row">
          <div class="col-sm-12 col-md-6 my-2">
            <div class="form-group">
              <input
                type="text"
                name="name"
                placeholder="Enter name"
                required
                class="form-control"
              >
            </div>
          </div>
          <div class="col-sm-12 col-md-6 my-2">
            <div class="form-group">
              <input
                type="text"
                name="description"
                placeholder="Enter description"
                required
                class="form-control"
              >
            </div>
          </div>
          <div class="col-sm-12 d-grid gap-2">
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
import CsrfField from "../Common/CsrfField"
import { globalMixins } from "../../mixins/global";
export default {
  name: "AddTask",

  mixins: [globalMixins],

  components: {
    CsrfField,
  }
}
</script>
