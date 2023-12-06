<?php
require("start.php");
error_reporting (E_ALL & ~E_NOTICE & ~E_DEPRECATED);
ini_set ('display_errors', 1);

//Teilaufgabe i

if (!isset($_SESSION['user']) || empty($_SESSION['user'])) {
    header('Location: login.php');
    exit();
} // woher kommt $_SESSION -> In Backend service klasse definiert in Methode login

// Laden Sie den Benutzer aus der Session
$loggedInUser = $_SESSION['user'];

//me 



/*

// Verarbeiten Sie das Formular nur, wenn Daten übermittelt wurden
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Laden Sie die Eingaben aus dem Formular
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $coffeeOrTea = $_POST['coffeeOrTea'];
    $aboutMe = $_POST['aboutMe'];
    $chatLayout = $_POST['chatLayout'];

    // Aktualisieren Sie die Benutzerdaten
    $loggedInUser->setFirstName($firstName);
    $loggedInUser->setLastName($lastName);
    $loggedInUser->setCoffeeOrTea($coffeeOrTea);
    $loggedInUser->setAboutMe($aboutMe);
    $loggedInUser->setChatLayout($chatLayout);

    // Speichern Sie den aktualisierten Benutzer im Backend
    $backendService = new \Utils\BackendService(CHAT_SERVER_URL, CHAT_SERVER_ID);
    
    if ($backendService->saveUser($loggedInUser)) {
        // Erfolgreich gespeichert
        echo "Einstellungen erfolgreich gespeichert!";
    } else {
        // Fehler beim Speichern
        echo "Fehler beim Speichern der Einstellungen!";
    }
}

*/

?>

<!DOCTYPE html>
<html>

<head>
    <title>Aufgabe1.3</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="allgemien.css">
</head>

<body class="settings">
    <div class="container">
        <h1 class="headline"> Profile Settings </h1>
        <fieldset class="legendFieldset">

            <legend> Base Data </legend>

            <div class="FN">
                <label for="FirstName">First Name</label> 
                <input id=weite placeholder="Your Name"><br>
            </div>
            <div class="LN"> 
                <label for="LastName">Last Name</label> 
                <input id=weite placeholder="Your Surname"><br>
            </div>
            <div class="T"><label for="CoffeeorTea">Coffee or Tea?</label> 
                <select id=weite>
                    <option> Tea</option>
                    <option> Coffee</option>
                </select></div>
        </fieldset>
        <fieldset class="legendFieldset">
            <legend> Tell something about you </legend>
            <label for=textarea ><Textarea placeholder="Leave a comment here"> </Textarea></label> <br>

        </fieldset>
        <fieldset class="legendFieldset">
            <legend> Prefered Chat Layout </legend>
            <label><input type=radio name="rd">UserName and Message in one line</label><br>
            <label> <input type=radio name="rd">Username and Message in seperate lines</label><br>
        </fieldset> <br>
        <form> 
             <button  type="submit" formaction="friends.html" class="greyButton" >Cancel</button>
             <button class="coloredButton"> Save </button></div></br>
        </form>
</div>
    </body>
    </html>