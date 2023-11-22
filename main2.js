//Id hinter URL plazieren
window.collectionId = "5cff7201-37c0-4016-82fd-e91db1a98eb2"; 

//  Basis-URL des Servers
window.backendUrl = "https://online-lectures-cs.thi.de/chat/" + window.collectionId;

//  Token für die Authentifizierung (zum Beispiel Token für Tom)
window.tokenTOM = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyIjoiVG9tIiwiaWF0IjoxNzAwMjI5NTIzfQ.15wcKi2kqllvpeAFIAYVa2UlSUxUUgOrt7FaZS9rrlM";
window.tokenJERRY = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyIjoiSmVycnkiLCJpYXQiOjE3MDAyMjk1MjN9.Jwr1I8pkjh3roG_3uUss3kgcGrays2eepnFzdawNuDA";


//Funktion, um die Datalist mit Benutzernamen zu befüllen
function populateFriendList() {
    const datalist = document.getElementById('friend-selector');

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            let data = JSON.parse(xmlhttp.responseText);
            console.log(data);

            const userNames = data.map(user => user.username);

            // Benutzernamen zur Datalist hinzufügen
                userNames.forEach(userName => {
                    const option = document.createElement('option');
                    option.value = userName;
                    datalist.appendChild(option);
                });


        }
    };
    xmlhttp.open("GET", "https://online-lectures-cs.thi.de/chat/12d3e822-6050-44ef-b265-212b558cff93/user", true);
    xmlhttp.setRequestHeader('Authorization', 'Bearer '+window.tokenTOM+window.tokenJERRY);
    xmlhttp.send();

    
}

// Funktion, um einen neuen Freund hinzuzufügen
function addFriend() {
    const friendRequestName = document.getElementById('friend-request-name').value;

    // Dummy-Prüfung, ob der Nutzername in der Liste ist (ersetzen Sie dies durch eine Backend-Anfrage)
    if (friendRequestName && friendRequestName !== 'Tom' ) {
        // Backend-AJAX-Anfrage, um eine Freundschaftsanfrage zu senden
        sendFriendRequest(friendRequestName);
    } else {
        alert('Ungültiger Benutzername');
    }
}





 // Funktion, um eine Freundschaftsanfrage an das Backend zu senden
 function sendFriendRequest(friendName) {
    //  const xmlhttp = new XMLHttpRequest();
    //  xmlhttp.onreadystatechange = function () {
    //      if (xmlhttp.readyState == 4) {
    //          if (xmlhttp.status == 204) {
    //             console.log(`Freundschaftsanfrage an ${friendName} gesendet.`);
    //          } else {
    //              console.error(`Fehler beim Senden der Freundschaftsanfrage: ${xmlhttp.status}`);
    //          }
    //      }
    // };


let xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function () {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 204) {
        console.log("Requested...");
    }
};


    xmlhttp.open("POST", "https://online-lectures-cs.thi.de/chat/12d3e822-6050-44ef-b265-212b558cff93/friend", true);
xmlhttp.setRequestHeader('Content-type', 'application/json');
xmlhttp.setRequestHeader('Authorization', 'Bearer '+ window.tokenTOM );

let data = {
    username: friendName
};
let jsonString = JSON.stringify(data);
xmlhttp.send(jsonString);
 }
//     // Dummy-URL (ersetzen Sie dies durch die richtige Backend-URL)
//     const backendUrl = 'https://online-lectures-cs.thi.de/chat/12d3e822-6050-44ef-b265-212b558cff93/friend';

//     xmlhttp.open('POST', backendUrl, true);
//     xmlhttp.setRequestHeader('Content-type', 'application/json');
//     xmlhttp.setRequestHeader('Authorization', 'Bearer'+ window.tokenTOM); // Ersetzen Sie YOUR_ACCESS_TOKEN durch das echte Token

//     const data = { username: friendName };
//     const jsonString = JSON.stringify(data);
//     xmlhttp.send(jsonString);
// }

// Datalist bei Seitenladen befüllen
populateFriendList();




//b2

window.setInterval(function() {
    loadFriends();
    }, 1000);

function loadFriends() {
        const xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                let data = JSON.parse(xmlhttp.responseText);

                const acceptedFriends = data.filter(friend => friend.status === "Accept");
            const requestedFriends = data.filter(friend => friend.status === "Request");

             // Aktualisierung der Listen auf der Seite
             updateFriendsList(acceptedFriends, 'friendslist');
             updateFriendsList(requestedFriends, 'new-requests');
         }
     };
 
     xmlhttp.open("GET", "https://online-lectures-cs.thi.de/chat/full#list-friends", true);
     xmlhttp.setRequestHeader('Authorization', 'Bearer ' + window.tokenTOM);
     xmlhttp.send();
 }
 
 // Funktion zum Aktualisieren der Listen auf der Seite
 function updateFriendsList(friendName, listId) {
     const list = document.getElementById(listId);
     list.innerHTML = ''; // Liste leeren, um sie neu zu füllen
 
     friends.forEach(friend => {
         const listItem = document.createElement('li');
         listItem.textContent = friend.username;
         list.appendChild(listItem);
     });
 }








// b.1 
// //freundesliste
// const userList = [ "Sarah", "Martha", "Franz"];

// // Funktion zum Befüllen der Datalist
// function updateDatalist() {
//     const datalist = document.getElementById("friend-selector");
//     datalist.innerHTML = "";

//     userList.forEach(username => {
//         const option = document.createElement("option");
//         option.value = username;
//         datalist.appendChild(option);
//     });
// }
// //hinzufügen ienes freundes

// function addFriend() {
//     const friendRequestName = document.getElementById("friend-request-name").value;
//     // Prüfen, ob der Nutzername existiert und nicht dem aktuellen Nutzer entspricht
//     if (userList.includes(friendRequestName) && friendRequestName !== "Tom") {
//         // Hier AJAX-Aufruf für Freundesanfrage an das Backend durchführen
//         fetch(`${window.backendUrl}/full#friend-request`, {
//                 method: 'POST',
//                 headers: {
//                    'Authorization': `Bearer ${window.tokenTOM}`,
//                      'Content-Type': 'application/json',
//                 },
//                 body: JSON.stringify({ username: friendRequestName }),
//                  })
       

//         .then(response => {
//             if (!response.ok) {
//                 throw new Error(`HTTP error! Status: ${response.status}`);
//             }
//             return response.json();
//         })
//         .then(data => {
//             // Verarbeitung der Antwort vom Server
//             console.log('Erfolgreich:', data);
         
//         // Nach erfolgreichem Hinzufügen die Datalist aktualisieren
//         updateDatalist()
//         })
//         .catch(error => {
//             // Fehlerbehandlung
//             console.error('Fehler:', error);
//         });


//     } else {
//         alert("Ungültiger Nutzername oder bereits Freund.");
//     }
// }
