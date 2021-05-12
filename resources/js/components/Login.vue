<template>
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">
        Login
      </h5>

      <form action="/api/login" method="POST">
        <CsrfField></CsrfField>
        <div class="row">
          <div class="col-sm-12 col-md-6 my-2">
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
          <div class="col-sm-12 col-md-6 my-2">
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
  name: "Login",

  components: {
    CsrfField
  }
}
</script>
