

<?php
/*

//beispiel zu weiterleitung

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
?> */

//<?php
    
    $foo = 12435;
    if($foo == 12345) {
    header("Location: login.php");
    exit();
    }?>
  
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
  </head>
  <body>
    <p>Hallo Welt </p>
  </body>
  </html>