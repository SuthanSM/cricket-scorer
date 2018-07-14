
<!DOCTYPE html>
<html lang="en">
  <head> <link rel="icon" href="Images\75.png" type="image/ico">
    <meta charset="utf-8">
    <title>Cricket Scorer</title>
<style>

body{
margin:0px;

	
background-size:1400px 800px;
background-color:#000000;
background-repeat:no-repeat;
background-position:center;

}

h1{

color:white;

}
td{
width:100px;
height:35px;
text-align:center;
}



</style>
  </head>
  <body>
<center>
<h1>Match Summary</h1>
<font size=5px color=white><br>
<div>
<table>
<?php
session_start();
$conn=mysqli_connect("localhost","root","","scorer") or die("failed:" . mysqli_connect_error());
echo "<tr>";
$sql=mysqli_query($conn,"select * from teams where batting=-999");
while($row=mysqli_fetch_assoc($sql))
{
$inn1=$row['tname'];
$inn1_score=$row['total_score'];
$inn1_w=$row['wickets'];
echo "<td>".$inn1."</td><td>".$inn1_score."/".$inn1_w."</td>";
}
echo "</tr>";


$x=mysqli_query($conn,"select max(b.runs) from batting b,teams t,player p where b.pid=p.pid and p.tname=t.tname and t.tname='$inn1'") or die(mysqli_error($conn));
while($row1=mysqli_fetch_assoc($x))
{
	$max= $row1['max(b.runs)'];



$y=mysqli_query($conn,"select b.balls,p.pname,p.tname from batting b,player p where p.pid=b.pid and b.runs=$max") or die(mysqli_error($conn));
while($row=mysqli_fetch_assoc($y))
{
	$balls= $row['balls'];
$pname= $row['pname'];
$tname[$i]=$row['tname'];
echo "<tr><td>".$tname[$i]."<td>".$pname."</td><td>".$max[$i]."(".$balls[$i].")</td>";

}
$i++;
}



$x=mysqli_query($conn,"select max(b.wickets) from bowling b,teams t,player p where b.balls>0 and b.pid=p.pid and p.tname=t.tname group by t.tname") or die(mysqli_error($conn));
$i=0;
while($row1=mysqli_fetch_assoc($x))
{
if($i<1){
	$maxw[$i]= $row1['max(b.wickets)'];

$y=mysqli_query($conn,"select b.runs,p.pname,p.tname from bowling b,player p where b.balls>0 and p.pid=b.pid and b.wickets=$maxw[$i]") or die(mysqli_error($conn));
while($row=mysqli_fetch_assoc($y))
{
	$runs[$i]= $row['runs'];
$pnamebo= $row['pname'];
$tnameb[$i]=$row['tname'];

echo $tnameb[$i]."<br>".$pnamebo." ".$maxw[$i]."-".$runs[$i]."<br>";


}
$i++;
}
}


?>

</table>

</div></div>




</center>
  </body>
</html>
