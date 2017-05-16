<?php
$query="select * from agenti where activ='DA'";
$query1=mysqli_query($con,$query);


echo "<form method='get' action=''>";

while($rez=mysqli_fetch_array($query1,MYSQLI_ASSOC)){



echo "<input type='checkbox' name='a' value='".$rez['id']."' />";
echo "<input type='checkbox' name='b' value='".$rez['id']."' />";
echo $rez['lucratori'];
 
 
echo "<br />";
$cont=$rez['id'];
}

echo "<input type='submit' /></form>cont=",$cont."<br />";

if (isset($_GET['a'])or(isset($_GET['b']))){

$url= str_replace("?","&",$_SERVER['REQUEST_URI']);

$id=explode('&' , $url );

for ($x=0; $x<($cont+1)*2;$x++){

if (isset($id[$x])){ 
$z=substr($id[$x],0,2);
if ($z=="a="){
   $d=substr($id[$x],2);
   $querya=mysqli_query($con,"select lucratori from agenti where id='$d'");
   $nume=mysqli_fetch_array($querya,MYSQLI_ASSOC);
   echo $nume['lucratori'];

   echo $id[$x]."<br>";
   echo substr($id[$x],0,2)."<br>";
}
if ($z=="b="){
   $d=substr($id[$x],2);
   $querya=mysqli_query($con,"select lucratori from agenti where id='$d'");
   $nume=mysqli_fetch_array($querya,MYSQLI_ASSOC);
   echo $nume['lucratori'];

   echo $id[$x]."<br>";
   echo substr($id[$x],0,2)."<br>";
}


	}



}


}