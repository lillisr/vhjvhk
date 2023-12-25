<?php
require("start.php");

//load page
//header("Refresh:5");


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


//check if accept friend is sent -> per get machen mit query als link

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
    <!-- <link rel="stylesheet" type="text/css" href="allgemien.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    <script src="main2.js" defer></script>
</head>

<body class="friends">

    <div class="container mt-3">
        <div class="root">
            <div class="col-12">
                <h1> Friends</h1>
                <p class="btn-group"><a href="logout.php" class="btn btn-secondary"> &lt Logout</a><a
                        href="Einstellungen.php" class="btn btn-secondary">Edit Profile</a> </p>
            </div>
        </div>
        <hr />
        <div class="justify-content-center">

            <div class="list-group mr-3">

                <?php

                if (sizeof($friendslist) == 0) {
                    ?>
                    <p class="mb-1"> No friends here... yet </p>
                    <?php
                }
                ?>
                <!-- <ul id="accepted-friends"> -->
                <?php
                foreach ($friendslist as $friend) {
                    //var_dump($friend); ?>
                    <!-- <li> -->
                    <?php
                    $getFriendStatus = $friend->getStatus();
                    if ($getFriendStatus == "accepted") {
                        ?>
                        <a class="list-group-item list-group-item-action"
                            href="chat.php?friend=<?= urlencode($friend->getUsername()) ?>">
                            <?= $friend->getUsername() ?>
                        </a>
                        <!-- </li> -->


                    <?php }
                } ?>


            </div>

            <!-- </ul> -->

        </div>

        <hr />

        <h2> New Requests</h2>

        <!-- <div class="list-group"> -->
        <p> Friends request from </p>
        <!-- <ol id="new-requests"> -->
        <?php
        $noFriendRequests = true;
        foreach ($friendslist as $friend) {
            //requested friends
            $getFriendStatus = $friend->getStatus();
            if ($getFriendStatus == "requested") {
                $noFriendRequests = false;
                ?>
                <div class="input-group mb-3">
                    <!-- <li class="list-group-item"> -->
                    <p class="form-control" data-bs-toggle="modal" data-bs-target="#acceptModal">
                        <?php echo $friend->getUsername();
                        ?>
                    </p>
                    <form method="POST" action="friends.php">
                        <input type="hidden" id="item_id" name="item_id" value="<?php echo $friend->getUsername(); ?>">
                        <!--  <div class="btn-group">
                          <button type="submit" name="action" value="accept-friend" class="btn btn-primary">Accept</button>
                            <button type="submit" name="action" value="reject-friend" class="btn btn-secondary">Reject</button> 
                        </div> -->
                    </form>
                </div>

                <!--  Modal -->
                <div class="modal" id="acceptModal" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Request from
                                    <?php echo $friend->getUsername(); ?>
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Accept request?</p>
                            </div>
                            <div class="modal-footer">
                                <form method="POST" action="friends.php">
                                    <input type="hidden" id="item_id" name="item_id"
                                        value="<?php echo $friend->getUsername(); ?>">
                                    <button type="submit" name="action" value="accept-friend"
                                        class="btn btn-primary">Accept</button>
                                    <button type="submit" name="action" value="reject-friend"
                                        class="btn btn-secondary">Reject</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
            } ?>




        <?php } ?>
        <?php
        //no friends
        if ($noFriendRequests) {
            ?>
            <p> none... </p>
            <?php
        }

        ?>
        <!--  </ol> -->

        <!-- </div> -->
        <hr />
        <div class="justify-content-center">
            <form action="friends.php" method="POST">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Add Friend to List" name="friendRequestName"
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
                    <button type="submit" name="action" value="add-friend" class="btn btn-primary"
                        onclick="addFriend()">Add</button>
                </div>
            </form>
        </div>


    </div>


</body>

</html>