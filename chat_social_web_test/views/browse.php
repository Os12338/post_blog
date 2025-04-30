<?php
// run function to get the posts
  $posts = getposts();
  $comments = getComments();

  $likes = get_likes_post();
  $dislikes = get_dislikes_post();

  $c_likes = get_likes_comment();
  $c_dislikes = get_dislikes_comment();

?>

<div class="container-fluid mt-4 d-flex flex-justify-content-right flex-column" style='margin-left:165px;'>
  <!-- Post Card -->
  <?php foreach($posts as $post):?>
  <div class="card mb-4 shadow-sm " style='width:fit-contetn;'>
    <div class="card-body">
      <!-- Post Header -->
      <div class="d-flex align-items-center mb-3">
        <a href="?query=user_info">
            <img src="<?= $post[2] ?>" alt="User" class="rounded-circle me-3" width="50" height="50">
        </a>
        <div>
          <h6 class="mb-0 fw-bold"><?= $post[1] ?></h6>
          <small class="text-muted"><?= $post[6] ?></small>
        </div>
        <!-- if the post has the same userId the user can delete it -->
        <?php if($post[0] == $_SESSION['userId']):?>
          <a class='btn btn-warning ' href='index.php?query=deletePost&postId=<?=$post[3] ?>&postImg=<?= $post[5]?>'>delete</a>
          <?php endif; ?>
      </div>
      <!-- Post Description -->
      <p><?= $post[4] ?></p>
      <!-- Post Image -->
            <img src="<?= $post[5] ?>" class="img-fluid rounded mb-3" alt="Post Image" width="250" height="150">
      <!-- Like & Dislike -->
      
      <div class="d-flex gap-3 mb-2">
        <a href='index.php?query=like&postId=<?= $post[3] ?>' class="btn btn-sm btn-outline-primary"><i class="bi bi-hand-thumbs-up"></i> Like 
        <?php if($likes): ?>
        <?php foreach($likes as $like):?>
          <?php if($like[2] == $post[3]): ?>

        <span><?= $like[0]?></span>

        <?php endif; ?>
        <?php endforeach; ?>
        <?php endif; ?>
      </a>
        <a href='index.php?query=dislike&postId=<?= $post[3] ?>' class="btn btn-sm btn-outline-danger"><i class="bi bi-hand-thumbs-down"></i> Dislike 
        <?php if($dislikes): ?>
        <?php foreach($dislikes as $dislike):?>
          <?php if($dislike[2] == $post[3]): ?>

        <span><?= $dislike[0]?></span>
        
        <?php endif; ?>
        <?php endforeach; ?>
        <?php endif; ?>
      </a>
      </div>

      <!-- Comments Section -->
      <div class="border-top pt-3">
        <h6 class="fw-bold">Comments</h6>

        <!-- Single Comment -->
        <?php if($comments): ?>
        <?php foreach($comments as $comment):?>
          <?php if($comment[3] === $post[3]): ?>
        <div class="d-flex mb-3">
          <!-- userImage in comment -->
            <a href="?query=user_info">
                <img src="<?= $comment[2] ?>" class="rounded-circle me-2" width="40" height="40" alt="User"></a>
          <div>
            <!-- user name and comment_at -->
            <strong><?= $comment[1] ?></strong> <small class="text-muted"><?= $comment[5] ?></small>
            
            <!-- if the comment has the same userId the user can delete it -->
            <?php if($comment[0] == $_SESSION['userId']):?>
              <a class='btn btn-warning ' href='index.php?query=deleteComment&commentId=<?=$comment[6] ?>'>delete</a>
              <?php endif; ?>
              <!-- comment content -->
              <p class="mb-1"><?= $comment[4] ?></p>
            <div class="d-flex gap-2">
              <a href="index.php?query=comment_like&commentId=<?=$comment[6]?>" class="btn btn-sm btn-outline-primary btn-sm"><i class="bi bi-hand-thumbs-up"></i>
              <?php if($c_likes): ?>
              <?php foreach($c_likes as $c_like):?>
              <?php if($c_like[2] == $comment[6]): ?>
              <span><?= $c_like[0]?></span>
              <?php endif; ?>
              <?php endforeach; ?>
              <?php endif; ?>
            </a>
              <a href="index.php?query=comment_dislike&commentId=<?=$comment[6]?>" class="btn btn-sm btn-outline-danger btn-sm"><i class="bi bi-hand-thumbs-down"></i>
              <?php if($c_dislikes): ?>
              <?php foreach($c_dislikes as $c_dislike):?>
              <?php if($c_dislike[2] == $comment[6]): ?>
              <span><?=$c_dislike[0]?></span>
              <?php endif; ?>
              <?php endforeach; ?>
              <?php endif ;?>
            </a>
            </div>
          </div>
        </div>
        <?php endif; ?>
        <?php endforeach; ?>
        <?php endif; ?>
        
        <!-- Add Comment Form -->
        <form action='index.php?query=addComment&postId=<?=$post[3]?>' method='POST'>
          <div class="mb-2">
            <textarea class="form-control" rows="2" placeholder="Write a comment..." name='comment-content'></textarea>
          </div>
          <button class="btn btn-primary btn-sm" type="submit">Comment</button>
        </form>
      </div>
    </div>
  </div>
  <?php endforeach; ?>
</div>


