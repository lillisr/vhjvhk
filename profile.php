<<<<<<< HEAD
=======
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
$loadedUser = $_SESSION["user"];    //ist das so richtig?

if (isset($_GET['username']) && !empty($_GET['username'])) {
    $username = $_GET['username'];

    // Laden des Benutzers über den BackendService
    $service = new \Utils\BackendService(CHAT_SERVER_URL, CHAT_SERVER_ID);
    $loadedUser = $service->loadUser($username);

    // Überprüfen, ob der Benutzer geladen wurde
 /*   if (!$loadedUser) {
        header("Location: friends.php");
        die();
    }
} else {
    // Weiterleitung, wenn kein Nutzer angegeben ist
    header("Location: friends.php");
    die(); */
}



?>

>>>>>>> d84dd88ca4ff47462e93ca9a422e466c9fe2e042
<!Doctype html>
    <head>
        <title>profile</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="allgemien.css">
    </head>
    <body >
        <div class="container" >

        
<<<<<<< HEAD
        <h1> Profile of Tom</h1>
        <a href="chat.html"> Back to Chat</a> 
        <a href="friends.html"  id="Achtung"> Remove Friend</a>
=======
        <h1> Profile of <?php echo $loadedUser->getFirstName(); ?></h1>
        <a href="chat.php"> Back to Chat</a> 
        <a href="friends.php"  id="Achtung"> Remove Friend</a>
>>>>>>> d84dd88ca4ff47462e93ca9a422e466c9fe2e042
        <p> 
        <div class="containerprofile" >
<fieldset class="pictureprofile" class="legendFieldset" >

       <img src="profile.png" alt="Platzhalter für ein Bild">
    </fieldset>
    </p>
        <fieldset class="profilefield" class="legendFieldset">

<<<<<<< HEAD
        <p>  Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet cli</p>
=======
        <p>  <?php echo $loadedUser->getTellSomething(); ?></p>
>>>>>>> d84dd88ca4ff47462e93ca9a422e466c9fe2e042

        <p> </p>
        <table>
        
            <tr>
                <th>FirstName  </th>
                <th>LastName  </th>
                <th>Coffee or Tea</th>
            </tr>
            <tr>
<<<<<<< HEAD
                <td>Lilli</td>
                <td>Sauer</td>
                <td>Tea</td>
=======
                <td><?php echo $loadedUser->getFirstName(); ?></td>
                <td><?php echo $loadedUser->getLastName(); ?></td>
                <td><?php echo $loadedUser->getCoffeeorTea(); ?></td>
>>>>>>> d84dd88ca4ff47462e93ca9a422e466c9fe2e042
            </tr>
        </table>
        </fieldset>
    </div>
</div>
    </body>
    
</Doctype>