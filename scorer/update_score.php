<?php
session_start();
$conn=mysqli_connect("localhost","root","","scorer") or die("failed:" . mysqli_connect_error());
$bat=$_SESSION['bat'];

if($_SESSION['total_balls']!=0)


{
if(isset($_POST['legal']))
{
$run=$_POST['legal'];
$upd=mysqli_query($conn,"update teams set total_score = total_score + '$run',balls = balls + 1 where batting=1") or die(mysqli_error($conn)); 
$upd_bt=mysqli_query($conn,"update batting set runs = runs + '$run',balls = balls + 1 where strike=1")  or die(mysqli_error($conn));
$upd_bo=mysqli_query($conn,"update bowling set runs = runs + '$run',balls = balls + 1 where current_bo=1")  or die(mysqli_error($conn));
if($run % 2 != 0)
{
$upd_st=mysqli_query($conn,"update batting set strike=2 where strike=1")  or die(mysqli_error($conn));
$upd_st=mysqli_query($conn,"update batting set strike=1 where strike=0")  or die(mysqli_error($conn));
$upd_st=mysqli_query($conn,"update batting set strike=0 where strike=2")  or die(mysqli_error($conn));
}
if(isset($_SESSION['target']))
$_SESSION['target'] = $_SESSION['target'] - $run;
$_SESSION['total_balls'] = $_SESSION['total_balls'] - 1;



header('location:/scorer/page4_score.php');
}
else if(isset($_POST['illegal']))
{

$upd=mysqli_query($conn,"update teams set total_score = total_score + 1,balls = balls + 0,extras=extras + 1 where batting=1")  or die(mysqli_error($conn)); 
$upd_bo=mysqli_query($conn,"update bowling set runs = runs + 1,extras = extras + 1 where current_bo=1")  or die(mysqli_error($conn));
if(isset($_SESSION['target']))
$_SESSION['target'] = $_SESSION['target'] - 1;
header('location:/scorer/page4_score.php');
}
else if(isset($_POST['wicket']))
{
$upd=mysqli_query($conn,"update teams set wickets = $wickets + 1,balls = balls + 1 where batting=1")  or die(mysqli_error($conn)); 
$_SESSION['total_balls'] = $_SESSION['total_balls'] - 1;



$upd_bt=mysqli_query($conn,"update batting set status='out',strike=3 where strike=1")  or die(mysqli_error($conn));
$upd_bo=mysqli_query($conn,"update bowling set wickets = wickets + 1,balls = balls + 1 where current_bo=1")  or die(mysqli_error($conn));
$_SESSION['status']="Select new batsman";
header('location:/scorer/batting.php');

}
} 

if($_SESSION['total_balls'] % 6 == 0)
{
$upd_st=mysqli_query($conn,"update batting set strike=2 where strike=1")  or die(mysqli_error($conn));
$upd_st=mysqli_query($conn,"update batting set strike=1 where strike=0")  or die(mysqli_error($conn));
$upd_st=mysqli_query($conn,"update batting set strike=0 where strike=2")  or die(mysqli_error($conn));
$upd_cb=mysqli_query($conn,"update bowling set current_bo=0 where current_bo=1") or die(mysql_error($conn));  
header('location:/scorer/bowling.php');

}


$conn->close();
?>