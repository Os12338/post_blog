<?php
// force the id to be int to use it in database
$postId = (int) $_GET['postId'] ;
$postImg = $_GET['postImg'] ;

if(deletePost($postId,$postImg)){
    setMessage('success','Delete completed');
    header('location:index.php?query=browse');
    exit;
}else{
    setMessage('danger','Delete not complete');
    header('location:index.php?query=browse');
    exit;
}

?>