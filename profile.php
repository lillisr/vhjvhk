<?php
require("start.php");
error_reporting (E_ALL & ~E_NOTICE & ~E_DEPRECATED);
ini_set ('display_errors', 1);


//prüfen ob variable gesetzt ist
if(!isset($_SESSION['user']) || empty($_SESSION['user'])){
	header("Location:login.php");
	die();
}

// Laden des Benutzers basierend auf dem im Query-Parameter vorgegebenen Namen// muss bei chat gemacht werden?
$loadedUser = $_SESSION["user"];

if (isset($_GET['username']) && !empty($_GET['username'])) {
    $username = $_GET['username'];

    // Laden des Benutzers über den BackendService
    $Service = new \Utils\BackendService(CHAT_SERVER_URL, CHAT_SERVER_ID);
    $loadedUser = $Service->loadUser($username);

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

<!Doctype html>
    <head>
        <title>profile</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="allgemien.css">
    </head>
    <body >
        <div class="container" >

        
        <h1> Profile of <?php echo $loadedUser->getFirstName(); ?></h1>
        <a href="chat.php"> Back to Chat</a> 
        <a href="friends.php"  id="Achtung"> Remove Friend</a>
        <p> 
        <div class="containerprofile" >
<fieldset class="pictureprofile" class="legendFieldset" >

       <img src="profile.png" alt="Platzhalter für ein Bild">
    </fieldset>
    </p>
        <fieldset class="profilefield" class="legendFieldset">

        <p>  <?php echo $loadedUser->getTellSomething(); ?></p>

        <p> </p>
        <table>
        
            <tr>
                <th>FirstName  </th>
                <th>LastName  </th>
                <th>Coffee or Tea</th>
            </tr>
            <tr>
                <td><?php echo $loadedUser->getFirstName(); ?></td>
                <td><?php echo $loadedUser->getLastName(); ?></td>
                <td><?php echo $loadedUser->getCoffeeorTea(); ?></td>
            </tr>
        </table>
        </fieldset>
    </div>
</div>
    </body>
    
</Doctype>