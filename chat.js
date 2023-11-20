
//Id hinter URL plazieren
window.collectionId = "5cff7201-37c0-4016-82fd-e91db1a98eb2"; 

//  Basis-URL des Servers
window.backendUrl = "https://online-lectures-cs.thi.de/chat/" + window.collectionId;

//  Token für die Authentifizierung (zum Beispiel Token für Tom)
window.tokenTOM = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyIjoiVG9tIiwiaWF0IjoxNzAwMjI5NTIzfQ.15wcKi2kqllvpeAFIAYVa2UlSUxUUgOrt7FaZS9rrlM";
window.tokenJERRY = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyIjoiSmVycnkiLCJpYXQiOjE3MDAyMjk1MjN9.Jwr1I8pkjh3roG_3uUss3kgcGrays2eepnFzdawNuDA";



//get Chat Headline with correct friend
getChatHeadline();


//list messages
function listMessages(to, fromToken) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            let data = JSON.parse(xmlhttp.responseText);
            console.log(data);
            loadMessages(data);

        }
    };
    xmlhttp.open("GET", "https://online-lectures-cs.thi.de/chat/5cff7201-37c0-4016-82fd-e91db1a98eb2/message/" + to, true);
    // Add token, e. g., from Tom
    xmlhttp.setRequestHeader('Authorization', 'Bearer ' + fromToken);
    xmlhttp.send();
}

//send messages
function sendMessages() {
    let xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 204) {
            console.log("done...");
        }
    };
    xmlhttp.open("POST", "https://online-lectures-cs.thi.de/chat/5cff7201-37c0-4016-82fd-e91db1a98eb2/message", true);
    xmlhttp.setRequestHeader('Content-type', 'application/json');
    // Add token, e. g., from Tom
    xmlhttp.setRequestHeader('Authorization', 'Bearer ' + window.tokenTOM);
    // Create request data with message and receiver
    var chatPartner = getChatpartner();
    var messageField = document.getElementById("messageField");
    var textMessage = messageField.value;
    let data = {
        message: textMessage,
        to: chatPartner
    };
    let jsonString = JSON.stringify(data); // Serialize as JSON
    xmlhttp.send(jsonString); // Send JSON-data to server
    messageField.value = "";
}


//get correct Chat partner
function getChatpartner() {
    const url = new URL(window.location.href);
    // Access the query parameters using searchParams
    const queryParams = url.searchParams;
    // Retrieve the value of the "friend" parameter
    const friendValue = queryParams.get("friend");
    console.log("Friend:", friendValue);
    return friendValue;
}

//storage for chat history
var chatHistory = new Array;

function loadMessages(data) {
    const chatList = document.getElementById("chatMessages");

    //compareHistory with data, for reloading the messages
    if (data.length > chatHistory.length) {
        while (chatList.lastElementChild) {
            chatList.removeChild(chatList.lastElementChild)
        }
        data.forEach(message => {
            // information for correct message form
            const from = message.from;
            const type = message.type;
            const msg = message.msg;

            const time = new Date(message.time);
            const formattedTime = time.toLocaleTimeString();


            console.log(`${time}`);

            //messages in correct order
            const listItem = document.createElement("li");
            listItem.innerHTML = `${from}: ${msg}  <span class="time">${formattedTime}</span>`;
            chatList.appendChild(listItem);
        });

        chatHistory = data;
    }






}

function getChatHeadline() {
    var friend = getChatpartner();

    var headline = document.getElementById("chatPartner");
    //console.log(headline);
    headline.innerText = "Chat with " + friend;
}

//reloading the messages every second
window.setInterval(function () {
    //loadFriends();
    listMessages(getChatpartner(), window.tokenTOM);
}, 1000);

/* zeichen string aus json parse
   var jsObj = JSON.parse(data);
   let firstEntry = jsonObj[0];
   console.log(firstEntry);
*/ 