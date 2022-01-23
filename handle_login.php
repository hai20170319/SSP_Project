<?php

require('connect.php');

if(isset($_POST['email'])){
   $email=$_POST['email'];
   }
if(isset($_POST['password'])){
   $password=$_POST['password'];
   }
   setcookie("email",$email);
   setcookie("password",$password);
$sql="select * from users where email='$email' and password='$password'";
$res=$conn->query($sql);
if ($res->num_rows > 0){
   while($row = $res->fetch_assoc()) {
  echo "Welcome Back " . $row["first_name"]. " " . $row["last_name"]. "<br>";
?>
<form method="POST" action="handle_budget.php">
 <input required type="number" name="total" placeholder="how much do you make"/><br/>
 <input required type="number" name="rent" placeholder="enter your rent"/><br/>
 <input required type="number" name="grocery" placeholder="enter your grocery"/><br/>
 <input required type="number" name="transport" placeholder="enter your transport"/><br/>
 <input required type="number" name="savings" placeholder="enter your savings"/><br/>
 <input required type="submit"/>
</form>
<?php
}
}
else{
   echo "email or password is wrong";
}
?>
