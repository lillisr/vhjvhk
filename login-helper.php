<?php

require("start.php");


$service = new Utils\BackendService(CHAT_SERVER_URL, CHAT_SERVER_ID);
var_dump($service->login("Jerry", "87654321"));

?>
