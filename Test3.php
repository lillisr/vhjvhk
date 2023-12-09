<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="get" action="Test3.php">   <!-- alles was bei input eingegeben wird, wir an die url gehängt durch die Methode get -->
        <input name="test">
        <!--<button type="submit">Absenden</button> --> <!-- url wird so ergänzt: test=d-->
        <button type="submit" name="action" value="foo1">Absenden</button>  <!-- url wird so ergänzt: test=d&action=foo1  -> zum heruasfinden welcher button genutzt wurde-->
    </form>

    <form method="post" action="Test3.php">   <!-- mit post: Daten des Formulars werden als Payload in der Anfrage übermittelt-->
        <!--<input name="test"> -->
        <input name="test" value="<?php if(isset($_POST['test'])) { echo
        $_POST['test']; } ?>">           <!-- hier bleibt das input im inputfeld stehen -->
        <!--<button type="submit">Absenden</button> --> <!-- url wird so ergänzt: test=d-->
        <button type="submit" name="action" value="foo1">Absenden</button>  <!-- url wird so ergänzt: test=d&action=foo1  -> zum heruasfinden welcher button genutzt wurde-->
    </form>
    <?php var_dump($_POST)  // um zu sehen was bei post übermittelt wurde
    ?>

    <?php
    // anderes bsp
    $testWert = "";
    if(isset($_POST['test'])) {
    $testWert = $_POST['test'];
    }?>
    <!-- ... -->
    <body>
    <form method="post" action="Test3.php">
    <input name="test" value="<?= $testWert; ?>">
    <button type="submit" name="action" value="foo1">Absenden1</button>
    <button type="submit" name="action" value="foo2">Absenden2</button>
    <button type="submit" name="bar" value="foo3">Absenden3</button>
    </form>
    <?php var_dump($_POST); ?>
    <body>
</body>
</html>