
<?php

/*
require("start.php");
$user = new Model\User("Test");
$json = json_encode($user);
echo $json;
  result:
 {"username":"Test"} object(Model\User)#5 (1) { ["username":"Model\User":private]=> string(4) "Test" }
 */


//Erzeugung  User Instanz

require("start.php");
$user = new Model\User("Test");
$json = json_encode($user);
echo $json . "<br>";
$jsonObject = json_decode($json);
$newUser = Model\User::fromJson($jsonObject);
var_dump($newUser);


?>