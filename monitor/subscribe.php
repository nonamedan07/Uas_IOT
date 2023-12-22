<?php

require("phpMQTT.php");
require("config.php");
$topic = "iot/G.211.20.0014";
$mqtt = new bluerhinos\phpMQTT($host, $port, "G.211.20.0014-75634".rand());

if(!$mqtt->connect(true,NULL,$username,$password)){
  exit(1);
}

//currently subscribed topics
$topics[$topic] = array("qos"=>0, "function"=>"procmsg");
$mqtt->subscribe($topics,0);

while($mqtt->proc()){
}

$mqtt->close();
function procmsg($topic,$msg){
  $skr = date("d-m-Y H:i:s");
  echo "\r\n $skr : [$topic] : $msg";
}


?>
