<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8"> <link rel="icon" href="Images\75.png" type="image/ico">
    <title>Cricket Scorer</title>
<style>

body{
	margin:0px;	
background-size:cover;
color:white;
}
h1{
 font-size:200%;
}
input[type=submit]{
background-color:#32cd32;
border:none;
border-radius:20px;
color:white;
border:3px solid #ffffff;
}
input[type=reset]{
background-color:#32cd32;
border:none;
border-radius:20px;
color:white;
border:3px solid #ffffff;
}
input[type=name]
{
height:25px;
border-radius:20px;
padding-left:10px;

}
input[type=submit]:hover{
border:3px solid #32cd32;

}
input[type=reset]:hover{
border:3px solid #32cd32;

}

</style>
  </head>
  <body background="Images\bgf.jpg">
<center>
<h1>Team Details</h1><hr>
    
<div style="float:left;margin-left:70px;">

<b><font size=6px>
 <br>
<div style="width:300px;height:50px;border-radius:20px;border:3px solid #ffffff;"><font size=5px>Players of Team A</font>

</div><div style="width:300px;height:450px;border-radius:20px;border:3px solid #ffffff;">
<form name="team_details" action="team_process.php" method="post">

<input type=name name="pa1" value="Player-A01" placeholder="Player name"> <br>
<input type=name name="pa2"  value="Player-A02" placeholder="Player name"> <br>
<input type=name name="pa3"  value="Player-A03"placeholder="Player name"> <br>
<input type=name name="pa4" value="Player-A04" placeholder="Player name"> <br>
<input type=name name="pa5" value="Player-A05" placeholder="Player name"> <br>
<input type=name name="pa6" value="Player-A06" placeholder="Player name"> <br>
<input type=name name="pa7" value="Player-A07" placeholder="Player name"> <br>
<input type=name name="pa8" value="Player-A08" placeholder="Player name"> <br>
<input type=name name="pa9" value="Player-A09" placeholder="Player name"> <br>
<input type=name name="pa10" value="Player-A10" placeholder="Player name"> <br>
<input type=name name="pa11" value="Player-A11" placeholder="Player name"> <br>
</div>


</div>


<div style="float: right;margin-right:70px;">

<b><font size=6px>
<br>
<div style="width:300px;height:50px;border-radius:20px;border:3px solid #ffffff;"><font size=5px>Players of Team B</font>
</div><div style="width:300px;height:450px;border-radius:20px;border:3px solid #ffffff;">

<input type=name name="pb1"  value="Player-B01" placeholder="Player name"> <br>
<input type=name name="pb2" value="Player-B02" placeholder="Player name"> <br>
<input type=name name="pb3" value="Player-B03" placeholder="Player name"> <br>
<input type=name name="pb4" value="Player-B04" placeholder="Player name"> <br>
<input type=name name="pb5" value="Player-B05" placeholder="Player name"> <br>
<input type=name name="pb6" value="Player-B06" placeholder="Player name"> <br>
<input type=name name="pb7" value="Player-B07" placeholder="Player name"> <br>
<input type=name name="pb8" value="Player-B08" placeholder="Player name"> <br>
<input type=name name="pb9" value="Player-B09" placeholder="Player name"> <br>
<input type=name name="pb10" value="Player-B10" placeholder="Player name"> <br>
<input type=name name="pb11" value="Player-B11" placeholder="Player name"> <br>

</div>

</div>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<input type="reset" value="Reset" style="height:35px;width:100px">
<input type=submit value='Update' style="height:35px;width:100px">




</form>
</center>
  </body>
</html>
