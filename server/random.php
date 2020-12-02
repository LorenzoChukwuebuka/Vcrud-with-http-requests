 
<?php 
  
 $length = 32;
  $data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
  $token = substr(str_shuffle($data), 0, $length);  

   

  //$token = bin2hex(random_bytes(32));

  echo $token;
 
 

 

   
  
?> 

