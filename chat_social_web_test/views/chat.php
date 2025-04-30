
<div class="container py-4"style="margin-left:164px;">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card shadow rounded-4">
        
        <!-- Header with user images -->
        <div class="card-header bg-white border-0 pb-2">
          <div class="d-flex align-items-center gap-2 flex-wrap">
            <a href="?query=user_info">
                <img src="assets/imgs/chat.jpg" class="rounded-circle border" width="40" height="40" alt="User">
            </a>
          </div>
        </div>

        <!-- Chat messages -->
        <div class="card-body px-4" style="height: 400px; overflow-y: auto; background-color: #f9f9f9;">
          <!-- You -->
          <div class="d-flex justify-content-end mb-3">
            <div class="bg-primary text-white rounded px-3 py-2" style="max-width: 70%;">
              Hello!
            </div>
          </div>
          <!-- Support -->
          <div class="d-flex justify-content-start mb-3">
            <div class="bg-light border rounded px-3 py-2" style="max-width: 70%;">
              Hi there! How can I help you?
            </div>
          </div>
        </div>

        <!-- Message input -->
        <div class="card-footer bg-white border-0 pt-0">
          <form class="d-flex">
            <input type="text" class="form-control rounded-start-pill" placeholder="Type your message...">
            <button class="btn btn-primary rounded-end-pill" type="submit">
              <i class="bi bi-send-fill"></i>
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
