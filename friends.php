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
                <p><a href="logout.html" class="friends-links"> &ltLogout</a> | <a href="Aufgabe 1-3_new.html"
                        class="friends-links">Settings</a> </p>
            </div>
        </div>
        <hr />
        <div class="friendslist"  >
            <div>
                <ul  id="accepted-friends">
                     </div>
                </ul>
                
            </div>
        </div>
        <hr />

        <h2> New Requests</h2>

        <div class="request">
            <div class="request-content" >
                <p> Friends request from </p>
               <ul id="new-requests">
                <li id="list-item" > </li> </ul>
                     </div>
            <div class="request-action-buttons">
               
            </div> 
           
        </div>
        <hr />
        <div class="add">
            <input class="input-addFriend" type="text" placeholder="Add Friend to List" name="friendRequestName" id="friend-request-name" list="friend-selector">
            <datalist id="friend-selector"> 
            
                </datalist>
            <div class="addButton">
                <button class="greyButton" type="Add" onclick="addFriend()" type="button">Add</button>
            </div>
        
        </div>

    </div>

</body>

</html>