<?php

error_reporting (E_ALL & ~E_NOTICE & ~E_DEPRECATED);
ini_set ('display_errors', 1);


spl_autoload_register(function($class) {
include str_replace('\\', '/', $class) . '.php';
});

session_start(); 

define('CHAT_SERVER_URL', 'https://online-lectures-cs.thi.de/chat/');
define('CHAT_SERVER_ID', '5cff7201-37c0-4016-82fd-e91db1a98eb2'); # Ihre Collection ID


$service = new Utils\BackendService(CHAT_SERVER_URL, CHAT_SERVER_ID);
?>