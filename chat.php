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
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css' rel='stylesheet' crossorigin='anonymous'>


</head>

<body>
    <div class="container">
        <form class="chat" method="GET">
            <h1 id="chatPartner"> </h1>
            <!--<a href="friends.php" target="_back"> >Back </a> | -->
            <a class="btn btn-secondary" href="friends.php" role="button">Back</a> 
            <a class="btn btn-secondary" href="profile.php?friend=<?php echo $friend ?>" role="button">Profile</a>
            <!--<a href="profile.php?friend=<?php //echo $friend ?>" target="_Profile"> Profile </a> | -->
            <a class="btn btn-danger" role="button" data-bs-toggle='modal' data-bs-target='#Removefriend' >Remove Friend</a>
            <!-- <a href="friends.php?friend=<?php //echo $_GET['friend'] ?>&action=remove-friend" id="Achtung"> Remove Friend 
            </a><br> -->
            
            <div class="modal" tabindex="-1" id="Removefriend">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Remove <?php echo $_GET['friend'] ?> as friend? </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Do you really want to end your friendship?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <a class="btn btn-secondary" href="friends.php?friend=<?php echo $_GET['friend']?>&action=remove-friend" role="button" >Yes, please!</a>
        <!-- <button type="button" class="btn btn-primary" >Yes, please!</button> -->
      </div>
    </div>
  </div>
</div>

            <hr />
            <div class="chatlist">
                <div>
                    <ul id="chatMessages">

                    </ul>
                </div>
            </div>
            <hr />

            <div class="input-group mb-3">
             <input type="text" class="form-control" placeholder="New Message " aria-label="New Message" aria-describedby="button-addon2">
             <button class="btn btn-outline-secondary" type="button" onclick="sendMessages()" id="button-addon2">Send</button> <!--onclick funktioniert nicht -->
            </div>
            <!--<div class="newMessage">
                <input class="Message" type="text" placeholder="New Message" id="messageField">
                <div class="sendButton">
                    <input type="button" class="greyButton" onclick="sendMessages()" value="Send">
                </div> -->
        </form>
    </div>


    <script src='https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js' crossorigin='anonymous'></script>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js' crossorigin='anonymous'></script>

</body>
<script src="chat.js"></script>

</html>