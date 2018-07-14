<?php

session_start();
$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$email=$_POST['email'];
$password=$_POST['password'];
$cpassword=$_POST['cpassword'];

$conn=mysqli_connect("localhost","root","","scorer") or die("failed:" . mysqli_connect_error());



if($password==$cpassword){
	$sql = "INSERT INTO users (firstname, lastname, email,password) VALUES ('$firstname','$lastname','$email','$password')";
if ($conn->query($sql) === TRUE) {
	$_SESSION['sucess']="Registration sucessful!!";
	header('location:/scorer/index.php');
}
else {
   $_SESSION['fail']="You have already registerd!";
header('location:/scorer/index.php');
}

}
else
{
 $_SESSION['warning']="Password didn't match!";
 header('location:/scorer/register.php');
}

$conn->close();
?>