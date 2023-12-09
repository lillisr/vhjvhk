<?php
require("start.php");
error_reporting (E_ALL & ~E_NOTICE & ~E_DEPRECATED);
ini_set ('display_errors', 1);
?>

<!DOCTYPE html>
<html>
<head>
    <title>login</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="allgemien.css">
</head>

<body>
    <?php
        $name = $password = "";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = test_input($_POST["name"]);
            $password = test_input($_POST["password"]);
        }
          
        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
        <div class="container">
            <img src="chat.png" width="100" height="100" id="image" class="login-pic">
            <h1>Please sign in</h1>
            <fieldset class="legendFieldset">
                <legend>Login</legend>
                Name: <input type="text" name="name" id="username">
                <br><br>
                Password: <input type="text" name="password" id="password">
                <br><br>
                <input type="submit" name="submit" value="Login" formaction="friends.php" class="coloredButton">
                <button type="submit" formaction="register.php" class="greyButton" formnovalidate>Register</button>
            </fieldset>
        </div>
    </form>
</body>

</html>