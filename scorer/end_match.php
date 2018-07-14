<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"> <link rel="icon" href="Images\75.png" type="image/ico">
    <title>Cricket Scorer</title>
<style>
body{
	background-color:#000000;
	margin:15px;	

}
</style>
  </head>

<body>
<center>
<?php
$conn=mysqli_connect("localhost","root","","scorer") or die("failed:" . mysqli_connect_error());
echo "<font color=white><h1>Match completed!</h1><br><br>";
echo "<div style='width:250px;height:100px;border-radius:20px;border:2px solid #ffffff'>";



$sql=mysqli_query($conn,"select max(total_score) from teams") or die(mysqli_error($conn));
while($row=mysqli_fetch_assoc($sql))
{
	
	$s=$row['max(total_score)'];
}
 
$sql1=mysqli_query($conn,"select tname,wickets from teams where total_score='$s'") or die(mysqli_error($conn));
while($row=mysqli_fetch_assoc($sql1))
{
$steam=$row['tname'];	
echo "<center><h1><font color=white>Winner:<br>".$row['tname']." ".$s."/".$row['wickets']."</h1>";
}
$sql1=mysqli_query($conn,"select max(mno) from matches") or die(mysqli_error($conn));
while($row=mysqli_fetch_assoc($sql1))
{
	$smno=$row['max(mno)'];	
}
$sql1=mysqli_query($conn,"update matches set result='$steam' where mno=$smno") or die(mysqli_error($conn));

$v="m".$smno;


$sql2=mysqli_query($conn,"delete from teams") or die(mysqli_error($conn));




 
echo "<center><br><br><br><br><a href='user_home.php'><input type=button value='Home' style='height:35px;width:70px;border-radius:20px'></a>";






$conn->close();
?>
</body>
</html>