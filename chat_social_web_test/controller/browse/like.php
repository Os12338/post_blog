<?php
$postId_like = (int) $_GET['postId'];

if($postId_like){

    if(post_likes($postId_like,$_SESSION['userId'])){

        header("location:index.php?query=browse");
        exit;
    }else{
        setMessage('danger','like wrong');
        header("location:index.php?query=browse");
        exit;
    }
}


?>