<?php
switch ($query1['grad_s']){
case "Agent":
      include('grade/agent.html');
break;
case "Agent Principal":
      include('grade/agent_pr.html');
break;

case "Agent Sef Adjunct":
      include('grade/agent_sa.html');
break;

case "Agent Sef":
      include('grade/agent_s.html');
break;

case "Agent Sef Principal":
      include('grade/agent_sp.html');
break;

default:
      include('grade/agent_toate.html');
}
