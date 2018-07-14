
<!DOCTYPE html>
<html lang="en">
  

<head>
     <link rel="icon" href="Images\75.png" type="image/ico">
    <title>Cricket Scorer</title>


<style>

body{
	margin:0px;	
	background-size:100% 110%;

}

h1{
	font-size:200%;
	color:#ffffff;
}
input[type=submit]{
background-color:#32cd32;
border:none;
border-radius:20px;
color:white;
border:3px solid #ffffff;
font-size:15px;

}
input[type=submit]:hover{
border:3px solid #32cd32;

}
input[type=reset]:hover{
border:3px solid #32cd32;

}
input[type=reset]{
background-color:#32cd32;
border:none;
border-radius:20px;
color:white;
border:3px solid #ffffff;
font-size:15px;
}
input[type=radio]{
	transform:scale(1.5);
}



</style>
</head>
 

<body background="Images\l.jpg">






<center>
	<h1>Match Details</h1>
	<hr color="white"><br><br>
	<div style="width:450px;height:550px;border-radius:20px;border:3px solid #0;background:#000000;opacity:0.7">
	<form name="match_details" action="match_process.php" method="post">
	<b><font size="5" color="white"><br>

<table border="0">
	<tr>
	<td>Tournament:</td>
	<td><input type="name" name="tournament" size="25" placeholder="Tournament name" style="height:25px;background-color:transparent;color:white;border-width:0px 0px 2px 0px;font-size:15px" required></td>
	</tr>

	<tr>
	<td><br>Venue:</td>
	<td><br><input type="name" name="venue" size="25" placeholder="City" style="height:25px;background-color:transparent;color:white;border-width:0px 0px 2px 0px;font-size:15px" required></td>
	</tr>

	<tr>
	<td><br>Date:</td><td><br><input type="date" name="mdate" size="25" style="height:25px;background-color:transparent;color:white;border-width:0px 0px 2px 0px;font-size:15px" required>
<br>
<?php
session_start();
if(isset($_SESSION['tri']))
{
echo "<font size=4px color=red>".$_SESSION['tri']."</font>";
$_SESSION['tri']="";
}
?>
</td>

	</tr>

	<tr>
	<td><br>Number of overs:</td><td><br><input type="number" name="num_overs" placeholder="Overs" style="height:25px;background-color:transparent;color:white;border-width:0px 0px 2px 0px;font-size:15px" required></td>
	</tr>

	<tr>
	<td><br>Team A:</td><td><br><input type="name" name="team_a" size="25"  placeholder="Team name" style="height:25px;background-color:transparent;color:white;border-width:0px 0px 2px 0px;font-size:15px" required></td>
	</tr>

	<tr>
	<td><br>Team B:</td><td><br><input type="name" name="team_b" size="25" placeholder="Team name" style="height:25px;background-color:transparent;color:white;border-width:0px 0px 2px 0px;font-size:15px" required></td>
	</tr>
</table>
<font size="5px">

<br><br><table border="0">
	<tr>
	<td>
Toss won by:</td><td><input type="radio" value="team_a" name="r1" required>Team-A</td>
	  <td>  <input type="radio" value="team_b" name="r1" required>Team-B</td></tr>

<tr><td>
Elected to:</td><td><input type="radio" value="bat" name="r2" required>Bat</td>
	 <td>  <input type="radio" value="bowl" name="r2" required>Bowl</td></tr>
</table>

<br>

<input type="reset" value="Reset" style="height:35px;width:100px">
<input type=submit value='Update' style="height:35px;width:100px">
</font>
</form>

</center>
</body>
</html>
