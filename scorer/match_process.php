<?php


session_start();
$tournament=$_POST['tournament'];
$venue=$_POST['venue'];
$mdate=$_POST['mdate'];
$num_overs=$_POST['num_overs'];
$_SESSION['total_balls'] = $num_overs * 6;
$_SESSION['overs']=$num_overs;
$team_a=$_POST['team_a'];
$team_b=$_POST['team_b'];
$_SESSION['team_a']=$team_a;
$_SESSION['team_b']=$team_b;
$toss=$_POST['r1'];
if($toss=="team_a")
	$toss=$team_a;
else
	$toss=$team_b;
$elected=$_POST['r2'];
$email=$_SESSION['email'];
if($toss==$team_a and $elected=="bat"){
$_SESSION['bat']=$team_a;$_SESSION['bowl']=$team_b;}
else if($toss==$team_a and $elected=="bowl"){
$_SESSION['bat']=$team_b;$_SESSION['bowl']=$team_a;}
else if($toss==$team_b and $elected=="bat"){
$_SESSION['bat']=$team_b;$_SESSION['bowl']=$team_a;}
else if($toss==$team_b and $elected=="bowl"){
$_SESSION['bat']=$team_a;$_SESSION['bowl']=$team_b;}
$conn=mysqli_connect("localhost","root","","scorer") or die("failed:" . mysqli_connect_error());

$sql = mysqli_query($conn,"INSERT INTO matches (tournament,venue,team_a,team_b,m_date,num_overs,email,toss_won,elected) VALUES ('$tournament','$venue','$team_a','$team_b','$mdate','$num_overs','$email','$toss','$elected')");

$q=$_SESSION['bat'];

if($sql === TRUE) {

$_SESSION['toss']=$toss;
$_SESSION['elected']=$elected;
$_SESSION['tournament']=$tournament;
$result=mysqli_query($conn,"select max(mno) from matches");
while($row=mysqli_fetch_assoc($result)){
$r=$row['max(mno)'];}
mysqli_query($conn,"INSERT INTO teams (tname,mno) VALUES ('$team_a','$r')");
mysqli_query($conn,"INSERT INTO teams (tname,mno) VALUES ('$team_b','$r')");
mysqli_query($conn,"update teams set batting=1 where tname='$q'");

	header('location:/scorer/page3_team.php');
} 
else {
$_SESSION['tri']=$conn->error;
header('location:/scorer/page2_match.php');

}



$conn->close();
?>