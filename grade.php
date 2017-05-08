<?php
switch ($query1['grad_s']){
case "Agent":
echo "<option value='Agent Principal'>Agent Principal</option>
      <option value='Agent Sef Adjunct'>Agent Sef Adjunct</option>
      <option value='Agent Sef'>Agent Sef</option>
      <option value='Agent Sef Principal'>Agent Sef Principal</option>";
break;
case "Agent Principal":
echo "<option value='Agent'>Agent</option>
      <option value='Agent Sef Adjunct'>Agent Sef Adjunct</option>
      <option value='Agent Sef'>Agent Sef</option>
      <option value='Agent Sef Principal'>Agent Sef Principal</option>";
break;

case "Agent Sef Adjunct":
echo "<option value='Agent'>Agent</option>
      <option value='Agent Principal'>Agent Principal</option>
      <option value='Agent Sef'>Agent Sef</option>
      <option value='Agent Sef Principal'>Agent Sef Principal</option>";
break;

case "Agent Sef":
echo "<option value='Agent'>Agent</option>
      <option value='Agent Principal'>Agent Principal</option>
      <option value='Agent Sef Adjunct'>Agent Sef Adjunct</option>
      <option value='Agent Sef Principal'>Agent Sef Principal</option>";
break;

case "Agent Sef Principal":
echo "<option value='Agent'>Agent</option>
      <option value='Agent Principal'>Agent Principal</option>
      <option value='Agent Sef Adjunct'>Agent Sef Adjunct</option>
      <option value='Agent Sef'>Agent Sef</option>";
break;

default:
echo "<option value='Agent'>Agent</option>
      <option value='Agent Principal'>Agent Principal</option>
      <option value='Agent Sef'>Agent Sef</option>
      <option value='Agent Sef Adjunct'>Agent Sef Adjunct</option>	  
      <option value='Agent Sef Principal'>Agent Sef Principal</option>";
}
?>
