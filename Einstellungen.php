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
    
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css' rel='stylesheet' crossorigin='anonymous'>
</head>

<body class="settings">
    <div class="container mt-3">
        <div class="root">
            <h1  class="mb-3 border-bottom pb-3"class="headline" >Profile Settings</h1>
        </div>

        <!-- Formular mit Bootstrap-Klassen -->
        <form action="Einstellungen.php" method="post">
            <div  >
                <legend>Base Data</legend>
            </div>

            <div class="mb-3">
                <label for="FirstName" class="form-label">Your Name</label>
                <input name="FirstName" type="text" class="form-control" value="<?php echo $loggedInUser->getFirstName() ?>">
            </div>

            <div class="mb-3">
                <label for="LastName" class="form-label">Last Name</label>
                <input name="LastName" type="text" class="form-control" value="<?php echo $loggedInUser->getLastName() ?>">
            </div>

            <div class="mb-3"  >
                <label for="CoffeeOrTea" class="form-label">Coffee or Tea?</label>
                <select class="form-select" name="CoffeeOrTea">
                    <option value="Coffee" <?php echo ($loggedInUser->getCoffeeOrTea() === 'Coffee') ? 'selected' : ''; ?>>Coffee</option>
                    <option value="Tea" <?php echo ($loggedInUser->getCoffeeOrTea() === 'Tea') ? 'selected' : ''; ?>>Tea</option>
                </select>
            </div>

            <div class="mb-3">
            <div class="border-top pt-3">
                <label for="exampleFormControlTextarea1" class="form-label">Tell something about you!</label>
                <textarea name="TellSomething" placeholder="Leave a comment here" class="form-control" rows="3"><?php echo $loggedInUser->getTellSomething() ?></textarea>
            </div>
</div>

            <div class="mb-3" >
                <div class="border-top pt-3">
                
                <label class="form-label" >Preferred chat Layout</label>
                <div class="form-check">
                    <input name="rd" class="form-check-input" type="radio" id="flexRadioDefault1" value="1" <?php echo ($loggedInUser->getrd() === '1') ? 'checked' : ''; ?>>
                    <label class="form-check-label" for="flexRadioDefault1">UserName and Message in one line</label>
                </div>
                <div class="form-check">
                    <input name="rd" class="form-check-input" type="radio" id="flexRadioDefault2" value="2" <?php echo ($loggedInUser->getrd() === '2') ? 'checked' : ''; ?>>
                    <label class="form-check-label" for="flexRadioDefault2">Username and Message in separate lines</label>
                </div>
         
            </div>
            </div>

            <a class="btn btn-secondary" href="friends.php">Cancel</a>
            <button class="btn btn-primary" type="submit" value="senden" name="action">Save</button>
        </form>
    </div>

        

            <!--<div class="FN">
                <label for="FirstName">First Name</label> 
                <input type="text" name="FirstName" id=weite  placeholder="Your Name" value="<?php//echo $loggedInUser->getFirstName() ?>" > <br>
            </div>
            <div class="LN"> 
                <label for="LastName">Last Name</label> 
                <input type="text" name="lastName" id=weite placeholder="Your Surname" value="<?php //echo $loggedInUser->getLastName()?> "> <br> 
                    <option> Tea</option>
            </div>
            <div class="T"><label for="CoffeeorTea">Coffee or Tea?</label> 
                <select type="action" name=CoffeeOrTea id=weite > 
                    <option value="Tea" <?php //echo ($loggedInUser->getCoffeeorTea() === 'Tea') ? 'selected' : ''; ?>> Tea</option>
                    <option value="Coffee" <?php //echo ($loggedInUser->getCoffeeOrTea() === 'Coffee') ? 'selected' : ''; ?>> Coffee</option>
                </select></div>
        </fieldset>
        <fieldset class="legendFieldset">
            <legend> Tell something about you </legend>
            <label  for=textarea ><Textarea name="TellSomething"  placeholder="Leave a comment here" ><?php //echo $loggedInUser->getTellSomething() ?> </Textarea></label> <br>

        </fieldset>
        <fieldset class="legendFieldset">
            <legend> Prefered Chat Layout </legend>
            <label><input type="radio" name="rd" value="1" <?php //echo ($loggedInUser->getrd() === '1') ? 'checked' : ''; ?>>UserName and Message in one line</label><br> 
            <label> <input type="radio" name="rd" value="2" <?php// echo ($loggedInUser->getrd() === '2') ? 'checked' : ''; ?>>Username and Message in seperate lines</label><br>
        </fieldset> <br>
        
             <button   formaction="friends.php" class="greyButton" >Cancel</button>
             <button type="submit" value="senden" name="action"class="coloredButton"> Save </button></div></br>
</form>
</div>
-->

<script src='https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js' crossorigin='anonymous'></script>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js' crossorigin='anonymous'></script>

    </body>
    </html>