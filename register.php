<!doctype html>
<html>
    <head>
        <title>Register</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="allgemien.css">
    </head>

    <body> 
    <script src="registerJS.js"></script>
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
                            <input type="text" class="error-input" class="success-input" id="pw" name="pw" placeholder="Password" required><br><br>
                                            
                            <label for="cPw">Confirm Password:</label>
                            <input type="text" class="error-input" class="success-input" id="cPw" name="cPw" placeholder="Confirm Password" required><br><br>
                            </div>
                            <input type="checkbox" onclick="Toggle()">
                            <label for="pw">Toggle Password</label>

                            <p></p>
                            <input type="button" value="Cancel" onclick="window.location.href='login.html'" class="greyButton"> </button>

                             <form action="friends.html" onclick="return register()"></form>
                            <input type="submit" value="Create Account" id="button" onclick="register()" class="coloredButton"></button>
                        </fieldset>
                    </form>
        </div>
    </body>
</html>