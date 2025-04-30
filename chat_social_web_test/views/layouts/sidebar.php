    <!-- Sidebar -->
    <div class="sidebar d-flex flex-column align-items-center" style='position: fixed;width: fit-content;'>
    <a href="">
        <img src="<?= isset($_SESSION['userImage']) ? "uploads/register/".$_SESSION['userImage']."" :
        (isset($_SESSION['userLoginImage'])? $_SESSION['userLoginImage'] :"assets/imgs/chat.jpg") ?>" alt="User Image">
    </a>
    <h5 class="mt-3 mb-4"><?= isset($_SESSION['username'])? $_SESSION['username'] : 'user name' ?></h5>
    
    <nav class="nav flex-column w-100">
        <?php if(isset($_SESSION['username'])):?>
        <a class="nav-link d-flex align-items-center" href="?query=chat">
        <i class="bi bi-chat-dots me-2"></i> Chat
        </a>
        <a class="nav-link d-flex align-items-center" href="?query=browse">
        <i class="bi bi-journal-text me-2"></i> Takeaway
        </a>
        <a class="nav-link d-flex align-items-center" href="?query=create_post">
        <i class="bi bi-journal-text me-2"></i> posting
        </a>
        <a class="nav-link d-flex align-items-center" href="?query=setting">
        <i class="bi bi-gear me-2"></i> Settings
        </a>
        </a>
        <a class="nav-link d-flex align-items-center" href="?query=logout">
        <i class="bi bi-gear me-2"></i> logout
        </a>
        <?php else: ?>
        <a class="nav-link d-flex align-items-center" href="?query=setting">
        <i class="bi bi-gear me-2"></i> Settings
        </a>
        <a class="nav-link d-flex align-items-center" href="?query=login">
        <i class="bi bi-gear me-2"></i> login
        </a>
        <?php endif ?>
    </nav>
    </div>

