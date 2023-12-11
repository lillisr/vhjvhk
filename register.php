<?php
require("start.php");
require_once ("BackendService.php");

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST["username"]) && isset($_POST['password']) && isset($_POST['confirmPassword'])){

        $username = $_POST["username"];
        $password = $_POST["password"];
        $confirmPassword = $_POST["confirmPassword"];

        if(empty($username) || empty($password) || empty($confirmPassword)){
            echo 'field is empty!';
        }
        if(strlen($username) < 3) {
            echo 'Username must be at least 3 characters!';
        }
        if(strlen($password) < 8) {
            echo 'Username must be at least 8 characters!';
        }
        if($password !== $confirmPassword){
            echo 'password does not match!';
        }
        else{
            var_dump($service->register($username, $password));

            if($service->register($username, $password)) {
                $_SESSION["user"] = $username;
                header("Location: friends.php");
            }
        }
    }
}


error_reporting (E_ALL & ~E_NOTICE & ~E_DEPRECATED);
ini_set ('display_errors', 1);
?>

<!doctype html>
<html>
    <head>
        <title>Register</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="allgemien.css">
    </head>

    <body> 
        <div class="container">
        <img src="user.png" id="image" height="100" width="100">
        <h1>Register yourself</h1>
        <form id="registerForm" method = "post">
            <fieldset class="legendFieldset">
                <legend>Register</legend><br>
                    <div class="formControl">
                        <label for="username">Username:</label>
                        <input class="error-input" class="success-input" type="text" id="username" name="username" placeholder="Username"><br><br>
                                        
                        <label for="password">Password:</label>
                        <input type="password" class="error-input" class="success-input" id="password" name="password" placeholder="Password"><br><br>

                        <label for="confirmPassword">Confirm Password:</label>
                        <input type="password" class="error-input" class="success-input" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password"><br><br>
                        </div>
                
                        <!--<input type="checkbox" onclick="Toggle()" id="toggle">
                        <label for="pw">Toggle Password</label>-->

                        <p></p>
                        <input type="button" value="Cancel" onclick="window.location.href='login.php'" class="greyButton"> </button>

                        <input type="submit" value="Create Account" id="button" class="coloredButton"></button>
            </fieldset>
        </form>
        </div>
    </body>
</html>