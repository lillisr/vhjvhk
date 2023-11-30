<!doctype html>
<html>
    <head>
        <title>chat</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="allgemien.css">
        
    </head>
    <body>
        <div class="container">
        <form class="chat">
            <h1 id="chatPartner"> </h1>
            <a href="friends.php" target="_back"> >Back </a> |
            <a href="profile.php" target="_Profile"> Profile </a> |
            <a href="friends.php" target="RemoveFriend" id="Achtung"> Remove Friend </a><br>
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