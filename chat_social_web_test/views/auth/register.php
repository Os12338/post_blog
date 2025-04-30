    <!-- Login Form -->
    <div class="col-md-9 d-flex justify-content-center align-items-center min-vh-100 bg-white" style="margin-left:164px;">
      <div class="card shadow p-4 w-100" style="max-width: 400px;">
        <h4 class="text-center mb-4 text-primary">Sign Up</h4>
        <form action="index.php?query=registerController" method="POST" enctype='multipart/form-data'>
          <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" >
          </div>

          <div class="mb-3">
            <label for="username" class="form-label">Email</label>
            <input type="email" class="form-control" id="username" name="email" >
          </div>

          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" >
          </div>

          <div class="mb-3">
            <label for="password" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" id="password" name="confirm-password" >
          </div>
          
          <div class="mb-3">
            <label for="img" class="form-label">add Image</label>
            <input type="file" class="form-control" id="img" name="image" >
          </div>

          <div class="d-grid">
            <button type="submit" class="btn btn-primary">sign up</button>
          </div>
        </form>
        <p class="mt-3 text-center text-muted">Have an account? <a href="?query=login">login</a></p>
      </div>
    </div>