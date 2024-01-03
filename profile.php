<?php
require("start.php");
error_reporting (E_ALL & ~E_NOTICE & ~E_DEPRECATED);
ini_set ('display_errors', 1);


//prüfen ob variable gesetzt ist
if(!isset($_SESSION['user']) || empty($_SESSION['user'])){
	header("Location:login.php");
	die();
}

// Laden des Benutzers basierend auf dem im Query-Parameter vorgegebenen Namen
$loadedUser =null;   //global...

if (isset($_GET['friend']) && !empty($_GET['friend'])) { //hier wird überprüft ob der queryparameter nicht leer ist
    $username = $_GET['friend']; //freund wird über queryparamter geladen

    // Laden des Benutzers über den BackendService
    $service = new \Utils\BackendService(CHAT_SERVER_URL, CHAT_SERVER_ID);
    $loadedUser = $service->loadUser($username); //nutzer über backendserver geladen und inloadesuser gespeichert

    // Überprüfen, ob der Benutzer geladen wurde
   if (!$loadedUser) {
        header("Location: friends.php");
        die();
    }
} else {
    // Weiterleitung, wenn kein Nutzer angegeben ist
    header("Location: friends.php");
    die(); 
} 

?>

<!doctype html>
    <html>
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">   
            <title>Profile</title>     
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" 
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">    
        </head>
        <body>
            <div class="container">
                <h1> Profile of <?php echo $_GET['friend'] ?></h1>
                <p class="btn-group"><a href="chat.php" class="btn btn-secondary"> &lt Back to Profile</a>
                    <a href="friends.php" class="btn btn-danger">Remove Friend</a></p>
            </div>
            <br><br>
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                            <img src="profile.png" class="img-fluid" alt="profile picture">
                    </div>

                <div class="col-md-6">
                    <div class="container border">
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quo architecto soluta quisquam 
                            illo suscipit tempore debitis sunt voluptatem fugit at. Sed mollitia id iusto aliquam explicabo, 
                            dolore illum ut dignissimos!</p>
                        <p><?php echo $loadedUser->getTellSomething(); ?></p>
                        <br><br>
                        <div class="row">
                            <div class="col"></div>
                            <p><strong>FirstName:</strong> <?php echo $loadedUser->getFirstName(); ?></p>
                            <p><strong>LastName:</strong> <?php echo $loadedUser->getLastName(); ?></p>
                            <p><strong>Coffee or Tea:</strong> <?php echo $loadedUser->getCoffeeorTea(); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </body>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </html>