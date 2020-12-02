<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: *');

$error = 0;

require('db.php');


if(isset($_GET['register'])){
    $log = $_GET['register'];
   }

   $log = 'register';

   if($log == 'register'){
    if($_POST['username'] && $_POST['username'] != ""){
        $username = $_POST['username'];
     }else{
        $error = 1;
     }
     if($_POST['email'] && $_POST['email'] != ""){
       $email = $_POST['email'];
    }else{
       $error = 2;
    }
    if($_POST['password'] && $_POST['password'] != ""){
       $pass = $_POST['password'];
    }else{
       $error = 3;
   } 

      if($error == 0){
        // Generate token   
        $length = 64;
        $data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
        $token = substr(str_shuffle($data), 0, $length);  

        $res = $con->query( " INSERT INTO `user`(`Username`, `Pass`, `Token`, `Email`) 
        VALUES ('$username','$pass','$token','$email') ");

          if($res){
             echo 300;
          }else{
             echo 500;
          }

      
        
      }
}


















?>