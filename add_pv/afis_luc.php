<?php
$query2=mysqli_query($con,"select grad_s,lucratori from agenti where id='$l'");
$rez2=mysqli_fetch_array($query2,MYSQLI_ASSOC);
echo $rez2['grad_s']."&nbsp;<strong>".$rez2['lucratori']."</strong>";
?>