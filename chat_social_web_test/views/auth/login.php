
    <!-- Login Form -->
    <div class="col-md-9 d-flex justify-content-center align-items-center min-vh-100 bg-white" style="margin-left:164px;">
      <div class="card shadow p-4 w-100" style="max-width: 400px;">
        <h4 class="text-center mb-4 text-primary">Login</h4>
        <form action="index.php?query=loginController" method="POST">
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" >
          </div>

          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" >
          </div>

          <div class="d-grid">
            <button type="submit" class="btn btn-primary">Login</button>
          </div>
        </form>
        <p class="mt-3 text-center text-muted">Don't have an account? <a href="?query=register">Sign up</a></p>
      </div>
    </div>