
<html>
  <head>
    <link rel="icon" href="Images\75.png" type="image/ico">
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


.topnav a:hover{
background-color:#d3d3d3;
}
input[type=submit]{
background-color:32cd32;
border:none;
border-radius:20px;
font-size:15px;

color:white;
border:3px solid #ffffff;
}
input[type=submit]:hover{
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
.active{
background-color:#32cd32;


}
.login{
opacity:1;


}
.login:hover{
opacity:1;


}
</style>
  </head>
  <body background="Images\b.jpg">
<center><br><br>


<div class="topnav" id="my">
<img src="Images/logo.jpeg" height=60px width=600px>:
         <a href="about.html">About</a> 
	 <a href="register.php">Register</a> 
	 <a class="active">Home</a>

</div><br>
<br>
 <br>
   <br><br><br><br><br><br><br>

<form name="user_login" action="login_process.php" method="post">
<font color="white">

<?php
session_start();

if(isset($_SESSION['sucess'])){
echo "<b><h3>".$_SESSION['sucess']."</h3><br><br>"; $_SESSION['sucess']="";}
if(isset($_SESSION['fail'])){
echo $_SESSION['fail']; $_SESSION['fail']="";}
 
?>
<div class="login" style="width:400px;height:250px;border-radius:20px;border:3px solid #ffffff;">
<br><br><br><font size=5px>
Username:<input type="text" name="email" placeholder="email" style="height:30px;width:200px;padding:7px;background-color:transparent;color:white;border-width:0px 0px 2px 0px;font-size:15px" required><br><br>
Password:<input type="password" name="password" placeholder="password" style="height:30px;width:200px;padding:7px;color:white;background-color:transparent;border-width:0px 0px 2px 0px;font-size:15px" required><br>
</font><font color="red">
<?php
if(isset($_SESSION['warning2'])){
echo $_SESSION['warning2']; $_SESSION['warning2']="";}

?>
</font>
<br><br>
<input type=submit value='Login' style="height:35px;width:120px;">
</div>
</center>

  </body>
</html>
