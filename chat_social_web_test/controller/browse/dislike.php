<?php
$postId_dislike = (int) $_GET['postId'];

if($postId_dislike){

    if(post_dislikes($postId_dislike,$_SESSION['userId'])){

        header("location:index.php?query=browse");
        exit;
    }else{
        setMessage('danger','dislike wrong');
        header("location:index.php?query=browse");
        exit;
    }
}
?>