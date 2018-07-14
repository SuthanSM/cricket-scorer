<?php

$conn=mysqli_connect("localhost","root","","scorer") or die("failed:" . mysqli_connect_error());
session_start();
$bowler=$_POST['rad'];

		$bowl=mysqli_query($conn,"update bowling set current_bo=1 where pid='$bowler'") or die(mysqli_error($conn));
	


header('location:/scorer/page4_score.php');


$conn->close();
?>