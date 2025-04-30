<?php

// register validation 
function registerValidate($user_name,$email,$password,$confirm_password){
    // name
    if($user_name){
    }else{
        setMessage('danger','name is required');
        return false;
    }

    // email
    if($email){
        if(filter_var($email,FILTER_VALIDATE_EMAIL)){
        }else{
            setMessage('danger','Email is invalid');
            return false;
        }
    }else{
        setMessage('danger','Email is required');
        return false;
    }

    // password
    if($password){
        // match password with confirm_password
        if($password === $confirm_password){
            $pass = password_strength($password);
            if($pass){
                
            }else{
                return false;
            }

        }else{

            setMessage('danger','mismatch');
            return false;

        }
    }else{

        setMessage('danger','password is required');
        return false;

    }

// if the registration is valide this will return true and the process will undergo
    return true;
}


// login validation 
function loginValidate($email,$password){
    // email
    if($email){
        if(filter_var($email,FILTER_VALIDATE_EMAIL)){
        }else{
            setMessage('danger','Email is invalid');
            return false;
        }
    }else{
        setMessage('danger','Email is required');
        return false;
    }
    // password
    if($password){
    }else{
        setMessage('danger','password is required');
        return false;
    }
// if the registration is valide this will return true and the process will undergo
    return true;
}

// =======================================
