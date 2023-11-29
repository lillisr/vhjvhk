//Id hinter URL plazieren
window.collectionId = "5cff7201-37c0-4016-82fd-e91db1a98eb2"; 

//  Basis-URL des Servers
window.backendUrl = "https://online-lectures-cs.thi.de/chat/" + window.collectionId;

//  Token für die Authentifizierung (zum Beispiel Token für Tom)
window.tokenTOM = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyIjoiVG9tIiwiaWF0IjoxNzAwMjI5NTIzfQ.15wcKi2kqllvpeAFIAYVa2UlSUxUUgOrt7FaZS9rrlM";
window.tokenJERRY = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyIjoiSmVycnkiLCJpYXQiOjE3MDAyMjk1MjN9.Jwr1I8pkjh3roG_3uUss3kgcGrays2eepnFzdawNuDA";


//Funktion, um die Datalist mit Benutzernamen zu befüllen
function populateList() {
    const datalist = document.getElementById('friend-selector');

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            let data = JSON.parse(xmlhttp.responseText);
            console.log(data);
            const userNames = data
            // Benutzernamen zur Datalist hinzufügen
                userNames.forEach(userName => {
                    
                    if ( userName !== "Tom"){
                        const option = document.createElement('option');
                    option.value = userName;
                    datalist.appendChild(option);
                    
                    }
                });
        }
    };
    xmlhttp.open("GET", "https://online-lectures-cs.thi.de/chat/5cff7201-37c0-4016-82fd-e91db1a98eb2/user", true);
    xmlhttp.setRequestHeader('Authorization', 'Bearer '+window.tokenTOM);
    xmlhttp.send();

}

// Funktion, um einen neuen Freund hinzuzufügen
function addFriend() {
    const friendRequestName = document.getElementById('friend-request-name').value;
    
    //  ob der Nutzername in der Liste ist 
    if (friendRequestName && friendRequestName !== 'Tom'  ) {    
        
                                                   
        // Backend-AJAX-Anfrage, um eine Freundschaftsanfrage zu senden
        sendFriendRequest(friendRequestName);
    } else {
        alert('Ungültiger Benutzername');
    }

}
/*
function deleteFriend(){
    const friendRequestName = document.getElementById('friend-request-name').value;
deletefriendanfrage(friendRequestName);
}
*/
 // Funktion, um eine Freundschaftsanfrage an das Backend zu senden
 function sendFriendRequest(friendName) {

let xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function () {
    
    if (xmlhttp.readyState == 4 && xmlhttp.status == 204 ) {
        loadFriends();
        console.log("Requested...an ${friendName}");
}
};

    xmlhttp.open("POST", "https://online-lectures-cs.thi.de/chat/5cff7201-37c0-4016-82fd-e91db1a98eb2/friend", true);
xmlhttp.setRequestHeader('Content-type', 'application/json');
xmlhttp.setRequestHeader('Authorization', 'Bearer '+ window.tokenTOM );

let data = {
    username: friendName
};
let jsonString = JSON.stringify(data);
xmlhttp.send(jsonString);
 }

 /*delete
function deletefriendanfrage(friendName) {
 let xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function () {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 204) {
        loadFriends();
        console.log("Removed...");
    }
};
xmlhttp.open("DELETE", "https://online-lectures-cs.thi.de/chat/5cff7201-37c0-4016-82fd-e91db1a98eb2/friend/tom", true);
xmlhttp.setRequestHeader('Content-type', 'application/json');
xmlhttp.setRequestHeader('Authorization', 'Bearer '+ window.tokenTOM);
xmlhttp.send();
}
*/

window.setInterval(function() {
    loadFriends();
    }, 1000);
    function loadFriends() {
        const xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                let data = JSON.parse(xmlhttp.responseText);
    
                const acceptedFriends = data.filter(friend => friend.status === "accepted");
                const requestedFriends = data.filter(friend => friend.status === "requested");
                console.log(data);
                
                // Aktualisierung der Listen auf der Seite
                updateacceptedList(acceptedFriends, 'accepted-friends');
                updaterequestList(requestedFriends, 'new-requests');

            }
        };
    
        xmlhttp.open("GET", "https://online-lectures-cs.thi.de/chat/5cff7201-37c0-4016-82fd-e91db1a98eb2/friend", true);
        xmlhttp.setRequestHeader('Authorization', 'Bearer ' + window.tokenTOM);
        xmlhttp.send();
    }


 
    function updateacceptedList(friends, listId) {
        const list = document.getElementById(listId);
        
        list.innerHTML = ''; 
    
        friends.forEach(friend => {
            const listItem = document.createElement('li');
            const a =document.createElement('a');
            const not = document.createElement('span');
            
            a.innerHTML = friend.username;
            a.setAttribute('href','chat.html?friend='+friend.username);
            not.innerHTML=(friend.unread);
            list.appendChild(a);
            list.appendChild(listItem);
            a.appendChild(not);

            
    });
    }

    function updaterequestList(friends, listId) {
        const list = document.getElementById(listId);
        list.innerHTML = ''; 
        
        friends.forEach(friend => {

             
            const listItem = document.createElement('li');
            listItem.innerText= friend.username;
       
            const actionButtonsDiv = document.createElement('div');
     
            actionButtonsDiv.className = 'request-action-buttons';
        
            const acceptButton = document.createElement('button');
            
                acceptButton.className = 'greyButton';
             acceptButton.type = 'button';
             acceptButton.type="Accept";
            acceptButton.innerText = 'Accept';
            actionButtonsDiv.appendChild(acceptButton);
            

            const rejectButton = document.createElement('button');
            rejectButton.className = 'greyButton';
            rejectButton.innerText = 'Reject';
            rejectButton.type='Reject';
            rejectButton.type = 'button';
            actionButtonsDiv.appendChild(rejectButton);

            listItem.appendChild(actionButtonsDiv);

    
        list.appendChild(listItem);
      
       
    });
    
}

    populateList();

