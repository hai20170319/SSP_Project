<?php

require('connect.php');

if(isset($_POST['firstname'])){
    $fname=$_POST['firstname'];
}
if(isset($_POST['lastname'])){
    $lname=$_POST['lastname'];
    }
if(isset($_POST['email'])){
    $email=$_POST['email'];
    }
if(isset($_POST['password'])){
    $pass=$_POST['password'];
    }

   $sql="insert into users(first_name,last_name,email,password) VALUES ('$fname','$lname','$email','$pass')";

   if($conn->query($sql)==TRUE){
       echo "user added";
   }
   else{
    echo "error" . $conn->error;
   }
?>
