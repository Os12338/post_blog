<?php

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    // get all value that send by posting
    $user_name = trim($_REQUEST['username'])?? false;
    $email = trim($_REQUEST['email'])?? false;
    $password = trim($_REQUEST['password'])?? false;
    $confirm_password = trim($_REQUEST['confirm-password'])?? false;
    $img = $_FILES['image'];

// check register validation
    if(registerValidate($user_name,$email,$password,$confirm_password)){
        $password = password_hash($password,PASSWORD_DEFAULT);
        // validate the image
        if(image_register($img)){
        }else{
            setMessage('danger','image uplaod failed');
            header('location:index.php?query=register');
            exit();
        }
        // check if email is exist in database
        if(email_check_Database($email)){
            setMessage('danger','this email already exist');
            header('location:index.php?query=register');
            exit();
        }else{
            // add user in database
            if(register_data_Database($user_name,$email,$password,$img['name'])){
                setMessage('success','welcome '. $user_name .' in our family');
                $_SESSION['username'] = $user_name;
                $_SESSION['userId'] = mysqli_insert_id($conn);
                $_SESSION['userImage'] = $img['name'];
                header('location:index.php');
                exit;
            }else{
                setMessage('danger','some thing went wrong');
                header('location:index.php?query=register');
                exit();
            }
        }

    }else{
        header('location:index.php?query=register');
        exit();
    }
}



?>