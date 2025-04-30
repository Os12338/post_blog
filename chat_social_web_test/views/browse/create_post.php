<div class="container mt-5 " style="margin-left:164px;max-width: 800px;">
  <div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
      <h5 class="mb-0">Create a New Post</h5>
    </div>
    <div class="card-body">
      <form action="index.php?query=addPost" method="POST" enctype="multipart/form-data">

        <!-- Description -->
        <div class="mb-3">
          <label for="description" class="form-label">Description</label>
          <textarea class="form-control" id="description" name="description" rows="4" placeholder="Write something..." ></textarea>
        </div>

        <!-- Upload Image -->
        <div class="mb-3">
          <label for="image" class="form-label">Upload Image</label>
          <input class="form-control" type="file" id="image" name="image">
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-success">Post</button>

      </form>
    </div>
  </div>
</div>