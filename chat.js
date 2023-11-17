
//Id hinter URL plazieren
window.collectionId = "5cff7201-37c0-4016-82fd-e91db1a98eb2";

//  Basis-URL des Servers
window.backendUrl = "https://online-lectures-cs.thi.de/chat/" + window.collectionId;

//  Token für die Authentifizierung (zum Beispiel Token für Tom)
window.tokenTOM = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyIjoiVG9tIiwiaWF0IjoxNzAwMjI5NTIzfQ.15wcKi2kqllvpeAFIAYVa2UlSUxUUgOrt7FaZS9rrlM";
window.tokenJERRY = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyIjoiSmVycnkiLCJpYXQiOjE3MDAyMjk1MjN9.Jwr1I8pkjh3roG_3uUss3kgcGrays2eepnFzdawNuDA";


//chat um messages zu bekommen (list messages)

function listMessages(to, fromToken) { 
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            let data = JSON.parse(xmlhttp.responseText);
            console.log(data);
            loadMessages(data);
        
        }
    };
    xmlhttp.open("GET", "https://online-lectures-cs.thi.de/chat/5cff7201-37c0-4016-82fd-e91db1a98eb2/message/"+ to, true);
    // Add token, e. g., from Tom
    xmlhttp.setRequestHeader('Authorization', 'Bearer ' + fromToken);
    xmlhttp.send();
}

//send messages bekommen

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
    let data = {
        message: "Hello?!",
        to: "Jerry"
    };
    let jsonString = JSON.stringify(data); // Serialize as JSON
    xmlhttp.send(jsonString); // Send JSON-data to server

}

listMessages("Jerry", window.tokenTOM);
sendMessages();

//um freund zu bekommen TODO als paramenter bei list messages einfügen!!
function getChatpartner() {
    const url = new URL(window.location.href);
    // Access the query parameters using searchParams
    const queryParams = url.searchParams;
    // Retrieve the value of the "friend" parameter
    const friendValue = queryParams.get("friend");
    console.log("Friend:", friendValue);
    return friendValue;
    }

   // getChatpartner();

    function loadMessages(data){
        const chatList = document.getElementById("chatMessages");
           // Iteriere über jedes Nachrichtenobjekt im JSON-Array
           data.forEach(message => {
            // Greife auf die Eigenschaften des Nachrichtenobjekts zu
            const from = message.from;
            const type = message.type;
            const msg = message.msg;

            const time = new Date(message.time);
            const formattedTime = time.toLocaleTimeString();

            // Formatiere und zeige die Daten in der Konsole an
            console.log(`${time}`);

            const listItem = document.createElement("li");
            listItem.innerHTML = `${from}: ${msg}  <span class="time">${formattedTime}</span>`;
            chatList.appendChild(listItem);

        });
       
        

    }

   
/* zeichen string aus json parse
   var jsObj = JSON.parse(data);
   let firstEntry = jsonObj[0];
   console.log(firstEntry);
*/