<?php
require("start.php");
$service = new Utils\BackendService(CHAT_SERVER_URL, CHAT_SERVER_ID);

var_dump($service->test());
//var_dump($service->register("Test123", "Test456"));
var_dump($service->login("Jerry", "87654321"));
var_dump($service->loadUser("Test123"));
//problem hier: man muss php array übergeben
var_dump($service->saveUser("Test123"));
var_dump($service->loadMessages("Test123"));
var_dump($service->loadFriends()); 
var_dump($service->loadUsers());
var_dump($service->sendMessage("Test123"));
var_dump($service->friendRequest("Test123"));
var_dump($service->friendAccept("Test123"));
var_dump($service->friendDismiss("Test123"));
var_dump($service->removeFriend("Test123"));
var_dump($service->userExists("Test123"));
var_dump($service->getUnread());

?>