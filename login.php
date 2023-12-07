<?php
require("start.php");

if(isset($_SESSION["user"]) && $_SESSION["user"]) {
    header("Location: friends.php");
    die();
}
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
ini_set('display_errors', 1);
$service = new Utils\BackendService(CHAT_SERVER_URL, CHAT_SERVER_ID);


//data was sent, button is clicked
if(isset($_POST["action"]) && $_POST["action"] == "login") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    //check if username/password correct -> login method BackendService
    var_dump($service->login($username, $password));

    if($service->login($username, $password)) {
        $_SESSION["user"] = $username;
        header("Location: friends.php");
    } else {
        echo "error";
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
                    <button type="submit" formaction="register.php" class="greyButton" formnovalidate>Register</button>
                    <button type="submit" name="action" value="login" class="coloredButton">Login</button>
                </div>
            </fieldset>
        </form>
    </div>
</body>

</html>