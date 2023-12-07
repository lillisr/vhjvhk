<?php
require("start.php");
error_reporting (E_ALL & ~E_NOTICE & ~E_DEPRECATED);
ini_set ('display_errors', 1);


//Teilaufgabe i


// nutzer wegleietn wenn dieser unbekannt ist
if(!isset($_SESSION['user']) || empty($_SESSION['user'])){
	header("Location:login.php");
	die();
}


//me 
 //Laden Sie den Benutzer aus der Session
if(isset($_SESSION["user"]) ){
	$loggedInUser = $_SESSION["user"];

} 

// Verarbeiten Sie das Formular nur, wenn Daten übermittelt wurden
if (isset($_GET['action']) && $_GET['action'] == 'action'){ // nur ausführen wenn fomular abgesendet wurde
        //eingene überprüfung
    
    // Laden Sie die Eingaben aus dem Formular
    $firstName = $_POST["firstName"];
    $lastName = $_POST['lastName'];
    $coffeeOrTea = $_POST['coffeeOrTea'];
    $TellSomething = $_POST['TellSomething'];
    $rd = $_POST['rd'];
    
    var_dump($service->loadUsers());

    // Aktualisieren Sie die Benutzerdaten
    $loggedInUser->setFirstName($firstName);
    $loggedInUser->setLastName($lastName);
    $loggedInUser->setCoffeeOrTea($coffeeOrTea);
    $loggedInUser->setTellSomething($TellSomething);
    $loggedInUser->setrd($rd);


    


    // Speichern Sie den aktualisierten Benutzer im Backend
    $service = new \Utils\BackendService(CHAT_SERVER_URL, CHAT_SERVER_ID);
    
    if ($service->saveUser($loggedInUser)) {
        // Erfolgreich gespeichert
        echo "Einstellungen erfolgreich gespeichert!";
    } else {
        // Fehler beim Speichern
        echo "Fehler beim Speichern der Einstellungen!";
    }

} 
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
            <!-- Ab hier sachen für php -->
            <form action="Einstellungen.php" method="post">
            <legend> Base Data </legend>

            <div class="FN">
                <label for="FirstName">First Name</label> 
                <input type="text" name="FirstName" id=weite  placeholder="Your Name"  ><br>
            </div>
            <div class="LN"> 
                <label for="LastName">Last Name</label> 
                <input type="text" name="LastName" id=weite placeholder="Your Surname"><br>
            </div>
            <div class="T"><label for="CoffeeorTea">Coffee or Tea?</label> 
                <select type="action" name=CoffeeOrTea id=weite> <!--was ist select für ein type??? -->
                    <option> Tea</option>
                    <option> Coffee</option>
                </select></div>
        </fieldset>
        <fieldset class="legendFieldset">
            <legend> Tell something about you </legend>
            <label type="text" name="TellSomething" for=textarea ><Textarea placeholder="Leave a comment here"> </Textarea></label> <br>

        </fieldset>
        <fieldset class="legendFieldset">
            <legend> Prefered Chat Layout </legend>
            <label><input type="radio" name="rd">UserName and Message in one line</label><br> <!--ist das so richtig? -->
            <label> <input type="radio" name="rd">Username and Message in seperate lines</label><br>
        </fieldset> <br>
        
             <button  type="submit" formaction="friends.php" class="greyButton" >Cancel</button>
             <button type="submit" value="senden" class="coloredButton"> Save </button></div></br>
</form>
</div>
    </body>
    </html>