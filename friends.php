<?php
require("start.php");

//load page
header("Refresh:5");


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

}


//check if accept friend is sent

if (isset($_POST["action"]) && $_POST["action"] == "accept-friend") {

    $friendName = $_POST["item_id"];


    // Call the friendAccept method on the BackendService instance
    $service->friendAccept($friendName);

}

//check if reject friend is sent  

if (isset($_POST["action"]) && $_POST["action"] == "reject-friend") {

    $friendName = $_POST["item_id"];

    // Call the friendAccept method on the BackendService instance
    $service->friendDismiss($friendName);

}

// check if remove friend is sent

if (isset($_GET["action"]) && $_GET["action"] == "remove-friend") {

    $friendName = $_GET["friend"];

    // Call the friendAccept method on the BackendService instance
    $service->removeFriend($friendName);

}

?>

<html>

<head>
    <title>friends</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="allgemien.css">
    <script src="main2.js" defer></script>
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


                if (sizeof($friendslist) == 0) {
                    ?>
                    <p> No friends here... yet </p>
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
                $noFriendRequests = true;
                foreach ($friendslist as $friend) {
                    //requested friends
                    $getFriendStatus = $friend->getStatus();
                    if ($getFriendStatus == "requested") {
                        $noFriendRequests = false;
                        ?>
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
                    } ?>

                    </li>

                <?php } ?>
                <?php
                //no friends
                if ($noFriendRequests) {
                    ?>
                    <p> none... </p>
                    <?php
                }

                ?>
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
                
                //get Friendslist users
                $friendsInList = array();
                foreach ($friendslist as $friend) {
                    $username = $friend->getUsername();
                    $friendsInList[] = $username;
                }
                //get all users
                $allUsers = $service->loadUsers();
                //var_dump($allUsers);

                //compare those two arrays, get users that are not in friendslist
                $notFriends = array_diff($allUsers, $friendsInList);
                //var_dump($notFriends);

                //hier: foreach ($allUsers as $user) 
                // hier: if (!in_array($user, $friendslist2) && $user != $_SESSION["user"]) {
                //hier: $addFriend = $user;
                //hier: var_dump($addFriend);
                //var_dump($addFriend);
                
                foreach ($notFriends as $user) {
                    $loadUser = $service->loadUser($user);
                    if ($loadUser->getUsername() != $_SESSION["user"]) {
                        ?>
                        <option value="<?= $user ?>">
                        <?php }
                } ?>

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