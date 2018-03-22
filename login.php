<?php
/**
 * Created by PhpStorm.
 * User: sumit
 * Date: 2/27/2018
 * Time: 9:38 PM
 */
include 'function.php';
function validate($username, $password)
{
    if(empty($username) || empty($password)){
        session_start();
        $_SESSION['error'] = 'Please, insert username and password';
        header('location:index.php');
    }else{
        $res = check_user($username,$password);
        if ($res <= 0) {
            session_start();
            $_SESSION['error'] = 'invalid user';
            header('location:index.php');
        }else{
            session_start();
            $_SESSION['username'] = $username;
            header('location:welcome.php');
        }
    }
}
function newuser($username, $email, $password){
    if(empty($username) || empty($password) || empty($email)){
        header('location:index.php');
    }else{
        $res = user_exist($username,$email);
        if ($res != 0) {
            session_start();
            $_SESSION['error'] = 'User Already Exists';
            header('location:index.php');
        }else{
            $res = insert($username,$email,$password);
            if ($res > 0) {
                session_start();
                $_SESSION['success'] = 'Data Inserted';
                header('location:index.php');
            }else{
                session_start();
                $_SESSION['error'] = 'Data not Inserted';
                header('location:index.php');
            }
        }
    }
}

if ($_POST['email']){
    newuser($_POST['uname'],$_POST['email'],$_POST['psw']);
}else{
    validate($_POST['uname'],$_POST['psw']);
}


