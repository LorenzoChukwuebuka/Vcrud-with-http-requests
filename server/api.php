<?php 
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: *');

require('db.php');

$crud = 'read';
$error = 0;

if(isset($_GET['crud'])){
 $crud = $_GET['crud'];
}


if($crud == 'read'){
 
  $res = " SELECT * FROM cars ";

    $res1 = $con->query($res);
    $numRow = $res1->num_rows;
   
      if($numRow > 0){      
         $data = [];
         while($row = $res1->fetch_assoc() ){
         //  json_encode($row);
            array_push($data, $row);
            
         }
         echo json_encode($data);
      } 
   
} 
  

 if($crud == 'delete'){
     $id = $_POST['car_id'];
     
     $res = "DELETE FROM cars WHERE car_id = $id";
     $res1 = $con->query($res);
       if($res1){
          echo 200;
       }else{
          echo 501;
       }
 }

 if($crud == 'create'){
    if($_POST['company'] && $_POST['company'] != ""){
       $company = $_POST['company'];
    }else{
       $error = 1;
    }
    if($_POST['model'] && $_POST['model'] != ""){
      $model = $_POST['model'];
   }else{
      $error = 2;
   }
   if($_POST['engine'] && $_POST['engine'] != ""){
      $engine = $_POST['engine'];
   }else{
      $error = 3;
   }
   if($_POST['gearbox'] && $_POST['gearbox'] != ""){
      $gearbox = $_POST['gearbox'];
   }else{
      $error = 4;
   } 

     if($error == 0){
       $res = "INSERT INTO `cars`(`company`, `brand`, `engine`, `gearbox`) VALUES ('$company','$model','$engine','$gearbox' )";
       $res1 = $con->query($res);
        
        if($res1){
           echo 'success';
        }else{
           echo 'error';
        }
     }
   
 } 

  if($crud == 'edit'){
     if($_POST['id']){
        $id = $_POST['id'];
     }

   if($_POST['company'] && $_POST['company'] != ""){
      $company = $_POST['company'];
   }else{
      $error = 1;
   }
   if($_POST['model'] && $_POST['model'] != ""){
     $model = $_POST['model'];
  }else{
     $error = 2;
  }
  if($_POST['engine'] && $_POST['engine'] != ""){
     $engine = $_POST['engine'];
  }else{
     $error = 3;
  }
  if($_POST['gearbox'] && $_POST['gearbox'] != ""){
     $gearbox = $_POST['gearbox'];
  }else{
     $error = 4;
  } 

    if($error == 0){
     $res = $con->query("UPDATE `cars` SET  `company`= '$company' ,`brand`= '.$model.',`engine`= '.$engine.',`gearbox`=  '.$gearbox.' WHERE $id");
      if($res){
         echo 300;
      }else{
         echo 500;
      }

       
    }
    
  }
 
?>