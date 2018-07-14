
<!DOCTYPE html>
<html lang="en">
  <head>
 <link rel="icon" href="Images\75.png" type="image/ico">
    <meta charset="utf-8">
    <title>Cricket Scorer</title>
<style>

body{
margin:0px;	
background-size:cover;
background-color:#000000;
}

h1{
 font-size:160%;
color:white;

}

input[type=submit]{
background-color:transparent;
color:white;

}
input[type=button]{
background-color:transparent;
color:white;

}
input[type=submit]:hover{
background-color:#000000;
border:3px solid #000000;
color:white;
opacity:0.7;

}

input[type=button]:hover{
background-color:#000000;
border:3px solid #000000;
color:white;
opacity:0.7;

}

</style>
  </head>
  <body background="images/bat.jpg">
<center>
<font size=5px color=white>

<?php
session_start();
$conn=mysqli_connect("localhost","root","","scorer") or die("failed:" . mysqli_connect_error());

$x=mysqli_query($conn,"select tname from teams where batting=1") or die(mysqli_error($conn));
while($row=mysqli_fetch_assoc($x))
{
	$y=$row['tname'];
}

if(isset($_SESSION['status'])){
echo $_SESSION['status'];$_SESSION['status']="Select the opening pair of batsmen, the first one will take the strike";}
echo "<br>
<div style='width:600px;height:40px;border-radius:20px;border:3px solid #000000;background-color:black;opacity:0.5'>
<b><font size=5px>".strtoupper($y)."  BATTING</b></font></div>";
?>
<div style="width:600px;height:520px;border-radius:20px;border:3px solid #000000;background-color:black;opacity:0.5"><br>
<font size=4px>
<?php
echo "<form action='select_batsman.php' method='get'>";
echo "<table>";
$bat=$_SESSION['bat'];
$batsmen=mysqli_query($conn,"select pname,pid from player where tname='$y'");
while($row=mysqli_fetch_assoc($batsmen))
{
	$p=$row['pid'];
	
	echo "<tr><td><input type='checkbox' id='check' value=".$row['pid']." name='check[]' style='zoom:1.5'></td><td style='width:200px'><b><font size=5px>".$row['pname']."</td>";
	$s=mysqli_query($conn,"select b.runs,p.pname,b.balls,b.status,b.strike_rate from batting b,player p where b.pid='$p' and p.pid=b.pid");
	while($rows=mysqli_fetch_assoc($s))
	{
		echo "<td style='text-align:left;padding-left:10px;padding-bottom:15px'><font size=5px>".$rows['status']."</td><td style='text-align:left;padding-left:70px'><b><font size=5px>".$rows['runs']."(".$rows['balls'].")</td><td>";
if(isset($row['strike_rate']))
echo $row['strike_rate']."</td></tr>";
	}

	
}echo "</table>";
echo "</div><br><a href='page4_score.php'><input type=button value='Back' style='height:40px;width:100px;border-radius:20px;font-size:15px;'></a>
<input type=submit name='submit' value='Confirm' style='height:40px;width:100px;border-radius:20px;font-size:15px;'></form>";
echo "</form>";
?>




</center>
  </body>
</html>
