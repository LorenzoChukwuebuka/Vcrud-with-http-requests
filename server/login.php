<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: *');

  //db connection
  require('db.php');

$log = "login";

 $error = 0;
 $data = array();
 

  
if(isset($_GET['login'])){
    $log = $_GET['login'];
   }

   if($log == 'login'){
  
        if($_POST['Username'] && $_POST['Username'] != ""){
            $username = $_POST['Username'];
         }else{
            $error = 1;
         }

         if($_POST['Password'] && $_POST['Password'] != ""){
            $pass = $_POST['Password'];
         }else{
            $error = 2;
        } 

        if($error == 0){
          
            $res = $con->query("SELECT * FROM user WHERE Username = '$username' AND Pass = '$pass' ");
            $numRows = $res->num_rows;

            if($numRows == 1){
                $rw = $res->fetch_assoc(); 
                $result = array_push($data, $rw);
                echo json_encode($data);

             
            } else {
                echo 501;
            }

               
              
        }


   }



?>