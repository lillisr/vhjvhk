
//Id
window.collectionId = "34ec8719-858e-43c9-85b5-3c2f391d3bb5";

//  Basis-URL des Servers
window.backendUrl = "https://online-lectures-cs.thi.de/chat/" + window.collectionId;

//  Token für die Authentifizierung (zum Beispiel Token für Tom)
window.token = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyIjoiVG9tIiwiaWF0IjoxNjk5OTU2Nzk2fQ.xdYs4MjaJmlv1k2QaT58GQEZVv-2GqaazOi8Rb8Dq4c";

// globalen Info für XMLHttpRequest
const xmlhttp = new XMLHttpRequest();

xmlhttp.onreadystatechange = function () {
  if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
    let data = JSON.parse(xmlhttp.responseText);
    console.log(data);
  }
};

// Chat Server URL und Collection ID als Teil der URL
xmlhttp.open("GET", window.backendUrl + "/user", true);

// Das Token zur Authentifizierung wenn notwendig
xmlhttp.setRequestHeader('Authorization', 'Bearer ' + window.token);

xmlhttp.send();


//chat um messages zu bekommen (list messages)
var xmlhttp_chat_list = new XMLHttpRequest();
xmlhttp_chat_list.onreadystatechange = function () {
    if (xmlhttp_chat_list.readyState == 4 && xmlhttp_chat_list.status == 200) {
        let data = JSON.parse(xmlhttp_chat_list.responseText);
        console.log(data);
    }
};
xmlhttp_chat_list.open("GET", "https://online-lectures-cs.thi.de/chat/34ec8719-858e-43c9-85b5-3c2f391d3bb5/message/Jerry", true);
// Add token, e. g., from Tom
xmlhttp_chat_list.setRequestHeader('Authorization', 'Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyIjoiVG9tIiwiaWF0IjoxNjk5OTU2Nzk2fQ.xdYs4MjaJmlv1k2QaT58GQEZVv-2GqaazOi8Rb8Dq4c');
xmlhttp_chat_list.send();

//chat um messages zu versenden (send messages)
let xmlhttp_chat_send = new XMLHttpRequest();
xmlhttp_chat_send.onreadystatechange = function () {
    if (xmlhttp_chat_send.readyState == 4 && xmlhttp_chat_send.status == 204) {
        console.log("done...");
    }
};
xmlhttp_chat_send.open("POST", "https://online-lectures-cs.thi.de/chat/34ec8719-858e-43c9-85b5-3c2f391d3bb5/message", true);
xmlhttp_chat_send.setRequestHeader('Content-type', 'application/json');
// Add token, e. g., from Tom
xmlhttp_chat_send.setRequestHeader('Authorization', 'Bearer ' + window.token);
// Create request data with message and receiver
let data = {
    message: "Hello?!",
    to: "Jerry"
};
let jsonString = JSON.stringify(data); // Serialize as JSON
xmlhttp_chat_send.send(jsonString); // Send JSON-data to server

//chat immer wieder neu laden, loadfunction() noch nicht da
window.setInterval(function() {
    //loadFriends();
    }, 1000 );
