<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    echo "hello World";
    
    //beispiel 1

    if(isset($_GET["test"])) {
        if(!empty($_GET["test"])) {
        echo "Wert: " . $_GET["test"];
        } else {
        echo "Kein Wert!";
        }
        } else {
        echo "Kein Parameter übergeben";
        }


        if(isset($_GET["foo"])) {
            if(!empty($_GET["foo"])) {
            echo "Wert: " . $_GET["foo"];
            } else {
            echo "Kein Wert!";
            }
            } else {
            echo "Kein Parameter übergeben";
            }

     // beispiel2 

     $list=array(1, 2, 3, 4, 5);       
     var_dump($list);  //Ausgabe: { [0]=> int(1) [1]=> int(2) [2]=> int(3) [3]=> int(4) [4]=> int(5) }

     foreach($list as $value) {       // Ausgabe untereinander und nur die Zahlen
        echo "<p>" . $value . "</p>";
        }?>


        <?php                         // macht genaau das gleiche wie oben nur eben anders
        foreach($list as $value) {
        ?>
        <p><?php echo $value; ?></p>
        <?php
        }
        ?>  

         <?php foreach($list as $value) {   // auch nochmal das gleiche
             ?> 
        <p><?= $value; ?></p>
        <?php } ?>

    <?php

    // weiterleitung bsp

    //header("Location: login.php");  // man wird dirket auf login weitergeleitet, da der paramter im http respnse ersätzt wird
    ?>
    hallo
    <body>
    <p>Hallo, Welt!</p>

    <?php

    //

header("Location: login.php"); // gut!
$foo = 12435;
header("Location: login.php"); // gut!
echo "Hallo"; // erzeugt ausgabe
header("Location: login.php"); // schlecht!
?>
<!-- ... -->
<body>
<p>Hallo, Welt!</p>
<?php
header("Location: login.php"); // noch schlechter!
?>





    
</body>
</html>