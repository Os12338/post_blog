<?php
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    // get all value that send by posting
    $email = trim($_REQUEST['email'])?? false;
    $password = trim($_REQUEST['password'])?? false;

// check register validation
    $login_result = loginValidate($email,$password);
    // check email is exist or not
    if($login_result){
        $user_data = login_data_Database($email,$password);
        if($user_data){
            $_SESSION['username'] = $user_data['name'];
            $_SESSION['userId'] = $user_data['id'];
            $_SESSION['userLoginImage'] = $user_data['img'];
            header('location:index.php');
            exit();
        }else{
            setMessage('danger','no acount for this email');
            header("location:index.php?query=login");
            exit();
        }

    }else{
        header("location:index.php?query=login");
        exit();
}
}


?>