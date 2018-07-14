
<html>
  <head>
     <link rel="icon" href="Images\75.png" type="image/ico">
    <title>Cricket Scorer</title>
<style>

body{
margin:0px;	
background-size:cover;
}
.topnav h1{
 font-size:150%;
color:blue;

padding-left:100px;
}
.topnav{
margin:0px;
position:fixed;
top:0;
width:100%;
background-color:white;
overflow:hidden;
border-radius:20px;



}
.topnav a{
display:inline;
color:#000080;
float:right;
padding:20px;
font-size:20px;
text-decoration:none;
}
input[type=button]{
background-color:#32cd32;
border:none;
border-radius:20px;

color:white;
border:3px solid #ffffff;
}
input[type=button]:hover{
border:3px solid #32cd32;

}
input[type=submit]:hover{
border:3px solid #32cd32;

}
.topnav a:hover{
background-color:#d3d3d3;
}
input[type=submit]{
background-color:#32cd32;
border:none;
border-radius:20px;

color:white;
border:3px solid #ffffff;
}
table {
font-size:20px;

}
.m:hover{
opacity:0.1;
}
</style>
  </head>
  <body background="Images\fv.jpg">
<center><br><br>


<div class="topnav" id="my">
	<div style="float:left"><img src="Images\o.png" width=50px height=50px><font size=10px>
<?php
session_start();
echo " ".ucfirst($_SESSION['firstname'])." ".ucfirst($_SESSION['lastname']);
?></font></div>

         <a href="index.php">Logout</a> 
	 
<img src="Images/logo.jpeg" height=60px width=600px>
</div><br>
<br>
<br>
<form action="user_home.php" method="post">
<input type="search" size="25" name="search" placeholder="Search your matches" style="height:30px;padding:7px;border-radius:20px;">
<input type=submit value='Search' style="height:30px;width:100px">
<input type=button onClick="parent.location='page2_match.php'" value='Start new match' style="height:30px;width:150px">

</form>
<div style='padding-left:50px'>
<?php
if(isset($_POST['search']))
{
$email=$_SESSION['email'];
$conn=mysqli_connect("localhost","root","","scorer") or die("failed:" . mysqli_connect_error());
$result=mysqli_query($conn,"call search_matches('$_POST[search]','$_SESSION[email]')") or die(mysqli_error($conn));
if( isset($_POST['search']) and (mysqli_num_rows($result) > 0))
{
echo "<table>";$i=0;
while($row=mysqli_fetch_assoc($result))
{
	if($i==3){
	echo "<tr>";$i=0;}$i++;
	echo "<td style='width:500px;height:200px'><center><div class='m' style='border:3px solid #ffffff;width:400;height:180;border-radius:20px;background:white;opacity:0.75'><B>".$row['tournament']."<br><B>".$row['team_a']."<B> vs ".$row['team_b']."<br><B>".$row['num_overs']." over match.<br><B>".$row['toss_won']." <B>won the toss and choose to ".$row['elected']." <B>first <br>Venue:".$row['venue']."<br>Date:".$row['m_date']."<br>".$row['result']." won the match<br>";
	echo "</td>";
	
	

}
}
else echo "<font color=white size=5px><b>No match found for your search!</b></font>";
$conn->close();
}
?>
  </div>  


</center>

  </body>



</html>
