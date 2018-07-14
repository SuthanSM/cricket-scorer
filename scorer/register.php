<html>
<head>
<meta charset="utf-8"> <link rel="icon" href="Images\75.png" type="image/ico">
<title>Cricket Scorer</title>


<style>

body{
margin:0px;	
background-size:cover;
}


.topnav img{

float:left;
padding-left:100px;

}
input[type=submit]:hover{
background-color:#32cd32;
border:3px solid #32cd32;

}

input[type=reset]:hover{
background-color:#32cd32;
border:3px solid #32cd32;

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
text-decoration:none;
float:right;
padding:20px;
font-size:25px;
}
.topnav a:hover{
background-color:#d3d3d3;
}
input[type=submit]{
background-color:#32cd32;
border:none;
border-radius:20px;
font-size:15px;

color:white;
border:3px solid #ffffff;


}
input[type=reset]{
background-color:#32cd32;
border:none;
border-radius:20px;
color:white;
border:3px solid #ffffff;
font-size:15px;



}



.active{
background-color:#32cd32;
}


</style>
</head>


<body background="Images\b.jpg">
<center><br><br>



<div class="topnav" id="my">
<img src="Images/logo.jpeg" height=60px width=600px>
         <a href="about.html">About</a> 
	 <a class="active">Register</a> 
	 <a href="index.php">Home</a>
</div>



<br><br><br><br><br><br>
<br><br><br>
   
<div style="width:450px;height:400px;border-radius:20px;border:3px solid #ffffff;"><br><br>

<form name="registration" action="registration.php" method="post">

<table border=0>

<tr>
<td><font color="white" size=5px>First name:</td>	
<td><input type="name" placeholder="firstname" name="firstname" style="height:30px;width:200px;padding:7px;color:white;background-color:transparent;border-width:0px 0px 2px 0px;font-size:15px" required></td>
</tr>

<tr>
<td><font color="white" size=5px><br>Last name:</td>	
<td><br><input type="name" placeholder="lastname" name="lastname" style="height:30px;width:200px;padding:7px;color:white;background-color:transparent;border-width:0px 0px 2px 0px;font-size:15px" required></td>
</tr>

<tr>
<td><font color="white" size=5px><br>User ID:</td>	
<td><br><input type="email" placeholder="email" name="email" style="height:30px;width:200px;padding:7px;color:white;background-color:transparent;border-width:0px 0px 2px 0px;font-size:15px" required></td>
</tr>

<tr>
<td><font color="white" size=5px><br>Password:</td>	
<td><br><input type="password" placeholder="password" name="password" style="height:30px;width:200px;color:white;padding:7px;background-color:transparent;border-width:0px 0px 2px 0px;font-size:15px" required></td>
</tr>

<tr>
<td><font color="white" size=5px><br>Confirm password:</td>	
<td><br><input type="password" placeholder="password" name="cpassword" style="height:30px;width:200px;color:white;padding:7px;background-color:transparent;border-width:0px 0px 2px 0px;font-size:15px" required><br>
<font color="red">
<?php
session_start();
if(isset($_SESSION['warning'])){
echo $_SESSION['warning'];$_SESSION['warning']="";}
?>
</font>
</td>
</tr>


</table>


<br><br>
<input type="reset" value="Reset" style="height:35px;width:120px">
<input type="submit" value='Sign in' style="height:35px;width:120px">
</div>

</center>
</body>
</html>
