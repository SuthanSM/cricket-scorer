<?php

session_start();
$conn=mysqli_connect("localhost","root","","scorer") or die("failed:" . mysqli_connect_error());
$team_a=$_SESSION['team_a'];
$team_b=$_SESSION['team_b'];
$bat=$_SESSION['bat'];
$bowl=$_SESSION['bowl'];
$x="pa";
for($i=1;$i<=11;$i++)
{
	$pname=$x.$i;
	$player_name_a[]=$_POST[$pname];
	$j=$i-1;

	$sql_a = mysqli_query($conn,"INSERT INTO player (pid,pname,tname) VALUES ('$pname','$player_name_a[$j]','$team_a')");
	if($team_a == $bat)
	$batsmen=mysqli_query($conn,"insert into batting (pid,strike,status) values ('$pname',-999,'Yet to bat')") or die(mysqli_error($conn));
	else
	$bowl=mysqli_query($conn,"insert into bowling (pid,current_bo) values ('$pname',-999)") or die(mysqli_error($conn));
		
}
$_SESSION['player_a']=$player_name_a;
$x="pb";
for($i=1;$i<=11;$i++)
{
	$pname=$x.$i;
	$player_name_b[]=$_POST[$pname];
	$j=$i-1;
	
	$sql_b = mysqli_query($conn,"INSERT INTO player (pid,pname,tname) VALUES ('$pname','$player_name_b[$j]','$team_b')");
	if($team_b == $bat)
	$batsmen=mysqli_query($conn,"insert into batting (pid,strike,status) values ('$pname',-999,'Yet to bat')") or die(mysqli_error($conn));
	else
	$bowl=mysqli_query($conn,"insert into bowling (pid,current_bo) values ('$pname',-999)") or die(mysqli_error($conn));
	
}

$_SESSION['player_a']=$player_name_a;

if ($sql_a and $sql_b) {
	header('location:/scorer/batting.php');
} 

else {
    echo "<font size=10px color=blue>Players already set to play";
echo "<a href='batting.php'>Continue>>></a>";
}



$conn->close();
?>