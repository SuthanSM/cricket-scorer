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
table{
	color:#93B874;
	border-spacing:10px;
}
input[type=submit]{
font-size:18px;
}
img:hover{
opacity:0.5;


}
input[type=submit]:hover{
opacity:0.5;


}
</style>
  </head>

<body>
<center>
  


  <table border=0 style="float:left;">
<tr><td> <div style="width:130px;padding:10px;height:80px;border-radius:20px;border:3px solid #ffffff;">
<font color="WHITE"><center>
<?php
session_start();
$conn=mysqli_connect("localhost","root","","scorer") or die("failed:" . mysqli_connect_error());
$bat1=mysqli_query($conn,"select b.runs,b.balls,p.pname from player p,batting b where p.pid=b.pid and b.strike=1");
while($row=mysqli_fetch_assoc($bat1))
{
	echo "<font size=5px>".ucfirst($row['pname'])."*</font><br><br><font color=#93B874 size=5px><b>".$row['runs']." (".$row['balls'].")</b>";
}
?></center>
</div></td>
 <td><div style="width:130px;padding:10px;height:80px;border-radius:20px;border:3px solid #ffffff;">
<font color="WHITE"><center>
<?php
$conn=mysqli_connect("localhost","root","","scorer") or die("failed:" . mysqli_connect_error());
$bat2=mysqli_query($conn,"select b.runs,b.balls,p.pname from player p,batting b where p.pid=b.pid and b.strike=0");
while($row=mysqli_fetch_assoc($bat2))
{
	echo "<font size=5px>".ucfirst($row['pname'])."</font><br><br><font color=#93B874 size=5px><b>".$row['runs']." (".$row['balls'].")</b>";
}
?>
</center>
 </div></td>
     </tr>

<tr ><td colspan="10"><center>

  
    
         <img src="Images\4.jpg" width=160px height=200px onClick="parent.location='batting.php'"></center>
    </td></tr></table>
<DIV style="float:right">
<div style="width:160px;padding:20px;float:right;height:60px;border-radius:20px;border:3px solid #ffffff;">
<center>

<?php
$conn=mysqli_connect("localhost","root","","scorer") or die("failed:" . mysqli_connect_error());
$bowl=mysqli_query($conn,"select b.runs,b.balls,b.wickets,p.pname from player p,bowling b where p.pid=b.pid and b.current_bo=1") or die(mysqli_error($conn));
while($row=mysqli_fetch_assoc($bowl))
{
	$overs=intval($row['balls'] / 6);
	$balls=$row['balls'] % 6;
	echo "<font size=5px color=WHITE>".ucfirst($row['pname'])."</font><br><br><font color=#93B874 size=5px><b>".$row['runs']."-".$row['wickets']." (".$overs.".".$balls.")</b> 	";
}
?></center>

</font>
  </div><br><br><br><br><br><br><br>
         <img src="Images\2.jpg" width=150px height=220px onClick="parent.location='bowling.php'">
</div>  
<font color="white" size=20px>
<?php

if(isset($_SESSION['tournament']))
echo ucfirst($_SESSION['tournament'])."<br>";
?></font>
<font color="white" size=5px>
<?php
echo strtoupper($_SESSION['team_a'])." vs ".strtoupper($_SESSION['team_b']);
?></font>
<br><br><br><br>
 <div style="width:250px;height:80px;border-radius:20px;border:3px solid #ffffff;">

<TABLE border="0">
  
   <TR>
        <td><h3><font color="white">
<?php
$conn=mysqli_connect("localhost","root","","scorer") or die("failed:" . mysqli_connect_error());
$team=mysqli_query($conn,"select tname from teams where batting=1") or die(mysqli_error($conn));
while($row=mysqli_fetch_assoc($team))
{
echo "<font size=5px>".strtoupper($row['tname']);
$qwerty=strtoupper($row['tname']);
}

?>





</font></h3></td>

        <td><h1>
<?php
$bat=$_SESSION['bat'];
$tot=mysqli_query($conn,"select total_score,wickets from teams where batting=1") or die(mysqli_error($conn));
while($row=mysqli_fetch_assoc($tot))
echo $row['total_score']."/".$row['wickets'];


?>

</h1></td>
	
	<td><b>
<?php
$tot=mysqli_query($conn,"select balls from teams where batting=1") or die(mysqli_error($conn));
while($row=mysqli_fetch_assoc($tot))
{
$balls=$row['balls'] % 6;
$overs=intval($row['balls'] / 6);
echo "<font size=5px>".$overs.".".$balls."</font><font size=4px>(".$_SESSION['overs'].")</font>";
echo "</b>
</td>
   </tr>			
</TABLE></div><br>";
if($_SESSION['total_balls']==0)
header('location:/scorer/change_innings.php');
else if(isset($_SESSION['target']) and $_SESSION['target'] < 0)
header('location:/scorer/end_match.php');
else if(isset($_SESSION['target']))
echo "<font color=white>".$qwerty." need ".$_SESSION['target']." runs from ".$_SESSION['total_balls']." balls.";




}

?>



<form action="update_score.php" method="post">
<br><br><br><br><br>
<?php
echo "";
?>
<br><hr color=#93B874>
 <input type="submit" name="legal" value="0"   style="height:50px;width:50px;border-radius:50px;"> 
 <input type="submit" name="legal" value="1"   style="height:50px;width:50px;border-radius:50px;"> 
 <input type="submit" name="legal" value="2"   style="height:50px;width:50px;border-radius:50px;">
<input type="submit" name="legal" value="3"   style="height:50px;width:50px;border-radius:50px;"> 
 <input type="submit" name="legal" value="4"   style="height:50px;width:50px;border-radius:50px;">
 <input type="submit" name="legal" value="5"   style="height:50px;width:50px;border-radius:50px;"> 
 <input type="submit" name="legal" value="6"   style="height:50px;width:50px;border-radius:50px;">

<br><br>
 <input type="submit" name="illegal" value="W"   style="height:50px;width:50px;border-radius:50px;"> 
 <input type="submit" name="illegal" value="NB"   style="height:50px;width:50px;border-radius:50px;">
 <input type="submit" name="illegal" value="B"   style="height:50px;width:50px;border-radius:50px;">
 <input type="submit" name="illegal" value="LB"   style="height:50px;width:50px;border-radius:50px;"> 
 <input type="submit" name="wicket" value="OUT!"  style="height:50px;width:50px;border-radius:50px;background:red;border:red">

 <br><br>
</form>
 <input type=button onClick="parent.location='summary.php'" value='Match Summary' style="height:50px;width:150px;border-radius:50px;"><br>
<marquee><font size=5px color="white"><br><?php
echo strtoupper($_SESSION['toss'])." won the toss and choose to ".$_SESSION['elected']." first ";
?></marquee>
</center>
  </body>
</html>
