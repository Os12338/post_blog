<?php

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    // get all value that send by posting
    $description = trim($_REQUEST['description'])?? false;
    $img = $_FILES['image'];


// check register validation
    if($description){
        // validate the image
        if($img['name'] !== ""){
            // check image is valide
            if(image_post($img)){
                // check add post in database
                if(posts_data_Database($description,$img['name'],$_SESSION['userId'])){
                    setMessage('success','post added successfully');
                    header('location:index.php?query=browse');
                exit;
                }else{
                    setMessage('danger','some thing went wrong in the image');
                    header('location:index.php?query=create_post');
                    exit();
                }
            }else{
                setMessage('danger','image uplaod failed');
                header('location:index.php?query=create_post');
                exit();
            }
        }
        // check add post in database
        if(posts_data_Database($description,$_SESSION['userId'])){
            setMessage('success','post added successfully');
            header('location:index.php?query=browse');
        exit;
        }else{
            setMessage('danger','some thing went wrong without image');
            header('location:index.php?query=create_post');
            exit();
        }
    }else{
        setMessage('danger','description issue');
        header('location:index.php?query=create_post');
        exit();
    }
}

?>