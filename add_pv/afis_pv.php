<?php
$id=$rez['pv_id'];
$query3=mysqli_query($con,"select count(cam),count(eno),count(altele),sum(curse_e) as curseesum,sum(curse_i) as curseisum, sum(cr_c_r) as crcr, sum(cr_n_r) as crnr, sum(cr_n_t) as crnt, sum(cr_c_t) as crct, sum(c_d_r) as cdr, sum(c_d_c) as cdc,sum(c_d_d) as cdd,sum(c_d_dz) as cddz, sum(c_i_c) as cic,sum(c_i_r) as cir,sum(c_i_a) as cia from pvdate where ev_pv='$id'");
$eno="NU";
$camere="NU";
$altele="NU";
while ($rez3=mysqli_fetch_assoc($query3)){

  if ($rez3['count(cam)']==1){
   $camere="DA";
   }
  if ($rez3['count(eno)']==1){
     $eno="DA"; 
    }	

  if ($rez3['count(altele)']>0){
     $altele="DA"; 
    }	
	
 $sum_curse_i=$rez3['curseisum'];
 $sum_curse_e=$rez3['curseesum'];
 $sum_crcr=$rez3['crcr'];
 $sum_crnr=$rez3['crnr'];
 $sum_crnt=$rez3['crnt'];
 $sum_crct=$rez3['crct'];
 $sum_cdr=$rez3['cdr'];
 $sum_cdc=$rez3['cdc'];
 $sum_cdd=$rez3['cdd'];
 $sum_cddz=$rez3['cddz'];
 $sum_cic=$rez3['cic'];
 $sum_cir=$rez3['cir'];
 $sum_cia=$rez3['cia'];
 
};





