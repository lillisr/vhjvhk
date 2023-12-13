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
    <link rel="stylesheet" type="text/css" href="allgemien.css">

</head>

<body>
    <div class="container">
        <img src="chat.png" width="100" height="100" id="image" class="login-pic">
        <h1>Please sign in</h1>


        <form action="login.php" method="post">
            <fieldset class="legendFieldset">
                <legend>Login</legend>

                <div class="username">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" placeholder="Username" required><br><br>
                </div>
                <div class="password">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" placeholder="Password" required><br><br>
                </div>
                <div class="submit">
                    <a href=„register.php“><button type=„button“>Register</button></a>
                    <button type="submit" name="action" value="login" class="coloredButton">Login</button>
                </div>
            </fieldset>
        </form>
    </div>
</body>

</html>