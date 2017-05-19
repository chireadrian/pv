<?php

$query="select * from pvuri where pv_nou='DA'";
$caut=mysqli_query($con,$query);

$rezultat=mysqli_fetch_array($caut,MYSQLI_ASSOC);
if ($rezultat['pv_nou']=="DA"){
echo $rezultat['pv_nou'];
echo $rezultat['ora_p'];
}else{echo "Nu exista activ pv";}





  /*
$query="select * from agenti where activ='DA'";
$query1=mysqli_query($con,$query);


while($rez=mysqli_fetch_array($query1,MYSQLI_ASSOC)){

echo "<input type='checkbox' />" ;
echo $rez['lucratori'];
 
 
echo "<br />";

}




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
*/