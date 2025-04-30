<?php
$commentId_dislike = (int) $_GET['commentId'];

if($commentId_dislike){

    if(dislikes_comments($commentId_dislike,$_SESSION['userId'])){

        header("location:index.php?query=browse");
        exit;
    }else{
        setMessage('danger','like comment wrong');
        header("location:index.php?query=browse");
        exit;
    }
}

?>