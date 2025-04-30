<?php
$commentId_like = (int) $_GET['commentId'];

if($commentId_like){

    if(likes_comments($commentId_like,$_SESSION['userId'])){

        header("location:index.php?query=browse");
        exit;
    }else{
        setMessage('danger','like comment wrong');
        header("location:index.php?query=browse");
        exit;
    }
}

?>