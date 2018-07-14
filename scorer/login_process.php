<?php


session_start();
$email=$_POST['email'];
$password=$_POST['password'];
$conn=mysqli_connect("localhost","root","","scorer") or die("failed:" . mysqli_connect_error());


$sql = "select firstname,lastname,email from users where email='$email' and password='$password'";
$result=mysqli_query($conn,$sql) or die("failed");
$num_rows=mysqli_num_rows($result);
if($num_rows!=0){
while($row=mysqli_fetch_assoc($result))
{
$_SESSION['email']=$row['email'];
	
$_SESSION['firstname']=$row['firstname'];
	$_SESSION['lastname']=$row['lastname'];
	
}
 header('location:/scorer/user_home.php');

}
else 
{
$_SESSION['warning2']="Password didn't match with the username!";
header('location:/scorer/index.php');
}

	

$conn->close();
?>