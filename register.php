<?php
require("start.php");
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
        <form id="registerForm" onsubmit="return register()">
            <fieldset class="legendFieldset">
                    <legend>Register</legend><br>
                        <div class="formControl">
                            <label for="uname">Username:</label>
                            <input class="error-input" class="success-input" type="text" id="uname" name="uname" placeholder="Username" required><br><br>
                                            
                            <label for="pw">Password:</label>
                            <input type="password" class="error-input" class="success-input" id="pw" name="pw" placeholder="Password" required><br><br>
                                            
                            <label for="cPw">Confirm Password:</label>
                            <input type="password" class="error-input" class="success-input" id="cPw" name="cPw" placeholder="Confirm Password" required><br><br>
                            </div>
                            <input type="checkbox" onclick="Toggle()">
                            <p></p>
                            <input type="button" value="Cancel" onclick="window.location.href='login.php'" class="greyButton"> </button>

                             <form action="friends.php" onclick="return register()"></form>
                            <input type="submit" value="Create Account" id="button" onclick="register()" class="coloredButton"></button>
                        </fieldset>
        </form>
        </div>
        <script src="registerJS.js"></script>
    </body>
</html>