<?php
require("start.php");
error_reporting (E_ALL & ~E_NOTICE & ~E_DEPRECATED);
ini_set ('display_errors', 1);
?>

<!Doctype html>
    <head>
        <title>profile</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="allgemien.css">
    </head>
    <body >
        <div class="container" >

        
        <h1> Profile of Tom</h1>
        <a href="chat.html"> Back to Chat</a> 
        <a href="friends.html"  id="Achtung"> Remove Friend</a>
        <p> 
        <div class="containerprofile" >
<fieldset class="pictureprofile" class="legendFieldset" >

       <img src="profile.png" alt="Platzhalter für ein Bild">
    </fieldset>
    </p>
        <fieldset class="profilefield" class="legendFieldset">

        <p>  Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet cli</p>

        <p> </p>
        <table>
        
            <tr>
                <th>FirstName  </th>
                <th>LastName  </th>
                <th>Coffee or Tea</th>
            </tr>
            <tr>
                <td>Lilli</td>
                <td>Sauer</td>
                <td>Tea</td>
            </tr>
        </table>
        </fieldset>
    </div>
</div>
    </body>
    
</Doctype>