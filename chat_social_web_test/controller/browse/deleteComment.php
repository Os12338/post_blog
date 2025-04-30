<?php
// force the id to be int to use it in database
$commentId = (int) $_GET['commentId'] ;
if(deleteComment($commentId)){
    setMessage('success','Delete completed');
    header('location:index.php?query=browse');
    exit;
}else{
    setMessage('danger','Delete not complete');
    header('location:index.php?query=browse');
    exit;
}

?>