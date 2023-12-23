<?php
require("start.php");

if (!isset($_SESSION['user']) || empty($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
if (!isset($_GET['friend']) || empty($_GET['friend'])) {
    header("Location: friends.php");
    exit();
}
$friend = $_GET['friend'];
//var_dump($friend);
 
?>

<!doctype html>
<html>

<head>
    <title>chat</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="allgemien.css">

</head>

<body>
    <div class="container">
        <form class="chat" method="GET">
            <h1 id="chatPartner"> </h1>
            <a href="friends.php" target="_self"> >Back </a> |
            <a href="profile.php?friend=<?php echo $friend ?>" target="_Profile"> Profile </a> |
            <a href="friends.php?friend=<?php echo $_GET['friend'] ?>&action=remove-friend" id="Achtung"> Remove Friend
            </a><br>
            <hr />
            <div class="chatlist">
                <div>
                    <ul id="chatMessages">

                    </ul>
                </div>
            </div>
            <hr />
            <div class="newMessage">
                <input class="Message" type="text" placeholder="New Message" id="messageField">
                <div class="sendButton">
                    <input type="button" class="greyButton" onclick="sendMessages()" value="Send">
                </div>
        </form>
    </div>

</body>
<script src="chat.js"></script>

</html>