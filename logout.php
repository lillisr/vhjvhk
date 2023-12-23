<?php
require("start.php");
//clear Session variable
session_unset();

error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
ini_set('display_errors', 1);
?>

<html>

<head>
    <title>logout</title>
    <meta charset="UTF-8">
    <!-- <link rel="stylesheet" type="text/css" href="allgemien.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</head>

<body class="logout">
    <div class="container-fluid min-vh-100 d-flex justify-content-center align-items-center">
        <div>
            <img src="logout.png" width="100" height="100" id="image" class="rounded-circle mx-auto d-block mb-4">
            <fieldset class="p-3 mb-2 bg-light text-dark ">
                <div class="d-flex justify-content-center">
                    <p class="fs-1 fw-normal"> Logged out... </p>
                </div>
                <div class="d-flex justify-content-center">
                    <p> See u!</p>
                </div>
                <div class="d-grid gap-2 row-6 mx-auto">
                        <a href="login.php" class="btn btn-secondary"> Login again </a>
                </div>

            </fieldset>
        </div>
    </div>
</body>

</html>