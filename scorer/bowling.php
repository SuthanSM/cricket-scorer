
<!DOCTYPE html>
<html lang="en">
  <head> <link rel="icon" href="Images\75.png" type="image/ico">
    <meta charset="utf-8">
    <title>Cricket Scorer</title>
<style>

body{
margin:0px;

	
background-size:cover;
background-color:#000000;
background-repeat:no-repeat;
background-position:center;

}

h1{
 font-size:160%;
color:white;

}
td{
width:100px;
height:35px;
text-align:center;
}
input[type=submit]{
background-color:transparent;
color:black;

}
input[type=button]{
background-color:transparent;
color:black;

}
input[type=submit]:hover{
background-color:#000000;
border:3px solid #000000;
color:white;
opacity:0.6;

}

input[type=button]:hover{
background-color:#000000;
border:3px solid #000000;
color:white;
opacity:0.6;

}



</style>
  </head>
  <body background="images/bo.jpg">
<center>
<font size=5px color=white><br>
<div>
<?php
session_start();
$conn=mysqli_connect("localhost","root","","scorer") or die("failed:" . mysqli_connect_error());

$x=mysqli_query($conn,"select tname from teams where batting=-999 or batting=0") or die(mysqli_error($conn));
while($row=mysqli_fetch_assoc($x))
{
	$y=$row['tname'];
}
if(isset($_SESSION['statusb'])){
echo $_SESSION['statusb'];$_SESSION['statusb']="Select the opening bowler";}
echo "
<div style='width:600px;height:50px;border-radius:20px;border:2px solid #000000;background-color:black;opacity:0.6'>
<b>".strtoupper($y)." BOWLING<br></b><font size=5px color=white>
</div>";
?>
<div style="width:600px;height:520px;border-radius:20px;border:2px solid #000000;background-color:black;opacity:0.6"><br>

<?php
echo "<form action='select_bowler.php' method='post'>";

echo"<table><TR><TD></TD><TD><b>Overs<hr></TD><TD><b>Runs<hr></TD><TD>Extras<hr></TD><TD>Wickets<hr></TD></tr>";

$bowler=mysqli_query($conn,"select pname,pid from player where tname='$y'");
while($row=mysqli_fetch_assoc($bowler))
{
	$p=$row['pid'];
	echo "<tr><td style='width:230px'><input type='radio' value=".$row['pid']." id='r' name='rad' style='zoom:1.3'>".$row['pname']."</td> ";
	$s=mysqli_query($conn,"select b.runs,p.pname,b.balls,b.wickets,b.extras from bowling b,player p where b.pid='$p' and p.pid=b.pid");
	while($rows=mysqli_fetch_assoc($s))
	{	
		$ovrs=intval($rows['balls'] / 6);
		$balls=$rows['balls'] % 6;
		echo "<td><b>".$ovrs.".".$balls.
"</td><td><b>".$rows['runs'].
"</td><td><b>".$rows['extras'].
"</td><td><b>".$rows['wickets']."</td></tr>";
	}
	
}
echo "</table></div><br>
<a href='page4_score.php'><input type=button value='Back' style='height:40px;width:100px;border-radius:20px'></a>

<input type=submit name='submit' value='Confirm' style='height:40px;width:100px;border-radius:20px'>
</form>";

?>



</div></div>




</center>
  </body>
</html>
