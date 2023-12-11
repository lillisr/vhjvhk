<?php
require("start.php");

$nameErr = "";
$passwordErr = "";
$passwordConfErr = "";
$emptyErr = "";
$user = "";
$password = "";
$confirmPassword = "";

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $isValid = true; // Add a variable to track overall validation

    if(empty($_POST["user"])){
        $nameErr = "Username field is required!";
        $isValid = false; // Set the overall validation flag to false
    }else if(strlen($_POST["user"]) < 3) {
        $nameErr = "Username must be at least 3 characters!";
        $isValid = false; // Set the overall validation flag to false
    }else{
        $user = $_POST["user"];
    }
    if(empty($_POST['password'])){
        $passwordErr = "Password field is required!";
        $isValid = false; // Set the overall validation flag to false
    }else if(strlen($_POST["password"]) < 8) {
        $passwordErr = "Password must be at least 8 characters!";
        $isValid = false; // Set the overall validation flag to false
    }else{
        $password = $_POST["password"];
    }
    if(empty($_POST['confirmPassword'])){
        $passwordConfErr = "Password Confirmation field is required!";
        $isValid = false; // Set the overall validation flag to false
    }else if($password !== $_POST['confirmPassword']) {
        $passwordConfErr = "Password does not match";
        $isValid = false; // Set the overall validation flag to false
    }else{
        $confirmPassword = $_POST["confirmPassword"];
    }

    if($isValid) {
        // Perform registration if the overall validation is successful
        var_dump($service->register($user, $password));
        if($service->register($user, $password)) {
            $_SESSION["user"] = $user;
            header("Location: friends.php");
            exit;
        }else{
            $emptyErr = "Registration failed!";
        }
    }
}
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
        <form id="registerForm" method = "post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <fieldset class="legendFieldset">
                <legend>Register</legend><br>
                    <div class="formControl">
                        <label for="username">Username:</label>
                        <input class="error-input" class="success-input" type="text" name="user" onkeyup="checkUsername(this.value)" placeholder="Username"><br>
                        <span class="error" id="ajax_check_user"></span>
                        <br><br>
                                        
                        <label for="password">Password:</label>
                        <input type="password" class="error-input" class="success-input" name="password" value="<?php echo $password;?>" placeholder="Password"><br>
                        <span class="error"> *  <?php echo $passwordErr;?> </span>
                        <br><br>

                        <label for="confirmPassword">Confirm Password:</label>
                        <input type="password" class="error-input" class="success-input"  name="confirmPassword" value="<?php echo $confirmPassword;?>" placeholder="Confirm Password"><br>
                        <span class="error"> *  <?php echo $passwordConfErr;?><br>
                        <br><br>
                        </div>
                        <p></p>
                        <input type="button" value="Cancel" onclick="window.location.href='login.php'" class="greyButton"> </button>

                        <input type="submit" value="Create Account" id="button" class="coloredButton"></button>
                    </div>
        </fieldset>
        </form>
        </div>
        <script src="registerJS.js"> </script>
    </body>
</html>