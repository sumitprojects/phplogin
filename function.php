<?php
/**
 * Created by PhpStorm.
 * User: sumit
 * Date: 2/27/2018
 * Time: 9:39 PM
 */
header('location:index.php');
function connection(){
    try{
        $con = mysqli_connect('localhost','root','mysql','user');
    }catch(Exception $e){
        echo $e->getMessage();
    }
    return $con;
}

function insert($username,$email,$password){
    try{
        $con = connection();
        $sql = "INSERT into user(username,email,password) VALUES('".$username."','".$email."','".$password."');";
        $res = mysqli_query($con,$sql);
    }catch(Exception $e){
        echo $e->getMessage();
    }
    return $res;
}

function check_user($username,$password){
    try{
        $con = connection();
        $sql = "SELECT * from user where username='".$username."'AND password='".$password."';";
        $res = mysqli_query($con,$sql);
        $r = mysqli_num_rows($res);
    }catch(Exception $e){
        echo $e->getMessage();
    }
    return $r;
}
function user_exist($username,$email){
    try{
        $con = connection();
        $sql = "SELECT * from user where username='".$username."' or email='".$email."';";
        $res = mysqli_query($con,$sql);
        $r = mysqli_num_rows($res);
    }catch(Exception $e){
        echo $e->getMessage();
    }
    return $r;
}

