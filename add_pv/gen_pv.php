<?php

$query="select * from pvuri where pv_nou='DA'";
$caut=mysqli_query($con,$query);

$rezultat=mysqli_fetch_array($caut,MYSQLI_ASSOC);
if ($rezultat['pv_nou']=="DA"){

  $g1="";  $g2="";  $g3="";  $g4=""; $l1="";  $l2="";$l3="";$l4="";
  $query1="select grad_s,lucratori from pvuri,agenti where(l1=id or l2=id) and (pv_nou='DA' and activ='DA')";
  $caut1=mysqli_query($con,$query1); 
  $cont=0;

  while ($rezultat1=mysqli_fetch_array($caut1,MYSQLI_ASSOC)){
   echo $rezultat1['grad_s']." - ";
   echo $rezultat1['lucratori']." <br /> ";
   $cont++;
   echo "<h3>".$cont."</h3>";
   if ($cont==1) {
   $g1=$rezultat1['grad_s'];
   $l1=$rezultat1['lucratori'];
               }
   if ($cont==2){
   $g2=$rezultat1['grad_s'];
   $l2=$rezultat1['lucratori'];
               } 
 
  }

  $query1="select grad_s,lucratori from pvuri,agenti where(l3=id or l4=id) and (pv_nou='DA' and activ='DA')";
  $caut1=mysqli_query($con,$query1); 
  $cont=0;

  while ($rezultat1=mysqli_fetch_array($caut1,MYSQLI_ASSOC)){
   echo $rezultat1['grad_s']." - ";
   echo $rezultat1['lucratori']." <br /> ";
   $cont++;
   echo "<h3>".$cont."</h3>";
   if ($cont==1) {
   $g3=$rezultat1['grad_s'];
   $l3=$rezultat1['lucratori'];
               }
   if ($cont==2){
   $g4=$rezultat1['grad_s'];
   $l4=$rezultat1['lucratori'];
               } 


}  


  
  $query3="select tip_tura,pv_data from pvuri where pv_nou='DA'";
  $caut3=mysqli_query($con,$query3); 

  while ($rezultat3=mysqli_fetch_array($caut3,MYSQLI_ASSOC)){

   echo $rezultat3['tip_tura']." - ";
   echo $rezultat3['pv_data']." <br /> ";
   $datestamp=strtotime($rezultat3['pv_data']);
   $data=date("d.m.Y",$datestamp);                                                    }

 echo "<h3>PROCES - VERBAL</h3>";
 echo "Incheiat azi&nbsp;".$data."&nbsp;intre noi,&nbsp;".$g1."&nbsp;<strong>".$l1."</strong>&nbsp;".$g2."&nbsp;<strong>".$l2;
 echo "</strong>&nbsp;si&nbsp;".$g3."&nbsp;<strong>".$l3."</strong>&nbsp;".$g4."&nbsp;<strong>".$l4."</strong>";

echo "&nbsp;procedand primul/primii la predarea si secundul/secunzii la primirea tehnicii si materialelor de comunicatii din cadrul Compartimentului Comunicatii si Informatica.";
echo "<br />Cu ocazia predarii-primirii au afost aduse la cunostinta si activitatile desfasurate dupa cum urmeaza:<br />";   
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