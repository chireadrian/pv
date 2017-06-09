<?php

$query="select * from pvuri where pv_nou='DA'";
$caut=mysqli_query($con,$query);
$rez=mysqli_fetch_array($caut,MYSQLI_ASSOC);

if ($rez['pv_nou']=="DA"){
echo "1-->".$rez['l1']."&nbsp;2-->".$rez['l2']."&nbsp;3-->".$rez['l3']."&nbsp;4-->".$rez['l4'];
include ("html\gen_pv.html");



$query4=mysqli_query($con,"select c_reg from pvdate where ev_pv='$id'");
$a1=null;
$a2=null;
$a3=null;
$a4=null;
while ($rez4=mysqli_fetch_assoc($query4)){

if (!is_null($rez4['c_reg'])){

    switch ($rez4['c_reg']){
      case 1:
	    $a1=$a1+1;
	  break;
      case 2:
	    $a2=$a2+1;
	  break;
      case 3:
	    $a3=$a3+1;
	  break;
      case 4:
	    $a4=$a4+1;
	  break;
	  	
                           }

                              }
					  
							  
							  
							  
};

 	    echo "-Regula - Checkdisk: ".$a1."<br />";
 	    echo "-Regula - Calibrare: ".$a2."<br />";
 	    echo "-Regula - Reinstalare: ".$a3."<br />";		
 	    echo "-Regula - Altele: ".$a4."<br />";

echo "Altele:".$altele."<br />";

if ($altele=="DA"){
   $query5=mysqli_query($con,"select * from pv_altele where id_altele='$id'");
   while ($rez5=mysqli_fetch_assoc($query5)){ 

   if (!is_null($rez5['c_scan'])){
      echo "-->".$rez5['c_scan']."<br />";
                              }		 
   if (!is_null($rez5['defectiuni'])){
      echo $rez5['defectiuni']."<br />";
                              }		
 
                                             }
}

}else{

echo "<h3> GENERARE PROCES - VERBAL</h3><br /><br />"; 

$timp=mysqli_query($con,"select now()");
$rez_t=mysqli_fetch_array($timp,MYSQLI_NUM);

$time = strtotime($rez_t[0]);
$creat1= date("d.m.Y", $time);
echo $creat1;

if (!isset($_GET['creat'])){
    $_GET['creat']=$creat1;
                          } 

echo "<div class='div_genpv2'>";
  echo "Introduceti data si ora iesirii din serviciu!<br /><br />";
    echo "<form action='' method='GET'><input type='date' name='data_g' value='".$_GET['creat']."' />";
    echo "&nbsp;&nbsp;<label for='tura'><input type='radio' name='tura' id='tura' value='Z' />07:00</label>";
    echo "&nbsp;<label for='tura1' ><input type='radio' name='tura' id='tura1' value='N' />20:00</label>";
 
echo "</div>";


echo "<div class='div_genpv1'>";

  echo "<p>Selectati agentii (max.2) care predau serviciul!  </p><br />";

$query7="select * from agenti where activ='DA'";
$caut7=mysqli_query($con,$query7);


while($rez7=mysqli_fetch_array($caut7,MYSQLI_ASSOC)){

  echo "<label class='lab'><input type='checkbox' name='check_list[]' value='".$rez7['id']."' /><span>-".$rez7['id']."-".$rez7['lucratori']."</span></label><br />";

}
echo "<br />";
if   (isset($_GET['check_list']) and (count($_GET['check_list'])>2)){
        echo "<p class='red'>Atentie! Selectati maximum 2 lucratori !</p>";
                               }
if   (!isset($_GET['check_list'])and (isset($_GET['tura'])) ){
        echo "<p class='red'>Atentie! Nu ati selectat lucratorii !</p>";
                               }
if   (isset($_GET['check_list'])and (!isset($_GET['tura'])) ){
        echo "<p class='red'>Atentie! Nu ati selectat ora predarii serviciului !</p>";
		
                               }

if   (!isset($_GET['check_list'])and (!isset($_GET['tura'])) ){
        echo "<p>Actualizatati data, selectati ora si lucratorii !</p>";
                               }
  if (isset($_GET['data_g'])) {
   $zz=explode(".",$_GET['data_g']);
  if (!checkdate($zz[1],$zz[0],$zz[2])){echo "<p class='red'>Atentie! Data introdusa nu este valida !!!</p>";}
	}						   
   
							   
if ((isset($_GET['check_list']))and(isset($_GET['tura']))and(  count($_GET['check_list'])<3   ) ){
  foreach($_GET['check_list'] as $check) {
   echo "--->".$check."<br />";

                                          }  
										 
echo count($_GET['check_list'])."<br />";

echo "DATA ALEASA:".$zz[0].$zz[1].$zz[2]."<br />";

  $tura=$_GET['tura'];
  if (trim($tura)=="Z"){$timp=" 07:00:00";}else{$timp=" 20:00:00";}

$dataf=$zz[2]."-".$zz[1]."-".$zz[0].$timp;

echo $dataf;
echo "TURA:".$_GET['tura']."<br />";

if (isset($_GET['check_list'][1])){ 
  $l1=$_GET['check_list'][0];
  $l2=$_GET['check_list'][1];
  $query8="insert into pvuri (pv_nou,l1,l2,tip_tura,pv_data) values ('NU','".$l1."','.$l2.','".$tura."','".$dataf."')";
  $caut=mysqli_query($con,$query8);
                              }else{
							  
							    $l1=$_GET['check_list'][0];
 							    $query8="insert into pvuri (pv_nou,l1,tip_tura,pv_data) values ('NU','".$l1."','".$tura."','".$dataf."')";
 							    $caut=mysqli_query($con,$query8);
							  
							  
							       }



}
echo "</div>";

echo "<div class='div_genpv3'>";
echo "<input type='submit' name='trim_f' value='Genereaza PV!'> ";
echo "</form>";



echo "</div>";


    }
