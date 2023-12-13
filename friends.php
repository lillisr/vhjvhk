<?php
require("start.php");
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
ini_set('display_errors', 1);
$service = new Utils\BackendService(CHAT_SERVER_URL, CHAT_SERVER_ID);


//check if user is logged in
if (!isset($_SESSION["user"]) || !$_SESSION["user"]) {
    header("Location: login.php");
    die();
}

//friendslist
$friendslist = $service->loadfriends();


//check if add friend formular is sent
if (isset($_POST["action"]) && $_POST["action"] == "add-friend") {

    $friendName = $_POST["friendRequestName"];
    $newFriend = new Model\Friend($friendName);
    // var_dump($newFriend);

    // Call the friendRequest method on the BackendService instance
    $service->friendRequest($newFriend);

} else {
    echo "error";
}


//check if accept friend is sent

if (isset($_POST["action"]) && $_POST["action"] == "accept-friend") {

    $friendName = $_POST["item_id"];


    // Call the friendAccept method on the BackendService instance
    $service->friendAccept($friendName);

} else {
    echo "error";
}

//check if reject friend is sent  

if (isset($_POST["action"]) && $_POST["action"] == "reject-friend") {

    $friendName = $_POST["item_id"];


    // Call the friendAccept method on the BackendService instance
    $service->friendDismiss($friendName);

} else {
    echo "error";
}



//debug
function debug_to_console($data)
{
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}
?>

<html>

<head>
    <title>friends</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="allgemien.css">
    <!--<script src="main2.js" defer></script> -->
</head>

<body class="friends">

    <div class="container">
        <div class="root">
            <div class="col-12">
                <h1> Friends</h1>
                <p><a href="logout.php" class="friends-links"> &ltLogout</a> | <a href="Einstellungen.php"
                        class="friends-links">Settings</a> </p>
            </div>
        </div>
        <hr />
        <div class="friendslist">
            <div>
                <?php

                //var_dump($friendslist);
                //var_dump($_SESSION["user"]);
                if (sizeof($friendslist) == 0) {
                    ?>
                    <p> "Es ist ziemlich ruhig hier..." </p>
                    <?php
                }
                ?>
                <ul id="accepted-friends">
                    <?php
                    foreach ($friendslist as $friend) {
                        //var_dump($friend); ?>
                        <li>
                            <?php
                            $getFriendStatus = $friend->getStatus();
                            if ($getFriendStatus == "accepted") {
                                ?>
                                <a href="chat.php?friend=<?= urlencode($friend->getUsername()) ?>">
                                    <?= $friend->getUsername() ?>
                                </a>
                            </li>


                        <?php }
                    } ?>
            </div>
            </ul>

        </div>
    </div>
    <hr />

    <h2> New Requests</h2>

    <div class="request">
        <div class="request-content">
            <p> Friends request from </p>
            <ol id="new-requests">
                <?php
                foreach ($friendslist as $friend) {
                    //requested friends
                    $getFriendStatus = $friend->getStatus();
                    if ($getFriendStatus == "requested") { ?>
                        <li class="list-item">
                            <?php echo $friend->getUsername(); ?>
                            <div class="request-action-buttons">
                                <form method="POST" action="friends.php">
                                    <input type="hidden" id="item_id" name="item_id"
                                        value="<?php echo $friend->getUsername(); ?>">
                                    <button type="submit" name="action" value="accept-friend" class="greyButton">accept</button>
                                    <button type="submit" name="action" value="reject-friend" class="greyButton">reject</button>
                                </form>
                            </div>
                            <?php
                    }
                    //no friends
                    if (sizeof($friendslist) == 0) {
                        ?>
                            <p> "Es ist ziemlich ruhig hier..." </p>
                            <?php
                    }

                    ?>


                    </li>
                <?php } ?>
            </ol>
        </div>


    </div>
    <hr />
    <div class="add">
        <form action="friends.php" method="POST">
            <input class="input-addFriend" type="text" placeholder="Add Friend to List" name="friendRequestName"
                id="friend-request-name" list="friend-selector">
            <datalist id="friend-selector">

                <?php
                echo ($friendslist);
                foreach ($friendslist as $friend) {
                    var_dump($friend);
                    $getFriendStatus = $friend->getStatus();
                    if ($getFriendStatus == "requested" && $friend->getUsername() != $_SESSION["user"]) {
                        $addFriend = $friend->getUsername();

                        var_dump($addFriend);
                        ?>
                        <option value="<?= $addFriend ?>">

                        <?php }
                }
                ?>

            </datalist>
            <div class="addButton">
                <button type="submit" name="action" value="add-friend" class="greyButton"
                    onclick="addFriend()">Add</button>

            </div>
        </form>
    </div>

    </div>

</body>

</html>