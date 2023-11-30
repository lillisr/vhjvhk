<?php
require("start.php");
error_reporting (E_ALL & ~E_NOTICE & ~E_DEPRECATED);
ini_set ('display_errors', 1);
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