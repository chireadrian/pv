<?php
if (isset($_POST['submit_add'])){
    $lucrator_add=strtoupper(trim($_POST['lucrator_add']));
    $grad_add=$_POST['grad_add'];
       if (!empty($lucrator_add)){
           $timp=mysqli_query($con,"select now()"); 
           $rez=mysqli_fetch_array($timp,MYSQLI_NUM);
           $creat=$rez[0];
           $query_add=mysqli_query($con,"insert into agenti (grad_s,lucratori,activ,creat) values('$grad_add','$lucrator_add','NU','$creat')");
           unset($_GET['add']);
                                 }
                                 }
if (isset($_GET['activ'])){
    $id2=$_GET['id'];
    $activx=$_GET['activ'];
	   if ($activx=="NU"){
		   $activx="DA";
  		   $query2=mysqli_query($con,"update agenti set activ='$activx',dezactivat=NULL where id='$id2'");  
		   }
		   else
		   {
	      $timp=mysqli_query($con,"select now()"); 
          $rez=mysqli_fetch_array($timp,MYSQLI_NUM);
          $creat1=$rez[0];
		  $activx="NU";
		  $query2=mysqli_query($con,"update agenti set activ='$activx',dezactivat='$creat1' where id='$id2'");
		                  }
                         }
if (isset($_GET['add'])) {
      switch ($_GET['add']){
       case "inregistrare":
	  echo "<div class='add_reg'><form method='post' action=''>
		 <select name='grad_add'>
		  <option value='Agent'>Agent</option><option value='Agent Principal'>Agent Principal</option>
          <option value='Agent Sef Adjunct'>Agent Sef Adjunct</option><option value='Agent Sef'>Agent Sef</option>
		  <option value='Agent Sef Principal'>Agent Sef Principal</option>
		 </select>
		 <input  type='text' name='lucrator_add' /><input type='submit' name='submit_add' value='Salveaza'>
		        </form></div>";
 		break;
      default:
	    break;
	  		  				 }
                         }
if (isset($_POST['submit'])){
      $grad=$_POST['grad'];
	  $id1=$_GET['id'];
 	  $lucrator=strtoupper(trim($_POST['lucrator']));
		 if (!empty($lucrator)){
              $query2=mysqli_query($con,"update agenti set grad_s='$grad', lucratori='$lucrator' where id='$id1'");
		                       }
      unset($_GET['id']);
                             }

 $query=mysqli_query($con,"select * from agenti");
 echo "<table class='afisare'> <tr><td>Grad</td> <td>Lucrator</td> <td>Activ</td> <td style='text-align:center;'>Creat</td> <td style='text-align:center;'>Dezactivat</td> <td></td> <td></td></tr>"; 

 while ($query1=mysqli_fetch_array($query,MYSQLI_ASSOC)){
       $id=$query1['id'];
       $activ=$query1['activ'];
          if ($activ=="NU"){ $actdez="Activare"; } else{ $actdez="Dezactivare";}
          if (isset($_GET['id'])and (!isset($_GET['activ']))){
               if ($query1['id']==$_GET['id']) { 
 			         echo "<tr> <td><form method='post' action=''> <select name='grad'><option>".ucwords(strtolower($query1['grad_s']))."</option>";
					 include ('grade.php');
                	 echo "</select> </td> <td><input type='text' class='edit' name='lucrator' value='".$query1['lucratori']."' /></td> <td>".$query1['activ']."</td> <td>".$query1['creat']."</td> <td>".$query1['dezactivat']."</td>";
               	     echo "<td>&nbsp; <input class='curs' type='submit' name='submit' value='Salveaza'> </td>";   	  
                	 echo "<td>&nbsp; <a class='hov' href='pv_config.php?id=".$id."&activ=".$activ."'>".$actdez."</a> </td></form></tr>";	 

	 				 	  			  	 	 } else
				   {
                     echo "<tr> <td>".ucwords(strtolower($query1['grad_s']))."</td> <td>".$query1['lucratori']."</td> <td>".$query1['activ']."</td> <td>".$query1['creat']."</td> <td>".$query1['dezactivat']."</td>";
                	 echo "<td>&nbsp;";

					 if ($query1['activ']=="NU"){
					   	  echo" Editare </td>";}else{
						  echo" <a class='hov' href='pv_config.php?id=".$id."'>Editare</a> </td>";
						  		   			    }	 
     	        	 echo "<td>&nbsp; <a class='hov' href='pv_config.php?id=".$id."&activ=".$activ."'>".$actdez."</a> </td></tr>";
         
                   }
                                                               }else
					  {
              	 $time = strtotime($query1['creat']);
                 $creat1= date("d-m-Y H:i", $time);
				 	 if (!is_null($query1['dezactivat'])){
	   				     $time1= strtotime($query1['dezactivat']);
					     $dezact= date("d-m-Y H:i", $time1);
  						 		  			  			  } else 
	                       {
                       	   	 $time1= strtotime($query1['dezactivat']);
                             $dezact=NULL;
				   	       }   	 					  
                     echo "<tr> <td>".ucwords(strtolower($query1['grad_s']))."</td> <td>".$query1['lucratori']."</td> <td>".$query1['activ']."</td> <td>".$creat1."</td> <td>".$dezact."</td>";
                	 echo "<td>&nbsp;";
        	 if ($query1['activ']=="NU"){
        	 	 echo" Editare </td>";}else{
        	     echo" <a class='hov' href='pv_config.php?id=".$id."'>Editare</a> </td>";
        	                               }
		 echo "<td>&nbsp; <a class='hov' href='pv_config.php?id=".$id."&activ=".$activ."'>".$actdez."</a> </td></tr>";
		 	    }
       } 
echo "</table>";
