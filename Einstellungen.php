<?php
require("start.php");
error_reporting (E_ALL & ~E_NOTICE & ~E_DEPRECATED);
ini_set ('display_errors', 1);


// nutzer wegleietn wenn dieser unbekannt ist
if(!isset($_SESSION['user']) || empty($_SESSION['user'])){
	header("Location:login.php");
	die();
}

$username=null;
//me 
 //Laden Sie den Benutzer aus der Session
if(isset($_SESSION["user"]) ){
	$username = $_SESSION["user"];
    
    // Laden des Benutzers über den BackendService
    $service = new \Utils\BackendService(CHAT_SERVER_URL, CHAT_SERVER_ID);
    $loggedInUser = $service->loadUser($username); //nutzer über backendserver geladen und inloadesuser gespeichert

} 

// Verarbeiten des Formulars nur, wenn Daten übermittelt wurden
if  (isset($_POST['action']) && $_POST['action'] == 'senden'){ // nur ausführen wenn fomular abgesendet wurde
    
    // Laden der Eingaben aus dem Formular
    $firstName = $_POST["FirstName"];
    $lastName = $_POST['LastName'];
    $coffeeOrTea = $_POST['CoffeeOrTea'];
    $TellSomething = $_POST['TellSomething'];
    $rd = $_POST['rd'];

    // Aktualisieren Sie die Benutzerdaten
    $loggedInUser->setFirstName($firstName);
    $loggedInUser->setLastName($lastName);
    $loggedInUser->setCoffeeOrTea($coffeeOrTea);
    $loggedInUser->setTellSomething($TellSomething);
    $loggedInUser->setrd($rd);

    // Speichern des aktualisierten User im Backend
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
    <title>Einstellungen</title>
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
                <input type="text" name="FirstName" id=weite  placeholder="Your Name" value="<?php echo $loggedInUser->getFirstName() ?>" > <br>
            </div>
            <div class="LN"> 
                <label for="LastName">Last Name</label> 
                <input type="text" name="LastName" id=weite placeholder="Your Surname" value="<?php echo $loggedInUser->getLastName()?> "> <br> 
                    <option> Tea</option>
            </div>
            <div class="T"><label for="CoffeeorTea">Coffee or Tea?</label> 
                <select type="action" name=CoffeeOrTea id=weite > <!--was ist select für ein type??? -->
                    <option value="Tea" <?php echo ($loggedInUser->getCoffeeorTea() === 'Tea') ? 'selected' : ''; ?>> Tea</option>
                    <option value="Coffee" <?php echo ($loggedInUser->getCoffeeOrTea() === 'Coffee') ? 'selected' : ''; ?>> Coffee</option>
                </select></div>
        </fieldset>
        <fieldset class="legendFieldset">
            <legend> Tell something about you </legend>
            <label  for=textarea ><Textarea name="TellSomething"  placeholder="Leave a comment here" ><?php echo $loggedInUser->getTellSomething() ?> </Textarea></label> <br>

        </fieldset>
        <fieldset class="legendFieldset">
            <legend> Prefered Chat Layout </legend>
            <label><input type="radio" name="rd" value="1" <?php echo ($loggedInUser->getrd() === '1') ? 'checked' : ''; ?>>UserName and Message in one line</label><br> <!--ist das so richtig? -->
            <label> <input type="radio" name="rd" value="2" <?php echo ($loggedInUser->getrd() === '2') ? 'checked' : ''; ?>>Username and Message in seperate lines</label><br>
        </fieldset> <br>
        
             <button   formaction="friends.php" class="greyButton" >Cancel</button>
             <button type="submit" value="senden" name="action"class="coloredButton"> Save </button></div></br>
</form>
</div>
    </body>
    </html>