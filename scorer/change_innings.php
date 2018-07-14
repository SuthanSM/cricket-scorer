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
session_start();
if(isset($_SESSION['visit']) and $_SESSION['visit']=1)
{
$_SESSION['visit']=0;
header('location:/scorer/end_match.php');
}
else $_SESSION['visit']=1;

$team_a=$_SESSION['team_a'];
$team_b=$_SESSION['team_b'];
$conn=mysqli_connect("localhost","root","","scorer") or die("failed:" . mysqli_connect_error());


$upd=mysqli_query($conn,"update batting set strike=-999");
$upd1=mysqli_query($conn,"update batting set status='Not out' where status='batting'");
$upd3=mysqli_query($conn,"update batting set status='Did not bat' where status='Yet to bat'");
$upd2=mysqli_query($conn,"update bowling set current_bo=-999");

$_SESSION['total_balls']=$_SESSION['overs']*6;
echo "<font color=white><h1>I Innings completed!</h1><br><br>";
echo "<div style='width:250px;height:100px;border-radius:20px;border:2px solid #ffffff'>";
$total_a=mysqli_query($conn,"select total_score,tname,wickets from teams where batting=1");
while($row=mysqli_fetch_assoc($total_a))
{
$_SESSION['target']=$row['total_score'];
echo "<center><font color=white><h1>".$row['tname'].":".$_SESSION['target']."/".$row['wickets']."</h1>";
$bowl=$row['tname'];
}

echo "</div>";
mysqli_query($conn,"update teams set batting=-999 where batting=1");
mysqli_query($conn,"update teams set batting=1 where batting=0");


$team=mysqli_query($conn,"select tname from teams where batting=1");
while($row=mysqli_fetch_assoc($team))
{
$bat=$row['tname'];
}


$x="pa";
for($i=1;$i<=11;$i++)
{
	$pname=$x.$i;
	$j=$i-1;
	if($team_a == $bat)
	$batsmen=mysqli_query($conn,"insert into batting (pid,strike,status) values ('$pname',-999,'Yet to bat')") or die(mysqli_error($conn));
	else
	$bowl=mysqli_query($conn,"insert into bowling (pid,current_bo) values ('$pname',-999)") or die(mysqli_error($conn));
		
}
$x="pb";
for($i=1;$i<=11;$i++)
{
	$pname=$x.$i;
	
	$j=$i-1;
	
	if($team_b == $bat)
	$batsmen=mysqli_query($conn,"insert into batting (pid,strike,status) values ('$pname',-999,'Yet to bat')") or die(mysqli_error($conn));
	else
	$bowl=mysqli_query($conn,"insert into bowling (pid,current_bo) values ('$pname',-999)") or die(mysqli_error($conn));
	
}



echo "<br><br><br><br><a href='batting.php'><input type=button value='Start II innings' style='height:40px;width:200px;border-radius:20px'></a>";





?>
</body>
</html>