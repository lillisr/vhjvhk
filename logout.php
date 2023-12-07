<?php
require("start.php");
//clear Session variable
session_unset();

error_reporting (E_ALL & ~E_NOTICE & ~E_DEPRECATED);
ini_set ('display_errors', 1);
?>

<html>

<head>
    <title>logout</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="allgemien.css">
</head>

<body class="logout">
    <div class="container">
        <img src="logout.png" id="image">
        <h1> Logged out </h1>
        <p> See u!</p>
        <p><a href="login.php"> Login again </a></p>
    </div>
</body>

</html>