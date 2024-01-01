<?php
require("start.php");

if (isset($_SESSION["user"]) && $_SESSION["user"]) {
    header("Location: friends.php");
    die();
}


//data was sent, button is clicked
if (isset($_POST["action"]) && $_POST["action"] == "login") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    //check if username/password correct -> login method BackendService
    //var_dump($service->login($username, $password));

    if ($service->login($username, $password)) {
        $_SESSION["user"] = $username;
        header("Location: friends.php");
    } else { ?>
        <h3> Invalid Username / Password </h3>
        <?php
    }
}

?>

<html>

<head>
    <title>login</title>
    <meta charset="UTF-8">
    <!-- <link rel="stylesheet" type="text/css" href="allgemien.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="container-fluid min-vh-100 d-flex justify-content-center align-items-center">
        <div>
            <img src="chat.png" width="100" height="100" id="image" class="rounded-circle mx-auto d-block">
            <form action="login.php" method="post" class="mt-3">
                <fieldset class="p-3 mb-2 bg-light text-dark">
                    <div class="d-flex justify-content-center">
                        <legend>Please sign in</legend>
                    </div>
                    <div class="mb-3">
                        <!-- <label for="username">Username:</label> -->
                        <input type="text" id="username" name="username" placeholder="Username" class="form-control">
                    </div>
                    <div class="mb-3">
                        <!-- <label for="password">Password:</label> -->
                        <input type="password" id="password" name="password" placeholder="Password"
                            class="form-control">
                    </div>
                    <div class="row">
                        <div class="btn-group">
                            <a href="register.php" type=„button“ id="registerButton"
                                class="btn btn-secondary">Register</a>
                            <button type="submit" name="action" value="login" class="btn btn-primary">Login</button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>

    </div>
</body>

</html>