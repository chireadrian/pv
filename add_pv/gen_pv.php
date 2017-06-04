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



echo "<div class='div_genpv2'>";
  echo "Introduceti data si ora iesirii din serviciu!<br /><br />";
    echo "<form><input type='date' style='width:80px;' value='".$creat1."' />";
    echo " <input type='radio' name='tura' value='NU' /><span>07:00</span>";
    echo "<input type='radio' name='tura' value='DA' /><span>20:00</span> </form>";
 
echo "</div>";


echo "<div class='div_genpv1'>";
  echo "Selectati agentii (max.2) care predau serviciul!  <br /><br />";

$query7="select * from agenti where activ='DA'";
$caut7=mysqli_query($con,$query7);

echo "<form action='' method='GET'>";
while($rez7=mysqli_fetch_array($caut7,MYSQLI_ASSOC)){

echo "<label class='lab'><input type='checkbox' name='check_list[]' value='".$rez7['lucratori']."' /><span>".$rez7['lucratori']."</span></label><br />";

}

foreach($_GET['check_list'] as $check) {
echo "-".$check."<br />";

}
echo count($_GET['check_list'])."<br />";
echo $_GET['check_list'][1];

echo "<BR /><br /></div>";

echo "<div class='div_genpv3'>";
echo "<input type='submit' value='Genereaza PV!'> ";
echo "</form>";

echo "</div>";


    }
