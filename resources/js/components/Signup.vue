<template>
  <div class="card container">
    <div class="card-body">
      <h5 class="card-title">
        Signup
      </h5>

      <form action="/api/signup" method="POST">
        <CsrfField></CsrfField>
        <div class="row">
          <div class="col-sm-12 col-md-4 my-2">
            <div class="input-group">
              <input
                type="text"
                name="name"
                required
                placeholder="Enter your name"
                class="form-control"
              >
            </div>
          </div>
          <div class="col-sm-12 col-md-4 my-2">
            <div class="input-group">
              <input
                type="email"
                name="email"
                required
                placeholder="Enter your email"
                class="form-control"
              >
            </div>
          </div>
          <div class="col-sm-12 col-md-4 my-2">
            <div class="input-group">
              <input
                type="password"
                name="password"
                required
                placeholder="Enter your password"
                class="form-control"
              >
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
import CsrfField from "./Common/CsrfField";
export default {
  name: "Signup",

  components: {
    CsrfField
  }
}
</script>
