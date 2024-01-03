<?php
require("start.php");

$nameErr = "";
$passwordErr = "";
$passwordConfErr = "";
$emptyErr = "";
$user = "";
$password = "";
$confirmPassword = "";


if ($_SERVER["REQUEST_METHOD"] === "POST"){
    $user = $_POST["user"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];
    $isValid = true; // Add a variable to track overall validation
    $exists = $service->userExists($user);

    if($exists){
        $emptyErr = "User already exists";
        $isValid = false;
    }
    if(empty($_POST['user'])){
        $nameErr = "Username field is required!";
        $isValid = false; // Set the overall validation flag to false
    }
    if(strlen($_POST["user"]) < 3) {
        $nameErr = "Username must be at least 3 characters!";
        $isValid = false; // Set the overall validation flag to false
    }
    if(empty($_POST['password'])){
        $passwordErr = "Password field is required!";
        $isValid = false; // Set the overall validation flag to false
    }
    if(strlen($_POST["password"]) < 8) {
        $passwordErr = "Password must be at least 8 characters!";
        $isValid = false; // Set the overall validation flag to false
    }

    if(empty($_POST['confirmPassword'])){
        $passwordConfErr = "Password Confirmation field is required!";
        $isValid = false; // Set the overall validation flag to false
    }
    if($password !== $confirmPassword) {
        $passwordConfErr = "Password does not match";
        $isValid = false; // Set the overall validation flag to false
 
    }
    if($isValid) {
        // Perform registration if the overall validation is successful
        $checkUser = $service->register($user, $password);
        if($checkUser) {
            $_SESSION['user'] = $user;
            header("Location: friends.php");
            exit();
        }else{
            $emptyErr = "Registration failed!";
        }
    }
}
?>

<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">        
        <title>Register</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">    
    </head>

    <body> 
        <div class="text-center">
            <img src="user.png" class="rounded-circle" height="150" width="150">
        </div>
        <br><br>

        <div class="container border">
            <div class="text-center" >
            <br><br>
                <h1>Register yourself</h1>
                <br><br>
                <form id="registerForm" method = "post" action="<?php echo "register.php"?>">
                    <div class="pagination justify-content-center">
                        <div class="w-50 mb-3 mt-3">
                            <input type="username" class="form-control" id="user" placeholder="Username" name="user" value="<?php echo $user;?>">
                            <p class="text-danger"> <?php echo $emptyErr;?><br>
                        </div>
                    </div>
                    <div class="pagination justify-content-center">
                        <div class=" w-50 mb-3">
                            <input type="password" class="form-control" id="password" placeholder="Password" name="password" value="<?php echo $password;?>">
                            <p class="text-danger"> <?php echo $passwordErr;?><br>
                        </div>
                    </div>

                    <div class="pagination justify-content-center">
                        <div class="w-50 mb-3">
                            <input type="password" class="form-control" id="confirmPassword" placeholder="Confirm Password" name="confirmPassword" value="<?php echo $confirmPassword;?>">
                            <p class="text-danger"> <?php echo $passwordConfErr;?>
                        </div>
                    </div>
                    <input type="button" class="btn btn-secondary" value="Cancel" onclick="window.location.href='login.php'"> </button>

                    <input type="submit" class="btn btn-primary" value="Create Account" id="button"></button>
                    <br><br>
                </form>
            </div>
        </div>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>