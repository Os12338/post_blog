<?php
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $postId = (int) $_GET['postId'];
    // get all value that send by posting
    $content = trim($_REQUEST['comment-content'])?? false;

    if($content){

        if(addComment($content,$postId,$_SESSION['userId'])){
            setMessage('success','add comment successfully');
            header('location:index.php?query=browse');
            exit;
        }else{
            setMessage('danger','some thing went wrong');
            header('location:index.php?query=browse');
            exit;
        }
    }else{
        setMessage('danger','please write your comment');
        header('location:index.php?query=browse');
        exit;
    }


}


    ?>
