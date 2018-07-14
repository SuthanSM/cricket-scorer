<?php

$conn=mysqli_connect("localhost","root","","scorer") or die("failed:" . mysqli_connect_error());
session_start();
$batsman=$_GET['check'];
$n=count($batsman);
if($n == 2)
{
	for($i=0;$i<2;$i++)
	{
		if($i == 0)
		$strike=1;else $strike=0;
		$batsmen=mysqli_query($conn,"update batting set strike='$strike',status='batting' where pid='$batsman[$i]'") or die(mysqli_error($conn));
	}

header('location:/scorer/bowling.php');


}
else
{
$_SESSION['status'] ="Select exactly 2 batsmen";
header('location:/scorer/batting.php');
}



$conn->close();
?>